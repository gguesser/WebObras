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
    <body>
        <div class="row">
            <div class="menuNormal">
                <?php
                    include('menu.html');
                ?>
            </div>
            <div class="menuPequeno">
                <?php
                    include('menuMobile.php');
                ?>
            </div>
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
                    <div class="col-md-12 corpo">
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
                    <div class="col-md-12 corpo">
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
                </div>
                <div class="row"></div>
                    <div class="col-md-6 corpo">
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
                    <div class="col-md-6 corpo">
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
    </body>
</html>