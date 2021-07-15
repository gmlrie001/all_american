<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO -->
    <title>{{$site_settings->site_name}} :: {{$page->seo_title}}</title>
    <meta name="keywords" content="{{$page->seo_keywords}}" />
    <meta name="description" content="{{$page->seo_description}}" />
    <meta name="author" content="Monza Media <http://www.monzamedia.com>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <style id="main-nav-layout">
      .w-lg-65 {
        width: 65% !important;
      }
      @media only screen and (max-width: 992px) {
        .w-65 {
          width: auto !important;
        }
      }
    </style>

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{$page->title}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{Request::url()}}" />
    @if( ! isset($social_img) )
      <meta property="og:image" content="{{url("/").'/'.$page->featured_image}}" />
    @else
      <meta property="og:image" content="{{url("/").'/'.$social_img}}" />
    @endif
    <meta property="og:description" content="{{strip_tags($page->description)}}" />
    <meta property="og:site_name" content="{{$site_settings->site_name}}" />
  </head>
  <body>
    @include('includes.pages.header.default.bootstrap4')

    @yield('content')

    @include('includes.pages.footer.default.bootstrap4')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>