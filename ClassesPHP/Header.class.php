<?php
	
	class Header
	{	
		public function headerPrincipal($prPagina)
		{

			print '<head>';
				print '<title>'.$prPagina.'</title>';
				print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
				//Original
				print '<link href="../Estilo/estiloPrincipal.css" rel="stylesheet" type="text/css">';
            	print '<link href="../Estilo/menuGeral.css" rel="stylesheet" type="text/css">';
            	print '<link href="../Estilo/textosCampos.css" rel="stylesheet" type="text/css">';
            	print '<link href="../Estilo/configuracaoPadrao.css" rel="stylesheet" type="text/css">';
				//Bootstrap
            	print '<link rel="stylesheet" href="../View/bootstrap-3.3.7/dist/css/bootstrap.min.css">';
				print '<link rel="stylesheet" href="../View/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">';
				print '<script src="../View/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>';
			print '</head>';
		}
	}
?>


