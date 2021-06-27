@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')

<div class="container-fluid bgGrey pageHeader">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col breadCrumb">
                    <h1>Forgot Password</h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container beforeFooterWrap">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6  ">
                <div class="formBlock borderWrap">
                    <div class="article">
                        <h3>Forgot password</h3>
                        <p>To reset your accounts password, enter your email address and check your inbox for instruction</p>
                    </div>
                    <div class="form">
                        {!! Form::open(['url' => '/forgot', 'id' => 'forgot_form']) !!}
                        <form action="post">
                            <div class="form-group">
                                <label for="Email">Email Address*</label>
                                <input name="email" type="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <button class="btn smlBtn" type="submit">
                                Reset
                            </button>
                            {!! Honeypot::generate('my_name', 'my_time') !!}
                        </form>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection