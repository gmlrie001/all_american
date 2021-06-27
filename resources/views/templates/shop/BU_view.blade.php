@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
<div class="container-fluid bgGrey pageHeader">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col breadCrumb">
                    @php
                        function getCategoryLink($category, $linkArray = []){
                            if($category->parent == null){
                                array_push($linkArray, '<a class="d-inline" href="/shop/'.$category->url_title.'">'.$category->title.'</a>');
                            }else{
                                array_push($linkArray, '<a class="d-inline" href="/shop/'.$category->parent->url_title.'/'.$category->url_title.'">'.$category->title.'</a>');
                                $linkArray = getCategoryLink($category->parent, $linkArray);
                            }
                            return $linkArray;
                        }
			if( NULL != $product ):
                            $linkArray = getCategoryLink($product->category);
                            $linkArray = array_reverse($linkArray);
                            foreach($linkArray as $linkArr){
                               echo($linkArr);
                           }
			endif;
                    @endphp
                </div>
                <a href="#" class="sharing share-open"><i class="fa fa-share-alt"></i></a>
            </div>
        </div>
    </div>
    
    @isset( $product )
    <div class="container pb-lg-4 pb-5 mb-lg-4 mb-5">
        <div class="row productViewWrap">
            <section class="col-12 col-lg-5 col-xl-7 image">
                <div class="main borderWrap">
                    <div>
                        <img class="img-fluid" src="/{{$product->product_image}}" alt="{{$product->title}}" title="{{$product->title}}">
                    </div>
                    @foreach($product->displayGalleries as $gal)
                        <div>
                            <img class="img-fluid" src="/{{$gal->gallery_image}}" alt="{{$gal->title}}" title="{{$gal->title}}">
                        </div>
                    @endforeach
                </div>
		@if( count( $product->displayGalleries ) === 1 )
                <div class="thumbNail">
		@else
		<div class="thumbNail" style="right:0;transform:translate3d(-65%,0,0);">
		@endif
                    <div>
                        <img class="img-fluid" src="/{{$product->product_image}}" alt="{{$product->title}}" title="{{$product->title}}">
                    </div>
                    @foreach($product->displayGalleries as $gal)
                        <div>
                            <img class="img-fluid" src="/{{$gal->gallery_image}}" alt="{{$gal->title}}" title="{{$gal->title}}">
                        </div>
                    @endforeach
                </div>
            </section>
            <section class="col-12 col-lg-7 col-xl-5 details">
                {!! Form::open(['url' => '/cart/add/'.$product->id, 'method' => 'GET']) !!}
                    <div class="title">
                        <h1>{{$product->title}}</h1>
                    </div>
                    <div class="code">
                        <h5>{{$product->code}}</h5>
                    </div>
                    <div class="amounts">
                        <div class="price">
                            @php
                                $min = 0;
                                $minSpecial = 0;
                                $max = 0;
                                $maxSpecial = 0;

                                foreach($product->variants as $variant){
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
                            @endphp
                            @if(($min != 0 || $minSpecial != 0) && ($max != 0 || $maxSpecial != 0))
                                <h2>R 
                                    @if($min > $minSpecial && $minSpecial != 0)
                                        {{number_format($minSpecial, 2, "", "")}}
                                    @else
                                        {{number_format($min, 2, "", "")}}
                                    @endif
                                    @if($max != $min && $maxSpecial != $min)
                                        - R 
                                        @if($max > $maxSpecial)
                                            {{number_format($max, 2, "", "")}}
                                        @else
                                            {{number_format($maxSpecial, 2, "", "")}}
                                        @endif
                                    @endif
                                </h2>
                            @else
                                @if($product->special_price != null && $product->special_price != 0 && $product->special_price < $product->price)
                                    <h2>R {{number_format($product->special_price, 2, ".", " ")}}</h2>
                                @else
                                    <h2>R {{number_format($product->price, 2, ".", " ")}}</h2>
                                @endif
                            @endif
                        </div>
                    </div>
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
                            <div class="colourContain borderTop productPadding">
                                <div class="title">
                                    <h4>{{$group->title}}</h4>
                                </div>
                                <fieldset id="colourFilterContain">
                                    <div class="colourFilterContain">
                                    @php $k = count( $group->optionsImagesFilters($filteredList[$group->id])->get() ) - 1; @endphp
                                      @foreach($group->optionsImagesFilters($filteredList[$group->id])->get() as $key=>$option)
                                        <label>
                                            <input class="filter-select" type="radio" name="filter_group_{{$group->id}}[]" value="{{ $option->id }}" required>
                                            <span><img src="/{{$option->swatch_image}}" alt=""></span>
                                            <p>{{$option->title}}</p>
                                        </label>
                                      @endforeach
                                    </div>
                                </fieldset>
                            </div>
                        @elseif(sizeof($group->displayOptionsFilters($filteredList[$group->id])->get()) > 1)
                            <div class="materialContain borderTop productPadding">
                                <div class="title">
                                    <h4>{{$group->title}}</h4>
                                </div>
                                <select class="w-100 form-control filter-select" name="filter_group_{{$group->id}}[]" required="">
                                    @foreach($group->displayOptionsFilters($filteredList[$group->id])->get() as $option)
                                    <option value="{{$option->id}}">{{$option->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @elseif(sizeof($group->displayOptionsFilters($filteredList[$group->id])->get()) > 0)
                            <input type="hidden" class="form-control filter-select" name="filter_group_{{$group->id}}[]" value="{{$group->displayOptionsFilters($filteredList[$group->id])->first()->id}}" />
                        @endif
                    @endforeach
                    @if($product->quantity > 0)
                    <div class="quantityContain borderTop productPadding">
                        <div class="title">
                            <h4>Quantity:</h4>
                        </div>
                        <select class="form-control" name="quantity" id="">
                            @for($i = 1; $i <= $product->quantity; $i++)
                                @if($i == 1)
                                    <option value="1" selected>1</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                    <div class="row productButtons">
                        <div class="col-12">
                            <button class="btn smlBtn mt-0" type="submit">
                                Add to cart
                            </button>
                            {{--  <button class="btn wishBtn" type="submit">
                                <img src="/assets/icons/wishlist.svg" alt="add to wishlist">
                            </button>  --}}
                        </div>
                    </div>
                    @endif
                {!! Form::close() !!}
                <div class="row productDescr">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                            @foreach($product->displayTabs as $key => $tab)
                                <li class="nav-items">
                                    <a class="nav-link @if($key == 0) active @endif" id="" data-toggle="tab" href="#tab_{{$tab->id}}" role="tab" aria-controls="descr" aria-selected="true">{{$tab->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content article" id="myTabContent">
                            @foreach($product->displayTabs as $key => $tab)
                            <div class="tab-pane fade  @if($key == 0) show active @endif" id="tab_{{$tab->id}}" role="tabpanel" aria-labelledby="tab_{{$tab->id}}">
                                {!! $tab->description !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endisset
    
    @if($product != NULL && sizeof($product->displayRelatedProducts))
        <div class="container-fluid pb-lg-4 pb-5 mb-lg-4 mb-5">
            <div class="container productHome px-0">
                <div class="row">
                    <div class="col-12 sectionTitle">
                        <h2 class="text-center">You may also like</h2>
                    </div>
                </div>
                <div class="col-12 productListWrap beforeFooterWrap mt-4">
                    <div class="row">
                        @foreach($product->displayRelatedProducts as $product)
                            @include('includes.pages.products.product_block', ['product' => $product->related])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
{{--
    @endif
    @if($product != NULL)
--}}
    <script>
        $(".filter-select").change(function(){
            $.ajax({
                type: 'get',
                url: "/get/stock/{{$product->id}}?"+$(".details form").serialize(),
                data:{
                }, 
                async: false,
                dataType: 'json'
                
            }).done(function(data){
                console.log(data);
                $(".price h2").html(data.new_price);
            }).fail(function(error){
                //console.log(error)
            });
        });
    </script>
    @endif

@endsection
