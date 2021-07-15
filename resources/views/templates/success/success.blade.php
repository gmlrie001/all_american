@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
	<div class="container success-page">
		<div class="row">
            <div class="col-12 col-md-9 padding-0">
                <h2>Thank you for your order!</h2>
                <p>Your order has been placed and is being processed.</p>

                @if($order->payment_method == "EFT")
                    {!! $site_settings->eft_info !!}
                @endif
                <div class="col-12 float-left">
                    <div class="row">
                        <div class="col-12 padding-0 order-sum">
                            <div class="row">
                                <div class="col-6 col-md-4">
                                    <h3>Order Number:</h3>
                                    <p>{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}</p>
                                    <h3>Items:</h3>
                                    <p>{{$order->products->sum("quantity")}}</p>
                                    <h3>Contact Number:</h3>
                                    <p>{{$order->delivery_phone}}</p>
                                </div>
                                <div class="col-6 col-md-4">
                                    <h3>Delivering To:</h3>
                                    <p>
                                        {{$order->delivery_name}} {{$order->delivery_surname}}<br>
                                    @if($order->delivery_company != "")
                                        {{$order->delivery_company}}<br>
                                    @endif
                                    {{$order->delivery_address_line_1}}<br>
                                    @if($order->delivery_address_line_2 != "")
                                        {{$order->delivery_address_line_2}}<br>
                                    @endif
                                    {{$order->delivery_suburb}}<br>
                                    {{$order->delivery_city}}<br>
                                    {{$order->delivery_postal_code}}<br>
                                    {{$order->delivery_province}}<br>
                                    {{$order->delivery_country}}
                                    </p>
                                </div>
                                <div class="col-12 col-md-4 grey-order-summary">
                                    <h3>Order Summary:</h3>
                                    <p class="text-right"><span>Subtotal:</span> R {{number_format($order->subtotal, 2, ".", "")}}</p>
                                    <p class="text-right"><span>Delivery:</span> R {{number_format($order->shipping_cost, 2, ".", "")}}</p>

                                    @if($order->discount != 0 && $order->discount != null)
                                        <p class="text-right"><span>Discount:</span> -R {{number_format($order->discount, 2, ".", "")}}</p>
                                    @endif
                                    @if($order->coupon_value != 0 && $order->coupon_value != null)
                                        <p class="text-right"><span>Coupon:</span> -R {{number_format($order->coupon_value, 2, ".", "")}}</p>
                                    @endif
                                    @if($order->store_credit_value != 0 && $order->store_credit_value != null)
                                        <p class="text-right"><span>Store Credit:</span> -R {{number_format($order->store_credit_value, 2, ".", "")}}</p>
                                    @endif
                                    <h3 class="text-right"><span>Total</span> R {{number_format($order->total, 2, ".", "")}}</h3>
                                    <p class="text-right"><span>15% VAT:</span> R {{number_format( $order->total * 0.13043, 2, ".", "")}}</p>
                                    @if( $order->shipping_title )
                                    <h3 class="text-right"><span>Shipping:</span>{{ $order->shipping_title }}</h3>
                                    @endif
                                    @if( $order->shipping_description )
                                    <p class="text-right"><span></span>{{ $order->shipping_description }}</p>
                                    @endif
                                    @if( $order->shipping_time_of_arrival )
                                    <p class="text-right"><span></span>{{ $order->shipping_time_of_arrival }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if ($config['external_courier_companies']['Aramex']['courier_enabled']) {
                        <section class="col-12 aramex-shipping">
                          <div class="title">
                            <h2>Aramex Shipment Information</h2>
                          </div>
                          <div class="aramex-shipment-info">
                            @isset( $waybill_tracking_number )
                              <h4><span>Aramex Tracking Number</span></h4>
                              <p>{{ $waybill_tracking_number }}</p>
                            @endisset
                            @isset( $shipping_label_print )
                              <h4>Aramex Shipping Label</h4>
                              <p><a rel="noopener noreferer" class="" target="_blank" title="Aramex Shipment Label Link" href="{{ $shipping_label_print }}">Shipping Label PDF</a></p>
                            @endisset
                            @isset( $collection_reference )
                              <h4>Aramex Collection Reference</h4>
                              <p>{{ $collection_reference }}</p>
                            @endisset
                          </div>
                      </section>
                      @endif
                    </div>
                </div>
                <a href="/shop" class="link-me">Continue Shopping</a>
            </div>
        </div>
	</div>
@endsection
