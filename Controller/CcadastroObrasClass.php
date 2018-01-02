<?php
/**
 * Created by PhpStorm.
 * User: gguesser
 * Date: 02/01/18
 * Time: 14:49
 */

class CcadastroObrasClass
{
    public static function carregaMateriais($prProtocolo){

            print '<tr>';
                print '<td class="text-center"><b>Nome</b></td>';
                print '<td class="text-center"><b>Quantidade</b></td> ';
                print '<td class="text-center"><b>Unidade de Medida</b></td>';
            print '</tr>';

            $sql = ' SELECT *, SUM(Quantidade), material.* FROM prefguara_materiaisPorObras as matobra';
            $sql.= ' LEFT JOIN prefguara_cadastroMateriais as material ON(material.codMat = matobra.Material)';
            $sql.= ' WHERE Obra = '.$prProtocolo;
            $sql.= ' GROUP BY Material';

            $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');
            $selecaoMateriais = mysqli_query($conexaoBanco, $sql);

            while($resultadoSelecao = mysqli_fetch_assoc($selecaoMateriais)){
                print '<tr>';
                    print '<td class="text-center">';
                        print $resultadoSelecao['NomeMat'];
                    print '</td>';
                    print '<td class="text-center">';
                        print $resultadoSelecao['SUM(Quantidade)'];
                    print '</td>';
                    print '<td class="text-center">';
                        print $resultadoSelecao['UnidadeMedidaMat'];
                    print '</td>';
                print '</tr>';
            }

            mysqli_close($conexaoBanco);
    }
}