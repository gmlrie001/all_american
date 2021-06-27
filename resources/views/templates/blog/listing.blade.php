@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
   
    <div class="container blogContain">
        <div class="row blogWrap">
            @foreach($news as $key => $new)
                <a href="/blog/{{$new->url_title}}" class="col-12 col-md-6 col-lg-4 content moreLoad @if($key > 11) hidden @endif">
                    @include( 'templates.placeholders.simple_image_placeholders', 
                      [
                        'imgvar' => $new->listing_image, 'imgtitle' => $new->title,
                        'imgclasses' => 'img-fluid',
                        'class' => '', 'width' => 800,'height' => 600, 'text' => '+', 
                        'use_vault_logo' => true, 'use_placehold_it' => true
                      ] 
                    )
                    <div class="row info">
                        <div class="col-12">
                            @php
                                $date = date_create($new->published_date);
                            @endphp
                            <h5>{{date_format($date, 'd F Y')}}</h5>
                            <h1>{{$new->title}}</h1>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="row">        
            <a href="/" class="col-12 text-center link loadMore" title="view all our products">View more posts</a>
        </div>
    </div>

@endsection