<?php

    include('.././Conexao/conexaoDB.php');
    $instanciaConexao = new \conexaoDB\conexaoDB();
    $instanciaConexao -> conexaoBanco();

    if($instanciaConexao){

        $protocolo       = $_POST['txtProtocolo'];
        $tituloObra      = $_POST['txtTitulo'];
        $nomeMorador     = $_POST['txtNome'];
        $dataRegistro    = date('Y-m-d');
        $rua             = $_POST['txtRua'];
        $numero          = $_POST['txtNumero'];
        $bairro          = $_POST['cbbBairro'];
        $telefoneMorador = $_POST['txtTelefoneDDD'] . ' ' . $_POST['txtTelefone'];
        $emailMorador    = $_POST['txtEmail'];
        $problema        = $_POST['dscProblema'];
        $fiscal          = $_POST['cbbFiscal'];
        $dataPrevisao    = $_POST['dtPrevisao'];
        $status          = $_POST['cbbStatus'];
        $dscAdicional    = $_POST['dscAdicional'];
        $dataConclusao   = NULL;
        $codigoMateriais = NULL;


        if($protocolo < 1) {

            $status = '1';

            $sql = 'INSERT INTO prefguara_obras';
            $sql .= ' (codProtocolo, Titulo, Nome, dtRegistro, Rua, Numero, Telefone, Email, dscProblema, Fiscal, dtPrevisao, Status, dscAdicional, dtConclusao, CodigoMateriais, Bairro)';
            $sql .= " VALUES (NULL, '" . $tituloObra . "','" . $nomeMorador . "', '" . $dataRegistro . "', '" . $rua . "', '" . $numero . "', '" . $telefoneMorador . "', '" . $emailMorador . "', '" . $problema . "', '" . $fiscal . "', '" . $dataPrevisao . "', '" . $status . "', '" . $dscAdicional . "', '" . $dataConclusao . "', '" . $codigoMateriais . "', '" . $bairro . "');";

            $acao = 'INCLUÌDA';

        }else{

            $sql = 'UPDATE prefguara_obras';
            $sql.= ' SET Titulo = "'.$tituloObra.'", Nome = "'.$nomeMorador.'", Rua = "'.$rua.'", Numero = '.$numero.', Telefone = '.$telefoneMorador.', Email = "'.$emailMorador.'", dscProblema = "'.$problema.'", Fiscal = "'.$fiscal.'", dtPrevisao = "'.$dataPrevisao.'", Status = "'.$status.'", dscAdicional = "'.$dscAdicional.'", Bairro = "'.$bairro.'"';
            $sql.= ' WHERE codProtocolo = '.$protocolo;

            $acao = 'ALTERADA';
        }

        $conexao = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');
        $insercaoBanco = mysqli_query($conexao, $sql) or die("Erro");

        mysqli_close($conexao);

        if($insercaoBanco){

            print '<script>';
                print 'alert(\'Obra '.$acao.' com sucesso.\');';
            print '</script>';

        }else{

            print '<script>';
                print 'alert(\'Houve algum problema em incluir/alterar esta obra.\');';
            print '</script>';
        }

    }else{
        print '<script>';
            print 'alert(\'Não foi possível acessar a base de dados.\');';
        print '</script>';
    }