<div class="share-overlay"></div>
<div class="share-modal">
    <a class="close-share" href="javascript:void(0);">
        <img class="img-responsive img-fluid" src="/assets/images/template/header/close-grey.svg" />
    </a>

    <h1>Share {{$site_settings->site_name}}</h1>

    {{-- {!! Sharing::render( $item_sharing ) !!} --}}

    {{-- <div class="col-12 float-left text-center">
      @forelse( $item_sharing as $platform => $share )
        <a rel="noopener noreferrer" target="_blank" href="{{ $share[0] }}" title="Share on {{ $platform }}" class="{{ $share[1] }}"></a>
      @empty
      @endforelse --}}
{{--
        <a rel="noopener noreferrer" target="_blank" href="http://www.facebook.com/sharer.php?s=100&p[url]={{Request::url('/')}}&p[title]={{$page->title}}&p[summary]={{strip_tags($page->description)}}" title="Share to Facebook" class="fab fa-facebook-f"></a>
        <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/intent/tweet?url={{Request::url('/')}}&text={{strip_tags($page->description)}}&via={{$site_settings->site_name}}" title="Share to Twitter" class="fab fa-twitter"></a>
        <a rel="noopener noreferrer" target="_blank" href="http://pinterest.com/pin/create/button/?url={{Request::url('/')}}&media={{url('/').'/'.$page->featured_image}}&description={{strip_tags($page->description)}}" title="Share to pinterest" class="fab fa-pinterest-p"></a>
        <a rel="noopener noreferrer" target="_blank" href="https://plus.google.com/share?url={{Request::url('/')}}" title="Share to Google Plus" class="fab fa-google-plus"></a>
        <a rel="noopener noreferrer" href="http://www.stumbleupon.com/submit?url={{Request::url('/')}}&title={{$site_settings->site_name}}" target="_blank" class="fab fa-stumbleupon"></a>
        <a rel="noopener noreferrer" href="http://www.tumblr.com/share/link?url={{Request::url('/')}}&title={{$site_settings->site_name}}" target="_blank" class="fab fa-tumblr"></a>
        <a rel="noopener noreferrer" href="http://reddit.com/submit?url={{Request::url('/')}}&title={{$site_settings->site_name}}" target="_blank" class="fab fa-reddit"></a>
        <a rel="noopener noreferrer" href="http://www.linkedin.com/shareArticle?mini=true&url={{Request::url('/')}}" target="_blank" class="fab fa-linkedin"></a>
        <a rel="noopener noreferrer" target="_blank" href="whatsapp://send?text={{Request::url('/')}}" data-action="share/whatsapp/share" class="fab fa-whatsapp"></a>
        <a rel="noopener noreferrer" target="_blank" href="mailto:?Subject={{$site_settings->site_name}}&Body=Hi, Thought you might like this. {{Request::url('/')}}" class="fas fa-envelope"></a>
--}}
    </div>
    
    <h1>Follow {{$site_settings->site_name}}</h1>
    
    <div class="col-12 float-left text-center">
        @foreach($socials as $social)
            <a rel="noopener noreferrer" style="background-color:{{$social->social_media_icon_bg_colour}};color:{{$social->social_media_icon_colour}};" target="_blank" href="{{$social->social_media_url}}" class="fab {{$social->social_media_icon}}" title="{{$social->title}}"></a>
        @endforeach
    </div>
</div>