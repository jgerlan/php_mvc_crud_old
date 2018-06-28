<?php
include_once 'conexaoBD.php';
include_once 'Produto.php';
	
class ProdutoDAO extends Connection{
	public function salvar($produto){
		$conexao = parent::abrirConexao();
		$sql = "insert into Produto (nome,id_tipo,valor,quantidade,id_cliente) values (:nome,:id_tipo,:valor,:quantidade,:id_cliente)";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':nome',$produto->nome);
		$stmt->bindParam(':id_tipo',$produto->id_tipo);
		$stmt->bindParam(':valor',$produto->valor);
		$stmt->bindParam(':quantidade',$produto->quantidade);
		$stmt->bindParam(':id_cliente',$produto->id_cliente); //dono do produto
		$stmt->execute();
	}
	
	public function buscar($idProduto){
		 $conexao = parent::abrirConexao();
		 $sql = "SELECT * from Produto ";
		 $stmt = $conexao->prepare($sql);
		 $stmt->execute();
		 
		 $Produto = new Produto();
		 $lista_Produto = array();
		 $result = $stmt->fetchAll();
		 foreach($result as $ProdutoBD) {
		 	if($idProduto == $ProdutoBD['id']) {
		 		$Produto->nome = $ProdutoBD['nome'];	
				$Produto->id = $ProdutoBD['id'];
				$Produto->id_cliente = $ProdutoBD['id_cliente'];
		 		$Produto->valor = $ProdutoBD['valor'];
				$Produto->quantidade = $ProdutoBD['quantidade'];
				$Produto->id_tipo = $ProdutoBD['id_tipo'];
		 		break;
		 	}
		 }
		 /*if($autorBD = $stmt->fetchObject()) {
		 	$autor->loguin = $autorBD['loguin'];
			$autor->nome = $autorBD['nome'];
			$autor->senha = $autorBD['senha'];
		 }*/
		 
		
		return $Produto;			
	}
	
	public function listar() {
		$conexao = parent::abrirConexao();
		$sql = "SELECT * from Produto ";
		$stmt = $conexao->prepare($sql);
		$stmt->execute();
	
		$lista_Produto = array();
		$result = $stmt->fetchAll();
		foreach($result as $ProdutoBD) {
			$Produto = new Produto();	
		 	$Produto->nome = $ProdutoBD['nome'];	
			$Produto->id = $ProdutoBD['id'];
			$Produto->id_cliente = $ProdutoBD['id_cliente'];
		 	$Produto->valor = $ProdutoBD['valor'];
			$Produto->quantidade = $ProdutoBD['quantidade'];
		 	$Produto->id_tipo = $ProdutoBD['id_tipo'];
		 	array_push($lista_Produto, $Produto);
		 }
		return $lista_Produto;
	}
    
    public function listarPesquisa($tipoId){
        $conexao = parent::abrirConexao();
        $sql = "SELECT * from Produto where id_tipo = :idTipo";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':idTipo',$tipoId);
        $stmt->execute();
    
        $lista_Produto = array();
        $result = $stmt->fetchAll();
        foreach($result as $ProdutoBD) {
            $Produto = new Produto();   
            $Produto->nome = $ProdutoBD['nome'];    
            $Produto->id = $ProdutoBD['id'];
            $Produto->id_cliente = $ProdutoBD['id_cliente'];
            $Produto->valor = $ProdutoBD['valor'];
            $Produto->quantidade = $ProdutoBD['quantidade'];
            $Produto->id_tipo = $ProdutoBD['id_tipo'];
            array_push($lista_Produto, $Produto);
         }
        return $lista_Produto;
    }

	public function atualizar($produto){
		$conexao = parent::abrirConexao();
		$sql = "UPDATE Produto SET nome = :nome, id_cliente = :id_cliente, valor = :valor, quantidade = :quantidade , id_tipo = :id_tipo WHERE id = :id ";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':nome',$produto->nome);
		$stmt->bindParam(':id_tipo',$produto->tipo);
		$stmt->bindParam(':valor',$produto->valor);
		$stmt->bindParam(':quantidade',$produto->quantidade);
		$stmt->bindParam(':id_cliente',$produto->id_cliente); //dono do produto
		$stmt->bindParam(':id',$produto->id);
		$stmt->execute();
	}
	
	public function deletar($produto) {
		$conexao = parent::abrirConexao();
		$sql = "DELETE from Produto WHERE id = :id";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':id',$produto->id);
		$stmt->execute();
	
	}
}
?>