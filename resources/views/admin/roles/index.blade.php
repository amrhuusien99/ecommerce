@extends('layout.admin.index')
@section('title')
    {{__('admin/roles.roles')}}
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{__('admin/roles.roles')}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(route('dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">{{__('admin/roles.roles')}}</li>
                            <li class="breadcrumb-item active">{{__('admin/roles.list')}}</li>
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
                        <h4>{{__('admin/roles.roles_list')}}</h4>
                        </div>
                        @isset($roles)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>{{__('admin/roles.name')}}</th>
                                                <th>{{__('admin/roles.start_date')}}</th>
                                                <th>{{__('admin/roles.action')}}</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($roles as $role)
                                                <tr>
                                                    <td>{{$role->id}}</td>
                                                    <td>{{$role->name}}</td>
                                                    <td>{{$role->created_at}}</td>
                                                    <td>
                                                    
                                                        <!-- edit row -->
                                                        <button class="btn btn-success btn-xs" type="button">
                                                            <a href="{{route('roles/edit',$role->id)}}" style="text-decoration:none;color:white;">
                                                                {{__('admin/roles.edit')}}
                                                            </a>
                                                        </button>
                                                        <!-- end edit row -->

                                                        <!-- delete row -->
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModaldelete-{{ $role->id}}">
                                                            <i class="fa fa-trash"></i> {{__('admin/roles.delete')}}
                                                        </button>
                                                        <div class="modal fade" id="myModaldelete-{{ $role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('admin/roles.delete_confirmation')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{url(route('roles/delete',$role->id))}}" class="" >
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            {{ csrf_field() }}
                                                                            <p>{{__('admin/roles.delete_sure')}}</p>
                                                                            <button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> {{__('admin/brands.delete')}}</button>
                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">{{__('admin/roles.cancel')}}</button>
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