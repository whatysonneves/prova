<?php

class prova {

	public static function index() {
		// se já não tiver criado a prova, vai criar
		if(!array_key_exists("prova", $_SESSION)) {
			header("Location: ".DEFAULT_URL."prova/montarProva");
			exit;
		}
	}

	public static function montarProva() {

		// se já tiver criado a prova, vai para ela
		if(array_key_exists("prova", $_SESSION)) {
			header("Location: ".DEFAULT_URL."prova");
			exit;
		}

		// se não estiver logado, vai para o login
		GetModel::load("Usuario");
		if(!Usuario::verificaUsuario()) {
			header("Location: ".DEFAULT_URL."minhaConta/entrar");
			exit;
		}

	}

	public static function sair() {

		$usuario = $_SESSION["usuario"];

		session_destroy();
		session_start();

		$_SESSION["usuario"] = $usuario;

		header("Location: ".DEFAULT_URL."prova/montarProva");
		exit;

	}

}
