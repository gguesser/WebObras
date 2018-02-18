<?php

    include('.././ClassesPHP/Material.php');

    use Material\Material;

    $obra = $_GET['protocolo'];
    $material = $_GET['material'];
    $quantidade = $_GET['quantidade'];

    $sql = 'INSERT INTO prefguara_materiaisPorObras(codMaterial, Material, Obra, Quantidade) VALUES(NULL, "'.$material.'", "'.$obra.'", "'.$quantidade.'")';

    $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

    $insercaoBanco = mysqli_query($conexaoBanco, $sql);

    if($insercaoBanco){
        print '<table class="table tableMateriais">';
            Material::carregaMateriais($obra);
        print '</table>';
    }

    mysqli_close($conexaoBanco);