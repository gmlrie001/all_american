@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
   	<div class="container-fluid profile-top-nav px-lg-0 px-3">
	  <div class="row no-gutters">
	    <div class="container profile-nav d-none d-lg-block px-lg-0 px-3">
            <div class="row">
                <div class="col-12">
                    <a href="/profile" class="@if( Request::is('profile') ) active @endif">Profile</a>
                    <a href="/profile/addresses" class="@if( Request::is('profile') ) active @endif">addresses</a>
                    <a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif">current orders</a>
                    <a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif">past orders</a>
                    @if ( in_array( "Vault\StoreCredit\StoreCreditServiceProvider", get_declared_classes() ) )
                    <a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif">wallet</a>
                    @endif
                </div>
            </div>
        </div>
	    <div class="container mobile-profile-nav d-block d-lg-none">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <a href="/profile" class="@if( Request::is('profile') ) active @endif profile fa fa-user"></a>
                        <a href="/profile/addresses" class="@if( Request::is('profile/addresses') ) active @endif profile-addresses fa fa-address-book"></a>
                        <a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif profile-current-orders fa fa-shopping-cart"></a>
                        <a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif profile-past-orders fa fa-shopping-basket"></a>
                        <a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif profile-wallet fa fa-wallet"></a>
                    </div>
                </div>
            </div>
          </div>
      </div>

	<div class="container mb-lg-5 mb-4">
		<div class="row">
			<div class="col-12">
				<h1 class="add-address">PAST ORDERS</h1>
			</div>
		</div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach($orders as $order)
                        @include('templates.profile.order_block_previous', ['order' => $order])
                    @endforeach
                </div>
            </div>
        </div>
	</div>
	
@endsection