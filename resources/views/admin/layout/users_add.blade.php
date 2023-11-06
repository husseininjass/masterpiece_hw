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
    <a class="active" href="#">Add New User</a>
</li>
@endsection

@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit User  </h6>
                <form id="form" action="{{ route('admin_users_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
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
                            <input type="text" name="firstName" required="" value=" {{ old('firstName') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('firstName'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name :</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastName" required="" value=" {{ old('lastName') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('lastName'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email :</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" required="" value=" {{ old('email') }}" class="form-control" id="inputEmail3">
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
                            <input  type="text" name="phoneNumber" required="" value=" {{ old('phoneNumber') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('phoneNumber'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">City :</label>
                        <div class="col-sm-10">
                            <input type="text" name="city" required="" value=" {{ old('city') }}" class="form-control" id="inputEmail3">
                            <div class="error">@error('city'){{$message}}@enderror</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Address :</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" required="" value=" {{ old('address') }}" class="form-control" id="inputEmail3">
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
            <h3>Recent Orders</h3>
            <i class='bx bx-search' ></i>
            <i class='bx bx-filter' ></i>
        </div> --}}
        {{-- @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif --}}
        {{-- <div class="modalForm">
        <form action="{{ route('admin_users_store') }}" method="post" enctype="multipart/form-data" class="form_add">
            @csrf --}}
            {{-- <div class="inputContainer">
                <input class="customInput" type="text"  name="firstName" required="" value=" {{ old('firstName') }}">
                <label class="inputLabel">First Name :</label>
                @if ($errors->has('firstName'))
                    <div class="error">{{ $errors->first('firstName') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input class="customInput" type="text"  name="lastName" required="" value=" {{ old('lastName') }}">
                <label class="inputLabel">Last Name :</label>
                @if ($errors->has('lastName'))
                <div class="error">{{ $errors->first('lastName') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input class="customInput" type="text"  name="email" required="" value=" {{ old('email') }}">
                <label class="inputLabel">Email :</label>
                @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input class="customInput" type="text"  name="password" required="" value=" {{ old('password') }}">
                <label class="inputLabel">Password :</label>
                @if ($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input class="customInput" type="text"  name="retype_password" required="" value=" {{ old('retype_password') }}">
                <label class="inputLabel">Confirm Password :</label>
                @if ($errors->has('retype_password'))
                <div class="error">{{ $errors->first('retype_password') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input class="customInput" type="text"  name="phoneNumber" required="" value=" {{ old('phoneNumber') }}">
                <label class="inputLabel">phoneNumber</label>
                @if ($errors->has('phoneNumber'))
                <div class="error">{{ $errors->first('phoneNumber') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input class="customInput" type="text"  name="city" required="" value=" {{ old('city') }}">
                <label class="inputLabel">City :</label>
                @if ($errors->has('city'))
                <div class="error">{{ $errors->first('city') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input class="customInput" type="text"  name="address" required="" value=" {{ old('address') }}">
                <label class="inputLabel">Address :</label>
                @if ($errors->has('address'))
                <div class="error">{{ $errors->first('address') }}</div>
                @endif
            </div>              
            <div class="inputContainer">
                <input type="file" name="photo" value="{{ old('name') }}">
                <label class="inputLabel">Photo :</label>
                @if ($errors->has('photo'))
                <div class="error">{{ $errors->first('photo') }}</div>
                @endif
            </div>          --}}
            {{-- <button type="submit"><a href="/login">Login Now!</a></button><br/> --}}
            
            {{-- <div class="input-control">
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
                <label>Email :</label>
                <input type="email" name="email" required="" value=" {{ old('email') }}">
                <div class="error">@error('email'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>phoneNumber :</label>
                <input  type="text" name="phoneNumber" required="" value=" {{ old('phoneNumber') }}">
                <div class="error">@error('phoneNumber'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>Password :</label>
                <input type="password" name="password" required="" value="{{ old('password') }}">
                <div class="error">@error('password'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label >Confirm Password :</label>
                <input type="password" name="retype_password" required="" value="{{ old('retype_password')}}">
                <div class="error">@error('retype_password'){{$message}}@enderror</div>
            </div>
            <div class="input-control">
                <label>City :</label>
                <input type="text" name="city" required="" value=" {{ old('city') }}">
                <div class="error">@error('city'){{$message}}@enderror</div>
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



            <br>
            <div>
                <button type="submit" class="button_add">Submit</button><br/> 
            </div>            
            
        </form>
        </div> --}}
      

        {{-- <div class="modalForm">
            <form id="form" action="{{ route('admin_users_store') }}" method="post" enctype="multipart/form-data">
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
                    <label>Email :</label>
                    <input type="email" name="email" required="" value=" {{ old('email') }}">
                    <div class="error">@error('email'){{$message}}@enderror</div>
                </div>
                <div class="input-control">
                    <label>phoneNumber :</label>
                    <input  type="text" name="phoneNumber" required="" value=" {{ old('phoneNumber') }}">
                    <div class="error">@error('phoneNumber'){{$message}}@enderror</div>
                </div>
                <div class="input-control">
                    <label>Password :</label>
                    <input type="password" name="password" required="" value="{{ old('password') }}">
                    <div class="error">@error('password'){{$message}}@enderror</div>
                </div>
                <div class="input-control">
                    <label >Confirm Password :</label>
                    <input type="password" name="retype_password" required="" value="{{ old('retype_password')}}">
                    <div class="error">@error('retype_password'){{$message}}@enderror</div>
                </div>
                <div class="input-control">
                    <label>City :</label>
                    <input type="text" name="city" required="" value=" {{ old('city') }}">
                    <div class="error">@error('city'){{$message}}@enderror</div>
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
        </div>



    </div>

</div> --}}
@endsection
