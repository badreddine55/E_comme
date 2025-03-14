@extends("layout.main")

@section("title")
    {{ __('messages.our_food_store') }}
@endsection

@section("cart")
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="{{ __('messages.close') }}"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">{{ __('messages.your_cart') }}</span>
                <span class="badge bg-primary rounded-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach($selectedProductsIDs as $selectedID)
                    @foreach($selectedProducts as $product)
                        @if($selectedID == $product->id)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $product->name }}</h6>
                                    <small class="text-body-secondary">{{ substr($product->description, 0, 30) }}...</small>
                                </div>
                                <span class="text-body-secondary">$12</span>
                            </li>
                        @endif
                    @endforeach
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ __('messages.total') }} (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>
            <a href='{{ route("home.checkout", ["lang" => app()->getLocale()]) }}' class="w-100 btn btn-primary btn-lg" type="submit">{{ __('messages.continue_to_checkout') }}</a>
        </div>
    </div>
</div>
@endsection

@section("content")
<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">{{ __('messages.category') }}</h2>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('categories.index', ['lang' => app()->getLocale()]) }}" class="btn-link text-decoration-none">{{ __('messages.view_all_categories') }} →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="category-carousel swiper">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)
                            <a href="#cat_{{ $category->id }}" class="nav-link category-item swiper-slide">
                                <img src="/storage/{{ $category->image }}" alt="Category Thumbnail" style="height: 200px;">
                                <h3 class="category-title">{{ $category->name }}</h3>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach($categories as $category)
    @if(count($category->products) > 0)
        <section class="py-5" id="cat_{{ $category->id }}">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bootstrap-tabs product-tabs">
                            <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                                <h3>{{ $category->name }}</h3>
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all">{{ __('messages.all') }}</a>
                                        <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab" data-bs-toggle="tab" data-bs-target="#nav-fruits">{{ __('messages.fruits_veges') }}</a>
                                        <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab" data-bs-toggle="tab" data-bs-target="#nav-juices">{{ __('messages.juices') }}</a>
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                                    <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                        @foreach($category->products as $product)
                                            <div class="col">
                                                <div class="product-item">
                                                    <span class="badge bg-success position-absolute m-3">-30%</span>
                                                    <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                                                    <figure>
                                                        <a href="index.html" title="Product Title">
                                                            <img src="/storage/{{ $product->image }}" class="tab-image">
                                                        </a>
                                                    </figure>
                                                    <h3>{{ $product->name }}</h3>
                                                    <span class="qty">1 {{ __('messages.unit') }}</span>
                                                    <span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                                                    <span class="price">$18.00</span>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="input-group product-qty">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                                    <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                                                </button>
                                                            </span>
                                                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                                    <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <a href='{{ route("home.addtocart", ["lang" => app()->getLocale(), "id" => $product->id]) }}' class="nav-link">{{ __('messages.add_to_cart') }} <iconify-icon icon="uil:shopping-cart"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-fruits" role="tabpanel" aria-labelledby="nav-fruits-tab">
                                    <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                        <!-- Example product items for Fruits & Veges -->
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-juices" role="tabpanel" aria-labelledby="nav-juices-tab">
                                    <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                        <!-- Example product items for Juices -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endforeach
@endsection