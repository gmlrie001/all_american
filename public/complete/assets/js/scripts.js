var _debug = false;

function social_media_slider() {
  var modal = document.querySelector(".icon-bar");
  var btn = document.querySelector(".page-social-icon");

  // Close by clicking on opening element
  btn.onclick = () => {
    modal.classList.toggle("active");
    btn.children[0].classList.toggle("color-inversion");
  }

  // Close by clicking anywhere else except opening or opened element
  window.onclick = (event) => {
    event.stopPropagation();
    if (event.target == modal) {
      if (modal.classList.contains("active")) modal.classList.toggle("active");
      if (btn.children[0].classList.contains("color-inversion")) btn.children[0].classList.toggle("color-inversion");
    }
  }

}

var load_debugger = function (relpathtocss = '') {

  // Properties
  this.stylesheet_location = relpathtocss;
  this.link_css = null;
  // load_debugger.prototype.getHead = () => {
  //   this.sectionHead = document.head;

  //   return this.sectionHead;
  // }
}

load_debugger.prototype.headCSSLink = () => {
  this.link_css = document.createElement('link');
  this.link_css.type = 'type/css';
  this.link_css.rel = 'stylesheet';
  this.link_css.id = 'css_debugging';
  console.log(this.link_css);
  console.log(this.stylesheet_location);
  // return this.link_css;
}
load_debugger.prototype.setCSSLink = () => {
  this.link_css.href = this.stylesheet_location;
  console.log(this.link_css);
  // return this.link_css;
}
load_debugger.prototype.appendCSSToHead = () => {
  this.sectionHead = document.head;
  console.log(this.link_css, this.stylesheet_location);
  this.sectionHead.appendChild(this.link_css);
}
load_debugger.prototype.prependCSSToHead = () => {}

function switchon_debugging() {
  // l = new load_debugger();
  // l.stylesheet_location = '/assets/css/outline_debugger.css';
  // l.headCSSLink();
  // l.appendCSSToHead();
  // n = document.querySelector('#css_debugging')
  // n.href = l.stylesheet_location
  // switch_debugging();
  var giftofspeed = document.createElement('link');
  giftofspeed.id = 'css_debugging';
  giftofspeed.rel = 'stylesheet';
  giftofspeed.href = '/assets/css/outline_debugger.css';
  giftofspeed.type = 'text/css';

  var godefer = document.getElementsByTagName('link')[0];
  godefer.parentNode.insertBefore(giftofspeed, godefer);

  debug_mode = 'ON';
}

function switchoff_debugging() {
  var giftofspeed = document.querySelector('#css_debugging');
  giftofspeed.parentNode.removeChild(giftofspeed);

  debug_mode = 'OFF';
}

function update_element() {
  var nv, err;
  try {
    nv = document.querySelector(".sticky-header");
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
      if (!nv.classList.contains("is-sticky")) nv.classList.add("is-sticky");
    } else {
      if (nv.classList.contains("is-sticky")) nv.classList.remove("is-sticky");
    }
  } catch (err) {
    /* Log Error/Warning/Exception */
    /*console.warn("\r\n" + err + "\r\n");*/
  }
}


  $(document).ready(function () {
    try {
       $("form").submit(function (e) {
           $("#btn-submit").attr("disabled", true);
           return true;
       });
    } catch( err ) { /* console.warn( '\r\n' + err + '\r\n' ) */}
  });


document.addEventListener("DOMContentLoaded", () => {
  // debug_mode = 'OFF';
  if (_debug) console.log("\r\n" + "DOM Content Load Complete" + "\r\n");

  // /* Add drop shadow to sticky navigation after scroll exit header region */
  // if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) { update_element(); ]
  // /* Scroll Event Listener */
  // window.onscroll =  () => { update_element() };
  // social_media_slider();

  (() => {
    try {
      var dd = document.querySelector('.dropdown-menu.show');
      var ss = document.querySelector('ul.navbar-nav');
      if (dd) {
        ss.classList.add('mm')
      } else {
        if (ss.classList.contains('mm')) {
          ss.classList.remove('mm')
        }
      }
    } catch( err ) { /* */ }
  })();

});