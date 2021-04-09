@extends('layout.admin.index')
@section('title')
    Admin - Orders
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Orders</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(route('dashboard'))}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"> Orders</li>
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
                            <h4>List Of Orders</h4>
                        </div>
                        @isset($order)
                            <div class="card-body">
                                <div class="table-responsive product-table">
                                    <table class="display" id="basic-1">                                        

                                            <tr>
                                                <th>Order ID</th>
                                                <td>{{$order->id}}</td>
                                            </tr>

                                            <tr>
                                                <th>User Name</th>
                                                <td>{{$order->user_name}}</td>
                                            </tr>

                                            <tr>
                                                <th>User Phone</th>
                                                <td>{{$order->user_phone}}</td>
                                            </tr>

                                            <tr>
                                                <th>Address</th>
                                                <td>{{$order->address}}</td>
                                            </tr>

                                            <tr>
                                                <th>Cost</th>
                                                <td>{{$order->cost}}</td>
                                            </tr>

                                            <tr>
                                                <th>Total Cost</th>
                                                <td>{{$order->total_cost}}</td>
                                            </tr>

                                            <tr>
                                                <th>Commission</th>
                                                <td>{{$order->commission}}</td>
                                            </tr>

                                            <tr>
                                                <th>Net Cost</th>
                                                <td>{{$order->net_cost}}</td>
                                            </tr>

                                            <tr>
                                                <th>Status</th>
                                                <td>{{$order->status}}</td>
                                            </tr>

                                            @foreach($order->products as $product)
                                                <tr>
                                                    <th>Products In Order</th>
                                                    <td>
                                                        Product Quantity In Request : {{$product->pivot->quantity}} <br>
                                                        Product Price : {{$product->pivot->price}} <br>

                                                        Product Details :
                                                        <button class="btn btn-info btn-xs" type="button">
                                                            <a href="{{route('product/show',$product->pivot->product_id)}}" style="text-decoration:none;color:white;">Show</a>
                                                        </button>
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