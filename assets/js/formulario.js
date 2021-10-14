// enviar formulários do usuário
var enviarForm = function($form, $url, $data, $redirect) {
	$.ajax({
		method: "POST",
		url: baseURL+$url,
		data: $data,
		timeout: 3000,
		beforeSend: function() {
			consoleChange($form, "info", "<strong>Aguarde!</strong> Estamos processando");
		}
	}).fail(function() {
		consoleChange($form, "danger", "<strong>Erro!</strong> Houve erro no servidor ao enviar, tente novamente");
	}).done(function($json) {
		if($json.status) {
			consoleChange($form, "success", "<strong>Sucesso!</strong> "+$json.msg);
			if($redirect != false) {
				window.location.href = $redirect;
			}
		} else {
			var $mensagem = "";
			if($json.msg.length == 1) {
				$mensagem = " "+$json.msg[0];
			} else {
				for(var $i = 0; $i < $json.msg.length; $i++) {
					$mensagem += "<br />\n"+$json.msg[$i];
				}
			}
			consoleChange($form, "danger", "<strong>Desculpe!</strong>"+$mensagem);
		}
	});
	disableForm($form, false);
}

$(document).ready(function() {
	$("body").on("submit", "form", function($e) {
		$e.preventDefault();
		var $form = $(this);
		var $url = $form.attr("action");
		var $data = $form.serialize();
		var $redirect = $form.data("redirect");
		disableForm($form);
		enviarForm($form, $url, $data, $redirect);
	});
});