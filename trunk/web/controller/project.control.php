<?php
    require_once( "../model/business/CustomApplicationService.php" );
	require_once( "../model/business/EventActions.php" );
	
	//recebe dados passados pelo formulário
	$name		 = $_POST["fldName"];
	$client		 = $_POST["fldClient"] > 0 ? $_POST["fldClient"] : NULL;
	$start		 = urldecode($_POST["fldStart"]);
	$end		 = urldecode($_POST["fldEnd"]);
	$objectives  = $_POST["fldObjectives"];
	$description = $_POST["fldDescription"];

	//recebe dados de período e monta para o banco de dados
	$dateStart = explode("/", $start);
	$dateStart = $dateStart[2] . "-" . $dateStart[1] . "-" . $dateStart[0];
	$dateEnd = explode("/", $end);
	$dateEnd = $dateEnd[2] . "-" . $dateEnd[1] . "-" . $dateEnd[0];
	
	//recupera informações do usuário logado na sessão
	session_start();
	$user = unserialize($_SESSION["user"]);
	
	//cria objeto de acesso ao banco de dados
	$app = new CustomApplicationService();

	//cria objeto de projeto
	$project = new Sky_projectVO();
	$project->sky_creator_id	= $user->sky_id;
	$project->sky_name			= urldecode($name);
	$project->sky_start			= substr($dateStart, 2);
	$project->sky_end			= substr($dateEnd, 2);
	$project->sky_status		= 1; //Status Criado //deve ser substituído por um constante futuramente
	$project->sky_applicant_id = (isset($client) && !empty($client) && !is_null($client)) ? $client : "null";
	$project->sky_objectives	= urldecode($objectives);
	$project->sky_description	= urldecode($description);
	$project->sky_project_id	= "null";
	
	//Grava projeto no banco de dados
	$newProject = $app->createSky_project($project);
	
	//Monta resposta
	$eventDescription = "Nome do projeto: " . $project->sky_name;
	$eventDescription .= "\nCriador: " . $user->sky_id;
	$eventDescription .= "\nInício: " . $project->sky_start;
	$eventDescription .= "\nFim: " . $project->sky_end;
	$eventDescription .= "\nStatus: " . $project->sky_status;
	$eventDescription .= "\nCliente: " . $project->sky_applicant_id;
	$eventDescription .= "\nObjetivos: " . $project->sky_objectives;
	$eventDescription .= "\nDescription: " . $project->sky_description;
	//$eventDescription .= "\nProjeto pai: " . $project->sky_project_id;
	
	//verifica se o projeto foi gravado
	if(isset($newProject) && !is_null($newProject) && !empty($newProject)) {
		$eventDescription = "Projeto criado com sucesso!\n" . $eventDescription;
		
		//registra evento em caso de sucesso
		$app->registerEvent(EventActions::$PROJECT_CREATED, $eventDescription, $newProject->sky_id, CustomApplicationService::$TABLE_PROJECT);
		echo "\"Projeto " . $newProject->sky_id . " criado com sucesso!\"";
	} else {
		$eventDescription = "Erro ao criar projeto!\n" . $eventDescription;
		
		//registra evento em caso de falha
		$app->registerEvent(EventActions::$PROJECT_CREATION_ERROR, $eventDescription);
		echo "\"Ocorreu um erro durante a criação do projeto!\"";
	}
?>