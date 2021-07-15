<style id="footer-socialLinks-and-copyright">
footer, 
footer * {
  font-family: 'Montserrat', sans-serif;
}
footer .copyLinks br {
  display: none;
}
footer > .row {
  padding: 0.875rem;
  padding-bottom: 0;
  border: none !important;
}
.copyLinks p,
.copyLinks * {
  font-size: 13px;
  line-height: 37px;
  color: #fff;
}
.website-by p, 
.website-by * {
  color: #e69418!important;
}
@media (max-width: 992px) {
  footer:not(.article-footer) {
    max-height: unset;
  }
  footer ul {
    display: block;
    border-bottom: none;
  }
  .footerContain .links h4 {
    font-size: 1rem;
  }
  footer .copyLinks br {
    display: block;
  }
  .newsLetterContain {
    line-height: 1.5;
  }
  .formWrap input.form-control {
    margin-top: 0.618rem;
  }
}
</style>

<div class="container-fluid newsLetterContain mt-0">
    <div class="row">
        <div class="container px-lg-4 px-3">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-6 offset-xl-0 offset-lg-0 offset-0 text px-lg-0">
                    <p><span>Sign up for our latest news and updates!</span></p>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-6 formWrap px-lg-0">
                    {!! Form::open(['url' => '/subscribe', 'class' => 'form-row', 'method' => 'POST']) !!}
                        <div class="col-12 col-md-12 col-lg-7 col-xl-8 my-3 my-lg-0">
                            <input type="email" name="email" class="form-control mw-100 m-0" id="newsLetterEmail" placeholder="Enter your email address" required>
                        </div>
                        <div class="col-12 col-md-12 col-lg-5 col-xl-4 m-0">
                            <button type="submit" class="btn smlBtn m-0">Signup</button>
                        </div>
                        {!! Honeypot::generate('my_name_subscribe', 'my_time_subscribe') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid footerContain mt-0 py-lg-4 py-5">
    <div class="row pt-0">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-lg-auto py-3">
                    <a class="logo mw-100 w-100 mx-0" href="/">
                      @include( 'templates.placeholders.simple_image_placeholders',
                        [
                        'imgvar' => $site_settings->footer_logo, 
                        'imgtitle' => $site_settings->site_name,
                        'imgclasses' => 'img-fluid',
                        'class' => '', 
                        'width' => 178, 
                        'height' => 80, 
                        'text' => '+',
                        'use_vault_logo' => true, 
                        'use_placehold_it' => true
                        ]
                      )
                    </a>
                </div>
                @if( $socials && count( $socials ) > 0 )
                <div class="col-auto col-lg-auto social w-auto text-center text-lg-right">
                  @foreach($socials as $social)
                    <a rel="noopener noreferer" href="{{$social->social_media_url}}" class="fab {{$social->social_media_icon}}" title="{{$social->title}}" style="background-color:{{$social->social_media_icon_bg_colour}};color:{{$social->social_media_icon_colour}};"
                     target="_blank"></a>
                  @endforeach
                </div>
                @endif
                <div class="col-12 links mx-auto my-0 my-lg-4">
                    <div class="row justify-content-between-lg justify-content-center text-center links mb-0 mt-lg-0">
                        @foreach($footer_link_categories as $footer_link_category)
                        <div class="col-12 col-lg-4 mx-auto my-1">
                            <h4 class="mb-1">{{$footer_link_category->title}}</h4>
                            <ul class="list-unstyled">
                            @foreach($footer_link_category->displaylinks as $link)
                                <li>
                                    <a class="" title="{{$link->title}}" href="{{url($link->link)}}" target="{{$link->target}}">{{$link->title}}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="container-fluid copyright d-none">
    <div class="container">
        <div class="row justify-content-between">
            <div class="paymentOptions">
                @forelse( $pay_options as $key=>$payopt )
                  @include( 'templates.placeholders.simple_image_placeholders', [
                    'imgvar' => ltrim( $payopt->link_image ), 
                    'imgtitle' => $payopt->title,
                    'imgclasses' => 'img-fluid pb-1 px-2',
                    'class' => '', 
                    'width' => 80, 
                    'height' => 35, 
                    'text' => '+',
                    'use_vault_logo' => true, 
                    'use_placehold_it' => true
                  ])
                @empty
                @endforelse
                
                @include( 'templates.placeholders.simple_image_placeholders', [
                  'imgvar' => $site_settings->ssl_logo, 
                  'imgtitle' => $site_settings->title,
                  'imgclasses' => 'img-fluid pb-1 px-2',
                  'class' => '', 
                  'width' => 80, 
                  'height' => 35, 
                  'text' => '+',
                  'use_vault_logo' => true, 
                  'use_placehold_it' => true
                ])
            </div>
            <div class="copyLinks">
                {!! $site_settings->copyright !!}
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid px-0 copyright mt-0 pt-lg-0">
    <div class="row no-gutters m-0 pb-3">
        <div class="container">
            <div class="row m-0 justify-content-between align-items-center">
                <div class="col-12 col-xl-auto footer-links px-0">
                    <div class="row m-0 justify-content-between-lg justify-content-center no-gutters">
                        <div class="paymentOptions">
                        @forelse( $pay_options as $key=>$payopt )
                          @include( 'templates.placeholders.simple_image_placeholders', [
                              'imgvar' => ltrim( $payopt->link_image ), 
                              'imgtitle' => $payopt->title,
                              'imgclasses' => 'img-fluid pb-1 px-2',
                              'class' => '', 
                              'width' => 80, 
                              'height' => 35, 'text' => '+',
                              'use_vault_logo' => true, 
                              'use_placehold_it' => true
                          ])
                        @empty
                        @endforelse
                        
                        @include( 'templates.placeholders.simple_image_placeholders', [
                            'imgvar' => $site_settings->ssl_logo, 
                            'imgtitle' => $site_settings->title,
                            'imgclasses' => 'img-fluid pb-1 px-2',
                            'class' => '', 
                            'width' => 80, 
                            'height' => 35, 
                            'text' => '+',
                            'use_vault_logo' => true, 
                            'use_placehold_it' => true
                        ])
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl footer-legal pt-lg-0 mt-0">
                    <div class="row justify-content-end align-self-center m-0">
                        <div class="copyLinks col-12 col-xl-auto text-xl-left text-center text-white pl-xl-0 pl-3">
                          @isset( $site_settings->copyright )
                            {!! $site_settings->copyright !!}
                          @endisset
                        </div>
                        <div class="col-12 col-xl-auto website-by text-xl-right text-center text-white pr-xl-0 pr-3 mt-2 mt-md-1 mt-lg-0">
                            <p>
                                <a rel="noopener noreferer" class="" title="Goto Website Designers Website: Monzamedia" href="https://monzamedia.com" target="_blank">Website Design by: Monzamedia</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
