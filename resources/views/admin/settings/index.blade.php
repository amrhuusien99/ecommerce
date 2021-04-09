@extends('layout.admin.index')
@section('title')
    Admin - Settings
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Settings</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(route('dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Settings</li>
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
                        <h4>List Of Settings</h4>
                        </div>
                        @isset($settings)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Facebook</th>
                                                <th>Insta</th>
                                                <th>Whats App</th>
                                                <th>Bank Name</th>
                                                <th>Commission</th>
                                                <th>App Link</th>
                                                <th>Twitter</th>
                                                <th>Youtube</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($settings as $setting)
                                                <tr>
                                                    <td>{{$setting->email}}</td>
                                                    <td>{{$setting->phone}}</td>
                                                    <td>{{$setting->facebook}}</td>
                                                    <td>{{$setting->insta}}</td>
                                                    <td>{{$setting->whats_app}}</td>
                                                    <td>{{$setting->bank_name}}</td>
                                                    <td>{{$setting->commission}}</td>
                                                    <td>{{$setting->app_link}}</td>
                                                    <td>{{$setting->twitter}}</td>
                                                    <td>{{$setting->youtube}}</td>
                                                    <td>
                                                         <!-- edit row -->
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalEdit-{{ $setting->id}}">
                                                            Edit
                                                        </button>
                                                        <div class="modal fade" id="myModalEdit-{{ $setting->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Settings</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('settings/update',$setting -> id)}}" method="post" enctype="multipart/form-data">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">Edit Setting</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$setting->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Email</label>
                                                                                            <input class="form-control" name="email" type="email" value="{{$setting->email}}">
                                                                                            @error('email')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Phone</label>
                                                                                            <input class="form-control" name="phone" type="text" value="{{$setting->phone}}">
                                                                                            @error('phone')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Facebook</label>
                                                                                            <input class="form-control" name="facebook" type="text" value="{{$setting->facebook}}">
                                                                                            @error('facebook')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Insta</label>
                                                                                            <input class="form-control" name="insta" type="text" value="{{$setting->insta}}">
                                                                                            @error('insta')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Whats app</label>
                                                                                            <input class="form-control" name="whats_app" type="text" value="{{$setting->whats_app}}">
                                                                                            @error('whats_app')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Bank Name</label>
                                                                                            <input class="form-control" name="bank_name" type="text" value="{{$setting->bank_name}}">
                                                                                            @error('bank_name')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Commission</label>
                                                                                            <input class="form-control" name="commission" type="text" value="{{$setting->commission}}">
                                                                                            @error('commission')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">App Link</label>
                                                                                            <input class="form-control" name="app_link" type="text" value="{{$setting->app_link}}">
                                                                                            @error('app_link')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Twitter</label>
                                                                                            <input class="form-control" name="twitter" type="text" value="{{$setting->twitter}}">
                                                                                            @error('twitter')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Youtube</label>
                                                                                            <input class="form-control" name="youtube" type="text" value="{{$setting->youtube}}">
                                                                                            @error('youtube')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <button class="btn btn-primary" type="submit">Edit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end edit row -->
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