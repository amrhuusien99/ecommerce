@extends('layout.vendor.index')
@section('title')
{{__('vendor/products.products')}}
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
                            <li class="breadcrumb-item active">{{__('vendor/products.list')}}</li>
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
                        <h4>{{__('vendor/products.products_list')}}</h4>
                        </div>
                        @isset($products)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')
                                        
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>{{__('vendor/products.name')}}</th>
                                                <th>{{__('vendor/products.logo')}}</th>
                                                <th>{{__('vendor/products.is_activate')}}</th>
                                                <th>{{__('vendor/products.is_special')}}</th>
                                                <th>{{__('vendor/products.action')}}</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->name}}</td>
                                                    <td>
                                                        <img style="max-height:60px;max-width:60px;" class="rounded-circle" src="{{asset($product->photo)}}" alt="">
                                                    </td>
                                                    <td>
                                                        @if($product->is_activate == 1)
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('products/deactivate',$product->id)}}" style="text-decoration:none;color:white;">{{__('vendor/products.activate')}}</a>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('products/activate',$product->id)}}" style="text-decoration:none;color:white;">{{__('vendor/products.deactivate')}}</a>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    
                                                    <td>
                                                        @if($product->special_product == 1)
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('products/unspecial',$product->id)}}" style="text-decoration:none;color:white;">{{__('vendor/products.special')}}</a>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-primary btn-xs" type="button">
                                                                <a href="{{route('products/special',$product->id)}}" style="text-decoration:none;color:white;">{{__('vendor/products.unspecial')}}</a>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- delete row -->
                                                        <button type="button" class="btn btn-danger btn-xs mt-1" data-toggle="modal" data-target="#myModaldelete-{{ $product->id}}">
                                                            <i class="fa fa-trash"></i> {{__('vendor/products.delete')}}
                                                        </button>
                                                        <div class="modal fade" id="myModaldelete-{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('vendor/products.delete_confirmation')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{url(route('products/delete',$product->id))}}" class="" >
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            {{ csrf_field() }}
                                                                            <p>{{__('vendor/products.delete_sure')}}</p>
                                                                            <button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> {{__('vendor/products.delete')}}</button>
                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">{{__('vendor/products.cancel')}}</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- edit row -->
                                                        <button class="btn btn-success btn-xs mt-1" type="button">
                                                            <a href="{{route('products/edit',$product->id)}}" style="text-decoration:none;color:white;">{{__('vendor/products.edit')}}</a>
                                                        </button>

                                                        <!-- price product -->
                                                        <button type="button" class="btn btn-info btn-xs mt-1" data-toggle="modal" data-target="#myModalpeice-{{ $product->id}}">
                                                            {{__('vendor/products.price')}}
                                                        </button>
                                                        <div class="modal fade" id="myModalpeice-{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('vendor/products.products')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('products/price',$product -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('vendor/products.product_price')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="product_id" type="hidden" value="{{$product->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.price')}}</label>
                                                                                            <input class="form-control" name="price" type="number" value="{{$product->price}}">
                                                                                            @error('price')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.special_price')}}</label>
                                                                                            <input class="form-control" name="special_price" type="number" value="{{$product->special_price}}">
                                                                                            @error('special_price')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.special_price_start')}}</label>
                                                                                            <input class="form-control" name="special_price_start" type="date" value="{{$product->special_price_start}}">
                                                                                            @error('special_price_start')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.special_price_end')}}</label>
                                                                                            <input class="form-control" name="special_price_end" type="date" value="{{$product->special_price_end}}">
                                                                                            @error('special_price_end')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <button class="btn btn-primary" type="submit">{{__('vendor/products.update')}}</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- images product -->
                                                        <button type="button" class="btn btn-info btn-xs mt-1" data-toggle="modal" data-target="#myModalimages-{{ $product->id}}">
                                                            {{__('vendor/products.iamges')}}
                                                        </button>
                                                        <div class="modal fade" id="myModalimages-{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('vendor/products.products')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('products/images',$product -> id)}}" method="post"  enctype="multipart/form-data">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('vendor/products.product_images')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="product_id" type="hidden" value="{{$product->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.product_image')}}</label>
                                                                                            <input type="file" class="form-control" name="photo">
                                                                                            @error('photo')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.product_images')}}</label>
                                                                                            <input type="file" class="form-control" name="photos[]" multiple>
                                                                                            @error('photos[]')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <button class="btn btn-primary" type="submit">{{__('vendor/products.update')}}</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- product stock -->
                                                        <button type="button" class="btn btn-info btn-xs mt-1" data-toggle="modal" data-target="#myModalstock-{{ $product->id}}">
                                                            {{__('vendor/products.stock')}}
                                                        </button>
                                                        <div class="modal fade" id="myModalstock-{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('vendor/products.products')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('products/stock',$product -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('vendor/products.product_stock')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="product_id" type="hidden" value="{{$product->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.sku')}}</label>
                                                                                            <input class="form-control" name="sku" type="text" value="{{$product->sku}}">
                                                                                            @error('sku')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.quantity')}}</label>
                                                                                            <input class="form-control" name="quantity" type="number" value="{{$product->quantity}}">
                                                                                            @error('quantity')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.in_stock')}}</label>
                                                                                            <input class="form-control" name="in_stock" type="number" value="{{$product->in_stock}}">
                                                                                            @error('in_stock')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <button class="btn btn-primary" type="submit">{{__('vendor/products.update')}}</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- show product -->
                                                        <button class="btn btn-info btn-xs mt-1" type="button">
                                                            <a href="{{route('vendor/products/show',$product->id)}}" style="text-decoration:none;color:white;">{{__('vendor/products.show')}}</a>
                                                        </button>

                                                        <!-- add or edit ar language row -->
                                                        <button type="button" class="btn btn-info btn-xs mt-1" data-toggle="modal" data-target="#myModalLangar-{{ $product->id}}">
                                                            AR
                                                        </button>
                                                        <div class="modal fade" id="myModalLangar-{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('vendor/products.products')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('products/lang/ar',$product -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('vendor/products.add_ar_language')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                    <input name="product_id" type="hidden" value="{{$product->id}}">

                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.name')}}</label>
                                                                                            @isset($product->translate('ar')->name)
                                                                                                <input class="form-control" name="name" type="text" value="{{$product->translate('ar')->name}}">
                                                                                            @else
                                                                                                <input class="form-control" name="name" type="text" placeholder="Enter AR Language">
                                                                                            @endisset

                                                                                            @error('name')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.description')}}</label>
                                                                                            @isset($product->translate('ar')->description)
                                                                                                <input class="form-control" name="description" type="text" value="{{$product->translate('ar')->description}}">
                                                                                            @else
                                                                                                <input class="form-control" name="description" type="text" placeholder="Enter AR Language">
                                                                                            @endisset
                                                                                            
                                                                                            @error('description')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                            <label class="form-label">{{__('vendor/products.short_description')}}</label>
                                                                                            @isset($product->translate('ar')->short_description)
                                                                                                <input class="form-control" name="short_description" type="text" value="{{$product->translate('ar')->short_description}}">
                                                                                            @else
                                                                                                <input class="form-control" name="short_description" type="text" placeholder="Enter AR Language">
                                                                                            @endisset
                                                                                            
                                                                                            @error('short_description')
                                                                                                <span class="text-danger">{{$message}}</span>
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

                                                        <!-- add or edit es language row -->
                                                        <button type="button" class="btn btn-info btn-xs mt-1" data-toggle="modal" data-target="#myModalLanges-{{ $product->id}}">
                                                            ES
                                                        </button>
                                                        <div class="modal fade" id="myModalLanges-{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">{{__('vendor/products.products')}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="card" action="{{route('products/lang/es',$product -> id)}}" method="post">
                                                                            
                                                                            <div class="card-header">
                                                                                <h4 class="card-title mb-0">{{__('vendor/products.add_es_language')}}</h4>
                                                                                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                @include('flash::message')
                                                                                @csrf

                                                                                <div class="row">

                                                                                <input name="product_id" type="hidden" value="{{$product->id}}">

                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                        <label class="form-label">{{__('vendor/products.name')}}</label>
                                                                                        @isset($product->translate('es')->name)
                                                                                            <input class="form-control" name="name" type="text" value="{{$product->translate('es')->name}}">
                                                                                        @else
                                                                                            <input class="form-control" name="name" type="text" placeholder="Enter AR Language">
                                                                                        @endisset
                                                                                        
                                                                                        @error('name')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                        <label class="form-label">{{__('vendor/products.description')}}</label>
                                                                                        @isset($product->translate('es')->description)
                                                                                            <input class="form-control" name="description" type="text" value="{{$product->translate('es')->description}}">
                                                                                        @else
                                                                                            <input class="form-control" name="description" type="text" placeholder="Enter AR Language">
                                                                                        @endisset
                                                                                        
                                                                                        @error('description')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group col-sm-12 mb-3 mr-5">
                                                                                        <label class="form-label">{{__('vendor/products.short_description')}}</label>
                                                                                        @isset($product->translate('es')->short_description)
                                                                                            <input class="form-control" name="short_description" type="text" value="{{$product->translate('es')->short_description}}">
                                                                                        @else
                                                                                            <input class="form-control" name="short_description" type="text" placeholder="Enter AR Language">
                                                                                        @endisset
                                                                                        
                                                                                        @error('short_description')
                                                                                            <span class="text-danger">{{$message}}</span>
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