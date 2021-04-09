@extends('layout.vendor.index')

@section('title')
{{__('vendor/products.product_create')}}
@endsection

@section('content')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{__('vendor/products.products')}}</h3>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url(route('vendor-dashboard'))}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{__('vendor/products.products')}}</li>
                                <li class="breadcrumb-item active">{{__('vendor/products.product_create')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row">
                        <div class="col-xl-12">
                            <form class="card" action="{{url(route('products/store'))}}" method="post" enctype="multipart/form-data">
                                
                                <div class="card-header">
                                    <h4 class="card-title mb-0">{{__('vendor/products.product_create')}}</h4>
                                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                </div>

                                <div class="card-body">
                               
                                    @csrf
                                    @include('flash::message')

                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">{{__('vendor/products.name')}}</label>
                                                <input class="form-control" name="name" type="text">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">{{__('vendor/products.slug')}}</label>
                                                <input class="form-control" name="slug" type="text">
                                                @error('slug')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">{{__('vendor/products.description')}}</label>
                                                <input class="form-control" name="description" type="text">
                                                @error('description')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">{{__('vendor/products.short_description')}}</label>
                                                <input class="form-control" name="short_description" type="text">
                                                @error('short_description')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label for="projectinput1"> {{__('vendor/products.select_category')}}
                                                </label>
                                                <select name="categories[]" class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                                    <optgroup label="Select Category">
                                                        @if($categories && $categories -> count() > 0)
                                                            @foreach($categories as $category)
                                                                <option value="{{$category -> id }}">{{$category -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('categories')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label for="projectinput1"> {{__('vendor/products.select_tag')}}
                                                </label>
                                                <select name="tags[]" class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                                    <optgroup label="Select Tag">
                                                        @if($tags && $tags -> count() > 0)
                                                            @foreach($tags as $tag)
                                                                <option
                                                                    value="{{$tag -> id }}">{{$tag -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('tags')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label for="projectinput1"> {{__('vendor/products.select_brand')}}
                                                </label>
                                                <select name="brand_id" class="select2 form-control">
                                                    <optgroup label="Select Brand">
                                                        @if($brands && $brands -> count() > 0)
                                                            @foreach($brands as $brand)
                                                                <option
                                                                    value="{{$brand -> id }}">{{$brand -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('brand_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">{{__('vendor/products.add')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection