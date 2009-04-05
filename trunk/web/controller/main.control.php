<?php
	//inicia sessão
    session_start();
	
	//recupera parametros passados via get
	if($_GET["target"]) $target = $_GET["target"];
	if($_GET["page"]) $page = $_GET["page"];
	
	//deve ser alterado de acordo com a mudança de domínio
    $host = "http://localhost/gtp/";
	$accessDeniedPage = "view/accessDenied.error.php";

	//verifica se a variável "accessPage" já existe na sessão, caso não exista ela é criada
	if(is_null($_SESSION["accessPage"]) || empty($_SESSION["accessPage"])) {
		$_SESSION["accessPage"] = array();
	}

	//inclui arquivo de permissoes
	require_once("permission.control.php");
	
	//salva última página que foi exibida em determinado alvo (div onde os dados serão mostrados)
	$_SESSION["accessPage"][$target] = $page;
	
	//Redireciona se não existir a variável $notRedirect setada.
	//Caso não exista, redireciona para a página cujo acesso foi solicitado.
	if(!isset($notRedirect)) {
		//variável $host está no arquivo permission.control.php
		header("Location: {$host}" . $page);
	}
?>