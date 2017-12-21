<?php
	
	require('.././ClassesPHP/Header.class.php');

	$instanciaHeader = new Header;

	print '<html>';
		$instanciaHeader -> headerPrincipal('SOI-Guaramirim');
		print '<body>';
			include('menu.html');
		print '</body>';
	print '</html>';
?>