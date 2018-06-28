<!-- Inicio cabeçalho -->
<?php
include_once "incl/cabecalho.php";
?>
<!-- Fim cabeçalho -->

<body class="body-jogos fundo-geral">
	<div id="full">
		<div id="main" class="autoClear">
			<!-- Inicio menu -->
			<?php include_once "incl/menu.php"
			?>
			<!-- Fim menu -->

			<div id="content" class="autoClear">
				<div id="content-inside" class="autoClear">
					<div class="autoClear boxGoto master-sprite sprite-bg-goto" id="goto">
						<div class="boxGotoContent">
						    
						</div>
					</div>
					<div id="content-middle-wrapper" class="autoClear">
						<div class="content-middle left" id="content-middle" >
							<div>
								<div class="autoClear boxCategoria">
									<div class="title master-sprite sprite-bg-title"></div>
									<div class="content">

										<form method="get" action="ProdutoControle.php" onsubmit="return verificarItensProduto(this);">

											<input type="hidden" name="acao" value="registrar"/>
											<input type="hidden" name="idCliente" value="<?php echo $_SESSION['idCl']; ?>"/>
											
											<br />
											<table border="0" id="cadastro">
												<tr>
													<td><h3>Nome produto:</h3></td>
													<td>
													<input type="text" name="nomeProduto"/>
													</td>

												</tr>

												<tr>
													<td><h3>Tipo do produto:</h3></td>
													<td>
													<select id="selectProd" name="tipoProduto" onchange="habilitaNovoTipo(this)" >
														<option value="Default">Selecione tipo</option>
														<option value="criarTipo">Criar tipo</option>
														<option value="espaco"> </option>
														<?php
                                                            if($listaTipoProdutos!=null){
                                                              foreach ($listaTipoProdutos as $key => $tipoProduto) {
                                                               
                                                         ?>
                                                         
                                                         <option value="<?php echo $tipoProduto->id; ?>"><?php echo $tipoProduto -> nome; ?></option>
                                                         <?php }} ?> 
													</select>
													<h5 id="mens01"></h5>
													</td>
													
                                                    
												</tr>
												<tr>
													<td><h3 id="indNovoTipo"></h3></td>
													<td>
													<input type="text" id="tipoCriado" name="tipoCriado" disabled="1" />
													<h5 id="mens02"></h5>
													</td>
												</tr>
												<tr>
													<td><h3>Valor: R$</h3></td>
													<td id="minInput">
													<input type="text" id="valorProduto" name="valorProduto"/>
													<h5 id="mens03"></h5>
													</td>
												</tr>
												<tr>
													<td><h3>Quatidade:</h3></td>
													<td id="minInput">
													<input type="text"  id="qtdProduto" name="qtdProduto"/>
													<h5 id="mens04"></h5>
													</td>
												</tr>

											</table>
											<br/>
											<br/>
											<br/>
											<div id="input">
												<input type="submit" value="Cadastrar Produto" />
											</div>
										</form>
										<form method="get" action="ProdutoControle.php">
											<input type="hidden" name="acao" value=""/>
											<div id="cancelar">
												<input type="submit" value="Cancelar" />
											</div>
										</form>
									</div>
									<!-- div.box-->
								</div>
								<!-- div.box-->
</body>
<!-- Inicio rodapé -->
<?php include_once "incl/rodape.php" ?>
<!-- Fim rodapé -->
