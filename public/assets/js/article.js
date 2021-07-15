$(document).ready(function () {

  $('.articleSlide').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    fade: true,
    cssEase: 'linear',
    dots: true
  });

    
  $(".addModal > a").click(function(){
    $(".addAdressContain").fadeIn(500);
    $(".addAdressOverlay").fadeIn(500);
  });

  $(".AddressClose").click(function(){
      $(".addAdressContain").fadeOut(500);
      $(".addAdressOverlay").fadeOut(500);
  });
  $(".addAdressOverlay").click(function(){
      $(".addAdressContain").fadeOut(500);
      $(".addAdressOverlay").fadeOut(500);
  });

  $(".returnModal").click(function(){
    $(".returnItemOverlay").fadeIn(500);
    $(".returnItemContain").fadeIn(500);
  });

  $(".returnClose").click(function(){
      $(".returnItemContain").fadeOut(500);
      $(".returnItemOverlay").fadeOut(500);
  });
  $(".returnItemOverlay").click(function(){
      $(".returnItemContain").fadeOut(500);
      $(".returnItemOverlay").fadeOut(500);
  });

  // var a = $(".moreLoad").slice(0, 3).show();
  // if ($(".moreLoad.hidden").length != 0) {
  //   $(".loadMore").show();
  // }
  reveal_articles(0);
  check_article_load_more();


  $(".loadMore").on('click', function (e) {
    e.preventDefault();
    reveal_articles(6);
    check_article_load_more();
  });

  $(".productListWrap .loadMore").on('click', function (e) {
    e.preventDefault();
    reveal_articles(6);
    check_article_load_more();
  });

  (function () {
    check_article_load_more();
  })();




});


function reveal_articles(n = 3) {

  var articles_to_reveal = $(".moreLoad.hidden").slice(0, n),
    article_revealed;

  /* Reveal 6 Articles by sliding them down */
  articles_to_reveal.slideDown();

  /* Remove hidden class so load more disappears as expected */
  article_revealed = [].slice.call(articles_to_reveal);
  article_revealed.map(article => {
    article.classList.remove('hidden')
  });

  return;

}

function check_article_load_more() {

  if ($(".moreLoad.hidden").length == 0) {
    $(".loadMore").fadeOut('slow');
  }

  return;

}