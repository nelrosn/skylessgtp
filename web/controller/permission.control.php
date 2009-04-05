<?php
	$includeFile = "model/business/CustomApplicationService.php";
	if(!file_exists($includeFile)) {
		$includeFile = "../model/business/CustomApplicationService.php";
	}
	require_once($includeFile);
	
	//cria arrays de permissão
	$hasPermission = array();
	$hasPermission[StakeHolderDAO::$PERMISSION_DIRECTOR] = array();
	$hasPermission[StakeHolderDAO::$PERMISSION_MANAGER]  = array();
	$hasPermission[StakeHolderDAO::$PERMISSION_ANALYST]  = array();
	$hasPermission[StakeHolderDAO::$PERMISSION_EXECUTOR] = array();
	
	//configura permissões
	$hasPermission[StakeHolderDAO::$PERMISSION_DIRECTOR][] = $host . "view/default.php";
	$hasPermission[StakeHolderDAO::$PERMISSION_MANAGER][]  = $host . "view/default.php";
	$hasPermission[StakeHolderDAO::$PERMISSION_ANALYST][]  = $host . "view/default.php";
	$hasPermission[StakeHolderDAO::$PERMISSION_EXECUTOR][] = $host . "view/default.php";
	
	$hasPermission[StakeHolderDAO::$PERMISSION_DIRECTOR][] = $host . "view/project.form.php";
	$hasPermission[StakeHolderDAO::$PERMISSION_DIRECTOR][] = $host . "view/project.list.php";
	
	//pega usuario da sessao
	$userSession = unserialize($_SESSION["user"]);
	$userPermission = $userSession ? $userSession->sky_responsibility_id : NULL;
	
	//verifica permissões para a página acessada
	if(!isset($notRedirect) && (is_null($userPermission) || !in_array("{$host}{$page}", $hasPermission[$userPermission]))) {
		$_SESSION["accessPage"][$target] = "{$host}{$accessDeniedPage}";
		header("Location: {$host}{$accessDeniedPage}");
		exit;
	}
?>