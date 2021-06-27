/**
 * Need to pass into the 
 * Need to check what the image columns may be called programmatically.
 *
 */
@php
  $table_img_columns = preg_grep( '/image/', $item->first()->getFillable() );
  $img_names         = array_values( $table_img_columns );
@endphp

@isset( $item->link )

  <a rel="noopener noreferrer" title="{{ $item->title }}" href="{{ $item->link }}" target="{{ $item->link_target }}" class="image-container">
    @isset( $item->image )
    <img class="img-fluid" alt="{{ $item->title }}" src="/{{ ltrim( $item->image, '/' ) }}">
    @else
    <div class="position-relative">
      <img class="img-fluid" alt="Placeholder background decoration" src="https://via.placehold.it/800x600">
      <img class="img-fluid position-absolute m-auto" src="vault-logo-white.svg" style="max-width:50%;max-height:50%;height:auto;top:0;bottom:0;left:0;right:0;">
    </div>
    @endisset
  </a>

@else

  <div class="image-container">
    @isset( $item->image )
    <img class="img-fluid" alt="{{ $item->title }}" src="/{{ ltrim( $item->image, '/' ) }}">
    @else
    <div class="position-relative">
      <img class="img-fluid" alt="Placeholder background decoration" src="https://via.placehold.it/800x600">
      <img class="img-fluid position-absolute m-auto" src="vault-logo-white.svg" style="max-width:50%;max-height:50%;height:auto;top:0;bottom:0;left:0;right:0;">
    </div>
    @endisset
  </div>

@endisset
