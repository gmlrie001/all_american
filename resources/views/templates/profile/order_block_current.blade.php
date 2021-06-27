<div class="col-12 col-md-6 order-profile-block">
    <div>
        <p><span>Order No:</span> {{$order->id}}</p>
        <p><span>Date Ordered:</span> {{$order->order_placed}}</p>
        @isset($order->products[0])
            <p><span>No Of Items:</span> {{$order->products[0]->quantity}}</p>
        @endisset
        <p><span>Order Email:</span> {{$order->user->email}}</p>
        <p><span>Order Total:</span> R {{$order->total}}</p>
        <p><span>Delivered To:</span> {{$order->delivery_address_line_1}}, 
            @if($order->delivery_address_line_2 != null && $order->delivery_address_line_2 != "")
                {{$order->delivery_address_line_2}}, 
            @endif
            {{$order->delivery_suburb}}, {{$order->delivery_city}}</p>
        <a href="/profile/orders/current/{{$order->id}}">View this order</a>
    </div>
</div>