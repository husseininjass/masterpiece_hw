
{{-- @include('admin.includes.head')  --}}
{{-- @extends('admin.masterpage') --}}
{{-- @extends('admin.dashboard') --}}
@extends('admin..admin2')

{{-- @section('right_top_button')
<a href="{{ route('dashboard') }}" class="btn-download">
    Home
</a>
@endsection --}}
{{-- @section('title_nav')
Users
@endsection --}}

@section('main_body')
<a href="{{ route('view_users') }}" class="btn-download">
Users
</a>
@endsection



@section('main')
{{-- <div class="records table-responsive">
    
                    <div class="record-header">
                        <div class="add">
                            <span>Entries</span>
                            <select name="" id="">
                                <option value="">ID</option>
                            </select>
                            <a href="{{ route('admin_users_add') }}">
                            <button>Add User</button></a>
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
                                    
                                    <th><span class="las la-sort"></span> Users</th>
                                    <th><span class="las la-sort"></span> Phone</th>
                                    <th><span class="las la-sort"></span>ACTIONS </th> --}}
                                    {{-- <th colspan="2"><span class="las la-sort"></span> ACTIONS</th> --}}
                                    {{-- <th><span class="las la-sort"></span> activation</th>
                                    <th><span class="las la-sort"></span> admin</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $row)
                            
                                    <td>{{$loop->iteration}}</td>
                                
                                    <td>
                                        <div class="client">
                                            @if($row->photo!='')
                                                <div class="client-img bg-img" style="background-image: url({{ asset('uploads/'.$row->photo) }})">
                                                @else
                                                    <img src="{{ asset('uploads/default.png') }}" alt="default" class="w_100">
                                                </div>
                                            @endif
                                            <div class="client-info">
                                                <h4>{{ $row->firstName }} {{ $row->lastName }}</h4>
                                                <small>{{ $row->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $row->phoneNumber }}
                                    </td>
                                    
                                    <td>
                                        <div class="actions">
                                            <span><a href="{{ route('admin_users_edit',$row->id) }}" ><i class="fa-regular fa-pen-to-square"></i></a></span>
                                            <span >
                                                <form method="POST" action="{{ route('admin_users_delete', $row->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?');">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </span>
                                            <span class="las la-ellipsis-v"></span>
                                        </div>
                                    </td> --}}
                                   
                                    {{-- <td>
                                        <form method="POST" action="{{ route('admin_users_delete', $row->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin_users_delete',$row->id) }}">
                                            <button type="submit" class="btnnew-danger" onclick="return confirm('Are you sure?');">
                                                Delete
                                            </button></a>
                                        </form>
                                    </td> --}}
                                    {{-- <td>
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

</div>--}}

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Users</h6>
            <form>
            <button type="button" class="btn btn-danger m-2">Delete</button>

            <a href="{{ route('admin_users_add') }}">
                <button type="button" class="button">
                    <span class="button__text">Add Users</span>
                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                </button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>=
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">#</th>
                        <th scope="col">Users</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        {{-- <th scope="col">Status</th> --}}
                        <th scope="col" colspan="2" style="text-align: center">Action</th>
                        <th scope="col">activation</th>
                        <th scope="col">admin</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($users as $row)
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
                        <td  class="colorUsers">{{ $row->firstName }} {{ $row->lastName }}</td>
                        <td  class="colorUsers">{{ $row->email }}</td>
                        <td  class="colorUsers">{{ $row->phoneNumber }}</td>
                        <td><a class="btn btn-square btn-outline-primary m-2" href="{{ route('admin_users_edit',$row->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        <td>
                            
                            <form method="POST" action="{{ route('admin_users_delete', $row->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-primary">
                                    Delete
                                </button>
                            </form>
                        </td>
                        <td>
                            @if($row->status == 1)
                                <a href="{{ route('admin_users_change_status',$row->id) }}" ><button class="btn btn-sm btn-success ">Active</button></a>
                            @else
                                <a href="{{ route('admin_users_change_status',$row->id) }}" ><button class="btn btn-sm btn-primary">Pending</button></a>
        
                            @endif
                        </td>
                        <td>
                            @if($row->userState == 0)
                            <a href="{{ route('admin_users_change_userState',$row->id) }}" ><button class="btn btn-sm btn-primary">Pending</button></a>
                            @else
                            <a href="{{ route('admin_users_change_userState',$row->id) }}" ><button class="btn btn-sm btn-success">Active</button></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        </div>
    </div>
</div>
@endsection
