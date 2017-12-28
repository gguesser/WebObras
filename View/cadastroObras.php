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
            <div class="col-md-1">
            </div>
            <div class="col-sm-12 menuPequeno">
                <button class="btn btn-default dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Opções
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-10 configuracaoEstrutural">
<!--                <div class="container">-->
                    <form action="../Controller/CcadastroObras.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="fontePadrao">Cadastro de Obras</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <table class="larguraTable">
                                            <tr>
                                                <td>
                                                    Informações
                                                </td>
                                                <td>
                                                    <input type="button" value="Andamento Obra" class="btn btn-warning posicionamentoDireita botaoAndamentoObra">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-body">
                                        <div class="rowEspacamento">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">Titulo</label>
                                                    <input type="text" class="componente_linha_1" name="txtTitulo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Bairro</label>
                                                    <select name="cbbBairro" class="form-contro componente_linha_3">
                                                        <?php

                                                        $sql = 'SELECT Nome FROM prefguara_bairros';

                                                        $conexao = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');
                                                        $selectBanco = mysqli_query($conexao, $sql);

                                                        while($selecaoBairros = mysqli_fetch_assoc($selectBanco)) {
                                                            print '<option>' . utf8_decode($selecaoBairros['Nome']) . '</option>';
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Rua</label>
                                                    <input type="text" name="txtRua" class="componente_linha_3">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Número</label>
                                                    <input type="text" name="txtNumero" class="componente_linha_3">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="comment">Descrição do problema</label>
                                                        <textarea name="dscProblema" id="" cols="30" rows="5" class="form-contro componente_linha_3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Morador
                                    </div>
                                    <div class="panel-body">
                                         <div class="rowEspacamento">
                                             <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Nome</label>
                                                    <input type="text" name="txtNome" class="componente_linha_3">
                                                </div>
                                                 <div class="col-md-4">
                                                     <label for="">Telefone</label>
                                                     <div class="telefone" style="width: 100%">
                                                         <input type="text" name="txtTelefoneDDD" style="width: 15%">
                                                         <input type="text" name="txtTelefone" style="width: 83%">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                     <label for="">E-mail</label>
                                                     <input type="text" name="txtEmail" class="componente_linha_3">
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
                                 </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Adicional
                                    </div>
                                    <div class="panel-body">
                                        <div class="rowEspacamento">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="comment">Descrição adicional</label>
                                                    <textarea name="dscAdicional" id="" cols="30" rows="5" class="form-contro componente_linha_3"></textarea>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-8">
                                                    <label for="">Fiscal</label>
                                                    <select name="cbbFiscal" class="form-contro componente_linha_3">
                                                        <?php

                                                        $sql = 'SELECT Nome FROM prefguara_Fiscais';

                                                        $conexao = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');
                                                        $selectBanco = mysqli_query($conexao, $sql);

                                                        while($selecaoBairros = mysqli_fetch_assoc($selectBanco)) {
                                                            print '<option>' . utf8_decode($selecaoBairros['Nome']) . '</option>';
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Data Previsão</label>
                                                    <input type="text" name="dtPrevisao" class="componente_linha_3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success" value="Salvar">
                            </div>
                        </div>
                    </form>
<!--                </div>-->
            </div>
        </div>
	</body>
</html>