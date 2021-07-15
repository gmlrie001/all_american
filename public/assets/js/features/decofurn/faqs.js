$(document).ready(function(){
    $(".faq h3").click(function(){
        if($(this).parent().hasClass('active')){
            $(".faq").removeClass("active");
            $(".faq div").slideUp(250);
        }else{
            $(".faq").removeClass("active");
            $(this).parent().addClass("active");
            $(".faq div").slideUp(250);
            $(this).parent().find("div").slideDown(250);
        }
    });

    $(".faq-cat a").click(function(e){
        e.preventDefault();

        $(".faq-cat a").removeClass('active');
        $(this).addClass('active');

        $(".faq").removeClass("active");
        $(".faq div").slideUp(500);

        $(".faq-title").text($(this).text());
        $(".faq-cat-title span").text($(this).text());

        var cat = $(this).attr('href');

        if(cat == "#"){
            $(".faq").fadeIn(500);
        }else{
            $(".faq").hide();
            $(".faq[data-category='"+cat+"']").fadeIn(500);
        }
    });

    $(".faq-cat-title span").click(function(){
        $(".faq-cat").slideToggle(500);
    });
    
    $('html').click(function(e) {                  
        if($(window).width() < 992) {
            if(!$(e.target).hasClass('faq-dont-close')){
                $('.faq-cat').slideUp();                
            }
        }
     }); 
});