<?php

    include('.././ClassesPHP/Header.php');

    use Header\Header;

    Header::headerPrincipal('Cadastro de Obras');

    /**Variáveis que compoem o relatório*/

    $morador        = NULL;//$_GET['nome'];
    $emailMorador   = NULL;//$_GET['email'];
    $dataRegistro   = NULL;//$_GET['registro'];
    $protocolo      = NULL;//$_GET['protocolo'];
    $bairro         = NULL;//$_GET['bairro'];
    $rua            = NULL;//$_GET['rua'];
    $fiscal         = NULL;//$_GET['fiscal'];
    $dataPrevisao   = NULL;//$_GET['previsao'];
    $status         = NULL;//$_GET['status'];
    $problema       = NULL;//$_GET['problema'];

    $html ='<html>'.

        $resultado

          .'<body>
              <div class="container">
                <div class="row">
                    <div class="col-md-12 cabecalhoReport">
                        <div class="col-md-3">
                            <img class="imgReport align-left" src=".././Imagens/atende.php.png">
                        </div>
                        <div class="col-md-9 align-left">
                            <h1 id="titulo">SECRETARIA DE INFRAESTRUTURA</h1>    
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 corpoReport">
                        <fieldset>
                            <legend>MORADOR</legend>
                            <div class="col-md-6">
                                <label for="" class="componente_linha_3">Nome:</label>
                                '.$morador.'
                                <label for="" class="componente_linha_3">E-mail:</label>
                                '.$emailMorador.'
                            </div>
                            <div class="col-md-6">
                                <label for="" class="componente_linha_3">Registro:</label>
                                '.$dataRegistro.'
                                <label for="" class="componente_linha_3">Protocolo:</label>
                                '.$protocolo.'
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>LOCALIDADE</legend>
                            <div class="col-md-6">
                                <label for="" class="componente_linha_3">Bairro:</label>
                                '.$bairro.'
                                <label for="" class="componente_linha_3">Rua:</label>
                                '.$rua.'
                                <label for="" class="componente_linha_3">Fiscal:</label>
                                '.$fiscal.'
                            </div>
                            <div class="col-md-6">
                                <label for="" class="componente_linha_3">Previsão:</label>
                                '.$dataPrevisao.'
                                <label for="" class="componente_linha_3">Status:</label>
                                '.$status.'
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>PROBLEMA</legend>
                            <div class="col-md-12">
                                '.$problema.'
                            </div>
                        </fieldset>
                        
                        <fieldset>
                            <div class="col-md-6">
                                <label for="">Secretário</label>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <label for="">Fiscal</label>
                                <hr>
                            </div>
                        </fieldset>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 rodapeReport" class="componente_linha_3">
                        <h4>Secretaria de Ifraestrutura</h4> 
                    </div>
                </div>                 
              </div>
         </body>
         </html>
    
    ';

//require_once __DIR__ . '.././vendor/autoload.php';

include(".././Componentes/MPDF57/mpdf.php");

$mpdf=new mPDF();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents(".././Estilo/relatorios.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();