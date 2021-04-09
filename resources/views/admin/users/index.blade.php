@extends('layout.admin.index')
@section('title')
    Admin - Users
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Users</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(route('dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"> Users</li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                        <!-- <a href="" class="btn btn-primary mb-3"> <i class="fa fa-plus"> </i></a> -->
                        <h4>List Of Users</h4>
                        </div>
                        @isset($users)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Start date</th>
                                                <th>Is Activate</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>
                                                        <img style="max-height:60px;max-width:60px;" class="rounded-circle" src="{{asset($user->photo)}}" alt="">
                                                    </td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        @if($user->is_activate == 1)
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('users/deactivate',$user->id)}}" style="text-decoration:none;color:white;">ِActivate</a>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('users/activate',$user->id)}}" style="text-decoration:none;color:white;">DeActivate</a>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                         <!-- delete row -->
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModaldelete-{{ $user->id}}">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                        <div class="modal fade" id="myModaldelete-{{ $user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{url(route('users/delete',$user->id))}}" class="" >
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            {{ csrf_field() }}
                                                                            <p>Are You Sure To Delete This Data</p>
                                                                            <button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end delete row -->
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
                <!-- Individual column searching (text inputs) Ends-->
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

@endsection