<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="/assets/images/vault/logo/favicon.ico" />
	    <!-- SEO -->
		<title>Monza Media</title>
        <meta name="description" content="Locked" />
		<meta name="keywords" content="Locked" />
        <meta name="author" content="Monza Media <http://www.monzamedia.com>" />
        <meta name="robots" content="noindex, nofollow">
	
        <!-- Style Sheets -->
        <!-- Standard Bootstrap Styles -->
		<link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet" />
	
        <!-- Vendor Style Sheets -->
		<link rel="stylesheet" href="{{ asset('/assets/css/vendor/font-awesome-4.6.3/css/font-awesome.min.css') }}">
        <!-- Front-End Styles -->
        <link href="{{ asset('/assets/css/vault/login.css') }}" rel="stylesheet" />
	
		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		
		<!--Scripts-->
		<!--Vendor Scripts-->
		@include('includes.vault.scriptIncludes')

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        
        <!-- Analytics -->
        <script>
            //analytics goes here
        </script>
    </head>
    <body class="basic" style="background-image: url(/assets/images/vault/login_backgrounds/{{$bg_number}}.jpg);">
		@yield('content')
		
		<!--Front-End Scripts-->
		<script src="{{ asset('/assets/js/vault/scripts.js') }}" type="text/javascript"></script>
    </body>
</html>
