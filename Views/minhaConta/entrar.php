<?php

	$viewBag["titulo"] = "Entrar";
	$viewBag["MVC_JS"][] = "assets/js/formulario.js";

?>
	<section class="container">
		<form method="POST" class="form-horizontal" role="form" action="json/login" data-redirect="minhaConta/dashboard">
			<div class="container">
				<div id="console" role="alert"></div>
			</div>
			<div class="container well well-lg col-md-6 col-md-offset-3">
				<fieldset>
					<legend><h1><?php echo $viewBag["titulo"] ?></h1></legend>
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
							<!-- <label><input type="checkbox" name="prova_lembrar" value="S" /> Lembrar de mim neste computador</label><br /> -->
							Novo por aqui? <a href="minhaConta/criar">Criar sua conta</a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary form-control">Entrar</button>
						</div>
					</div>
				</fieldset>
			</div>
		</form>
	</section>
