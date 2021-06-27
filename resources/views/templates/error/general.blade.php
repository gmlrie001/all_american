@extends('templates.layouts.index')

@section('content')
	<div class="container error-page">
		<div class="row">
			<div class="col-xs-12 col-md-9 padding-0">
				<h2>Something went wrong.</h2>
				<p>Sorry, we could not complete your request!</p>
				<p>We are aware of the issue and are working to resolve it. We thank you for your patience.</p>
				<a href="/">Back to home</a>
				<a href="/contact-us" class="grey">Contact us</a>
			</div>
		</div>
	</div>
@endsection