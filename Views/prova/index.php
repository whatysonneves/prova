<?php

$viewBag["titulo"] = "Prova Online";
$viewBag["MVC_JS"][] = "assets/js/validar-prova.js";

$perguntas = $_SESSION["perguntas"];

?>
	<section>
		<form class="validaForm">
<?php foreach($perguntas as $i => $v) { ?>
			<div class="container pergunta" data-pergunta="<?php echo $i ?>">
				<h3><?php echo ($i + 1).". ".$v["pergunta"] ?></h3>
<?php foreach($v["opcoes"] as $io => $o) { ?>
				<div class="radio well well-sm">
					<label><input type="radio" name="resposta_<?php echo $i ?>" value="<?php echo $io ?>"> <?php echo trim($o["opcao"]) ?></label>
				</div>
<?php } ?>
				<button type="button" class="btn btn-primary form-control" id="btn-validar">Validar</button><br /><br />
				<div id="console" role="alert"></div>
			</div>
<?php } ?>
		<div class="container">
			<a href="prova/sair" class="btn btn-primary form-control">Finalizar</a>
		</div>
		</form>
	</section>

	<div class="navbar navbar-fixed-bottom text-center contador">
		<div class="row">
			<div class="col-md-6 col-xs-6"><h4>Acertos <span class="label label-success" id="contadorAcertos">0</span></h4></div>
			<div class="col-md-6 col-xs-6"><h4>Erros <span class="label label-danger" id="contadorErros">0</span></h4></div>
		</div>
	</div>

	<div class="navbar-bottom-hack"></div>

	<script type="text/javascript">
		var $respostas = '<?php echo @json_encode($_SESSION["respostas"]) ?>';
	</script>
