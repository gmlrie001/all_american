<div class="col-12 col-md-6 order-profile-block">
    <div>
        @php
            $mutable = \Carbon\Carbon::now();    
            $ordered = \Carbon\Carbon::parse($order->order_placed);
            $diff = $ordered->diffInDays($mutable);
        @endphp
        <p><span>Order No:</span> {{$order->id}}</p>
        <p><span>Date Ordered:</span> {{$order->order_placed}}</p>
        <p><span>No Of Items:</span> {{$order->products->count()}}</p>
        <p><span>Order Email:</span> {{$order->user->email}}</p>
        <p><span>Order Total:</span> R {{$order->total}}</p>
        <p><span>Delivered To:</span> {{$order->delivery_address_line_1}}</p>
        <p><span>Return Valid For:</span> <i>{{$diff}} days</i></p>
        <a href="/profile/returns/{{$order->id}}">Select this order</a>
    </div>
</div>