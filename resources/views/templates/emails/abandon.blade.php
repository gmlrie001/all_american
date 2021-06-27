@extends('templates.emails.layouts.index')

@section('content')

<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    Hi {{$user->name}},
  </td>
</tr>
<tr>
  <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
    You left products behind in your African Oils cart.<br>
    They might sell out soon, so <a style="text-decoration: underline;color: #1f1f1f;" href="{{ url( '/cart/view' ) }}">check out now</a> before they're gone!
  </td>
</tr>

<tr>
  <td style="padding-bottom: 20px;">
    <table width="100%;">
      <tr>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Product</td>
        <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Price</td>
      </tr>
      @foreach($cart->products as $product)
      @if($product->product != null)
        <tr>
          <td width="80%" style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">
            <table>
              <tr>
                @php
                  $variant = \App\Models\ProductVariant::where('product_id', $product->product_id)->where('filters', $product->filters)->first();
                
                  if($variant != null){
                      if($variant->variant != null && sizeof($variant->variant->displayGalleries)){
                          $image = $variant->variant->displayGalleries[0]->gallery_image;
                      }else{
                          $image = $product->product->product_image;
                      }
                  }else{
                      $image = $product->product->product_image;
                  }
                
                  if($image == "" || $image == null){
                    $image = $logo;
                  }
                @endphp
                <td><a href="{{ url( 'product/' . $product->product->url_title ) }}"><img src="{{ '{{ url( '/'.$image }}" width="150" /></a></td>
                <td style="padding-left: 20px;"><a href="{{ url( 'product/' . {{$product->product->url_title}}">{{$product->product->title}} ({{$product->code}})</a></td>
                
              </tr>
            </table>
          </td>
          <td align="center" valign="middle" style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">{{ $product->price }}</td>
        </tr>
        @endif
      @endforeach
    </table>
  </td>
</tr>

<tr>
  <td align="center">
      <table width="400px">
        <tr>
          <td>
            <a style="text-align: center;display: block;background: #255a9e;text-decoration: none;color: #ffffff;font-weight: 700;padding: 15px;margin-bottom: 45px;" href="{{ url( '/cart/view' ) }}">RETURN TO CHECKOUT</a>
          </td>
        </tr>
      </table>
  </td>
</tr>

<tr>
  <td align="right" style="color: #255a9e;font-size: 14px;padding-bottom: 20px;">
      Have questions or need help with<br>your purchase?
  </td>
</tr>
<tr>
  <td align="right" style="color: #255a9e;font-size: 14px;">
      Call: 087 740 1800
  </td>
</tr>

@endsection