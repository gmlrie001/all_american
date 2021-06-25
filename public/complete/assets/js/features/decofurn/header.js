$(document).ready(function(){
    $(".search-open").click(function(e){
        e.preventDefault();
        $(".search-form-mobile").toggleClass("active");
        if($(".search-form-mobile").hasClass('active')){
            $(".search-form-mobile input[name='search']").focus();
        }
    });

    $('.sticky-header').stickMe({
        stickyAlready: false, 
        topOffset: 200, 
        transitionStyle: 'slide'
    });

    $(".cart-open.active").click(function(e){
        e.preventDefault();
        $(".cart-dropdown").slideToggle(500);
    }).mouseenter(function(){
        setTimeoutConst = setTimeout(function(){
            $(".cart-dropdown").slideToggle(500);
        }, 300);
    }).mouseleave(function(){
        clearTimeout(setTimeoutConst );
        if(!$(".cart-dropdown").is(":hover")){
            $(".cart-dropdown").slideToggle(500);
        }
    });
    
    $(".cart-dropdown").mouseleave(function(e){
        e.preventDefault();
        if(!$(".cart-dropdown").is(":hover")){
            $(".cart-dropdown").slideUp(500);
        }
    });
});