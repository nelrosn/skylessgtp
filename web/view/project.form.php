<link type="text/css" href="javascript/jquery/jqueryUI/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="javascript/jquery/jqueryUI/ui/ui.core.js"></script>
<script type="text/javascript" src="javascript/jquery/jqueryUI/ui/ui.datepicker.js"></script>

<h2>Novo Projeto</h2>
<form id="project_form" action="project.control.php">
	<input type="hidden" name="action" value="insert" />
	<table class="sky_form">
		<tr>
			<th><label>Nome: </label></th>
			<td colspan="3"><input type="text" id="fldName" name="fldName" size="70" /></td>
		</tr>
		<tr>
			<th><label>Cliente: </label></th>
			<td colspan="3">
				<select id="fldClient" name="fldClient">
				</select>
			</td>
		</tr>
		<tr>
			<th><label>Início: </label></th>
			<td><input type="text" id="fldStart" name="fldStart" /></td>
			<th><label>Fim: </label></th>
			<td><input type="text" id="fldEnd" name="fldEnd" /></td>
		</tr>
		<tr>
			<th><label>Objetivos: </label></th>
			<td colspan="3"><textarea id="fldObjectives" name="fldObjectives" cols="60" rows="7"></textarea></td>
		</tr>
		<tr>
			<th><label>Descrição: </label></th>
			<td colspan="3"><textarea id="fldDescription" name="fldDescription" cols="60" rows="7"></textarea></td>
		</tr>
		<tr>
			<td colspan="4" align="right">
				<input type="button" value="Inserir Novo Projeto"
					onclick="app.sendForm('project_form', function(data){
						app.openPage('view/project.list.php', '#projects_content');
						alert(data);
					})" />
			</td>
		</tr>
	</table>
</form>

<script type="text/javascript">
$(function() {
	$("#fldStart").datepicker();
	$("#fldStart").datepicker('option', {dateFormat: 'dd/mm/yy'});
	$("#fldEnd").datepicker();
	$("#fldEnd").datepicker('option', {dateFormat: 'dd/mm/yy'});
});
</script>