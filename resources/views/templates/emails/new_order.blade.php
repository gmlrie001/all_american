@extends('templates.emails.layouts.index')

@section('content')

<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    You have received an order from {{$cart->user->name}} {{$cart->user->surname}}
    ({{$cart->user->email}}). The order is as follows:
  </td>
</tr>

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
          <strong>Billing Address:</strong>
        </td>
        <td valign="top"
          style="font-size: 14px;line-height: 15px;color: #1f1f1f;padding-bottom: 15px;">
          {{ $cart->billing_surname.', '.$cart->billing_name }}<br>
          @if($cart->billing_company != "")
          {{ $cart->billing_company }}<br>
          @endif
          {{ $cart->billing_phone }}<br>
          {{ $cart->billing_address_line_1.', '.$cart->billing_address_line_2 }}<br>
          {{ $cart->billing_suburb }}<br>
          {{ $cart->billing_city }}<br>
          {{ $cart->billing_postal_code }}<br>
          {{ $cart->billing_province }}<br>
          {{ $cart->billing_country }}
        </td>
      </tr>
      <tr>
        <td valign="top"
          style="font-size: 14px;line-height: 15px;color: #1f1f1f;padding-bottom: 15px;">
          <strong>Delivery Address:</strong>
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


<tr>
  <td>
    <table width="100%;">
      <tr>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Product</td>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Quantity</td>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Price</td>
      </tr>
      @php
      $total = 0;
      @endphp
      @foreach($cart->products as $product)
      <tr>
        <td width="60%" style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">
          <table>
            <tr>
              @php
              $variant = \App\Models\ProductVariant::where('product_id',
              $product->product_id)->where('filters', $product->filters)->first();
              if($variant != null){
                if($variant->variant != null || sizeof($variant->variant->displayGalleries)){
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
                {{$product_title}} ({{$product->code}})
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
              </td>
            </tr>
          </table>
        </td>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">{{$product->quantity}}
        </td>
        @if($product->original_price != null && $product->assembly_cost == null)
        @php $total += $product->original_price * $product->quantity; @endphp
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">R
          {{(number_format($product->original_price, 2, ".", ","))}}</td>
        @else
        @php $total += $product->price * $product->quantity; @endphp
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">R
          {{(number_format($product->price, 2, ".", ","))}}</td>
        @endif
      </tr>
      @endforeach
    </table>
  </td>
</tr>
<tr>
  <td style="padding-bottom: 20px;">
    @php $discountTotalsForTatalOrderValue = 0; @endphp
    <table width="100%;" style="position: relative;top: -3px;">
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Subtotal:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"R ".(number_format($total, 2, ".", ",")) }}</td>
      </tr>
      @if($cart->coupon_value != 0 && $cart->coupon_value != null)
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Coupon:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"-R ".(number_format($cart->coupon_value, 2, ".", ",")) }}</td>
      </tr>
      @php $discountTotalsForTatalOrderValue += $cart->coupon_value; @endphp
      @endif
      @if($cart->store_credit_value != 0 && $cart->store_credit_value != null)
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">Store
          Credit:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"-R ".(number_format($cart->store_credit_value, 2, ".", ",")) }}</td>
      </tr>
      @php $discountTotalsForTatalOrderValue += $cart->store_credit_value; @endphp
      @endif
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Total:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{ "R ".(number_format($total+$cart->shipping_cost-$discountTotalsForTatalOrderValue, 2, ".", ",")) }}
        </td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Payment Method:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->payment_method}}</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipping:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{"R ".(number_format($cart->shipping_cost, 2, ".", ",")) }}</td>
      </tr>
      @isset( $cart->shipment->shipper )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Selected Shipping Option:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->shipment->shipper}}</td>
      </tr>
      @endisset
      @if( preg_match( '/(aramex.*?)+/isU', $cart->shipment->shipper, $m ) )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipping Estimated Delivery from courier:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->shipment->estimated_delivery_date}}</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Tracking Number:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->shipment->waybill_tracking_number}}</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Collection Pickup When:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">The day following
          the order being placed between 12PM and 6PM</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Collection Pickup Where:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">Office, collected
          from reception</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Collection Pickup Tracking:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->shipment->collection_pickup_number}}</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipping Label Link (please print and attach to parcel):</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;"><a
            rel="noopener noreferer" title="Get PDF of shipping label to print" target="_blank"
            href="{{$cart->shipment->shipping_label_link}}">Printable Shipping Label</a></td>
      </tr>
      @endif
      @if( preg_match( '/(parcel\s?ninja.*?)+/isU', $cart->shipment->shipper, $m ) )
      @isset( $cart->shipment->estimated_delivery_date )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipping Estimated Delivery from courier:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->shipment->estimated_delivery_date}}</td>
      </tr>
      @endisset
      @isset( $cart->shipment->waybill_tracking_number )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Tracking Number:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->shipment->waybill_tracking_number}}</td>
      </tr>
      @endisset
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Collection Pickup When:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">The day following
          the order being placed between 12PM and 6PM</td>
      </tr>
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Collection Pickup Where:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">Office, collected
          from reception</td>
      </tr>
      @isset( $cart->shipment->collection_pickup_number )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipment Collection Pickup Tracking:</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          {{$cart->shipment->collection_pickup_number}}</td>
      </tr>
      @endisset
      @isset( $cart->shipment->shipping_label_link )
      <tr>
        <td width="80.5%" style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;">
          Shipping Label Link (please print and attach to parcel):</td>
        <td style="border: 1px solid #1f1f1f;padding: 10px 20px;color: #1f1f1f;"><a
            rel="noopener noreferer" title="Get PDF of shipping label to print" target="_blank"
            href="{{$cart->shipment->shipping_label_link}}">Printable Shipping Label</a></td>
      </tr>
      @endisset
      @endif
    </table>
  </td>
</tr>
@endsection
