<!-- Inicio cabeçalho -->
<?php
include "LogControle.php";
include "ClienteControle.php";
include_once "incl/cabecalho.php";
?>
<!-- Fim cabeçalho -->

<body class="body-jogos fundo-geral">

	<?php
    $logControle = new LogControle();
    $lista_historico = $logControle::listarLogs();
    $lista_historico = array_reverse($lista_historico);
    $lista_cliente = ClienteControle::buscarListaCliente();
    $row = "row1";
    $aux = 0;
    $clienteAtual = null;
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
										<h1>Histórico cliente</h1>
										<br />
									</div>
									<div class="content">
										<table id="historico" border="0" summary="Listagem do histótico" >
											<thead>
												<th><h3>Histórico</h3></th>
											</thead>
											<tbody>
												<?php foreach ($lista_historico as $key => $log) {
												$clienteAtual = null;
												if (($aux % 2) == 0){
												$row = "row1";
												}else {
												$row = "row2";
												}
												$aux= $aux + 1;

												?>

												<?php
												foreach ($lista_cliente as $chave => $cliente) {
												if ($cliente->id == $log->id_cliente) {
												$clienteAtual= $cliente->login;
												if (isset($_SESSION['login'])) {
												if($cliente->login == $_SESSION['login']){
												

												?>
												<tr>
													<td class="<?php echo $row ?>">
													<h2>Descrição</h2><br />
													    <p><?php echo $log->descricao; ?></p>
													    <br />
													    <h4>Data: <?php echo $log->date; ?></h4>
													</td>
												</tr>
												<?php
                                                }
                                                }

                                                }

                                                }
												?>

												<?php } ?>
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
