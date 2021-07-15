@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
   
   <div class="container mt-3 mb-5">
        <div class="row">
            @php $recipes = $recipes->sortBy( 'order' ); @endphp
            @foreach($recipes as $recipe)
              <div class="col-12 col-lg-4 recipe-block">
                  <a href="/recipes/{{$recipe->url_title}}">
                      @include( 'templates.placeholders.simple_image_placeholders',
                        [
                          'imgvar' => $recipe->featured_image, 'imgtitle' => $recipe->title,
                          'imgclasses' => 'img-fluid',
                          'class' => '', 'width' => 800,'height' => 600, 'text' => '+',
                          'use_vault_logo' => true, 'use_placehold_it' => true
                        ]
                      )
                  </a>
                  <div>
                      <a href="/recipes/{{$recipe->url_title}}">
                        <h2>{{$recipe->title}}</h2>
                          <div class="p-0">
                                {!! \Illuminate\Support\Str::limit( $recipe->description, 200 ) !!}
                          </div>
                        <span>read more</span>
                      </a>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection