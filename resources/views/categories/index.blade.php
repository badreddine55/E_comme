@extends("layout.main")

@section("title")
    {{ __('messages.categories') }}
@endsection

@section('content')
<div class="container">
    <h1 class="my-5">{{ __('messages.categories') }}</h1>
    <div class="text-center my-5">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">{{ __('messages.create_new_category') }}</a>
    </div>
    <div class="row">
        @foreach ($cat as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/storage/{{$category->image}}" class="card-img-top" alt="{{ $category->name }}" style="height:200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection