<?php

namespace Fiscal;

class Fiscal
{

    public static final function selecionaFiscais(){

        $sql = 'SELECT * FROM prefguara_Fiscais';

        $conexao = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');

        $selecao = mysqli_query($conexao, $sql);

        while($resultadoSelecao = mysqli_fetch_assoc($selecao)){
            $aFiscais[] = $resultadoSelecao;
        }

        return $aFiscais;

    }

    public static final function carregaFiscais(){

        $sql = 'SELECT * FROM prefguara_Fiscais';

        $conexao = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');

        $selecao = mysqli_query($conexao, $sql);

        while($resultadoSelecao = mysqli_fetch_assoc($selecao)){
            $aFiscais[] = $resultadoSelecao;
        }

        foreach ($aFiscais as $index => $fiscal){
            print '<tr>';
                print '<td>'. utf8_encode($fiscal['Nome']) .'</td>';
                print '<td>'. utf8_encode($fiscal['AreaFiscalizar']) .'</td>';
                print '<td class="col-md-2">20</td>';
                print '<td class="col-md-2">'. utf8_encode($fiscal['Operante']) .'</td>';
                print  '<td class="col-md-1">';
                    print '<input class="btn btn-danger pull-right" type="button" value="Excluir">';
                print '</td>';
                print  '<td class="col-md-1">';
                    print '<input class="btn btn-info pull-left" type="button" value="Editar">';
                 print '</td>';
            print '</tr>';
        }
    }

}