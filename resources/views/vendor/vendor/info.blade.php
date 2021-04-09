@extends('layout.vendor.index')

@section('title')
{{__('vendor/vendors.vendor_info')}}
@endsection

@section('content')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{__('vendor/vendors.edit_profile')}}</h3>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url(route('vendor-dashboard'))}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{__('vendor/vendors.vendors')}}</li>
                                <li class="breadcrumb-item active"> {{__('vendor/vendors.edit_profile')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @isset($vendor)
                <div class="container-fluid">
                    <div class="edit-profile">
                        <div class="row">
                            <div class="col-xl-12">
                                <form class="card" action="{{url(route('vendor-update-info-account',auth()->user()->id))}}" method="post" enctype="multipart/form-data">
                                    
                                    @csrf

                                    <div class="card-header">
                                        <h4 class="card-title mb-0">{{__('vendor/vendors.edit_information')}}</h4>
                                        <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                    </div>

                                    <div class="card-body">

                                        @include('flash::message')

                                        <div class="row">

                                            <input name="id" type="hidden" value="{{$vendor->id}}">
                                  
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{__('vendor/vendors.email')}}</label>
                                                    <input class="form-control" name="email" type="email" value="{{$vendor->email}}">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{__('vendor/vendors.username')}}</label>
                                                    <input class="form-control" name="name" type="text" value="{{$vendor->name}}">
                                                    @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{__('vendor/vendors.phone')}}</label>
                                                    <input class="form-control" name="phone" type="text" value="{{$vendor->phone}}">
                                                    @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{__('vendor/vendors.address')}}</label>
                                                    <input class="form-control" name="address" type="text" value="{{$vendor->address}}">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-8">
                                                <div class="input-group mt-3">
                                                    <input name="photo" type="file" class="form-control" id="inputGroupFile02">
                                                    <lab el class="input-group-text" for="inputGroupFile02">{{__('vendor/vendors.upload_image')}}</label>
                                                    @error('photo')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">{{__('vendor/vendors.update')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div>

@endsection