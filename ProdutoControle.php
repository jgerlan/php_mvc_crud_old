<?php
include_once 'Produto.php';
include_once 'ProdutoDAO.php';
include_once 'Log.php';
include_once 'LogDAO.php';
include_once 'Tipo.php';
include_once 'TipoDAO.php';
include_once 'TipoControle.php';
include_once 'LogControle.php';
//include_once 'ClienteControle.php';

class ProdutoControle {
    public function CadastrarProduto() {
        if ((isset($_GET['nomeProduto']) && $_GET['nomeProduto'] != null) && (isset($_GET['idCliente']) && $_GET['idCliente'])) {
            $logControle = new LogControle();
            $produtoDAO = new ProdutoDAO();
            $produto = new Produto();
            $produto -> id_cliente = $_GET['idCliente'];
            $produto -> nome = $_GET['nomeProduto'];
            $produto -> quantidade = $_GET['qtdProduto'];
            $produto -> valor = $_GET['valorProduto'];

            if (isset($_GET['tipoProduto']) && $_GET['tipoProduto'] != "criarTipo") {
                $produto -> id_tipo = $_GET['tipoProduto'];

                $produtoDAO -> salvar($produto);
                $logControle -> cadastrarLogProduto($produto);
                return TRUE;
            } else if (isset($_GET['tipoCriado'])) {
                $novoTipo = new Tipo();
                $tipoControle = new TipoControle();
                $novoTipo -> nome = $_GET['tipoCriado'];

                $tipoControle -> CadastrarTipo($novoTipo);
                $tipo = $tipoControle -> buscarNome($_GET['tipoCriado']);
                $produto -> id_tipo = $tipo -> id;
                $produtoDAO -> salvar($produto);
                $logControle -> cadastrarLogProduto($produto);
                return TRUE;
            }

            return FALSE;
        }
    }

    public function Listar() {
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO -> listar();
    }

    public function ListarPesquisa($tipoNome) {
        $produtoDAO = new ProdutoDAO();
        $tipoDAO = new TipoDAO();
        $auxTipo = new Tipo();
        $auxTipo = $tipoDAO -> buscarNome($tipoNome);
        
        return $produtoDAO -> listarPesquisa($auxTipo -> id);
    }

    /*public function AtualizarProduto() {
     if((isset($_GET['nomeProduto']) && $_GET['nomeProduto']!=null)  && (isset($_GET['idCliente']) && $_GET['idCliente'])) {
     $logControle = new LogControle();
     $produtoDAO = new ProdutoDAO();
     $produto = $produtoDAO->buscar($idProduto);
     $produto->id_cliente = $_GET['idCliente'];
     $produto->nome = $_GET['nomeProduto'];
     $produto->quantidade = $_GET['qtdProduto'];
     $produto->valor = $_GET['valorProduto'];
     if(isset($_GET['tipoProduto']) && $_GET['tipoProduto']!='criarTipo') {
     $produto->id_tipo = $_GET['valorIdCliente'];
     $produtoDAO->salvar($produto);
     $logControle->cadastrarLogProduto($produto);
     return TRUE;
     } else {
     if(isset($_GET['tipoCriado'])) {
     $tipoControle = new TipoControle();
     $tipoControle->CadastrarTipo($_GET['tipoCriado']);
     $tipo = $tipoControle->buscarNome($_GET['tipoCriado']);
     $produto->id_tipo = $tipo->id;
     $produtoDAO->salvar($produto);
     $logControle->cadastrarLogProduto($produto);
     return TRUE;
     }
     }
     return FALSE;
     }
     }*/

    public function Comprar() {
        if ((isset($_GET['idProduto']) && $_GET['idProduto'] != null) && (isset($_GET['idComprador']) && $_GET['idComprador'])) {
            $logControle = new LogControle();
            $produtoDAO = new ProdutoDAO();
            $clienteControle = new ClienteControle();
            $comprador = $clienteControle -> buscar($_GET['idComprador']);
            $produto = $produtoDAO -> buscar($_GET['idProduto']);
            $quantidade = $_GET['qtdProduto'];
            $vendedor = $clienteControle -> buscar($produto -> id_cliente);
            if ($quantidade <= $produto -> quantidade) {
                if ($produto -> valor * $quantidade <= $comprador -> dinheiro) {
                    $produto -> quantidade = $produto -> quantidade - $quantidade;
                    $comprador -> dinheiro = $comprador -> dinheiro - ($produto -> valor * $quantidade);
                    $vendedor -> dinheiro = $vendedor -> dinheiro + ($produto -> valor * $quantidade);
                    $logControle -> cadastrarLogCompra($produto, $comprador, $quantidade);
                    $clienteControle -> atualizar($comprador);
                    $clienteControle -> atualizar($vendedor);
                    if ($produto -> quantidade == 0) {
                        $produtoDAO -> deletar($produto);
                    } else {
                        $produtoDAO -> atualizar($produto);
                    }
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

}

if (isset($_GET['acao'])) {

    $acao = $_GET['acao'];

    if ($acao == 'registrar'){
        ProdutoControle::CadastrarProduto();
        header('location:TelaPrincipal.php');
    }else if ($acao == 'pesquisar') {
        ProdutoControle::ListarPesquisa($_GET['tipoProdutoPesquisa']);
    }
    if(isset($_GET['tipoProdutoPesquisa'])){
    if ($_GET['tipoProdutoPesquisa'] != "Default" && $_GET['tipoProdutoPesquisa'] != "") {
        header('location:TelaPrincipal.php?tipoProdutoPesquisa=' . $_GET['tipoProdutoPesquisa']);
    }} else if (isset($_GET['tipoProdutoPesquisa'])){
        header('location:TelaPrincipal.php');
    }else if ($acao == 'sair'){
        header('location:TelaPrincipal.php');
    }
}
?>