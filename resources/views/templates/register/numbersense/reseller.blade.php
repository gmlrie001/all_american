@extends('layouts.sites.numbersense')

@section('content')
    <div class="container-fluid p-0">
        <div class="row row-eq-height">
            <div class="col-12 col-md-7 about-text blue dont-expand">
                {!! Form::open(['url' => '/register', 'class' => 'login-form reg-form']) !!}
                    <h1>Reseller Registration</h1>
                    <p>To purchase products in the store as a reseller, you need to be a registered reseller To registeras reseller please complete all the details requested and select the register button to register.<br><br>Your application will be processed and you will receive an email within two working days.For further enquiries please contact accounts@brombacher.co.za</p>
                    <div class="form-group">
                        <label>Company Name*</label>
                        <input class="form-control" name="company" placeholder="Company Name" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Company registration number*</label>
                        <input class="form-control" name="reg_no" placeholder="Company registration number" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Company VAT number*</label>
                        <input class="form-control" name="vat_no" placeholder="Company VAT number" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Name of contact person*</label>
                        <input class="form-control" name="name" placeholder="Name of contact person" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Email of contact person*</label>
                        <input class="form-control" name="email" placeholder="Email of contact person" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Physical address of company*</label>
                        <input class="form-control" name="phys_add" placeholder="Physical address of company" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label>Postal address of company*</label>
                        <input class="form-control" name="post_add" placeholder="Postal address of company" type="text" required="" />
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
                    <input name="user_group_id" value="2" type="hidden" />
                    <div class="form-group">
                        <input class="btn" type="submit" value="Register" />
                        <a class="reg-btn float-right" href="/login/reseller">Login</a>
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