@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@push( 'pageStyles' )
<style id="styler">
  .wallet {
    margin: 1rem auto;
    padding-bottom: 2rem;
    border-bottom: 1px solid #333;
  }
  .wallet-info {
    margin-top: 60px;
  }
  .wallet-block > div {
    margin: 10px auto;
    padding: 0 20px;
  }
  .wallet-info h2 {
    margin-top: 20px;
    margin-bottom: 0.5rem;
    padding-top: 1rem;
    border-top: 1px solid #333;
  }
  .credit-block h3,
  .debit-block h3 {
    font-size: 1.25rem;
    line-height: inherit;
  }
  .credit-block *,
  .debit-block * {
    font-size: 0.95rem;
    line-height: inherit;
  }
  @media only screen and (max-width: 992px) {
    .credit-block h3,
    .debit-block h3 {
      font-size: 1.5rem;
    }
    .credit-block *,
    .debit-block * {
      font-size: 1rem;
    }
  }  
</style>
@endpush

@section('content')
   	<div class="container-fluid profile-top-nav px-lg-0 px-3">
	  <div class="row no-gutters">
	    <div class="container profile-nav d-none d-lg-block px-lg-0 px-3">
            <div class="row">
                <div class="col-12">
                    <a href="/profile" class="@if( Request::is('profile') ) active @endif">Profile</a>
                    <a href="/profile/addresses" class="@if( Request::is('profile') ) active @endif">addresses</a>
                    <a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif">current orders</a>
                    <a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif">past orders</a>
                    @if ( in_array( "Vault\StoreCredit\StoreCreditServiceProvider", get_declared_classes() ) )
                    <a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif">wallet</a>
                    @endif
                </div>
            </div>
        </div>
	    <div class="container mobile-profile-nav d-block d-lg-none">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <a href="/profile" class="@if( Request::is('profile') ) active @endif profile fa fa-user"></a>
                        <a href="/profile/addresses" class="@if( Request::is('profile/addresses') ) active @endif profile-addresses fa fa-address-book"></a>
                        <a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif profile-current-orders fa fa-shopping-cart"></a>
                        <a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif profile-past-orders fa fa-shopping-basket"></a>
                      @if ( in_array( "Vault\StoreCredit\StoreCreditServiceProvider", get_declared_classes() ) )
                        <a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif profile-wallet fa fa-wallet"></a>
                      @endif
                    </div>
                </div>
            </div>
          </div>
      </div>

    @if ( in_array( "Vault\StoreCredit\StoreCreditServiceProvider", get_declared_classes() ) )
      {!! StoreCredit::renderProfileWallet() !!}
    @else
      <section class="container my-lg-5 my-3">
        <div class="row no-gutters">
          <div class="col-12">
            <h4>Store Credit is not available to you, please ask your admin to install this package.</h4>
          </div>
        </div>
      </section>
    @endif

{{--
    <div class="container mb-lg-5 mb-4">
        <div class="row">
			<div class="col-12 wallet">
				<div class="row">
                    <h1 class="col-12 add-address">Wallet</h1>
                </div>
				<div class="row">
                    <div class="col-12 col-lg-6 wallet-block">
                        <div>
                            <h2>Available store credit</h2>
                            @if($totalWallet > 0)
                                <span class="credit">R {{number_format($totalWallet, 2, ".", "")}} </span>
                            @else
                                <p>You have no credits. If you have a gift card, you can redeem it here</p>
                            @endif
                            <a class="shop-now" href="/shop">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 wallet-block">
                        <div>
                            <h2>Redeem a voucher code</h2>
                            <p>Add your Voucher code below to add it to your Store credit</p>
                            {!! Form::open(['class' => 'wallet-form']) !!}
                                <input type="text" name="code" placeholder="Code..." />
                                <button type="submit">REDEEM</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-12 wallet-info">
                        <h2 class="float-left">Wallet Statement</h2>
                    </div>
                    <div class="col-12 col-lg-6 credit-block">
                        <h3 class="my-lg-4 my-2">Applied StoreCredit(s) Codes:</h3>
                        @foreach($wallets as $wallet)
                            @if($wallet->credit_debit == "credit")
                                <p><strong>Code:</strong>
                                    <span class="bold">{{$wallet->voucher_code}}</span>
                                    Added
                                    <span>R {{number_format($wallet->amount, 2, ".", "")}}</span>
                                    to Wallet on the {{date_format($wallet->created_at, "d/m/Y")}}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-12 col-lg-6 debit-block">
                        <h3 class="my-lg-4 my-2">Credit(s) Used:</h3>
                        @foreach($wallets as $wallet)
                            @if($wallet->credit_debit != "credit")
                                <p><strong>Order Number:</strong>
                                    <span class="bold">{{$wallet->voucher_code}}</span>
                                    Added
                                    <span>R {{number_format($wallet->amount, 2, ".", "")}}</span>
                                    to Wallet on the {{date_format($wallet->created_at, "d/m/Y")}}
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>
			</div>
		</div>
    </div>
--}}

@endsection
