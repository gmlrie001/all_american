@extends('templates.layouts.index')

@section('content')
	<div class="container success-page">
		<div class="row">
            <div class="col-12 col-md-9 padding-0">
                <h2 style="color: #ff0000;">WARNING! New window Opened</h2>
                <p>You have opened a second window of the checkout process.</p>
                <p>This can negatively affect your transaction and the window has been closed.</p>
                <p>Please use the other window to complete your transaction.</p>
            </div>
        </div>
	</div>
@endsection