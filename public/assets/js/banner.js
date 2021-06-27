$(document).ready(function(){

    $(".page-slider").slick({
        autoplaySpeed: 6000,
        accessibility: false, 
        autoplay: true, 
        arrows: false, 
        pauseOnFocus: false, 
        pauseOnHover: false, 
        swipeToSlide: true,
        rows: 0,
    });

    $(".page-slider-mobile").slick({
        autoplaySpeed: 6000,
        accessibility: false, 
        autoplay: true, 
        arrows: false, 
        pauseOnFocus: false, 
        pauseOnHover: false, 
        swipeToSlide: true, 
        rows: 0,
    });
});