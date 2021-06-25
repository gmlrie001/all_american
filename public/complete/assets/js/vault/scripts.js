$(document).ready(function(){

    $("body").hammer().bind("panleft", function(){
        $(".side-nav").removeClass('active');
    });
    $("body").hammer().bind("panright", function(){
        $(".side-nav").addClass('active');
    });

    $(".mobile-tab-container > div").click(function(){
        $(this).children("div").slideToggle(500);
    });

    $(".header-content > div a.hamburger").click(function(){
        if($(".side-nav").hasClass('active')) {
            $(".side-nav").removeClass('active');
        }else{
            $(".side-nav").addClass('active');
        }
    });

    (function($){
        $(window).on("load",function(){
            $(".nav-list").mCustomScrollbar();
        });
    })(jQuery);
    
    $(".link-dropdown.active").css("height", $(".link-dropdown.active").children("li").length*40);

    $(".main-link:not(.dashboard-link)").click(function(e){
        e.preventDefault();
        
        if($('#'+$(this).find("a").attr("href")).height() < 1){
            $(".link-dropdown").removeClass('active');
            $(".link-dropdown").css("height", 0);
            
            var innerHeight = $('#'+$(this).find("a").attr("href")+" li").length;
            
    
            $('#'+$(this).find("a").attr("href")).css("height", innerHeight*40);
    
            $(".main-link").find(".drop-logo").removeClass('fa-chevron-down');
            $(".main-link").find(".drop-logo").addClass('fa-chevron-right');
    
            
            $(this).find(".drop-logo").removeClass('fa-chevron-right');
            $(this).find(".drop-logo").addClass('fa-chevron-down');
        }else{
            $(".link-dropdown").removeClass('active');
            $(".link-dropdown").css("height", 0);

            $(".main-link").find(".drop-logo").removeClass('fa-chevron-down');
            $(".main-link").find(".drop-logo").addClass('fa-chevron-right');
        }
    });

    $('.dash-slider').slick({
        autoplay: true, 
        autoplaySpeed: 5000, 
        dots: false, 
        arrows: false, 
        accessibility: false, 
        speed: 750, 
        swipeToSlide: true
    });

    function convertToURL(title){
        return title.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
    }

    $('.title').blur(function(){
        $('.url-title').val(convertToURL($('.title').val()));
    });
    
    $(".font-awesome-picker").iconpicker();
    
    $('.tooltipster').tooltipster({
        delay: 1000,
        functionInit: function(instance, helper){

            var $origin = $(helper.origin),
                dataOptions = $origin.attr('data-tooltipster');

            if(dataOptions){
                
                dataOptions = JSON.parse(dataOptions);

                $.each(dataOptions, function(name, option){
                    instance.option(name, option);
                });
            }
        }
    });
    
    $( "body" ).scroll(function() {
        $('.tool-container.tool-top, .tool-container.tool-bottom').css('display', 'none');
    });

    $('.header').stickMe({
        stickyAlready: true
    });

    if($(window).width() < 768){
        $('.mobile-tab-container').stickMe({
            stickyAlready: false, 
            topOffset: 100
        });
        $('.mobile-tab-container').on('top-reached', function() { 
            $('.header').stickMe({
                stickyAlready: true
            });
        });
    }
    
    $(window).resize(function(){
        $('.header').stickMe({
            stickyAlready: true
        });
        if($(window).width() < 768){
            $('.mobile-tab-container').stickMe({
                stickyAlready: false, 
                topOffset: 100
            });
            $('.mobile-tab-container').on('top-reached', function() { 
                $('.header').stickMe({
                    stickyAlready: true
                });
            });
        }
    });
});