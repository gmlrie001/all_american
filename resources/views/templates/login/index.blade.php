@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')

@push( 'pageStyles' )
<style id="oauth-styling">
@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
.login h5 {
  width: 100%; 
  text-align: center; 
  border-bottom: 1px solid #000; 
  line-height: 0.1em;
  margin: 10px 0 20px; 
} 
.login h5 span {
  background: #fff;
  padding: 1rem;
  line-height: 0;
}
.sign span {
  display: unset;
}
form input,
.formBlock form .form-control {
  font-family: "Montserrat", sans-serif;
  font-size: 13px;
  font-weight: 500;
}
form input,
.formBlock form .form-control,
::-webkit-input-placeholder,
::-moz-placeholder,
:-ms-input-placeholder,
:-moz-placeholder {
  font-family: "Montserrat", sans-serif;
  font-size: 13px;
  font-weight: 500;
}
/*
form ul {
  display: none;
  max-height: 0;
  overflow: hidden;
}
*/

.input-requirements {
    font-family: "Montserrat", sans-serif;
    font-size: 10px;
    font-style: italic;
    text-align: left;
    list-style: disc;
    list-style-position: inside;
    color: #8e8e8e;
    margin:0;
    padding: 0 5px;
}
.input-requirements li.invalid {
    color: #e74c3c;
}
.input-requirements li.valid {
    color: #2ecc71;
}
/*.input-requirements li.valid:after {
    display: inline-block;
    padding-left: 10px;
    content: "\2713";
}*/

/* Hide and show related .input-requirements when interacting with input */
input:not([type="submit"]) + .input-requirements {
    overflow: hidden;
    max-height: 0;
    transition: max-height 1s ease-out;
}
input:not([type="submit"]):hover + .input-requirements,
input:not([type="submit"]):focus + .input-requirements,
input:not([type="submit"]):active + .input-requirements {
    max-height: 1000px; /* any large number (bigger then the .input-requirements list) */
    transition: max-height 1s ease-in;
}
</style>
@endpush

<div class="container sign topMargin beforeFooterWrap px-0">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="formBlock borderWrap">
                    <div class="article">
                        <h3>LOG IN WITH SOCIAL MEDIA</h3>
                    </div>
                    <div class="form mb-4">
                        {!! Form::open(['url' => '/login', 'class' => 'login']) !!}
                            <div class="form-group oauth-login no-gutters my-3">
                                <label class="col m-0 mb-1" style="max-height:50px;line-height:50px;padding:0;line-height:50px;">
                                  <a style="font-family:'Montserrat',sans-serif;font-size:13px;max-height:50px;line-height:50px;background-color:#dd4b39;color:#fff;font-weight:500;width:100%;text-align:center;border:1px solid #dd4b39;" class="google-signin m-0" title="Signin using your google account" rel="noopener noreferer" href="/login/google?redirect_to={{ URL::previous() }}">
                                    <i class="fab fa-google mx-1"></i> Google Login
                                  </a>
                                </label>
                                <label class="col m-0 mb-1" style="max-height:50px;line-height:50px;padding:0;line-height:50px;">
                                  <a style="font-family:'Montserrat',sans-serif;font-size:13px;max-height:50px;line-height:50px;background-color:#23346d;color:#fff;font-weight:500;width:100%;text-align:center;border:1px solid #23346d;" class="facebook-signin m-0" title="Signin using your google account" rel="noopener noreferer" href="/login/facebook?redirect_to={{URL::previous() }}">
                                    <i class="fab fa-facebook-f mx-1"></i> Facebook Login
                                  </a>
                                </label>
                            </div>
                            <div class="form-group no-gutters pb-0 text-center pt-2"><h5><span>OR</span></h5></div>
                        <div class="article">
                            <h3>LOG IN WITH EMAIL ADDRESS</h3>
                        </div>
                            <div class="form-group">
                                <label for="PasswordNew">Email Address*</label>
                                <input name="email" type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <input type="hidden" name="redirect_to" value="{{ Session::get('intended.url') }}" />
                            <div class="form-group" style="margin-bottom:0.875rem!important;">
                                <label for="Password">Password*</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter your Password" required>
                            </div>
                            {!! Honeypot::generate('my_name', 'my_time') !!}
                            <a class="text-right mb-3 mt-0 font-weight-bold" href="/my-account/lost-password">Forgot password?</a>
                            <button class="btn smlBtn" type="submit">LOG IN</button>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-7 mt-5 mt-lg-0">
                <div class="formBlock borderWrap">
                    <div class="article">
                        <h3>REGISTER</h3>
                    </div>
                    <div class="form">
                        {!! Form::open(['url' => '/register', 'class' => 'registration form-row mb-4', 'id' => 'registration']) !!}
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 form-group my-2">
                                <label for="NameFirst">First name *</label>
                                <input id="NameFirst" name="name" type="text" class="form-control" placeholder="First Name" value="{{ old( 'name' ) }}" minlength="3" pattern="[\w\d?]+[^\W]*?" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 form-group my-2">
                                <label for="NameLast">Last name *</label>
                                <input id="NameLast" name="surname" type="text" class="form-control" placeholder="Last Name" value="{{ old( 'surname' ) }}" minlength="3" pattern="[\w\d?]+[^\W]*?" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 form-group my-2">
                                <label for="email">Email Address * </label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email" value="{{ old( 'email' ) }}" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 form-group my-2">
                                <label for="email_confirmation">Confirm Email Address * </label>
                                    <input id="email_confirmation" name="email_confirmation" type="email" class="form-control" placeholder="Re-enter your email" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 form-group my-2">
                                <label for="password">Password *
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter your Password" maxlength="16" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="At least one number, one lowercase and one uppercase letter at least 8 characters" required>
                                    <ul class="input-requirements">
                                      <li>At least 8 characters (and less than 16) long</li>
                                      <li>Contains at least 1 number</li>
                                      <li>Contains at least 1 lowercase letter</li>
                                      <li>Contains at least 1 uppercase letter</li>
                                      <li>Contains a special character (e.g. @, !, etc.)</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 form-group my-2">
                                <label for="password_repeat">Confirm Password
                                    <input id="password_repeat" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" maxlength="16" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="At least one number, one lowercase and one uppercase letter at least 8 characters" required>
                                    <ul class="input-requirements">
                                        <li>At least 8 characters (and less than 16) long</li>
                                        <li>Contains at least 1 number</li>
                                        <li>Contains at least 1 lowercase letter</li>
                                        <li>Contains at least 1 uppercase letter</li>
                                        <li>Contains a special character (e.g. @, !, etc.)</li>
                                        <li>This password needs to match!</li>
                                    </ul>
                                </label>
                            </div>
                            <input name="user_group_id" value="1" type="hidden" />
                            <input type="hidden" name="redirect_to" value="{{ Session::get('intended.url') }}" />
                            <div class="col-12 form-group my-3">
                              <label for="terms-and-conditions" class="d-flex flex-row">
                                 <input type="checkbox" name="tsncs" class="mr-3 mt-1" id="terms-and-conditions" value="1" required>
                                 <a href="/terms-and-conditions" target="_blank" class="d-inline m-0" title="Read our terms &amp; conditions">By Signing up you agree to our <strong>Terms &amp; Conditions</strong></a>
                              </label>
                            </div>
                            <div class="misc-errors"></div>
                            <div class="form-group">
                                <div class="g-recaptcha" id="g-captcha"></div>
                            </div>
                            <button class="btn smlBtn green my-0" type="submit">
                                REGISTER
                            </button>
                        {!! Honeypot::generate('my_name', 'my_time') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@push( 'pageScripts' )
<script type="application/javascript">

    /* ----------------------------

     CustomValidation prototype

     - Keeps track of the list of invalidity messages for this input
     - Keeps track of what validity checks need to be performed for this input
     - Performs the validity checks and sends feedback to the front end

     ---------------------------- */
    function CustomValidation(input) {
        this.invalidities = [];
        this.validityChecks = [];

        //add reference to the input node
        this.inputNode = input;

        //trigger method to attach the listener
        this.registerListener();
    }
    CustomValidation.prototype = {
        addInvalidity: function(message) {
            this.invalidities.push(message);
        },
        getInvalidities: function() {
            return this.invalidities.join('. \n');
        },
        checkValidity: function(input) {
            for ( var i = 0; i < this.validityChecks.length; i++ ) {

                var isInvalid = this.validityChecks[i].isInvalid(input);
                if (isInvalid) {
                    this.addInvalidity(this.validityChecks[i].invalidityMessage);
                }

                var requirementElement = this.validityChecks[i].element;

                if (requirementElement) {
                    if (isInvalid) {
                        requirementElement.classList.add('invalid');
                        requirementElement.classList.remove('valid');
                    } else {
                        requirementElement.classList.remove('invalid');
                        requirementElement.classList.add('valid');
                    }

                } // end if requirementElement
            } // end for
        },
        checkInput: function() { // checkInput now encapsulated

            this.inputNode.CustomValidation.invalidities = [];
            this.checkValidity(this.inputNode);

            if ( this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '' ) {
                this.inputNode.setCustomValidity('');
            } else {
                var message = this.inputNode.CustomValidation.getInvalidities();
                this.inputNode.setCustomValidity(message);
            }
        },
        registerListener: function() { //register the listener here

            var CustomValidation = this;

            this.inputNode.addEventListener('keyup', function() {
                CustomValidation.checkInput();
            });


        }

    };

    /* ----------------------------

     Validity Checks

     The arrays of validity checks for each input
     Comprised of three things
     1. isInvalid() - the function to determine if the input fulfills a particular requirement
     2. invalidityMessage - the error message to display if the field is invalid
     3. element - The element that states the requirement

     ---------------------------- */

    var passwordValidityChecks = [
        {
            isInvalid: function(input) {
                return input.value.length < 8 | input.value.length > 100;
            },
            invalidityMessage: 'This input needs to be between 8 and 100 characters',
            element: document.querySelector('label[for="password"] .input-requirements li:nth-child(1)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[0-9]/g);
            },
            invalidityMessage: 'At least 1 number is required',
            element: document.querySelector('label[for="password"] .input-requirements li:nth-child(2)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[a-z]/g);
            },
            invalidityMessage: 'At least 1 lowercase letter is required',
            element: document.querySelector('label[for="password"] .input-requirements li:nth-child(3)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[A-Z]/g);
            },
            invalidityMessage: 'At least 1 uppercase letter is required',
            element: document.querySelector('label[for="password"] .input-requirements li:nth-child(4)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[\!\@\#\$\%\^\&\*]/g);
            },
            invalidityMessage: 'You need one of the required special characters',
            element: document.querySelector('label[for="password"] .input-requirements li:nth-child(5)')
        }
    ];
    var passwordRepeatValidityChecks = [
        {
            isInvalid: function() {
                return passwordRepeatInput.value != passwordInput.value;
            },
            invalidityMessage: 'This password needs to match the first one',
            element: document.querySelector('label[for="password_repeat"] .input-requirements li:nth-child(6)')
        },
        {
            isInvalid: function(input) {
                return input.value.length < 8 | input.value.length > 100;
            },
            invalidityMessage: 'This input needs to be between 8 and 100 characters',
            element: document.querySelector('label[for="password_repeat"] .input-requirements li:nth-child(1)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[0-9]/g);
            },
            invalidityMessage: 'At least 1 number is required',
            element: document.querySelector('label[for="password_repeat"] .input-requirements li:nth-child(2)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[a-z]/g);
            },
            invalidityMessage: 'At least 1 lowercase letter is required',
            element: document.querySelector('label[for="password_repeat"] .input-requirements li:nth-child(3)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[A-Z]/g);
            },
            invalidityMessage: 'At least 1 uppercase letter is required',
            element: document.querySelector('label[for="password_repeat"] .input-requirements li:nth-child(4)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[\!\@\#\$\%\^\&\*]/g);
            },
            invalidityMessage: 'You need one of the required special characters',
            element: document.querySelector('label[for="password_repeat"] .input-requirements li:nth-child(5)')
        }
    ];

    /* ----------------------------

     Setup CustomValidation

     Setup the CustomValidation prototype for each input
     Also sets which array of validity checks to use for that input

     ---------------------------- */
    var passwordInput = document.getElementById('password');
    var passwordRepeatInput = document.getElementById('password_repeat');

    passwordInput.CustomValidation = new CustomValidation(passwordInput);
    passwordInput.CustomValidation.validityChecks = passwordValidityChecks;

    passwordRepeatInput.CustomValidation = new CustomValidation(passwordRepeatInput);
    passwordRepeatInput.CustomValidation.validityChecks = passwordRepeatValidityChecks;

    /* ----------------------------

     Event Listeners

     ---------------------------- */
    var inputs = document.querySelectorAll('#registration input:not([type="submit"])');
    var submit = document.querySelector('#registration button[type="submit"');
    var form = document.getElementById('registration');

    function validate() {
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].CustomValidation.checkInput();
        }
    }

    submit.addEventListener('click', validate);
    form.addEventListener('submit', validate);

</script>
<script>

    var form, err, errStr;
    errStr = "\r\nYou cannot proceed without completing the ReCAPTCHA!\r\n";

    try {
        form = document.querySelector('form#registration');
        if (form.addEventListener) {
            form.addEventListener('submit', formSubmitCallback, false);
        } else if (form.attachEvent) {
            form.attachEvent('onsubmit', formSubmitCallback, false);
        }
    } catch (err) {
        console.warn("\r\nElement selection error:\r\n\t" + err + "\r\n");
    }


    function formSubmitCallback(event) {
        event.preventDefault();

        if (grecaptcha.getResponse() === "") {
            var g_err, err, gp,
                g_iframe, gw, gh;

            g_err = document.querySelector('.g-recaptcha');
            gp = g_err.parentNode;
            gp.setAttribute('style', 'margin-top:-2px;');

            err = document.createElement('p');
            err.innerText = "Please solve the Captcha challenge.";
            err.setAttribute('style', `
                  margin:0.309rem auto !important;
                  padding:0 1rem !important;
                  color:inherit;
                  font-family:'Open Sans', sans-serif;
                  font-size:1rem;
                  font-weight:500;
                  line-height:30px;
                  letter-spacing: calc( 1em * ( 10 / 1000 ) );
                  background-color: rgba( 10, 10, 10, 0.125 );
                `);

            g_err.appendChild(err);
            g_iframe = document.querySelector('.g-recaptcha iframe');
            gw = parseInt(g_iframe.width + 2);
            gh = parseInt(g_iframe.height + 2);
            g_err.setAttribute('style',
                'outline:3px solid #ff0000;outline-offset:-9px;padding:0.75rem 0.75rem 0.375rem;'
            );

            return console.warn(errStr);
        } else {
            var g_err = document.querySelector('.g-recaptcha'),
                gp = g_err.parentNode;

            if (g_err.hasAttribute('style')) g_err.removeAttribute('style');
            if (gp.hasAttribute('style')) gp.removeAttribute('style');

            return event.srcElement.submit();
        }
    }
</script>

<script id="password-confirm-match">
  /**
   * This is just a boilerplate if you want to attempt it yourself.
   * For my solution see here - https://bitsofco.de/realtime-form-validation
   */
/*   var form = document.querySelector('form.registration');
   // var err  = form.querySelector('.misc-errors');
   var password1 = form.querySelector('input[name=password]');
   var password2 = form.querySelector('input[name=password_confirmation]');

   function password_compare(pswd) {
      var pcmp = password2 || document.querySelector('input[name=password_confirmation]');
      p1 = pswd.cloneNode(); p1.setAttribute('type','text');
      p2 = pcmp.cloneNode(); p2.setAttribute('type','text');
      return ( ( p1.value === p2.value ) && ( p1.value !== '' && p2.value !== '' ) ) ? !0 : !1;
   }

  password2.addEventListener( 'keyup', function( evt ) {
    'use strict';
    ( password1.value !== this.value ) ? this.setCustomValidity('Mismatch: Passwords must match.') : this.setCustomValidity('');
    return;
  }, false );*/
</script>
@endpush

@endsection
