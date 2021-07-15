@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')

    @if(sizeof($homeLinks))
        <div class="container-fluid">
            <section class="container quickLinksWrap">
                <div class="row">
                    @foreach($homeLinks as $homeLink)
                        <a href="{{$homeLink->link}}" class="col-6 col-lg-3 col-xl-3 contain">
                        @if( $homeLink->link_image && $homeLink->link_image != '' )
                    <img class="img-fluid" src="/{{$homeLink->link_image}}" alt="{{$homeLink->title}}">
                  @else
                    @include( 'includes.vault.placeholders.simple_image_placeholders' )
                  @endif
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    @endif

    @if(sizeof($homeFeats))
        <div class="container home-feats mt-lg-5 mt-2">
            <div class="row mb-lg-2 mb-1">
                @foreach($homeFeats as $homefeat)
                    <a href="{{$homefeat->link}}" class="col-12 col-xl-4 mb-5">
                        <h2>{{$homefeat->title}}</h2>
                        {!! $homefeat->description !!}
                        <strong>READ MORE</strong>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
    
    @if(sizeof($on_sale_products))
        <div class="container-fluid">
            <div class="container productHome">
                <div class="row">
                    <div class="col-12 sectionTitle">
                        <h2 class="text-center">Trending on {{ ucwords( $site_settings->site_name ) }}</h2>
                    </div>
                </div>
                <div class="row productWrap">
                    @foreach($on_sale_products as $product)
                        @include('includes.pages.products.product_block', ['product' => $product])
                    @endforeach
                </div>
                <div class="row">
                    <a href="/shop" class="col-12 text-center link" title="view all our products">View all products</a>
                </div>
            </div>
        </div>
    @endif

    @if(sizeof($blogs))
        <div class="container blogHome mt-lg-5 mt-2">
            <div class="row">
                <div class="col-12 sectionTitle">
                    <h2 class="text-center">From our blog</h2>
                </div>
            </div>
            <div class="row blogWrap mb-lg-3 mb-1">
                @foreach($blogs as $blog)
                <a href="/blog/{{$blog->url_title}}/" class="col-12 col-md-6 content">
                @if( $blog->listing_image && $blog->listing_image != '' )
                    <img class="img-fluid" src="/{{$blog->listing_image}}" alt="{{$blog->title}}">
                  @else
                    @include( 'includes.vault.placeholders.simple_image_placeholders' )
                  @endif
                    <div class="row info">
                        <div class="col-12">
                            @php
                                $date = date_create($blog->published_date);
                            @endphp
                            <h5>{{date_format($date, 'd F Y')}}</h5>
                            <h1>{{$blog->title}}</h1>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    @endif

    @if(sizeof($homerecipes))
        <div class="container blogHome mt-5">
            <div class="row">
                <div class="col-12 sectionTitle">
                    <h2 class="text-center">Recipes</h2>
                </div>
            </div>
            <div class="row mt-5 mb-lg-1 mb-0">
                @foreach($homerecipes as $recipe)
                    <a href="/recipes/{{$recipe->url_title}}" class="col-12 col-md-6 col-lg-4 recipe-block">
                    @if( $recipe->featured_image && $recipe->featured_image != '' )
                    <img class="img-fluid" src="/{{$recipe->featured_image}}" alt="{{$recipe->title}}">
                  @else
                    @include( 'includes.vault.placeholders.simple_image_placeholders' )
                  @endif
                        <div>
                            <h2>{{$recipe->title}}</h2>
                            <p>{{\Illuminate\Support\Str::limit(strip_tags($recipe->description, 200))}}</p>
                            <span>read more</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if( $site_settings->home_title && $site_settings->home_description )
    <div class="container mt-lg-5 mt-2">
	@isset( $site_settings->home_title )
        <div class="row">
            <div class="col-12 sectionTitle">
                <h2 class="text-center">{{$site_settings->home_title}}</h2>
            </div>
        </div>
	@endisset
	@isset( $site_settings->home_description )
        <div class="row article mb-lg-1 mb-0">
            <div class="col-12 col-md-10 text-center mx-auto">
                {!! $site_settings->home_description !!}
            </div>
        </div>
	@endisset
    </div>
    @endif

    @foreach($homeArts as $homeArt)
    @if( $homeArt->banner_image && $homeArt->banner_image != '' )
                    <img class="img-fluid" src="/{{$homeArt->banner_image}}" alt="{{$homeArt->title}}">
                  @else
                    @include( 'includes.vault.placeholders.simple_image_placeholders' )
                  @endif
        <div class="row">
            <div class="col-12 col-md-9 col-xl-6 offset-xl-1 heroText">
                <h3>{{$homeArt->title}}</h3>
                <h1>{{$homeArt->subtitle}}</h1>
                {!! $homeArt->description !!}
                <a class="btn smlBtn" href="{{$homeArt->link}}">{{$homeArt->link_text}}</a>
            </div>
        </div>
    </div>
    @endforeach
    
@endsection
