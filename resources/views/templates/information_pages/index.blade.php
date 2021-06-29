@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')

@if($page->description != null)
<div class="container-fluid introWrap py-lg-2">
  <div class="row">
    <div class="container">
      <div class="row">
          <div class="col-12 col-md-10 mx-auto sectionTitle py-lg-0 py-3">
              <h2 class="text-left">{{ $page->title }}</h2>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid articles">
  <div class="row">
    <div class="container">
      <div class="row article">
          <div class="col-12 col-md-10 mx-auto">
              {!! $page->description !!}
          </div>
      </div>
    </div>
  </div>
</div>

@else 
<div class="container-fluid pageHeader">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col breadCrumb">
        <h1>{{$page->title}}</h1>
      </div>
    </div>
  </div>
</div>
@endif

<div class="container articleWrap">
  @foreach($page->displayArticles as $key => $article)
    @include('templates.information_pages.article.index', ['article' => $article])
  @endforeach
</div>

@endsection
