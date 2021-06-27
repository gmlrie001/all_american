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
      <table width="100%">
          <tr>
              <td align="center">
                  <a href="{{url('/')}}" target="_blank" style="display: inline-block; padding: 50px 0; test-align: center;">
                      <img src="{{url('/')}}/{{$logo}}" alt="Logo" border="0" width="300">
                  </a>
              </td>
          </tr>
          <tr>
              <td align="center" style="padding-bottom: 25px;">
                  <table width="100%">
                      <tr>
                          <td style="padding-bottom: 25px;">
                              <table width="100%">
                                <tr>
                                  <td style="border: 1px solid #1f1f1f;padding: 20px 50px;">
                                    <strong style="color: #12529b;text-align: center;display: block;text-decoration: underline;">BILLING DETAILS</strong><br>
                                    {{ $order->billing_surname.', '.$order->billing_name }}<br>
                                    @if($order->billing_company != "")
                                      {{ $order->billing_company }}<br>
                                    @endif
                                    {{ $order->billing_phone }}<br>
                                    {{ $order->billing_address_line_1.', '.$order->billing_address_line_2 }}<br>
                                    {{ $order->billing_suburb }}<br>
                                    {{ $order->billing_city }}<br>
                                    {{ $order->billing_postal_code }}<br>
                                    {{ $order->billing_province }}<br>
                                    {{ $order->billing_country }}
                                  </td>
                                  <td style="border: 1px solid #1f1f1f;padding: 20px 50px;">
                                    <strong style="color: #12529b;text-align: center;display: block;text-decoration: underline;">DELIVERY ADDRESS</strong><br>
                                    {{ $order->delivery_surname.', '.$order->delivery_name }}<br>
                                    @if($order->delivery_company != "")
                                      {{ $order->delivery_company }}<br>
                                    @endif
                                    {{ $order->delivery_phone }}<br>
                                    {{ $order->delivery_address_line_1.', '.$order->delivery_address_line_2 }}<br>
                                    {{ $order->delivery_suburb }}<br>
                                    {{ $order->delivery_city }}<br>
                                    {{ $order->delivery_postal_code }}<br>
                                    {{ $order->delivery_province }}<br>
                                    {{ $order->delivery_country }}
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
                  <table width="100%">
                      <tr>
                        <td>
                          @php
                              $address = $order->user->addresses->where('vat_number', '!=', null)->first();
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
                                <td style="border: 1px solid;text-align: center;font-weight: 600;font-size: 17px;">{{date_format(date_create($order->created_at), "d/m/Y")}}</td>
                                <td style="border: 1px solid;text-align: center;font-weight: 600;font-size: 17px;">{{$order->id}}</td>
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
              <td>
                <table width="100%">
                  <tr>
                    <td colspan="1" style="width: 20%;border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Item Code</td>
                    <td colspan="2" style="width: 20%;border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Item Description</td>
                    <td colspan="1" style="width: 20%;border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Quantity</td>
                    <td colspan="1" style="width: 20%;border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Price Incl.</td>
                    <td colspan="1" style="width: 20%;border: 1px solid;text-align: center;background: #cccccc;font-weight: 600;font-size: 17px;padding: 10px 0;">Total Incl.</td>
                  </tr>
                </table>
              </td>
            </tr>
            @foreach($order->products as $product)
              <tr>
                <td style="padding-bottom: 10px;">
                  <table width="100%">
                    <tr>
                      <td colspan="1" style="width: 20%;font-size: 13px;line-height: 18px;padding: 0 15px;word-break: break-all;">{{$product->code}}</td>
                      <td colspan="2" style="width: 20%;font-size: 13px;line-height: 18px;padding: 0 15px;word-break: break-all;">{{$product->product->title}}</td>
                      <td colspan="1" style="width: 20%;font-size: 13px;line-height: 18px;padding: 0 15px;">{{$product->quantity}}</td>
                      <td colspan="1" style="width: 20%;font-size: 13px;line-height: 18px;padding: 0 15px;">R {{(number_format($product->price, 2, ".", ","))}}</td>
                      <td colspan="1" style="width: 20%;font-size: 13px;line-height: 18px;padding: 0 15px;">R {{(number_format($product->price*$product->quantity, 2, ".", ","))}}</td>
                    <tr>
                  </table>
                </td>
              </tr>
            @endforeach
            <tr>
                <td align="right">
                    <table width="50%">
                      <tr>
                        <td colspan="1" style="font-size: 13px;line-height: 18px;padding: 0 15px;">Total (excl)</td>
                        <td align="right" colspan="1" style="font-size: 13px;line-height: 18px;padding: 0 15px;">R {{(number_format($order->total-($order->total*0.15), 2, ".", ","))}}</td>
                      <tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <table width="50%">
                      <tr>
                        <td colspan="1" style="font-size: 13px;line-height: 18px;padding: 0 15px;">VAT</td>
                        <td align="right" colspan="1" style="font-size: 13px;line-height: 18px;padding: 0 15px;">R {{(number_format($order->total*0.15, 2, ".", ","))}}</td>
                      <tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="right" style="padding-bottom: 25px;">
                    <table width="50%">
                      <tr>
                        <td colspan="1" style="font-size: 13px;line-height: 18px;padding: 0 15px;font-weight: 600;">Total (incl)</td>
                        <td align="right" colspan="1" style="font-size: 13px;line-height: 18px;padding: 0 15px;font-weight: 600;">R {{(number_format($order->total, 2, ".", ","))}}</td>
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
            <tr>
              <td align="center" style="color: #255a9e;font-size: 14px;padding-bottom: 20px;">
                  Decofurn Furniture<br>
                  National Hotline: 087 740 1800
              </td>
            </tr>
        </table>
    </body>
</html>