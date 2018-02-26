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
                                <h3>CADASTRO DE FISCAIS</h3>
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
                            <table class="larguraTable">
                                <tr>
                                    <td>
                                        <h4><b>FISCAIS</b></h4>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success pull-right" onclick="acaoModais('ativa', 'adicionaEdita')" data-toggle="modal" data-target="#adicionaEdita" >Incluir um novo</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="table-responsive" id="fiscais">
                            <table class="table">
                                <?php

                                    Fiscal::carregaFiscais();

                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--        MODAL DE CADASTRO/EDIÇÂO DE FISCAL-->
            <div class="modal" id="adicionaEdita" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <table class="larguraTable">
                                <tr>
                                    <td>
                                        <h5 class="modal-title"><b>Novo Fiscal</b></h5>
                                    </td>
                                    <td>
                                        <button type="button" onclick="acaoModais('desativa', 'adicionaEdita')" class="close" data-dismiss="modal" aria-label="Close">
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
        </div>
    </body>
</html>

<script>
    function acaoModais(prAcao, prModal){

        modal = $('#' + prModal);

        if (prAcao == 'ativa') {

            modal.show();

        } else {

            modal.hide();

        }
    }

    function cadastroFiscais(){
        $.ajax({
            url: '.././Controller/CcadastroFiscais.php',
            type: 'GET',
            dataType: "html",
            data: 'Nome=' + $("#txtNome").val() + '&Telefone=' + $('#txtTelefone').val() + '&AreaFiscalizar=' + $("#txtArea").val() + '&Operante=' + $("#cbbOperante :selected").text(),
            success: function(data)
            {
                if(data){

                    $('#fiscais').html(data);

                    $('#txtNome').val('');
                    $('#txtTelefone').val('');
                    $('#txtArea').val('');

                    var modal = 'adicionaEdita';

                    swal("Bom trabalho!", "Novo fiscal adicionado com sucesso!", "success");

                }else{
                    swal("Erro!", "Erro ao adicionar fiscal.","error");
                }
            }
        });
    }

    function solicitaExclusaoFiscal(prCodFiscal) {

        swal({
                title: 'Deseja exlucuir fiscal o fiscal ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não',
                confirmButtonClass: 'confirm-class',
                cancelButtonClass: 'cancel-class',
                closeOnConfirm: false,
                closeOnCancel: false
            })
            .then((isConfirm) => {

                if(isConfirm.value)
                {
                    excluiFiscal(prCodFiscal);
                }

            })

    }

    function excluiFiscal(prCodFiscal){

        $.ajax({
            url: '.././Controller/CexcluiFiscais.php',
            type: 'GET',
            dataType: "html",
            data: 'codFiscal=' + prCodFiscal,
            success: function(data)
            {

                console.log(data);

                if(data){
                    swal("Bom trabalho!", "Fiscal excluido com sucesso!", "success");

                    $('#fiscais').html(data);

                }else{
                    swal("Erro!", "Erro ao exlcuir fiscal.","error");
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