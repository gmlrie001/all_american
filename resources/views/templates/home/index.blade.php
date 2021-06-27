@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')


    @if(sizeof($home_link))
        <div class="container-fluid">
            <section class="container quickLinksWrap">
                <div class="row">
                    @foreach($home_link as $homeLink)
                        <a href="{{$homeLink->link}}" class="col-6 col-lg-3 col-xl-3 contain">
                          @include( 'templates.placeholders.simple_image_placeholders', 
                            [
                              'imgvar' => $homeLink->link_image, 'imgtitle' => $homeLink->title,
                              'imgclasses' => 'img-fluid',
                              'class' => '', 'width' => 800,'height' => 600, 'text' => '+', 
                              'use_vault_logo' => true, 'use_placehold_it' => true
                            ] 
                          )
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    @endif

    @if(sizeof($home_features))
        <div class="container home-feats mt-lg-5 mt-2">
            <div class="row mb-lg-2 mb-1">
                @foreach($home_features as $homefeat)
                    <article class="card col-12 col-xl-4 mb-5 border-0">
                        <div class="card-body px-lg-0 px-3">
                            <h2 class="card-title">{{ $homefeat->title }}</h2>
                            <div class="card-text">
                                {!! $homefeat->description !!}
                            </div>
                            <a target="_self" href="{{$homefeat->link}}" class="stretched-link text-black" style="color:inherit!imporatant;">READ MORE</a>
                        </div>
                    </article>
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
                        @include('includes.pages.products.chefsblock.product_block', ['product' => $product])
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
                    @include( 'templates.placeholders.simple_image_placeholders', 
                      [
                        'imgvar' => $blog->listing_image, 'imgtitle' => $blog->title,
                        'imgclasses' => 'img-fluid',
                        'class' => '', 'width' => 800,'height' => 600, 'text' => '+', 
                        'use_vault_logo' => true, 'use_placehold_it' => true
                      ] 
                    )                    
                    <div class="row info">
                        <div class="col-12">
                            @php $date = date_create($blog->published_date); @endphp
                            <h5>{{date_format($date, 'd F Y')}}</h5>
                            <h1>{{ $blog->title }}</h1>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    @endif

    <!--@if(sizeof($homerecipes))
        <div class="container blogHome mt-5">
            <div class="row">
                <div class="col-12 sectionTitle">
                    <h2 class="text-center">Recipes</h2>
                </div>
            </div>
            <div class="row mt-5 mb-lg-1 mb-0">
                @foreach($homerecipes as $recipe)
                    <a href="/recipes/{{$recipe->url_title}}" class="col-12 col-md-6 col-lg-4 recipe-block">
                        @include( 'templates.placeholders.simple_image_placeholders', 
                          [
                            'imgvar' => $recipe->featured_image, 'imgtitle' => $recipe->title,
                            'imgclasses' => 'img-fluid',
                            'class' => '', 'width' => 800,'height' => 600, 'text' => '+', 
                            'use_vault_logo' => true, 'use_placehold_it' => true
                          ] 
                        )  
                        <div>
                            <h2>{{$recipe->title}}</h2>
                            <p>{{strip_tags(\Illuminate\Support\Str::limit($recipe->description, 200))}}</p>
                            <span>read more</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif-->

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

    @foreach($home_articles as $homeArt)
    <div class="container-fluid ctaBanner d-none d-sm-block" style="background-image:url(/{{$homeArt->banner_image}});background-repeat:no-repeat;background-position:center;background-size:cover;height:500px;margin-bottom:2px;background-color:lightgrey;">
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
