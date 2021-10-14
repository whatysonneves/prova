<?php

class Sessao {

	public $retorno;

	function __construct() {
	}

	public function run() {

		if(!Core::isPost()) {
			$this->retorno["status"] = false;
			$this->retorno["msg"][] = "Requisição não é POST";
			return;
		}

		if(array_key_exists("prova", $_SESSION)) {
			$this->retorno["status"] = false;
			$this->retorno["msg"][] = "Prova já foi solicitada";
			return;
		}

		$qtd = Core::POST("prova_qtd");

		$status = true;

		if(empty($qtd)) {
			$status = false;
			$msg[] = "Quantidade não deve estar vazio";
		} else {
			if(!is_numeric($qtd)) {
				$status = false;
				$msg[] = "Quantidade não está no formato válido";
			} else {
				$qtd = (int) $qtd;
				if($qtd <= 0) {
					$status = false;
					$msg[] = "Quantidade deve ser maior que zero";
				}
			}
		}

		if($status) {

			$_SESSION["prova"] = true;
			$_SESSION["perguntas"] = $this->get_perguntas($qtd);

			$this->retorno["status"] = true;
			$this->retorno["msg"][] = "Sessão registrada com sucesso";

		} else {
			$this->retorno["status"] = false;
			$this->retorno["msg"] = $msg;
		}

	}

	public function get_perguntas($qtd) {
		GetModel::load("DB");
		$conn = new DB();

		$query = sprintf(
			'SELECT p.id, p.titulo, group_concat(o.titulo, ":::", o.id, "**", o.correta) AS opcao FROM pergunta p
			INNER JOIN opcao o
			ON p.id = o.pergunta_id
			WHERE p.prova_id = 1%s
			GROUP BY p.id
			-- ORDER BY p.id ASC
			ORDER BY rand()
			LIMIT %s',
			"",
			$qtd
		);

		$pergunta = $conn->conn->query($query);
		while($perguntas = $pergunta->fetch_assoc()) {
			$questoes[] = array(
				"id" => $perguntas["id"],
				"pergunta" => $perguntas["titulo"],
				"opcoes" => $this->render_opcoes($perguntas["opcao"])
			);
		}
		shuffle($questoes);
		return $questoes;
	}

	public function render_opcoes($opcoes) {
		$pattern = "/(.+):::([0-9]{1,10})\*\*([0-1]),(.+):::([0-9]{1,10})\*\*([0-1]),(.+):::([0-9]{1,10})\*\*([0-1]),(.+):::([0-9]{1,10})\*\*([0-1])/i";
		$b = preg_match($pattern, $opcoes, $m);
		$c[] = array("id" => $m[2], "opcao" => $m[1], "correta" => (bool) $m[3]);
		$c[] = array("id" => $m[5], "opcao" => $m[4], "correta" => (bool) $m[6]);
		$c[] = array("id" => $m[8], "opcao" => $m[7], "correta" => (bool) $m[9]);
		$c[] = array("id" => $m[11], "opcao" => $m[10], "correta" => (bool) $m[12]);
		shuffle($c);
		return $c;
	}

}
