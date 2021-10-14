<?php

$viewBag["titulo"] = "Dashboard";

?>
	<section class="container">
		<h1>Seja bem vindo <?php echo $_SESSION["usuario"]["nome"] ?></h1>
		<p>Esta é sua área de usuário<?php echo ( $_SESSION["usuario"]["prioridade"] == 1 ? " e você é um administrador" : "" ) ?>.</p>
<?php if($_SESSION["usuario"]["prioridade"] == 2) { ?>
		Clique no botão abaixo e crie uma prova de simulado para testar seus conhecimentos.
		<div class="text-center">
			<a href="prova" class="btn btn-success form-control">Abrir novo simulado</a>
		</div>
<?php } else { ?>
<?php if($viewBag["mensagens"]["status"]) { ?>
		<div class="container">
			<button type="button" data-toggle="collapse" data-target="#mensagens" class="btn btn-primary form-control">Exibir mensagens recebidas</button>
		</div>
		<br />  
		<div id="mensagens" class="collapse">
<?php while($msgs = $viewBag["mensagens"]["msgs"]->fetch_assoc()) { ?>
			<div class="form-horizontal">
				<div class="container well">
					<fieldset>
						<legend><h4>Mensagem de <?php echo $msgs["nome"] ?></h4></legend>
						<div class="form-group">
							<label class="control-label col-md-2">Email:</label>
							<div class="col-md-10">
								<p class="form-control-static"><?php echo $msgs["email"] ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Mensagem:</label>
							<div class="col-md-10">
								<p class="form-control-static"><?php echo $msgs["msg"] ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Enviada em:</label>
							<div class="col-md-10">
								<p class="form-control-static"><?php echo date("d/m/Y \à\s H:i", strtotime($msgs["dt_insert"])) ?> de <?php echo $msgs["ip"] ?>.</p>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
<?php } ?>
		</div>
<?php } else { ?>
		<div class="container well">
			<h4><?php echo $viewBag["mensagens"]["msg"] ?></h4>
		</div>
<?php } ?>
<?php if($viewBag["usuarios"]["status"]) { ?>
		<div class="container">
			<button type="button" data-toggle="collapse" data-target="#usuarios" class="btn btn-info form-control">Exibir usuários cadastrados</button>
		</div>
		<br />  
		<div id="usuarios" class="collapse">
<?php while($users = $viewBag["usuarios"]["users"]->fetch_assoc()) { ?>
			<div class="form-horizontal">
				<div class="container well">
					<fieldset>
						<legend><h4>Usuário <?php echo $users["nome"].( $users["prioridade"] == 1 ? " <span class=\"label label-success\">admin</span>" : "" ) ?></h4></legend>
						<div class="form-group">
							<label class="control-label col-md-2">Email:</label>
							<div class="col-md-10">
								<p class="form-control-static"><?php echo $users["email"] ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Cadastrado em:</label>
							<div class="col-md-10">
								<p class="form-control-static"><?php echo date("d/m/Y \à\s H:i", strtotime($users["dt_insert"])) ?>.</p>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
<?php } ?>
		</div>
<?php } else { ?>
		<div class="container well">
			<h4><?php echo $viewBag["usuarios"]["msg"] ?></h4>
		</div>
<?php } ?>
<?php } ?>
	</section>
