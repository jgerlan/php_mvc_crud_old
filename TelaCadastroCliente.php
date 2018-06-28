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
						<div class="boxGotoContent"></div>
					</div>
					<div id="content-middle-wrapper" class="autoClear">
						<div class="content-middle left" id="content-middle" >
							<div>
								<div class="autoClear boxCategoria">
									<div class="title master-sprite sprite-bg-title">
										<h2>Cadastro de Cliente</h2>
									</div>
									<div class="content">
										<form method="get" action="ClienteControle.php" onsubmit="return verificarSenha(this);">

											<input type="hidden" name="acao" value="registrar"/>
											<br />
											<table border="0" id="cadastro">
												<tr>
													<td><h3>Login:</h3></td>
													<td>
													<input type="text" name="login"/>
													</td>

												</tr>
												<tr>
													<td><h3>Nome completo:</h3></td>
													<td>
													<input type="text" name="nomeCliente"/>
													</td>

												</tr>

												<tr>
													<td><h3>Senha do Cliente:</h3></td>
													<td>
													<input type="password" name="senhaCliente" id="senhaCliente"/>
													</td>
												</tr>
												<tr>
													<td><h3>Repita a Senha:</h3></td>
													<td>
													<input type="password" name="senhaCliente2" id="senhaCliente2"/>
													</td>
												</tr>
											</table>

											<br/>

											<br/>

											<br/>

											<div id="input">
												<input type="submit" value="Cadastrar Cliente" />
											</div>

										</form>
										<form method="get" action="ClienteControle.php">
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

