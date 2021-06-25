$(document).ready(function(){
    $(".open-search").click(function(e){
        e.preventDefault();
        $(".search-form").addClass("active");
    });
    $(".close-search").click(function(e){
        e.preventDefault();
        $(".search-form").removeClass("active");
    });

    if($(window).width() > 1199){
        $(".mego-open").mouseenter(function(e){
            e.preventDefault();
            setTimeoutConst = setTimeout(function(){
                $(".mega-menu").slideDown(500);
            }, 300);
        }).mouseleave(function(e){
            clearTimeout(setTimeoutConst );
            e.preventDefault();
            if(!$(".mega-menu").is(":hover")){
                $(".mega-menu").slideUp(500);
            }
        });

        $(".mega-menu").mouseleave(function(e){
            e.preventDefault();
            if(!$(".mega-menu").is(":hover")){
                $(".mega-menu").slideUp(500);
            }
        });
    }else{
        $(".mego-open").click(function(e){
            e.preventDefault();
            $(".mega-menu").slideToggle(500);
        });
    }

    $(".nav-open").click(function(e){
        e.preventDefault();
        $(".mobile-nav-overlay").fadeIn(500);
        $(".mobile-nav").addClass('active');
    });
    $(".mobile-nav-overlay, .mobile-nav h3 span").click(function(){
        $(".mobile-nav-overlay").fadeOut(500);
        $(".mobile-nav").removeClass('active');
    });

    $(".open-level-sub").click(function(e){
        e.preventDefault();
        var ref = $(this).data("id");

        // $("level").removeClass("active");
        $(ref).addClass("active");
    });

    $(".close-level").click(function(e){
        e.preventDefault();

        $(this).parent('.level').removeClass("active");
    });
});