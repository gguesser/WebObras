<?php

    include('.././ClassesPHP/Header.php');

?>

<html>
    <?php

        use Header\Header;
        Header::headerPrincipal('Cadastro de obras');

    ?>
	<body>
        <?php
            session_start();

            if(!isset($_SESSION['validade'])){
                header('Location: /Prefeitura/WebObras/View/ErroPagina.php');
            }
            if(isset($_SESSION['erroRequisicao'])) {
                if ($_SESSION['erroRequisicao'] == false) {
         ?>
                    <script>
                        swal("Erro", "Houve algum problema em incluir/alterar esta obra.", "error");
                    </script>
         <?php

                }else if ($_SESSION['erroRequisicao'] == true){

         ?>
                    <script>
                        swal("Bom trabalho", "Obra alterada/incluída com sucesso", "success");
                    </script>
        <?php
                }
            }
            unset($_SESSION['erroRequisicao']);

            if(array_key_exists('protocolo',$_GET)){
                $sql = 'SELECT * FROM prefguara_obras WHERE codProtocolo = '.$_GET['protocolo'];

                $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');
                $selecaoObra = mysqli_query($conexaoBanco, $sql);

                $resultadoSelecao = mysqli_fetch_assoc($selecaoObra);

                mysqli_close($conexaoBanco);
            }else{
                $explicacao = 'este campo é preenchido automáticamente!';
            }
        ?>
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
            <div class="row cabecalho">
                <div class="col-xs-12 colsm-12 col-md-12 col-lg-12">
                    <h3 class="fontePadrao">Cadastro de Obra</h3>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-4">
                        <h5 class="pull-left">Usuário: </h5>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h5 class="pull-right">Data: <?php print date('d/m/Y');?></h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-sm-12 col-md-10 estrutura">
<!--                <div class="container-fluid">-->
                    <form action="../Controller/CcadastroObras.php" method="POST" id="obraForm">
                        <div class="row">
                            <div class="col-md-12 corpo">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <table class="larguraTable">
                                            <tr>
                                                <td>
                                                    Informações
                                                </td>
                                                <td>
                                                    <?php
                                                        if(isset($resultadoSelecao)) {
                                                            print '<input type = "button" value = "Andamento Obra" onclick = "acaoModais(\'ativa\', \'.tipoModal\')" class="btn btn-warning posicionamentoDireita botaoAndamentoObra" data-toggle="modal" data-target=".tipoModal" >';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-body">
                                        <div class="rowEspacamento">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Protocolo</label>
                                                    <input type="text" class="componente_linha_1" name="txtProtocolo" value="<?php print isset($resultadoSelecao) ? $resultadoSelecao['codProtocolo'] : $explicacao;?>" readonly="readonly">
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="">Titulo</label>
                                                    <input type="text" class="componente_linha_1" name="txtTitulo" value="<?php print isset($resultadoSelecao) ? $resultadoSelecao['Titulo'] : NULL;?>">
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

                                                            if(isset($resultadoSelecao)){
                                                                if($selecaoBairros['Nome'] == $resultadoSelecao['Bairro']){
                                                                    $value =  'selected';
                                                                }
                                                                else{
                                                                    $value = "";
                                                                }
                                                            }

                                                            print '<option '. $value .'>' . utf8_decode($selecaoBairros['Nome']) . '</option>';
                                                        }

                                                        mysqli_close($conexaoBanco);

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Rua</label>
                                                    <input type="text" name="txtRua" class="componente_linha_3" value="<?php print isset($resultadoSelecao) ? $resultadoSelecao['Rua'] : NULL;?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Número</label>
                                                    <input type="text" name="txtNumero" class="componente_linha_3" value="<?php print isset($resultadoSelecao) ? $resultadoSelecao['Numero'] : NULL;?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="comment">Descrição do problema</label>
                                                        <textarea name="dscProblema" id="" cols="30" rows="5" class="form-contro componente_linha_3" value="<?php print isset($resultadoSelecao) ? $resultadoSelecao['dscProblema'] : NULL;?>"></textarea>
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
                                                    <input type="text" name="txtNome" class="componente_linha_3" value="<?php print isset($resultadoSelecao) ? $resultadoSelecao['Nome'] : NULL;?>">
                                                </div>
                                                 <div class="col-md-4">
                                                     <label for="">Telefone</label>
                                                     <div class="telefone" style="width: 100%">
                                                         <input type="text" name="txtTelefoneDDD" style="width: 15%" value="<?php print isset($resultadoSelecao) ? substr($resultadoSelecao['Telefone'], 1, 2) : NULL;?>">
                                                         <input type="text" name="txtTelefone" style="width: 83%" value="<?php print isset($resultadoSelecao) ? substr($resultadoSelecao['Telefone'], 3, 10) : NULL;?>">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                     <label for="">E-mail</label>
                                                     <input type="text" name="txtEmail" class="componente_linha_3" value="<?php print isset($resultadoSelecao) ? $resultadoSelecao['Email'] : NULL;?>">
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

                                                        while($selecaoFiscais = mysqli_fetch_assoc($selectBanco)) {

                                                            if(isset($resultadoSelecao)){
                                                                if(utf8_encode($selecaoFiscais['Nome']) == $resultadoSelecao['Fiscal']){
                                                                    $value =  'selected';
                                                                }
                                                                else{
                                                                    $value = "";
                                                                }
                                                            }

                                                            print '<option '.$value.'>' . utf8_encode($selecaoFiscais['Nome']) . '</option>';
                                                        }

                                                        mysqli_close($conexaoBanco);

                                                        ?>
                                                    </select>
                                                    <input type="hidden" value="<?php print $resultadoSelecao['Status']?>" name="cbbStatus">
                                                </div>
                                                <div class="col-md-4">
                                                    <?php
                                                        if(isset($resultadoSelecao)) {
                                                            $aData = explode('-', $resultadoSelecao['dtPrevisao']);
                                                            $dataFormatada = $aData[2] . '/' . $aData[1] . '/' . $aData[0];
                                                        }
                                                    ?>
                                                    <label for="">Data Previsão</label>
                                                    <input type="text" name="dtPrevisao" class="componente_linha_3" value="<?php $resultadoSelecao['dtPrevisao'] ? $dataFormatada : NULL; ?>">
                                                </div>
                                            </div>
                                            <?php

                                                if(isset($resultadoSelecao)){

                                                    print '<div class="row">';
                                                        print '<div class="col-md-12">';
                                                            print '<div class="panel panel-default painelMateriais">';
                                                                print '<div class="panel-heading">';
                                                                    print '<table class="larguraTable">';
                                                                        print '<tr>';
                                                                            print '<td>';
                                                                                print 'Materiais Utilizados';
                                                                            print '</td>';
                                                                            print '<td>';
                                                                                print '<input type = "button" value="Adicionar Material" onclick = "acaoModais(\'ativa\', \'.adicionaMaterial\')" class="btn btn-primary posicionamentoDireita" data-toggle="modal" data-target=".adicionaMaterial" >';
                                                                            print '</td>';
                                                                        print '</tr>';
                                                                    print '</table>';
                                                                print '</div>';
                                                                print '<div class="table-responsive">';
                                                                    print '<table class="table tableMateriais">';

                                                                            include('.././Controller/CcadastroObrasClass.php');
                                                                            $instanciaCarregaMaterial = new CcadastroObrasClass();
                                                                            $instanciaCarregaMaterial -> carregaMateriais($resultadoSelecao['codProtocolo']);

                                                                    print '</table>';
                                                                print '</div>';
                                                            print '</div>';
                                                        print '</div>';
                                                    print '</div>';

                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success" value="Salvar">
                                <input type="button" class="btn btn-info" onclick="" value="PDF">
                            </div>
                        </div>
                    </form>
<!--                </div>-->
            </div>
        </div>
<!--        </div>-->

<!--        MODAL DE ANDAMENTO DA OBRA-->
        <div class="modal tipoModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <table class="larguraTable">
                            <tr>
                                <td>
                                    <h5 class="modal-title"><b><?php print $resultadoSelecao['codProtocolo'];?> - <?php print $resultadoSelecao['Titulo'];?></b></h5>
                                </td>
                                <td>
                                    <button type="button" onclick="acaoModais('desativa', '.tipoModal')" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label for="">Status</label>
                                <select name="cbbStatus" class="form-contro componente_linha_3">
                                    <?php

                                        $tipoStatus = array('Em Processo', 'Aberta', 'Concluída');

                                        foreach($tipoStatus as $status){
                                            if(isset($resultadoSelecao)){
                                                if($status == $resultadoSelecao['Status']){
                                                    $value =  'selected';
                                                }
                                                else{
                                                    $value = "";
                                                }
                                            }

                                            print '<option '. $value .'>' . $status . '</option>';

                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <?php
                                $aData = explode('-', $resultadoSelecao['dtRegistro']);
                                $dataFormatada = $aData[2] . '/' . $aData[1] . '/' .  $aData[0];
                                ?>
                                <label for="">Criação da obra</label>
                                <input type="text" class="componente_linha_3" value="<?php print $dataFormatada?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Progresso de tempo</label>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        60%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--        MODAL ADICIONA MATERIAL-->
        <div class="modal adicionaMaterial" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <table class="larguraTable">
                            <tr>
                                <td>
                                    <h5 class="modal-title"><b>Inclusão de Material Obra</b></h5>
                                </td>
                                <td>
                                    <button type="button" onclick="acaoModais('desativa', '.adicionaMaterial')" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Material</label>
                                <table class="larguraTable">
                                    <tr>
                                        <td>
                                            <input type="hidden" value="<?php print $resultadoSelecao['codProtocolo']?>" name="txtProbocoloModal">
                                            <select id="cbbMaterialId" name="cbbMaterial" class="form-contro componente_linha_3">
                                                <?php

                                                    if(isset($instanciaCarregaMaterial)) {
                                                        $instanciaCarregaMaterial->selecionaMateriaisExistentes();
                                                    }

                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Quantidade</label>
                                <input type="text" name="txtQuantidade" class="componente_linha_3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type = "button" value="Não encontrou o material desejado ?" onclick = "acaoModais('ativa', '.adicionaMaterialnovo')" class="btn pull-left" data-toggle="modal" data-target=".adicionaMaterialnovo" >
                        <button type="button" onclick="adicionaMaterial()" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--        CRIA NOVO MATERIAL-->
        <div class="modal adicionaMaterialnovo" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <table class="larguraTable">
                            <tr>
                                <td>
                                    <h5 class="modal-title"><b>Inclusão de Novo Material à lista</b></h5>
                                </td>
                                <td>
                                    <button type="button" onclick="acaoModais('desativa', '.adicionaMaterialnovo')" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Nome</label>
                                <input type="text" name="txtMaterialNome" class="componente_linha_3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Unidade de Medida</label>
                                <input type="text" name="txtUnidadeMedida" class="componente_linha_3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="adicionaMaterialNovo()" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

	</body>
</html>

<script>

    $("#obraForm").validate({
        rules: {
            txtTitulo: "required",
            txtRua: "required",
            txtNumero: "required",
            dscProblema: "required",
            txtNome: "required",
            txtTelefone: "required",
            txtEmail: "required",
            dtPrevisao: "required"
        },
        messages: {
            txtTitulo: "Favor, dê um título á obra",
            txtRua: "Informe a rua",
            txtNumero: "Informe o nº da casa do morador",
            dscProblema: "Descreva o problema",
            txtNome: "Informe o morador",
            txtTelefone: "Informe o DDD + Telefone do morador",
            txtEmail: "informe o email do morador",
            dtPrevisao: "Informe uma data base para conclusão da obra"
        }
    });

    $(document).ready(function(){
        $("input[type=text][name=dtPrevisao]").mask('00/00/0000');
        $("input[type=text][name=txtTelefoneDDD]").mask('00');
        $("input[type=text][name=txtTelefone]").mask('00000-0000');
    });

    function acaoModais(prAcao, prModal){
        if (prAcao == 'ativa') {
            $(prModal).show();

        } else {

            $(prModal).hide();

        }
    }

    function adicionaMaterial(){
        $.ajax({
            url: '.././Controller/incluiMaterialObra.php',
            type: 'GET',
            dataType: "html",
            data: 'protocolo=' + $("input[type=text][name=txtProtocolo]").val() + '&material=' + $("#cbbMaterialId :selected").val() + '&quantidade=' + $("input[type=text][name=txtQuantidade]").val(),
            success: function(data) {
                if(data){
                    $('.tableMateriais').html(data);
                    swal("Bom trabalho!", "Material adicionado a obra com sucesso!", "success");
                }else{
                    swal("Erro!", "Erro ao adicionar material a obra.","error");
                }
            }
        });
    }

    function adicionaMaterialNovo(){
        $.ajax({
            url: '.././Controller/incluiMaterialNovo.php',
            type: 'GET',
            dataType: "html",
            data: 'material=' + $("input[type=text][name=txtMaterialNome]").val() + '&unidadeMedida=' + $("input[type=text][name=txtUnidadeMedida]").val(),
            success: function(data) {
                if(data){
                    $('#cbbMaterialId').html(data);
                    swal("Bom trabalho!", "Material adicionado com sucesso!", "success");
                }else{
                    swal("Erro!", "Erro ao adicionar material.","error");
                }
            }
        });
    }

</script>