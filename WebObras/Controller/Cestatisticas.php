<?php

    $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');


    /**Busca a quantidade de obras Abertas*/

    $sqlAberta = 'SELECT COUNT(*) FROM prefguara_obras WHERE Status = 1';

    $retorno[] = $selecaoAberta = mysqli_query($conexaoBanco, $sqlAberta);


    /**Busca a quantidade de obras Em processo*/

    $sqlEmProcesso = 'SELECT COUNT(*) FROM prefguara_obras WHERE Status = 2';

    $retorno[] = $selecaoEmProcesso = mysqli_query($conexaoBanco, $sqlEmProcesso);


    /**Buscas a quantidade de obras Finalizadas*/

    $sqlFinaliza = 'SELECT COUNT(*) FROM prefguara_obras WHERE Status = 3';

    $retorno[] = $selecaoFinaliza = mysqli_query($conexaoBanco, $sqlFinaliza);

    return $retorno;

