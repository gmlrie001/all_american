@extends('templates.layouts.index')

@section('content')
	<div class="container error-page d-block">
		<div class="row">
			<div class="col-xs-12 col-md-9 padding-0">
				<h2>Something went wrong while placing your order.</h2>
				<p>Sorry, but your order could not be processed!</p>
				<p>Your order has been put on hold or something has gone wrong in this process. Please retry or contact us with what went wrong.</p>
				<a href="/cart/view">Back to checkout</a>
				<a href="/contact-us" class="grey">Contact us</a>
			</div>
		</div>
	</div>
@endsection
