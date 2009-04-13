<?php
	$incCustomApplicationService = "../model/business/CustomApplicationService.php";
	if(!file_exists($incCustomApplicationService))
		$incCustomApplicationService = "model/business/CustomApplicationService.php";
	
    require_once($incCustomApplicationService);
	
	$app = new CustomApplicationService();
	$listProjects = $app->getAllSky_project();
	
	foreach($listProjects as $project) :
?>
<?php
	echo "> <a href=\"";
	echo "javascript: app.openPage('view/project.detail.php?projectId={$project->sky_id}', '#internal')\">";
	echo utf8_encode($project->sky_name);
	echo "</a>";
?>
<br /><br />
<?php endforeach; ?>