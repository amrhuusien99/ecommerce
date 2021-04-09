@extends('layout.admin.index')
@section('title')
{{__('admin/categories.categories')}}
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
                            <li class="breadcrumb-item"><a href="{{url(route('dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">{{__('admin/categories.categories')}}</li>
                            <li class="breadcrumb-item active">{{__('admin/categories.list')}}</li>
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
                        <h4>{{__('admin/categories.categories_list')}} </h4>
                        </div>
                        @isset($categories)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>{{__('admin/categories.name')}}</th>
                                                <th>{{__('admin/categories.slug')}}</th>
                                                <th>{{__('admin/categories.start_date')}}</th>
                                                <th>{{__('admin/categories.is_activate')}}</th>
                                                <th>{{__('admin/categories.action')}}</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->slug}}</td>
                                                    <td>{{$category->created_at}}</td>
                                                    <td>
                                                        @if($category->is_activate === 1)
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{url(route('main-categories-deactivate',$category->id))}}" style="text-decoration:none;color:white;">{{__('admin/categories.activate')}}</a>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{url(route('main-categories-activate',$category->id))}}" style="text-decoration:none;color:white;">{{__('admin/categories.deactivate')}}</a>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- delete row -->
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModaldelete-{{ $category->id}}">
                                                            <i class="fa fa-trash"></i> {{__('admin/categories.delete')}}
                                                        </button>
                                                        <div class="modal fade" id="myModaldelete-{{ $category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('admin/categories.delete_confirmation')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{url(route('main-categories-delete',$category->id))}}" class="" >
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            {{ csrf_field() }}
                                                                            <p>{{__('admin/categories.delete_sure')}}</p>
                                                                            <button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">{{__('admin/categories.cancel')}}</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end delete row -->

                                                         <!-- edit row -->
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalEdit-{{ $category->id}}">
                                                            {{__('admin/categories.edit')}}
                                                        </button>
                                                        <div class="modal fade" id="myModalEdit-{{ $category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('admin/categories.categories')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('main-categories-update',$category -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('admin/categories.edit_category')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$category->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('admin/categories.name')}}</label>
                                                                                            <input class="form-control" name="name" type="text" value="{{$category->name}}">
                                                                                            @error('name')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('admin/categories.slug')}}</label>
                                                                                            <input class="form-control" name="slug" type="text" value="{{$category->slug}}">
                                                                                            @error('slug')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <button class="btn btn-primary" type="submit">{{__('admin/categories.update')}}</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end edit row -->

                                                         <!-- add or edit ar language row -->
                                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalLangar-{{ $category->id}}">
                                                            AR
                                                        </button>
                                                        <div class="modal fade" id="myModalLangar-{{ $category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('admin/categories.categories')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('main-categories-lang/ar',$category -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('admin/categories.category_lang_ar')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$category->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('admin/categories.name')}}</label>
                                                                                            <input class="form-control" name="name" type="text" placeholder="AR Language">
                                                                                            @error('name')
                                                                                                <span class="text-danger">{{$message}}</span>
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
                                                        <!-- end add or edit anrher language row -->

                                                        <!-- add or edit ar language row -->
                                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalLanges-{{ $category->id}}">
                                                            ES
                                                        </button>
                                                        <div class="modal fade" id="myModalLanges-{{ $category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('admin/categories.categories')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('main-categories-lang/es',$category -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('admin/categories.category_lang_es')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="id" type="hidden" value="{{$category->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('admin/categories.name')}}</label>
                                                                                            <input class="form-control" name="name" type="text" placeholder="ES Language">
                                                                                            @error('name')
                                                                                                <span class="text-danger">{{$message}}</span>
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