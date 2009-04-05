<?php

	require_once("model/gem/vo/Sky_stakeholderVO.php");
	session_start();
?>
<html>
	<head>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<link rel="stylesheet" type="text/css" href="stylesheet/default.css">
		
		<script type="text/javascript" charset="UTF-8" src="javascript/jquery/jquery-1.3.2.js"></script>
		<script type="text/javascript" charset="UTF-8" src="javascript/library/others/urlmanipulation.js"></script>
		<script type="text/javascript" charset="UTF-8" src="javascript/library/Application.js"></script>
		<script type="text/javascript">
			var app = new Application();
		</script>
		
		<title>GERENCIADOR DE TAREFAS</title>
	</head>
	<body>
		<div id="top">
			<h2>GTP</h2>
		</div>
		<div id="content">
			<?php
				$user = unserialize($_SESSION["user"]);
				if(!$user) {
					require_once("view/login.form.php");
				} else {
					//Necessário para quando o browser for atualizado com F5 não perder a página que estava aberta
					require_once($_SESSION["accessPage"]["#content"]);
				}
			?>
		</div>
		<div id="footer"></div>
	</body>
</html>