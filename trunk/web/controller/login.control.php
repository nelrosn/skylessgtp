<?php
	require_once( "../model/business/CustomApplicationService.php" );
	require_once( "../model/business/EventActions.php" );
	
	$app = new CustomApplicationService();
	$user = new Sky_stakeholderVO();
	$user->sky_login = $_GET["user"];
	$user->sky_password = $_GET["password"];
	$user = $app->getMatchStakeHolder($user);
	
	if( !is_null($user) ) {
		$user->sky_password = '';
		
		$target = "#content";
		$page = "view/default.php";
		$notRedirect = true;
		require_once("main.control.php");
		
		$_SESSION["user"] = serialize($user);

		$app->registerEvent(EventActions::$LOGIN, $user->sky_name);

		echo "{logged: true, teste: '" . $_SESSION["user"] . "'}";
		exit;
	}
	echo "{logged: false}";
?>