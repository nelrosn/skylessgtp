<form>
	<label>Usuário: </label><input id="fldUser" type="text" name="fldUser" />
	<label>Senha: </label><input id="fldPassword" type="password" name="fldPassword" />
	<input type="button" value="Entrar" onclick="app.login($('#fldUser').attr('value'), $('#fldPassword').attr('value'))" />
</form>
