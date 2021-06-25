$(document).ready(function(){
    $(".share-open").click(function(e){
        e.preventDefault();
        $(".share-modal").fadeIn(500);
        $(".share-overlay").fadeIn(500);
    });
    
    $(".close-share, .share-overlay").click(function(){
        $(".share-modal").fadeOut(500);
        $(".share-overlay").fadeOut(500);
    });

    $(".open-deco-credit-modal").click(function(e){
        e.preventDefault();
        $(".credit-modal").fadeIn(500);
        $(".credit-overlay").fadeIn(500);
    });
    
    $(".close-credit, .credit-overlay").click(function(){
        $(".credit-modal").fadeOut(500);
        $(".credit-overlay").fadeOut(500);
    });
});