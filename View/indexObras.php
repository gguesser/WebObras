<html>
    <?php

    session_start();;

//    if(isset($_SESSION['validade'])){
//
//        unset($_SESSION['validade']);

        include('.././ClassesPHP/Header.class.php');
        $instanciaCabecalho = new Header();
        $instanciaCabecalho->headerPrincipal('Cadastro de obras');
        //$instanciaCabecalho -> verificaMenu();
//    }else{
//        header('Location: /Prefeitura/WebObras/View/ErroPagina.php');
//    }
    ?>
    <body>
        <div class="row">
            <div class="menuNormal">
                <?php
                    include('menu.html');
                ?>
            </div>
<!--            <div class="col-sm-12 menuPequeno">-->


            <div class="menuPequeno">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Brand</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            </div>
                <!---->
<!--                <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">-->
<!--                    <li class="primeiroElemento">-->
<!--                        <a href="indexObras.php">Inicio</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="cadastroObras.php">Cadastros</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Relatórios</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cabecalho">
                    <h3 class="fontePadrao">Resumo de Obras</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10 estrutura">
                <div class="row">
                    <div class="col-md-12">
                        <table class="larguraTable">
                            <tr class="text-center">
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary pull-left">Atualizar Tabelas</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <table class="larguraTable">
                                    <tr>
                                        <td>
                                            <b>Em processo</b>
                                        </td>
                                        <td>
                                            <input type="text" value="Pesquisa" class="posicionamentoDireita">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php
                                include('.././Controller/CIndexObras.php');
                                $instanciaCabecalho = new CIndexObras();
                                $resultadoSelecao = $instanciaCabecalho -> selecionaObras(3);

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

                            ?>
                        </div>
                    </div>
                </div>
                <div class="row"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <table class="larguraTable">
                                    <tr>
                                        <td>
                                            <b>Abertas</b>
                                        </td>
                                        <td>
                                            <input type="text" value="Pesquisa" class="posicionamentoDireita">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php
                                $resultadoSelecao = $instanciaCabecalho -> selecionaObras(1);

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

                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <table class="larguraTable">
                                    <tr>
                                        <td>
                                            <b>Concluídas</b>
                                        </td>
                                        <td>
                                            <input type="text" value="Pesquisa" class="posicionamentoDireita">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php
                                $resultadoSelecao = $instanciaCabecalho -> selecionaObras(2);

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
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>