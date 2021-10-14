// ressaltar as questões acertadas e erradas
var hightlightOpcao = function($form, $resposta, $correta) {
	$form.find("input[value="+$resposta+"]").attr("checked", "checked");
	$form.find("input[value="+$correta+"]").parent().parent().removeClass("well well-sm").addClass("alert alert-success");
	if($resposta != $correta) {
		$form.find("input[value="+$resposta+"]").parent().parent().removeClass("well well-sm").addClass("alert alert-danger");
		$("#contadorErros").html(parseInt($("#contadorErros").html())+1);
	} else {
		$("#contadorAcertos").html(parseInt($("#contadorAcertos").html())+1);
	}
}

// função para enviar POST ao servidor e verificar a resposta do usuário
var validarPergunta = function($form, $data) {
	$.ajax({
		method: "POST",
		url: baseURL+"json/validarPergunta",
		data: $data,
		timeout: 3000,
		beforeSend: function() {
			consoleChange($form, "info", "<strong>Aguarde!</strong> Estamos processando");
		}
	}).fail(function() {
		consoleChange($form, "danger", "<strong>Erro!</strong> Houve erro no servidor ao enviar, tente novamente");
		disableForm($form, false);
	}).done(function($json) {
		if($json.resposta == $json.correta) {
			consoleChange($form, "success", "<strong>Sucesso!</strong> Você acertou esta");
		} else {
			consoleChange($form, "danger", "<strong>Desculpe!</strong> Esta você errou");
		}
		hightlightOpcao($form, $json.resposta, $json.correta);
	});
}

$(document).ready(function() {

	// inicia pseudo envio das questões
	$("body").on("click", "#btn-validar", function() {

		var $pergunta = $(this).parent();
		var $idPergunta = $pergunta.data("pergunta");
		var $opcao = $pergunta.find("input[name=resposta_"+$idPergunta+"]:checked").val();

		disableForm($pergunta);
		if($opcao == undefined) {
			consoleChange($pergunta, "info", "<strong>Ooops!</strong> Escolha uma opção");
			disableForm($pergunta, false);
		} else {
			validarPergunta($pergunta, "pergunta="+$idPergunta+"&opcao="+$opcao);
		}

	});

	// preenche formulário após reload da página
	if($respostas != "null") {
		$.each($.parseJSON($respostas), function($k, $v) {
			var $form = $("body").find("div[data-pergunta="+$k+"]");
			hightlightOpcao($form, $v.resposta, $v.correta);
			disableForm($form);
		});
	}

});