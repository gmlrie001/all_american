@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')

<div class="container-fluid bgGrey pageHeader">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col breadCrumb">
                    <h1>{{$page->title}} <i>({{sizeof($products)}})</i></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 productListWrap beforeFooterWrap">
          <div class="row">
            @foreach($products as $product)
              @include('templates.products.product_block', ['product' => $product])
            @endforeach
          </div>
          <div class="row">        
            <a href="/" class="col-12 text-center link loadMore" title="view all our products">Load more</a>
          </div>
        </div>
      </div>
    </div>
@endsection