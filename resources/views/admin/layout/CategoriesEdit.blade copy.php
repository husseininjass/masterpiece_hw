{{-- @include('admin.includes.head') --}}
{{-- @extends('admin.masterpage') --}}
@extends('admin.dashboard')

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


<div class="table-data">
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
    <div class="order">
        <div class="head">
            {{-- <h3>Category</h3> --}}
            
        </div>
        


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


        <div class="Users_table">
            <table width="100%">
                <thead>
                    <tr>
                    
                        
                        <th><span class="las la-sort"></span>Category Name </th>
                        <th><span class="las la-sort"></span> Photo</th>
                        <th><span class="las la-sort"></span> Photo</th>
                        <th><span class="las la-sort"></span> Action</th>
                        {{-- <th colspan="2" style="text-align: center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <form id="form" action="{{ route('admin_category_update',$categories_data->category_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <tr>
                            {{-- <td>{{ $row->category_id }}</td> --}}
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

</div>
@endsection
