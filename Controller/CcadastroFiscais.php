<?php

    use CcadastroFiscais\Fiscal;

    $nome     = $_GET['Nome'];
    $telefone = $_GET['Telefone'];
    $area     = $_GET['AreaFiscalizar'];
    $operante = $_GET['Operante'];

    $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');

    $sql = 'INSERT INTO prefguara_Fiscais';
    $sql .= ' (codFiscal, Nome, Telefone, AreaFiscalizar, Operante, FotoFiscal)';
    $sql .= " VALUES (NULL, '" . $nome . "','" . $telefone . "', '" . $area . "', '" . $operante . "',NULL);";

    $insercapBanco = mysqli_query($conexaoBanco, $sql);

    if($insercapBanco){

        Fiscal::selecionaFiscais();
    }
