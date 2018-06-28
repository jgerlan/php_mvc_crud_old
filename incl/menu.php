<?php
include_once 'ClienteControle.php';
include_once 'TipoControle.php';

$sessao = FALSE;
if (isset($_SESSION['login'])) {
    $sessao = TRUE;
}
$listaTipoProdutos = array();
$listarTipos = new TipoControle();
$listaTipoProdutos = $listarTipos->listar();
?>

<div id="top">

    <div id="header" class="autoClear">
        <div id="header-image"></div>

        <div id="header-actions" class="autoClear">
            <ul id="header-actions-ul" class="autoClear">

                <li class="input-login">
                    <a href="TelaPrincipal.php" ><h2>Inicial</h2></a>
                </li>
                <?php if (!$sessao) {
                ?>
                <form id="loga" class="loga" action="ClienteControle.php" method="get" name="login" onsubmit="return validar(this);">
                    <input type="hidden" name="acao" value="logar"/>
                    <li class="input-header">
                        <span>Login:</span>
                        <input type="text" id="user" name="login" tabindex="1"/>
                    </li>
                    <li class="input-header">
                        <span>Senha:</span>
                        <input type="password" id="pass" name="senha" size="15" value="" tabindex="2" class="master-sprite sprite-inputBg"/>
                    </li>
                    <li class="input-login">
                        <input type="submit" name="loginCliente" value="Entrar"/>
                    </li>
                </form>

                <li class="sign-up">
                    <a href="TelaCadastroCliente.php"><h2>Cadastrar</h2></a>
                </li>
                <?php }else{ ?>
                <li class="sign-up">
                    <a href="TelaCadastroProduto.php"><h2>Cadastrar produto</h2></a>
                </li>
                <li class="sign-up">
                    <a href="TelaHistoricoCliente.php"><h2>Histórico Cliente</h2></a>
                </li>
                <li class="sign-up">
                    <form id="logout" class="logout" action="ClienteControle.php" method="get" name="sair">
                        <input type="hidden" name="acao" value="sair"/>
                        <input type="submit" name="submit" class="submit-logout" value="Sair"/>
                    </form>
                </li>
                <?php } ?>
                <form id="loga" class="loga" action="ProdutoControle.php" method="get" name="pesquisa" onsubmit="return validarPesquisa(this);">
                    <input type="hidden" name="acao" value="pesquisar"/>
                    <li class="input-header">
                        <span>Pesquisa de produto: </span>
                        <select name="tipoProdutoPesquisa">
                            <option value="Default">Selecione tipo</option>
                            <?php
                                 if($listaTipoProdutos!=null){
                                 foreach ($listaTipoProdutos as $key => $tipoProduto) {
                            ?>
                            <option value="<?php echo $tipoProduto->nome; ?>"><?php echo $tipoProduto->nome; ?></option>
                            <?php }}?>

                        </select>
                    </li>
                    <li class="input-login">
                        <input type="submit" name="submit" value="Pesquisar"/>
                    </li>
                </form>

            </ul>

        </div>

    </div>
</div>