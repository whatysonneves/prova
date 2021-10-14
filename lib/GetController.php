<?php

class GetController {

	function __construct() {
		$this->run();
		$this->checkActionExists();
	}

	private function run() {
		$controller = DIR."Controllers".DS.Core::getController()."Controller.php";
		if(file_exists($controller)) {
			require_once $controller;
		} else {
			header("Location: ".DEFAULT_URL."error?erro=controller-not-found&controller=".Core::getController());
			exit;
		}
	}

	private function checkActionExists() {
		$controller = Core::getController();
		$action = Core::getAction();
		if(method_exists(new $controller, $action)) {
			// $controller::$action();
			eval("".$controller."::".$action."();");
		} else {
			header("Location: ".DEFAULT_URL."error?erro=action-not-found&controller=".$controller."&action=".$action);
			exit;
		}
	}

}
