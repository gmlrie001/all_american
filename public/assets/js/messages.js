$(document).ready(function(){
    $(".message-board h4").click(function(){
        if($(this).hasClass('active')){
            $(".message-board h4").removeClass('active');
            $(".message-board .message").slideUp(500);
        }else{
            $(".message-board h4").removeClass('active');
            $(".message-board .message").slideUp(500);

            $(this).addClass('active');
            $(this).closest('.message-board > div').find('.message').slideDown(500);
        }
    });
});