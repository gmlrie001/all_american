$(document).ready(function(){
    $('.store-slider').on('click', '.store-block', function(e){
        e.preventDefault();
        var id = $(this).attr('href');
        $(".store-block").removeClass("active");
        $(this).addClass('active');

        $(".store-info").slideUp(500);
        $(id).slideDown(500);
    });

    $(".selector-label").click(function(e){
        e.preventDefault();
        $(".region-drop-down").slideToggle();
    });

    $(".region-drop-down a").click(function(e){
        e.preventDefault();
        var region = $(this).attr("href");
        // $(".store-slider").slick('unslick');

        if($(window).width() > 991){
            if(region == "#"){
                $(".store-block").fadeIn(500);
            }else{
                $(".store-block").hide();
                $(".store-block[data-regionid='"+region+"']").fadeIn(500);
            }
            var firstItem = $(".store-block:not(:hidden):eq(0)");

            firstItem.click();
        }else{
            $('.store-slider').slick('slickUnfilter');
            $('.store-slider').slick('slickFilter', function() { 
                return $(".store-block[data-regionid='"+region+"']", this).length === 1; 
            });

            $(".store-slider .slick-active .store-block").click();
        }

        $(".selector-label").text($(this).text());

        
    });

    $('html').click(function(e) {                    
        if(!$(e.target).hasClass('selector-label') )
        {
            $('.region-drop-down').slideUp();                
        }
     }); 

     if($(window).width() < 992){
        $(".store-slider").slick({
            accessibility: false, 
            autoplay: false, 
            arrows: false, 
            pauseOnFocus: false, 
            pauseOnHover: false, 
            slidesToShow: 3, 
            swipeToSlide: true, 
            centerMode: true,
            responsive: [{
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },{
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }]
        });
        
        $(".inspiration-categories .row").slick({
            accessibility: false, 
            autoplay: false, 
            arrows: false, 
            pauseOnFocus: false, 
            pauseOnHover: false, 
            slidesToShow: 3, 
            swipeToSlide: true, 
            centerMode: true,
            responsive: [{
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },{
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }]
        });
     }
});