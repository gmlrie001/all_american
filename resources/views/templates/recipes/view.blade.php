@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
    <div class="container-fluid bgGrey pageHeader">
      <div class="row align-items-center">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col breadCrumb">
                    <a class="d-inline" href="/recipes/">Recipes</a>
                    <h1>{{$article->title}}</h1>
                </div>
                <a href="#" class="sharing share-open"><i class="fa fa-share-alt"></i></a>
            </div>
        </div>
      </div>
    </div>
    
    <div class="container mt-3 mb-5 blogArticle">
        <div class="row article">
            <div class="col-12 col-lg-5 col-xl-6 image">
                @include( 'templates.placeholders.simple_image_placeholders', 
                      [
                        'imgvar' => $article->featured_image, 'imgtitle' => $article->title,
                        'imgclasses' => 'img-fluid',
                        'class' => '', 'width' => 800,'height' => 600, 'text' => '+', 
                        'use_vault_logo' => true, 'use_placehold_it' => true
                      ] 
                    )  
            </div>
            <div class="col-12 col-lg-7 col-xl-6 info">
                <div class="row mb-3">
                    <div class="col-4 col-lg-4 time-block">
                        <img class="img-fluid float-left" src="/assets/template/prep.png" />
                        <div class="float-left">
                            <p>Prep Time</p>
                            <span>{{$article->prep_time}}</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4 time-block">
                        <img class="img-fluid float-left" src="/assets/template/cook.png" />
                        <div class="float-left">
                            <p>Cooking Time</p>
                            <span>{{$article->cook_time}}</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4 time-block">
                        <img class="img-fluid float-left" src="/assets/template/serves.png" />
                        <div class="float-left">
                            <p>Serves</p>
                            <span>{{$article->serves}}</span>
                        </div>
                    </div>
                </div>
                <h3>{{$article->title}}</h3>
                {!! $article->description !!}
            </div>
            <div class="col-12 sectionTitle mt-lg-5 mt-4">
                <h2 class="text-center">What you will need</h2>
            </div>
            <div class="col-12 info">
                {!! $article->ingredients !!}
            </div>
            <div class="col-12 sectionTitle mt-lg-5 mt-4">
                <h2 class="text-center">Method</h2>
            </div>
            <div class="col-12 info">
                {!! $article->method !!}
            </div>
        </div>
    </div>
{{--
    @if( count( $article->relatedRecipes ) > 0 )
    <div class="container blogHome blogContain mb-lg-5 mb-4">
        <div class="row">
            <div class="col-12 sectionTitle mt-lg-5 mt-4">
                <h2 class="text-center">You may also like</h2>
            </div>
        </div>
        <div class="row blogWrap justify-content-center">
            @forelse($article->relatedRecipes as $recipe)
                <a href="/recipes/{{$recipe->related->url_title}}" class="col-6 col-lg-3 recipe-block">
                @if( $recipe->related->featured_image && $recipe->related->featured_image != '' )
                    <img class="img-fluid" src="/{{$recipe->related->featured_image}}" alt="{{$$recipe->related->title}}">
                  @else
                    @include( 'includes.vault.placeholders.simple_image_placeholders' )
                  @endif
                    <div>
                        <h2>{{$recipe->related->title}}</h2>
                        <p>{{\Illuminate\Support\Str::limit(strip_tags($recipe->related->description, 200))}}</p>
                        <span>read more</span>
                    </div>
                </a>
	    @empty
            @endforelse
        </div>
    </div>
    @endif
--}}
@endsection
