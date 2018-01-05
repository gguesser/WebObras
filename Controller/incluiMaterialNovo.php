<?php

    $material = $_GET['material'];
    $unidadeMedida = $_GET['unidadeMedida'];

    $sql = "INSERT INTO prefguara_cadastroMateriais(codMat, NomeMat, UnidadeMedidaMat) VALUES (NULL, '".$material."', '".$unidadeMedida."')";

    $conexaoBanco = mysqli_connect('localhost', 'root', '', 'prefguara_mainBase', '8080');

    $insercapBanco = mysqli_query($conexaoBanco, $sql);

    mysqli_close($conexaoBanco);

    if($insercapBanco){

        print '<select id="cbbMaterialId" name="cbbMaterial" class="form-contro componente_linha_3">';
            include('.././Controller/CcadastroObrasClass.php');
            $instanciaCarregaMaterial = new CcadastroObrasClass();
            $instanciaCarregaMaterial -> selecionaMateriaisExistentes();
        print '</select>';
    }