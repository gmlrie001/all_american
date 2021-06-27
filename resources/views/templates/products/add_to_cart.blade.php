<div class="row product-view">
    @php
        if(isset($wishlist_product_id) && $wishlist_product_id != 0){
            $wishlist_product = \App\Models\WishlistProduct::find($wishlist_product_id);
            $wishlist_filters = $wishlist_product->filters;
            $wishlist_filters = json_decode($wishlist_filters, true);
        }else{
            $wishlist_product = null;
            $wishlist_filters = null;
        }
    @endphp
    {!! Form::open(['url' => '/cart/add/'.$product->id, 'class' => 'col-12', 'method' => 'GET']) !!}
        <h2>
            <span class="product-view-label">Product:</span>
            {{$product->title}}
            @if(!isset($is_modal))
                <a href="#" class="share-open float-right">
                    <img class="img-fluid" src="/assets/images/template/share-grey.svg" />
                </a>
            @endif
        </h2>
        @if(isset($is_gift) && $is_gift)
            <h3><span class="product-view-label">Price:</span><span>was R {{$product->price}}</span> now FREE</h3>
        @else
            @if(sizeof($product->displayProducts) && $product->send_products_separately == 'yes')
                @php
                    $combined_price = 0;
                    $combined_special_price = 0;

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
                                    if($tempSpecialPrice == 0 || ($tempSpecialPrice > $varprod->variant->price)){
                                        $tempSpecialPrice = $varprod->variant->special_price;
                                    }
                                }
                            }
                            $combined_price += $tempPrice;
                            $combined_special_price += $tempSpecialPrice;
                        }else{
                            $combined_price += $prodprod->related->price;
                            $combined_special_price += $prodprod->related->special_price;
                        }
                    }
                @endphp
                @if($combined_special_price != null && $combined_special_price != 0 && $combined_special_price < $combined_price)
                    <h3 class="update-price-on-change"><span class="product-view-label">Price:</span>R {{number_format($combined_special_price, 2, "", "")}}<span>R{{number_format($combined_price, 2, "", "")}}</span><i>-{{ceil(100-($combined_special_price/$combined_price*100))}}%</i></h3>
                    @php
                        $sale_price = $combined_special_price;
                    @endphp
                @else
                    <h3 class="update-price-on-change"><span class="product-view-label">Price:</span>R {{number_format($combined_price, 2, "", "")}}</h3>
                    @php
                        $sale_price = $combined_price;
                    @endphp
                @endif
            @else
                @if($product->special_price != null && $product->special_price != 0 && $product->special_price < $product->price)
                    <h3 class="update-price-on-change"><span class="product-view-label">Price:</span>R {{number_format($product->special_price, 2, "", "")}}<span>R{{number_format($product->price, 2, "", "")}}</span><i>-{{ceil(100-($product->special_price/$product->price*100))}}%</i></h3>
                    @php
                        $sale_price = $product->special_price;
                    @endphp
                @else
                    <h3 class="update-price-on-change"><span class="product-view-label">Price:</span>R {{number_format($product->price, 2, "", "")}}</h3>
                    @php
                        $sale_price = $product->price;
                    @endphp
                @endif
            @endif
            @php
                $repo_val = 6.5;
                $intreast_rate = 14;
                $interest = $repo_val + $intreast_rate;
                $months = 12;
                $Monzaprc = floatval($sale_price);
                $Monzainterest_pm = $interest/100/$months;
                $Monzainterest_power = pow((1+$Monzainterest_pm), $months);
                $MonzanewAmount = ((($Monzainterest_pm*-$Monzaprc)*$Monzainterest_power)/(1-$Monzainterest_power));
            @endphp
            <div class="form-group">
                <label>Credit:</label>
                <span>R {{number_format($MonzanewAmount, 2, ".", "")}} per month</span>
            </div>
        @endif
        @if(isset($is_gift) && $is_gift)
            <input type="hidden" name="gift_price" value="0" />
            <div class="form-group">
                <label>Quantity:</label>
                <input name="quantity" type="text" value="1" readonly="" />
            </div>
        @else
            @if($wishlist_product != null)
                <div class="form-group">
                    <label>Quantity:</label>
                    <div class="input-append spinner" data-trigger="spinner">
                        <input type="text" value="{{$wishlist_product->quantity}}" name="quantity" data-rule="quantity">
                        <div class="add-on">
                            <a href="javascript:;" class="spin-up" data-spin="up">
                                <i class="fa fa-caret-up"></i>
                            </a>
                            <a href="javascript:;" class="spin-down" data-spin="down">
                                <i class="fa fa-caret-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <script>
                    $('[data-trigger="spinner"]').spinner();
                </script>
            @else
                <div class="form-group">
                    <label>Quantity:</label>
                    <div class="input-append spinner" data-trigger="spinner">
                        <input type="text" value="1" name="quantity" data-rule="quantity">
                        <div class="add-on">
                            <a href="javascript:;" class="spin-up" data-spin="up">
                                <i class="fa fa-caret-up"></i>
                            </a>
                            <a href="javascript:;" class="spin-down" data-spin="down">
                                <i class="fa fa-caret-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <script>
                    $('[data-trigger="spinner"]').spinner();
                </script>
            @endif
        @endif
        @php
            $variants = \App\Models\ProductVariant::where('product_id', $product->id)->get();
            $filtersList = [];
            foreach($variants as $key => $variant){
                $filtersList[$key] = json_decode($variant->filters);
            }
            $filteredList = [];
            foreach($filtersList as $filList){
                foreach($filList as $ky => $val){
                    if(!isset($filteredList[$ky]) || !is_array($filteredList[$ky])){
                        $filteredList[$ky] = [];
                    }
                    array_push($filteredList[$ky],$val);
                }
            }

            foreach($filteredList as $key => $filList){
                $filteredList[$key] = array_unique($filList);
            }
            

            $groupIDs = array_keys($filteredList);

            $groups = \App\Models\FilterOptionGroup::whereIn('id', $groupIDs)->get();
        @endphp
        @foreach($groups as $group)
            @if(sizeof($group->optionsImagesFilters($filteredList[$group->id])->get()) > 1)
                <div class="form-group">
                    <label>{{$group->title}}</label>
                    <div class="filter-image-block">
                        @foreach($group->optionsImagesFilters($filteredList[$group->id])->get() as $option)
                            <label class="filter-select-label">
                                @if($wishlist_filters != null && $wishlist_filters[$group->id] == $option->id)
                                    <input data-parsley-error-message="Please select one of these options" data-parsley-errors-container="#error_block_{{$group->id}}" @if($wishlist_filters != null) disabled="" @endif checked="" value="{{$option->id}}" type="radio" name="filter_group_{{$group->id}}[]" required="" class="filter-select" data-parsley-error-message='Information required' />
                                @else
                                    <input data-parsley-error-message="Please select one of these options" data-parsley-errors-container="#error_block_{{$group->id}}" @if($wishlist_filters != null) disabled="" @endif value="{{$option->id}}" type="radio" name="filter_group_{{$group->id}}[]" required="" class="filter-select" data-parsley-error-message='Information required' />
                                @endif
                                <img class="img-fluid" src="/{{$option->swatch_image}}" />
                                <span>{{$option->title}}</span>
                            </label>
                        @endforeach
                        <div id="error_block_{{$group->id}}"></div>
                    </div>
                </div>
            @elseif(sizeof($group->displayOptionsFilters($filteredList[$group->id])->get()) > 1)
                <div class="form-group">
                    <label>{{$group->title}}</label>
                    <select data-parsley-error-message="Please select one of these options" data-parsley-errors-container="#error_block_{{$group->id}}" @if($wishlist_filters != null) readonly="" @endif name="filter_group_{{$group->id}}[]" required="" class="filter-select" data-parsley-error-message='Information required'>
                        <option value="">Select {{$group->title}}</option>
                        @foreach($group->displayOptionsFilters($filteredList[$group->id])->get() as $option)
                            @if($wishlist_filters != null && $wishlist_filters[$group->id] == $option->id)
                                <option value="{{$option->id}}" selected="">{{$option->title}}</option>
                            @else
                                <option value="{{$option->id}}">{{$option->title}}</option>
                            @endif
                        @endforeach
                    </select>
                    <div id="error_block_{{$group->id}}"></div>
                </div>
            @elseif(sizeof($group->displayOptionsFilters($filteredList[$group->id])->get()) > 0)
                <input type="hidden" class="form-control filter-select" name="filter_group_{{$group->id}}[]" value="{{$group->displayOptionsFilters($filteredList[$group->id])->first()->id}}" />
            @endif
        @endforeach
        @if(sizeof($product->displayProducts))
            @php
                $linkedOptions = [];

                $scens = $product->scenarios->pluck('filters');

                $availableVariants = [];
                foreach($scens as $scen){
                    $availableVariants[] = array_keys(json_decode($scen, true));
                }
                $availableVariants = array_unique(\Illuminate\Support\Arr::flatten($availableVariants));

                $variantIDS = $product->displayProducts->pluck('related_id');

                $variants = \App\Models\ProductVariant::whereIn('product_id', $variantIDS)->whereIn('variant_id', $availableVariants)->get();

                $optionSets = $variants->pluck('filters', 'variant_id');

                foreach($optionSets as $key => $value){
                    $decoded_filters = array_values(json_decode($value, true));
                    
                    $linkedOptions[$key] = $decoded_filters;
                }

                $scenarios = $product->scenarios->pluck('filters');
                
                $scenFilters = [];
                foreach($scenarios as $scenario){
                    $scenFilters[] = array_keys(json_decode($scenario, true));
                }

                $scenSets = array_values($scenFilters);

                $linkedKeys = array_keys($linkedOptions);

                $dataSets = [];

                foreach($scenSets as $ky => $scenSet){
                    foreach($scenSet as $set){
                        if(in_array($set, $linkedKeys)){
                            $dataSets[$ky][] = $linkedOptions[$set];
                        }
                    }
                }

                foreach($dataSets as $key => $value){
                    $dataSets[$key] = \Illuminate\Support\Arr::flatten($value);
                }
            @endphp
            @foreach($product->displayProducts as $prd)
                @if($prd->related != null)
                    <div class="composite-product-block">
                        <h3 class="blue-title"><span class="product-view-label">Product:</span>{{$prd->related->title}}</h3>
                        @php
                            $scens = $product->scenarios->pluck('filters');

                            $availableVariants = [];
                            foreach($scens as $scen){
                                $availableVariants[] = array_keys(json_decode($scen, true));
                            }
                            $availableVariants = array_unique(\Illuminate\Support\Arr::flatten($availableVariants));

                            $variants = \App\Models\ProductVariant::where('product_id', $prd->related->id)->whereIn('variant_id', $availableVariants)->get();

                            $optionSets = $variants->pluck('filters', 'variant_id');

                            foreach($optionSets as $key => $value){
                                $decoded_filters = array_values(json_decode($value, true));
                                
                                $linkedOptions[$key] = $decoded_filters;
                            }

                            $filtersList = [];
                            foreach($variants as $key => $variant){
                                $filtersList[$key] = json_decode($variant->filters);
                            }

                            $filteredList = [];
                            foreach($filtersList as $filList){
                                foreach($filList as $ky => $val){
                                    if(!isset($filteredList[$ky]) || !is_array($filteredList[$ky])){
                                        $filteredList[$ky] = [];
                                    }
                                    array_push($filteredList[$ky],$val);
                                }
                            }

                            foreach($filteredList as $key => $filList){
                                $filteredList[$key] = array_unique($filList);
                            }
                            

                            $groupIDs = array_keys($filteredList);

                            $groups = \App\Models\FilterOptionGroup::whereIn('id', $groupIDs)->get();
                        @endphp
                        @foreach($groups as $group)
                            @if(sizeof($group->optionsImagesFilters($filteredList[$group->id])->get()) > 1)
                                <div class="form-group">
                                    <label>{{$group->title}}</label>
                                    <div class="filter-image-block">
                                        @foreach($group->optionsImagesFilters($filteredList[$group->id])->get() as $option)
                                            @php
                                                $value = "";
                                                foreach($dataSets as $ky => $ds){
                                                    if(in_array($option->id, $ds)){
                                                        $value .= $ky.",";
                                                    }
                                                }
                                            @endphp
                                            <label class="filter-select-label">
                                                @if($wishlist_filters != null && $wishlist_filters[$group->id] == $option->id)
                                                    <input data-compsets="{{$value}}" data-parsley-error-message="Please select one of these options" data-parsley-errors-container="#error_block_{{$group->id}}" @if($wishlist_filters != null) disabled="" @endif checked="" value="{{$option->id}}" type="radio" name="filter_group_{{$group->id}}[]" required="" class="filter-select" data-parsley-error-message='Information required' />
                                                @else
                                                    <input data-compsets="{{$value}}" data-parsley-error-message="Please select one of these options" data-parsley-errors-container="#error_block_{{$group->id}}" @if($wishlist_filters != null) disabled="" @endif value="{{$option->id}}" type="radio" name="filter_group_{{$group->id}}[]" required="" class="filter-select" data-parsley-error-message='Information required' />
                                                @endif
                                                <img class="img-fluid" src="/{{$option->swatch_image}}" />
                                                <span>{{$option->title}}</span>
                                            </label>
                                        @endforeach
                                        <div id="error_block_{{$group->id}}"></div>
                                    </div>
                                </div>
                            @elseif(sizeof($group->displayOptionsFilters($filteredList[$group->id])->get()) > 1)
                                <div class="form-group">
                                    <label>{{$group->title}}</label>
                                    <select data-parsley-error-message="Please select one of these options" data-parsley-errors-container="#error_block_{{$group->id}}" @if($wishlist_filters != null) readonly="" @endif name="filter_group_{{$group->id}}[]" required="" class="filter-select" data-parsley-error-message='Information required'>
                                        <option value="">Select {{$group->title}}</option>
                                        @foreach($group->displayOptionsFilters($filteredList[$group->id])->get() as $option)
                                            @php
                                                $value = "";
                                                foreach($dataSets as $ky => $ds){
                                                    if(in_array($option->id, $ds)){
                                                        $value .= $ky.",";
                                                    }
                                                }
                                            @endphp
                                            @if($wishlist_filters != null && $wishlist_filters[$group->id] == $option->id)
                                                <option data-compsets="{{$value}}" value="{{$option->id}}" selected="">{{$option->title}}</option>
                                            @else
                                                <option data-compsets="{{$value}}" value="{{$option->id}}">{{$option->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div id="error_block_{{$group->id}}"></div>
                                </div>
                            @elseif(sizeof($group->displayOptionsFilters($filteredList[$group->id])->get()) > 0)
                                <input type="hidden" class="form-control" name="filter_group_{{$group->id}}[]" value="{{$group->displayOptionsFilters($filteredList[$group->id])->first()->id}}" />
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
            <a href="{{url()->current()}}" style="    margin-bottom: 10px;
                display: block;
                font-size: 12px;
                color: #0055a5;
                text-decoration: none;">clear selected options</a>
        @endif
        
        @if(!isset($is_modal))
            {!! $product->description !!}
        @endif
        <script>
                function hasCommonElement(arr1,arr2)
                {
                   var bExists = false;
                   $.each(arr2, function(index, value){
                
                     if($.inArray(value,arr1)!=-1){
                        console.log(value);
                        bExists = true;
                     }
                
                     if(bExists){
                         return false;  //break
                     }
                   });
                   return bExists;
                }
            $(".composite-product-block .filter-select").change(function(){
                if($(this).is('select')){
                    sets = $(this).find(':selected').data('compsets').split(',').filter(function (el) {
                        return el != null && el != "";
                    });
                }else{
                    sets = $(this).data('compsets').split(',').filter(function (el) {
                        return el != null && el != "";
                    });
                }
                
                $(".composite-product-block select.filter-select option").each(function(){
                    if($(this).val() != ""){
                        comparesets = $(this).data('compsets').split(',').filter(function (el) {
                            return el != null && el != "";
                        });
                        if(hasCommonElement(comparesets,sets)){
                            $(this).removeAttr('disabled');
                        }else{
                            $(this).attr('disabled', 'disabled');
                        }
                    }
                });
                $(".composite-product-block input.filter-select").each(function(){
                    comparesets = $(this).data('compsets').split(',').filter(function (el) {
                        return el != null && el != "";
                    });
                    if(hasCommonElement(comparesets,sets)){
                        $(this).removeAttr('disabled');
                    }else{
                        $(this).attr('disabled', 'disabled');
                    }
                });

            });
            $(".filter-select").change(function(){
                $.ajax({
                    type: 'get',
                    url: "/get/stock/{{$product->id}}?"+$(".product-view form").serialize(),
                    data:{
                    }, 
                    async: false,
                    dataType: 'json'
                    
                }).done(function(data){
                    console.log(data);
                    if(data.variant_stock != "false"){
                        if(data.variant_stock > 0){
                            $(".sku-notify").fadeOut(250);
                            $(".sku-add").fadeIn(250);
                        }else{
                            $(".notify-input").data('prod_id', data.variant_id);
                            $(".sku-notify").fadeIn(250);
                            $(".sku-add").fadeOut(250);
                        }
                    }
                    $(".update-price-on-change").html(data.new_price);
                }).fail(function(error){
                    //console.log(error)
                });
            });
        </script>
        @if($product->ignore_stock == 'yes' || ($product->quantity != null && $product->quantity > $site_settings->stock_buffer))
            <div class="sku-notify" style="display: none;">
                <h3 class="red">Product out of stock</h3>
                <p>Want to be notified when new stock arrives?</p>
                <div class="float-left w-100 mb-5 notify-calc">
                    <input class="form-control notify-input" placeholder="Email address" data-prod_id="{{$product->id}}" />
                    <a href="#" class="notify-submit">Notify Me</a>
                </div>
                <div class="float-left w-100 mb-5 notify-success"><strong>Thank you, we will notify you once this product becomes available.</strong></div>
                @if(!isset($is_modal))
                    @if($user == null)
                        <a class="add-to-wishlist-nologin" href="/my-account">
                            <i class="fa fa-heart-o"></i>
                            ADD TO WISHLIST
                        </a>
                    @else
                        <a class="add-to-wishlist check-variants" href="#">
                            <i class="fa fa-heart-o"></i>
                            ADD TO WISHLIST
                            <span>Please select a product option before adding it to your wishlist</span>
                        </a>
                    @endif
                @endif
            </div>
            <div class="sku-add">
                @if(!isset($is_modal))
                    @if(isset($postal_display))
                    <div class="float-left w-100 mb-5 delivery-success" style="display: block !important;">{!!$postal_display!!}</div>
                    @else
                        <div class="float-left w-100 mb-5 delivery-calc">
                            <input class="form-control delivery-input" placeholder="Postal code" />
                            <a href="#" class="delivery-submit">Get shipping estimate</a>
                        </div>
                        <div class="float-left w-100 mb-5 delivery-success"></div>
                        <div class="float-left w-100 mb-5 delivery-error"></div>
                    @endif
                @endif
                @if($product->assembly_cost != null && $product->assembly_cost > 0)
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css" />
                    <label class="form-group assemble-label" style="
                    position: relative;
                    padding-right: 60px;">
                        <input class="icheck" type="checkbox" name="assemble_item" value="{{$product->assembly_cost}}">
                        Assemble this item for just R {{number_format($product->assembly_cost, 2, "", "")}}?
                    </label>
                    <script>
                            $('input.icheck').iCheck({
                                checkboxClass: 'icheckbox_square-blue',
                                radioClass: 'iradio_square-blue',
                            });
                    </script>
                @endif
                @if(isset($is_modal) && $is_modal)
                    <button type="submit" class="col-12">
                        <i class="fa fa-shopping-cart"></i>
                        ADD TO CART
                    </button>
                @else
                    <button type="submit">
                        <i class="fa fa-shopping-cart"></i>
                        ADD TO CART
                    </button>
                    @if($user == null)
                        <a class="add-to-wishlist-nologin" href="/my-account">
                            <i class="fa fa-heart-o"></i>
                            ADD TO WISHLIST
                        </a>
                    @else
                        <a class="add-to-wishlist check-variants" href="#">
                            <i class="fa fa-heart-o"></i>
                            ADD TO WISHLIST
                            <span>Please select a product option before adding it to your wishlist</span>
                        </a>
                    @endif
                @endif
            </div>
        @else
            <h3 class="red">Product out of stock</h3>
            <p>Want to be notified when new stock arrives?</p>
            <div class="float-left w-100 mb-5 notify-calc">
                <input class="form-control notify-input" placeholder="Email address" data-prod_id="{{$product->id}}" />
                <a href="#" class="notify-submit">Notify Me</a>
            </div>
            <div class="float-left w-100 mb-5 notify-success"><strong>Thank you, we will notify you once this product becomes available.</strong></div>
            @if(!isset($is_modal))
                @if($user == null)
                    <a class="add-to-wishlist-nologin" href="/my-account">
                        <i class="fa fa-heart-o"></i>
                        ADD TO WISHLIST
                    </a>
                @else
                    <a class="add-to-wishlist check-variants" href="#">
                        <i class="fa fa-heart-o"></i>
                        ADD TO WISHLIST
                        <span>Please select a product option before adding it to your wishlist</span>
                    </a>
                @endif
            @endif
        @endif
    {!! Form::close() !!}
</div>