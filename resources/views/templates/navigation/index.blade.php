<div class="mobile-nav-overlay"></div>
<div class="mobile-nav">
    <h3>Menu <span>X</span></h3>
    <div class="first-nav">
        <a href="/shop" class="open-level-sub open-level-2" data-id="#shop-nav">Shop <img class="img-responsive" src="/assets/images/template/header/forward-white.svg" /></a>
        <a href="/shop/sale">On Sale</a>
        @foreach($links as $link)
            <a href="{{$link->link}}" target="{{$link->target}}">{{$link->title}}</a>
        @endforeach
        
        @if(Session::has('user') && Session::get('user.id') != null)
            <a class="profile-name-text" href="/profile">{{(Session::get('user.name'))}}</a>
            <a href="/logout">Logout</a>
        @else
            <a href="/my-account">Register</a>
            <a href="/my-account">Login</a>
        @endif
        <div class="soc-links">
            @foreach($socials as $social)
                <a style="background-color: {{$social->social_media_icon_bg_colour}}; color: {{$social->social_media_icon_colour}};" target="_blank" href="{{$social->social_media_url}}" class="fa {{$social->social_media_icon}}" alt="{{$social->title}}" title="{{$social->title}}"></a>
            @endforeach
        </div>
        <div class="level" id="shop-nav">
            <a href="/shop" class="close-level"><img class="img-responsive" src="/assets/images/template/header/back-grey.svg" /> Shop Now</a>
            @foreach($prod_cats as $prod_cat)
                <a href="/shop/{{$prod_cat->url_title}}" class="open-level-sub" data-id="#category_{{$prod_cat->id}}">{{$prod_cat->title}} <img class="img-responsive" src="/assets/images/template/header/forward-white.svg" /></a>
            @endforeach
        </div>
        
        @foreach($prod_cats as $prod_cat)
            @if(sizeof($prod_cat->displayChildren))
                <div class="level" id="category_{{$prod_cat->id}}">
                    <a href="/shop/{{$prod_cat->url_title}}" class="close-level"><img class="img-responsive" src="/assets/images/template/header/back-grey.svg" /> {{$prod_cat->title}}</a>
                    @foreach($prod_cat->displayChildren as $child)
                        <a href="/shop/{{$prod_cat->url_title}}/{{$child->url_title}}">{{$child->title}} </a>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>
<nav class="container-fluid">
    <div class="container position-relative">
        <div class="row position-relative">
            <div class="col-12 col-lg-9 navigation">
                <a href="/shop" class="mego-open">Shop Now</a>
                <a href="/shop/sale">On Sale</a>
                @foreach($links as $link)
                    <a href="{{$link->link}}" target="{{$link->target}}">{{$link->title}}</a>
                @endforeach
            </div>
            {!! Form::open(['url' => '/search', 'class' => 'col-12 col-lg-3 search-form', 'method' => 'get']) !!}
                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search here...']) !!}
                <button type="submit">
                    <img class="img-responsive" src="/assets/images/template/header/search-icon.svg" />
                </button>
            {!! Form::close() !!}
        </div>
        <div class="mega-menu">
            <div class="row ">
                <div class="col-12 col-lg-9">
                    @foreach($prod_cats->chunk(3) as $prodcats)
                        <div class="row">
                            @foreach($prodcats as $prodcat)
                                <div class="col-12 col-lg-4">
                                    <h2><a href="/shop/{{$prodcat->url_title}}">{{$prodcat->title}}</a></h2>
                                    @if(sizeof($prodcat->displayChildren))
                                        <ul>
                                            @foreach($prodcat->displayChildren as $child)
                                                <li>
                                                    <a href="/shop/{{$prodcat->url_title}}/{{$child->url_title}}">{{$child->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="col-12 col-lg-3 images">
                    <a href="#">
                        <img class="img-fluid" src="/assets/images/template/mega-1.jpg" />
                    </a>
                    <a href="#">
                        <img class="img-fluid" src="/assets/images/template/mega-2.jpg" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid d-block d-lg-none fixed-bottom-nav">
    <div class="row">
        <a class="col-3" href="/">
            <img class="img-fluid" src="/assets/images/template/home.svg" />
            <span>Home</span>
        </a>
        <a class="col-3" href="/shop/sale">
            <img class="img-fluid" src="/assets/images/template/sale.svg" />
            <span>On Sale</span>
        </a>
        <a class="col-3" href="/profile">
            <img class="img-fluid" src="/assets/images/template/profile.svg" />
            <span>My Account</span>
        </a>
        <a class="col-3" href="/cart/view">
            <img class="img-fluid" src="/assets/images/template/cart-m.svg" />
            @if($cart_total > 0)
                <i>{{$cart_total}}</i>
            @endif
            <span>Cart</span>
        </a>
    </div>
</div>