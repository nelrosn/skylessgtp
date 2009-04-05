/**
 * @author Gean Junior
 */
Application = function Application() {

}

Application.prototype.login = function login(user, password) {
	$.getJSON("controller/login.control.php?user=" + user + "&password=" + password,
		function(data) {
			if(data.logged) {
				$.get("view/default.php", function(data) {
					$("#content").html(data);
				});
			} else {
				alert("Usuário ou senha inválido!")
			}
		}
	);
}

Application.prototype.openPage = function(url, target) {
	$.get("controller/main.control.php",	
		{page: url, target: target},
		function(data) {
			$(target).html(data);
		}
	);
}

Application.prototype.sendData = function sendData(control, params, callback) {
	if(!callback) {
		callback = function(data) {
			alert(data);
		}
	}
	
	var url = "controller/" + control;
	
	//faz requisição ao servidor utilizado o método post e recebendo uma resposta em json
	$.post(url, params, callback, "json");
}

Application.prototype.sendForm = function sendForm(form, callback) {
	this.sendData($("#"+form).attr("action"), this.readFromForm(form), callback);
}

Application.prototype.readFromForm = function readFromForm(form) {
	var form = $("#" + form + " input, form select, form textarea");

	var data = "{";
	if( form.length > 0 && form[0].name ) data += form[0].name + ": '" + form[0].value + "'";
	for(var i = 1; i < form.length; i++) {
		if( form[i].name ) data += ", " + form[i].name + ": '" + URLEncode(form[i].value) + "'";
	}
	data += "}";

	var obj = eval("(" + data + ")");
	return obj;
}







