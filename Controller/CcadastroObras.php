<?php

    session_start();

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
        $telefoneMorador = $_POST['txtTelefoneDDD'] . '' . $_POST['txtTelefone'];
        $emailMorador    = $_POST['txtEmail'];
        $problema        = $_POST['dscProblema'];
        $fiscal          = $_POST['cbbFiscal'];
        $dataPrevisao    = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["dtPrevisao"])));
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
        $insercaoBanco = mysqli_query($conexao, $sql);

        mysqli_close($conexao);

        if(!$insercaoBanco){
            $_SESSION['erroRequisicao'] = false;
        }else{
            $_SESSION['erroRequisicao'] = true;
        }

    }else{
        $_SESSION['erroRequisicao'] = true;
    }

    $var = "<script>javascript:history.back(-2)</script>";
    echo $var;