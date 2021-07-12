@php
/**
 * @input: $class
 * @input: $width
 * @input: $height
 * @input: $text
 * @input: $use_vault_logo*
 * @input: $use_placehold_it
 * @input: $imgvar
 * @input: $imgtitle
 * @input: $imgclasses
 *
 */

$class  = ( $class != NULL || $class || gettype( $class ) === 'string' ) ? $class : '';
$width  = ( $width != NULL || $width || gettype( $width ) === 'integer' ) ? $width : 800;
$height = ( $height != NULL || $height || gettype( $height ) === 'integer' ) ? $height : 600;
$text   = ( $text != NULL || $text || gettype( $text ) === 'string' ) ? $text : '+';

$placeholdit_path = 'https://via.placeholder.com/'.$width.'x'.$height.'.png&text='.$text;

$logo_full_path   = 'assets/placeholder/vault_placeholder_main_logo.svg';
$verify_location  = file_exists( $_SERVER['DOCUMENT_ROOT'].'/'.$logo_full_path );
$use_vault_logo   = ( $use_vault_logo ) ? $use_vault_logo : !1;
$use_placehold_it = ( $use_placehold_it ) ? $use_placehold_it : !1;
@endphp

@if ( isset( $imgvar ) )
  @if( ! is_null( $imgvar ) && file_exists( public_path( $imgvar ) ) ) {{-- && file_exists( public_exists( $imgvar ) ) --}}
    @php
      list( , , , $attrWidthAndHeight ) = getimagesize( public_path( ltrim( $imgvar, '/' ) ) );
    @endphp
    <img 
      class="@if( NULL != $imgclasses ) {{ $imgclasses }} @endif" 
      {!! $attrWidthAndHeight !!}
      src="{{ url( ltrim( $imgvar, '/' ) ) }}" 
      alt="{{ $imgtitle }}" 
      @if( Request::is('blog*') ) style="float:left;margin-right:1rem;margin-bottom:0.618rem;" @endif
    >
  @else
    <div class="position-relative 
      @if( Request::is('blog') ) h-75 
      @elseif( Request::is('blog*') ) mr-lg-3 mr-0  
      @endif 
      @if( NULL != $class ) {{ $class }} @endif"
      style="clear:right!important;float:left!important;"
    >

    @if( $use_placehold_it )
      <img class="img-fluid placeholder-background" alt="Placeholder Background Decoration" src="{{ $placeholdit_path }}">
    @endif
    
    @if( $verify_location && $use_vault_logo)
      <img class="img-fluid position-absolute m-auto vault-placeholder-logo" alt="Vault Placeholder Logo" src="{{ url( ltrim( $logo_full_path, '/' ) ) }}">
    @endif
    </div>
@endif

@if( $verify_location && $use_vault_logo )
  @push( 'pageScripts' )
  <script>
    // Include CSS file
    function addCSS(filename) {
      var style = document.createElement('link');

      style.href = filename;
      style.type = 'text/css';
      style.rel = 'stylesheet';

      head.append(style);
    }
    // Include Inline styles string
    function addInlineCSS(styling='') {
      var style = document.createElement('style');

      style.innerText = styling;

      head.append(style);
    }
    // Include JS file
    function addScript(filename) {
      var script = document.createElement('script');

      script.src = filename;
      script.type = 'text/javascript';

      head.append(script);
    }
    // Include Inline script string
    function addInlineJS(scripting='') {
      var script = document.createElement('script');

      script.innerText = scripting;

      head.append(script);
    }

    document.addEventListener('DOMContentReady', function(){
      var stylingString = `@media only screen and (max-width:992px){
          .position-relative{clear:both!important;;float:unset!important;}
      }
      .blog-specific{max-width:100%;width:100%;}
      .vault-placeholder-logo {max-width:80px;max-height:80px;height:auto;top:0;bottom:0;left:0;right:0;} 
      @media only screen and (max-width:992px) { 
          .vault-placeholder-logo {max-width: 100%;width: 100%;}
      }`,

      head = document.getElementsByTagName('head')[0];

      try {
        addInlineCss( stylingString );

      } catch( error ) { console.warn( "\r\n" + error + "\r\n" ); }
    });
  </script>
  @endpush
@endif

@endisset
