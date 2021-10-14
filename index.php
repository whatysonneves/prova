<?php

// carrega autoload
require_once "bootstrap.php";

new Core;
new GetController;
new GetView;

if($layout) {
	include DIR."Views/layout.php";
} else {
	echo $VIEW;
}
