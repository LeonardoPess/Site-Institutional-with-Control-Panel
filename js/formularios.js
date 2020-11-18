$(function(){

    $('body').on('submit','form.ajax-form',function(){
        var form = $(this);
        $.ajax({
            beforeSend:function(){
                $('.overlay__loading').fadeIn();
            },
            url:include_path+'ajax/formularios.php',
            method:'post',
            dataType:'json',
            data:form.serialize()
        }).done(function(data){
            if(data.sucesso){
                //Tudo certo!
                $('.overlay__loading').fadeOut();
                $('.sucesso').slideToggle();
                setTimeout(function(){
                    $('.sucesso').fadeOut();
                },3000)
            }else{
                //Algo deu errado.
                $('.overlay__loading').fadeOut();
                $('.erro').slideToggle();
                setTimeout(function(){
                    $('.erro').fadeOut();
                },3000)
            }
        });
        return false;
    })

})