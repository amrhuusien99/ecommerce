@extends('layout.front.index')

@section('slider')
    <div id="" class="displaytopthree mt-20">
        <div class="container">
            <div class="row">
                <div class="nov-row  col-lg-12 col-xs-12">
                    <div class="nov-row-wrap row">
                        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                            <div class="block">
                                <div class="block_content">
                                    
                                </div>
                            </div>
                        </div>
                        <div id="nov-slider" class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12"
                             data-effect="random" data-slices="15" data-animspeed="200" data-pausetime="5000"
                             data-startslide="0" data-directionnav="false" data-controlnav="true"
                             data-controlnavthumbs="false" data-pauseonhover="true" data-manualadvance="false"
                             data-randomstart="false">
                            <div class="nov_preload">
                                <div class="process-loading active">
                                    <div class="loader">
                                        @isset($sliders)
                                            @foreach($sliders as $slider)
                                                <div class="dot"></div>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="nivoSlider">
                                @isset($sliders)
                                    @foreach($sliders as $slider)
                                        <a href="#">
                                            <img src="{{asset($slider->photo) }}" alt="" title="#htmlcaption_42">
                                        </a>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div id="main">

        <section id="content" class="page-home pagehome-three">
            <div class="container">
                <div class="row">
                    <div class="nov-row  col-lg-12 col-xs-12">
                        @isset($vendors)
                            @foreach($vendors as $vendor)
                                <div class="nov-row-wrap row">
                                    <div class="nov-productlist nov-countdown-productlist col-xl-4 col-lg-4 col-md-4  col-xs-12 col-md-12">
                                        <div class="block block-product clearfix">
                                            <h2 class="title_block">
                                                Seller
                                            </h2>
                                            <div class="block_content">
                                                <div id="productlist1326409273"
                                                    class="product_list countdown-productlist countdown-column-1 owl-carousel owl-theme"
                                                    data-autoplay="false" data-autoplaytimeout="6000" data-loop="false"
                                                    data-margin="30" data-dots="false" data-nav="true" data-items="1"
                                                    data-items_large="1" data-items_tablet="2" data-items_mobile="1">
                                                    <div class="item item-list">
                                                        <div class="product-miniature js-product-miniature first_item"
                                                            data-id-product="12" data-id-product-attribute="232"
                                                            itemscope="" itemtype="http://schema.org/Product">
                                                            <div class="thumbnail-container">
                                                                <a href="#">
                                                                    <img class="img-fluid image-cover"
                                                                        src="{{asset($vendor->photo)}}"
                                                                        alt=""
                                                                        data-full-size-image-url="http://demo.bestprestashoptheme.com/savemart/79-large_default/nam-volutpat-justo-a-vehicula.jpg"
                                                                        width="600" height="600">
                                                                <div class="product-flags discount">Special</div>
                                                            </div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                    <div class="product-title" itemprop="name">
                                                                        <a href="k">{{$vendor->name}}</a>
                                                                    </div>
                                                                    <div class="product-comments">
                                                                        <div class="star_content">
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                            <div class="star"></div>
                                                                        </div>
                                                                        <span>0 review</span>
                                                                    </div>
                                                                    <p class="seller_name">
                                                                        <a title="View seller profile"
                                                                        href="#">
                                                                            <i class="fa fa-user"></i>
                                                                            {{$vendor->email}}
                                                                        </a>
                                                                    </p>
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span itemprop="price" class="price">{{$vendor->phone}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nov-productlist productlist-rows col-xl-8 col-lg-8 col-md-8 col-xs-12 col-md-12">
                                        <div class="block block-product clearfix">
                                            <h2 class="title_block">
                                                Products
                                            </h2>
                                            <div class="block_content">
                                                <div id="productlist303857090"
                                                    class="product_list grid owl-carousel owl-theme multi-row"
                                                    data-autoplay="false" data-autoplaytimeout="6000" data-loop="false"
                                                    data-margin="30" data-dots="false" data-nav="true" data-items="2"
                                                    data-items_large="2" data-items_tablet="3" data-items_mobile="1">
                                                    <div class="item  text-center">
                                                        @isset($vendor -> products)
                                                            @foreach($vendor -> products as $product)  
                                                                <div class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                                    data-id-product="1" data-id-product-attribute="40"
                                                                    itemscope="" itemtype="http://schema.org/Product">
                                                                    <div class="col-12 col-w40 pl-0">
                                                                        <div class="thumbnail-container">
                                                                            <a href="{{route('product-info', $product->slug)}}"
                                                                                class="thumbnail product-thumbnail two-image">
                                                                                <img class="img-fluid"
                                                                                    src="{{asset($product->photo)}}"
                                                                                    alt="{{route('product-info', $product->slug)}}"
                                                                                    data-full-size-image-url="{{asset($product->photo)}}"
                                                                                    width="600" height="600">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-w60 no-padding">
                                                                        <div class="product-description">
                                                                            <div class="product-groups">
                                                                                <div class="product-comments">
                                                                                    <div class="star_content">
                                                                                        <div class="star star_on"></div>
                                                                                        <div class="star star_on"></div>
                                                                                        <div class="star star_on"></div>
                                                                                        <div class="star star_on"></div>
                                                                                        <div class="star star_on"></div>
                                                                                    </div>
                                                                                    <span>5 review</span>
                                                                                </div>
                                                                                <p class="seller_name">
                                                                                    <a title="View seller profile"
                                                                                        href="{{route('product-info', $product->slug)}}">
                                                                                        <i class="fa fa-circle"></i>
                                                                                        {{$product->name}}
                                                                                    </a>
                                                                                </p>
                                                                                <p class="seller_name">
                                                                                    <i class="fa fa-circle mr-3"></i>
                                                                                    {{$product->description}}
                                                                                </p>
                                                                                <div class="product-group-price">
                                                                                    <div class="product-price-and-shipping">
                                                                                        @if( $product->special_price == null )
                                                                                            <span itemprop="price" class="price">
                                                                                                <i class="fa fa-circle mr-3"></i>
                                                                                                Price : $ {{$product->price}}
                                                                                            </span>
                                                                                            @else
                                                                                            <span itemprop="price" class="price">
                                                                                                <i class="fa fa-circle mr-3"></i>
                                                                                                Special Price : $ {{$product->special_price}} -- <span class="regular-price">$ {{$product -> price}}</span>
                                                                                            </span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <p class="seller_name">
                                                                                    <i class="fa fa-circle mr-3"></i>
                                                                                    Availability : {{$product -> in_stock ? 'in stock' : 'out of stock'}}
                                                                                </p>
                                                                            </div>
                                                                            <div class="product-buttons d-flex justify-content-center"
                                                                                itemprop="offers" itemscope=""
                                                                                itemtype="http://schema.org/Offer">
                                                                                <form action="" method="post" class="formAddToCart">
                                                                                    @csrf
                                                                                    <input type="hidden" name="id_product" value="{{$product -> id}}">
                                                                                    <a class="add-to-cart cart-addition" data-product-id="{{$product -> id}}" data-product-slug="{{$product -> slug}}" href="#"
                                                                                        data-button-action="add-to-cart">
                                                                                        <i class="novicon-cart"></i>
                                                                                        <span>Add to cart</span>
                                                                                    </a>
                                                                                </form>
                                                                                <a class="addToWishlist  wishlistProd_22" href="#"
                                                                                    data-product-id="{{$product -> id}}">
                                                                                    <i class="fa fa-heart"></i>
                                                                                    <span>Add to Wishlist</span>
                                                                                </a>
                                                                                <a href="#" class="quick-view hidden-sm-down"
                                                                                    data-product-id="{{$product -> id}}">
                                                                                    <i class="fa fa-search"></i><span> Quick view</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @include('front.product-details',$product)
                                                            @endforeach
                                                        @endisset     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset                                                    
                    </div>
                    <div class="nov-row spacing-30 col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">
                            <div class="nov-image col-lg-6 col-md-6">
                                <div class="block">
                                    <div class="block_content">
                                        <div class="effect">
                                            <a href="#">
                                                <img style="height:350px;max-height:350px;width:600px;max-width:600px;" class="img-fluid"
                                                src="{{asset('files/front/img/dropshipping-companies.jpeg')}}"
                                                alt="banner-4" title="banner-4">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nov-image col-lg-6 col-md-6">
                                <div class="block">
                                    <div class="block_content">
                                        <div class="effect">
                                            <a href="#">
                                                <img style="height:350px;max-height:350px;width:600px;max-width:600px;" class="img-fluid"
                                                src="{{asset('files/front/img/e-commerce-link-building-1520x800.png')}}"
                                                alt="banner-5" title="banner-5">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail-bottom">
                        <div class="container">
                            <br>
                            <section id="products">
                                <div id="nav-top">
                                    <div id="js-product-list-top" class="row products-selection">
                                        <div class="col-md-6 col-xs-6">
                                            <div class="change-type">
                                                <span class="grid-type active" data-view-type="grid"><i
                                                        class="fa fa-th-large"></i></span>
                                                <span class="list-type" data-view-type="list"><i class="fa fa-bars"></i></span>
                                            </div>
                                            <div class="hidden-sm-down total-products">
                                                <p>There are @if( isset($vendors)) {{count($vendors) ?? '0'}} @endif Related Seller</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <div class="d-flex sort-by-row justify-content-end">
                                                <span class="hidden-sm-down sort-by">Sort by:</span>
                                                <div class="products-sort-order dropdown">
                                                    <a class="select-title" rel="nofollow" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                        <span>Relevance</span>
                                                        <i class="material-icons pull-xs-right">&#xE5C5;</i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a rel="nofollow"
                                                        href="36-mini-speaker-27.html?home=home_3&amp;order=product.position.asc"
                                                        class="select-list current js-search-link">
                                                            Relevance
                                                        </a>
                                                        <a rel="nofollow"
                                                        href="36-mini-speaker-28.html?home=home_3&amp;order=product.name.asc"
                                                        class="select-list js-search-link">
                                                            Name, A to Z
                                                        </a>
                                                        <a rel="nofollow"
                                                        href="36-mini-speaker-29.html?home=home_3&amp;order=product.name.desc"
                                                        class="select-list js-search-link">
                                                            Name, Z to A
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="categories-product">
                                    <div id="js-product-list">
                                        <div class="products product_list grid row" data-default-view="grid">
                                            @if( isset($vendors) && count($vendors) > 0 )
                                                @foreach($vendors as $vendor)
                                                    <div class="item  col-lg-3 col-md-6 col-xs-12 text-center no-padding">
                                                        <div class="product-miniature js-product-miniature item-one"
                                                            data-id-product="22" data-id-product-attribute="408" itemscope=""
                                                            itemtype="http://schema.org/Product">
                                                            <div class="thumbnail-container">
                                                                <a href="{{route('vendor/product', $vendor->id)}}"
                                                                    class="thumbnail product-thumbnail two-image">
                                                                    <img class="img-fluid"
                                                                            src="{{asset($vendor->photo)}}"
                                                                            alt=""
                                                                            data-full-size-image-url="{{asset($vendor->photo)}}"
                                                                            width="600" height="600">
                                                                </a>
                                                                <div class="product-flags new">New</div>
                                                            </div>
                                                            <div class="product-description">
                                                                <div class="product-groups">
                                                                    <div class="group-reviews">
                                                                        <div class="product-comments">
                                                                            <div class="star_content">
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                            </div>
                                                                            <span>0 review</span>
                                                                        </div>
                                                                        <div class="info-stock ml-auto">
                                                                            <label class="control-label">Availability:</label>
                                                                            <i class="fa fa-check-square-o"
                                                                            aria-hidden="true"></i>

                                                                        </div>
                                                                    </div>

                                                                    <p class="seller_name">
                                                                        <a title="View seller profile"
                                                                            href="{{route('vendor/product', $vendor->id)}}">
                                                                            <i class="fa fa-circle"></i>
                                                                            {{$vendor->name}}
                                                                        </a>
                                                                    </p>
                                                                    <p class="seller_name">
                                                                        <i class="fa fa-circle mr-3"></i>
                                                                        {{$vendor->email}}
                                                                    </p>
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span itemprop="price" class="price">
                                                                                <i class="fa fa-circle mr-3"></i>
                                                                                    {{$vendor->phone}}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-buttons d-flex justify-content-center"
                                                                    itemprop="offers" itemscope=""
                                                                    itemtype="http://schema.org/Offer">
                                                                    <a class="addToWishlist  wishlistProd_22" href="#"
                                                                        data-product-id="{{$vendor -> id}}">
                                                                        <i class="fa fa-heart"></i>
                                                                        <span>Add to Wishlist</span>
                                                                    </a>
                                                                    <a href="" class="quick-view hidden-sm-down"
                                                                        data-product-id="">
                                                                        <i class="fa fa-search"></i><span> Quick view</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div id="js-product-list-bottom">
                                    <nav class="pagination row justify-content-around">
                                        <div class="col col-xs-12 col-lg-6 col-md-12">
                                            <span class='showing'>
                                            Showing 1-4 of 4 item(s)
                                            </span>
                                        </div>
                                        <div class="col col-xs-12 col-lg-6 col-md-12">
                                            <ul class="page-list">
                                                <li class="current">
                                                    <a rel="nofollow"
                                                    href="#"
                                                    class="disabled js-search-link">
                                                        1
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('front.includes.not-login')
    @include('front.includes.alert')
    @include('front.includes.alert2')
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.quick-view', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
        });
        $(document).on('click', '.close', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");

            $('.not-loggedin-modal').css("display", "none");
            $('.alert-modal').css("display", "none");
            $('.alert-modal2').css("display", "none");
        });
        $.ajaxSetup({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.addToWishlist', function (e) {
            e.preventDefault();

            @if(! auth()->guard('user')->check() )
                $('.not-loggedin-modal').css('display','block');
            @endif
            
            $.ajax({
                type: 'post',
                url: "{{route('user/favorate')}}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function (data) {
                    if(data.wished ){
                    $('.alert-modal').css('display','block');
                    }else{
                        $('.alert-modal2').css('display','block');
                    }
                }
            });
        });

        $(document).on('click', '.cart-addition', function(e){
            e.preventDefault();

            @if(! auth()->guard('user')->check() )
                $('.not-loggedin-modal').css('display','block');
            @endif

            $.ajax({
                type: 'post',
                url: "{{Route('user/add-card')}}",
                data: {
                    'product_id': $(this).attr('data-product-id'),
                },
                success: function(data){
                    if(data.added ){
                        $('.alert-modal').css('display','block');
                    }else{
                        $('.alert-modal2').css('display','block');
                    }
                }
            });
        });

    </script>

@stop

