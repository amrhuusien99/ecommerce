@extends('layout.admin.index')
@section('title')
Create New Tag
@endsection
@section('content')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>Tags</h3>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Tags</li>
                                <li class="breadcrumb-item active"> Create New Tag</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row">
                        <div class="col-xl-12">
                            <form class="card" action="{{url(route('tags/store'))}}" method="post" enctype="multipart/form-data">
                                
                                @csrf

                                <div class="card-header">
                                    <h4 class="card-title mb-0">Create New Tag</h4>
                                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                </div>

                                <div class="card-body">

                                    @include('flash::message')

                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">Name</label>
                                                <input class="form-control" name="name" type="text">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">SLug</label>
                                                <input class="form-control" name="slug" type="text">
                                                @error('slug')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection