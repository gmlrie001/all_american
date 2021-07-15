@extends('layouts.sites.numbersense')

@section('content')
    <div class="container-fluid p-0">
        <div class="row row-eq-height">
            <div class="col-12 col-md-5 about-text blue">
                {!! Form::open(['url' => '/login', 'class' => 'login-form']) !!}
                    <h1>Login</h1>
                    <p>This form allows you to login to purchase products from our shop and see some of our specialty content.</p>
                    <div class="form-group">
                        <input class="form-control" name="email" placeholder="Email" type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password" placeholder="Password" type="password" />
                    </div>
                    <div class="form-group">
                        <input class="btn" type="submit" value="Send" />
                        <a class="login-btn" href="/forgot">Forgot password?</a>
                    </div>
                    {!! Honeypot::generate('my_name', 'my_time') !!}
                {!! Form::close() !!}
            </div>
            <div class="col-12 col-md-7 about-text white">
                {!! Form::open(['url' => '/register', 'class' => 'register-form']) !!}
                    <h1>Reseller Register</h1>
                    <p>This form allows you to register to buy on the NumberSense Store as a School Organisation or other</p>
                    <div class="form-group">
                        <input class="form-control" name="name" placeholder="Full name" type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="email" placeholder="Email address" type="text" />
                    </div>
                    <div class="form-group">
                        <select name="company" class="form-control">
                            <option value="">Select company</option>
                            <option value="school"></option>
                            <option value="organisation"></option>
                            <option value="other"></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="specify" placeholder="Please Specify" type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password" placeholder="Password" type="password" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password_confrimation" placeholder="Confirm Password" type="password" />
                    </div>
                    <input name="user_group_id" value="2" type="hidden" />
                    <div class="form-group">
                        <input class="btn" type="submit" value="Register" />
                    </div>
                    {!! Honeypot::generate('my_name', 'my_time') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection