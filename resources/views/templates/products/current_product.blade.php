
@if($product->product != null)
<div class="col-12 col-md-6 profile-product-block">
  <div>
    <div class="row">
      @php
        $variant = \App\Models\ProductVariant::where('product_id', $product->product_id)
                    ->where('filters', $product->filters)
                    ->first();

        if ( $variant != null ) {
          if ( $variant->variant != null || sizeof( $variant->variant->displayGalleries ) ) {
            $image = $variant->variant->product_image;
            $thumbnail = $variant->variant->product_thumbnail;
            $product_title = $variant->variant->title;

          } else {
            $image = $product->product->product_image;
            $thumbnail = $variant->product->product_thumbnail;
            $product_title = $cart_prod->product->title;
          }

        } else {
          $image = $product->product->product_image;
          $thumbnail = $product->product->product_thumbnail;
          $product_title = $product->product->title;
        }
      @endphp
      <div class="col-12 col-md-5">
        <img src="{{url('/').'/'.$thumbnail}}" class="img-fluid" />
        {{--<img class="img-fluid" src="/{{$product->product->product_thumbnail}}" />--}}
      </div>
      
      <div class="col-12 col-md-7">

        <h3>{{$product->product->title}}</h3>

        <p><span>Code:</span>{{$product->product->code}}</p>
        <p><span>Unit Price:</span>R {{number_format($product->price, 2, ".", "")}}</p>
        <p><span>QTY:</span> {{ $product->quantity }}</p>

        @if($product->components != null && $product->components != 'null')
          @php
            $components = json_decode($product->components);
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
                echo '<h4><span>'.optional( $group )->title.':</span> '.optional( $option )->title.'</h4>';
              }
            }
          @endphp

        @elseif($product->filters != 'null' && $product->filters != "" && $product->filters != null)
          @php $fils = json_decode($product->filters);
            foreach($fils as $key => $value){
              $group = App\Models\FilterOptionGroup::find($key);
              $option = \App\Models\FilterOption::find($value);
              echo '<p><span>'.optional( $group )->title.':</span> '.optional( $option )->title.'</p>';
          } @endphp
        @endif

      </div>
    </div>
  </div>
</div>
@endif