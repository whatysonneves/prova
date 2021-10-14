<?php

class Usuario {

	function __construct() {
	}

	public static function verificaUsuario() {
		return array_key_exists("usuario", $_SESSION);
	}

	public static function login() {

		// conecta ao banco
		GetModel::load("DB");
		$conn = new DB();
		$conn = $conn->conn;

		// variáveis
		$email = Core::POST("prova_email");
		$senha = Core::POST("prova_senha");
		$status = true;

		if(empty($email)) {
			$status = false;
			$msg[] = "Email não deve estar vazio";
		} else {
			if(!preg_match("/^([\w\-\.\+]+)@(([\w\-]+)(\.[\w]+)+)$/i", $email)) {
				$status = false;
				$msg[] = "Email digitado é inválido";
			}
		}

		if(empty($senha)) {
			$status = false;
			$msg[] = "Senha não deve estar vazia";
		} else {
			if(strlen($senha) < 7) {
				$status = false;
				$msg[] = "Senha deve ser maior que 8 caracteres";
			}
		}

		if($status) {
			GetModel::load("Criptografia");
			$query = sprintf(
				'SELECT id, nome, prioridade FROM usuario WHERE email = "%s" AND senha = "%s" LIMIT 1',
				$email,
				Criptografia::password(45, $senha)
			);
			$verifica = $conn->query($query);
			if($verifica) {
				if($verifica->num_rows > 0) {
					$dados = $verifica->fetch_assoc();
					$_SESSION["usuario"]["id"] = $dados["id"];
					$_SESSION["usuario"]["nome"] = $dados["nome"];
					$_SESSION["usuario"]["email"] = $email;
					$_SESSION["usuario"]["prioridade"] = $dados["prioridade"];
					$retorno["status"] = true;
					$retorno["msg"] = "Logado com sucesso";
				} else {
					$retorno["status"] = false;
					$retorno["msg"][] = "Usuário não encontrado";
				}
			} else {
				$retorno["status"] = false;
				$retorno["msg"][] = "Houve um erro com o banco de dados ao inserir";
			}
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = $msg;
		}

		return $retorno;

	}

	public static function criarConta() {

		// conecta ao banco
		GetModel::load("DB");
		$conn = new DB();
		$conn = $conn->conn;

		// variáveis
		$nome = Core::POST("prova_nome");
		$email = Core::POST("prova_email");
		$senha = Core::POST("prova_senha");
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
			} else {
				$query = sprintf(
					'SELECT id FROM usuario WHERE email = "%s" LIMIT 1',
					$email
				);
				$verifica = $conn->query($query);
				if($verifica) {
					if($verifica->num_rows > 0) {
						$status = false;
						$msg[] = "Usuário já cadastrado";
					}
				} else {
					$status = false;
					$msg[] = "Houve um erro com o banco de dados ao verificar";
				}
			}
		}

		if(empty($senha)) {
			$status = false;
			$msg[] = "Senha não deve estar vazia";
		} else {
			if(strlen($senha) < 7) {
				$status = false;
				$msg[] = "Senha deve ser maior que 8 caracteres";
			}
		}

		if($status) {
			GetModel::load("Criptografia");
			$query = sprintf(
				'INSERT INTO usuario(nome, email, senha, dt_insert, dt_update, prioridade) VALUES ("%s", "%s", "%s", NOW(), NOW(), 2)',
				$nome,
				$email,
				Criptografia::password(45, $senha)
			);
			$insere = $conn->query($query);
			if($insere) {
				if($conn->insert_id == 1) {
					$conn->query("UPDATE usuario SET prioridade = 1 WHERE id = 1");
				}
				$retorno["status"] = true;
				$retorno["msg"] = "Usuário cadastrado com sucesso";
			} else {
				$retorno["status"] = false;
				$retorno["msg"][] = "Houve um erro com o banco de dados ao inserir";
			}
		} else {
			$retorno["status"] = false;
			$retorno["msg"] = $msg;
		}

		return $retorno;

	}

}
