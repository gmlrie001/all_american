$(document).ready(function () {

/* $('.productViewWrap .image .main').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.nav-slider'
  });

  $('.productViewWrap .thumbNail').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    centerMode: true,
    centerPadding: '30px',
    focusOnSelect: true,
    asNavFor: '.productViewWrap .image .main'
  });*/


    $('.main-slider').slick({
        slidesToShow: 1,
        accessibility: false,
        autoplay: true,
        pauseOnFocus: false,
        pauseOnHover: true,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.nav-slider'
    });

    $('.nav-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: false,
        asNavFor: '.main-slider',
        accessibility: false,
        autoplay: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        arrows: false,
        dots: false,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
            }
        }]
    });

    $('.nav-slider .slick-slide').removeClass('filterMe');
    $('.nav-slider .slick-slide').each(function(){
        if($(this).find('img[data-base="default"]').length){
            $(this).addClass('filterMe');
        }
    });

    if($('.nav-slider .slick-slide img[data-base="default"]').length){
        $('.nav-slider').slick('slickFilter', '.filterMe');
    }

    $('.main-slider .slick-slide').removeClass('filterMe');
    $('.main-slider .slick-slide').each(function(){
        if($(this).find('.findFilter[data-base="default"]').length){
            $(this).addClass('filterMe');
        }
    });

    if($('.main-slider .slick-slide .findFilter[data-base="default"]').length){
        $('.main-slider').slick('slickFilter', '.filterMe');
    }
    $('.main-slider').on('mouseenter', function(){
        $('.nav-slider').slick('slickPause');
    });
    $('.main-slider').on('mouseleave', function(){
        $('.nav-slider').slick('slickPlay');
    });

});