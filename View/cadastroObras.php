<html>
	<?php

		include('.././ClassesPHP/Header.class.php');
		$instanciaCabecalho = new Header();
		$instanciaCabecalho -> headerPrincipal('Cadastro de obras');
	?>
	<body>
<!--        <div class="row">-->
<!--            <div class="col-sm-12 col-md-12">-->
<!--                <div class="menuSuperior">-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-md-12 barraSuperior">-->
<!---->
<!--            </div>-->
<!--        </div>-->
        <div class="row">
            <div class="col-md-12 configuracaoEstrutural">
                <div class="menuGeral">
                    <?php
                        include('menu.html');
                    ?>
                </div>
                <div class="container">
                    <form action="../Controller/CcadastroObras.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="fontePadrao">Cadastro de Obras</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <table class="larguraTable">
                                        <tr>
                                            <td>
                                                Informações
                                            </td>
                                            <td>
                                                <input type="button" value="Andamento Obra" class="btn btn-warning posicionamentoDireita">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="panel-body">
                                    <div class="rowEspacamento">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Titulo</label>
                                                <input type="text" class="componente_linha_1">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Rua</label>
                                                <input type="text" name="txtRua" class="componente_linha_3">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Bairro</label>
                                                <input type="text" name="txtBairro" class="componente_linha_3">
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
                                                    <textarea name="" id="" cols="30" rows="5" class="form-contro componente_linha_3"></textarea>
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
                            <input type="submit" class="btn btn-success" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</body>
</html>