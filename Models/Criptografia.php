<?php

class Criptografia {

	private $chave;
	private $iv_size;

	function __construct() {
		$this->chave = pack("H*", $this->password(32));
		$this->iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	}

	public static function password($salt, $a = "") {
		$a = $a."ProMasters";
		for($i = 0; $i < $salt; $i++) {
			$a = hash("SHA256", $a);
		}
		return $a;
	}

	public function encript($str) {
		$str = trim($str);
		$iv = mcrypt_create_iv($this->iv_size, MCRYPT_RAND);
		$str = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->chave, $str, MCRYPT_MODE_CBC, $iv);
		$str = $iv.$str;
		$str = base64_encode($str);
		return $str;
	}

	public function decript($str) {
		$str = base64_decode($str);
		$iv = substr($str, 0, $this->iv_size);
		$str = substr($str, $this->iv_size);
		$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->chave, $str, MCRYPT_MODE_CBC, $iv);
		return trim($str);
	}

}
