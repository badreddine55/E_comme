@section("title")
    {{ __('my_orders') }}
@endsection()

@section("content")
<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">{{ __('pending_order') }}</h2>
                    <div class="d-flex align-items-center">
                        <div class="swiper-buttons">
                            <button class="swiper-prev brand-carousel-prev btn btn-yellow">❮</button>
                            <button class="swiper-next brand-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="brand-carousel swiper">
                    <div class="swiper-wrapper">
                        @foreach($pending as $order)
                            <div class="swiper-slide">
                                <a href='{{ route("orders.show", ["order" => $order->id]) }}'>
                                    <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="https://cdn-icons-png.flaticon.com/512/8354/8354688.png" class="img-fluid rounded" alt="Card title">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body py-0">
                                                    <p class="text-muted mb-0">{{ $order->no }}</p>
                                                    <h6 class="card-title">{{ $order->created_at }}</h6>
                                                    <h6 class="card-title">{{ __('total') }} : {{ $order->amount }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">{{ __('completed_order') }}</h2>
                    <div class="d-flex align-items-center">
                        <div class="swiper-buttons">
                            <button class="swiper-prev brand-carousel-prev btn btn-yellow">❮</button>
                            <button class="swiper-next brand-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="brand-carousel swiper">
                    <div class="swiper-wrapper">
                        @foreach($completed as $order)
                            <div class="swiper-slide">
                                <a href='{{ route("orders.show", ["order" => $order->id]) }}'>
                                    <div class="bg-primary card mb-3 p-3 rounded-4 shadow border-0">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="https://cdn-icons-png.flaticon.com/512/8354/8354688.png" class="img-fluid rounded" alt="Card title">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body py-0">
                                                    <p class="text-muted mb-0">{{ $order->no }}</p>
                                                    <h6 class="card-title">{{ $order->created_at }}</h6>
                                                    <h6 class="card-title">{{ __('total') }} : {{ $order->amount }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()