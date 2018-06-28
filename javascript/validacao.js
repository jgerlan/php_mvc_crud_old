function validar(form) {

	if (form.nomeCliente.value == "") {
		alert("Campo Nome de Cliente não pode estar vazio!");
		form.nome.focus();
		return false;

	}

	if (form.senha.value == "") {
		alert("Campo Senha Não pode estar vazio!");
		form.idade.focus();
		return false;
	}
	//return false;
}

function verificarItensProduto(form) {
	if (form.nomeProduto.value == "") {
		alert("Campo nome produto não pode estar vazio!");
		form.nomeProduto.focus();
		return false;

	}

	if (form.tipoProduto.value == "Default" || form.tipoProduto.value == "espaco") {
		//alert("Selecione ou crie um tipo");
		document.getElementById('mens01').style.color = "#6FA2BD";
		document.getElementById('mens01').innerHTML = "*Selecione ou crie um tipo";
		form.tipoProduto.focus();
		return false;

	}

	if (form.tipoProduto.value == "criarTipo" && form.tipoCriado.value == "") {
		//alert("Selecione ou crie um tipo");

		document.getElementById('mens02').style.color = "#6FA2BD";
		document.getElementById('mens02').innerHTML = "*Selecione ou crie um tipo";
		form.tipoCriado.focus();
		return false;
	}
	if (form.valorProduto.value == "" || (isNaN(form.valorProduto.value))) {
		//alert("Selecione ou crie um tipo");
		document.getElementById('mens03').style.color = "#6FA2BD";
		document.getElementById('mens03').innerHTML = "*Digite o preço do produto";
		form.valorProduto.focus();
		return false;
	}
	if (form.qtdProduto.value == "" || (isNaN(form.qtdProduto.value))) {
		//alert("Selecione ou crie um tipo");
		document.getElementById('mens04').style.color = "#6FA2BD";
		document.getElementById('mens04').innerHTML = "*Digite a quantidade do produto";
		form.qtdProduto.focus();
		return false;
	}
}

function validarPesquisa(form) {
	if (form.tipoProdutoPesquisa.value == "Default") {
		alert("Selecione um tipo");
		form.tipoProduto.focus();
		return false;

	}
}

function validarMensagem(form) {
	if (form.tituloMensagem.value == "") {
		alert("Mensagem deve possuir título.");
		form.tituloMensagem.focus();
		return false;

	}

	if (form.conteudoMensagem.value == "") {
		alert("Mensagem deve possuir conteúdo.");
		form.conteudoMensagem.focus();
		return false;

	}
}

function verificarSenha(form) {
	//var senhaCliente = document.getElementById("senhaCliente").value;
	//var senhaCliente2 = document.getElementById("senhaCliente2").value;

	if (form.nomeCliente.value == "") {
		alert("Campo Nome de Cliente não pode estar vazio!");
		form.nomeCliente.focus();
		return false;

	}

	if (form.nomeCompleto.value == "") {
		alert("Campo Nome Completo não pode estar vazio!");
		form.nomeCompleto.focus();
		return false;

	}

	if (form.senhaCliente.value == "") {
		alert("Campo Senha não pode estar vazio!");
		form.senhaCliente.focus();
		return false;
	}
	if (form.senhaCliente2.value == "") {
		alert("Necessário confirmação de senha!");
		form.senhaCliente2.focus();
		return false;
	}

	if (form.senhaCliente.value == form.senhaCliente2.value) {
		return true;
	} else {
		alert("Senhas não Conferem");
		form.senhaCliente2.focus();
		return false;
	}
}

function habilitaNovoTipo() {
	selectTipo = document.getElementById("selectProd");
	//selectInputTipo = document.getElementsById("tipoCriado");

	if (selectTipo.options[selectTipo.selectedIndex].value == "criarTipo") {
		document.getElementById('indNovoTipo').innerHTML = "Crie um tipo de produto:";
		document.getElementById('tipoCriado').disabled = 0;

		return false;
	} else {
		document.getElementById('indNovoTipo').innerHTML = "";
		document.getElementById('tipoCriado').disabled = 1;
	}
}
