@extends("layout.main")

@section("title")
    My orders

@endsection()

@section("content")
<div class="container" style="margin-top:30px;max-width: 418px;">
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your order</span>
            <span class="badge bg-primary rounded-pill">{{count($order->products)}}</span>
          </h4>
          <ul class="list-group mb-3">
          @foreach($order->products as $product)
         
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">{{$product->name}}</h6>
                <small class="text-body-secondary">{{substr($product->description,0,30)}}...</small>
              </div>
              <span class="text-body-secondary">$12</span>
            </li>
    
           @endforeach
          
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
  
          <button class="w-100 btn btn-primary btn-lg" >{{$order->status}}</a>
        </div>
      </div>
      </div>

@endsection()