
{{-- @include('admin.includes.head')  --}}
{{-- @extends('admin.masterpage') --}}
{{-- @extends('admin.dashboard') --}}
@extends('admin..admin2')

{{-- @section('right_top_button')
<a href="{{ route('dashboard') }}" class="btn-download">
    Home
</a>
@endsection
@section('title_nav')
Categories
@endsection --}}

@section('main_body')
Categories
@endsection



@section('main')

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Users</h6>
            <button type="button" class="btn btn-danger m-2">Delete</button>

            <a href="{{ route('admin_category_add')  }}">
                <button type="button" class="button">
                    <span class="button__text">Add Category</span>
                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                </button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Category Name/th>
                        <th scope="col" colspan="2" style="text-align: center">Action</th>
                    
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($category as $row)
                    
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td class="colorUsers">{{$loop->iteration}}</td>

                        <td>@if($row->photo!='')
                            <div class="client-img bg-img" style="background-image: url({{ asset('uploads/'.$row->photo) }})">
                            @else
                                <img src="{{ asset('uploads/default.png') }}" alt="default" class="w_100">
                            </div>
                            @endif
                        </td>
                        <td  class="colorUsers">{{ $row->category_Name }}</td>
                    
                        <td><a class="btn btn-square btn-outline-primary m-2" href="{{ route('admin_category_edit',$row->category_id ) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        <td>
                            
                            <form method="POST" action="{{ route('admin_category_delete',$row->category_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-primary">
                                    Delete
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

{{-- <div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Users</h3>
            <i class='bx bx-search' ></i>
           
            <a href="{{ route('admin_users_add') }}">
            <button type="button" class="buttonnew">
                <span class="button__text">Add User</span>
                <span class="button__icon"><svg  width="24" height="24" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </button></a>
            <i class='bx bx-filter' ></i>
        </div>
        <table>
            <thead>
                <tr>
                    

                    <th>ID</th>
                    <th>Photo</th>
                    <th>Category Name</th>
                    
                    <th colspan="2" style="text-align: center">Action</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($category as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->category_id }}</td>
                    <td>
                        @if($row->photo!='')
                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="user" class="w_100">
                        @else
                            <img src="{{ asset('uploads/default.png') }}" alt="default" class="w_100">
                        @endif
                        
                    </td>
                    <td>{{ $row->category_Name }}</td>

                    
                    <td>
                       
                        
                        <a href='"{{ route('admin_users_edit',$row->id) }}"' ><button class="btnnew-primary">Edit</button></a>
                        
                       
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin_users_delete', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin_users_delete',$row->id) }}">
                            <button type="submit" class="btnnew-danger" onclick="return confirm('Are you sure?');">
                                Delete
                            </button></a>
                        </form>
                    </td>
                    <td>
                    @if($row->status == 1)
                        <a href="{{ route('admin_users_change_status',$row->id) }}" ><button class="btnnew-primary">Active</button></a>
                    @else
                        <a href="{{ route('admin_users_change_status',$row->id) }}" ><button class="btnnew-danger">Pending</button></a>

                    @endif
                    </td>
                    <td>
                    @if($row->userState == 0)
                    <a href="{{ route('admin_users_change_userState',$row->id) }}" ><button class="btnnew-danger">Pending</button></a>
                    @else
                    <a href="{{ route('admin_users_change_userState',$row->id) }}" ><button class="btnnew-primary">Active</button></a>

                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div> --}}


{{-- 
<div class="records table-responsive">
    
    <div class="record-header">
        <div class="add">
            <span>Entries</span>
            <select name="" id="">
                <option value="">ID</option>
            </select>
            <a href="{{ route('admin_category_add') }}">
            <button>Add Category</button></a>
        </div>

        <div class="browse">
            <input type="search" placeholder="Search" class="record-search">
            <select name="" id="">
                <option value="">Status</option>
            </select>
        </div>
    </div>

    <div class="Users_table">
        <table width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    
                    
                    <th><span class="las la-sort"></span>Photo</th>
                    <th><span class="las la-sort"></span>Category Name </th>
                    <th><span class="las la-sort"></span>Action</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($category as $row)
            
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <div class="client">
                            @if($row->photo!='')
                            <div class="client-img bg-img" style="background-image: url({{ asset('uploads/'.$row->photo) }})">
                            
                        @else
                            <img src="{{ asset('uploads/default.png') }}" alt="default" class="w_100">
                        @endif</div>
                            <div class="client-info">
                                <h4>{{ $row->category_Name }} </h4>
                                
                            </div>
                        </div>
                    </td>
                   
                    <td>{{ $row->category_Name }}</td>

                    
                
                    
                    <td>
                        <div class="actions">
                            <span><a href="{{ route('admin_category_edit',$row->category_id ) }}" ><i class="fa-regular fa-pen-to-square"></i></a></span>
                            
                            <span class="las la-ellipsis-v"></span>
                        </div>
                    </td>
            
                    <td>
                        <form method="POST" action="{{ href="{{ route('admin_category_edit',$row->category_id ) }}" }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin_category_delete',$row->category_id) }}">
                            <button type="submit" class="btnnew-danger" onclick="return confirm('Are you sure?');">
                                Delete
                            </button></a>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

</div> --}}
@endsection
