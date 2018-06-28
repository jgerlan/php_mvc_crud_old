<?php
include_once 'Cliente.php';
include_once 'ClienteDAO.php';
include_once 'ProdutoControle.php';

if(isset($_SESSION) != TRUE){
session_start();
}
/**
 *
 */
class ClienteControle {

    public function cadastrarCliente() {

        if ((isset($_GET['nomeCliente']) && $_GET['nomeCliente'] != '') && (isset($_GET['senhaCliente']) && $_GET['senhaCliente'] != '')) {
            $login = $_GET['login'];
            $nomeCliente = $_GET['nomeCliente'];
            $senhaCliente = $_GET['senhaCliente'];
            //echo $nomeCliente;
            $cliente = new Cliente();
            $cliente -> login = $login;
            $cliente -> nome = $nomeCliente;
            $cliente -> dinheiro = 3000;
            $cliente -> senha = $senhaCliente;

            $clienteTeste = new Cliente();
            $clienteDAO = new ClienteDAO();
            $clienteTeste = $clienteDAO -> buscarLoginCliente($login);
            if ($clienteTeste -> login != $cliente -> login) {
                $clienteDAO -> salvar($cliente);
                return TRUE;
            } else {
                return FALSE;
            }
            //$clienteDAO -> salvar($cliente);
        } else {
            return FALSE;
        }
    }

    public function logar() {
        $cliente = new Cliente();
        if (empty($_GET['loginCliente'])) {
            //$this -> HandleError("Nome de usuário vazio");
            return FALSE;
        }
        if (empty($_GET['senha'])) {
            //$this -> HandleError("Senha vazia!");
            return FALSE;
        }

        $cliente -> login = trim($_GET['login']);
        $cliente -> senha = trim($_GET['senha']);

        $clienteTeste = new Cliente();
        
        if (!ClienteControle::verificaLogin($cliente -> login, $cliente -> senha)) {
            
            return FALSE;
        }
        $clienteAux = new Cliente();
        $clienteAux = ClienteControle::BuscarLoginCliente($cliente -> login);
        
        //session_start();
        $_SESSION['login'] = $cliente -> login;
        $_SESSION['idCl'] = $clienteAux -> id;
        
        return TRUE;

    }

    public function verificaLogin($login, $senha) {
        $clienteDAO = new ClienteDAO();
        $clienteTeste = $clienteDAO -> buscarLoginCliente($login);

        if (($clienteTeste -> login == $login) && ($clienteTeste -> senha == $senha)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function buscar($idCliente) {
        $clienteDAO = new ClienteDAO();
        $clienteTeste = $clienteDAO -> buscar($idCliente);
        if($clienteTeste != ''){
            return $clienteTeste;
        }
    }
    
    public function buscarLoginCliente($login) {
        $clienteDAO = new ClienteDAO();
        $clienteTeste = $clienteDAO -> buscarLoginCliente($login);
        if($clienteTeste != ''){
            return $clienteTeste;
        }
    }

    public function buscarListaCliente() {
        $clienteDAO = new ClienteDAO();
        return $clienteDAO -> listar();
    }
    
    public function atualizar($cliente) {
        $clienteDAO = new ClienteDAO();
        $clienteDAO->atualizar($cliente);
    }

    public function sair() {
        unset($_SESSION['login']);
        session_destroy();
        header('location:index.php');
    }

}

if (isset($_GET['acao'])) {

    $acao = $_GET['acao'];

    if ($acao == 'registrar')
        ClienteControle::cadastrarCliente();
    else if ($acao == 'logar')
        if (ClienteControle::logar() == TRUE)
            header('location:TelaPrincipal.php');
        else
            header('location:TelaPrincipal.php');        
    else if ($acao == 'sair')
        ClienteControle::sair();
    else if ($acao == 'comprar'){
        ProdutoControle::Comprar();
        header('location:TelaPrincipal.php');
    }
    header('location:TelaPrincipal.php');
}
?>