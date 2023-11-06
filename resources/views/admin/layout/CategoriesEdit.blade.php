{{-- @include('admin.includes.head') --}}
{{-- @extends('admin.masterpage') --}}
{{-- @extends('admin.dashboard') --}}
@extends('admin.admin2')

{{-- @section('right_top_button')
<a href="{{ route('view_Categories') }}" class="btn-download">
    View Category
</a>
@endsection --}}

@section('main_body')
Category 
<li><i class='bx bx-chevron-right' ></i></li>
<li>
    <a class="active" href="#">Add New Category</a>
</li>
@endsection

@section('main')


{{-- <div class="table-data"> --}}


    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Category </h6>
                    <form id="form" action="{{ route('admin_category_update',$categories_data->category_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded-circle mx-auto mb-4" src="{{ asset('uploads/'.$categories_data->photo) }}" style="width: 100px; height: 100px;">
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Photo :</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-sm bg-dark" name="photo"  id="formFileSm" type="file">
                                <div class="error">@error('photo'){{$message}}@enderror</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Firt Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="category_Name" required="" value="{{ $categories_data->category_Name }}" class="form-control" id="inputEmail3">
                                <div class="error">@error('category_Name'){{$message}}@enderror</div>
                            </div>
                        </div>
                        
                        
                        
    
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>

        </div>
    </div>



    {{-- @if (count($errors) >0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        
                    </ul>
                </div>
                <script>
                    var milliseconds = 3000;
                    setTimeout(function () {
                        document.getElementById('success-alert').remove();
                    }, milliseconds);
                </script>
                @endif --}}
    {{-- <div class="order">
        <div class="head">
            
            
        </div> --}}
        


        {{-- <div class="modalForm">
            <form id="form" action="{{ route('admin_category_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-control">
                    <label>First Name :</label>
                    <input type="text" name="firstName" required="" value=" {{ old('firstName') }}">
                    <div class="error">
                        @error('firstName'){{$message}}@enderror
                    </div>
                </div>
                <div class="input-control">
                    <label>Last Name :</label>
                    <input type="text" name="lastName" required="" value=" {{ old('lastName') }}">
                    <div class="error">@error('lastName'){{$message}}@enderror</div>
                </div>
                <div class="input-control">
                    <label>Address :</label>
                    <input type="text" name="address" required="" value=" {{ old('address') }}">
                    <div class="error">@error('address'){{$message}}@enderror</div>
                </div>
                <div class="input-control">
                    <label>Photo :</label>
                    <input type="file" name="photo" value="{{ old('name') }}">
                    <div class="error">@error('photo'){{$message}}@enderror</div>
                </div>
                
                <button type="submit"  >Submit</button><br/> 
                
            </form>
        </div> --}}


        {{-- <div class="Users_table">
            <table width="100%">
                <thead>
                    <tr>
                    
                        
                        <th><span class="las la-sort"></span>Category Name </th>
                        <th><span class="las la-sort"></span> Photo</th>
                        <th><span class="las la-sort"></span> Photo</th>
                        <th><span class="las la-sort"></span> Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <form id="form" action="{{ route('admin_category_update',$categories_data->category_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <tr>
                           
                            <td>
                                <input type="text" name="category_Name" required="" value="{{ $categories_data->category_Name }}">
                                <div class="error">
                                    @error('category_Name'){{$message}}@enderror
                                </div>
                            </td>
                            <td>
                                <input type="file" name="photo" >
                                <div class="error">
                                    @error('photo'){{$message}}@enderror
                                </div>

                                
                            </td>
                            <td>
                                <div class="client-img bg-img" style="background-image: url({{ asset('uploads/'.$categories_data->photo) }})">

                            </td>
                            <td>
                                <button type="submit">Submit</button><br/> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="error">
                                    @error('photo'){{$message}}@enderror
                                </div>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>

</div> --}}
@endsection
