{{-- @include('admin.includes.head') --}}
{{-- @extends('admin.masterpage') --}}
{{-- @extends('admin.dashboard') --}}
@extends('admin.admin2')

@section('right_top_button')
<a href="{{ route('view_users') }}" class="btn-download">
    View Users
</a>
@endsection

@section('main_body')
Users
<li><i class='bx bx-chevron-right' ></i></li>
<li>
    <a class="active" href="#">Edit User</a>
</li>
<li><i class='bx bx-chevron-right' ></i></li>
<li>
    <a class="active" href="#">
        {{-- @foreach($users as $row)
        
            {{ $loop->iteration }}
            {{ $row->firstName }} {{ $row->lastName }}
        @endforeach --}}
    </a>
</li>
@endsection

@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Horizontal Form</h6>
                <form id="form" action="{{ route('admin_users_update',$users_data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="{{ asset('uploads/'.$users_data->photo) }}" style="width: 100px; height: 100px;">
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Photo :</label>
                        <div class="col-sm-10">
                            <input class="form-control form-control-sm bg-dark" name="photo" value="{{ old('name') }}" id="formFileSm" type="file">
                            <div class="error">@error('photo'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Firt Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstName" required="" value=" {{ $users_data->firstName }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('firstName'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name :</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastName" required="" value=" {{ $users_data->lastName }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('lastName'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email :</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" required="" value=" {{ $users_data->email }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('email'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10 message_error">
                            <input type="password" name="password" required="" value="{{ old('password') }}" class="form-control" id="inputPassword3">
                            <div class="error">@error('password'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password :</label>
                        <div class="col-sm-10">
                            <input type="password" name="retype_password" required="" value="{{ old('retype_password')}}" class="form-control" id="inputPassword3">
                            <div class="error">@error('retype_password'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input  type="text" name="phoneNumber" required="" value=" {{ $users_data->phoneNumber }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('phoneNumber'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">City :</label>
                        <div class="col-sm-10">
                            <input type="text" name="city" required="" value=" {{ $users_data->city }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('city'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Address :</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" required="" value=" {{ $users_data->address }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('address'){{$message}}@enderror</div>
                        </div>
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
        
        
        
    
        
    </div>
</div>



{{-- <div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Edit User</h3>
            <i class='bx bx-search' ></i>
            <i class='bx bx-filter' ></i>
        </div> --}}
        {{-- <form action="{{ route('admin_users_update',$users_data->id) }}" method="post" enctype="multipart/form-data" class="form_add">
            @csrf
            <div class="inputContainer">
                <div >
                    <img src="{{ asset('uploads/'.$users_data->photo) }}" alt="" style="width: 200px; height: 250px;">
                </div>
                <input type="file" name="photo" value=" {{ $users_data->photo }}">
                <label class="inputLabel">Photo :</label>
                <div class="inputUnderline"></div>
            </div>
            <div class="inputContainer">
                <input type="text" class="customInput" name="firstName" required="" value=" {{ $users_data->firstName }}">
                <label class="inputLabel">First Name :</label>
                <div class="inputUnderline"></div>
            </div>              
            <div class="inputContainer">
                <input type="text" class="customInput" name="lastName" required="" value=" {{ $users_data->lastName }}">
                <label class="inputLabel">Last Name :</label>
                <div class="inputUnderline"></div>
            </div>              
            <div class="inputContainer">
                <input type="text" class="customInput" name="email" required="" value=" {{ $users_data->email }}">
                <label class="inputLabel">Email :</label>
                <div class="inputUnderline"></div>
            </div>              
            <div class="inputContainer">
                
                <input type="text" class="customInput" name="password" required="" value=" {{ Crypt::decrypt($users_data->password)  }}">
                <label class="inputLabel">Password :</label>
                <div class="inputUnderline"></div>
            </div>              
            <div class="inputContainer">
                <input type="text" class="customInput" name="retype_password" required="" value=" {{  old('retype_password') }}">
                <label class="inputLabel">Confirm Password :</label>
                <div class="inputUnderline"></div>
            </div>              
            <div class="inputContainer">
                <input type="text" class="customInput" name="phoneNumber" required="" value=" {{ $users_data->phoneNumber }}">
                <label class="inputLabel">phoneNumber</label>
                <div class="inputUnderline"></div>
            </div>              
            <div class="inputContainer">
                <input type="text" class="customInput" name="city" required="" value=" {{ $users_data->city }}">
                <label class="inputLabel">City :</label>
                <div class="inputUnderline"></div>
            </div>              
            <div class="inputContainer">
                <input type="text" class="customInput" name="address" required="" value=" {{ $users_data->address }}">
                <label class="inputLabel">Address :</label>
                <div class="inputUnderline"></div>
            </div>               --}}
                    
            {{-- <button type="submit"><a href="/login">Login Now!</a></button><br/> --}}
            
            {{-- <br>
            <div>
                <button type="submit" class="button_add">Submit</button><br/> 
            </div>            
            
        </form> --}}

        
   {{-- </div>
     <div class="modalForm">
        <form id="form" action="{{ route('admin_users_update',$users_data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            
            
            <div class="input-control">
                <label>First Name :</label>
                <input type="text" name="firstName" required="" value=" {{ $users_data->firstName }}">
                <div class="error">
                    @error('firstName'){{$message}}@enderror
                </div>
            </div>
            <div class="input-control">
                <label>Last Name :</label>
                <input type="text" name="lastName" required="" value=" {{ $users_data->lastName }}">
                <div class="error">@error('lastName'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>Email :</label>
                <input type="email" name="email" required="" value=" {{ $users_data->email  }}">
                <div class="error">@error('email'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>phoneNumber :</label>
                <input  type="text" name="phoneNumber" required="" value=" {{  $users_data->phoneNumber }}">
                <div class="error">@error('phoneNumber'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>Password :</label>
                <input type="password" name="password" required="" value="{{ Crypt::decrypt($users_data->password) }}">
                <div class="error">@error('password'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label >Confirm Password :</label>
                <input type="password" name="retype_password" required="" value="{{ old('retype_password')}}">
                <div class="error">@error('retype_password'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>City :</label>
                <input type="text" name="city" required="" value=" {{ $users_data->city }}">
                <div class="error">@error('city'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>Address :</label>
                <input type="text" name="address" required="" value="  {{ $users_data->address }}">
                <div class="error">@error('address'){{$message}}@enderror</div>
            </div>
            <div>
                <img src="{{ asset('uploads/'.$users_data->photo) }}" alt="" style="width: 200px; height: 250px;">
                <div class="input-control">
                    <label>Photo :</label>
                    <input type="file" name="photo" value="{{ $users_data->photo  }}" class="w_100">
                    <div class="error">@error('photo'){{$message}}@enderror</div>
                </div>
            </div>
            
            <button type="submit"  >Submit</button><br/> 
            
        </form>
    </div> 

    
</div>--}}
@endsection
