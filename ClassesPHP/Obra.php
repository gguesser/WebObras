<?php

namespace Obra;

class Obra
{
    public static function selecionaObras($prStatusObra){

        $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');

        if($conexaoBanco){
            $sql= 'SELECT * FROM prefguara_obras WHERE status = ' . $prStatusObra;

            $selecionaObras = mysqli_query($conexaoBanco, $sql);

            $obrasSelecionadas = array();

            $contador = 0;

            while($resultado = mysqli_fetch_assoc($selecionaObras)){
                $obrasSelecionadas[$contador] = $resultado;
                $contador = $contador + 1;
            }

            return $obrasSelecionadas;

        }else{
            print '<script>';
                print 'swal(\'"Erro!", "Não foi possível conectar a base de dados.", "error"\');';
            print '</script>';
        }

    }
}