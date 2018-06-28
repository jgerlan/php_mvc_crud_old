<?php
include_once 'conexaoBD.php';
include_once 'ClienteDAO.php';

class ClienteDAO extends Connection {
    public function salvar($cliente) {
        $conexao = parent::abrirConexao();
        $sql = "insert into Cliente (nome,login,senha,dinheiro) values (:nome,:login,:senha,:dinheiro)";
        $stmt = $conexao -> prepare($sql);
        $stmt -> bindParam(':nome', $cliente -> nome);
        $stmt -> bindParam(':login', $cliente -> login);
        $stmt -> bindParam(':senha', $cliente -> senha);
        $stmt -> bindParam(':dinheiro', $cliente -> dinheiro);
        $stmt -> execute();
    }

    public function buscar($idCliente) {
        $conexao = parent::abrirConexao();
        $sql = "SELECT * from Cliente ";
        $stmt = $conexao -> prepare($sql);
        $stmt -> bindParam(':id', $loginCliente);
        $stmt -> execute();

        $cliente = new Cliente();
        $lista_Cliente = array();
        $result = $stmt -> fetchAll();
        foreach ($result as $ClienteBD) {
            if ($idCliente == $ClienteBD['id']) {
                $cliente -> login = $ClienteBD['login'];
                $cliente -> nome = $ClienteBD['nome'];
                $cliente -> senha = $ClienteBD['senha'];
                $cliente -> id = $ClienteBD['id'];
                $cliente -> dinheiro = $ClienteBD['dinheiro'];
                break;
            }
        }
        /*if($autorBD = $stmt->fetchObject()) {
         $autor->login = $autorBD['login'];
         $autor->nome = $autorBD['nome'];
         $autor->senha = $autorBD['senha'];
         }*/

        return $cliente;
    }

    public function buscarLoginCliente($login) {
        try {
            $conexao = parent::abrirConexao();

            $sql = "SELECT * FROM Cliente where login = :login";
            $stmt = $conexao -> prepare($sql);
            $stmt -> bindParam(':login', $login);
            $stmt -> execute();

            $cliente = new Cliente();

            $result = $stmt -> fetchAll();

            foreach ($result as $clienteBD) {
                $cliente -> id = $clienteBD['id'];
                $cliente -> nome = $clienteBD['nome'];
                $cliente -> login = $clienteBD['login'];
                $cliente -> senha = $clienteBD['senha'];
                $cliente -> dinheiro = $clienteBD['dinheiro'];
            }

        } catch(PDOException $ex) {
            echo $ex -> getMessage();
            die();
        }

        parent::fecharConexao($conexao);
        return $cliente;
    }

    public function listar() {
        $conexao = parent::abrirConexao();
        $sql = "SELECT * from Cliente ";
        $stmt = $conexao -> prepare($sql);
        $stmt -> execute();

        $lista_Cliente = array();
        $result = $stmt -> fetchAll();
        foreach ($result as $ClienteBD) {
            $cliente = new Cliente();
            $cliente -> login = $ClienteBD['login'];
            $cliente -> nome = $ClienteBD['nome'];
            $cliente -> senha = $ClienteBD['senha'];
            $cliente -> id = $ClienteBD['id'];
            $cliente -> dinheiro = $ClienteBD['dinheiro'];
            array_push($lista_Cliente, $cliente);
        }
        return $lista_Cliente;
    }

    public function atualizar($cliente) {
        $conexao = parent::abrirConexao();
        $sql = "UPDATE Cliente SET nome = :nome, login = :login, senha = :senha, dinheiro = :dinheiro WHERE id = :id ";
        $stmt = $conexao -> prepare($sql);
        $stmt -> bindParam(':nome', $cliente -> nome);
        $stmt -> bindParam(':login', $cliente -> login);
        $stmt -> bindParam(':senha', $cliente -> senha);
        $stmt -> bindParam(':dinheiro', $cliente -> dinheiro);
        $stmt -> bindParam(':id', $cliente -> id);
        $stmt -> execute();
    }

}
?>