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
                                <li class="breadcrumb-item active"> {{__('admin/admins.edit_profile')}}</li>
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
                                <form class="card" action="{{url(route('update-info-account',auth()->user()->id))}}" method="post" enctype="multipart/form-data">
                                    
                                    @csrf

                                    <div class="card-header">
                                        <h4 class="card-title mb-0">{{__('admin/admins.edit_information')}}</h4>
                                        <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                    </div>

                                    <div class="card-body">

                                        @include('flash::message')

                                        <div class="row">

                                            <input name="id" type="hidden" value="{{$admin->id}}">

                                            <div class="col-md-5">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{__('admin/admins.email')}}</label>
                                                    <input class="form-control" name="email" type="email" value="{{$admin->email}}">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{__('admin/admins.username')}}</label>
                                                    <input class="form-control" name="name" type="text" value="{{$admin->name}}">
                                                    @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{__('admin/admins.phone')}}</label>
                                                    <input class="form-control" name="phone" type="text" value="{{$admin->phone}}">
                                                    @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group mb-3">
                                                    <input name="photo" type="file" class="form-control" id="inputGroupFile02">
                                                    <label class="input-group-text" for="inputGroupFile02">{{__('admin/admins.upload_image')}}</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">{{__('admin/admins.update')}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div>

@endsection