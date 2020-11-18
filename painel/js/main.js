$(function(){
    
    var open = true;
    var windowSize = $(window)[0].innerWidth;
    var targetSizeMenu = (windowSize <=  400) ? 200 : 250;

    if(windowSize <= 768){
        $('.menu').css('width','0').css('padding','0');
        open = false;
    }

    $('.menu__btn').click(function(){
        if(open){
            //The menu is open, it is necessary to adapt the content of the panel
            $('aside').animate({'width':'0','padding':'0'},function(){
                open = false;
            });
            $('header,.content').animate({'left':'0','width':'100%'},function(){
                open = false;
            });
        }else{
            //The menu is closed, it is necessary to adapt the content of the panel
            $('aside').animate({'width':targetSizeMenu+'px','padding':'10px 0'},function(){
                open = true;
            });
            if(windowSize >=  768)
            $('header,.content').css('width','calc(100% - 250px)');
            $('header,.content').animate({'left':targetSizeMenu+'px'},function(){
                open = true;
            });
        }
    })

    $(window).resize(function(){
		windowSize = $(window)[0].innerWidth;
		targetSizeMenu = (windowSize <= 400) ? 200 : 250;
		if(windowSize <= 768){
			$('aside').css('width','0').css('padding','0');
			$('.content,header').css('width','100%').css('left','0');
			open = false;
		}else{
			$('aside').animate({'width':targetSizeMenu+'px','padding':'10px 0'},function(){
				open = true;
			});

			$('.content,header').css('width','calc(100% - 250px)');
			$('.content,header').animate({'left':targetSizeMenu+'px'},function(){
			open = true;
			});
		}

	})

    $('[formato=data]').mask('99/99/9999');

    $('[actionBtn=delete]').click(function(){
        var txt;
        var r = confirm("Deseja excluir o registro?");
        if(r == true)
            return true;
        else
            return false;

    })

})