@extends('layout.vendor.index')
@section('title')
    Attributes
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Attributes</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(route('vendor-dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"> Attributes</li>
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
                        <h4>List Of Attributes </h4>
                        </div>
                        @isset($attributes)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Start date</th>
                                                <th>Is Activate</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($attributes as $attribute)
                                                <tr>
                                                    <td>{{$attribute->id}}</td>
                                                    <td>{{$attribute->name}}</td>
                                                    <td>{{$attribute->created_at}}</td>
                                                    <td>
                                                        @if($attribute->is_activate == 1)
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('attributes/deactivate',$attribute->id)}}" style="text-decoration:none;color:white;">ِActivate</a>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('attributes/activate',$attribute->id)}}" style="text-decoration:none;color:white;">DeActivate</a>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                         <!-- delete row -->
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModaldelete-{{ $attribute->id}}">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                        <div class="modal fade" id="myModaldelete-{{ $attribute->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{url(route('attributes/delete',$attribute->id))}}" class="" >
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
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalEdit-{{ $attribute->id}}">
                                                            Edit
                                                        </button>
                                                        <div class="modal fade" id="myModalEdit-{{ $attribute->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Attributes</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('attributes/update',$attribute -> id)}}" method="post" enctype="multipart/form-data">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">Edit Attribute</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$attribute->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Name</label>
                                                                                            <input class="form-control" name="name" type="text" value="{{$attribute->name}}">
                                                                                            @error('name')
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

                                                         <!-- add or edit ar language row -->
                                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalLangar-{{ $attribute->id}}">
                                                            AR
                                                        </button>
                                                        <div class="modal fade" id="myModalLangar-{{ $attribute->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Attributes</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('attributes/lang/ar',$attribute -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">Add AR Language</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$attribute->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Name</label>
                                                                                            <input class="form-control" name="name" type="text" placeholder="AR Language">
                                                                                            @error('name')
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
                                                        <!-- end add or edit ar language row -->

                                                        <!-- add or edit es language row -->
                                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalLanges-{{ $attribute->id}}">
                                                            ES
                                                        </button>
                                                        <div class="modal fade" id="myModalLanges-{{ $attribute->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Attributes</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('attributes/lang/es',$attribute -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">Add ES Language</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$attribute->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">Name</label>
                                                                                            <input class="form-control" name="name" type="text" placeholder="ES Language">
                                                                                            @error('name')
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
                                                        <!-- end add or edit es language row -->
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