<?php

namespace conexaoDB;


class conexaoDB
{

    public static function conexaoBanco(){

        $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');

        mysqli_close($conexaoBanco);

        return $conexaoBanco;

    }

}