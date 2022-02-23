@extends('templates.emails.layouts.index')

@section('content')

<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    Hi {{$user->name}},
  </td>
</tr>
@if($cart->payment_method == "EFT")
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    Thank you for ordering.
  </td>
</tr>
@endif
@if($cart->collection_code != null)
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    <span style="color: #ff0000;">Your order is not ready for collection yet.</span> We&apos;ll
    email you the moment it is ready.
  </td>
</tr>
@endif

<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    We can only start preparing your order for delivery once we’ve received payment.
  </td>
</tr>
@if($cart->payment_method == "EFT")
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    Please make payment for your order by EFT or bank deposit.
  </td>
</tr>
@endif
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    Please use your <strong>Order Number</strong> below as payment reference and <u>email proof
      of payment</u> to:
    <a style="text-decoration: none; color: #1f1f1f;font-weight: 600;"
      href="mailto:{{ $site_settings->order_email }}">{{ $site_settings->order_email }}</a>

  </td>
</tr>

@if($cart->payment_method == "EFT")
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    {!! $site_settings->eft_info !!}
  </td>
</tr>
<tr>
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 50px;">
    Your order details are as follows:
  </td>
</tr>
@else
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 50px;">
    Your order has been received and is now being processed. Your order details are shown below
    for your reference:
  </td>
</tr>
@endif
<tr>
  <td
    style="font-size: 18px;line-height: 25px;color: #000000;padding-bottom: 15px;font-weight: 600;">
    Order Number: {{'#'.$cart->id}} ({{date_format(date_create($cart->order_placed), 'd F Y')}})
  </td>
</tr>

<tr>
  <td>
    <table width="80%">
      <tr>
        <td valign="top"
          style="font-size: 14px;line-height: 15px;color: #1f1f1f;padding-bottom: 15px;">
          <strong>Delivery To:</strong>
        </td>
        <td valign="top"
          style="font-size: 14px;line-height: 15px;color: #1f1f1f;padding-bottom: 15px;">
          {{ $cart->delivery_surname.', '.$cart->delivery_name }}<br>
          @if($cart->delivery_company != "")
          {{ $cart->delivery_company }}<br>
          @endif
          {{ $cart->delivery_phone }}<br>
          {{ $cart->delivery_address_line_1.', '.$cart->delivery_address_line_2 }}<br>
          {{ $cart->delivery_suburb }}<br>
          {{ $cart->delivery_city }}<br>
          {{ $cart->delivery_postal_code }}<br>
          {{ $cart->delivery_province }}<br>
          {{ $cart->delivery_country }}
        </td>
      </tr>
      <tr>
        <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
          <strong>Delivery Method:</strong>
        </td>
        <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
          {{$cart->shipping_title}}</td>
      </tr>
      <tr>
        <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
          <strong>Payment Method:</strong>
        </td>
        <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
          {{$cart->payment_method}}</td>
      </tr>
    </table>
  </td>
</tr>
@if($cart->collection_code != null && $cart->payment_method != "EFT")
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    <span style="color: #ff0000;">Your order is not ready for collection yet.</span> We&apos;ll
    now begin to process your order.
  </td>
</tr>
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    We&apos;ll email you the moment it is ready.
  </td>
</tr>
@endif
@php
  $currentDateTimeForScheduling = \Carbon\Carbon::now();
  $first = \Carbon\Carbon::create(2019, 11, 25, 00, 00, 00);
  $second = \Carbon\Carbon::create(2019, 12, 00, 23, 59, 59);
@endphp
@if($currentDateTimeForScheduling->between($first, $second))
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #ff0000;padding-bottom: 15px;">
    Please note: Due to the high volume of orders during Black Friday Week delivery estimates
    could be longer. We apologise for any inconvenience caused.
  </td>
</tr>
@endif
<tr>
  <td>
    <table width="100%;">
      <tr>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Product</td>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Quantity</td>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Price</td>
      </tr>
      @php $total = 0; @endphp
      @foreach($cart->products as $product)
      <tr>
        <td width="60%" style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">
          <table>
            <tr>
              @php
              $variant = \App\Models\ProductVariant::where('product_id',
              $product->product_id)->where('filters', $product->filters)->first();
              if($variant != null){
                if($variant->variant != null ||
                  sizeof($variant->variant->displayGalleries)){
                  $image = $variant->variant->product_image;
                  $thumbnail = $variant->variant->product_thumbnail;
                  $product_title = $variant->variant->title;
                }else{
                  $image = $product->product->product_image;
                  $thumbnail = $variant->product->product_thumbnail;
                  $product_title = $cart_prod->product->title;
                }
              }else{
                $image = $product->product->product_image;
                $thumbnail = $product->product->product_thumbnail;
                $product_title = $product->product->title;
              }
              if($image == "" || $image == null){
                $image = $logo;
              }
              @endphp
              <td><img src="{{ url('/'.$thumbnail ) }}" width="150" /></td>
              <td style="padding-left: 20px;">
                {{$product->product->title}} ({{$product->code}})
                @if($product->components != null && $product->components != 'null')
                <?php
                    $components = json_decode($product->components);
                    foreach($components as $key => $component){
                        $prod = \App\Models\Product::find($component);
                        $productVariant = \App\Models\ProductVariant::where('variant_id', $prod->id)->first();
                        if($productVariant == null){
                          $productVariant = \App\Models\Product::where('id', $prod->id)->first();
                        }
                        if($prod->parent_id != null){
                          if($key == 0){
                            echo '<h4 style="margin-top: 10px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->parent->title.'</strong></h4>';
                          }else{
                            echo '<h4 style="margin-top: 15px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->parent->title.'</strong></h4>';
                          }
                        }else{
                          if($key == 0){
                            echo '<h4 style="margin-top: 10px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->title.'</strong></h4>';
                          }else{
                            echo '<h4 style="margin-top: 15px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->title.'</strong></h4>';
                          }
                        }
                        $fils = json_decode($productVariant->filters);
                        foreach($fils as $key => $value){
                          $group = \App\Models\FilterOptionGroup::find($key);
                          $option = \App\Models\FilterOption::find($value);
                          echo '<p><span style="display: block; width: 100%;">'.$group->title.':</span> '.$option->title.'</p>';
                        }
                    }
                ?>
                @endif
            </tr>
          </table>
        </td>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">
          {{$product->quantity}}</td>
        @if($product->original_price != null && $product->assembly_cost == null)
        @php $total += $product->original_price * $product->quantity; @endphp
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">
          {{ $product->original_price }}</td>
        @else
        @php $total += $product->price * $product->quantity; @endphp
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">R
          {{ $product->price }}</td>
        @endif
      </tr>
      @endforeach
    </table>
  </td>
</tr>

<tr>
  <td style="padding-bottom: 20px;">
    @php
    $discountTotalsForTatalOrderValue = 0;
    $discountTotalsForTatalOrderValue += $cart->coupon_value;
    $discountTotalsForTatalOrderValue += $cart->store_credit_value;
    @endphp
    <table width="100%;" style="position: relative;top: -3px;">
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Subtotal:
        </td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"R ".(number_format($total, 2, ".", ",")) }}</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipping:
        </td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"R ".(number_format($cart->shipping_cost, 2, ".", ",")) }}</td>
      </tr>
      @isset( $cart->shipment->waybill_tracking_number )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipping Tracking Number for {{ ucwords( $cart->shipment->shipper ) }} Shipment:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{ $cart->shipment->waybill_tracking_number }}</td>
      </tr>
      @endisset
      @if( preg_match( '/(aramex.*?)+/isU', $cart->shipment->shipper, $m ) )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Please visit Aramex to track your parcel:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          <a
            rel="noopener noreferer" 
            href="https://www.aramex.com/us/en/track/results?mode=0&ShipmentNumber={{$cart->shipment->waybill_tracking_number}}"
            title="Track your parcel">Aramex: Track your package</a>
        </td>
      </tr>
      @endif
      @if( preg_match( '/(parcel\s?ninja.*?)+/isU', $cart->shipment->shipper, $m ) )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Please
          visit ParcelNinja to track your parcel:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;"><a
            rel="noopener noreferer" href="https://store.parcelninja.com/tracking.aspx"
            title="Track your parcel">ParcelNinja Tracking</a>.</td>
      </tr>
      @endif
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Payment Method:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->payment_method}}</td>
      </tr>
      @if($cart->coupon_value != 0 && $cart->coupon_value != null)
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Coupon:
        </td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"-R ".(number_format($cart->coupon_value, 2, ".", ","))  }}</td>
      </tr>
      @endif
      @if($cart->store_credit_value != 0 && $cart->store_credit_value != null)
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">Store
          Credit:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"-R ".number_format($cart->store_credit_value, 2, ".", ",") }}</td>
      </tr>
      @endif
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Total:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{ "R ".number_format($total+$cart->shipping_cost-$discountTotalsForTatalOrderValue, 2, ".", ",") }}
        </td>
      </tr>
    </table>
  </td>
</tr>

<tr>
  <td style="font-size: 15px;line-height: 25px;color: #ff0000;padding-bottom: 50px;text-decoration: underline;">
  </td>
</tr>
<tr>
  <td align="center" style="color: #255a9e;font-size: 14px;padding-bottom: 20px;">
    <br>
  </td>
</tr>
@endsection
