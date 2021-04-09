@extends('layout.admin.index')
@section('title')
{{__('admin/admins.admin_list')}}
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{__('admin/admins.admins')}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(route('dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">{{__('admin/admins.admins')}}</li>
                            <li class="breadcrumb-item active">{{__('admin/admins.list')}}</li>
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
                        <h4>{{__('admin/admins.list_of_admin')}}</h4>
                        </div>
                        @isset($admins)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>{{__('admin/admins.email')}}</th>
                                                <th>{{__('admin/admins.image')}}</th>
                                                <th>{{__('admin/admins.username')}}</th>
                                                <th>{{__('admin/admins.phone')}}</th>
                                                <th>Role</th>
                                                <th>{{__('admin/admins.start_date')}}</th>
                                                <th>{{__('admin/admins.activate')}}</th>
                                                <th>{{__('admin/admins.action')}}</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($admins as $admin)
                                                <tr>
                                                    <td>{{$admin->id}}</td>
                                                    <td>{{$admin->email}}</td>
                                                    <td>
                                                        <img style="max-height:60px;max-width:60px;" class="rounded-circle" src="{{asset($admin->photo)}}" alt="">
                                                    </td>
                                                    <td>{{$admin->name}}</td>
                                                    <td>{{$admin->phone}}</td>
                                                    <td>{{optional($admin->role)->name}}</td>
                                                    <td>{{$admin->created_at}}</td>
                                                    <td>
                                                        @if($admin->is_activate === 1)
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{url(route('admin-deactivate',$admin->id))}}" style="text-decoration:none;color:white;">{{__('admin/admins.active')}}</a>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{url(route('admin-activate',$admin->id))}}" style="text-decoration:none;color:white;">{{__('admin/admins.deactive')}}</a>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- role edit -->
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalEdit-{{ $admin->id}}">
                                                        {{__('admin/admins.edit_role')}}
                                                        </button>
                                                        <div class="modal fade" id="myModalEdit-{{ $admin->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('admin/admins.admins')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('admin/role',$admin -> id)}}" method="post" enctype="multipart/form-data">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('admin/admins.edit_role')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$admin->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                        <label for="projectinput1">{{__('admin/admins.edit_role')}}</label>
                                                                                            <select name="role_id" class="select2 form-control">
                                                                                                <optgroup label="">
                                                                                                    @if($roles && $roles -> count() > 0)
                                                                                                        @foreach($roles as $role)
                                                                                                            <option value="{{$role -> id }}" {{ $admin->role->id == $role->id ? 'selected' : '' }}>{{$role -> name}}</option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </optgroup>
                                                                                            </select>
                                                                                            @error('role_id')
                                                                                            <span class="text-danger"> {{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <button class="btn btn-primary" type="submit">{{__('admin/admins.update')}}</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end role edit -->

                                                        <!-- delete row -->
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModaldelete-{{ $admin->id}}">
                                                            <i class="fa fa-trash"></i> {{__('admin/admins.delete')}}
                                                        </button>
                                                        <div class="modal fade" id="myModaldelete-{{ $admin->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('admin/admins.delete_confirmed')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{url(route('admin-delete',$admin->id))}}" class="" >
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            {{ csrf_field() }}
                                                                            <p>{{__('admin/admins.delete_sure')}}</p>
                                                                            <button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> {{__('admin/admins.delete')}}</button>
                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">{{__('admin/admins.cancel')}}</button>
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