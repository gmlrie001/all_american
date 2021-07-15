function openModal() {
  try {
//    if ( window.outerWidth > 992 ) {
      document.getElementById("myModal").style.display = "block";
//    } else {
//      document.getElementById("myModalResponsive").style.display = "block";
//    }
  } catch (err) {
    /* */ }

  console.log( 'OPEN MODAL' );
}

function closeModal() {
  try {
//    if ( window.outerWidth > 992 ) {
      document.getElementById("myModal").style.display = "none";
//    } else {
//      document.getElementById("myModalResponsive").style.display = "block";
//    }
  } catch (err) {
    /* */ }

  console.log( 'CLOSE MODAL' );

}

var slideIndex = 1;
try {
  showSlides(slideIndex);
} catch (err) {
  /* */ }

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i,
    slides = document.getElementsByClassName("mySlides"),
    dots = document.getElementsByClassName("demo"),
    captionText = document.getElementById("caption");

  if (n > slides.length) {
    slideIndex = 1
  }

  if (n < 1) {
    slideIndex = slides.length
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  captionText.innerHTML = dots[slideIndex - 1].alt;
}