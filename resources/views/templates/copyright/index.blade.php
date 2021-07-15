<div class="container-fluid">
    <div class="row">
        <div class="container copyright">
            <div class="row icons">
                <div class="col-12 col-lg-5 logos">
                    <a href="/">
                        <img class="img-fluid" src="/{{$site_settings->footer_logo}}" />
                    </a>
                    <img class="img-fluid" src="/{{$site_settings->ssl_logo}}" />
                </div>
                <div class="col-12 col-lg-7 options">
                    <span>We accept:</span>
                    @foreach($pay_options as $pay_option)
                        <a href="{{$pay_option->link}}" title="{{$pay_option->title}}">
                          @isset( $pay_option->link_image )
                            <img class="img-fluid" src="/{{$pay_option->link_image}}" alt="{{$pay_option->title}}" />
                          @else
                                      @include( 
              'templates.placeholders.simple_image_placeholders', 
              [
                'class' => '', 'width' => 800,'height' => 600, 'text' => '+', 
                'use_vault_logo' => true, 'use_placehold_it' => true
              ] 
            )
                          @endisset
                        </a>
                    @endforeach
                    @isset( $site_settings->ssl_logo )
                    <img class="img-fluid" src="/{{$site_settings->ssl_logo}}" />
                    @else
                                @include( 
              'templates.placeholders.simple_image_placeholders', 
              [
                'class' => '', 'width' => 800,'height' => 600, 'text' => '+', 
                'use_vault_logo' => true, 'use_placehold_it' => true
              ] 
            )
                    @endisset
                  </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!! $site_settings->copyright !!}
                </div>
            </div>
        </div>
    </div>
</div>