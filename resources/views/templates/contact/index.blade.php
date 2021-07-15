@extends( 'templates.layouts.index' )

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section( 'content' )

<div class="container contactWrap">
    <div class="row">
        @foreach($addresses as $key => $address)
        <div class="col-12 col-md-12 col-lg-7">
            <div class="row">
                <section class="col-12 col-md-6 col-lg-6 detail">
                    <div class="col-12 links">
                        <div class="title">
                            <h3>{{$address->title}}</h3>
                        </div>
                        <a href="tel:{{$address->phone}}" class="position-relative">
                          <span>Tel:</span>
                          {{$address->phone}}
                        </a>
                        <a href="mailto:{{$address->email}}" class="position-relative">
                          <span>Email:</span>
                          {{$address->email}}
                        </a>
                        @if($address->fax != null)
                        <a href="tel:{{$address->fax}}" class="position-relative">
                          <span>Fax:</span>
                          {{$address->fax}}
                        </a>
                        @endif
                    </div>
                    @if($key == 0)
                    <div class="col-12 social">
                      <div class="title">
                        <h3>Social media</h3>
                      </div>
                      @foreach($socials as $social)
                      <a target="_blank" href="{{$social->social_media_url}}" class="fab {{$social->social_media_icon}}" alt="{{$social->title}}" title="{{$social->title}}"></a>
                      @endforeach
                    </div>
                    @endif
                </section>
                <section class="col-12 col-md-6 col-lg-6 address">
                    <div class="col-12">
                        <div class="title">
                            <h3>Where to find us</h3>
                        </div>
                        {!! $address->address !!}
                    </div>
                </section>
            </div>
        </div>
        @endforeach
        <section class="col-12 col-md-12 col-lg-5 formContain">
            <div class="col-12">
                <div class="title">
                    <h3>Contact Form</h3>
                </div>
                {!! Form::open( ['id'=>'contactForm'] ) !!}
                <div class="form-group">
                    <label for="Name">Name*</label>
                    <input id="Name" type="text" class="form-control" name="name"
                        placeholder="Your name" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email Address*</label>
                    <input id="Email" type="email" class="form-control" placeholder="Email Address"
                        name="email" required>
                </div>
                <div class="form-group">
                    <label for="Subject">Subject*</label>
                    <input id="Subject" type="text" class="form-control"
                        placeholder="Anything in particular" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="Message">Message*</label>
                    <textarea id="Message" class="col-12" name="message" rows="5"
                        placeholder="Message*" required=""></textarea>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha mt-lg-3 mt-2" id="g-captcha"></div>
                </div>
                {!! Honeypot::generate( 'my_name', 'my_time') !!}
                <button class="btn smlBtn" type="submit">
                    Send
                </button>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>

@push( 'pageScripts' )
<script>
    var form, err, errStr;
    errStr = "\r\nYou cannot proceed without completing the ReCAPTCHA!\r\n";

    try {
        form = document.querySelector('form#contactForm');
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
@endpush

@endsection
