$(document).ready(function(){
    $("footer h3").click(function(){
        if($(window).width() < 992 && $(this).next("ul") != null && !$(this).hasClass("active")){
            $("footer h3").removeClass("active");
            $(this).addClass("active");

            $("footer ul").slideUp(500);
            $(this).next("ul").slideDown(500);
        }else if($(window).width() < 992 && $(this).next("ul") != null && $(this).hasClass("active")){
            $("footer h3").removeClass("active");
            $("footer ul").slideUp(500);
        }
    });
});