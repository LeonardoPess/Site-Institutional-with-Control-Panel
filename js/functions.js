//Aqui vai todo nosso código de javascript.
$(()=>{

    $('.mobile__menu').click(()=>{

    var menu = $('nav.mobile ul');
    
    if(menu.is(':hidden') == true){
       var icone = $('.mobile__menu svg');
        icone.removeClass('fa-bars');
        icone.addClass('fa-times');
        menu.slideToggle();
    }else{
        var icone = $('.mobile__menu svg');
        icone.removeClass('fa-times');
        icone.addClass('fa-bars');
        menu.slideToggle();
    }

    });

    if($('target').length > 0){
        //O elemento existe, portanto precisamos dar o scroll em algum elemento.
        var elemento = '#'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html,body').animate({'scrollTop':divScroll}, 2000);
    }

    carregarDinamico()
    function carregarDinamico(){
        $('[realtime]').click(function(){
            var pagina = $(this).attr('realtime');
            $('.container__principal').hide();
            $('.container__principal').load(include_path+'pages/'+pagina+'.php');

            setTimeout(function(){
                initialize();
                addMarker(-27.609959,-48.576585,'',"Minha casa",undefined,false);
            },1000);

            $('.container__principal').fadeIn(1000);
            window.history.pushState('', '', pagina);

            return false;
        })
    }
})
