<?php
include_once "Cliente.php";
include_once "ClienteDAO.php";
include_once "LogDAO.php";
include_once "Log.php";
include_once "ProdutoDAO.php";
include_once "Produto.php";
  
	$cliente = new Cliente();
	$cliente->senha = 12345;
	$cliente->login = "iury";
	$cliente->nome = "iury";
	$cliente->dinheiro = 0;
	$clienteDAO = new ClienteDAO();
    $clienteDAO->salvar($cliente);
	//$cliente = $clienteDAO->buscar(1);
	//$cliente->nome = "modou";
	//$clienteDAO->atualizar($cliente);
	
	
	/*$log = new Log();
	$log->date = date('Y-m-d');
	$log->id_cliente = $cliente->id;
	$log->descricao = "testa a data pode ser inserida";
	$logDAO = new LogDAO();
	$logDAO->salvar($log);
	
	$produto = new Produto();
	$produto->nome = "produto de test";
	$produto->quantidade = 200;
	$produto->tipo = "Eletrodomesticos";
	$produto->valor = "200";
	$produto->id_cliente = $cliente->id;
	$produtoDAO = new ProdutoDAO();
	$produtoDAO->salvar($produto);
	/*$produto = $produtoDAO->buscar(1);
	$produto->nome = "test de mudança";
	$produto->tipo = "Eletrodomesticos";
	$produtoDAO->atualizar($produto);
	
	$produto = $produtoDAO->deletar($produto);*/
?>