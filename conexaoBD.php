<?php
class Connection {
    private $host = "localhost";
    private $usuario = "admin";
    private $senha = "admin";
    private $banco = "bdcontroleestoque";

    protected function abrirConexao() {

        try {
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->banco;charset=utf8;", "$this->usuario", "$this->senha");
            return $conexao;
        } catch(PDOException $ex) {
            echo $ex -> getMessage();
            die();
        }

    }

    protected function fecharConexao($conexao) {
        return $conexao = NULL;
    }

}
?>
