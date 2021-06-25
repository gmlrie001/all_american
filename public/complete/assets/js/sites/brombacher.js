_debug = true;

function update_element() {
    var nv, err;
    try {
        nv = document.querySelector( ".mobile-search-navi" );
        if ( document.body.scrollTop > 90 || document.documentElement.scrollTop > 90 ) {
            if ( ! nv.classList.contains( "drop-shadow" ) ) {
                nv.classList.add( "drop-shadow" );
            }
        } else {
            if ( nv.classList.contains( "drop-shadow" ) ) {
                nv.classList.remove( "drop-shadow" );
            }
        }
    } catch( err ) {
        /* Log Error/Warning/Exception */
        console.warn( "\r\n" + err +  "\r\n" );
    }
}

document.addEventListener( "DOMContentLoaded", () => {
    if ( _debug ) console.log( "\r\nDOM Content Load Complete.\r\n" );
/* Add drop shadow to sticky navigation after scroll exit header region */
    if ( document.body.scrollTop > 90 || document.documentElement.scrollTop > 90 ) {
	update_element();
    }
  /* Scroll Event Listener */
    window.onscroll = function() { update_element() };
} );

/**
 *
 * Truncate strings for LOOooongg titles and summary paragraphs
 * news
 */

function truncate( elm, mxs=45 ) {
    var elm, mxs, cur_str, s;
  
    if ( typeof elm !== 'object' ) return;
    cur_str = elm.innerHTML;
  /*
    console.log( elm );
    console.log( 'STRING: ' + cur_str + "\r\nLength: " + cur_str.length );
    console.log( 'MAX: ' + mxs + "\r\n" );
  */
    if ( cur_str.length > mxs ) {
      //console.log( 'SLICED: ' + cur_str.slice( 0, mxs ) + "\r\n" );
      s = cur_str.slice( 0, mxs ) + '...';
      elm.innerHTML = s;
    }
  }
  
  function truncate_sentence( elm, mxs=9 ) {
    var n, s, cur_snt, nsnt, elm, mxs;
  
    if ( typeof elm !== 'object' ) return;
    cur_snt = elm.innerHTML.split( ' ' );
  /*
    console.log( elm );
    console.log( 'STRING: ' + cur_snt + "\r\nLength: " + cur_snt.length );
    console.log( 'MAX: ' + mxs + "\r\n" );
  */
    if ( cur_snt.length > mxs ) {
      n = cur_snt.slice( 0, mxs );
      n.push( '...' );
      s = n.join( ' ' );
      elm.innerHTML = s;
    }
  }
  
  
  var strings= [
    document.querySelectorAll( '.listing-title h2' ),
    /* Pop-off paragraph from array... */
    ( window.innerWidth < 1440 ) ? document.querySelectorAll( '.listing-content p' ): null,
  ];
  
  try {
    for ( str_obj in strings ) {
      var      i = 0,
      max_strlen = 45,
         ntitles = strings[str_obj];
      for ( i; i<ntitles.length; i++ ) {
        var cur_title = ntitles[i];
        try {
          //truncate( cur_title );
          truncate_sentence( cur_title );
        } catch( err ) {
            console.warn( "\r\nWarning: " + err + "\r\n" );
        }
      }
    }
  } catch( err ) {
    console.warn( "\r\n" + err + "\r\n" );
  }  
  
$(document).ready(function(){
  
  setTimeout(function(){
    $(".alert").addClass("active");
}, 750);
  $("body").on('click', ".alert .container p i:last-of-type", function(){
    $(".alert").removeClass("active");
});
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
   $(".row-other-resources-1 > .col-xl-6.open-me, .row-other-resources-1 > .col-xl-6.close-me").click(function(e){
      if($(e.target).hasClass("process-click")){
        
      }else{
        e.preventDefault();
        $(this).toggleClass('open-me close-me');
      }
   });
});

$(window).on("load", function(){
  
});