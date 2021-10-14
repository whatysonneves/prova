<?php

/**
*
* Classe padrão para MVC
* Trabalha a URL sem extensão dos arquivos
* Trabalha o GET no novo padrão do rewrite
* @author Whatyson Neves <whatyson@promasters.net.br>
* @version 1.0
*
*/

class Core {

	private static $Controller;
	private static $Action;

	public function __construct() {
		self::setControllerAction();
		self::setGet();
	}

	public static function ip() {
		return ( $_SERVER["REMOTE_ADDR"] == "::1" ? "127.0.0.1" : $_SERVER["REMOTE_ADDR"] );
	}

	public static function referer() {
		return ( empty($_SERVER["HTTP_REFERER"]) ? "" : $_SERVER["HTTP_REFERER"] );
	}

	public static function scheme() {
		return ( empty($_SERVER["REQUEST_SCHEME"]) ? "http" : $_SERVER["REQUEST_SCHEME"] );
	}

	public static function server() {
		@$a = $_SERVER["SERVER_NAME"];
		@$b = $_SERVER["HTTP_HOST"];
		if(empty($a)) {
			if(empty($b)) {
				$a = "localhost";
			} else {
				$a = $b;
			}
		}
		return $a;
	}

	public static function isPost() {
		return ( $_SERVER["REQUEST_METHOD"] == "GET" ? false : true );
	}

	public static function isLocal() {
		// return ( self::server() != "localhost" ? ( self::server() != "servidor" ? false : true ) : true );
		return ( self::server() != "localhost" ? ( !preg_match("/^dev\./i", self::server()) ? false : true ) : true );
	}

	public static function POST($query = "") {
		return ( empty($query) ? $_POST : ( array_key_exists($query, $_POST) ? Core::filter($_POST[$query]) : "" ) );
	}

	public static function GET($query = "") {
		return ( empty($query) ? $_GET : ( array_key_exists($query, $_GET) ? Core::filter($_GET[$query]) : "" ) );
	}

	public static function filter($str = "") {
		return addslashes($str);
	}

	public static function getController() {
		return self::$Controller;
	}

	public static function getAction() {
		return self::$Action;
	}

	private static function setControllerAction() {
		$controller = ( defined("CONTROLLER_DEFAULT") ? CONTROLLER_DEFAULT : "index" );
		@$q = (
			@empty($_SERVER["QUERY_STRING"]) ? $controller : (
				preg_match("/\=/i", $_SERVER["QUERY_STRING"]) ? $controller : (
					( preg_match("/\?/i", $_SERVER["QUERY_STRING"]) ? $controller : $_SERVER["QUERY_STRING"] )
				)
			)
		);
		$q = preg_replace("/(\/){2,}/i", "/", $q);
		$q = preg_replace("/(\/)$/i", "", $q);
		$q = explode("/", $q);
		self::$Controller = ( @empty($q[0]) ? $controller : $q[0] );
		self::$Action = ( @empty($q[1]) ? ACTION_DEFAULT : $q[1] );
	}

	private static function setGet() {
		$a = $_SERVER["REQUEST_URI"];
		if(substr_count($a, "?") === 1) {
			$p = "/\?(.*)/i";
		} else {
			$p = "/\?(.*?)\?/i";
		}
		preg_match($p, $a, $m);
		if(!empty($m)) {
			$m = $m[1];
			parse_str($m, $_GET);
		} else {
			$_GET = array();
		}
		return $_GET;
	}

	public static function renderCSS() {
		global $viewBag;
		$return = "";
		foreach($viewBag["MVC_CSS"] as $v) {
			$return .= "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"".$v."\" />\n";
		}
		return $return;
	}

	public static function renderJS() {
		global $viewBag;
		$return = "";
		foreach($viewBag["MVC_JS"] as $v) {
			$return .= "\t<script language=\"javascript\" type=\"text/javascript\" src=\"".$v."\"></script>\n";
		}
		return $return;
	}

}
