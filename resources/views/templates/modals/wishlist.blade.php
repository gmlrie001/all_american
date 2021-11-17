<div class="wishlist-overlay"></div>
<div class="wishlist-modal">
    <div class="row">        
        <h2 class="col-12">ADD TO WISHLIST <a id="close-wishlist-modal" href="#" class="col-auto ml-auto">X</a></h2>
        <p class="col-12">Create your Wishlist and share it with friends and family.</p>
    </div>
    @if($user == null)
        <div class="row">
            <div class="col-12">
                <h2>Please login to add items to your wishlist</h2>
                <a class="login-button-wishlist" href="/my-account">login here</a>
            </div>
        </div>
    @else
        <div class="row">
            {!! Form::open(['url'=>'/wishlist/add', 'class'=>'col-12']) !!}
                @if(isset($product))
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                @else
                    <input type="hidden" name="product_id" />
                @endif

                <input type="hidden" name="quantity" />
                <input type="hidden" name="filters" />

                <div class="row">
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-12">
                                <h2>CREATE A NEW WISHLIST</h2>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" name="title" placeholder="Name of wishlist..." />
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="submit">CREATE & ADD</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            {!! Form::open(['url'=>'/wishlist/add', 'class'=>'col-12']) !!}
                @if(isset($product))
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                @else
                    <input type="hidden" name="product_id" />
                @endif

                <input type="hidden" name="quantity" />
                <input type="hidden" name="filters" />

                <div class="row">
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-12">
                                <h2>SELECT A WISHLIST YOU CREATED</h2>
                            </div>
                            <div class="col-12 col-md-6">
                                <select name="current_wishlist">
                                    <option value="">Select your wishlist</option>
                                    @if($user != null)
                                        @foreach($user->wishlists as $wishlist)
                                            <option value="{{$wishlist->id}}">{{$wishlist->title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="submit">ADD TO WISHLIST</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    @endif
</div>
