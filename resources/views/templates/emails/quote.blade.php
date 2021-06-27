<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Automated Email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Gothic+A1:400,700');
    /**
     * Avoid browser level font resizing.
     * 1. Windows Mobile
     * 2. iOS / OSX
     */
     body * {
         font-family: 'Gothic A1', sans-serif;
     }
  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }
  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }
  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }
  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }
  /**
   * Fix centering issues in Android 4.4.
   */
  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }
  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }
  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }
  a {
    color: #1a82e2;
  }
  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }
  </style>

</head>
  <body style="background-color: #ffffff;">
      <table width="800px">
          <tr>
              <td align="center">
                  <a href="{{url('/')}}" target="_blank" style="display: inline-block; padding: 50px 0;">
                      <img src="{{url('/')}}/{{$logo}}" alt="Logo" border="0" width="300">
                  </a>
              </td>
          </tr>
          <tr>
              <td align="center" style="padding-bottom: 25px;">
                  <table width="750px">
                      <tr>
                          <td style="padding-bottom: 25px;">
                              <table width="100%;">
                                <tr>
                                  <td style="border: 1px solid #1f1f1f;padding: 20px 50px;">
                                    <strong style="color: #12529b;text-align: center;display: block;text-decoration: underline;">BILLING DETAILS</strong><br>
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
                                  <td style="border: 1px solid #1f1f1f;padding: 20px 50px;">
                                    <strong style="color: #12529b;text-align: center;display: block;text-decoration: underline;">DELIVERY ADDRESS</strong><br>
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
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td align="center" style="padding-bottom: 40px;">
                  <table width="700px">
                      <tr>
                        <td>
                          @php
                              $address = $cart->user->addresses->where('vat_number', '!=', null)->first();
                          @endphp
                          <table width="100%;">
                            <tr>
                                <td style="border: 2px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;">Date</td>
                                <td style="border: 2px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;">Quotation #</td>
                                @if($address != null)
                                  <td style="border: 2px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;">Customer Tax Number</td>
                                @endif
                                <td rowspan="2" width="20%" style="border: 2px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;">QUOTATION</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;text-align: center;font-weight: 600;font-size: 17px;">{{date_format(date_create($cart->updated_at), "d/m/Y")}}</td>
                                <td style="border: 1px solid;text-align: center;font-weight: 600;font-size: 17px;">{{$cart->id}}</td>
                                @if($address != null)
                                  <td style="border: 1px solid;text-align: center;font-weight: 600;font-size: 17px;">{{$address->vat_number}}</td>
                                @endif
                            </tr>
                          </table>
                        </td>
                        
                      </tr>
                  </table>
              </td>
            </tr>
            <tr>
                <td align="center" style="padding-bottom: 25px;">
                    <table width="750px">
                      <tr>
                          <td style="border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Item Code</td>
                          <td style="border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Item Description</td>
                          <td style="border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Quantity</td>
                          <td style="border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Price Incl.</td>
                          <td style="border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Total Incl.</td>
                      </tr>
                      @php
                          $total = 0;
                      @endphp
                      @foreach($cart->products as $product)
                        <tr>
                          <td style="font-size: 13px;line-height: 33px;padding: 0 15px;">{{$product->code}}</td>
                          <td style="font-size: 13px;line-height: 33px;padding: 0 15px;">{{$product->product->title}}</td>
                          <td style="font-size: 13px;line-height: 33px;padding: 0 15px;">{{$product->quantity}}</td>
                          @if($product->original_price != null)
                          @php
                              $total += $product->original_price*$product->quantity;
                          @endphp
                          <td style="font-size: 13px;line-height: 33px;padding: 0 15px;">R {{(number_format($product->original_price, 2, ".", ","))}}</td>
                          <td style="font-size: 13px;line-height: 33px;padding: 0 15px;">R {{(number_format($product->original_price*$product->quantity, 2, ".", ","))}}</td>
                          @else
                            @php
                                $total += $product->price*$product->quantity;
                            @endphp
                            <td style="font-size: 13px;line-height: 33px;padding: 0 15px;">R {{(number_format($product->price, 2, ".", ","))}}</td>
                            <td style="font-size: 13px;line-height: 33px;padding: 0 15px;">R {{(number_format($product->price*$product->quantity, 2, ".", ","))}}</td>
                            @endif
                        <tr>
                      @endforeach
                      @php
                          $vatAmount = (number_format(((($total+$cart->shipping_cost)/1.15)-($total+$cart->shipping_cost))*-1, 2, ".", ","));
                          $vatSubAmount = (number_format((($total/1.15)-$total)*-1, 2, ".", ","));
                          $vatShipAmount = (number_format((($cart->shipping_cost/1.15)-$cart->shipping_cost)*-1, 2, ".", ","));
                      @endphp
                      <tr>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">Total (excl)</td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">R {{number_format($total-$vatSubAmount, 2, ".", ",")}}</td>
                      <tr>
                      <tr>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">Shipping Cost</td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">R {{number_format($cart->shipping_cost, 2, ".", ",")}}</td>
                      <tr>
                      <tr>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">Coupon</td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">-R {{$cart->coupon_value}}</td>
                      <tr>
                      <tr>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">VAT</td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;">R {{$vatAmount}}</td>
                      <tr>
                      <tr>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;"></td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;font-weight: 600;">Total (incl)</td>
                        <td style="font-size: 13px;line-height: 18px;padding: 0 15px;font-weight: 600;">R {{(number_format($cart->total, 2, ".", ","))}}</td>
                      <tr>
                    </table>
                </td>
            </tr>
            <tr>
              <td align="center" style="color: #1f1f1f;font-size: 14px;padding-bottom: 20px;font-weight: 600;">
                  QUOTE VALID FOR 5 DAYS FROM DATE OF QUOTATION. <br>
                  STOCK WILL NOT BE RESERVED WITHOUT PAYMENT.<br>
                  ANY DISCOUNT GIVEN DUE TO PROMOTION ONLY VALID WHILST PROMOTION IS RUNNING
              </td>
            </tr>

        </table>
    </body>
</html>