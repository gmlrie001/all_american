<a href="/product/{{$product->url_title}}" class="col-12 col-lg-4 col-xl-4">
    @if($product->special_price != null && $product->special_price != 0)
        <span class="productTag" style="background-color:#1976d2; color:#ffffff;">
            on sale
        </span>
    @endif
    <div class="col-12 block">
        @if( $product->product_thumbnail )
            @php list( , , , $attrWidthAndHeight ) = getimagesize( public_path( ltrim( $product->product_thumbnail, '/' ) ) ); @endphp
            <img class="img-fluid" {!! $attrWidthAndHeight !!} src="{{ url( ltrim( $product->product_thumbnail, '/' ) ) }}" @isset( $product->title ) alt="{{ $product->title }}" @endisset>
        @else
            @include(
                'templates.placeholders.simple_image_placeholders',
                [
                'class' => '', 'width' => 800,'height' => 600, 'text' => '+',
                'use_vault_logo' => true, 'use_placehold_it' => true
                ]
                )
        @endif
        <div class="row">
            <div class="col-12 title">
                <h1>{{$product->title}}</h1>
            </div>
        </div>
        <div class="row info">
            <div class="col-12 col-lg-8 price">
                @php
                    $min = 0;
                    $minSpecial = 0;
                    $max = 0;
                    $maxSpecial = 0;

                    foreach($product->variants as $variant){
                        if($variant->variant != null){
                            if($min == 0 || $min > $variant->variant->price){
                                $min = $variant->variant->price;
                            }
                            if($minSpecial == 0 || $minSpecial > $variant->variant->special_price){
                                $minSpecial = $variant->variant->special_price;
                            }
                            if($max == 0 || $max < $variant->variant->price){
                                $max = $variant->variant->price;
                            }
                            if($maxSpecial == 0 || $maxSpecial < $variant->variant->special_price){
                                $maxSpecial = $variant->variant->special_price;
                            }
                        }
                    }
                @endphp
                @if(($min != 0 || $minSpecial != 0) && ($max != 0 || $maxSpecial != 0))
                    <h2>R
                        @if($min > $minSpecial && $minSpecial != 0)
                            {{number_format($minSpecial, 0, "", "")}}
                        @else
                            {{number_format($min, 0, "", "")}}
                        @endif
                        @if($max != $min && $maxSpecial != $min)
                            - R
                            @if($max > $maxSpecial)
                                {{number_format($max, 0, "", "")}}
                            @else
                                {{number_format($maxSpecial, 0, "", "")}}
                            @endif
                        @endif
                    </h2>
                @else
                    @if($product->special_price != null && $product->special_price != 0 && $product->special_price < $product->price)
                        <h2>R {{number_format($product->special_price, 2, ".", ",")}}</h2>
                    @else
                        <h2>R {{number_format($product->price, 2, ".", ",")}}</h2>
                    @endif
                @endif
            </div>
            @if($product->variants->count() > 0)
                <div class="col-12 col-lg-4 size">
                    @if( $product->variants->count() == 1 )
                        <h5>{{$product->variants->count()}} Size</h5>
                    @elseif( $product->variants->count() > 1 )
                        <h5>{{$product->variants->count()}} Sizes</h5>
                    @endif
                </div>
            @endif
        </div>
    </div>
</a>
