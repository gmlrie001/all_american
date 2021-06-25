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
});