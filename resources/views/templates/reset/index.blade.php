@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')

@push( 'pageStyles' )
<style>
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

<div class="container-fluid bgGrey pageHeader">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col breadCrumb">
                    <h1>Reset password</h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container beforeFooterWrap">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6  ">
                <div class="formBlock borderWrap">
                    <div class="article">
                        <h3>Resetting your password</h3>
                        <p>To reset your accounts password, please enter a new password and confirmation password followed by clicking on reset password.</p>
                    </div>
                    <div class="form">
                        {!! Form::open(['id' => 'reset_form']) !!}
                            <div class="form-group">
                                <label for="password">New Password*
                                    <input id="password" name="password" type="password" class="form-control" placeholder="New Password" required>
                                    <ul class="input-requirements">
                                        <li>At least 8 characters (and less than 16) long</li>
                                        <li>Contains at least 1 number</li>
                                        <li>Contains at least 1 lowercase letter</li>
                                        <li>Contains at least 1 uppercase letter</li>
                                        <li>Contains a special character (e.g. @, !, etc.)</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password*
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
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
                            <button class="btn smlBtn" type="submit">Reset Password</button>
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
            element: document.querySelector('label[for="password_confirmation"] .input-requirements li:nth-child(6)')
        },
        {
            isInvalid: function(input) {
                return input.value.length < 8 | input.value.length > 100;
            },
            invalidityMessage: 'This input needs to be between 8 and 100 characters',
            element: document.querySelector('label[for="password_confirmation"] .input-requirements li:nth-child(1)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[0-9]/g);
            },
            invalidityMessage: 'At least 1 number is required',
            element: document.querySelector('label[for="password_confirmation"] .input-requirements li:nth-child(2)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[a-z]/g);
            },
            invalidityMessage: 'At least 1 lowercase letter is required',
            element: document.querySelector('label[for="password_confirmation"] .input-requirements li:nth-child(3)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[A-Z]/g);
            },
            invalidityMessage: 'At least 1 uppercase letter is required',
            element: document.querySelector('label[for="password_confirmation"] .input-requirements li:nth-child(4)')
        },
        {
            isInvalid: function(input) {
                return !input.value.match(/[\!\@\#\$\%\^\&\*]/g);
            },
            invalidityMessage: 'You need one of the required special characters',
            element: document.querySelector('label[for="password_confirmation"] .input-requirements li:nth-child(5)')
        }
    ];

    /* ----------------------------

     Setup CustomValidation

     Setup the CustomValidation prototype for each input
     Also sets which array of validity checks to use for that input

     ---------------------------- */
    var passwordInput = document.getElementById('password');
    var passwordRepeatInput = document.getElementById('password_confirmation');

    passwordInput.CustomValidation = new CustomValidation(passwordInput);
    passwordInput.CustomValidation.validityChecks = passwordValidityChecks;

    passwordRepeatInput.CustomValidation = new CustomValidation(passwordRepeatInput);
    passwordRepeatInput.CustomValidation.validityChecks = passwordRepeatValidityChecks;

    /* ----------------------------

     Event Listeners

     ---------------------------- */

    var inputs = document.querySelectorAll('#reset_form input:not([type="submit"])');
    var submit = document.querySelector('#reset_form button[type="submit"');
    var form = document.getElementById('reset_form');

    function validate() {
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].CustomValidation.checkInput();
        }
    }
    console.log(inputs);

    submit.addEventListener('click', validate);
    form.addEventListener('submit', validate);

</script>
@endpush
@endsection
