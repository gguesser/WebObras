<html>
    <?php

    include('.././ClassesPHP/Header.php');
    include('.././ClassesPHP/Obra.php');

    use Header\Header;
    use Obra\Obra;

    session_start();;

    if(isset($_SESSION['validade'])){

        Header::headerPrincipal('Secretaria de Infraestrutura');

    }else{
        header('Location: /Prefeitura/WebObras/View/ErroPagina.php');
    }
    ?>
    <body class="home">
        <div class="container-fluid display-table">
            <div class="row display-table-row">
                <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                    <div class="logo">
                        <img src="../Imagens/atende.php.png" alt="prefeitura_guaramirim" class="img-responsive">
                    </div>
                    <div class="navi">
                        <ul>
                            <li>
                                <a href="indexObras.php">Inicio</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="cadastroObras.php">Nova Obra</a>
                                    </li>
                                    <li>
                                        <a href="cadastroFiscais.php">Novo Fiscal</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="estatisticas.php">Relatórios</a>
                            </li>
                            <li>
                                <a href="index.php">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 col-sm-11 display-table-cell v-align">
                    <header>
                        <div class="col-md-6">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs">
                                <h3>GERAL OBRAS</h3>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pull-right">
                                <label for="">Usuário: <?php print $_SESSION['nomeUsuario']?></label>
                                <br>
                                <label for="">Dia: <?php print date('d/m/Y')?></label>
                            </div>
                        </div>
                    </header>
                    <div class="row quadro-principal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Em processo</b>
                                <input type="text" value="pesquisar" class="pull">
                            </div>
                            <?php

                            $resultadoSelecao = Obra::selecionaObras(3);

                                print '<div class="table-responsive">';
                                    print '<table class="table">';

                                    print '<tr>';
                                        print '<td><b>Protocolo</b></td>';
                                        print '<td><b>Titulo</b></td>';
                                        print '<td><b>Bairro</b></td>';
                                        print '<td><b>Rua</b></td>';
                                        print '<td><b>Morador</b></td>';
                                        print '<td><b>Abertura</b></td>';
                                        print '<td><b>Fiscal</b></td>';
                                        print '<td><b>Previsão</b></td>';
                                    print '</tr>';

                                    foreach($resultadoSelecao as $obrasSelecionadas){
                                        print '<tr>';
                                            print '<td>';
                                                $metodo = 'cadastroObras.php?protocolo='.$obrasSelecionadas['codProtocolo'];
                                                print '<a href="'.$metodo.'">'.$obrasSelecionadas['codProtocolo'].'</a>';
                                            print '</td>';
                                            print '<td>';
                                                print utf8_encode($obrasSelecionadas['Titulo']);
                                            print '</td>';
                                            print '<td>';
                                                print utf8_encode($obrasSelecionadas['Bairro']);
                                            print '</td>';
                                            print '<td>';
                                                print utf8_encode($obrasSelecionadas['Rua']);
                                            print '</td>';
                                            print '<td>';
                                                print utf8_encode($obrasSelecionadas['Nome']);
                                            print '</td>';
                                            print '<td>';
                                                print utf8_encode($obrasSelecionadas['dtRegistro']);
                                            print '</td>';
                                            print '<td>';
                                                print utf8_encode($obrasSelecionadas['Fiscal']);
                                            print '</td>';
                                            print '<td>';
                                                print utf8_encode($obrasSelecionadas['dtPrevisao']);
                                            print '</td>';
                                        print '</tr>';
                                    }

                                    print '</table>';
                                print '</div>';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row quadro-principal">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>Abertas</b>
                                        <input type="text" value="pesquisar" class="pull">
                                    </div>
                                    <?php

                                        $resultadoSelecao = Obra::selecionaObras(1);

                                        print '<div class="table-responsive">';
                                            print '<table class="table">';

                                            print '<tr>';
                                                print '<td><b>Protocolo</b></td>';
                                                print '<td><b>Titulo</b></td>';
                                                print '<td><b>Bairro</b></td>';
                                                print '<td><b>Abertura</b></td>';
                                                print '<td><b>Fiscal</b></td>';
                                            print '</tr>';

                                            foreach($resultadoSelecao as $obrasSelecionadas){
                                                print '<tr>';
                                                    print '<td>';
                                                        $metodo = 'cadastroObras.php?protocolo='.$obrasSelecionadas['codProtocolo'];
                                                        print '<a href="'.$metodo.'">'.$obrasSelecionadas['codProtocolo'].'</a>';
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['Titulo']);
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['Bairro']);
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['dtRegistro']);
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['Fiscal']);
                                                    print '</td>';
                                                print '</tr>';
                                            }

                                            print '</table>';
                                        print '</div>';
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>Concluídas</b>
                                        <input type="text" value="pesquisar" class="pull">
                                    </div>
                                    <?php

                                        $resultadoSelecao = Obra::selecionaObras(2);

                                        print '<div class="table-responsive">';
                                            print '<table class="table">';

                                            print '<tr>';
                                                print '<td><b>Protocolo</b></td>';
                                                print '<td><b>Titulo</b></td>';
                                                print '<td><b>Bairro</b></td>';
                                                print '<td><b>Conclusao</b></td>';
                                                print '<td><b>Fiscal</b></td>';
                                            print '</tr>';

                                            foreach($resultadoSelecao as $obrasSelecionadas){
                                                print '<tr>';
                                                    print '<td>';
                                                        $metodo = 'cadastroObras.php?protocolo='.$obrasSelecionadas['codProtocolo'];
                                                        print '<a href="'.$metodo.'">'.$obrasSelecionadas['codProtocolo'].'</a>';
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['Titulo']);
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['Bairro']);
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['dtConclusao']);
                                                    print '</td>';
                                                    print '<td>';
                                                        print utf8_encode($obrasSelecionadas['Fiscal']);
                                                    print '</td>';
                                                print '</tr>';
                                            }

                                            print '</table>';
                                         print '</div>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>