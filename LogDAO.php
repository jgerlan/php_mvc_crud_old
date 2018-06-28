<?php
include_once 'conexaoBD.php';
include_once 'Log.php';
	
class LogDAO extends Connection{
	public function salvar($log){
		$conexao = parent::abrirConexao();
		$sql = "insert into Log (descricao,date,id_cliente) values (:descricao,:date,:id_cliente)";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':descricao',$log->descricao);
		$stmt->bindParam(':date',$log->date);
		$stmt->bindParam(':id_cliente',$log->id_cliente);
		$stmt->execute();
	}
	
	public function buscar($idLog){
		 $conexao = parent::abrirConexao();
		 $sql = "SELECT * from Log ";
		 $stmt = $conexao->prepare($sql);
		 $stmt->execute();
		 
		 $log = new Log();
		 $lista_Log = array();
		 $result = $stmt->fetchAll();
		 foreach($result as $LogBD) {
		 	if($idLog == $LogBD['id']) {
		 		$log->descricao = $LogBD['descricao'];
				$log->id = $LogBD['id'];
				$log->id_cliente = $LogBD['id_cliente'];
		 		$log->date = $LogBD['date'];
		 		break;
		 	}
		 }
		 /*if($autorBD = $stmt->fetchObject()) {
		 	$autor->loguin = $autorBD['loguin'];
			$autor->nome = $autorBD['nome'];
			$autor->senha = $autorBD['senha'];
		 }*/
		 
		
		return $log;			
	}
	
	public function listar() {
		$conexao = parent::abrirConexao();
		$sql = "SELECT * from Log ";
		$stmt = $conexao->prepare($sql);
		$stmt->execute();
	
		$lista_Log = array();
		$result = $stmt->fetchAll();
		foreach($result as $LogBD) {
			$log = new Log();	
		 	$log->descricao = $LogBD['descricao'];
			$log->id = $LogBD['id'];
			$log->id_cliente = $LogBD['id_cliente'];
		 	$log->date = $LogBD['date'];
			array_push($lista_Log, $log);
		 }
		return $lista_Log;
	}

	public function atualizar($log){
		$conexao = parent::abrirConexao();
		$sql = "UPDATE log SET descricao = :descricao, id_cliente = :id_cliente, date = :date WHERE id = :id ";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':descricao',$log->descricao);
		$stmt->bindParam(':date',$log->date);
		$stmt->bindParam(':id_cliente',$log->id_cliente);
		$stmt->bindParam(':id',$log->id);
		$stmt->execute();
	}
}
?>