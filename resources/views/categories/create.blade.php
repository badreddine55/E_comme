@extends("layout.main")

@section("title")
    Add new category

@endsection()

@section("content")
<section class="py-5">
      <div class="container-fluid">

        <div class=" py-5 my-5 rounded-5" style="background: url('/images/bg-leaves-img-pattern.png') no-repeat;">
          <div class="container my-5">
            <div class="row">
              <div class="col-md-6 p-5">
                <div class="section-header">
                  <h2 class="section-title display-4">Add new Category</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst amet, metus, sit massa posuere maecenas. At tellus ut nunc amet vel egestas.</p>
              </div>
              <div class="col-md-6 p-5">
                <form action='{{route("categries.store")}}' method="POST" enctype='multipart/form-data'>
                @csrf() 
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Name">
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control form-control-lg" name="image" id="image" placeholder="abc@mail.com">
                  </div>
                  
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                  </div>
                </form>
                
              </div>
              
            </div>
            
          </div>
        </div>
        
      </div>
    </section> 
@endsection()