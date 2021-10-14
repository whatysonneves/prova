<?php

	$viewBag["titulo"] = "Fale conosco";
	$viewBag["MVC_JS"][] = "assets/js/formulario.js";

?>
	<section class="container">
		<form method="POST" class="form-horizontal" role="form" action="json/enviarMensagem" data-redirect="false">
			<div class="container">
				<div id="console" role="alert"></div>
			</div>
			<div class="container well well-lg">
				<fieldset>
					<legend><h1><?php echo $viewBag["titulo"] ?></h1></legend>
					<div class="form-group">
						<label class="control-label col-md-2" for="prova_nome">Nome:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="prova_nome" name="prova_nome" placeholder="Digite seu nome"<?php echo $viewBag["prova_form"]["nome"] ?> />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="prova_email">Email:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="prova_email" name="prova_email" placeholder="Digite seu email"<?php echo $viewBag["prova_form"]["email"] ?> />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="prova_msg">Mensagem:</label>
						<div class="col-md-10">
							<textarea class="form-control" id="prova_msg" name="prova_msg" rows="5" placeholder="Diga-nos, o que precisa?"></textarea>
						</div>
					</div>
					<!-- <div class="form-group">
						<div class="checkbox col-md-10 col-md-offset-2">
							<label><input type="checkbox" name="prova_lembrar" value="S" /> Lembrar meus dados</label>
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary form-control">Enviar mensagem</button>
						</div>
					</div>
				</fieldset>
			</div>
		</form>
	</section>
