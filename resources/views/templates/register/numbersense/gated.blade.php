@extends('layouts.sites.numbersense')

@section('content')
    <div class="container-fluid p-0">
        <div class="row row-eq-height">
            <div class="col-12 col-md-7 about-text blue dont-expand">
                {!! Form::open(['url' => '/register', 'class' => 'login-form reg-form']) !!}
                    <h1>Registration</h1>
                    <p>To view selected content on this website (at no charge) and/or to purchase products from the store you need to be a registered user. Please complete the details below to register. On completing your registration you will be granted access to all the materials on the website and/or be able to purchase from the store.</p>
                    <div class="form-group">
                        <label>First Name*</label>
                        <input class="form-control" name="name" placeholder="First name" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Surname*</label>
                        <input class="form-control" name="surname" placeholder="Surname" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Select institution*</label>
                        <select name="company" class="form-control changes-required" required="">
                            <option value="">Select institution</option>
                            <option value="teacher">Teacher</option>
                            <option value="individual">Private individual</option>
                            <option value="school">School</option>
                            <option value="organisation">Organisation</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group can-be-required">
                        <label>Institution name</label>
                        <input class="form-control" name="specify" placeholder="Institution name" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Email address*</label>
                        <input class="form-control" name="email" placeholder="Email address" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Password*</label>
                        <input class="form-control" name="password" placeholder="Password" type="password" required="" />
                    </div>
                    <div class="form-group">
                        <label>Confirm password*</label>
                        <input class="form-control" name="password_confrimation" placeholder="Confirm Password" type="password" required="" />
                    </div>
                    <div class="form-group">
                        <label class="custom-checkbox">
                            <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" name="subscribed" value="1">
                            <label for="styled-checkbox-1">I want to receive news and updates about the NumberSense Mathematics Programme.</label>
                        </label>
                    </div>
                    <input name="user_group_id" value="1" type="hidden" />
                    <div class="form-group">
                        <input class="btn" type="submit" value="Register" />
                        <a class="reg-btn float-right" href="/login/general">Login</a>
                    </div>
                    {!! Honeypot::generate('my_name', 'my_time') !!}
                {!! Form::close() !!}
            </div>
            <div class="col-12 col-md-5 p-0">
                <img src="/assets/images/template/account/general_register.jpg" class="img-fluid" />
            </div>
        </div>
    </div>
@endsection