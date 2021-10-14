<?php

	$viewBag["titulo"] = "Criar nova conta";
	$viewBag["MVC_JS"][] = "assets/js/formulario.js";

?>
	<section class="container">
		<form method="POST" class="form-horizontal" role="form" action="json/criarConta" data-redirect="minhaConta/entrar">
			<div class="container">
				<div id="console" role="alert"></div>
			</div>
			<div class="container well well-lg col-md-8 col-md-offset-2">
				<fieldset>
					<legend><h1><?php echo $viewBag["titulo"] ?></h1></legend>
					<div class="form-group">
						<label class="control-label col-md-2" for="prova_nome">Nome:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="prova_nome" name="prova_nome" placeholder="Digite seu nome" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="prova_email">Email:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="prova_email" name="prova_email" placeholder="Digite seu email" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="prova_senha">Senha:</label>
						<div class="col-md-10">
							<input type="password" class="form-control" id="prova_senha" name="prova_senha" placeholder="Digite sua senha" />
						</div>
					</div>
					<div class="form-group">
						<div class="checkbox col-md-10 col-md-offset-2">
							Já tem conta? <a href="minhaConta/entrar">Entrar</a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary form-control">Criar nova conta</button>
						</div>
					</div>
				</fieldset>
			</div>
		</form>
	</section>
