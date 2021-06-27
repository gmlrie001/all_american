@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
    @if(sizeof($article->displayBanners))
        <div class="container p-0 overflow-hidden">
            <div class="row">
                <div class="col-12 page-slider d-none d-lg-block">
                    @foreach($article->displayBanners as $banner)
                        <div>
                        <div class="row m-0">
                                @php
                                    $maxCols = $banner->max_columns;
                                    $col = 12/$maxCols;
                                @endphp
                                @foreach($banner->displayBlocks as $block)
                                    @if($block->banner_image != null && $block->banner_image != "")
                                        <a href="{{$block->link}}" target="{{$block->link_taget}}" title="{{$block->title}}" class="p-0 col-12 col-lg-{{$block->column_count*$col}}">
                                            @if($block->mobile_image != null && $block->mobile_image != "")
                                                <img src="/{{$block->banner_image}}" class="img-fluid d-none d-lg-block" alt="{{$block->title}}" title="{{$block->title}}" />
                                                <img src="/{{$block->mobile_image}}" class="img-fluid d-block d-lg-none" alt="{{$block->title}}" title="{{$block->title}}" />
                                            @else
                                                <img src="/{{$block->banner_image}}" class="img-fluid" alt="{{$block->title}}" title="{{$block->title}}" />
                                            @endif
                                        </a>
                                    @else
                                        <a href="{{$block->link}}" target="{{$block->link_taget}}" title="{{$block->title}}" class="col-12 col-lg-{{$block->column_count*$col}}">
                                            <h1>{{$block->title}}</h1>
                                            {!! $block->description !!}
                                        </a>
                                    @endif
                                @endforeach
                        </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 page-slider-mobile d-block d-lg-none">
                        @foreach($page->displayBanners as $banner)
                            @foreach($banner->displayBlocks as $block)
                                @if($block->banner_image != null && $block->banner_image != "")
                                    <a href="{{$block->link}}" target="{{$block->link_taget}}" title="{{$block->title}}" class="p-0 col-12 col-lg-{{$block->column_count*$col}}">
                                        @if($block->mobile_image != null && $block->mobile_image != "")
                                            <img src="/{{$block->banner_image}}" class="img-fluid d-none d-lg-block" alt="{{$block->title}}" title="{{$block->title}}" />
                                            <img src="/{{$block->mobile_image}}" class="img-fluid d-block d-lg-none" alt="{{$block->title}}" title="{{$block->title}}" />
                                        @else
                                            <img src="/{{$block->banner_image}}" class="img-fluid" alt="{{$block->title}}" title="{{$block->title}}" />
                                        @endif
                                    </a>
                                @else
                                    <a href="{{$block->link}}" target="{{$block->link_taget}}" title="{{$block->title}}" class="col-12 col-lg-{{$block->column_count*$col}}">
                                        <h1>{{$block->title}}</h1>
                                        {!! $block->description !!}
                                    </a>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
            </div>
        </div>
    @endif

    <div class="container-fluid bgGrey pageHeader">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col breadCrumb">
                    <h1>{{$article->title}} <i>({{sizeof($products)}})</i></h1>
                </div>
                <!-- <a href="#" class="sharing"><i class="fa fa-share-alt"></i></a> -->
                <div class="sortBy d-none d-md-block">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    Sort by <span></span>
                  </a>
                  <div class="dropdown-menu">
                    <a href="/sort/by/order-asc" class="dropdown-item">
                      Sort by default
                    </a>
                    <a href="/sort/by/price-asc" class="dropdown-item">
                      Sort by price (low to high)
                    </a>
                    <a href="/sort/by/price-desc" class="dropdown-item">
                      Sort by price (high to low)
                    </a>
                    <a href="/sort/by/created_at-asc" class="dropdown-item">
                      Sort by Oldest
                    </a>
                    <a href="/sort/by/created_at-desc" class="dropdown-item">
                        Sort by Newest
                    </a>
                    <a href="/sort/by/title-asc" class="dropdown-item">
                      Sort by A - Z
                    </a>
                    <a href="/sort/by/title-desc" class="dropdown-item">
                      Sort by Z - A
                    </a>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-block d-md-none mobileFilter">
        <div class="row">    
            <div class="col-12">
                <div class="filteropen">
                    <a class="filterBtn" href="">Filters</a>
                </div>
                <div class="viewChange d-inline-block">
                    <a href="#">
                        <img class="img-fluid" src="/assets/icons/grid.png" alt="change view">
                    </a>    
                </div>    
                <div class="sortBy d-inline-block">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    Sort by <span></span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="/sort/by/order-asc" class="dropdown-item">
                            Sort by default
                        </a>
                        <a href="/sort/by/price-asc" class="dropdown-item">
                            Sort by price (low to high)
                        </a>
                        <a href="/sort/by/price-desc" class="dropdown-item">
                            Sort by price (high to low)
                        </a>
                        <a href="/sort/by/created_at-asc" class="dropdown-item">
                            Sort by Oldest
                        </a>
                        <a href="/sort/by/created_at-desc" class="dropdown-item">
                            Sort by Newest
                        </a>
                        <a href="/sort/by/title-asc" class="dropdown-item">
                            Sort by A - Z
                        </a>
                        <a href="/sort/by/title-desc" class="dropdown-item">
                            Sort by Z - A
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid filterMobileopen">
        <div class="row mobileMenu">
            <div class="col-12 menuClose text-right">
                <img src="/assets/icons/close-grey.svg" alt="menu">
            </div>
        </div>               
        <form method="GET" action="">
            <div class="title">
                <h5>Filters</h5>
            </div>
            <div class="applied">
                @if(isset($clear_link))
                    <a class="clearFilter" href="{{$clear_link}}">CLEAR ALL</a>
                @endif
            </div>
@php
$subcats = [];
$cat     = \App\Models\ProductCategory::where('parent_id', NULL)->status()->get(); //$category_list_overwrite->load( 'children' );
if ( $cat instanceof Collection && count( $cat ) > 0 ):
  foreach ( $cat as $key=>$sub ) {
    $subcats[] = $sub;
  }
else:
  $subcats[] = $cat;
endif;
$subcats = collect( $subcats );
@endphp
            <div class="sizeContain borderTop productPadding">
                <div class="title">
                    <h4>Categories</h4>
                </div>
                <fieldset id="categoryBlock">
                    <div class="subcategory-filter filterColourBlock">
@forelse( $subcats as $cat )
{{--
			<div class="custom-control custom-checkbox collapse">
                                <label>
                                    <input type="checkbox" class="form-control collapse" @if( isset( $cat ) ) checked="" @endif type="radio" name="categories[]" value="{{ $cat->id }}" hidden>
                                    <a href="/shop/{{ $cat->url_title }}" title="SubCategory - {{ $cat->title }}">{{ $cat->title }}</a>
                                </label>
			</div>
--}}
                        <a href="/shop/{{ $cat->url_title }}" title="SubCategory - {{ $cat->title }}">{{ $cat->title }}</a>
@empty
@endforelse
		    </div>
		</fieldset>
	    </div>

            @foreach($filters as $key => $filter)
            @php
                $ky = explode("-", $key);  
                $firstFilter = reset($filter);
                $show_images = false;
                $firstOption = \App\Models\FilterOption::find($firstFilter['id']);
                if($firstOption != null && $firstOption->swatch_image != null){
                    $show_images = true;
                }
            @endphp
            <div class="sizeContain borderTop productPadding">
                <div class="title">
                    <h4>{{$ky[0]}}</h4>
                </div>
                <fieldset id="filterColourBlock">
                    <div class="filterColourBlock">
                        @if($show_images)
                            @foreach($filter as $fil)
                                @php
                                    $option = \App\Models\FilterOption::find($fil['id']);
                                @endphp
                                <label>
                                    <input @if(isset($submitted_filters) && isset($submitted_filters['filter_'.$ky[1]]) && in_array($fil['id'], $submitted_filters['filter_'.$ky[1]])) checked="" @endif type="radio" name="filter_{{$ky[1]}}[]" value="{{$fil['id']}}" /><span><img src="/{{$option->swatch_image}}" alt="{{$option->title}}"></span>
                                    <p>{{$option->title}}</p>
                                </label>
                            @endforeach
                        @else
                            @foreach($filter as $fil)
                                <div class="custom-control custom-checkbox">
                                    <input @if(isset($submitted_filters) && isset($submitted_filters['filter_'.$ky[1]]) && $submitted_filters['filter_'.$ky[1]] == $fil['id']) checked="" @endif type="checkbox" value="{{$fil['id']}}" class="custom-control-input" id="{{Illuminate\Support\Str::slug($fil['title'])}}_mobile" name="filter_{{$ky[1]}}[]">
                                    <label class="custom-control-label" for="{{Illuminate\Support\Str::slug($fil['title'])}}_mobile">{{$fil['title']}}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </fieldset>
            </div>
        @endforeach
        <div class="priceContain borderTop productPadding">
            <div class="title">
                <h4>Price:</h4>
            </div>
            <fieldset id="priceFilterContain">
                <div class="priceFilterContain row mt-2">
                    @if($min_price != $max_price)
                        <input type="hidden" name="preset_min_price" value="{{$min_price}}" />
                        <input type="hidden" name="preset_max_price" value="{{$max_price}}" />
                            <div class="col-12 range-slider-block">
                                <span>R{{number_format($min_price, 0, "", "")}}</span>
                                <div id="slider-rangemobile" class="price-filter-range" name="rangeInput"></div>
                                <span>R{{number_format($max_price, 0, "", "")}}</span>
                            </div>
                            <div class="col-12 range-slider-value">R<i>{{number_format($min_price, 0, "", "")}}</i> - R<i>{{number_format($max_price, 0, "", "")}}</i></div>
                            <input type="hidden" id="min_pricemobile" min={{number_format($min_price, 0, "", "")}} max={{number_format($max_price, 0, "", "")}} name="min_price" class="price-range-field" value="{{number_format($min_price, 0, "", "")}}" />
                            <input type="hidden" id="max_pricemobile" min={{number_format($min_price, 0, "", "")}} max={{number_format($max_price, 0, "", "")}} name="max_price" class="price-range-field" value="{{number_format($max_price, 0, "", "")}}" />
                            <script>
                                $(document).ready(function(){
                                    
                                    $('#price-range-submit').hide();
    
                                    $("#min_pricemobile,#max_pricemobile").on('change', function () {
    
                                        $('#price-range-submit').show();
    
                                        var min_price_range = parseInt($("#min_pricemobile").val());
    
                                        var max_price_range = parseInt($("#max_pricemobile").val());
    
                                        if (min_price_range > max_price_range) {
                                            $('#max_pricemobile').val(min_price_range);
                                        }
    
                                        $("#slider-rangemobile").slider({
                                            values: [min_price_range, max_price_range]
                                        });
                                    
                                    });
    
    
                                    $("#min_pricemobile,#max_pricemobile").on("paste keyup", function () {                                        
    
                                        $('#price-range-submit').show();
    
                                        var min_price_range = parseInt($("#min_pricemobile").val());
    
                                        var max_price_range = parseInt($("#max_pricemobile").val());
                                        
                                        if(min_price_range == max_price_range){
    
                                                max_price_range = min_price_range + 100;
                                                
                                                $("#min_pricemobile").val(min_price_range);		
                                                $("#max_pricemobile").val(max_price_range);
                                        }
    
                                        $("#slider-rangemobile").slider({
                                            values: [min_price_range, max_price_range]
                                        });
    
                                    });
    
    
                                    $(function () {
                                    $("#slider-rangemobile").slider({
                                        range: true,
                                        orientation: "horizontal",
                                        min: {{number_format($min_price, 0, "", "")}},
                                        max: {{number_format($max_price, 0, "", "")}},
                                        values: [{{number_format($min_price, 0, "", "")}}, {{number_format($max_price, 0, "", "")}}],
                                        step: 100,
    
                                        slide: function (event, ui) {
                                        if (ui.values[0] == ui.values[1]) {
                                            return false;
                                        }
                                        
                                        $("#min_pricemobile").val(ui.values[0]);
                                        $(".range-slider-value i:first-child").text(ui.values[0]);
                                        $("#max_pricemobile").val(ui.values[1]);
                                        $(".range-slider-value i:last-child").text(ui.values[1]);
                                        }
                                    });
    
                                    $("#min_pricemobile").val($("#slider-rangemobile").slider("values", 0));
                                    $("#max_pricemobile").val($("#slider-rangemobile").slider("values", 1));
    
                                    });
    
                                    $("#slider-rangemobile,#price-range-submit").click(function () {
    
                                    var min_price = $('#min_pricemobile').val();
                                    var max_price = $('#max_pricemobile').val();
    
                                    $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
                                    });
                                });
                            </script>
                        @endif
                </div>
            </fieldset>
            <button type="submit" class="btn smlBtn">Apply Filters</button>
        </div>
            <button class="w-100 smlBtn">
                Filter
            </button>
        </form>
    </div>
    
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2 col-xl-3 filterWrap d-none d-md-block">          
                <form method="GET" action="">
                    <div class="title">
                        <h5>Filters</h5>
                    </div>
                    <div class="applied">
                        @if(isset($clear_link))
                            <a class="clearFilter" href="{{$clear_link}}">CLEAR ALL</a>
                        @endif
                    </div>
            <div class="sizeContain borderTop productPadding">
                <div class="title">
                    <h4>Categories</h4>
                </div>
                <fieldset id="filterColourBlock">
                    <div class="subcategory-filter filterColourBlock">
			@forelse( $subcats as $cat )
{{--
			<div class="custom-control custom-control-label collapse custom-checkbox">
                                <label class="custom-control-label">
                                    <input type="radio" class="custom-control-input collapse" @if(isset($submitted_filters) && isset($submitted_filters['category'][$key]) && in_array($fil['id'], $submitted_filters['category'][$key])) checked="" @endif type="checkbox" name="categories[]" value="{{ $cat->id }}">
                                    <a href="/shop/{{ $cat->url_title }}" title="SubCategory - {{ $cat->title }}">{{ $cat->title }}</a>
                                </label>
			</div>
--}}
                        <a href="/shop/{{ $cat->url_title }}" title="SubCategory - {{ $cat->title }}">{{ $cat->title }}</a>
			@empty
			@endforelse
		    </div>
		</fieldset>
	    </div>

                    @foreach($filters as $key => $filter)
                        @php
                            $ky = explode("-", $key);  
                            $firstFilter = reset($filter);
                            $show_images = false;
                            $firstOption = \App\Models\FilterOption::find($firstFilter['id']);
                            if($firstOption != null && $firstOption->swatch_image != null){
                                $show_images = true;
                            }
                        @endphp
                        <div class="sizeContain borderTop productPadding">
                            <div class="title">
                                <h4>{{$ky[0]}}</h4>
                            </div>
                            <fieldset id="filterColourBlock">
                                <div class="filterColourBlock">
                                    @if($show_images)
                                        @foreach($filter as $fil)
                                            @php
                                                $option = \App\Models\FilterOption::find($fil['id']);
                                            @endphp
                                            <label>
                                                <input value="{{$fil['id']}}" @if(isset($submitted_filters) && isset($submitted_filters['filter_'.$ky[1]]) && in_array($fil['id'], $submitted_filters['filter_'.$ky[1]])) checked="" @endif type="radio" name="filter_{{$ky[1]}}[]" /><span><img src="/{{$option->swatch_image}}" alt="{{$option->title}}"></span>
                                                <p>{{$option->title}}</p>
                                            </label>
                                        @endforeach
                                    @else
                                        @foreach($filter as $fil)
                                            <div class="custom-control custom-control-label custom-checkbox">
                                                <input value="{{$fil['id']}}" @if(isset($submitted_filters) && isset($submitted_filters['filter_'.$ky[1]]) && $submitted_filters['filter_'.$ky[1]] == $fil['id']) checked="" @endif type="checkbox" class="custom-control-input" id="{{Illuminate\Support\Str::slug($fil['title'])}}" name="filter_{{$ky[1]}}[]">
                                                <label class="custom-control-label" for="{{Illuminate\Support\Str::slug($fil['title'])}}">{{$fil['title']}}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                    @endforeach
                    <div class="priceContain borderTop productPadding">
                        <div class="title">
                            <h4>Price:</h4>
                        </div>
                        <fieldset id="priceFilterContain">
                            <div class="priceFilterContain row mt-2">
                                @if($min_price != $max_price)
                                    <input type="hidden" name="preset_min_price" value="{{$min_price}}" />
                                    <input type="hidden" name="preset_max_price" value="{{$max_price}}" />
                                        <div class="col-12 range-slider-block">
                                            <span>R{{number_format($min_price, 0, "", "")}}</span>
                                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                            <span>R{{number_format($max_price, 0, "", "")}}</span>
                                        </div>
                                        <div class="col-12 range-slider-value">R<i>{{number_format($min_price, 0, "", "")}}</i> - R<i>{{number_format($max_price, 0, "", "")}}</i></div>
                                        <input type="hidden" id="min_price" min={{number_format($min_price, 0, "", "")}} max={{number_format($max_price, 0, "", "")}} name="min_price" class="price-range-field" value="{{number_format($min_price, 0, "", "")}}" />
                                        <input type="hidden" id="max_price" min={{number_format($min_price, 0, "", "")}} max={{number_format($max_price, 0, "", "")}} name="max_price" class="price-range-field" value="{{number_format($max_price, 0, "", "")}}" />
                                        <script>
                                            $(document).ready(function(){
                                                
                                                $('#price-range-submit').hide();
                
                                                $("#min_price,#max_price").on('change', function () {
                
                                                    $('#price-range-submit').show();
                
                                                    var min_price_range = parseInt($("#min_price").val());
                
                                                    var max_price_range = parseInt($("#max_price").val());
                
                                                    if (min_price_range > max_price_range) {
                                                        $('#max_price').val(min_price_range);
                                                    }
                
                                                    $("#slider-range").slider({
                                                        values: [min_price_range, max_price_range]
                                                    });
                                                
                                                });
                
                
                                                $("#min_price,#max_price").on("paste keyup", function () {                                        
                
                                                    $('#price-range-submit').show();
                
                                                    var min_price_range = parseInt($("#min_price").val());
                
                                                    var max_price_range = parseInt($("#max_price").val());
                                                    
                                                    if(min_price_range == max_price_range){
                
                                                            max_price_range = min_price_range + 100;
                                                            
                                                            $("#min_price").val(min_price_range);		
                                                            $("#max_price").val(max_price_range);
                                                    }
                
                                                    $("#slider-range").slider({
                                                        values: [min_price_range, max_price_range]
                                                    });
                
                                                });
                
                
                                                $(function () {
                                                $("#slider-range").slider({
                                                    range: true,
                                                    orientation: "horizontal",
                                                    min: {{number_format($min_price, 0, "", "")}},
                                                    max: {{number_format($max_price, 0, "", "")}},
                                                    values: [{{number_format($min_price, 0, "", "")}}, {{number_format($max_price, 0, "", "")}}],
                                                    step: 100,
                
                                                    slide: function (event, ui) {
                                                    if (ui.values[0] == ui.values[1]) {
                                                        return false;
                                                    }
                                                    
                                                    $("#min_price").val(ui.values[0]);
                                                    $(".range-slider-value i:first-child").text(ui.values[0]);
                                                    $("#max_price").val(ui.values[1]);
                                                    $(".range-slider-value i:last-child").text(ui.values[1]);
                                                    }
                                                });
                
                                                $("#min_price").val($("#slider-range").slider("values", 0));
                                                $("#max_price").val($("#slider-range").slider("values", 1));
                
                                                });
                
                                                $("#slider-range,#price-range-submit").click(function () {
                
                                                var min_price = $('#min_price').val();
                                                var max_price = $('#max_price').val();
                
                                                $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
                                                });
                                            });
                                        </script>
                                    @endif
                            </div>
                        </fieldset>
                        <button type="submit" class="btn smlBtn">Apply Filters</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-10 col-xl-9 productListWrap beforeFooterWrap pb-lg-4 pb-5 mb-lg-4 mb-5">
                <div class="row">
                    @foreach($products as $product)
                        @include('includes.pages.products.product_block', ['product' => $product])
                    @endforeach
                </div>
                <div class="row">        
                    <a href="/" class="col-12 text-center link loadMore" title="view all our products">Load more</a>
                </div>
            </div>
        </div>
    </div>
@endsection