<?php
include_once 'conexaoBD.php';
include_once 'Tipo.php';
	
class TipoDAO extends Connection{
	public function salvar($tipo){
		$conexao = parent::abrirConexao();
		$sql = "insert into Tipo (nome) values (:nome)";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':nome',$tipo->nome);
		$stmt->execute();
	}
	
	public function buscar($idTipo){
		 $conexao = parent::abrirConexao();
		 $sql = "SELECT * from Tipo ";
		 $stmt = $conexao->prepare($sql);
		 $stmt->execute();
		 
		 $tipo = new Tipo();
		 $lista_Tipo = array();
		 $result = $stmt->fetchAll();
		 foreach($result as $tipoBD) {
		 	if($idTipo == $tipoBD['id']) {
				$tipo->id = $tipoBD['id'];
				$tipo->nome = $tipoBD['nome'];
		 		break;
		 	}
		 }
		return $Tipo;			
	}
	
	public function listar() {
		$conexao = parent::abrirConexao();
		$sql = "SELECT * from Tipo ";
		$stmt = $conexao->prepare($sql);
		$stmt->execute();
	
		$tipoArray = array();
		$tipoArrayAux = $stmt->fetchAll();
		foreach($tipoArrayAux as $tipoBD) {
			$tipo = new Tipo();
			$tipo->id = $tipoBD['id'];
			$tipo->nome = $tipoBD['nome'];
			array_push($tipoArray, $tipo);
		 }
		return $tipoArray;
	}
	
	public function buscarNome($tipoNome){
		 $conexao = parent::abrirConexao();
		 $sql = "SELECT * from Tipo where nome = :nome";
		 $stmt = $conexao->prepare($sql);
         $stmt -> bindParam(':nome', $tipoNome);
		 $stmt->execute();
		 
		 $tipo = new Tipo();
		 $lista_Tipo = array();
		 $result = $stmt->fetchAll();
		 foreach($result as $tipoBD) {
		 	if($tipoNome == $tipoBD['nome']) {
				$tipo->id = $tipoBD['id'];
				$tipo->nome = $tipoBD['nome'];
		 		break;
		 	}
		 }
		return $tipo;		
	}
}

?>