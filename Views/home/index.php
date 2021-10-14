<?php

	$viewBag["titulo"] = "Seja bem vindo";

?>
	<section class="container">
		<div class="col-md-5 well">
			<h1>Faça online</h1>
			<p>Faça quantos simulados você quiser, a única coisa que pedimos é que você tenha uma conta.</p>
			<p>Disponível mais de 200 questões para atestar seus conhecimentos.</p>
			<p>
				Está esperando o que?
				<a href="minhaConta/criar">Crie</a> sua agora mesmo ou, se você já tiver conta, <a href="minhaConta/entrar">entre</a>.
			</p>
		</div>
		<div class="col-md-7 well">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="assets/imgs/jet-ski.jpg" alt="jet-ski">
						<div class="carousel-caption">
							<h3>MOTONAUTA</h3>
							<p>Quem está tirando carteira de habilitação de motonauta.</p>
						</div>
					</div>

					<div class="item">
						<img src="assets/imgs/lancha.jpg" alt="lancha">
						<div class="carousel-caption">
							<h3>ARRAIS-AMADOR</h3>
							<p>Quem está tirando carteira de habilitação de arrais-amador.</p>
						</div>
					</div>

				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Próxima</span>
				</a>
			</div>
		</div>
	</section>
