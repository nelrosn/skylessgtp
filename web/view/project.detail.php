<style>
	label {
		font-weight: bold;
	}
	#dataProject {
		line-height: 25px;
	}
</style>

<h2>Detalhes do projeto</h2>

<?php
	$incCustomApplicationService = "../model/business/CustomApplicationService.php";
	if(!file_exists($incCustomApplicationService))
		$incCustomApplicationService = "model/business/CustomApplicationService.php";

    require_once($incCustomApplicationService);
	
	$projectId = $_GET["projectId"];
	$app = new CustomApplicationService();
	$project = $app->getOneSky_project($projectId);
	$client = $project->sky_applicant_id > 0 ? $app->getOneSky_stakeholder($project->sky_applicant_id) : null;
?>
<br />
<div id="dataProject">
	<label>Nome: </label>
	<?php echo utf8_encode($project->sky_name); ?><br />
	<label>Cliente: </label>
	<?php echo utf8_encode(!is_null($client) ? $client->sky_name : "Nenhum"); ?><br />
	<label>Início: </label>
	<?php
		$dateStart = new DateTime($project->sky_start);
		echo $dateStart->format("d/m/Y");
	?><br />
	<label>Fim: </label>
	<?php
		$dateEnd = new DateTime($project->sky_end);
		echo $dateEnd->format("d/m/Y");
	?><br /><br />
	<label>Objetivos: </label><br />
	<?php echo utf8_encode($project->sky_objectives); ?><br /><br />
	<label>Detalhes: </label><br />
	<?php echo utf8_encode($project->sky_description); ?><br />
</div>
<script type="text/javascript">
	$("#ui-datepicker-div").remove()
</script>