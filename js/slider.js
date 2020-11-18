$(()=>{

    var curSlide = 0;
    var maxSlide = $('.banner__single').length - 1;
    var delay = 3;

    initSlider();
    changeSlide();

    function initSlider(){
        $('.banner__single').hide();
        $('.banner__single').eq(0).show();
        for(var i = 0; i < maxSlide+1; i++){
            var content = $('.bullets').html();
            if(i == 0)
                content+='<span class="active__slider"></span>';
            else
                content+='<span></span>';
            $('.bullets').html(content);
        }
    }

    function changeSlide(){
        setInterval(()=>{
            $('.banner__single').eq(curSlide).stop().fadeOut(2000);
            curSlide++;
            if(curSlide > maxSlide)
                curSlide = 0;
            $('.banner__single').eq(curSlide).stop().fadeIn(2000);
            //Trocar bullets da navegação do slider!
            $('.bullets span').removeClass('active__slider');
            $('.bullets span').eq(curSlide).addClass('active__slider');
        },delay * 1000);

    }

    $('body').on('click','.bullets span',function(){
        var currentBullet = $(this);
        $('.banner__single').eq(curSlide).stop().fadeOut(2000);
        curSlide = currentBullet.index();
        $('.banner__single').eq(curSlide).stop().fadeIn(2000);
        $('.bullets span').removeClass('active__slider');
        currentBullet.addClass('active__slider');
    });

})