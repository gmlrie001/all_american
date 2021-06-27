@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
<div class="container-fluid bgGrey pageHeader">
  <div class="row align-items-center">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col breadCrumb">
          <h1>{{$page->title}}</h1>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container faqContain beforeFooterWrap">
  <div class="row">
    <div class="col-12 d-block d-lg-none selectorTitle">
      <a href="#">All</a>
    </div>
    <div class="col-12 col-lg-3 col-xl-4 selectors">
      <a class="active" href="0">All</a>
      @foreach($categories as $key => $category)
      <a class="" href="{{$category->id}}">{{$category->title}}</a>
      @endforeach
    </div>
    <div class="col-12 col-lg-9 col-xl-8 ">
      <div class="answerContain">
        <div class="row">
          <div class="col-12">
            <h2 class="update-me-title">All</h2>
          </div>
        </div>
        <div class="row">
          @foreach($categories as $category)
          @foreach($category->displayFaqs as $faq)
          <div class="col-12 questionBlock" id="" data-category="{{$faq->category_id}}">
            <h3>{{$faq->title}}</h3>
            <div>
              {!! $faq->description !!}
            </div>
          </div>
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
