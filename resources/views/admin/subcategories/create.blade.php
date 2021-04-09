@extends('layout.admin.index')
@section('title')
{{__('admin/categories.create_category')}}
@endsection
@section('content')

<div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{__('admin/categories.categories')}}</h3>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{__('admin/categories.subcategories')}}</li>
                                <li class="breadcrumb-item active">{{__('admin/categories.create_sub_category')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row">
                        <div class="col-xl-12">
                            <form class="card" action="{{url(route('sub-categories.store'))}}" method="post" enctype="multipart/form-data">
                                
                                @csrf

                                <div class="card-header">
                                    <h4 class="card-title mb-0">{{__('admin/categories.create_sub_category')}}</h4>
                                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                </div>

                                <div class="card-body">

                                    @include('flash::message')

                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">{{__('admin/categories.name')}}</label>
                                                <input class="form-control" name="name" type="text">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                                <label class="form-label">{{__('admin/categories.slug')}}</label>
                                                <input class="form-control" name="slug" type="text">
                                                @error('slug')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-6 mb-3 ml-5">
                                            <label for="projectinput1">{{__('admin/categories.select_parent')}}</label>
                                                <select name="parent_id" class="select2 form-control">
                                                    <optgroup label="Select Main Category">
                                                        @if($parentcategories && $parentcategories -> count() > 0)
                                                            @foreach($parentcategories as $category)
                                                                <option value="{{$category -> id }}">{{$category -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('parent_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">{{__('admin/categories.add')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection