<div class="share-overlay"></div>
<div class="share-modal">
    <a class="close-share" href="javascript:void(0);">
        <img class="img-responsive img-fluid" src="/assets/images/template/header/close-grey.svg" />
    </a>

    <h1>Share {{$site_settings->site_name}}</h1>
    
    {{-- @if( NULL != $item_sharing && class_exists( 'Sharing' ) )
        {!! Sharing::render( $item_sharing ) !!}
    @endif --}}
    <div class="col-12 float-left text-center">
        <a rel="noopener noreferrer" target="_blank" href="http://www.facebook.com/sharer.php?s=100&p[url]={{Request::url('/')}}&p[title]={{$page->title}}&p[summary]={{strip_tags($page->description)}}" title="Share on Facebook" class="fab fa-facebook-f"></a>
        <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/intent/tweet?url={{Request::url('/')}}&text={{strip_tags($page->description)}}&via={{$site_settings->site_name}}" title="Tweet on Twitter" class="fab fa-twitter"></a>
        <a rel="noopener noreferrer" target="_blank" href="http://pinterest.com/pin/create/button/?url={{Request::url('/')}}&media={{url('/').'/'.$page->featured_image}}&description={{strip_tags($page->description)}}" title="Share on pinterest" class="fab fa-pinterest-p"></a>
        <a rel="noopener noreferrer" target="_blank" href="http://www.stumbleupon.com/submit?url={{Request::url('/')}}&title={{$site_settings->site_name}}" title="Share on Stumbleupon" class="fab fa-stumbleupon"></a>
        <a rel="noopener noreferrer" target="_blank" href="http://www.tumblr.com/share/link?url={{Request::url('/')}}&title={{$site_settings->site_name}}" title="Share on Tumblr" class="fab fa-tumblr"></a>
        <a rel="noopener noreferrer" target="_blank" href="http://reddit.com/submit?url={{Request::url('/')}}&title={{$site_settings->site_name}}" title="Share on Reddit" class="fab fa-reddit"></a>
        <a rel="noopener noreferrer" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{Request::url('/')}}" title="Share on LinkedIn" class="fab fa-linkedin"></a>
        <a rel="noopener noreferrer" target="_blank" href="whatsapp://send?text={{Request::url('/')}}" data-action="share/whatsapp/share" title="Share via Whatsapp" class="fab fa-whatsapp"></a>
        <a rel="noopener noreferrer" target="_blank" href="mailto:?Subject={{$site_settings->site_name}}&Body=Hi, Thought you might like this. {{Request::url('/')}}" title="Share via Email" class="fas fa-envelope"></a>
    {{-- 
      @forelse( $item_sharing as $platform => $share )
        <a rel="noopener noreferrer" target="_blank" href="{{ $share[0] }}" title="Share on {{ $platform }}" class="{{ $share[1] }}"></a>
      @empty
      @endforelse --}}
    </div>
    
    <h1>Follow {{$site_settings->site_name}}</h1>
    
    <div class="col-12 float-left text-center">
        @foreach($socials as $social)
            <a rel="noopener noreferrer" style="background-color:{{$social->social_media_icon_bg_colour}};color:{{$social->social_media_icon_colour}};" target="_blank" href="{{$social->social_media_url}}" class="fab {{$social->social_media_icon}}" title="{{$social->title}}"></a>
        @endforeach
    </div>
</div>
