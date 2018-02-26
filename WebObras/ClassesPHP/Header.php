<?php

    namespace Header;
	
	class Header
    {
        public static final function headerPrincipal($prPagina)
        {

            print '<head>';
                print '<title>' . $prPagina . '</title>';
                print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
                print '<meta name="viewport" content="width=device-width, initial-scale=1">';
                //Original - Js
                print '<script src="../Js/jquery-3.2.1.min.js"></script>';
                print '<script language="javascript" type="text/javascript" src="../Js/menuVerifica.js"></script>';
                print '<script type="text/javascript" src="../Js/mensagens.js"></script>';
                //Bootstrap
                print '<link rel="stylesheet" href="../View/bootstrap-3.3.7/dist/css/bootstrap.min.css">';
                print '<link rel="stylesheet" href="../View/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">';
                print '<script src="../View/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>';

                //Original - Css
                print '<link href="../Estilo/estiloPrincipal.css" rel="stylesheet" type="text/css">';
                print '<link href="../Estilo/menuGeral.css" rel="stylesheet" type="text/css">';
                print '<link href="../Estilo/textosCampos.css" rel="stylesheet" type="text/css">';
                //Validate.js
                //print '<script src=".././Componentes/validate.min.js"></script>';
                print '<script src=".././Componentes/validate/dist/jquery.validate.js" type="text/javascript"></script>';
                //Mask Juery
                print '<script src=".././Componentes/MaskJquery/dist/jquery.mask.min.js"></script>';
                //Sweet Alert
                //Sweet Bootstrap
                //print '<script src=".././Componentes/sweetAlert/dist/sweetalert.min.js"></script>';
//                print '<link rel="stylesheet" href=".././Componentes/sweetAlert/dist/sweetalert.css">';

                //Relatorios
                print '<link href="../Estilo/relatorios.css" rel="stylesheet" type="text/css">';

                //Sweet Original
                print '<script src=".././Componentes/sweetalert2/dist/sweetalert2.min.js"></script>';
                print '<link rel="stylesheet" href=".././Componentes/sweetalert2/dist/sweetalert2.css">';

                //HighCharts
//                print '<script src=".././Componentes/Highcharts-6.0.4/code/js/highcharts.js"></script>';
                print '<script src="https://code.highcharts.com/highcharts.js"></script>';

            print '</head>';
        }

        public static final function menu($prTitulo, $prUsuario)
        {

            $menuNormal = include('.././View/menu.html');
            $menuMobile = include('.././View/menuMobile.php');

            $html = '
                    <div class="row">
                        <div class="menuNormal">'.
                            $menuNormal
                        .'</div>
                        <div class="menuPequeno">'.
                            $menuMobile
                        .'</div>
                        <div class="row cabecalho">
                            <div class="row">
                                <div class="col-xs-12 colsm-12 col-md-12 col-lg-12">
                                    <h1 class="fontePadrao text-center text-uppercase text-secondary mb-0">'.$prTitulo.'</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="col-xs-2">
                                    </div>
                                    <div class="col-xs-4">
                                        <h5 class="pull-left">Usuário: '.$prUsuario.'<?php print $_SESSION[\'nomeUsuario\'];?></h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <h5 class="pull-right">Data: <?php print date(\'d/m/Y\');?></h5>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="menuPequeno">
                            <?php
                                include(\'menuMobile.php\');
                            ?>
                        </div>
                    </div>
            ';

            print $html;
        }

        public function headerTabela()
        {
			print '<tr>';
				print '<td>Código</td>';
            	print '<td>Bairro</td>';
            	print '<td>Rua</td>';
            	print '<td>Morador</td>';
            	print '<td>Código</td>';
            	print '<td>Abertura</td>';
            	print '<td>Fiscal</td>';
            	print '<td>Previsão</td>';
			print '</tr>';
        }
    }
?>


