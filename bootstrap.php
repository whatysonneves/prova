<?php

session_start();
header("Content-Type: text/html; Charset=UTF-8");

define("CONTROLLER_DEFAULT", "home");
define("ACTION_DEFAULT", "index");
define("DS", DIRECTORY_SEPARATOR);
define("DIR", dirname(__FILE__).DS);
define("DEFAULT_URL", Core::scheme()."://".Core::server()."/");

$viewBag["site_titulo"] = "Prova Simulado de Arrais Amador e Motonauta";
$VIEW = "";
$layout = true;

if(Core::isLocal()) {
	// banco de dados
	define("MYSQLI_HOST", "localhost");
	define("MYSQLI_PORT", 3308);
	define("MYSQLI_USER", "root");
	define("MYSQLI_PASS", "");
	define("MYSQLI_DB", "prova");

	// assets
	$viewBag["MVC_CSS"][] = "assets/css/bootstrap.min.css";
	$viewBag["MVC_CSS"][] = "assets/css/font-awesome.min.css";
	$viewBag["MVC_CSS"][] = "assets/roboto/roboto.css";
	$viewBag["MVC_JS"][] = "assets/js/jquery.min.js";
	$viewBag["MVC_JS"][] = "assets/js/bootstrap.min.js";
} else {
	// banco de dados
	define("MYSQLI_HOST", "");
	define("MYSQLI_PORT", "");
	define("MYSQLI_USER", "");
	define("MYSQLI_PASS", "");
	define("MYSQLI_DB", "");

	// assets
	// $viewBag["MVC_CSS"][] = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css";
	$viewBag["MVC_CSS"][] = "https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css";
	$viewBag["MVC_CSS"][] = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css";
	$viewBag["MVC_JS"][] = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js";
	$viewBag["MVC_JS"][] = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
}
$viewBag["MVC_CSS"][] = "assets/css/main.css";
$viewBag["MVC_JS"][] = "assets/js/main.js";

function __autoload($nome) {
	// $nome = str_ireplace("\\", DS, $nome);
	$nome = DIR."lib".DS.$nome.".php";
	require_once $nome;
}
