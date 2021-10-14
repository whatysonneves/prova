<?php

	$viewBag["titulo"] = "Montar prova";
	$viewBag["MVC_JS"][] = "assets/js/formulario.js";

?>
	<section class="container">
		<form method="POST" class="form-horizontal" role="form" action="json/registrar" data-redirect="prova">
			<div class="container">
				<div id="console" role="alert"></div>
			</div>
			<div class="container well well-lg col-md-8 col-md-offset-2">
				<fieldset>
					<legend><h1><?php echo $viewBag["titulo"] ?></h1></legend>
					<div class="form-group">
						<label class="control-label col-md-2" for="prova_qtd">Quantidade:</label>
						<div class="col-md-10">
							<input type="number" class="form-control" id="prova_qtd" name="prova_qtd" placeholder="Quantidade de questões" />
							<small class="text-muted">Digite a quantidade de questões para exibir a prova.</small>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary form-control">Montar prova</button>
						</div>
					</div>
				</fieldset>
			</div>
		</form>
	</section>
