<!-- Inicio cabeçalho -->
<?php

include_once "incl/cabecalho.php";
include 'ProdutoControle.php';
include 'ClienteControle.php';
?>
<!-- Fim cabeçalho -->

<body class="body-jogos fundo-geral">
    
    <?php

    $pesquisarealizada = FALSE;
    $produtoControle = new ProdutoControle();
    $clienteControle = new ClienteControle();
    $lista_produtos = null;
    $lista_produtos = $produtoControle -> Listar();
    $lista_produtos = array_reverse($lista_produtos);
    $row = "row1";
    $aux = 0;
    $clienteAtual = new Cliente();
    if (isset($_SESSION['login'])) {
        $clienteAtual = $clienteControle -> buscarLoginCliente($_SESSION['login']);
    }
    ?>
    
    <div id="full">
        <div id="main" class="autoClear">
            <!-- Inicio menu -->
            <?php include_once "incl/menu.php"
            ?>
            <!-- Fim menu -->
            <div id="content" class="autoClear">
                <div id="content-inside" class="autoClear">
                    <div class="autoClear boxGoto master-sprite sprite-bg-goto" id="goto">
                        <div class="boxGotoContent"></div>
                    </div>
                    <div id="content-middle-wrapper" class="autoClear">
                        <div class="content-middle left" id="content-middle" >
                            <div>
                                <div class="autoClear boxCategoria">
                                    <div class="title master-sprite sprite-bg-title">
                                        <h1>Produto Selecionado</h1>
                                    </div>
                                    <div class="content">
                                        
                                        <table id="historico" border="0" summary="Listagem do histótico" >
                                            <thead>
                                                <th><h3>Relação de produtos</h3></th>
                                            </thead>
                                            <tbody>
                                                
                                                <?php if(isset($_GET['idProduto']) && $_GET['idProduto'] != ""){
                                                        foreach ($lista_produtos as $key => $produtos) {
                                                        if($produtos->id == $_GET['idProduto']){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <h2>Seu saldo: R$ <?php echo $clienteAtual->dinheiro ?></h2>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <form id="comprar" class="loga" action="ClienteControle.php" method="get" name="compra" onsubmit="return validarCompra(this);">
                                                <input type="hidden" name="acao" value="comprar"/>
                                                <input type="hidden" name="idComprador" value="<?php echo $clienteAtual -> id; ?>"/>
                                                <input type="hidden" name="idVendedor" value="<?php echo $produtos -> id_cliente; ?>"/>
                                                <input type="hidden" name="idProduto" value="<?php echo $produtos -> id; ?>"/>
                                                    <td class="row2">
                                                    <h2>Descrição</h2><br />
                                                        <p><?php echo $produtos->nome ?>; 
                                                            Quantidade: <input type="number" name="qtdProduto" min="1" max="10" value="<?php echo $produtos -> quantidade; ?>" /> 
                                                            Preço: R$ <?php echo $produtos->valor ?></p>
                                                        <br />
                                                        <?php if($clienteAtual->id != "" && $produtos->id_cliente != $clienteAtual->id){?>
                                                        <!--<h3><a href="TelaCompraProduto.php?idComprador=<?php echo $clienteAtual -> id; ?>&idVendedor=<?php echo $produtos -> id_cliente; ?>&idProduto=<?php echo $produtos -> id; ?>">comprar</a></h3>-->
                                                        <input type="submit" name="submit" value="Comprar"/>
                                                        
                                                      <?php  } ?>
                                                      </form>
                                                    <!--  <input type="submit" name="submit" class="submit-logout" value="Sair"/>-->
                                                    </td>
                                                    
                                                    
                                                </tr>
                                                
                                                
                                                <?php ?>

                                                <?php }}} ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <!-- div.box-->
                                </div>
                                <!-- div.box-->
</body>
<!-- Inicio rodapé -->
<?php include_once "incl/rodape.php" ?>
<!-- Fim rodapé -->