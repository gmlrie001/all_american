@if ($site_settings->promo_text != null && $site_settings->promo_text != "")
    <div class="container-fluid notifyBG" style="background-color: {{$site_settings->promo_bg_colour}};">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a target="_blank" href="{{$site_settings->promo_link}}" style="color: {{$site_settings->promo_colour}};">{{$site_settings->promo_text}}</a>
                    <a href="#">
                        <img class="img-fluid float-right notifyClose" src="/assets/icons/close-white.svg" alt="Close this Notification">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif