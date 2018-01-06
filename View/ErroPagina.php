<html>
    <?php

        require('.././ClassesPHP/Header.class.php');
        $instanciaHeader = new Header;
        $instanciaHeader -> headerPrincipal('Secretaria de Infraestrutura');

    ?>
    <body>
        <div class="row" style="height: 100%;">
            <div class="col-xs-0 col-sm-3 col-md-4 col-ld-4">

            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-ld-4">
                <div class="pull-left">
                    <h1 style="margin-left: 40%; margin-top: 15% ">Erro 404</h1>
                    <h4 style="margin: 10%">A página solicitada não foi encontrada em nossos servidores!</h4>
                    <a href="http://localhost/Prefeitura/WebObras/View" style="margin: 10%; margin-left: 40%;">Voltar a página de login</a>
                </div>
            </div>
            <div class="col-xs-0 col-sm-3 col-md-4 col-ld-4">

            </div>
        </div>
    </body>
</html>