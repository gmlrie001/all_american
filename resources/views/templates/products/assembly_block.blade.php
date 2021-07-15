
    <div class="col-6 col-md-6 col-lg-4 product-listing-block">
        <div class="col">
            <div class="row">
                <div class="col-12 p-0">
                    <img class="img-fluid" src="/{{$product->product->product_thumbnail}}" />
                    <div class="col-12 float-left mt-3">
                        <h2>{{$product->product->title}} - <strong>Assembly</strong></h2>
                        <h3>R {{number_format($product->product->assembly_cost, 0, "", "")}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="/add/assembly/{{$product->id}}" class="col-12 add-assembly-button">Assemble this item</a>
            </div>
        </div>
    </div>