<?php

namespace Fiscal;

class Fiscal
{

    public static final function selecionaFiscais(){

        $sql = 'SELECT * FROM prefguara_Fiscais';

        $conexao = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

        $selecao = mysqli_query($conexao, $sql);

        while($resultadoSelecao = mysqli_fetch_assoc($selecao)){
            $aFiscais[] = $resultadoSelecao;
        }

        return $aFiscais;

    }

    public static final function carregaFiscais(){

        $sql = 'SELECT * FROM prefguara_Fiscais';
//        $sql.= 'LEFT JOIN '

        $conexao = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

        $selecao = mysqli_query($conexao, $sql);

        while($resultadoSelecao = mysqli_fetch_assoc($selecao)){
            $aFiscais[] = $resultadoSelecao;
        }

        if(isset($aFiscais))
        {

            print '<table class="table">';

                print '<tr>';

                print '<td><b>Nome</b></td>';
                print '<td><b>Área / Atuação</b></td>';
                print '<td><b>Telefone</b></td>';
                print '<td><b>Operante</b></td>';

            print '</tr>';

            foreach ($aFiscais as $index => $fiscal) {

                    print '<tr>';

                        print '<td>' . $fiscal['Nome'] . '</td>';

                        print '<td>' . $fiscal['AreaFiscalizar'] . '</td>';

                        print '<td class="col-md-2">' . $fiscal['Telefone'] . '</td>';

                        print '<td class="col-md-2">' . $fiscal['Operante'] . '</td>';

                        print  '<td class="col-md-1">';

                        print '<input class="btn btn-danger pull-right" type="button" onClick="solicitaExclusaoFiscal('.$fiscal['codFiscal'].')" value="Excluir">';

                        print '</td>';

                        print  '<td class="col-md-1">';

                        print '<input class="btn btn-info pull-left" type="button" value="Editar">';

                        print '</td>';

                    print '</tr>';

            }

            print '</table>';

        }
        else
        {

            print 'Nenhum fiscal cadastrado.';

        }
   }

   public static final function ultimoFiscalAdicionado()
   {

       $sql = 'SELECT * FROM prefguara_Fiscais ORDER BY codFiscal DESC LIMIT 1';
//        $sql.= 'LEFT JOIN '

       $conexao = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

       $selecao = mysqli_query($conexao, $sql);

       while($resultadoSelecao = mysqli_fetch_assoc($selecao)){
           $aFiscais[] = $resultadoSelecao;
       }

       if(isset($aFiscais))
       {

           foreach ($aFiscais as $index => $fiscal)
           {
                print '<table class="table">';

                    print '<tr>';

                        print '<td>' . $fiscal['Nome'] . '</td>';

                        print '<td>' . $fiscal['AreaFiscalizar'] . '</td>';

                        print '<td class="col-md-2">' . $fiscal['Telefone'] . '</td>';

                        print '<td class="col-md-2">' . $fiscal['Operante'] . '</td>';

                        print  '<td class="col-md-1">';

                            print '<input class="btn btn-danger pull-right" type="button" onClick="solicitaExclusaoFiscal()" value="Excluir">';

                        print '</td>';

                        print  '<td class="col-md-1">';

                            print '<input class="btn btn-info pull-left" type="button" value="Editar">';

                        print '</td>';

                    print '</tr>';

                print  '</table>';
           }

       }

   }

}