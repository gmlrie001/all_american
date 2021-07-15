@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . " | " . $page->title )

@section('content')

@push( 'pageStyles' )
<style id="range-slider-styling">
    #slider-range {
        width: 87.5%;
        display: block;
        float: left;
        margin-left: 0;
        margin-right: 0;
        margin-top: 0.5rem;
    }
    #slider-range .ui-slider-horizontal .ui-slider-handle {
        top: -5px;
        margin-left: -3.5%;
    }
    #slider-range-mobile .ui-slider-horizontal .ui-slider-handle {
        top: -10px;
    }
    #slider-range-mobile .ui-slider-horizontal .ui-slider-handle:first-of-type {
        margin-left: -2.5%;
    }
    #slider-range-mobile .ui-slider-horizontal .ui-slider-handle:last-of-type {
        margin-left: -7.5%;
    }
    input#amount,
    input#amount-mobile {
        color: #c12136 !important;
    }
    #slider-range-mobile {
        display: flex;
        width: 100%;
        margin-top: 0.375rem;
        margin-right: 10%;
        margin-left: 2.5%;
    }
    #slider-range-mobile .ui-slider-horizontal {
        width: 85%;
        margin-top: 1rem;
        margin-left: 3.5%;
        margin-bottom: 15px;
        margin-right: 3.5%;
    }
    #slider-range-mobile .ui-slider-horizontal .ui-slider-handle {
        top: -10px;
        margin-left: -2.5%;
    }
    .filterWrap .custom-control-label::after {
        left: -1.5rem;
    }
    button.smlBtn, 
    button.smlBtn:hover, 
    a.smlBtn:hover, 
    a.longBtn:hover {
        color: #ffffff;
    }
    button.smallBtn, 
    a.longBtn, 
    a.smlBtn { 
        background-color: #c12136;
    }
    button.smlBtn:hover, 
    a.smlBtn:hover, 
    a.longBtn:hover {
        background-color: #051c2e;
    }
    .productListWrap .block .title h1 {
      min-height: 50px;
      margin-top: 1rem;
      font-size: 14px;
      font-weight: 400;
      line-height: 25px;
    }
    .bgGrey.pageHeader {
      margin-bottom: 0 !important;
    }
    .bgGrey.pageHeader > .container > .row {
      align-items: center;
    }
    .bgGrey.pageHeader > .container > .row .sortBy .dropdown-menu {
      left: -12.5rem !important;
    }
    .overflow-y-auto {
      overflow-y: auto;
    }
    @media only screen and (max-width: 992px) {
      .productListWrap .block .title h1 {
        min-height: unset;
      }
      button.btn, 
      button.smlBtn, 
      a.smlBtn, 
      [class*=btn], 
      [class*=submit] {
        min-height: unset !important;
        max-height: 40px;
        line-height: 40px;
      }
      .title h4 {
        margin-bottom: 1rem;
      }
      .filterWrap .custom-control-label span, 
      .filterMobileopen .custom-control-label::before {
        top: 0.25rem;
        left: -1.5rem;
      }
      #slider-range-mobile {
        max-width: 95%;
        margin-left: 0;
        margin-right: 0;
      }
    }
</style>
@endpush

<div class="container-fluid bgGrey pageHeader">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col breadCrumb">
                @isset( $article )
                <h1>{{$article->title}} <i>({{sizeof($products)}})</i></h1>
                @endisset
            </div>
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
            <div class="sortBy d-block d-lg-none float-right">
                <a class="dropdown-toggle px-2" href="#" data-toggle="dropdown">
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

<div class="container-fluid filterMobileopen overflow-y-auto pt-0">
    <div class="row mobileMenu px-0">
        <div class="col-12 menuClose text-right">
            <img src="/assets/icons/close-grey.svg" alt="menu">
        </div>
    </div>
    <form method="GET" action="">
        <div class="title">
            <h5>Filters</h5>
        </div>
        <div class="applied borderTop pt-3">
            @if(isset($clear_link))
            <a class="clearFilter" href="{{$clear_link}}">CLEAR ALL</a>
            @endif
        </div>
        @php
          if( isset( $article ) || NULL != $article ) {
            $parent = \App\Models\ProductCategory::with('parent')
                                                 ->where( 'parent_id', $article->id )
                                                 ->where('status', 'PUBLISHED')->orWhere('status', 'SCHEDULED')
                                                 ->where('status_date', '>=', now())
                                                 ->get();
            $subcats = $parent;
          }
        @endphp

        @if( $subcats && count( $subcats ) > 0 )
        <div class="d-flex flex-column flex-wrap sizeContain borderTop productPadding pt-3">
            <div class="title">
                <h4>Categories</h4>
            </div>
            <fieldset id="filterColourBlock" class="pl-lg-0">
                <div class="filterColourBlock">
                @forelse( $subcats as $cat )
                    <div class="custom-control custom-control-labele custom-checkbox">
                    @if( NULL != Request::input( 'categories' ) )
                        @if( in_array( $cat->id, Request::input( 'categories' ) ) )
                        <input id="{{ $cat->url_title }}-mobile" class="custom-control-input" type="checkbox" name="categories[]" checked="true" value="{{ $cat->id }}" style="z-index:90900;">
                        @else
                        <input id="{{ $cat->url_title }}-mobile" class="custom-control-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" style="z-index:90900;">
                        @endif
                    @else
                        <input id="{{ $cat->url_title }}-mobile" class="custom-control-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" style="z-index:90900;">
                    @endif
                        <label class="custom-control-label" for="{{ $cat->url_title }}-mobile">{{ $cat->title }}</label>
                    </div>
                @empty
                @endforelse
                </div>
            </fieldset>
        </div>
        @endif

        @foreach($filters as $key => $filter)

        @php
          $firstFilter = reset($filter);
          $show_images = false;
          $ky = explode("-", $key);

          $firstOption = \App\Models\FilterOption::find( $firstFilter['id'] );
          
          if($firstOption != null && $firstOption->swatch_image != null){
            $show_images = true;
          }
        @endphp
        <div class="d-flex flex-column flex-wrap sizeContain borderTop productPadding pt-3">
            <div class="title">
                <h4>{{ $ky[0] }}</h4>
            </div>
            <fieldset id="filterColourBlock" class="pl-lg-0">
                <div class="filterColourBlock">
                @if($show_images)
                  @foreach($filter as $fil)
                    @php $option = \App\Models\FilterOption::find( $fil['id'] ); @endphp
                    <label>
                        <input 
                          @if(
                            isset( $submitted_filters ) && isset( $submitted_filters['filter_'.$ky[1]] ) &&
                            in_array( $fil['id'], $submitted_filters['filter_'.$ky[1]] )
                          ) 
                            checked=""
                          @endif 
                          type="radio"
                          name="filter_{{$ky[1]}}[]" 
                          value="{{$fil['id']}}"
                        >
                        @isset( $option->swatch_image )
                        <span class="option-swatch"><img class="img-fluid swatch" src="/{{$option->swatch_image}}" alt="{{$option->title}}"></span>
                        @endisset
                        <p>{{$option->title}}</p>
                    </label>
                  @endforeach
                @else
                    @foreach($filter as $fil)
                    <div class="custom-control custom-checkbox">
                        <input @if(isset($submitted_filters) && isset($submitted_filters['filter_'.$ky[1]]) &&
                            $submitted_filters['filter_'.$ky[1]]==$fil['id']) checked="" @endif type="checkbox"
                            value="{{$fil['id']}}" class="custom-control-input"
                            id="{{Illuminate\Support\Str::slug($fil['title'])}}-mobile" name="filter_{{$ky[1]}}[]"
                        >
                        <label class="custom-control-label" for="{{Illuminate\Support\Str::slug($fil['title'])}}-mobile">{{$fil['title']}}</label>
                    </div>
                    @endforeach
                @endif
                </div>
            </fieldset>
        </div>
        @endforeach

        @if($min_price != $max_price)
        <div class="d-flex flex-column flex-wrap priceContain borderTop productPadding pt-3">
            <div class="title">
                <h4>Price range:</h4>
            </div>
            <fieldset id="priceFilterContain">
                <div class="priceFilterContain row">
                    <div class="col-12 d-block">
                        <p>
                            <label for="amount-mobile" class="d-none collapse hidden" hidden>Price range:</label>
                            <input type="text" id="amount-mobile" class="mb-3" style="border:0; color:#f6931f; font-weight:bold;" readonly>

                            <input type="hidden" name="preset_min_price" value="{{ number_format( $min_price, 0, "." , "" ) }}">
                            <input type="hidden" name="preset_max_price" value="{{ number_format( $max_price, 0, "." , "" ) }}">

                            <input type="hidden" id="min_price-mobile" min="{{ number_format( $min_price, 0, "." , "" ) }}" max="{{ number_format( $max_price, 0, "." , "" ) }}" name="min_price" class="price-range-field" value="{{ number_format( $min_price, 0, "." , "" ) }}">
                            <input type="hidden" id="max_price-mobile" min="{{ number_format( $min_price, 0, "." , "" ) }}" max="{{ number_format( $max_price, 0, "." , "" ) }}" name="max_price" class="price-range-field" value="{{ number_format( $max_price, 0, "." , "" ) }}">
                        </p>

                        <div class="d-block slider-range-block-mobile clearfix">
                            <div id="slider-range-mobile"></div>
                            <span class="text-left float-left">R {{ number_format( $min_price, 0, "." , "" ) }}</span>
                            <span class="text-right float-right">R{{ number_format( $max_price, 0, "." , "" ) }}</span>
                        </div>

                        <script>
                            $(function () {
                                $("#slider-range-mobile").slider({
                                    range: true,
                                    min: {{ number_format( $min_price, 0, "." , "" ) }},
                                    max: {{ number_format( $max_price, 0, "." , "" ) }},
                                    values: [{{ number_format( $min_price, 0, "." , "" ) }}, {{ number_format( $max_price, 0, "." , "" ) }}],
                                    slide: function (event, ui) {
                                        $("#amount-mobile").val("R" + ui.values[0] + " - R" + ui.values[1]);
                                        $("#min_price-mobile").val($("#slider-range-mobile")
                                                              .slider("values", 0));
                                        $("#max_price-mobile").val($("#slider-range-mobile")
                                                              .slider("values", 1));
                                        $(".range-slider-value i:first-child").text(ui.values[0]);
                                        $(".range-slider-value i:last-child").text(ui.values[1]);
                                    }
                                });
                                $("#amount-mobile").val("R" + $("#slider-range-mobile")
                                                   .slider("values", 0) + " - R" + $("#slider-range-mobile")
                                                   .slider("values", 1));
                            });

                        </script>
                    </div>
                </div>
            </fieldset>
        </div>
        @endif
        <div class="borderTop">
            <button type="submit" class="btn smlBtn mt-lg-3 mt-4">Apply Filters</button>
        </div>
    </form>
</div>

<div class="container mb-lg-2 mb-4">
    <div class="row">
        <div class="col-12 col-lg-2 col-xl-3 filterWrap d-none d-md-block mb-lg-5 mb-4">
            <form method="GET" action="">
                <div class="title">
                    <h5>Filters</h5>
                </div>
                <div class="applied">
                    @if(isset($clear_link))
                    <a class="clearFilter" href="{{$clear_link}}">CLEAR ALL</a>
                    @endif
                </div>
                @if( $subcats && count( $subcats ) > 0 )
                <div class="d-flex flex-column flex-wrap sizeContain borderTop productPadding">
                    <div class="title">
                        <h4>Categories</h4>
                    </div>
                    <fieldset id="filterColourBlock" class="pl-lg-0">
                        <div class="filterColourBlock">
                        @forelse( $subcats as $cat )
                            <div class="custom-control custom-control-labele custom-checkbox">
                            @if( NULL != Request::input( 'categories' ) )
                              @if( in_array( $cat->id, Request::input( 'categories' ) ) )
                                <input id="{{ $cat->url_title }}" class="custom-control-input" type="checkbox" name="categories[]" checked="true" value="{{ $cat->id }}" style="z-index:90900;">
                              @else
                                <input id="{{ $cat->url_title }}" class="custom-control-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" style="z-index:90900;">
                              @endif
                            @else
                                <input id="{{ $cat->url_title }}" class="custom-control-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" style="z-index:90900;">
                            @endif
                                <label class="custom-control-label" for="{{ $cat->url_title }}">{{ $cat->title }}</label>
                            </div>
                        @empty
                        @endforelse
                        </div>
                    </fieldset>
                </div>
                @endif

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
                <div class="d-flex flex-column flex-wrap sizeContain borderTop productPadding py-lg-2 py-3">
                    <div class="title">
                        <h4>{{$ky[0]}}</h4>
                    </div>
                    <fieldset id="filterColourBlock" class="pl-lg-0">
                        <div class="filterColourBlock">
                        @if($show_images)
                          @foreach($filter as $fil)
                            @php $option = \App\Models\FilterOption::find($fil['id']); @endphp
                            <label>
                                <input value="{{$fil['id']}}" @if(isset($submitted_filters) &&
                                    isset($submitted_filters['filter_'.$ky[1]]) && in_array($fil['id'],
                                    $submitted_filters['filter_'.$ky[1]])) checked="" @endif type="radio"
                                    name="filter_{{$ky[1]}}[]"
                                >
                                <span><img class="image-fluid swatch" src="/{{$option->swatch_image}}" alt="{{$option->title}}"></span>
                                <p>{{$option->title}}</p>
                            </label>
                          @endforeach
                        @else
                          @foreach($filter as $fil)
                            <div class="custom-control custom-control-labele custom-checkbox">
                                <input value="{{$fil['id']}}" @if(isset($submitted_filters) &&
                                    isset($submitted_filters['filter_'.$ky[1]]) &&
                                    $submitted_filters['filter_'.$ky[1]]==$fil['id']) checked="" @endif type="checkbox"
                                    class="custom-control-input" id="{{Illuminate\Support\Str::slug($fil['title'])}}"
                                    name="filter_{{$ky[1]}}[]"
                                >
                                <label class="custom-control-label" for="{{Illuminate\Support\Str::slug($fil['title'])}}">{{$fil['title']}}</label>
                            </div>
                          @endforeach
                        @endif
                        </div>
                    </fieldset>
                </div>
                @endforeach

                @if($min_price != $max_price)
                <div class="d-flex flex-column flex-wrap priceContain borderTop productPadding py-lg-2 py-3">
                    <div class="title">
                        <h4 class="mb-lg-2">Price range:</h4>
                    </div>
                    
                    <fieldset id="priceFilterContain" class="d-flex flex-column flex-wrap float-left">
                        <p class="mb-lg-0">
                            <label for="amount" class="mb-lg-0 d-none collapse hidden" hidden>Price range:</label>
                            <input type="text" id="amount" style="border:0;color:#f6931f;font-weight:bold;" readonly>
                            <input type="hidden" name="preset_min_price" value="{{$min_price}}">
                            <input type="hidden" name="preset_max_price" value="{{$max_price}}">
                            <input type="hidden" id="min_price" min={{$min_price}} max={{$max_price}} name="min_price" class="price-range-field" value="{{$min_price}}">
                            <input type="hidden" id="max_price" min={{$min_price}} max={{$max_price}} name="max_price" class="price-range-field" value="{{$max_price}}">
                        </p>

                        <div class="col-12 pl-lg-0 slider-range-block justify-content-around">
                            <div id="slider-range" class="w-100"></div>
                            <div class="row justify-content-between">
                                <span class="col-auto text-left mb-0 pl-lg-3">R{{ number_format( $min_price, 0, ".", "" ) }}</span>
                                <span class="col-auto text-lg-right mb-0 pr-lg-0">R{{ number_format( $max_price, 0, ".", "" ) }}</span>
                            </div>
                        </div>

                        <script>
                            $(function () {
                                $("#slider-range").slider({
                                    range: true,
                                    min: {{ number_format( $min_price, 0, ".", "" ) }},
                                    max: {{ number_format( $max_price, 0, ".", "" ) }},
                                    values: [{{ number_format( $min_price, 0, ".", "" ) }}, {{ number_format( $max_price, 0, ".", "" ) }}],
                                    slide: function (event, ui) {
                                        $("#amount").val("R" + ui.values[0] + " - R" + ui.values[1]);
                                        $("#min_price").val($("#slider-range").slider("values", 0));
                                        $("#max_price").val($("#slider-range").slider("values", 1));
                                        $(".range-slider-value i:first-child").text(ui.values[0]);
                                        $(".range-slider-value i:last-child").text(ui.values[1]);
                                    }
                                });
                                $("#amount").val("R" + $("#slider-range")
                                            .slider("values", 0) + " - R" + $("#slider-range")
                                            .slider("values", 1));
                            });
                        </script>
                        
                    </fieldset>
                </div>
                @endif
                <div class="borderTop">
                    <button type="submit" class="btn smlBtn mt-3">Apply Filters</button>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-10 col-xl-9 productListWrap beforeFooterWrap pb-lg-5 pb-4 mb-lg-5 mb-4">
            <div class="row">
                @foreach($products as $product)
                    @include('templates.products.product_block', ['product' => $product])
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 paginator">
                    {!! $products->render() !!}
                </div>
            </div>
            
            {{-- 
              <div class="row">
                  <div class="col-12 paginator">
                    <a href="/" class="col-12 text-center link loadMore" title="view all our products">Load more</a>
                  </div>
              </div>
            --}}
        </div>
    </div>
</div>

@endsection
