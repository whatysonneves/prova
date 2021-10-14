<?php

class json {

	public static function registrar() {
		global $viewBag;
		GetModel::load("Sessao");
		$viewBag["registrar"] = new Sessao();
		$viewBag["registrar"]->run();
		$viewBag["registrar"] = $viewBag["registrar"]->retorno;
	}

	public static function validarPergunta() {

		global $viewBag;

		$pergunta = (int) Core::POST("pergunta");
		$opcao = (int) Core::POST("opcao");

		if(!array_key_exists("perguntas", $_SESSION)) {
			$viewBag["validarPergunta"]["status"] = false;
			$viewBag["validarPergunta"]["msg"][] = "Problema com a sessão";
			return;
		}

		$opcoes = $_SESSION["perguntas"][$pergunta]["opcoes"];

		foreach($opcoes as $k => $v) {
			if($v["correta"]) {
				$correta = (int) $k;
			}
		}

		$_SESSION["respostas"][$pergunta]["resposta"] = $opcao;
		$_SESSION["respostas"][$pergunta]["correta"] = $correta;

		$viewBag["validarPergunta"]["status"] = true;
		$viewBag["validarPergunta"]["resposta"] = $opcao;
		$viewBag["validarPergunta"]["correta"] = $correta;

	}

	public static function login() {
		global $viewBag;
		GetModel::load("Usuario");
		$viewBag["login"] = Usuario::login();
	}

	public static function criarConta() {
		global $viewBag;
		GetModel::load("Usuario");
		$viewBag["criarConta"] = Usuario::criarConta();
	}

	public static function enviarMensagem() {

		global $viewBag;

		// variáveis
		$nome = Core::POST("prova_nome");
		$email = Core::POST("prova_email");
		$texto = Core::POST("prova_msg");
		$status = true;

		// regras
		if(empty($nome)) {
			$status = false;
			$msg[] = "Nome não deve estar vazio";
		}

		if(empty($email)) {
			$status = false;
			$msg[] = "Email não deve estar vazio";
		} else {
			if(!preg_match("/^([\w\-\.\+]+)@(([\w\-]+)(\.[\w]+)+)$/i", $email)) {
				$status = false;
				$msg[] = "Email digitado é inválido";
			}
		}

		if(empty($texto)) {
			$status = false;
			$msg[] = "Mensagem não deve estar vazia";
		} else {
			if(str_word_count($texto) <= 2) {
				$status = false;
				$msg[] = "Mensagem deve ter mais que duas palavras";
			}
		}

		if($status) {
			GetModel::load("DB");
			$conn = new DB();
			$conn = $conn->conn;
			$query = sprintf(
				'INSERT INTO mensagens(nome, email, msg, ip, referer, dt_insert) VALUES ("%s", "%s", "%s", "%s", "%s", NOW())',
				$nome,
				$email,
				$texto,
				Core::ip(),
				Core::filter(Core::referer())
			);
			$insere = $conn->query($query);
			if($insere) {
				$retorno["status"] = true;
				$retorno["msg"] = "Mensagem enviada com sucesso";
			} else {
				$retorno["status"] = false;
				$retorno["msg"][] = "Houve um erro em nosso sistema, tente novamente mais tarde";
			}
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = $msg;
		}

		$viewBag["enviarMensagem"] = $retorno;

	}

}
