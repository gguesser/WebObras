<html>

    <?php

        session_start();

        include('.././ClassesPHP/Header.php');

        use Header\Header;

        Header::headerPrincipal('Estatísticas');

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
                                <h3>ESTATÍSTICAS</h3>
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

                        <div class="col-md-12 col-lg-12">

                            <div id="container" class="pull-left" style="width:100%; height:400px;"></div>

                        </div>

                    </div>

                    <div class="row quadro-principal">

                        <div class="col-md-12 col-lg-12">

                            <div id="pieChart" class="pull-left" style="width:100%; height:400px;"></div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </body>

</html>

<script>

    $(function () {

        $.ajax({
            url: '.././Controller/Cestatisticas.php',
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(json) {

                console.log(json);

                while(json){
                    console.log(json);
                }

            }
        });

        var myChart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Obras Geral'
            },
            xAxis: {
                categories: ['Abertas', 'Em processo', 'Finalizadas']
            },
            yAxis: {
                title: {
                    text: ' ---'
                }
            },
            series: [{
                name: 'Dentro do prazo',
                data: [1, 6, 4]
            }, {
                name: 'Fora do prazo',
                data: [5, 7, 3]
            }]
        });

        var pieChart = Highcharts.chart('pieChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Resumo Secretaria de Infraestrutura, 2017'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Execução',
                    y: 56.33
                }, {
                    name: '+ prioridade',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Urgentes',
                    y: 10.38
                }, {
                    name: 'Auto',
                    y: 4.77
                }, {
                    name: 'Normal',
                    y: 0.91
                }, {
                    name: '- prioridade',
                    y: 0.2
                }]
            }]
        });

    });

</script>