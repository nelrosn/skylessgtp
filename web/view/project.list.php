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
	echo "<> <a href=\"#{$project->sky_id}\">" . $project->sky_name . "</a>";
?>
<br /><br />
<?php endforeach; ?>