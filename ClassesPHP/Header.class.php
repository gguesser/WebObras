<?php
	
	class Header
	{	
		public function headerPrincipal($prPagina)
		{

			print '<head>';
				print '<title>'.$prPagina.'</title>';
				print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
				//Original - Css
				print '<link href="../Estilo/estiloPrincipal.css" rel="stylesheet" type="text/css">';
            	print '<link href="../Estilo/menuGeral.css" rel="stylesheet" type="text/css">';
            	print '<link href="../Estilo/textosCampos.css" rel="stylesheet" type="text/css">';
            	print '<link href="../Estilo/configuracaoPadrao.css" rel="stylesheet" type="text/css">';
            	//Original - Js
            	print '<script src="../Js/jquery-3.2.1.min.js"></script>';
				print '<script language="javascript" type="text/javascript" src="../Js/menuVerifica.js"></script>';
				print '<script type="text/javascript" src="../Js/mensagens.js"></script>';
				//Bootstrap
            	print '<link rel="stylesheet" href="../View/bootstrap-3.3.7/dist/css/bootstrap.min.css">';
				print '<link rel="stylesheet" href="../View/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">';
				print '<script src="../View/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>';
				//Switch Alert
            	print '<script src="../Componentes/sweetalert2/dist/sweetalert2.min.js"></script>';
				print '<link rel="stylesheet" href="../Componentes/sweetalert2/dist/sweetalert2.min.js">';
			print '</head>';
		}

		public function verificaMenu(){
            print '$(document).ready(function(){;';
            	print 'var tam = $(window).width();';

            	print 'if (tam >=1024){';
            		print '$(".menuNormal").show();';
            	print '}else{';
            		print '$(".menuPequeno").hide();';
            	print '}';
            print '});';
		}
	}
?>


