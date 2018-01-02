<?php
    $obra = $_GET['protocolo'];
    $material = $_GET['material'];
    $quantidade = $_GET['quantidade'];

    $sql = 'INSERT INTO prefguara_materiaisPorObras(codMaterial, Material, Obra, Quantidade) VALUES(NULL, "'.$material.'", "'.$obra.'", "'.$quantidade.'")';

    $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');

    $insercapBanco = mysqli_query($conexaoBanco, $sql);

    if($insercapBanco){
        print '<table class="table tableMateriais">';
            include('.././Controller/CcadastroObrasClass.php');
            $instanciaCarregaMaterial = new CcadastroObrasClass();
            $instanciaCarregaMaterial -> carregaMateriais($obra);
        print '</table>';
    }