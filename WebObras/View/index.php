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
        <div class="col-xs-12 col-md-9 esquerda-index text-center">
                <h1>Web Obras</h1>
                <h2>Secretaria de Infraestrutura</h2>
                <img src=".././Imagens/atende.php.png">
        </div>
        <div class="col-xs-12 col-md-3 direita-index">
            <form action=".././Controller/verificaLogin.php" method="POST" id="loginForm">
                <div class="col-xs-12">
                    <label class="">Usuário: </label>
                </div>
                <div class="col-xs-12">
                    <input type="text" name="txtUsuario" class="componente_linha_3">
                </div>
                <div class="col-xs-12">
                    <label class="">Senha: </label>
                </div>
                <div class="col-xs-12">
                    <input type="password" name="txtSenha" class="componente_linha_3">
                </div>
                <div class="col-xs-6 col-md-12 espacamento">
                    <a href="#">Esqueçeu sua senha ?</a>
                </div>
                <div class="col-xs-6 col-md-12 espacamento">
                    <input type="submit" name="" value="Entrar" class="btn btn-success pull-right">
                </div>
            </form>
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