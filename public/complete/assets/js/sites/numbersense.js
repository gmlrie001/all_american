$(document).ready(function(){
  $(".navbar-toggler").click(function (e) {
    e.preventDefault();
    $('#navbarSide').addClass('reveal');
    $('.navi-overlay').show();
  });
  $(".nav-close").click(function () {
    $('#navbarSide').removeClass('reveal');
    $('.navi-overlay').hide();
  });
  $(".navi-overlay").click(function () {
    $('#navbarSide').removeClass('reveal');
    $('.navi-overlay').hide();
  });
  // Display SHARE on docready
  //$(".share-button").click(function(){
    $(".share-modal").show();//fadeIn(500);
    $(".share-overlay").show();//.fadeIn(500);
  //});
  $(".share-close").click(function(){
    $(".share-modal").hide();//.fadeOut(500);
    $(".share-overlay").hide();//.fadeOut(500);
  });
  $(".share-overlay").click(function(){
    $(".share-modal").hide();//.fadeOut(500);
    $(".share-overlay").hide();//.fadeOut(500);
  });
  $(".search-toggler").click(function(){
    //$(".search-m").toggle();
    $(".search-m").addClass('reveal');//.toggle();
    $(".search-toggler").addClass('srch-expanded')
  });
  /*
  $(".search-toggler").click(function(){
    //$(".search-m").toggle();
    $(".search-m").removeClass('reveal');
  });
  */
  /*
  // DISPLAY and/or HIDE Mobile Search
  $(".search-toggler").click(function(){
      $(".search-m").addClass('reveal');//toggle('reveal');
  });
  */
//  $(function() {
//   $('.attendee select').selectric();
// });

  $(".blog-sidebar h2").click(function(){
    $(".blog-sidebar h2").not($(this)).removeClass('active');
    $(this).addClass('active');
    $(".blog-sidebar h2").not($(this)).find("> ul").slideUp();
    $(this).find("> ul").slideDown();
  });

  $(".prod-form .prod-tabs .tab-links a").click(function(e){
    e.preventDefault();
    $(".prod-form .prod-tabs .tab-links a").removeClass("active");
    $(this).addClass('active');
    $(".tab-content div").removeClass("active");
    $($(this).attr('href')).addClass('active');
  });

  $(".overview-tabs a").click(function(e){
    e.preventDefault();
    $(".overview-tabs a").removeClass("active");
    $(this).addClass('active');
    $(".over-tab").removeClass("active");
    $($(this).attr('href')).addClass('active');
    if($(window).width() > 767) {
      addLoadMore();
    }
    $(".about-text.readmore-text .readmore-text-load").on('click', function(){
      if($(this).hasClass('readless-text-load')){
        $(this).parent().animate({
          height: $(this).parent().siblings("div").children('img').height()
        }, 500);
      }else{
        $(this).parent().animate({
          height: $(this).parent().get(0).scrollHeight
        }, 500, function(){
          $(this).height('auto');
        });
      }
  
      var text = $(this).text();
      $(this).text(
          text == "+" ? "-" : "+");
  
          $(this).toggleClass('readless-text-load');
    });
  });

  $(".note-tabs a").click(function(e){
    e.preventDefault();
    $(".note-tabs a").removeClass("active");
    $(this).addClass('active');
    $(".note-tab").removeClass("active");
    $($(this).attr('href')).addClass('active');
    if($(window).width() > 767) {
      addLoadMore();
    }
    $(".about-text.readmore-text .readmore-text-load").on('click', function(){
      if($(this).hasClass('readless-text-load')){
        $(this).parent().animate({
          height: $(this).parent().siblings("div").children('img').height()
        }, 500);
      }else{
        $(this).parent().animate({
          height: $(this).parent().get(0).scrollHeight
        }, 500, function(){
          $(this).height('auto');
        });
      }
  
      var text = $(this).text();
      $(this).text(
          text == "+" ? "-" : "+");
  
          $(this).toggleClass('readless-text-load');
    });
  });

  $('.main-slider').slick({
    slidesToShow: 1,
    accessibility: false, 
    autoplay: true, 
    pauseOnFocus: false, 
    pauseOnHover: false, 
    slidesToScroll: 1,
    arrows: false,
    asNavFor: '.nav-slider'
  });
  $('.nav-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.main-slider',
    accessibility: false, 
    autoplay: true, 
    pauseOnFocus: false, 
    pauseOnHover: false, 
    arrows: false,
    dots: false,
    focusOnSelect: true
  });
  
  $('.popup-gallery').magnificPopup({ 
    type: 'image', 
    gallery:{
        enabled:true
    }
});

$(".search-icn > button > i.fa.fa-search").click(function(){
  if($(window).width() < 768) {
    $(".dont-show").slideToggle(500);
  }
});

$(".workbook-block").click(function(){
  var target = $(this).data('target');
  if($(this).hasClass('active')){
    $(".workbook-block").removeClass('active');
    $(".workbook-block-books").slideUp(500);
  }else{
    $(".workbook-block").removeClass('active');
    $(this).addClass('active');
    $(".workbook-block-books").slideUp(500);
    $(target).slideDown(500);
  }
});

  function addLoadMore(){
      $(".about-text:not(.dont-expand)").each(function(){
            var imgHeight = $(this).siblings("div").children('img').height();
            if(typeof imgHeight != 'undefined'){
              var myHeight = $(this).outerHeight();
              if(myHeight > imgHeight){
                $(this).css('height', imgHeight);
                $(this).addClass('readmore-text');
                $(this).append('<i class="readmore-text-load">+</i>');
              }else{
                $(this).removeAttr('style');
                $(this).removeClass('readmore-text');
                $(this).find('.readmore-text-load').remove();
              }
            }
        });
  }

  $(window).on("resize", function (e) {
    if($(window).width() > 767) {
      addLoadMore();
    }
    $(".about-text.readmore-text .readmore-text-load").on('click', function(){
      if($(this).hasClass('readless-text-load')){
        $(this).parent().animate({
          height: $(this).parent().siblings("div").children('img').height()
        }, 500);
      }else{
        $(this).parent().animate({
          height: $(this).parent().get(0).scrollHeight
        }, 500, function(){
          $(this).height('auto');
        });
      }
  
      var text = $(this).text();
      $(this).text(
          text == "+" ? "-" : "+");
  
          $(this).toggleClass('readless-text-load');
    });
  });
  $(window).on("load", function (e) {
    if($(window).width() > 767) {
      addLoadMore();
    }
    $(".about-text.readmore-text .readmore-text-load").on('click', function(){
      if($(this).hasClass('readless-text-load')){
        $(this).parent().animate({
          height: $(this).parent().siblings("div").children('img').height()
        }, 500);
      }else{
        $(this).parent().animate({
          height: $(this).parent().get(0).scrollHeight
        }, 500, function(){
          $(this).height('auto');
        });
      }
  
      var text = $(this).text();
      $(this).text(
          text == "+" ? "-" : "+");
  
          $(this).toggleClass('readless-text-load');
    });

 
  });

  $(".changes-required").change(function(){
    var value = $(this).val();

    if(value == 'teacher' || value == 'school' || value == 'organisation' || value == 'other'){
      $(".can-be-required").find("label").text("Institution name*");
      $(".can-be-required").find("input").attr("required", 'true');
    }else{
      $(".can-be-required").find("label").text("Institution name");
      $(".can-be-required").find("input").removeAttr("required");
    }
  });

  $(".grade-change").change(function(){
    if($(this).val() == 'other'){
      $(this).parent().find(".grade-hide").show();
    }else{
      $(this).parent().find(".grade-hide").hide();
    }
    if($(this).find(':selected').data("assoc") == 1){
      $(this).parent().find('.lang-select option[data-assoc="1"]').show();
    }else{
      $(this).parent().find('.lang-select option[data-assoc="1"]').hide();
    }
  });

  $(".diet-change").change(function(){
    if($(this).val() == 'other'){
      $(this).parent().find(".diet-hide").show();
    }else{
      $(this).parent().find(".diet-hide").hide();
    }
  });

  $(".dup-attendee").change(function(){
    var value = $(this).val();

    if($.isNumeric(value)){
      for(i = $(".attendee").length; i < value; i++){
        $(".attendee:last")
        .eq(0)
        .clone()
        .find("h4").text("ATTENDEE "+parseInt($(".attendee").length+1)).end()
        .find("input").val("").end() // ***
        .find("select").val("").end() // ***
        .show()
        .insertAfter(".attendee:last");
      }
    }
  });
});