$(document).ready(function(){
    $(".christmas-delivery").click(function(e){
        e.preventDefault();
        $(".delivery-modal").fadeIn(500);
        $(".delivery-overlay").fadeIn(500);
    });
    
    $(".close-delivery-modal, .delivery-overlay").click(function(){
        $(".delivery-modal").fadeOut(500);
        $(".delivery-overlay").fadeOut(500);
    });
});