@if(isset($colCount))
    <div class="col-12 col-lg-{{$colCount}} product-listing-block">
@else
    <div class="col-12 col-lg-3 product-listing-block">
@endif
    <div class="col">
        <div class="row">
            <div class="col-12">
                <a href="/product/{{$product->url_title}}">
                    <img class="img-fluid" src="/{{$product->product_thumbnail}}" />
                </a>
                <a href="#" class="wishlist-modal-button fa fa-heart-o" data-id="{{$product->id}}"></a>
                <a href="/product/{{$product->url_title}}" class="view-product fa fa-eye"></a>
                <span class="product-tag">GIFT</span>
                <a href="/product/{{$product->url_title}}">
                    <h2>{{$product->title}}</h2>
                    <h3><span>was R{{number_format($product->price, 2, "", "")}}</span> now FREE</h3>
                </a>
            </div>
        </div>
        <div class="row">
            <a href="/cart/get/modal/{{$product->id}}/gift" class="col-12 add-to-cart-modal-button" data-toggle="modal" data-target="#addToCart">Add to cart</a>
        </div>
    </div>
</div>