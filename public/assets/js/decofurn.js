$(document).ready(function(){
    $("table").each(function(){
        $(this).addClass("table");
        $(this).wrap('<div class="table-responsive"></div>');
    });

    $(".product-tab").click(function(e){
        if($(this).data('open') != null){
            e.preventDefault();
            if(!$(this).hasClass('active')){
                $(".tab-block").slideUp(500);
            
                $($(this).data('open')).slideDown(500);
                $(".product-tab").removeClass('active');
                $(this).addClass('active');

                $(".product-tab").find('i').removeClass("fa-minus");
                $(".product-tab").find('i').addClass("fa-plus");
                $(this).find('i').addClass("fa-minus");
                $(this).find('i').removeClass("fa-plus");
            }else{

                $(".product-tab").find('i').removeClass("fa-minus");
                $(".product-tab").find('i').addClass("fa-plus");
                $(".product-tab").removeClass('active');
                $(".tab-block").slideUp(500);
            }
        }
    });

    $('map').imageMapResize();
    
    $('.popup-gallery').magnificPopup({ 
        type: 'image', 
        gallery:{
            enabled:true
        }
    });

    $(".sort-block select").change(function(){
        var link = $(this).val();
  
        if(link != ""){
          window.location.replace(link);
        }
    });

    $(".filter-title a").click(function(e){
        e.preventDefault();
        $(".filter-block").fadeOut(500);
    });

    $(".filter-open").click(function(e){
        e.preventDefault();
        $(".filter-block").fadeIn(500);
    });
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

      $(".confirm-delete").click(function(e){
        e.preventDefault();
        var target = $(this).attr("href");

        $(".confirm-button").attr('href', target);

        $('.confirm-modal').fadeIn(300);
        $('.confirm-overlay').fadeIn(300);
      });

      $(".deny-button").click(function(e){
        e.preventDefault();
        $('.confirm-modal').fadeOut(300);
        $('.confirm-overlay').fadeOut(300);
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
     if ('serviceWorker' in navigator && 'PushManager' in window){
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('../../service-worker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
      }else{
        console.log("not loading");
      }

      $('form').parsley();

});