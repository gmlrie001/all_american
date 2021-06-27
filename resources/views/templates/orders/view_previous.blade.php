@extends( 'templates.layouts.index' )

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
                <div class="row">
                    <h1 class="col-12 add-address">Order No: {{$order->id}}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-4 order-info-block">
                        <div>
                            <h2>Shipping Address</h2>
                            <p>{{$order->delivery_name}} {{$order->delivery_surname}}</p>
                            <p>{{$order->delivery_phone}}</p>
                            <p>{{$order->delivery_company}}</p>
                            <p>{{$order->delivery_address_line_1}}</p>
                            @if($order->delivery_address_line_2 != null && $order->delivery_address_line_2 != "")
                                <p>{{$order->delivery_address_line_2}}</p>
                            @endif
                            <p>{{$order->delivery_suburb}}</p>
                            <p>{{$order->delivery_city}}</p>
                            <p>{{$order->delivery_postal_code}}</p>
                            <p>{{$order->delivery_province}}</p>
                            <p>{{$order->delivery_country}}</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 order-info-block">
                        <div>
                            <h2>Billing Address</h2>
                            <p>{{$order->billing_name}} {{$order->billing_surname}}</p>
                            <p>{{$order->billing_phone}}</p>
                            <p>{{$order->billing_company}}</p>
                            <p>{{$order->billing_address_line_1}}</p>
                            @if($order->billing_address_line_2 != null && $order->billing_address_line_2 != "")
                                <p>{{$order->billing_address_line_2}}</p>
                            @endif
                            <p>{{$order->billing_suburb}}</p>
                            <p>{{$order->billing_city}}</p>
                            <p>{{$order->billing_postal_code}}</p>
                            <p>{{$order->billing_province}}</p>
                            <p>{{$order->billing_country}}</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 order-info-block">
                        <div>
                            <h2>Your Order</h2>
                            <p><span>Order Placed:</span>{{$order->order_placed}}</p>
                            <p><span>Sub Total:</span>R {{$order->subtotal}}</p>
                            <p><span>Total Items:</span>{{$order->products->count()}}</p>
                            @if($order->shipping_cost != null && $order->shipping_cost != "")
                                <p><span>Shipping Method:</span>{{$order->shipping_title}}</p>
                                <p><span></span>{{$order->shipping_time_of_arrival}}</p>
                                <p><span>Shipping Cost:</span>R {{$order->shipping_cost}}</p>
                            @endif
                            @if($order->coupon_value != null && $order->coupon_value != "")
                                <p><span>Coupon:</span>-R {{$order->coupon_value}}</p>
                                <p><span>Coupon Code:</span>{{$order->coupon}}</p>
                            @endif
                            <p><span>Order Total:</span>R {{$order->total}}</p>
                            <p><span>Payment Method:</span>{{$order->payment_method}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h2 class="col-12">Order Items</h2>
                    @foreach($order->products as $product)
                        @include('templates.products.current_product', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection