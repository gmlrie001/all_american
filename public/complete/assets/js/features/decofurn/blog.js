$(document).ready(function(){
    $(".blog-slider").slick({
        accessibility: false, 
        arrows: false, 
        pauseOnFocus: false, 
        pauseOnHover: false, 
        centerMode: false,
        pauseOnDotsHover: false, 
        focusOnSelect: false, 
        slidesToShow: 1, 
        swipeToSlide: true, 
        asNavFor: ".blog-slider-nav", 
        responsive: [{
            breakpoint: 992,
            settings: {
                dots: true,
            }
        }]
    });

    $(".blog-slider-nav").slick({
        accessibility: false, 
        arrows: false, 
        pauseOnFocus: false, 
        pauseOnHover: false, 
        pauseOnDotsHover: false, 
        slidesToShow: 3, 
        focusOnSelect: true, 
        swipeToSlide: true, 
        centerMode: false,
        asNavFor: ".blog-slider"
    });
});