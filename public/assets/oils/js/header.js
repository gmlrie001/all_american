$(document).ready(function(){  

  $(".notifyClose").click(function(e){
    e.preventDefault();

    $(".notifyBG").hide("slide", { direction: "up" }, 700);
  });

  $("a.filterBtn").click(function(e){
      e.preventDefault();

      $(".filterMobileopen").show("slide", { direction: "right" }, 500);
  });
  $(".filterMobileopen .menuClose").click(function(e){
      e.preventDefault();

      $(".filterMobileopen").hide("slide", { direction: "right" }, 500);
  });  
  
    $(".menu").click(function(e){
        e.preventDefault();
        $(".mobileOpen").show("slide", { direction: "right" }, 500);
    });
    $(".menuClose").click(function(e){
        e.preventDefault();
        $(".mobileOpen").hide("slide", { direction: "right" }, 500);
    });  
    $(".subMenuClose").click(function(e){
        e.preventDefault();
        $(".mobileSubnav.active").hide("slide", { direction: "left" }, 500);
    });  
     
    $(".cartBtn").click(function(e){
        e.preventDefault();
        $(".cartDropdown").slideToggle(1000);
    });
    
    $(".hasDrop").click(function(e){
      e.preventDefault();
      $('.mobileSubnav').addClass('active');
    });

    $(".dropBack").click(function(e){
      e.preventDefault();
      $('.subDropdown').removeClass('active');
      $('.mobileSubnav').removeClass('active');
    });

/*
    $(".mobileWrap .searchOpen").click(function(){
      $(".mobileWrap .headerSearch").slideToggle(500);
    });
*/  
    $(".mobileWrap .searchOpen").click(function(){
      $(".mobileHeaderSearch").slideToggle(500);
    });

    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
      
        if (!isNaN(currentVal)) {
          parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
          parent.find('input[name=' + fieldName + ']').val(0);
        }
      }
      
      function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
      
        if (!isNaN(currentVal) && currentVal > 0) {
          parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
          parent.find('input[name=' + fieldName + ']').val(0);
        }
      }
      
      $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
      });
      
      $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
      });
      

});

