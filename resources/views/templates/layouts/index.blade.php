@php
  $environmentArray = ['staging', 'preview', 'production', 'live'];
  $environmentCheck = in_array( app()->environment(), $environmentArray );
@endphp

<!doctype html>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="referrer" content="strict-origin">
    {{-- <meta http-equiv="Content-Security-Policy" content="script-src 'self'; object-src 'none'; base-uri 'none';"> --}}

    <title>@yield( 'title' )</title>

  @isset( $seo['seo_keywords'] )
    <meta name="keywords" content="{{$seo['seo_keywords']}}" />
  @endisset
  @isset( $seo['seo_description'] )
    <meta name="description" content="{{$seo['seo_description']}}" />
  @endisset
    <meta name="author" content="Monza Media <https://www.monzamedia.com>" />
  @isset( $seo['image'] )
    <meta name="image" content="{{$seo['image']}}">
  @endisset
    <meta name="theme-color" content="#051c2e">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/js/vendor/slick-master/slick/slick.css" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="/assets/js/vendor/slick-master/slick/slick-theme.css" media="print" onload="this.media='all';this.removeAttribute('onload');">

  @isset( $seo['title'] )
    <meta itemprop="name" content="{{$seo['title']}}">
  @endisset
  @isset( $seo['seo_description'] )
    <meta itemprop="description" content="{{$seo['description']}}">
  @endisset

  @isset( $seo )
    <meta name="twitter:card" content="{{$seo['description']}}">
    <meta name="twitter:title" content="{{$seo['title']}}">
    <meta name="twitter:description" content="{{$seo['description']}}">
    @isset( $site_settings->site_name )
    <meta name="twitter:site" content="{{'@'.$site_settings->site_name}}">
    <meta name="twitter:creator" content="{{'@'.$site_settings->site_name}}">
    @endisset
    <meta name="twitter:image:src" content="{{$seo['image']}}">
  @endisset

  @isset( $seo )
    <meta name="og:title" content="{{$seo['title']}}">
    <meta name="og:description" content="{{$seo['description']}}">
    <meta name="og:image" content="{{$seo['image']}}">
    <meta name="og:url" content="{{$seo['url']}}">
    @isset( $site_settings->site_name )
    <meta name="og:site_name" content="{{$site_settings->site_name}}">
    @endisset
    <meta name="og:locale" content="EN">
    <meta name="fb:app_id" content="1316646895143006">
  @endisset

    <link rel="canonical" href="{{ Request::url() }}" />

  @if( isset( $product ) && $product != NULL )
    @if ( $product->quantity > 0 )
    <meta name="product:availability" content="In stock">
    @else
    <meta name="product:availability" content="Out of stock">
    @endif
    <meta name="product:price:currency" content="ZAR">
    <meta name="product:price:amount" content="{{ $product->price }}">
    <meta name="product:brand" content="{{ $product->title }}">
    <meta name="og:type" content="product">
  @else
    <meta name="og:type" content="website">
  @endif

  @if ( file_exists( '/manifest.json' ) )
    <link rel="manifest" href="/manifest.json">
  @endif

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700,800&display=swap" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Muli:200,300,400,600,700,800,900&display=swap" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/general.css' ) }}@else{{ asset( 'assets/oils/css/general.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/about.css' ) }}@else{{ asset( 'assets/oils/css/about.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/account.css' ) }}@else{{ asset( 'assets/oils/css/account.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/alert.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/banner.css' ) }}@else{{ asset( 'assets/css/banner.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/app.css" media="all"> --}}
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/blender.css" media="all"> --}}
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/blog.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/breadcrumbs.css' ) }}@else{{ asset( 'assets/css/breadcrumbs.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/cart-bar.css" media="all"> --}}
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/checkout.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/contact.css' ) }}@else{{ asset( 'assets/css/contact.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/css/container.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/copyright.css' ) }}@else{{ asset( 'assets/css/copyright.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/creditmodal.css' ) }}@else{{ asset( 'assets/css/creditmodal.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/decofurn.css' ) }}@else{{ asset( 'assets/css/decofurn.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/delivery.css' ) }}@else{{ asset( 'assets/css/delivery.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/deliverymodal.css' ) }}@else{{ asset( 'assets/css/deliverymodal.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/directions.css' ) }}@else{{ asset( 'assets/css/directions.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/display.css' ) }}@else{{ asset( 'assets/css/display.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/display-responsive.css' ) }}@else{{ asset( 'assets/css/display-responsive.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/css/faq.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/faqs.css' ) }}@else{{ asset( 'assets/css/faqs.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/footer.css' ) }}@else{{ asset( 'assets/css/footer.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/grid.css' ) }}@else{{ asset( 'assets/css/grid.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/grid-responsive.css' ) }}@else{{ asset( 'assets/css/grid-responsive.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/css/home.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/inspiration.css' ) }}@else{{ asset( 'assets/css/inspiration.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/loginmodal.css' ) }}@else{{ asset( 'assets/css/loginmodal.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/navigation.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/notify.css' ) }}@else{{ asset( 'assets/oils/css/notify.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/pagination.css' ) }}@else{{ asset( 'assets/css/pagination.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/product.css" media="all"> --}}
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/promo.css" media="all">  --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/promobar.css' ) }}@else{{ asset( 'assets/css/promobar.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/promomodal.css" media="all"> --}}
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/range.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/selling_points.css' ) }}@else{{ asset( 'assets/css/selling_points.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/sharemodal.css" media="all"> --}}
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/shop.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/store_locator.css' ) }}@else{{ asset( 'assets/css/store_locator.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/styles.css' ) }}@else{{ asset( 'assets/css/styles.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/subscribe.css' ) }}@else{{ asset( 'assets/css/subscribe.css' ) }}@endif" media="all">
    {{-- <link rel="stylesheet" type="text/css" 
      href="/assets/oils/css/text-pages.css" media="all"> --}}
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/zoom.css' ) }}@else{{ asset( 'assets/css/zoom.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/notify.css' ) }}@else{{ asset( 'assets/oils/css/notify.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/cart-bar.css' ) }}@else{{ asset( 'assets/oils/css/cart-bar.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/css/header.css' ) }}@else{{ asset( 'assets/css/header.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/navigation.css' ) }}@else{{ asset( 'assets/oils/css/navigation.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/footer.css' ) }}@else{{ asset( 'assets/oils/css/footer.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/home.css' ) }}@else{{ asset( 'assets/oils/css/home.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/about.css' ) }}@else{{ asset( 'assets/oils/css/about.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/blog.css' ) }}@else{{ asset( 'assets/oils/css/blog.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/contact.css' ) }}@else{{ asset( 'assets/oils/css/contact.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/delivery.css' ) }}@else{{ asset( 'assets/oils/css/delivery.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/faq.css' ) }}@else{{ asset( 'assets/oils/css/faq.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/text-pages.css' ) }}@else{{ asset( 'assets/oils/css/text-pages.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/account.css' ) }}@else{{ asset( 'assets/oils/css/account.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/promo.css' ) }}@else{{ asset( 'assets/oils/css/promo.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/product.css' ) }}@else{{ asset( 'assets/oils/css/product.css' ) }}@endif" media="all">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/alert.css' ) }}@else{{ asset( 'assets/oils/css/alert.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/shop.css' ) }}@else{{ asset( 'assets/oils/css/shop.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/range.css' ) }}@else{{ asset( 'assets/oils/css/range.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/checkout.css' ) }}@else{{ asset( 'assets/oils/css/checkout.css' ) }}@endif" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/sharemodal.css' ) }}@else{{ asset( 'assets/oils/css/sharemodal.css' ) }}@endif" media="all" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" 
      href="@if($environmentCheck){{ secure_asset( 'assets/oils/css/promomodal.css' ) }}@else{{ asset( 'assets/oils/css/promomodal.css' ) }}@endif" media="all" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.3/css/v4-shims.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/vendor/Magnific-Popup-master/dist/magnific-popup.css" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="/assets/js/vendor/zoomio-master/zoomio.css" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/malihu-custom-scrollbar-plugin@3.1.5/jquery.mCustomScrollbar.css" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" media="print" onload="this.media='all';this.removeAttribute('onload');">
    <link rel="stylesheet" type="text/css" href="/assets/js/vendor/icheck-1.x/skins/square/orange.css" media="print" onload="this.media='all';this.removeAttribute('onload');">

    @yield('css_assets')

    @stack( 'pageStyles' )

    @stack( 'pageHeaderStyles' )

    <style id="main-nav-layout">
      .w-lg-65 {width:65%!important;}
      .time-block img {filter:grayscale(1);}
      .vault-placeholder-logo {max-width:50%;max-height:50%;height:auto;top:0;bottom:0;left:0;right:0;}
      .payment-order-summary p, .payment-order-summary p *, .payment-order-summary h3 span {font-size:0.75rem!important;}
      .payment-order-summary h3 span {text-transform:capitalize;}
      .headerSearch button[type=submit] {width:40px;height:37px;line-height:38px;}
      .topNavBG, .topNavBG * a * {font-family:'Montserrat',sans-serif;color:#cd8926;font-size:13px;line-height:inherit;font-weight:600;letter-spacing:calc(1em*(20/1000));}
      .navigation .linksContain a {font-family:'Montserrat',sans-serif;}
      .mobileNavigation, .mobileNavigation * a * {font-family:'Montserrat',sans-serif;color:#cd8926;}
      .profile-top-nav .profile-nav {padding-top:0.5rem;padding-bottom:0.5rem;}
      @media only screen and (max-width:992px) {
        /*.mobileNavigation, .mobileNavigation * a * {font-family:'Montserrat',sans-serif;color:#cd8926;}*/
        .vault-placeholder-logo {max-width:100%;width:100%;}
        .w-65 {width:auto!important;}
        .payment-order-summary p, .payment-order-summary p *, .payment-order-summary h3 span {font-size:0.875rem!important;}
      }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    @stack( 'pageHeaderScripts' )

  </head>

  @php ob_end_flush(); @endphp

  <body>
    @include('templates.promobar.index')
    @include('templates.header.index')
    @include('templates.messages.index')

    @if( ! Request( 'contact-us' ) )
      @include('templates.page_banner.index')
    @endif

    @yield('content')

    @include('templates.footer.index')

    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.0/parsley.min.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/slick-master/slick/slick.min.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/zoomio-master/zoomio.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/number-spinner/dist/jquery.spinner.min.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/malihu-custom-scrollbar-plugin@3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/stickyHeader/sticky-header.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/imageMapResizer.min.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/js.cookie.js"></script>
    <script type="text/javascript" src="/assets/js/vendor/icheck-2.x/icheck.min.js"></script>
    <script type="text/javascript">$(".spinner").spinner();</script>
    <script type="text/javascript" src="/assets/oils/js/header.js"></script>
    <script type="text/javascript" src="/assets/oils/js/faqs.js"></script>
    <script type="text/javascript" src="/assets/oils/js/article.js"></script>
    <script type="text/javascript" src="/assets/oils/js/messages.js"></script>
    <script type="text/javascript" src="/assets/oils/js/product.js"></script>
    <script type="text/javascript" src="/assets/oils/js/banner.js"></script>
    <script type="text/javascript" src="/assets/oils/js/profile.js"></script>
    <script type="text/javascript" src="/assets/oils/js/sharemodal.js"></script>
    <script type="text/javascript" src="/assets/oils/js/promo_modal.js"></script>

    @yield('js_assets')
    @stack( 'pageScripts' )

    <script type="text/javascript">
      var onloadCallback = function() {
        try {
          grecaptcha.render( 'g-captcha', {
            'sitekey' : '{{ env('GOOGLE_RECAPTCHA_CLIENT_KEY') }}',
            'theme'   : 'light'
          });
        } catch( err ) { console.warn(err); }  
      }
    </script>

  </body>

</html>
