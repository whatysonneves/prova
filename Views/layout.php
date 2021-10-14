<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8" />
	<title><?php echo ( array_key_exists("titulo", $viewBag) ? $viewBag["titulo"]." - " : "" ).$viewBag["site_titulo"] ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="<?php echo $viewBag["site_descricao"] ?>" />
	<meta name="keywords" content="Arrais, Prova Arrais, Simulado Arrais, Simulado Online Arrais, Prova Simulado Arrais, Prova Simulado Online Arrais, Testar conhecimento para prova de Arrais, Arrais Amador, Prova Arrais Amador, Simulado Arrais Amador, Simulado Online Arrais Amador, Prova Simulado Arrais Amador, Prova Simulado Online Arrais Amador, Testar conhecimento para prova de Arrais Amador, Motonauta, Prova Motonauta, Simulado Motonauta, Simulado Online Motonauta, Prova Simulado Motonauta, Prova Simulado Online Motonauta, Testar conhecimento para prova de Motonauta" />
	<meta property="og:title" content="<?php echo ( array_key_exists("titulo", $viewBag) ? $viewBag["titulo"]." - " : "" ).$viewBag["site_titulo"] ?>" />
	<meta property="og:site_name" content="<?php echo $viewBag["site_titulo"] ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<?php echo $viewBag["site_descricao"] ?>" />
	<meta property="og:locale" content="pt-BR" />
	<meta property="og:url" content="<?php echo DEFAULT_URL.preg_replace("/^\//i", "", $_SERVER["REQUEST_URI"]) ?>" />
	<meta property="og:image" content="<?php echo DEFAULT_URL ?>assets/imgs/lancha.jpg" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="1280" />
	<meta property="og:image:height" content="720" />
	<meta property="og:image:alt" content="Foto de uma lancha em uma praia de água clara" />
	<meta property="og:image" content="<?php echo DEFAULT_URL ?>assets/imgs/jet-ski.jpg" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="1280" />
	<meta property="og:image:height" content="720" />
	<meta property="og:image:alt" content="Foto de uma manobra legal em uma motoaquática em água escura" />
	<base href="<?php echo DEFAULT_URL ?>" />
<?php echo Core::renderCSS() ?>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top menu">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navMobileFirst">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home">Prova Online</a>
			</div>
			<div class="collapse navbar-collapse" id="navMobileFirst">
				<ul class="nav navbar-nav">
<?php if(array_key_exists("usuario", $_SESSION)) { ?>
					<li<?php echo ( Core::getController() == "prova" ? " class=\"active\"" : "" ) ?>><a href="prova">Simulado</a></li>
<?php } ?>
					<li<?php echo ( Core::getController() == "contato" ? " class=\"active\"" : "" ) ?>><a href="contato">Entre em contato</a></li>
				</ul>
<?php if(array_key_exists("usuario", $_SESSION)) { ?>
				<ul class="nav navbar-nav navbar-right">
					<li<?php echo ( (Core::getController() == "minhaConta") ? (Core::getAction() == "dashboard") ? " class=\"active\"" : "" : "" ) ?>><a href="minhaConta/dashboard">Dashboard</a></li>
					<li><a href="minhaConta/sair">Sair</a></li>
				</ul>
				<p class="navbar-text navbar-right">Logado como <?php echo $_SESSION["usuario"]["nome"] ?>&nbsp;</p>
<?php } else { ?>
				<ul class="nav navbar-nav navbar-right">
					<li<?php echo ( (Core::getController() == "minhaConta") ? (Core::getAction() == "entrar") ? " class=\"active\"" : "" : "" ) ?>><a href="minhaConta/entrar">Entrar</a></li>
					<li<?php echo ( (Core::getController() == "minhaConta") ? (Core::getAction() == "criar") ? " class=\"active\"" : "" : "" ) ?>><a href="minhaConta/criar">Criar Conta</a></li>
				</ul>
<?php } ?>
			</div>
		</div>
	</nav>

<?php echo $VIEW; ?>

	<footer class="text-right well index">
		<div class="container">
			<a href="home"><?php echo $viewBag["site_titulo"] ?></a> - Copyright &copy; <?php echo date("Y") ?> <a href="https://whatysonneves.com/" target="_blank">Whatyson Neves</a>
		</div>
	</footer>

	<script type="text/javascript" language="javascript">
		var baseURL = "<?php echo DEFAULT_URL ?>";
	</script>

<?php echo Core::renderJS() ?>

</body>
</html>
