<?php
include_once 'Tipo.php';
include_once 'TipoDAO.php';

class TipoControle {

    public function CadastrarTipo($tipoNome) {
        $tipoBanco = new Tipo();
        $tipoDAO = new TipoDAO();
        $tipoBanco->nome = "";
        $tipoBanco = $tipoDAO -> buscarNome($tipoNome->nome);
        if ($tipoBanco -> nome == "") {
            $tipoDAO -> salvar($tipoNome);
        }

    }

    public function listar() {
        $tipoDAO = new TipoDAO();
        return $tipoDAO -> listar();
    }

    public function buscar($idTipo) {
        $tipoDAO = new TipoDAO();
        return $tipoDAO -> buscar($idTipo);
    }

    public function buscarNome($nome) {
        $tipoDAO = new TipoDAO();
        return $tipoDAO -> buscarNome($nome);
    }

}
?>