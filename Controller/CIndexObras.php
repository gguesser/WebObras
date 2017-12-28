<?php
/**
 * Created by PhpStorm.
 * User: gguesser
 * Date: 27/12/17
 * Time: 22:28
 */

class CIndexObras
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
                print 'alert(\'Não foi possível conectar a base de dados.\');';
            print '</script>';
        }

    }

}