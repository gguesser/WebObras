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
                //print '<link rel="stylesheet" href=".././Componentes/sweetAlert/dist/sweetalert.css">';

                //Relatorios
                print '<link href="../Estilo/relatorios.css" rel="stylesheet" type="text/css">';

                //Sweet Original
                print '<script src=".././Componentes/sweetalert2/dist/sweetalert2.min.js"></script>';
                print '<link rel="stylesheet" href=".././Componentes/sweetalert2/dist/sweetalert2.css">';

            print '</head>';
        }

        public function verificaMenu()
        {
            print '$(document).ready(function(){;';
            print 'var tam = $(window).width();';

            print 'if (tam >=1024){';
            print '$(".menuNormal").show();';
            print '}else{';
            print '$(".menuPequeno").hide();';
            print '}';
            print '});';
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


