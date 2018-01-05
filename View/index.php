<htlm>
	<?php
		require('.././ClassesPHP/Header.class.php');
		$instanciaHeader = new Header;
		$instanciaHeader -> headerPrincipal('Secretaria de Infraestrutura');
	?>
	<body>
        <div class="row">
            <div class="col-xs-12 col-md-9 EsquerdaIndex">
                <div class="titulo">
                    <h1 class="tituloH1">Web Obras</h1>
                    <h2 class="tituloH2">Secretaria de Infraestrutura</h2>
                </div>
                <img src=".././Imagens/atende.php.png" alt="">
            </div>
            <div class="col-xs-12 col-md-3 DireitaIndex">
                <form action=".././View/indexObras.php" method="POST">
                    <div class="FundoMenu">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <form action="main.php" method="post">
                                    <label class="componente_linha_3">Usuário: </label>
                                    <input type="text" name="txtUsuario" class="componente_linha_3">
                                    <label class="componente_linha_3">Senha: </label>
                                    <input type="password" name="txtSenha" class="componente_linha_3">
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <input type="submit" name="" value="Entrar" class="btn btn-success pull-right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</body>
</htlm>