<?php

class GetView {

	function __construct() {
		$this->checkViewExists();
	}

	private function checkViewExists() {
		global $viewBag, $VIEW, $layout;
		$file = DIR."Views".DS.Core::getController().DS.Core::getAction().".php";
		if(file_exists($file)) {
			ob_start();
			require_once $file;
			$VIEW = ob_get_contents();
			ob_end_clean();
		} else {
			header("Location: ".DEFAULT_URL."error?erro=view-not-found&controller=".Core::getController()."&action=".Core::getAction());
			exit;
		}
	}

}
