<htlm>
	<?php
		require('.././ClassesPHP/Header.class.php');
		$instanciaHeader = new Header;
		$instanciaHeader -> headerPrincipal('Secretaria de Infraestrutura');
	?>
	<body>
		<div class="col-md-9 col-sm-6 EsquerdaIndex">
			<div class="row">

			</div>
		</div>
		<div class="col-md-3 col-sm-6 DireitaIndex">
			<div class="FundoMenu">
				<div class="row">
					<div class="col-md-6">
						<form action="main.php" method="post">
							<label>Usuário: </label>
							<input type="text" name="txtUsuario">
							<label>Senha: </label>
							<input type="password" name="txtSenha">
							<div class="row">
								<div class="col-md-4">
                                    <h1></h1>
								</div>
								<div class="col-md-4">
									<input type="submit" name="" value="Entrar" class="botaoGeral">
								</div>
								<div class="col-md-4">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</htlm>