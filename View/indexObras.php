<html>
    <?php

    include('.././ClassesPHP/Header.class.php');
    $instanciaCabecalho = new Header();
    $instanciaCabecalho -> headerPrincipal('Cadastro de obras');
    //$instanciaCabecalho -> verificaMenu();

    ?>
    <body>
        <div class="row">
            <div class="menuNormal">
                <?php
                    include('menu.html');
                ?>
            </div>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10 configuracaoEstrutural">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="larguraTable">
                                <tr class="text-center">
                                    <td>
                                        <h3 class="fontePadrao">Resumo de Obras</h3>
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
                    <div class="panel panel-default">
                        <div class="panel-heading headingEmpProcesso">
                            <table class="larguraTable">
                                <tr>
                                    <td>
                                        Em processo
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
                                print '<td>Protocolo</td>';
                                print '<td>Titulo</td>';
                                print '<td>Bairro</td>';
                                print '<td>Rua</td>';
                                print '<td>Morador</td>';
                                print '<td>Abertura</td>';
                                print '<td>Fiscal</td>';
                                print '<td>Previsão</td>';
                            print '</tr>';

                            foreach($resultadoSelecao as $obrasSelecionadas){
                                print '<tr>';
                                    print '<td>';
                                        print $obrasSelecionadas['codProtocolo'];
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <table class="larguraTable">
                                        <tr>
                                            <td>
                                                Abertas
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
                                        print '<td>Protocolo</td>';
                                        print '<td>Titulo</td>';
                                        print '<td>Bairro</td>';
                                        print '<td>Abertura</td>';
                                        print '<td>Fiscal</td>';
                                    print '</tr>';

                                    foreach($resultadoSelecao as $obrasSelecionadas){
                                        print '<tr>';
                                            print '<td>';
                                                print $obrasSelecionadas['codProtocolo'];
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
                                                Concluídas
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
                                        print '<td>Protocolo</td>';
                                        print '<td>Titulo</td>';
                                        print '<td>Bairro</td>';
                                        print '<td>Conclusao</td>';
                                        print '<td>Fiscal</td>';
                                    print '</tr>';

                                    foreach($resultadoSelecao as $obrasSelecionadas){
                                        print '<tr>';
                                            print '<td>';
                                                print $obrasSelecionadas['codProtocolo'];
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
        </div>
    </body>
</html>
