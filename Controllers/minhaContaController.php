<?php

class minhaConta {

	public static function index() {
		global $viewBag;
		GetModel::load("Usuario");
		if(Usuario::verificaUsuario()) {
			header("Location: ".DEFAULT_URL."minhaConta/dashboard");
		} else {
			header("Location: ".DEFAULT_URL."minhaConta/entrar");
		}
		exit;
	}

	public static function dashboard() {
		global $viewBag;
		GetModel::load("Usuario");
		if(!Usuario::verificaUsuario()) {
			header("Location: ".DEFAULT_URL."minhaConta/entrar");
			exit;
		}
		if($_SESSION["usuario"]["prioridade"] == 1) {
			GetModel::load("DB");
			$conn = new DB();
			$conn = $conn->conn;

			$mensagens = $conn->query("SELECT nome, email, msg, ip, referer, dt_insert FROM mensagens ORDER BY id DESC");
			if($mensagens) {
				if($mensagens->num_rows) {
					$retorno["status"] = true;
					$retorno["msgs"] = $mensagens;
				} else {
					$retorno["status"] = false;
					$retorno["msg"] = "Nenhuma mensagem encontrada";
				}
			} else {
				$retorno["status"] = false;
				$retorno["msg"] = "Erro ao procurar as mensagens";
			}
			$viewBag["mensagens"] = $retorno;

			$usuarios = $conn->query("SELECT nome, email, dt_insert, dt_update, prioridade FROM usuario ORDER BY id DESC");
			if($usuarios) {
				if($usuarios->num_rows) {
					$retorno["status"] = true;
					$retorno["users"] = $usuarios;
				} else {
					$retorno["status"] = false;
					$retorno["msg"] = "Nenhum usuário cadastrado";
				}
			} else {
				$retorno["status"] = false;
				$retorno["msg"] = "Erro ao procurar os usuarios";
			}
			$viewBag["usuarios"] = $retorno;
		}
	}

	public static function entrar() {
		GetModel::load("Usuario");
		if(Usuario::verificaUsuario()) {
			header("Location: ".DEFAULT_URL."minhaConta/dashboard");
			exit;
		}
	}

	public static function criar() {
		GetModel::load("Usuario");
		if(Usuario::verificaUsuario()) {
			header("Location: ".DEFAULT_URL."minhaConta/dashboard");
			exit;
		}
	}

	public static function sair() {
		session_destroy();
		header("Location: ".DEFAULT_URL."minhaConta/entrar");
		exit;
	}

}
