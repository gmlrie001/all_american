<!DOCTYPE html>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<html lang="en">

  <head>

    <meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Vault - Monza Media</title>

    <link rel="shortcut icon" href="/assets/images/vault/logo/favicon.ico" />

    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Locked" />
		<meta name="keywords" content="Locked" />
    <meta name="author" content="Monza Media <http://www.monzamedia.com>" />
	
		@include('includes.vault.styleincludes')

		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/fonts.css') }}" media="all" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/styles.css') }}" media="all" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/vendor.css') }}" media="print" onload="this.media='all';this.removeAttribute('onload');" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/header_sidebar.css') }}" media="all" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/dashboard.css') }}" media="print" onload="this.media='all';this.removeAttribute('onload');" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/tabs.css') }}" media="all" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/forms.css') }}" media="all" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/functions.css') }}" media="all" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/listing.css') }}" media="all" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/mass_operation.css') }}" media="print" onload="this.media='all';this.removeAttribute('onload');" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vault/pagination.css') }}" media="print" onload="this.media='all';this.removeAttribute('onload');" />

    @stack( 'pageStyles' )

  </head>

  <body>

    <div class="container-fluid header">
      @include('includes.vault.header')
    </div>
  
    <div class="vault-content">
      <div class="side-nav">
        @include('includes.vault.nav')
      </div>
      @yield('content')
    </div>
  
    <footer>
      @include('includes.vault.messages')
    </footer>

		@include('includes.vault.scriptIncludes')

    <script src="{{ asset('/assets/js/vault/scripts.js') }}" type="text/javascript"></script>

    @stack( 'pageScripts' )

  </body>

</html>
