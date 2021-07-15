@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
<div class="container-fluid bgGrey pageHeader">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col breadCrumb">
                <a class="d-inline" href="/blog/">Blog</a>
                <h1>{{$article->title}}</h1>
            </div>
            <a href="#" class="sharing share-open"><i class="fa fa-share-alt"></i></a>
        </div>
    </div>
</div>

<div class="container blogArticle mb-lg-5 mb-4">
    <div class="row article">
        <div class="col-12 info">
                    @include( 'templates.placeholders.simple_image_placeholders', 
                            [
                              'imgvar' => $article->article_image, 'imgtitle' => $article->title,
                              'imgclasses' => 'img-fluid',
                              'class' => 'col-lg-6 col-12', 'width' => 600,'height' => 480, 'text' => '+', 
                              'use_vault_logo' => true, 'use_placehold_it' => true
                            ] 
                          )
            @php
            $date = date_create($article->published_date);
            @endphp
            <h5>{{date_format($date, 'd F Y')}}</h5>
            <h3>{{$article->title}}</h3>
            {!! $article->description !!}
        </div>
        @foreach($article->displayGallery as $gl)
        @if($gl->video_url != null)
        <a class="col-6 col-md-6 col-lg-3 col-xl-4 popup-gallery-{{$gl->id}} mfp-iframe mb-4" href="{{$gl->video_url}}">
            @include( 'templates.placeholders.simple_image_placeholders', 
              [
                'imgvar' => $gl->article_image, 'imgtitle' => $gl->title,
                'imgclasses' => 'img-fluid',
                'class' => 'col-lg-6 col-12', 'width' => 600,'height' => 480, 'text' => '+', 
                'use_vault_logo' => true, 'use_placehold_it' => true
              ] 
            )
        </a>
        @else
        <a class="col-6 col-md-6 col-lg-3 col-xl-4 popup-gallery-{{$gl->id}} mfp-image mb-4" href="/{{$gl->gallery_image}}">
          @include( 'templates.placeholders.simple_image_placeholders', 
            [
              'imgvar' => $gl->gallery_image, 'imgtitle' => $gl->title,
              'imgclasses' => 'img-fluid',
              'class' => 'col-12 col-lg-6', 'width' => 600,'height' => 480, 'text' => '+', 
              'use_vault_logo' => true, 'use_placehold_it' => true
            ] 
          )
        </a>
        @endif
        @endforeach
    </div>
</div>
@endsection
