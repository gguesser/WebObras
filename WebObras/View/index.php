<htlm>
	<?php

        include('.././ClassesPHP/Header.php');

        use Header\Header;
        Header::headerPrincipal('Secretaria de Infraestrutura');

		if(isset($_GET['Erro'])){
		    print '<script>';
		        print 'swal("Erro!", "Usuário ou Senha incorretos!", "error");';
		    print '</script>';
        }

        session_start();

		unset($_SESSION['validade']);
	?>
	<body>
        <div class="row">
            <div class="col-xs-12 col-md-9 EsquerdaIndex text-center">
                <div class="titulo">
                    <h1 class="tituloH1">Web Obras</h1>
                    <h2 class="tituloH2">Secretaria de Infraestrutura</h2>
                </div>
                <img src=".././Imagens/atende.php.png" class="img-responsive">
            </div>
            <div class="col-xs-12 col-md-3 DireitaIndex">
                <form action=".././Controller/verificaLogin.php" method="POST" id="loginForm">
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
                            <div class="col-xs-8 col-md-12">
                                <a href="#">Esqueçeu sua senha ?</a>
                            </div>
                            <div class="col-xs-4 col-md-12">
                                <input type="submit" name="" value="Entrar" class="btn btn-success pull-right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</body>
</htlm>

<script>
    $("#loginForm").validate({
        rules: {
            txtUsuario: "required",
            txtSenha: "required"
        },
        messages: {
            txtUsuario: "Preencha este campo",
            txtSenha: "Este também.."
        }
    });
</script>