$(document).ready(function(){
    $(".selling-slider").slick({
        accessibility: false, 
        autoplay: true, 
        arrows: false, 
        pauseOnFocus: false, 
        pauseOnHover: false, 
        slidesToShow: 4, 
        swipeToSlide: true, 
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
            }
        },{
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
});