$(document).ready(function(){
    $(".close-promo").click(function(e){
        e.preventDefault();
        $(".promo-modal").fadeOut(500);
        $(".promo-overlay").fadeOut(500);
        Cookies.set('hide_promo', true, { expires: 30 });
    });
    $(".open-promo").click(function(e){
        e.preventDefault();
        $(".promo-modal").fadeIn(500);
        $(".promo-overlay").fadeIn(500);
    });
});