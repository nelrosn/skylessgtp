<link type="text/css" href="javascript/jquery/jqueryUI/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="javascript/jquery/jqueryUI/ui/ui.core.js"></script>
<script type="text/javascript" src="javascript/jquery/jqueryUI/ui/ui.datepicker.js"></script>

<h2>Novo Projeto</h2>
<form id="project_form" action="project.control.php">
	<input type="hidden" name="action" value="insert" />
	<table class="sky_form">
		<tr>
			<th><label>Nome: *</label></th>
			<td colspan="3"><input type="text" id="fldName" name="fldName" size="70" tabindex="1" /></td>
		</tr>
		<tr>
			<th><label>Cliente: </label></th>
			<td colspan="3">
				<select id="fldClient" name="fldClient" tabindex="2">
					<option value="0">-- Nenhum --</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><label>Início: *</label></th>
			<td><input type="text" id="fldStart" name="fldStart" tabindex="3" /></td>
			<th><label>Fim: *</label></th>
			<td><input type="text" id="fldEnd" name="fldEnd" tabindex="4" /></td>
		</tr>
		<tr>
			<th><label>Objetivos: *</label></th>
			<td colspan="3"><textarea id="fldObjectives" name="fldObjectives" cols="60" rows="7" tabindex="5"></textarea></td>
		</tr>
		<tr>
			<th><label>Descrição: *</label></th>
			<td colspan="3"><textarea id="fldDescription" name="fldDescription" cols="60" rows="7" tabindex="6"></textarea></td>
		</tr>
		<tr>
			<td colspan="4" align="right">
				<input type="button" value="Inserir Novo Projeto"  tabindex="7"
					onclick="javascript: submitProjectForm()" />
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

function submitProjectForm() {
	var invalidElement = validateRequired([	"fldName",
									"fldStart",
									"fldEnd",
									"fldObjectives",
									"fldDescription"	]);
	
	if(invalidElement === null) {
		app.sendForm('project_form', function(data){
			app.openPage('view/project.list.php', '#projects_content');
			alert(data);
			$('#project_form')[0].reset();
		});
	} else {
		alert("Por favor, preencha todos os campos obrigatórios.");
		invalidElement.focus();
	}
}

function validateRequired(fields) {
	var notFound = true;
	var firstElement = null;
	for(var i = 0; i < fields.length; i++) {
		var field = $("#" + fields[i]);
		
		// seta a cor padrão das bordas
		field.css("border", "1px solid #BBB");
		if( jQuery.trim(field.attr("value")).length <= 0 ) {
			if(notFound) {
				notFound = false;
				firstElement = field;
			}
			
			//marca com vermelho a borda dos campos inválidos
			field.css("border", "1px solid red");
		}
	}
	return firstElement;
}
</script>