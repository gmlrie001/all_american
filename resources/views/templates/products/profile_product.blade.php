@if($product->product != null)
    <div class="col-12 col-md-6 profile-product-block">
        <div>
            <div class="row">
                <a class="col-12 col-md-5" href="/product/{{$product->product->url_title}}/">
                    <img class="img-fluid" src="/{{$product->product->product_thumbnail}}" />
                </a>
                <div class="col-12 col-md-7">
                    <h3>{{$product->product->title}}</h3>
                    <p><span>Code:</span>{{$product->code}}</p>
                    <p><span>QTY:</span>{{$product->quantity}}</p>
                    <p><span>Unit Price:</span>R {{number_format($product->product->price, 2, "", "")}}</p>
                    @if($product->components != null && $product->components != 'null')
                        <?php
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
                                        echo '<h4><span>'.$group->title.':</span> '.$option->title.'</h4>';
                                }
                            }
                        ?>
                    @elseif($product->filters != 'null' && $product->filters != "" && $product->filters != null)
                        <?php $fils = json_decode($product->filters);
                        foreach($fils as $key => $value){
                                $group = App\Models\FilterOptionGroup::find($key);
                                $option = \App\Models\FilterOption::find($value);
            
                                echo '<p><span>'.$group->title.':</span> '.$option->title.'</p>';
                        } ?>
                    @endif
                    <a href="/cart/get/modal/{{$product->product->id}}/{{$product->id}}" class="add-to-cart-modal-button" data-toggle="modal" data-target="#addToCart">Add to cart</a>
                    <a href="/wishlist/delete/{{$product->id}}" class="delete-wishlist">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endif