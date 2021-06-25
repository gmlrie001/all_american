var all = [].slice.call(document.querySelectorAll('body *:not(#debugginTooltip)')),
  html = document.querySelector('html'),
  debugga = document.querySelector('#debuggerTooltip');

setTimeout(() => {
  html.setAttribute('style', 'position:relative;');
}, 1000);
console.log(all);

all[3].addEventListener(
  'click',
  (event) => {
    event.stopPropagation();
    console.log(event);
    console.log(event.srcElement);
    console.log(event.target);
    console.log(event.screenX + ' ' + event.screenY);
    console.log(event.clientX + ' ' + event.clientY);

    debugga.removeAttribute('hidden');
    debugga.classList.remove('collapse');
    debugga.setAttribute('style', 'width: 500px; height: 500px; top: ' + event.clientY + 'px; left: ' + event.clientX + 'px;');
  },
  false
);



var debug_mode = "OFF";
var local_debugStylesArray = [
  'position',
  'top',
  'left',
  'bottom',
  'right',
  'max-width',
  'width',
  'max-height',
  'height',

  'box-sizing',
  'display',

  /* CSS Flexbox */
  'flex',
  'flex-basis',
  'flex-grow',
  'flex-shrink',
  'flex-direction',
  'flex-wrap',
  /* CSS Flexbox */

  /* CSS Grid Considerations */
  'grid-template-columns',
  /* CSS Grid Considerations */

  'padding',
  'padding-top',
  'padding-bottom',
  'padding-left',
  'padding-right',

  'margin',
  'margin-top',
  'margin-bottom',
  'margin-left',
  'margin-right',

  'border',
  'border-top',
  'border-bottom',
  'border-left',
  'border-right',
  'border-radius',

  'color',
  'font-size',
  'font-style',
  'font-weight',
  'font-family',
  'line-height',
  'text-align',
  'text-decoration',
  'text-transform'
];

document.addEventListener('DOMContentLoaded', (event) => {
  all = [].slice.call(document.querySelectorAll('body * :not(#debugginTooltip)')),
    html = document.querySelector('html');

  setTimeout(() => {
    html.setAttribute('style', 'position:relative;');
  }, 1000);

  // console.log( all );
  // console.log( html );
  // console.log( debugga );

  all.map((alles) => {
    if (alles.classList.contains('debugger') || alles.classList.contains('close-debugger')) {
      return;
    } else {
      alles.addEventListener(
        'click',
        (event) => {
          if (debug_mode === 'OFF' || debug_mode == undefined) return;

          event.stopPropagation();

          var addHtml = document.createRange().createContextualFragment(
            `
<!-- Primitive DEBUGGER -->
<div id="debuggerTooltip" class="debugging debugger collapse position-absolute" hidden="">
<div style="clear:both!important;float:none;margin:30px auto;">
<span id="debugElementClass"></span>
<i class="fa fa-times close-debugger" 
onclick="
  var p = this.parentNode.closest('#debuggerTooltip');
      p.setAttribute('hidden','true');
      p.classList.add('collapse');
" 
style="
  padding: 15px;
  padding-top: 0;
  text-align: right;
  float: right;
  font-size: 200%;
  margin-top: -23px;
  cursor: pointer;
"
></i>
</div>
<hr>
</div>
`
          );
          document.body.insertBefore(addHtml, document.body.firstElementChild);

          var full_width = parseInt(document.body.clientWidth),
            full_height = parseInt(document.body.clientHeight),
            marginize_left = parseInt(0),
            half_the_width = parseInt(full_width * 0.5) + 1;
          half_the_height = parseInt(full_height * 0.5) + 1;

          var elemComputedStyles = window.getComputedStyle(event.srcElement, null),
            cssStylingAsTextTable = "";
          var debugga = document.querySelector('#debuggerTooltip'),
            dbg_cls = debugga.querySelector('#debugElementClass');

          var whichSide = 'left',
            howHigh = 'top',
            evtX = event.clientX,
            evtY = event.clientY;

          dbg_cls.innerText = 'TagName: ' + event.srcElement.tagName + ' - className: ' + event.srcElement.className + "\r\n" +
            'Parent: ' + event.srcElement.parentNode.tagName + ' .class.: ' + event.srcElement.parentNode.className;
          insertDebugElement = document.createElement('div');

          /** Debugging Header */
          // console.log(event);
          // console.log(event.srcElement);
          // console.log(event.target);
          // console.log(event.screenX + '\t' + event.screenY);
          // console.log(event.clientX + '\t' + event.clientY);
          /** */

          if (event.clientX > half_the_width) {
            whichSide = 'right';
            evtX = Math.abs(event.clientX - window.innerWidth);
          } else {
            whichSide = 'left';
            evtX = event.clientX;
          }

          if (event.clientY > half_the_height) {
            howHigh = 'top';
            evtY = Math.abs(event.clientY - window.innerHeight);
          } else {
            howHigh = 'top';
            evtY = event.clientY;
          }
          evtY += window.scrollY;
          // console.log( 'evtY_with_scroll: ' + evtY );

          debugga.setAttribute(
            'style',
            'padding-left:15px;padding-right:15px;width:50%;max-height:500px;' + howHigh + ':' + evtY + 'px;' + whichSide + ': ' + evtX + 'px;z-index:99999;background-color:rgba(250,250,250,0.95);border:1px solid #0c0c0c;box-shadow:rgba(60, 64, 67, 0.5) 0px 1px 2px 0px, rgba(60, 64, 67, 0.35) 0px 1px 3px 1px;overflow:auto;'
          );

          debugga.removeAttribute('hidden');
          debugga.classList.remove('collapse');

          for (var i = 0; i < elemComputedStyles.length; i++) {
            var cssObjProp = elemComputedStyles.item(i);
            // console.log( cssObjProp );
            // console.log( local_debugStylesArray );
            if (local_debugStylesArray.includes(cssObjProp)) {
              cssStylingAsTextTable += "<p class='cannot-edit' contenteditable='false' style='margin-bottom:5px;'>" + "<span class='styling-key'>" + cssObjProp + "</span>" + " = " + "<span class='styling-value'>" + elemComputedStyles.getPropertyValue(cssObjProp) + "</span>" + "</p>";
            }
          }

          // console.log( elemComputedStyles );
          // console.log( cssStylingAsTextTable );

          insertDebugElement.classList.add('debug-styling');
          insertDebugElement.innerHTML = cssStylingAsTextTable;

          // console.log( insertDebugElement );

          debugga.appendChild(insertDebugElement);
        },
        false
      );
    }

  });

}, false);