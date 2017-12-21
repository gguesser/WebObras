<?php
/**
 * Created by PhpStorm.
 * User: gguesser
 * Date: 17/12/17
 * Time: 21:07
 */

$conexaoBanco = mysql_connect('localhost', 'root', '');

$selecionaBase = mysql_select_db('prefguara_mainBase', $conexaoBanco);

echo $selecionaBase;
