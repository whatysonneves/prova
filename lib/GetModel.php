<?php

class GetModel {

	function __construct() {
	}

	public static function load($nome) {
		$model = DIR."Models".DS.$nome.".php";
		if(file_exists($model)) {
			require_once $model;
		} else {
			header("Location: ".DEFAULT_URL."error?erro=model-not-found&model=".$nome);
			exit;
		}
	}

}
