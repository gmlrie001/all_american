@extends('templates.emails.layouts.index')

@section('content')

<tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
      Hi {{$user->name}},
    </td>
  </tr>

  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
      An item that you have added to your wishlist is now even cheaper and has just gone on sale!<br>
      Be one of the first to get your hands on the item before it sells out!
    </td>
  </tr>

  <tr>
    <td style="padding-bottom: 20px;">
      <table width="100%;">
        <tr>
          <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Product</td>
          <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">Price</td>
        </tr>
          <tr>
            <td width="80%" style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">
              <table>
                <tr>
                  @php
                  $image = $product->product_image;
                  
                  if($image == "" || $image == null){
                    $image = $logo;
                  }
                  if($product->parent_id != null){
                    $link = $product->parent->url_title;
                  }else{
                    $link = $product->url_title;
                  }
                @endphp
                <td><a href="{{ url( product/{{$link}}"><img src="{{ '{{ url( '.$image }}" width="150" /></a></td>
                <td style="padding-left: 20px;"><a href="{{ url( product/{{$link}}">{{$product->title}} ({{$product->code}})</a></td>
                  
                </tr>
              </table>
            </td>
            <td align="center" valign="middle" style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">R {{(number_format($product->price, 0, ".", ","))}}</td>
          </tr>
      </table>
    </td>
  </tr>
    
  <tr>
    <td align="center" style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
      Hurry! Sales promotions continue while stocks last and can end at anytime without notice.
    </td>
  </tr>

  <tr>
    <td align="center">
        <table width="400px">
          <tr>
            <td>
              <a style="text-align: center;display: block;background: #255a9e;text-decoration: none;color: #ffffff;font-weight: 700;padding: 15px;margin-bottom: 45px;" href="{{ url( product/{{$link}}">SHOP NOW</a>
            </td>
          </tr>
        </table>
    </td>
  </tr>
    @endsection