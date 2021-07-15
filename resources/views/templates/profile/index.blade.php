@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
   	<div class="container-fluid profile-top-nav px-lg-0 px-3">
	  <div class="row no-gutters">
	    <div class="container profile-nav d-none d-lg-block px-lg-0 px-3">
            <div class="row">
                <div class="col-12">
                    <a href="/profile" class="@if( Request::is('profile') ) active @endif">Profile</a>
                    <a href="/profile/addresses" class="@if( Request::is('profile/addresses') ) active @endif">addresses</a>
                    <a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif">current orders</a>
                    <a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif">past orders</a>
                    @if ( in_array( "Vault\StoreCredit\StoreCreditServiceProvider", get_declared_classes() ) )
                    <a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif">wallet</a>
                    @endif
                </div>
            </div>
        </div>
	    <div class="container mobile-profile-nav d-block d-lg-none">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <a href="/profile" class="@if( Request::is('profile') ) active @endif profile fa fa-user"></a>
                        <a href="/profile/addresses" class="@if( Request::is('profile/addresses') ) active @endif profile-addresses fa fa-address-book"></a>
                        <a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif profile-current-orders fa fa-shopping-cart"></a>
                        <a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif profile-past-orders fa fa-shopping-basket"></a>
                        <a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif profile-wallet fa fa-wallet"></a>
                    </div>
                </div>
            </div>
          </div>
      </div>
    <div class="container my-lg-5 my-4">
        <div class="row">
			<div class="col-12 profile-form">
				<div class="row">
                    {!! Form::model($user, array('data-parsley-validate' => '', 'class'=>'col-12 col-lg-10')) !!}
                        {!! Form::hidden('id', $user->id) !!}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('name', 'First Name') !!}
                                {!! Form::text('name', null, array('placeholder' => 'First Name', 'class' => 'form-control', 'required' => '', 'data-parsley-error-message' => 'Information required')) !!}
                                <div class="label label-danger">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('surname', 'Last Name') !!}
                                {!! Form::text('surname', null, array('placeholder' => 'Last Name', 'class' => 'form-control', 'required' => '', 'data-parsley-error-message' => 'Information required')) !!}
                                <div class="label label-danger">{{ $errors->first('surname') }}</div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('email', 'Email Address') !!}
                                {!! Form::text('email', null, array('placeholder' => 'Email Address', 'class' => 'form-control', 'required' => '', 'data-parsley-type'=>"email")) !!}
                                <div class="label label-danger">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('mobile', 'Contact Number') !!}
                                {!! Form::text('mobile', null, array('placeholder' => 'Contact Number', 'class' => 'form-control', 'required' => '', 
                                'data-parsley-required'=>"true" ,
                                'data-parsley-length'=>"[7, 20]")) !!}
                                <div class="label label-danger">{{ $errors->first('mobile') }}</div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'minlength' => '8')) !!}
                                <div class="label label-danger">{{ $errors->first('password') }}</div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                                {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class' => 'form-control', 'minlength' => '8')) !!}
                                <div class="label label-danger">{{ $errors->first('password_confirmation') }}</div>
                            </div>
                        </div>
                        {!! Honeypot::generate('my_name', 'my_time') !!}
                        {!! Form::button('Save Changes', array('type' => 'submit', 'class' => 'red-button')) !!}
                    {!! Form::close() !!}
                </div>
			</div>
		</div>
	</div>
@endsection
