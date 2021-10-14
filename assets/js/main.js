// função para alterar o console
var consoleChange = function($form, $action, $msg) {
	var $remove = "";
	var $add = "";
	if($action == "success") {
		$remove = "alert-danger alert-info";
		$add = "alert alert-success";
	} else {
		if($action == "danger") {
			$remove = "alert-success alert-info";
			$add = "alert alert-danger";
		} else {
			if($action == "info") {
				$remove = "alert-success alert-danger";
				$add = "alert alert-info";
			}
		}
	}
	$form.find("#console").removeClass($remove).addClass($add).html($msg);
}

// função para desabilitar formulário
var disableForm = function($form, $acao = true) {
	if($acao) {
		$form.find("input").attr("disabled", "disabled");
		$form.find("button").attr("disabled", "disabled");
	} else {
		$form.find("input").removeAttr("disabled");
		$form.find("button").removeAttr("disabled");
	}
}