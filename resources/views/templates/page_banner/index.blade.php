@if(sizeof($page->displayBanners))
<div class="container-fluid p-0 m-auto overflow-hidden">
  <div class="row no-gutters">
    <div class="col-12 page-slider d-none d-lg-block">
      @foreach($page->displayBanners as $banner)
      <div>
        <div class="row no-gutters">
          @php
          $maxCols = ( $banner->max_columns == NULL || $banner->max_columns == 0 ) ? 1 : $banner->max_columns;
          $col     = 12 / $maxCols;
          @endphp
          @foreach($banner->displayBlocks as $block)
          <a href="{{$block->link}}" target="{{$block->link_taget}}" title="{{$block->title}}" class="col-12 col-lg-{{$block->column_count * $col}}">
            {{--  @isset( $block->banner_image )  --}}
              @include( 'templates.placeholders.simple_image_placeholders', 
                  [
                    'imgvar' => $block->banner_image, 'imgtitle' => $block->title,
                    'imgclasses' => 'img-fluid d-none d-lg-block',
                    'class' => 'd-none d-lg-block', 'width' => 1920,'height' => 603, 'text' => '+', 
                    'use_vault_logo' => true, 'use_placehold_it' => true
                  ] 
                )
            {{--  @foreach( $block->mobile_image )  --}}
          </a>
          <a href="{{$block->link}}" target="{{$block->link_taget}}" title="{{$block->title}}"
            class="p-0 col-12 col-lg-{{$block->column_count*$col}}">
              @include( 'templates.placeholders.simple_image_placeholders', 
                [
                  'imgvar' => $block->mobile_image, 'imgtitle' => $block->title,
                  'imgclasses' => 'img-fluid d-block d-lg-none',
                  'class' => 'd-block d-lg-none', 'width' => 768,'height' => 1024, 'text' => '+', 
                  'use_vault_logo' => true, 'use_placehold_it' => true
                ] 
              )
          </a>
          <a href="{{$block->link}}" class="d-none collapse hidden" target="{{$block->link_taget}}" title="{{$block->title}}"
            class="col-12 col-lg-{{$block->column_count*$col}}">
            <h1>{{$block->title}}</h1>
            {!! $block->description !!}
          </a>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
    <div class="col-12 page-slider-mobile d-block d-lg-none px-0">
      @foreach($page->displayBanners as $banner)
        @foreach($banner->displayBlocks as $block)
        <a href="{{$block->link}}" target="{{$block->link_taget}}" title="{{$block->title}}"
          class="p-0 col-12 col-lg-{{$block->column_count*$col}}">
            @include( 'templates.placeholders.simple_image_placeholders', 
              [
                'imgvar' => $block->mobile_image, 'imgtitle' => $block->title,
                'imgclasses' => 'img-fluid',
                'class' => '', 'width' => 768,'height' => 1024, 'text' => '+', 
                'use_vault_logo' => true, 'use_placehold_it' => true
              ] 
            )
        </a>
        @endforeach
      @endforeach
    </div>
  </div>
</div>
@endif
