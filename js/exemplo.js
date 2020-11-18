$(function(){

    var atual = -1;
    var maximo = $('.especialidades__box').length -1;
    var timer;
    var animacaoDelay = 3;

    executarAnimação()
    function executarAnimação(){
        $('.especialidades__box').hide();
        timer = setInterval(logicaAnimacao,animacaoDelay*1000);

        function logicaAnimacao(){
            atual++;
            if(atual > maximo){
                clearInterval(timer);
                return false;
            }

            $('.especialidades__box').eq(atual).fadeIn();
        }

    }

})