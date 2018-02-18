<?php

namespace Material;

class Material
{
    public static final function carregaMateriais($prProtocolo){

            print '<tr>';
                print '<td class="text-center"><b>Nome</b></td>';
                print '<td class="text-center"><b>Quantidade</b></td> ';
                print '<td class="text-center"><b>Unidade de Medida</b></td>';
            print '</tr>';

            $sql = ' SELECT *, SUM(Quantidade), material.* FROM prefguara_materiaisPorObras as matobra';
            $sql.= ' LEFT JOIN prefguara_cadastroMateriais as material ON(material.codMat = matobra.Material)';
            $sql.= ' WHERE Obra = '.$prProtocolo;
            $sql.= ' GROUP BY Material';

            $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');
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

    public static function selecionaMateriaisExistentes(){

        $sql = 'SELECT * FROM prefguara_cadastroMateriais';

        $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');
        $selecaoMateriais = mysqli_query($conexaoBanco, $sql);

        while($resultadoSelecao = mysqli_fetch_assoc($selecaoMateriais)){
            print '<option value="'.$resultadoSelecao['codMat'].'">'.$resultadoSelecao['NomeMat'].'</option>';
        }

        mysqli_close($conexaoBanco);
    }
}