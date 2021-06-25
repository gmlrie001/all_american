$(document).ready(function(){
    $('.map-popup').magnificPopup({type:'image'});

    $(".direction-selector-label").click(function(e){
        e.preventDefault();
        $(".direction-region-drop-down").slideToggle();
    });

    $(".direction-region-drop-down a").click(function(e){
        e.preventDefault();
        var region = $(this).attr("href");
        // $(".store-slider").slick('unslick');
        if(region == "#"){
            $(".direction-region-container").fadeIn(500);
        }else{
            $(".direction-region-container").hide();
            $(".direction-region-container[data-regionid='"+region+"']").fadeIn(500);
        }

        $(".direction-selector-label").text($(this).text());

        
    });


    $('html').click(function(e) {                    
        if(!$(e.target).hasClass('direction-selector-label') )
        {
            $('.direction-region-drop-down').slideUp();                
        }
     }); 

});