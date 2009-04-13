<form>
	<label>Usuário: </label><input id="fldUser" type="text" name="fldUser" />
	<label>Senha: </label><input id="fldPassword" type="password" name="fldPassword" />
	<input type="button" id="btSubmit" value="Entrar"
		onclick="javascript: app.login($('#fldUser').attr('value'), $('#fldPassword').attr('value'))" />
</form>
<script type="text/javascript">
	$("#fldUser").keyup(function(event) {
		if (event.keyCode == 13 /*ENTER*/) {
			$("#fldPassword").focus();
		}
	});
	
	$("#fldPassword").keyup(function(event) {
		if (event.keyCode == 13 /*ENTER*/) {
			$("#btSubmit").focus();
		}
	});
	
	$(document).ready(function() {
		$("#fldUser").focus();
	});
</script>
