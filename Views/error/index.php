<?php

header("HTTP/1.0 404 Not Found");
$viewBag["titulo"] = "Página não encontrada";

?>
	<section class="error">
		<!-- hack para navbar não sobrescrever conteúdo -->
		<div class="navbar-hack"></div>
		<div class="container">
			<div class="jumbotron">
				<h1>Oooops! Página não encontrada.</h1>
				<p>A página solicitada não foi encontrada. Tente ir para a página inicial.</p>
				<p><a href="" class="btn btn-primary btn-lg">Ir para a página inicial</a></p>
			</div>
		</div>
	</section>
