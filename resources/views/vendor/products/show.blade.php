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
                        <h4>{{__('vendor/products.product_info')}}</h4>
                        </div>
                        @isset($product)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">

                                        @include('flash::message')

                                            <tr>
                                                <th>ID</th>
                                                <td>{{$product->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.name')}}</th>
                                                <td>{{$product->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.slug')}}</th>
                                                <td>{{$product->slug}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.description')}}</th>
                                                <td>{{$product->description}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.short_description')}}</th>
                                                <td>{{$product->short_description}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.sku')}}</th>
                                                <td>{{$product->sku}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.photo')}}</th>
                                                <td>
                                                    <img style="max-height:60px;max-width:60px;" class="rounded-circle" src="{{asset($product->photo)}}" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.photos')}}</th>
                                                <td>
                                                    <?php
                                                        $string = $product->photos;
                                                        $images = explode(",", $string);
                                                    ?>
                                                    @foreach($images as $image)
                                                        <img style="max-height:60px;max-width:60px;" class="rounded-circle" src="{{asset($image)}}" alt="">
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.price')}}</th>
                                                <td>{{$product->price}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.special_price')}}</th>
                                                <td>{{$product->special_price}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.special_price_start')}}</th>
                                                <td>{{$product->special_price_start}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.special_price_end')}}</th>
                                                <td>{{$product->special_price_end}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.quantity')}}</th>
                                                <td>{{$product->quantity}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.in_stock')}}</th>
                                                <td>{{$product->in_stock}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.is_activate')}}</th>
                                                <td>{{$product->is_activate}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('vendor/products.brand_id')}}</th>
                                                <td>{{optional($product->brand)->name}}</td>
                                            </tr>

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