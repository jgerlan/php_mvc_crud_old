<?php
include_once 'Log.php';
include_once 'LogDAO.php';
include_once 'ClienteDAO.php';
include_once 'Cliente.php';

class LogControle{
	
	function cadastrarLog($log) {
		$logDAO = new LogDAO();
		$logDAO->salvar($log);
	}
	
	public function listarLogs() {
    	$logDAO = new LogDAO();
    	return $logDAO->listar();
	}
	
	public function cadastrarLogCompra($produto,$comprador,$quantidade) {
		$logComprador = new Log();
		$logComprador->date = date('Y-m-d');
		$logComprador->id_cliente = $comprador->id;
		$logComprador->descricao = "O Produto: " . $produto->nome . " foi comprado por " . $comprador->nome . " pela quantidade: " . $quantidade;
        LogControle::cadastrarLog($logComprador);	
		$clienteDAO = new ClienteDAO();
		$vendedor = $clienteDAO->buscar($produto->id_cliente);
		$logVendedor = new Log();
		$logVendedor->date = date('Y-m-d');
		$logVendedor->id_cliente = $vendedor->id;
		$logVendedor->descricao = "O Produto: " . $produto->nome . " foi comprado por " . $comprador->nome . " pela quantidade: " . $quantidade;
		LogControle::cadastrarLog($logVendedor);
	}
	
	public function cadastrarLogProduto($produto) {
		$log = new Log();
		$log->date = date('Y-m-d');
		$log->id_cliente = $produto->id_cliente;
		$log->descricao = "O Produto: " . $produto->nome . " foi colocado a venda \n 
		                   Quantidade: " . $produto->quantidade . "\n Valor: " . $produto->valor;
		LogControle::cadastrarLog($log);
	}
	
}
?>