<?php

    include('.././ClassesPHP/Fiscal.php');

    use Fiscal\Fiscal;

    $codFiscal = $_GET['codFiscal'];

    $sql = 'DELETE FROM prefguara_Fiscais WHERE codFiscal = ' . $codFiscal;

    $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

    $exclusaoBanco = mysqli_query($conexaoBanco, $sql);

    print Fiscal::carregaFiscais();