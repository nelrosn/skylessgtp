/**
 * @author Gean Junior
 */
Application = function Application() {}

Application.CONTENT = "#content"
Application.DEFAULT_PAGE = "view/default.php";
Application.MAIN_CONTROL = "controller/main.control.php";

Application.messages = new ApplicationMessages();

Application.prototype.login = function login(user, password) {
	Application.messages.showMessage("Autenticando...");
	
	var data = { user:user, password:password };
	var callback = function(json) {
		Application.messages.hideMessage();
		if(json.logged) {
			$.get(Application.DEFAULT_PAGE, function(data) {
				$(Application.CONTENT).html(data);
			});
		} else {
			alert("Usuário ou senha inválido!");
		}
	}
	
	$.getJSON("controller/login.control.php", data, callback );
}

Application.prototype.openPage = function(url, target) {
	Application.messages.showMessage("Abrindo página...");
	
	$.get(Application.MAIN_CONTROL,	
		{page: url, target: target},
		function(data) {
			Application.messages.hideMessage();
			$(target).html(data);
		}
	);
}

Application.prototype.sendjson = function sendjson(control, params, callback) {
	Application.messages.showMessage("Requisitando...");
	var customCallback = function(data) {
		Application.messages.hideMessage();
		callback(data);
	}
	
	if(!callback) {
		callback = function(data) {
			alert(data);
		}
	}
	
	var url = "controller/" + control;
	
	//faz requisição ao servidor utilizado o método post e recebendo uma resposta em json
	$.post(url, params, customCallback, "json");
}

Application.prototype.sendForm = function sendForm(form, callback) {
	this.sendjson($("#"+form).attr("action"), this.readFromForm(form), callback);
}

Application.prototype.readFromForm = function readFromForm(form) {
	var form = $("#" + form + " input, form select, form textarea");

	var json = "{";
	if( form.length > 0 && form[0].name ) json += form[0].name + ": '" + form[0].value + "'";
	for(var i = 1; i < form.length; i++) {
		if( form[i].name ) json += ", " + form[i].name + ": '" + URLEncode(form[i].value) + "'";
	}
	json += "}";

	var obj = eval("(" + json + ")");
	return obj;
}







