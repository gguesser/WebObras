<?php

    include('.././ClassesPHP/Material.php');

    use Material\Material;

    $material = $_GET['material'];
    $unidadeMedida = $_GET['unidadeMedida'];

    $sql = "INSERT INTO prefguara_cadastroMateriais(codMat, NomeMat, UnidadeMedidaMat) VALUES (NULL, '".$material."', '".$unidadeMedida."')";

    $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

    $insercaoBanco = mysqli_query($conexaoBanco, $sql);

    mysqli_close($conexaoBanco);

    if($insercaoBanco){

        print '<select id="cbbMaterialId" name="cbbMaterial" class="form-contro componente_linha_3">';
            Material::selecionaMateriaisExistentes();
        print '</select>';
    }