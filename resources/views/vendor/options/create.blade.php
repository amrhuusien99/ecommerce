@extends('layout.vendor.index')
@section('title')
Create New Option
@endsection
@section('content')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>Options</h3>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url(route('vendor-dashboard'))}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Options</li>
                                <li class="breadcrumb-item active"> Create New Option</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row">
                        <div class="col-xl-12">
                            <form class="card" action="{{url(route('options/store'))}}" method="post" enctype="multipart/form-data">
                                
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Create New Option</h4>
                                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                </div>

                                <div class="card-body">

                                    @include('flash::message')
                                    @csrf

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
                                            <label for="projectinput1">{{__('admin/categories.select_parent')}}</label>
                                                <select name="product_id" class="select2 form-control">
                                                    <optgroup label="Select Main Product">
                                                        @if($products && $products -> count() > 0)
                                                            @foreach($products as $product)
                                                                <option value="{{$product -> id }}">{{$product -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('product_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                            <label for="projectinput1">{{__('admin/categories.select_parent')}}</label>
                                                <select name="attribute_id" class="select2 form-control">
                                                    <optgroup label="Select Main Attribute">
                                                        @if($attributes && $attributes -> count() > 0)
                                                            @foreach($attributes as $attribute)
                                                                <option value="{{$attribute -> id }}">{{$attribute -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('attribute_id')
                                                <span class="text-danger"> {{$message}}</span>
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