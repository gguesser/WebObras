<?php

    session_start();

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

    $_SESSION['novaObra'] = array(
        'protocolo'       => $protocolo,
        'tituloObra'      => $tituloObra,
        'nomeMorador'     => $nomeMorador,
        'dataRegistro'    => $dataRegistro,
        'rua'             => $rua,
        'numero'          => $numero,
        'bairro'          => $bairro,
        'telefoneMorador' => $telefoneMorador,
        'emailMorador'    => $emailMorador,
        'problema'        => $problema,
        'fiscal'          => $fiscal,
        'dataPrevisao'    => $dataPrevisao,
        'status'          => $status,
        'dscAdicional'    => $dscAdicional,
        'dataConclusao'   => $dataConclusao,
        'codigoMateriais' => $codigoMateriais
    );

    if(!isset($_SESSION['ocorrenciaObra'])) {

        $status = '1';

        $sql = 'INSERT INTO prefguara_obras';
        $sql .= ' (codProtocolo, Titulo, Nome, dtRegistro, Rua, Numero, Telefone, Email, dscProblema, Fiscal, dtPrevisao, Status, dscAdicional, dtConclusao, CodigoMateriais, Bairro)';
        $sql .= " VALUES ('". $protocolo ."', '" . $tituloObra . "','" . $nomeMorador . "', '" . $dataRegistro . "', '" . $rua . "', '" . $numero . "', '" . $telefoneMorador . "', '" . $emailMorador . "', '" . $problema . "', '" . $fiscal . "', '" . $dataPrevisao . "', '" . $status . "', '" . $dscAdicional . "', '" . $dataConclusao . "', '" . $codigoMateriais . "', '" . $bairro . "');";

        $acao = 'INCLUIDA';

    }else{

        unset($_SESSION['ocorrenciaObra']);

        $sql = 'UPDATE prefguara_obras';
        $sql.= ' SET Titulo = "'.$tituloObra.'", Nome = "'.$nomeMorador.'", Rua = "'.$rua.'", Numero = '.$numero.', Telefone = '.$telefoneMorador.', Email = "'.$emailMorador.'", dscProblema = "'.$problema.'", Fiscal = "'.$fiscal.'", dtPrevisao = "'.$dataPrevisao.'", Status = "'.$status.'", dscAdicional = "'.$dscAdicional.'", Bairro = "'.$bairro.'"';
        $sql.= ' WHERE codProtocolo = '.$protocolo;

        $acao = 'ALTERADA';
    }

    $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

    $insercaoBanco = mysqli_query($conexaoBanco, $sql);

    mysqli_close($conexaoBanco);

    if($insercaoBanco){
        $_SESSION['erroRequisicao'] = false;

//        if($acao == 'INCLUIDA')
//        {
//
//            $url = '/Prefeitura/WebObras/View/RelatorioNovaObra.php?nome='.$nomeMorador.'&email='.$emailMorador.'&registro='.$dataRegistro;
//            $url = $url . '&protocolo='.$protocolo.'&bairro='.$bairro.'&rua='.$rua.'&fiscal='.$fiscal.'&previsao='.$dataPrevisao.'&status='.$status;
//            $url = $url . '&problema='.$problema;
//
//            print $url;
//            exit;
//
//            header('Location: ' . $url);
//        }

    }else{
        $_SESSION['erroRequisicao'] = true;
    }

    header('Location: /Prefeitura/WebObras/View/cadastroObras.php?protocolo='.$protocolo);