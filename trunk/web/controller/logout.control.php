<?php
	require_once( "../model/business/CustomApplicationService.php" );
	require_once( "../model/business/EventActions.php" );
	
	session_start();
	session_destroy();
	$user = unserialize($_SESSION["user"]);
		
	$app = new CustomApplicationService();
	$app->registerEvent(EventActions::$LOGOUT, $user->sky_name);
	
	header("Location: ../index.php")
?>