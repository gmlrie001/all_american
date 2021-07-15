@extends('templates.emails.layouts.index')
@section('content')

  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
     You have received return request from {{$return->name}}. The request is as follows:
    </td>
  </tr>

  <tr>
    <td style="font-size: 18px;line-height: 25px;color: #000000;padding-bottom: 15px;font-weight: 600;">
      Order Number: {{'#'.$return->product->basket_id}}
    </td>
  </tr>
  <tr>
    <td>
      <table width="100%">
        <tr>
          <td width="25%" style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
            <strong>Full Name:</strong>
          </td>
          <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">{{$return->name}}</td>
        </tr>
        <tr>
          <td width="25%" style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
            <strong>Email Address:</strong>
          </td>
          <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">{{$return->email}}</td>
        </tr>
        <tr>
          <td width="25%" style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
            <strong>Contact Number:</strong>
          </td>
          <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">{{$return->contact}}</td>
        </tr>
        <tr>
          <td width="25%" style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
            <strong>Reason:</strong>
          </td>
          <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">{{$return->reason}}</td>
        </tr>
        <tr>
          <td width="25%" valign="top" style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
            <strong>Comments:</strong>
          </td>
          <td style="font-size: 14px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">{{$return->comments}}</td>
        </tr>
        <tr>
          <table width="100%">
            @php
                $imageArray = collect(array_filter(explode(",", $return->images)));
            @endphp
            @foreach ($imageArray->chunk(3) as $imges)
            <tr>
            @foreach ($imges as $imge)
              @if($imge != "")
                <td>
                  <img src="{{ url("/").'/'.$imge }}" width="150" />
                </td>
                @endif
            @endforeach
              </tr>
            @endforeach
          </table>
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
          <tr>
            <td width="60%" style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">
              <table>
                <tr>
                  @php
                    $variant = \App\Models\ProductVariant::where('product_id', $return->product->product_id)->where('filters', $return->product->filters)->first();
                  
                    if($variant != null){
                        if($variant->variant != null && sizeof($variant->variant->displayGalleries)){
                            $image = $variant->variant->displayGalleries[0]->gallery_image;
                        }else{
                            $image = $return->product->product->product_image;
                        }
                    }else{
                        $image = $return->product->product->product_image;
                    }
                  
                    if($image == "" || $image == null){
                      $image = $logo;
                    }
                  @endphp
                  <td><img src="{{ url("/").'/'.$image }}" width="150" /></td>
                  <td style="padding-left: 20px;">
                    {{$return->product->product->title}} ({{$return->product->code}})
                    @if($return->product->components != null && $return->product->components != 'null')
                        <?php
                            $components = json_decode($return->product->components);
                            foreach($components as $key => $component){
                                $prod = \App\Models\Product::find($component);
                                $productVariant = \App\Models\ProductVariant::where('variant_id', $prod->id)->first();
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
            <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">{{$return->product->quantity}}</td>
            <td style="border: 1px solid #1f1f1f;padding: 20px;color: #1f1f1f;">R {{(number_format($return->product->price, 0, ".", ","))}}</td>
          </tr>
      </table>
    </td>
  </tr>
@endsection