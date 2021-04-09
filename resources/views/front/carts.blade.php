@extends('layout.front.index')

@section('content')
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('user/cart/list')}}">
                            <span itemprop="name">Carts</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>

    <div class="container no-index">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <section id="main">
                    @include('flash::message')
                    <h1 class="page-title">Shopping Cart</h1>
                    @isset($products)
                        <div class="cart-grid row">
                            <div class="cart-grid-body col-xs-12 col-lg-9">
                                <div class="cart-container">
                                    <div class="cart-overview js-cart" data-refresh-url="">
                                        <ul class="cart-items">
                                            <form class="card" action="{{url(route('payment/process'))}}" method="post" enctype="multipart/form-data">
                                                @foreach($products as $product)
                                                    <li class="cart-item mb-2">
                                                            
                                                        @csrf
                                                        
                                                        <div class="product-line-grid row spacing-10">
                                                            <div class="product-line-grid-left col-sm-2 col-xs-4">
                                                                <img class="img-fluid"
                                                                    src="{{asset($product->photo)}}"
                                                                    alt=""
                                                                    data-full-size-image-url="{{asset($product->photo)}}"
                                                                    width="600" height="600">                                                        
                                                            </div>
                                                            <div class="product-line-grid-body col-sm-10 col-xs-8">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-12 mt-20">
                                                                        <div class="product-line-info">
                                                                            <a class="label"
                                                                                href="{{route('product-info',$product -> slug)}}"
                                                                                data-id_customization="0">{{$product -> name}}</a>
                                                                        </div>
                                                                        <div class="product-group-price">
                                                                            <div class="product-price-and-shipping">
                                                                                @if( $product->special_price == null )
                                                                                    <span itemprop="price" class="price">
                                                                                        Price : $ {{$product->price}}
                                                                                    </span>
                                                                                    @else
                                                                                    <span itemprop="price" class="price">
                                                                                        Special Price : $ {{$product->special_price}}  --  <span class="regular-price">$ {{$product -> price}}</span>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="product-price-and-shipping">
                                                                                <span itemprop="price" class="price">
                                                                                    Delivery Cost : $ {{optional($product->vendor)->delivery_cost}}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center product-line-actions col-sm-6 col-xs-12">
                                                                        <div class="row">                                                         
                                                                            <div class="col-sm-4 col-xs-12 text-xs-right align-self-end">
                                                                                <div class="cart-line-product-actions shop-item">
                                                                                    <a class="remove-from-cart" rel="nofollow"
                                                                                        data-link-action="delete-from-cart"
                                                                                        data-id-product="{{$product->id}}"
                                                                                        data-url-product=""
                                                                                        data-id-customization="">
                                                                                        <i class="fas fa-trash-alt fa fa-lg btn-denger h-10" aria-hidden="true"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-8 col-xs-12 text-xs-right align-self-end">
                                                                                <input name="products[{{$product->id}}][product_id]" type="hidden" value="{{$product->id}}">
                                                                                <input name="products[{{$product->id}}][vendor_id]" type="hidden" value="{{optional($product->vendor)->id}}">
                                                                                <input name="products[{{$product->id}}][quantity]" style="width:100px;" type="number" placeholder="quantity" class="form-control mt-40"></input>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                @endforeach
                                                
                                                <h3 class="mt-50 ml-100 mb-30">Payment Information</h3>
                                                <div class="row mb-20">
                                                    <div class="custom-radio col-md-3 mb-3">
                                                        <input  name="PaymentMethodId" type="radio"  value="2" class="" checked="" required="">
                                                        <label class="custom-control-label" for="credit">Visa</label>
                                                    </div>
                                                    <div class="custom-radio col-md-3 mb-3">
                                                        <input name="PaymentMethodId" type="radio" value="2"  class="" required="">
                                                        <label class="custom-control-label" for="debit">Master Card</label>
                                                    </div>
                                                    <div class="custom-radio col-md-3 mb-3">
                                                        <input name="PaymentMethodId" type="radio" value="6" class="" required="">
                                                        <label class="custom-control-label" for="paypal">Mada</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5 mb-3">
                                                        <label for="cc-name">Name on card</label>
                                                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                                        <small class="text-muted">Full name as displayed on card</small>
                                                        <div class="invalid-feedback">
                                                            Name on card is required
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="cc-number">Credit card number</label>
                                                        <input type="text" class="form-control" name="ccNum" id="cc-number" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            Credit card number is required
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5 mb-3">
                                                        <label for="cc-expiration">Expiration</label>
                                                        <input type="text" class="form-control" name="ccExp" id="cc-expiration" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            Expiration date required
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="cc-expiration">CVV</label>
                                                        <input type="text" class="form-control" name="ccCvv" id="cc-cvv" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            Security code required
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" name="address" id="address" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            The Address Is Required
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-20 mt-20 ml-100">
                                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                <a class="label btn btn-primary mt-100 mb-50" href="#">
                                    Continue shopping
                                </a>
                            </div>
                            <div class="cart-grid-right col-xs-12 col-lg-3">
                                <div class="cart-summary">
                                    <div class="cart-detailed-totals">
                                        <div class="cart-summary-products">
                                            <div class="summary-label">There are ( {{count($products)}} ) items in your cart</div>
                                        </div>
                                        <div class="">
                                            <div class="cart-summary-line cart-total">
                                                <span class="label">Total: {{$amount}}</span>
                                                <span class="value"> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout text-xs-center card-block">
                                        <a href="#" type="button" class="btn btn-primary">proceed to payment</a>
                                    </div>
                                </div>
                                <div class="blockreassurance_product">
                                    <div>
                                        <span class="item-product">
                                            <img class="svg invisible" src="../modules/blockreassurance/img/ic_verified_user_black_36dp_1x.png">
                                            &nbsp;
                                        </span>
                                        <p class="block-title" style="color:#000000;">Security policy</p>
                                    </div>
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </section>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.remove-from-cart', function (e) {
            e.preventDefault();

            @if(! auth()->guard('user')->check() )
                $('.not-loggedin-modal').css('display','block');
            @endif

            $.ajax({
                type: 'get',
                url: "{{route('cart/product/delete')}}",
                data: {
                    'productId': $(this).attr('data-id-product'),
                },
                success: function (data) {
                    if(data.delete ){
                        $('.alert-modal').css('display','block');
                        location.reload();
                    }
                }
            });
        });

    </script>
@stop
