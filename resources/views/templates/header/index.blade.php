<div class="container-fluid topNavBG">
    <div class="container px-lg-0 px-3">
        <div class="row justify-content-between">
            <div class="links">
            @forelse($links as $link)
                <a href="/{{ ltrim( $link->link, '/' )}}" target="{{ $link->target }}"><span class="font-weight-medium">{{$link->title}}</span></a>
            @empty
            @endforelse
            </div>
            <div class="cart">
              @if(Session::has('user') && Session::get('user.id') != null)
                <a href="/profile">
                    <span class="font-weight-medium">MY ACCOUNT</span>
                </a>
                <a href="/logout">
                    <span class="font-weight-medium">LOGOUT</span>
                </a>
              @else
                @php Session::put('intended.url', url()->full() ); @endphp
                <a href="/my-account">
                    <span class="font-weight-medium">Login Or Register</span>
                </a>
              @endif
                @php
                if( ($cart_products != NULL || isset( $cart_products )) && count( $cart_products ) > 0 ):
                    $cart_total = $cart_products->sum( 'quantity' );
                endif;
    
                if(Session::has('dont_show_cart')){
                    $cart_total = 0;
                }
                @endphp
                @if($cart_total > 0)
                <a class="cartBtn" href="/cart/view">
                    <span class="font-weight-medium">My Cart</span>
                    <div class="qty">
                        <div class="d-inline">
                            <span class="font-weight-medium">{{$cart_total}}</span>
                        </div>
                    </div>
                </a>
                @else
                <a class="cartBtn" href="/cart/view">
                    <span class="font-weight-medium">My Cart</span>
                    <div class="qty none">
                        <span class="font-weight-medium">0</span>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
    @if($cart_total > 0)
    <div class="container cartDropdown collapse">
        @php $cartTot = 0; @endphp
        @forelse($cart_products as $cart_product)
        <div class="row prodDetails">
            <div class="col-4 image">
                @include( 'templates.placeholders.simple_image_placeholders',
                  [
                    'imgvar' => $cart_product->product->product_image, 'imgtitle' => $cart_product->product->title,
                    'imgclasses' => 'img-fluid',
                    'class' => '', 'width' => 800,'height' => 600, 'text' => '+',
                    'use_vault_logo' => true, 'use_placehold_it' => true
                  ]
                )
                {{-- <img class="img-fluid" src="/{{$cart_product->product->product_image}}" alt="{{$cart_product->product->title}} "> --}}
            </div>
            <div class="col-8">
                <div class="row title">
                    <div class="col-12 pr-5">
                        <h2>{{$cart_product->product->title}}
                            <a href="/cart/delete/{{$cart_product->id}}" class="deletCartDropdown font-weight-medium border-0 outline-0 boxshadow-0 mt-0">
                                <i class="fa fa-trash"></i>
                            </a>
                        </h2>
                        <h3>SKU:<span> {{$cart_product->code}}</span></h3>
                    </div>
                </div>
                <div class="row price mt-0">
                    <div class="col-7 input-group">
                        <form action="/cart/update/{{$cart_product->id}}" method="post" data-parsley-validate="" class="no-submit row">
                            {!!Form::token()!!}
                            <div class="input-append d-flex flex-row spinner" data-trigger="spinner">
                                <input type="text" value="{{ $cart_product->quantity }}" name="quantity" data-rule="quantity" class="checkout-quantity-input w-50" style="max-height:40px;line-height:40px;">
                                <div class="add-on" style="height:40px;line-height:40px;">
                                    <a href="javascript:;" class="spin-up" data-spin="up" style="max-height:20px;line-height:20px;">
                                        <i class="fa fa-caret-up"></i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down" style="max-height:20px;line-height:20px;">
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    {{--
                        <input type="button" value="-" class="button-minus" data-field="quantity">
                        <input type="number" step="1" max="" value="{{ $cart_product->quantity }}" name="quantity" class="quantity-field">
                        <input type="button" value="+" class="button-plus" data-field="quantity">
                    --}}
                    </div>
                    <div class="col-5">
                        <h5 style="line-height:40px;max-height:40px;">R {{$cart_product->price}}</h5>
                    </div>
                </div>
            </div>
        </div>
        @php $cartTot += ( $cart_product->price*$cart_product->quantity ); @endphp
        @empty
        @endforelse
        <div class="row justify-content-between total">
            <div class="col">
                <h5>Total:</h5>
            </div>
            <div class="col">
                <h5 class="float-right">R {{number_format($cartTot, 2, ".", " ")}} </h5>
            </div>
        </div>
        <div class="proceedBtn">
            <a href="/cart/view">Checkout</a>
        </div>
    </div>
    @endif
</div>

<div class="container-fluid navigation py-lg-5 py-3">
    <div class="container">
        <div class="row justify-content-between">
            <div class="d-block d-sm-none headerSearch">
                {!! Form::open(['url' => '/search', 'class' => 'input-group', 'method' => 'GET']) !!}
                <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}"
                    placeholder="Search products...">
                <div class="input-group-append">
                    <button class="btn" type="submit"><span class="fa fa-search"></span></button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="navContain d-flex align-items-center justify-content-between w-lg-65">
                <a href="/">
                    @include( 'templates.placeholders.simple_image_placeholders',
                      [
                        'imgvar' => $site_settings->logo, 'imgtitle' => $site_settings->site_name,
                        'imgclasses' => 'img-fluid',
                        'class' => '', 'width' => 360,'height' => 80, 'text' => '+',
                        'use_vault_logo' => true, 'use_placehold_it' => true
                      ]
                    )
                </a>
                <div class="linksContain w-lg-65 d-flex justify-content-around">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        Shop by Category <span></span>
                    </a>
                    <div class="dropdown-menu">
                        @isset($prod_cats)
                        @foreach($prod_cats as $prodcat)
                        <a href="/shop/{{$prodcat->url_title}}" class="dropdown-item">
                            {{$prodcat->title}}
                        </a>
                        @endforeach
                        @endisset
                    </div>
                    <a href="/shop/" class="d-inline navLinks">
                        Shop all
                    </a>
                {{-- 
                    @if($show_sale_link > 0)
                    <a href="/shop/sale" class="d-inline navLinks sale">
                        {{$site_settings->sale_text}}
                    </a>
                    @endif
                    @if($show_new_link > 0)
                    <a href="/shop/new" class="d-inline navLinks sale">
                        {{$site_settings->new_text}}
                    </a>
                    @endif
                --}}
                </div>
            </div>
            <div class="d-none d-sm-flex align-items-center headerSearch">
                {!! Form::open(['url' => '/search', 'class' => 'input-group', 'method' => 'GET']) !!}
                <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}"
                    placeholder="Search products...">
                <div class="input-group-append">
                    <button class="btn py-0" type="submit"><span class="fa fa-search"></span></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--  CART DROPDOWN   -->
<nav class="container-fluid mobileNavigation sticky-top px-0 d-block d-lg-none">
    <div class="row no-gutters">
        <div class="container px-0">
            <div class="row justify-content-between mobileWrap no-gutters">
                <div class="col-4 px-0 logo">
                    <a href="/">
                      @include( 'templates.placeholders.simple_image_placeholders',
                        [
                          'imgvar' => $site_settings->mobile_logo, 'imgtitle' => $site_settings->site_name,
                          'imgclasses' => 'img-fluid',
                          'class' => '', 'width' => 180,'height' => 60, 'text' => '+',
                          'use_vault_logo' => true, 'use_placehold_it' => true
                        ]
                      )
                    </a>
                </div>
                <div class="col-7 offset-1 d-flex content align-self-center">
                    <a href="#" class="searchOpen">
                        <img src="/assets/icons/mobile-search.svg" alt="Search products">
                    </a>
                    @if(Session::has('user') && Session::get('user.id') != null)
                    <a href="/profile" class="account">
                        <img src="/assets/icons/mobile-account.svg" alt="Profile">
                    </a>
                    @else
                    @php Session::put('intended.url', url()->full() ); @endphp
                    <a href="/my-account" class="account">
                        <img src="/assets/icons/mobile-account.svg" alt="Account">
                    </a>
                    @endif
                    <a href="/cart/view" class="cart">
                        @if($cart_total > 0)
                        <div class="position-relative">
                            <img src="/assets/icons/mobile-cart.svg" alt="Cart">
                            <span class="position-absolute"
                                style="top:-0.75rem;right:-1.125rem;font-weight:500;color:#fff;width:25px;height:25px;line-height:25px;background-color:#c1ac3aaa;border-radius:50%;text-align:center;">{{ $cart_total }}</span>
                        </div>
                        @else
                        <img src="/assets/icons/mobile-cart.svg" alt="Cart">
                        @endif
                    </a>
                    <a href="javascript:void(0);" class="menu">
                        <img src="/assets/icons/mobile-navicon.svg" alt="menu">
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid mobileHeaderSearch px-0 collapse">
    <div class="row no-gutters">
        <div class="col-12">
            {!! Form::open(['url' => '/search', 'class' => 'input-group', 'method' => 'GET']) !!}
            <div class="input-group-append mw-100 w-100">
                <input type="text" name="search" class="form-control" placeholder="Search products...">
                <button class="btn" type="submit"><span class="fa fa-search"></span></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container-fluid mobileOpen collapse">
    <div class="row justify-content-between mobileMenu">
        <a href="/" class="logo" title="{{$site_settings->site_name}}">
          @include( 'templates.placeholders.simple_image_placeholders',
            [
              'imgvar' => $site_settings->mobile_logo, 'imgtitle' => $site_settings->site_name,
              'imgclasses' => 'img-fluid',
              'class' => '', 'width' => 180,'height' => 60, 'text' => '+',
              'use_vault_logo' => true, 'use_placehold_it' => true
            ]
          )
        </a>
        <div class="menuClose pr-3">
            <img src="/assets/icons/close-grey.svg" alt="menu">
        </div>
    </div>
    <div class="row links">
        <a href="#" class="lrgLink has-second-menu hasDrop pr-3" data-open="#category">
            Shop by Category
        </a>
        <a href="/shop">
            Shop All
        </a>
    {{--
        @if($show_sale_link > 0)
        <a href="/shop/sale" class="saleLink">
            {{$site_settings->sale_text}}
        </a>
        @endif
        @if($show_new_link > 0)
        <a href="/shop/new" class="saleLink">
            {{$site_settings->new_text}}
        </a>
        @endif
    --}}
        @forelse($links as $link)
            <a href="/{{$link->link}}" target="{{$link->target}}">{{$link->title}}</a>
        @empty
        @endforelse
        @if(Session::has('user') && Session::get('user.id') != null)
            <a href="/profile" class="account" title="Profile">Profile</a>
            <a href="/logout" class="account" title="Logout">Logout</a>
        @else
            <a href="/my-account" class="account" title="Login/Register">Login/Register</a>
        @endif
    </div>
</div>
<div class="container-fluid mobileSubnav collapse" id="category">
    <div class="row justify-content-between mobileMenu">
        <a href="/" class="logo" title="{{$site_settings->site_name}}">
          @include( 'templates.placeholders.simple_image_placeholders',
            [
              'imgvar' => $site_settings->mobile_logo, 'imgtitle' => $site_settings->site_name,
              'imgclasses' => 'img-fluid',
              'class' => '', 'width' => 180,'height' => 60, 'text' => '+',
              'use_vault_logo' => true, 'use_placehold_it' => true
            ]
          )
        </a>
        <div class="subMenuClose pr-3">
            <img src="/assets/icons/close-grey.svg" alt="menu">
        </div>
    </div>
    <div class="row links">
        <a href="#" class="lrgLink has-second-menu dropBack pr-3" data-open="#category">
            Shop by Category
        </a>
    @isset($prod_cats)
        @forelse($prod_cats as $prodcat)
            <a href="/shop/{{$prodcat->url_title}}">{{$prodcat->title}}</a>
        @empty
        @endforelse
    @endisset
    </div>
</div>