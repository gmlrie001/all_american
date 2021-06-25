$(document).ready(function(){
  
  $(".mobile-nav-toggle").click(function (e) {
    e.preventDefault();
    $(".mobile-open-nav").fadeIn(500);
    $(".nav-overlay").fadeIn(500);
  });

  $(".nav-close").click(function () {
    $(".mobile-open-nav").fadeOut(500);
    $(".nav-overlay").fadeOut(500);
  });    

  
  $('.gallery').magnificPopup({ 
    type: 'image', 
    gallery:{
        enabled:true
    }
});

});
