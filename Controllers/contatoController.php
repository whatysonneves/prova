<?php

class contato {

	public static function index() {
		global $viewBag;

		/**
		* Persistir os dados da sessão
		* Dados: nome e email
		*/
		@$nomeSESSION = $_SESSION["usuario"]["nome"];
		$nomeGET = Core::GET("nome");
		$nome = ( empty($nomeSESSION) ? ( empty($nomeGET) ? "" : $nomeGET ) : $nomeSESSION );
		$viewBag["prova_form"]["nome"] = ( empty($nome) ? "" : " value=\"".$nome."\"" );

		@$emailSESSION = $_SESSION["usuario"]["email"];
		$emailGET = Core::GET("email");
		$email = ( empty($emailSESSION) ? ( empty($emailGET) ? "" : $emailGET ) : $emailSESSION );
		$viewBag["prova_form"]["email"] = ( empty($email) ? "" : " value=\"".$email."\"" );

	}

}
