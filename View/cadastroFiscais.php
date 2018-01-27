<html>
    <?php

        include('.././ClassesPHP/Header.php');
        include('.././ClassesPHP/Fiscal.php');

        use Header\Header;
        use Fiscal\Fiscal;

        session_start();;

        if(isset($_SESSION['validade'])){

            Header::headerPrincipal('Cadastro de obras');

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
            <div class="row cabecalho">
                <div class="col-xs-12 colsm-12 col-md-12 col-lg-12">
                    <h3 class="fontePadrao">Cadastro de Fiscais</h3>
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
            <div class="col-md-10 estrutura">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-ls-12 corpo">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <table class="larguraTable">
                                    <tr>
                                        <td>
                                            <h4><b>FISCAIS</b></h4>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success pull-right" onclick="acaoModais('ativa', '.adicionaEdita')" data-toggle="modal" data-target=".adicionaEdita" >Incluir um novo</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td><b>Àrea</b></td>
                                        <td><b>Obras Abertas</b></td>
                                        <td><b>Operante</b></td>
                                        <td></td>
                                    </tr>

                                    <?php

                                        Fiscal::carregaFiscais();

                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--        MODAL DE CADASTRO/EDIÇÂO DE FISCAL-->
        <div class="modal adicionaEdita" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <table class="larguraTable">
                            <tr>
                                <td>
                                    <h5 class="modal-title"><b>Novo Fiscal</b></h5>
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
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="txtNome" class="componente_linha_3">Nome</label>
                                <input type="text" class="componente_linha_3" id="txtNome">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="txtTelefone" class="componente_linha_3">Telefone</label>
                                <input type="text" class="componente_linha_3" id="txtTelefone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                                <label for="txtArea" class="componente_linha_3">Área</label>
                                <input type="text" class="componente_linha_3" id="txtArea">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <label for="cbbOperante" class="componente_linha_3">Status de Operante</label>
                                <select name="cbbOperante" id="cbbOperante" class="componente_linha_3">
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="cadastroFiscais()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

<script>
    function acaoModais(prAcao, prModal){
        if (prAcao == 'ativa') {
            $(prModal).show();

        } else {

            $(prModal).hide();

        }
    }

    function cadastroFiscais(){
        $.ajax({
            url: '.././Controller/CcadastroFiscais.php',
            type: 'GET',
            dataType: "html",
            data: 'Nome=' + $("#txtNome").val() + '&Telefone=' + $('#txtTelefone').val() + '&AreaFiscalizar=' + $("#txtArea").val() + '&Operante=' + $("#cbbOperante :selected").text(),
            success: function(data) {

                console.log(data);

                if(data){
                    swal("Bom trabalho!", "Novo fiscal adicionado com sucesso!", "success");
                }else{
                    swal("Erro!", "Erro ao adicionar fiscal.","error");
                }
            }
        });
    }

    // Validação
    $("#adicionaEdita").validate({
        rules: {
            txtNome: "required",
            txtTelefone: "required",
            txtArea: "required"
        },
        messages: {
            txtNome: "Favor, informar o nome do fiscal",
            txtTelefone: "Favor, informar o telefone",
            txtArea: "Favor, informar a área de atuação do fiscal"
        }
    });

    // Mascara de campos
    $(document).ready(function(){
        $("#txtTelefone").mask('00000-0000');
    });
</script>