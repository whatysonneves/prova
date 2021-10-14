<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8" />
	<base href="<?php echo DEFAULT_URL ?>" />
	<title><?php echo ( array_key_exists("titulo", $viewBag) ? $viewBag["titulo"]." - " : "" ).$viewBag["site_titulo"] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
