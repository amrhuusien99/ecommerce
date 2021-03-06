@extends('layout.admin.index')

@section('title')
{{__('admin/admins.admin_info')}}
@endsection

@section('content')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{__('admin/admins.edit_profile')}}</h3>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{__('admin/admins.admins')}}</li>
                                <li class="breadcrumb-item active">{{__('admin/admins.edit_profile')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @isset($admin)
                <div class="container-fluid">
                    <div class="edit-profile">
                        <div class="row">
                            <div class="col-xl-12">
                                <form class="card" action="{{url(route('update-admin-password',auth()->user()->id))}}" method="post" enctype="multipart/form-data">
                                    
                                    @csrf

                                    <div class="card-header">
                                        <h4 class="card-title mb-0">{{__('admin/admins.change_password')}}</h4>
                                        <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                    </div>

                                    <div class="card-body">

                                        @include('flash::message')

                                        <div class="row">

                                            <input name="id" type="hidden" value="{{$admin->id}}">
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-6 mb-3 ml-5">
                                                    <label class="form-label">{{__('admin/admins.old_password')}}</label>
                                                    <input class="form-control" name="oldpassword" type="password">
                                                    @error('oldpassword')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-6 mb-3 ml-5">
                                                    <label class="form-label">{{__('admin/admins.password')}}</label>
                                                    <input class="form-control" name="password" type="password">
                                                    @error('password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-6 mb-3 ml-5">
                                                    <label class="form-label">{{__('admin/admins.password_confirmed')}}</label>
                                                    <input class="form-control" name="password_confirmation" type="password" >
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{$message}}</span>
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
            @endisset
        </div>

@endsection