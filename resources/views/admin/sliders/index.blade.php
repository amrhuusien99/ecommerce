@extends('layout.admin.index')
@section('title')
    Admin - Sliders
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Sliders</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(route('dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"> Sliders</li>
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
                        <h4>List Of Sliders </h4>
                        </div>
                        @isset($sliders)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Start date</th>
                                                <th>Is Activate</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($sliders as $slider)
                                                <tr>
                                                    <td>{{$slider->id}}</td>
                                                    <td>
                                                        <img style="max-height:60px;max-width:60px;" class="rounded-circle" src="{{asset($slider->photo)}}" alt="">
                                                    </td>
                                                    <td style="width: 150px;" >{{$slider->title}}</td>
                                                    <td style="width: 200px;" >{{$slider->description}}</td>
                                                    <td>{{$slider->created_at}}</td>
                                                    <td>
                                                        @if($slider->is_activate == 1)
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('sliders/deactivate',$slider->id)}}" style="text-decoration:none;color:white;">ِActivate</a>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('sliders/activate',$slider->id)}}" style="text-decoration:none;color:white;">DeActivate</a>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                         <!-- delete row -->
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModaldelete-{{ $slider->id}}">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                        <div class="modal fade" id="myModaldelete-{{ $slider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{url(route('sliders/delete',$slider->id))}}" class="" >
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

                                                         <!-- edit row -->
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalEdit-{{ $slider->id}}">
                                                            Edit
                                                        </button>
                                                        <div class="modal fade" id="myModalEdit-{{ $slider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Sliders</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('sliders/update',$slider -> id)}}" method="post" enctype="multipart/form-data">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">Edit Slider</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$slider->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Title</label>
                                                                                            <input class="form-control" name="title" type="text" value="{{$slider->title}}">
                                                                                            @error('title')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Description</label>
                                                                                            <input class="form-control" name="description" type="text" value="{{$slider->description}}">
                                                                                            @error('description')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="input-group col-sm-12 mb-3 mr-5">
                                                                                            <input name="photo" type="file" class="form-control" id="inputGroupFile02">
                                                                                            <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
                                                                                            @error('photo')
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

                                                         <!-- add or edit anther language row -->
                                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalLangar-{{ $slider->id}}">
                                                            AR
                                                        </button>
                                                        <div class="modal fade" id="myModalLangar-{{ $slider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Sliders</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('sliders/lang/ar',$slider -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">Add AR Language</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$slider->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Title</label>
                                                                                            <input class="form-control" name="title" type="text" placeholder="AR Language">
                                                                                            @error('title')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Description</label>
                                                                                            <input class="form-control" name="description" type="text" placeholder="AR Language">
                                                                                            @error('description')
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
                                                        <!-- end add or edit anrher language row -->

                                                        <!-- add or edit anther language row -->
                                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalLanges-{{ $slider->id}}">
                                                            ES
                                                        </button>
                                                        <div class="modal fade" id="myModalLanges-{{ $slider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Sliders</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('sliders/lang/es',$slider -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">Add ES Language</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$slider->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Title</label>
                                                                                            <input class="form-control" name="title" type="text" placeholder="ES Language">
                                                                                            @error('title')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Description</label>
                                                                                            <input class="form-control" name="description" type="text" placeholder="ES Language">
                                                                                            @error('description')
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
                                                        <!-- end add or edit anrher language row -->    
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