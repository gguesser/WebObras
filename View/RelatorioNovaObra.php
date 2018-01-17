<?php

    include('.././ClassesPHP/Header.class.php');
    $instanciaCabecalho = new Header();
    $resultado = $instanciaCabecalho -> headerPrincipal('Cadastro de obras');

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
                                Guilherme Guesser
                                <label for="" class="componente_linha_3">E-mail:</label>
                                gui.guesser@hotmaoil.com
                            </div>
                            <div class="col-md-6">
                                <label for="" class="componente_linha_3">Registro:</label>
                                25/04/2018
                                <label for="" class="componente_linha_3">Protocolo:</label>
                                112006067
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>LOCALIDADE</legend>
                            <div class="col-md-6">
                                <label for="" class="componente_linha_3">Bairro:</label>
                                Nova Esperança
                                <label for="" class="componente_linha_3">Rua:</label>
                                28 de Agosto
                                <label for="" class="componente_linha_3">Fiscal:</label>
                                Penguin
                            </div>
                            <div class="col-md-6">
                                <label for="" class="componente_linha_3">Previsão:</label>
                                25/04/2018
                                <label for="" class="componente_linha_3">Status:</label>
                                Aberta
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>PROBLEMA</legend>
                            <div class="col-md-12">
                                Esta é a maneira abreviada de você declarar todos os valores para as propriedades das bordas, ou seja, pode-se 
                                definir valores para as três propriedades das bordas (border-width, border-style e border-color) em uma declaração única
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

require_once '.././vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf -> setPaper('letter', 'landscape');

$dompdf -> render();
//
//$dompdf -> stream('teste.pdf');

$pdf = $dompdf->output();

file_put_contents("Contratopf.pdf", $pdf);