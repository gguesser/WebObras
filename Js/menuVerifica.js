$(document).ready(function(){
    var tam = $(window).width();

    if (tam >=1024){
        $(".menuNormal").show();
    }else{
        $(".menuPequeno").show();
        $(".cabecalho").hide();
    }
});