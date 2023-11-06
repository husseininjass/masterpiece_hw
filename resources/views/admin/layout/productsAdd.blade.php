{{-- @include('admin.includes.head') --}}
{{-- @extends('admin.masterpage') --}}
{{-- @extends('admin.dashboard') --}}
@extends('admin..admin2')

{{-- @section('right_top_button')
<a href="{{ route('view_Categories') }}" class="btn-download">
    View Category
</a>
@endsection --}}

@section('main_body')
Products 
<li><i class='bx bx-chevron-right' ></i></li>
<li>
    <a class="active" href="#">Add New Products</a>
</li>
@endsection

@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Horizontal Form</h6>
                <form id="form" action="{{ route('admin_Products_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Photo :</label>
                        <div class="col-sm-10">
                            <input class="form-control form-control-sm bg-dark" name="photo" value="{{ old('name') }}" id="formFileSm" type="file">
                            <div class="error">@error('photo'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Products  Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="product_Name" required="" value=" {{ old('product_Name') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('product_Name'){{$message}}@enderror</div>
                        </div>
                    </div>
                
                    <select class="form-select mb-3" aria-label="Default select example" name="category_id" >
                        <option selected>select category</option>
                        @foreach($category as $row)
                        <option value="{{ $row->category_id }}">{{ $row->category_Name }}</option>
                        @endforeach
                        
                    </select>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">price :</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" required="" value=" {{ old('price') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('price'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">discount :</label>
                        <div class="col-sm-10">
                            <input type="text" name="discount" required="" value=" {{ old('discount') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('discount'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">rating :</label>
                        <div class="col-sm-10">
                            <input type="text" name="rating" required="" value=" {{ old('rating') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('rating'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">description:  </label>
                        <div class="col-sm-10">
                            <input type="text" name="description" required="" value=" {{ old('description') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('description'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">quantity:  </label>
                        <div class="col-sm-10">
                            <input type="text" name="quantity" required="" value=" {{ old('quantity') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('quantity'){{$message}}@enderror</div>
                        </div>
                    </div>
                
                    
                    

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
        
        
        
    
        
    </div>
</div>


@endsection
