@extends('templates.layouts.index')

@section('content')
	<div class="container error-page">
		<div class="row">
			<div class="col-xs-12 col-md-9 padding-0">
				<h2>Oops!</h2>
				<p>The page you are looking for does not exist.</p>
				<a href="/">Back to home</a>
				<a href="/contact-us" class="grey">Contact us</a>
			</div>
		</div>
	</div>
@endsection