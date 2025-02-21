@extends("layout.main")

@section("title")
    {{ __('messages.add_new_category') }}
@endsection()

@section("content")
<section class="py-5">
    <div class="container-fluid">
        <div class="py-5 my-5 rounded-5" style="background: url('/images/bg-leaves-img-pattern.png') no-repeat;">
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 p-5">
                        <div class="section-header">
                            <h2 class="section-title display-4">{{ __('messages.add_new_product') }}</h2>
                        </div>
                        <p>{{ __('messages.lorem_ipsum') }}</p>
                    </div>
                    <div class="col-md-6 p-5">
                        <form action='{{ route("products.store") }}' method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('messages.name') }}</label>
                                <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="{{ __('messages.name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                                <select name="category_id" id="category_id" class="form-control form-control-lg">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('messages.description') }}</label>
                                <textarea name="description" class="form-control form-control-lg" id="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('messages.image') }}</label>
                                <input type="file" class="form-control form-control-lg" name="image" id="image">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-lg">{{ __('messages.submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()
