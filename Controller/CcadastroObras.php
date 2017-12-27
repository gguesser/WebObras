<?php

    include('.././Conexao/conexaoDB.php');
    $instanciaConexao = new \conexaoDB\conexaoDB();
    $instanciaConexao -> conexaoBanco();

    if($instanciaConexao){

        $nomeMorador     = $_POST['txtNome'];
        $dataRegistro    = date('Y-m-d');
        $rua             = $_POST['txtRua'];
        $bairro          = $_POST['cbbBairro'];
        $telefoneMorador = $_POST['txtTelefoneDDD'] . ' ' . $_POST['txtTelefone'];
        $emailMorador    = $_POST['txtEmail'];
        $problema        = $_POST['dscProblema'];
        $fiscal          = $_POST['cbbFiscal'];
        $dataPrevisao    = $_POST['dtPrevisao'];
        $status          = '1';
        $dscAdicional    = $_POST['dscAdicional'];
        $dataConclusao   = NULL;
        $codigoMateriais = NULL;

        $sql = 'INSERT INTO prefguara_obras';
        $sql.= ' (codProtocolo, Nome, dtRegistro, Rua, Telefone, Email, dscProblema, Fiscal, dtPrevisao, Status, dscAdicional, dtConclusao, CodigoMateriais, Bairro)';
        $sql.= " VALUES (NULL, '".$nomeMorador."', '".$dataRegistro."', '".$rua."', '".$telefoneMorador."', '".$emailMorador."', '".$problema."', '".$fiscal."', '".$dataPrevisao."', '".$status."', '".$dscAdicional."', '".$dataConclusao."', '".$bairro."');";

        $conexao = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');
        $insercaoBanco = mysqli_query($conexao, $sql) or die("Erro");

        mysqli_close($conexao);

        if($insercaoBanco){

            print '<script>';
                print 'alert(\'Obra incluída com sucesso.\');';
            print '</script>';

        }else{

            print '<script>';
                print 'alert(\'Houve algum problema em incluir esta nova obra.\');';
            print '</script>';
        }

    }else{
        print '<script>';
            print 'alert(\'Não foi possível acessar a base de dados.\');';
        print '</script>';
    }

