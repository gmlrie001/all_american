@if(isset($colCount))
    <div class="col-6 col-sm-4 col-xl-{{$colCount}} product-listing-block">
@else
    <div class="col-6 col-md-6 col-lg-3 product-listing-block">
@endif
    <div class="col">
        <div class="row">
            <div class="col-12 p-0">
                <a href="/product/{{$product->url_title}}">
                    <img class="img-fluid" src="/{{$product->product_thumbnail}}" />
                </a>
                @if($user == null)
                    <a href="/my-account" class="wishlist-modal-button-nologin fa fa-heart-o"></a>
                @else
                    <a href="#" class="wishlist-modal-button fa fa-heart-o" data-id="{{$product->id}}"></a>
                @endif
                <a href="/product/{{$product->url_title}}" class="view-product fa fa-eye"></a>
                @if($product->special_price != null && $product->special_price != 0 && $product->special_price < $product->price)
                    <span class="product-tag">Sale</span>
                @endif
                <a href="/product/{{$product->url_title}}" class="col-12 float-left mt-3">
                    <h2>{{$product->title}}</h2>
                    @if(sizeof($product->displayProducts) && $product->send_products_separately == 'yes')
                        @php
                            $combined_price = 0;
                            $combined_specail_price = 0;

                            $in_variants_array = [];
                            foreach($product->scenarios as $scenario){
                                $variants = array_keys(json_decode($scenario->filters, true));
                                $in_variants_array = array_merge($in_variants_array, $variants);
                            }

                            foreach($product->displayProducts as $prodprod){
                                if(sizeof($prodprod->related->variants)){
                                    $tempPrice = 0;
                                    $tempSpecialPrice = 0;
                                    foreach($prodprod->related->variants as $varprod){
                                        if(in_array($varprod->variant->id, $in_variants_array)){
                                            if($tempPrice == 0 || ($tempPrice > $varprod->variant->price && $varprod->variant->price != 0)){
                                                $tempPrice = $varprod->variant->price;
                                            }
                                            if($tempSpecialPrice == 0 || ($tempSpecialPrice > $varprod->variant->special_price)){
                                                $tempSpecialPrice = $varprod->variant->special_price;
                                            }
                                        }
                                    }
                                    $combined_price += $tempPrice;
                                    $combined_specail_price += $tempSpecialPrice;
                                }else{
                                    $combined_price += $prodprod->related->price;
                                    $combined_specail_price += $prodprod->related->special_price;
                                }
                            }
                        @endphp
                        @if($combined_specail_price != null && $combined_specail_price != 0 && $combined_specail_price < $combined_price)
                            <h3>R {{number_format($combined_specail_price, 2, "", "")}}<span>R {{number_format($combined_price, 2, "", "")}}</span><i>-{{ceil(100-($combined_specail_price/$combined_price*100))}}%</i></h3>
                        @else
                            <h3>R {{number_format($combined_price, 2, "", "")}}</h3>
                        @endif
                    @else
                        @if($product->special_price != null && $product->special_price != 0 && $product->special_price < $product->price)
                            <h3>R {{number_format($product->special_price, 2, "", "")}}<span>R {{number_format($product->price, 2, "", "")}}</span><i>-{{ceil(100-($product->special_price/$product->price*100))}}%</i></h3>
                        @else
                            <h3>R {{number_format($product->price, 2, "", "")}}</h3>
                        @endif
                    @endif
                </a>
            </div>
        </div>
        <div class="row">
            <a href="/cart/get/modal/{{$product->id}}" class="col-12 add-to-cart-modal-button" data-toggle="modal" data-target="#addToCart">Add to cart</a>
        </div>
    </div>
</div>