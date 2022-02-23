@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . " | " . $page->title )

@push( 'pageStyles' )
<style>
.productViewWrap .image .thumbNail {
   right: 0;
   transform: translate3d( -65%, 0, 0 );
}
@media only screen and (max-width: 992px) {
  .productViewWrap .image .thumbNail {
     right: 0;
     transform: translate3d( -65%, 0, 0 );
  }
}
</style>
@endpush

@section('content')

    <div class="container-fluid pageHeader">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col breadCrumb">
                    @php
                        if (isset($category)) {
                            function getCategoryLink($category, $linkArray = []){
                                if(!empty($category->parent_id)){
                                    array_push($linkArray, '<a class="d-inline" href="/shop/'.$category->url_title.'">'.$category->title.'</a>');
                                }else{
                                    array_push($linkArray, '<a class="d-inline" href="/shop/'.$category->parent->url_title.'/'.$category->url_title.'">'.$category->title.'</a>');

                                    $linkArray = getCategoryLink($category->parent, $linkArray);
                                }
                                return $linkArray;
                            }
                            $linkArray = getCategoryLink($product->category);
                            $linkArray = array_reverse($linkArray);
                            foreach($linkArray as $linkArr){
                                echo($linkArr);
                            }
                        }
                    @endphp
                </div>
                <a href="#" class="sharing share-open"><i class="fa fa-share-alt"></i></a>
            </div>
        </div>
    </div>

    <div class="container pb-lg-5 pb-4">
        <div class="row productViewWrap">
            <section class="col-12 col-lg-5 col-xl-7 image">
                <div class="main-slider" id="slider_default">
                    <div class="d-block" data-base="default">
                        <!-- Lets make a simple image magnifier -->
                        <div class="magnify">
                            <!-- This is the magnifying glass which will contain the original/large version -->
                            @include( 'templates.placeholders.simple_image_placeholders', 
                            [
                              'imgvar' => $product->product_image,
                              'imgtitle' => $product->title,
                              'imgclasses' => 'img-fluid small',
                              'class' => 'img-fluid small', 
                              'width' => 800,
                              'height' => 600, 
                              'text' => '+', 
                              'use_vault_logo' => true, 
                              'use_placehold_it' => true
                            ] 
                          )
                        </div>
                    </div>
                    @if(sizeof($product->displayGalleries) > 0)
                        @foreach($product->displayGalleries as $gal)
                            <div class="d-block" data-base="default">
                                <!-- Lets make a simple image magnifier -->
                                <div class="magnify">
                                    <!-- This is the magnifying glass which will contain the original/large version -->
                                    @include( 'templates.placeholders.simple_image_placeholders', 
                                     [
                                       'imgvar' => $gal->gallery_image, 
                                       'imgtitle' => $gal->title,
                                       'imgclasses' => 'img-fluid small',
                                       'class' => 'img-fluid small', 
                                       'width' => 800,
                                       'height' => 600, 
                                       'text' => '+', 
                                       'use_vault_logo' => true, 
                                       'use_placehold_it' => true
                                     ] 
                                   )
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @foreach($product->variants as $var)
                    <div class="main-slider" id="variant_{{$var->variant->id}}" style="display: none;">
                        <div class="magnify">
                            <!-- This is the magnifying glass which will contain the original/large version -->
                              @include( 'templates.placeholders.simple_image_placeholders', 
                               [
                                 'imgvar' => $var->variant->product_image,
                                 'imgtitle' => $var->variant->title,
                                 'imgclasses' => 'img-fluid small',
                                 'class' => 'img-fluid small', 
                                 'width' => 800,
                                 'height' => 600, 
                                 'text' => '+', 
                                 'use_vault_logo' => true, 
                                 'use_placehold_it' => true
                               ] 
                             )
                        </div>
                        @if(sizeof($var->variant->displayGalleries) > 0)
                            @foreach($var->variant->displayGalleries as $gal)
                                <div data-base="default">
                                    <!-- Lets make a simple image magnifier -->
                                    <div class="magnify">
                                        <!-- This is the magnifying glass which will contain the original/large version -->
                                         @include( 'templates.placeholders.simple_image_placeholders', 
                                           [
                                             'imgvar' => $gal->gallery_image, 
                                             'imgtitle' => $gal->title,
                                             'imgclasses' => 'img-fluid small',
                                             'class' => 'img-fluid small', 
                                             'width' => 800,
                                             'height' => 600, 
                                             'text' => '+', 
                                             'use_vault_logo' => true, 
                                             'use_placehold_it' => true
                                           ] 
                                         )
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
                @if(sizeof($product->displayGalleries) > 0)
                <div class="nav-slider" id="nav_default">
                          @include( 'templates.placeholders.simple_image_placeholders', 
                            [
                              'imgvar'     => $product->product_image, 
                              'imgtitle'   => $product->title,
                              'imgclasses' => 'img-fluid',
                              'class'  => 'img-fluid', 
                              'width'  => 800,
                              'height' => 600, 
                              'text'   => '+', 
                              'use_vault_logo'   => true, 
                              'use_placehold_it' => true
                            ] 
                          )
                        @foreach($product->displayGalleries as $gal)
                           @include( 'templates.placeholders.simple_image_placeholders', 
                            [
                              'imgvar'     => $gal->gallery_image, 
                              'imgtitle'   => $gal->title,
                              'imgclasses' => 'img-fluid small',
                              'class'  => 'img-fluid small', 
                              'width'  => 800,
                              'height' => 600, 
                              'text'   => '+', 
                              'use_vault_logo'   => true, 
                              'use_placehold_it' => true
                            ] 
                          )
                        @endforeach
                </div>
                @endif
                @foreach($product->variants as $var)
                    <div class="nav-slider" id="nav_variant_{{$var->variant_id}}" style="display: none;">
                        @if(sizeof($var->variant->displayGalleries) > 0)
                            @foreach($var->variant->displayGalleries as $gal)
                           @include( 'templates.placeholders.simple_image_placeholders', 
                            [
                              'imgvar'     => $gal->gallery_image, 
                              'imgtitle'   => $gal->title,
                              'imgclasses' => 'img-fluid small',
                              'class'  => 'img-fluid small', 
                              'width'  => 800,
                              'height' => 600, 
                              'text'   => '+', 
                              'use_vault_logo'   => true, 
                              'use_placehold_it' => true
                            ] 
                          )
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </section>
            <section class="col-12 col-lg-7 col-xl-5 details">
                {!! Form::open(['url' => '/cart/add/'.$product->id, 'method' => 'GET', 'class' => "pb-lg-5 pb-3"]) !!}
                <div class="title">
                    <h1 class="text-capitalize">{{$product->title}}</h1>
                </div>

                <div class="amounts">
                    <div class="price">
                        @php
                            $min = 0;
                            $minSpecial = 0;
                            $max = 0;
                            $maxSpecial = 0;

                            foreach($product->variants as $variant){
                             $variant->loadMissing('variant', 'product');
                                if($min == 0 || $min > $variant->product->price){
                                    $min = $variant->product->price;
                                }
                                if($minSpecial == 0 || $minSpecial > $variant->product->special_price){
                                    $minSpecial = $variant->product->special_price;
                                }
                                if($max == 0 || $max < $variant->product->price){
                                    $max = $variant->product->price;
                                }
                                if($maxSpecial == 0 || $maxSpecial < $variant->product->special_price){
                                    $maxSpecial = $variant->product->special_price;
                                }
                            }
                        @endphp
                        @if(($min != 0 || $minSpecial != 0) && ($max != 0 || $maxSpecial != 0))
                            <h2>R
                                @if($min > $minSpecial && $minSpecial != 0)
                                    {{number_format($minSpecial, 2, ".", ",")}}
                                @else
                                    {{number_format($min, 2, ".", ",")}}
                                @endif
                                @if($max != $min && $maxSpecial != $min)
                                    - R
                                    @if($max > $maxSpecial)
                                        {{number_format($max, 2, ".", ",")}}
                                    @else
                                        {{number_format($maxSpecial, 2, ".", ",")}}
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
                @foreach($groups as $key=>$group)
                    @if(sizeof($group->optionsImagesFilters($filteredList[$group->id])->get()) > 0)
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
                    @elseif(sizeof($filteredList[$group->id]) > 0)
                        <div class="materialContain borderTop productPadding">
                            <div class="title">
                                <h4>{{$group->title}}</h4>
                            </div>
                            <select class="w-100 form-control filter-select @if( strtolower( $group->title ) === 'size' ) numeric-sort @else alpha-sort @endif" name="filter_group_{{$group->id}}[]" required="">
                                <option value="0"> -- Select --</option>
                                @foreach(\App\Models\FilterOption::whereIn('id', $filteredList[$group->id])->get() as $option)
                                    <option value="{{$option->id}}">{{$option->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif(sizeof($filteredList[$group->id]) > 0)
                        <input type="hidden" class="form-control filter-select" name="filter_group_{{$group->id}}[]" value="{{$group->options->first()->id}}" />
                    @endif
                @endforeach
                @if($product->quantity > 0 && !empty($product->category))
                    <div class="quantityContain borderTop productPadding">
                        <div class="title">
                            <h4>Quantity:</h4>
                        </div>
                        <input type="number" name="quantity" class="form-control pr-0" min="1" value="1" required>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn smlBtn mt-0">
                                Add to cart
                            </button>
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

  <script>
    $(".filter-select").change(function(){
      if(!($(this).closest(".composite-product-block").length)){
        selectElement = this;
        var optionSet = [];

        $(".filter-select").each(function(){
          var group = $(this).attr('name').split("filter_group_").pop();
          var option = $(this).val();
          optionSet[group] = option;
        });

        var product = {{ $product->id ?? NULL }};

        $.ajax({
          type: 'get',
          url: "/products/get/variant?"+$(".details form").serialize(),
          data: {
            product_id: product,
          },
          async: false,
          dataType: 'json'

        }).done(function(data){

          console.log( data.variant_id );

          if(data.variant_id > 0 && data.variant_id != null) {
            selectElement.parentNode.closest( 'form' ).action = selectElement.parentNode
                         .closest( 'form' ).action.replace( /\d+?$/g, data.variant_id ); 

            $(".price h2").html(data.new_price);
            $(".main-slider").hide();
            $(".nav-slider").hide();

            if(data.variant_id != false){
              $("#variant_"+data.variant_id).show();
              $("#nav_variant_"+data.variant_id).show();

            }else{
              $("#slider_default").show();
              $("#nav_default").show();
              $(".main-slider").show();
              $(".nav-slider").show();
              $(".variant").hide();
            }

            $('.nav-slider').slick('refresh');
            $(".main-slider").slick('refresh');
          }

        }).fail(function(error){
          console.log(error);
        });

      }
    });
  </script>
  <script id="select-options-sorting">
    $('document').ready( function() {
      setTimeout( function() {
        console.clear();
        try {
          select_option_Sorting();
          var sInit = document.querySelector("select.filter-select");
          sInit.selectedIndex = 0;
        } catch( err ) { /* console.log( "Error: " + err + "\r\n" ); */ }
      }, 50 )
    })

    function select_option_Sorting(dbg=!0)
    { 
      $( "select.filter-select" ).append(
        $( "select.filter-select option" ).remove()
        .sort( function( a, b ) { 

          var at = parseInt( 
            $(a).text()
            .replace(/(\d+?)l|kg$/ig, '$1000')
            .replace(/(\d+?)ml|g$/ig, '$1')
          );

          var bt = parseInt( 
            $(b).text()
            .replace(/(\d+?)l|kg$/ig, '$1000')
            .replace(/(\d+?)ml|g$/ig, '$1')
          );

          if( dbg ) console.log( at + "\t" + bt );

          return (at > bt) ? 1 : ((at < bt) ? -1 : 0);

        })
      ); 
    } 
  </script>
@endsection
