@extends('layout.front.index')

@section('content')

    <div id="wrapper-site">
        <nav data-depth="3" class="breadcrumb-bg">
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
                            <a itemprop="item" href="#">
                                <span itemprop="name">Products</span>
                            </a>
                            <meta itemprop="position" content="3">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="#">
                                <span itemprop="name">{{$product -> name}}</span>
                            </a>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>
                </div>
            </div>
        </nav>
        <div class="no-index">
            <div id="content-wrapper">
                <section id="main" itemscope="" itemtype="https://schema.org/Product">
                    <div class="product-detail-top">
                        <div class="container">
                            <div class="row main-productdetail" data-product_layout_thumb="list_thumb"
                                 style="position: relative;">
                                <div class="col-lg-5 col-md-4 col-xs-12 box-image">
                                    <section class="page-content" id="content">
                                        <div class="images-container list_thumb">
                                            <div class="product-cover">
                                                <img class="js-qv-product-cover img-fluid"
                                                     src="{{asset($product -> photo) }}"
                                                     alt="" title="" style="width:100%;" itemprop="image">
                                                <div class="layer hidden-sm-down" data-toggle="modal"
                                                     data-target="#product-modal">
                                                    <i class="fa fa-expand"></i>
                                                </div>
                                            </div>

                                            <div class="js-qv-mask mask only-product">
                                                <div class="row">
                                                    @isset($product -> photos)
                                                        <?php
                                                            $string = $product->photos;
                                                            $images = explode(",", $string);
                                                        ?>
                                                        @foreach($images as $image)
                                                            <div class="item thumb-container col-md-2 col-xs-3 pt-10">
                                                                <img class="img-fluid thumb js-thumb  selected "
                                                                     data-image-medium-src="{{asset($image)}}"
                                                                     data-image-large-src="{{asset($image)}}"
                                                                     src="{{asset($image)}}"
                                                                     alt="" title="" itemprop="image">
                                                            </div>
                                                        @endforeach
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-7 col-md-8 col-xs-12 mt-sm-20">
                                    <div class="product-information">
                                        <div class="product-actions">
                                            <form action=""
                                                  method="post" id="add-to-cart-or-refresh" class="row">
                                                @csrf
                                                <input type="hidden" name="id_product" value="{{$product -> id }}"
                                                       id="product_page_product_id">

                                                <div class="productdetail-right col-12 col-lg-7 col-md-7">
                                                    <div class="product-reviews">
                                                        <div id="product_comments_block_extra">
                                                            <div class="comments_note">
                                                                <span>Review: </span>
                                                                <div class="star_content clearfix">
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                </div>
                                                            </div>
                                                            <div class="comments_advices">
                                                                <a href="#" class="comments_advices_tab"><i
                                                                        class="fa fa-comments"></i>Read reviews (1)</a>
                                                                <a class="open-comment-form" data-toggle="modal"
                                                                   data-target="#new_comment_form" href="#"><i
                                                                        class="fa fa-edit"></i>Write your review</a>
                                                            </div>
                                                        </div>
                                                        <!--  /Module NovProductComments -->
                                                    </div>
                                                    <p class="seller_name">
                                                        <h1 class="detail-product-name" itemprop="name">{{$product -> name}}</h1>
                                                    </p>    
                                                    <p class="seller_name">
                                                        {{$product->description}}
                                                    </p>
                                                    <p class="seller_name">
                                                        {{$product->short_description}}
                                                    </p>
                                                    <div class="group-price d-flex justify-content-start align-items-center">
                                                        <div class="product-prices ">
                                                            <div class="product-price  mb-3" itemprop="offers" itemscope=""
                                                                 itemtype="https://schema.org/Offer">
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
                                                            </div>
                                                            <div class="product-price-and-shipping">
                                                                <span itemprop="price" class="price">
                                                                    Delivery Cost : $ {{optional($product->vendor)->delivery_cost}}
                                                                </span>
                                                            </div>
                                                            <div class="tax-shipping-delivery-label mb-3">
                                                                Tax included
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="in_border end">
                                                        <div class="sku mb-3">
                                                            <label class="control-label">Sku:</label>
                                                            <span itemprop="sku" content="demo_1">{{$product -> sku ?? '--'}}</span>
                                                        </div>
                                                        <div class="pro-cate mb-3">
                                                            <label class="control-label">Categories:</label>
                                                            @isset($product -> categories)
                                                                <div>
                                                                    @foreach($product -> categories as $category )
                                                                        <span>
                                                                            <a href="#" title="Computer &amp; Networking">{{$category -> name}}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            @endisset
                                                        </div>
                                                        <div class="pro-tag ">
                                                            @isset($product -> tags)
                                                                <label class="control-label mb-3"></i>Tags:</label>
                                                                <div>
                                                                    @foreach($product -> tags as $tag )
                                                                        <span><a href="#">{{$tag -> name}}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            @endisset
                                                        </div>
                                                        <div id="product-availability" class="info-stock mt-3">
                                                            <label class="control-label"></i>Availability:</label>
                                                            {{$product -> in_stock ? 'in stock' : 'out of stock'}}
                                                        </div>
                                                    </div>
                                                    <div id="_desktop_productcart_detail">
                                                        <div class="product-add-to-cart in_border">
                                                            <div class="add">
                                                                <a class="add-to-cart cart-addition" data-product-id="{{$product -> id}}" 
                                                                    href="#" data-button-action="add-to-cart">
                                                                    <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart">
                                                                        <div class="icon-cart">
                                                                            <i class="shopping-cart"></i>
                                                                        </div>
                                                                        <span>Add to cart</span>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            <a class="addToWishlist  wishlistProd_22" href="#"
                                                               data-product-id="{{$product -> id}}">
                                                                <i class="fa fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div id="_desktop_productcart_detail">
                                                        <div class="product-add-to-cart in_border">
                                                            
                                                        </div>
                                                    </div>
                                                    <input class="product-refresh ps-hidden-by-js" name="refresh" type="submit" value="Refresh">
                                                </div>
                                                <div class="productdetail-left col-12 col-lg-5 col-md-5">
                                                    <div class="product-quantity">
                                                        <span class="control-label">Quantity : </span>
                                                        <div class="qty">
                                                            <input type="text" name="qty" id="quantity_wanted" value="1" class="input-group" min="1">
                                                        </div>
                                                    </div>
                                                    <div class="product-variants in_border">
                                                        @if(isset($product_attributes))
                                                            @foreach($product_attributes as $attribute)
                                                                <div class="product-variants-item">
                                                                    <span class="control-label">{{$attribute -> name}} : </span>
                                                                    @if(isset($attribute -> options) && count($attribute -> options) > 0 )
                                                                        <select class="option-cart" option-product="options[]" id="group_1" data-product-attribute="1"
                                                                                name="options[]">
                                                                            @foreach($attribute -> options as $option)
                                                                                <option value="{{$option -> id}}" selected="selected">
                                                                                    {{$option -> name}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail-middle">
                        <div class="container">
                            <div class="row">
                                <div class="tabs col-lg-9 col-md-7 ">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" aria-expanded="true" href="#">Product
                                                Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#">Write Your Own
                                                Review<span class='count-comment'> (1)</span></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="tab-content">
                                        <div class="tab-pane fade active in" id="product-details">
                                            <section class="product-features">
                                                <h3>{!! $product -> description  !!}</h3>
                                            </section>
                                        </div>
                                        <div class="tab-pane fade in" id="reviews">
                                            <div id="product_comments_block_tab">
                                                <div class="comment clearfix">
                                                    <div class="comment_author">
                                                        <span>Grade&nbsp</span>
                                                        <div class="star_content clearfix">
                                                            <div class="star star_on"></div>
                                                            <div class="star star_on"></div>
                                                            <div class="star star_on"></div>
                                                            <div class="star star_on"></div>
                                                            <div class="star star_on"></div>
                                                        </div>
                                                        <div class="comment_author_infos">
                                                            <div class="user-comment"><i class="fa fa-user-o"></i> dfsfs
                                                            </div>
                                                            <div class="date-comment">08/07/2018</div>
                                                        </div>
                                                    </div>
                                                    <div class="comment_details">
                                                        <h4>fsfdfs</h4>
                                                        <p>fdfsd</p>
                                                        <ul>
                                                            <li>1 out of 2 people found this review useful.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-center mt-10">
                                                <a id="new_comment_tab_btn" class="open-comment-form btn btn-default"
                                                   data-toggle="modal" data-target="#new_comment_form" href="#">Write your review !</a>
                                            </p>
                                        </div>
                                        <div class="modal fade in" id="new_comment_form" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-xs-center"><i
                                                                class="fa fa-edit"></i> Write your review</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <i class="material-icons close">close</i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="id_new_comment_form" action="#">
                                                            <div class="product row no-gutters">
                                                                <div class="product-image col-4">
                                                                    <img class="img-fluid"
                                                                         src="../../24-medium_default/hummingbird-printed-t-shirt.jpg"
                                                                         height="" width=""
                                                                         alt="Nullam sed sollicitudin mauris">
                                                                </div>
                                                                <div class="product_desc col-8">
                                                                    <p class="product_name">Nullam sed sollicitudin
                                                                        mauris</p>
                                                                    <p>Lorem ipsum dolor sit amet, consectetuer
                                                                        adipiscing elit. Aenean commodo ligula eget
                                                                        dolor. Aenean massa. Cum sociis natoque
                                                                        penatibus et magnis dis parturient montes,
                                                                        nascetur ridiculus mus. Donec quam felis,
                                                                        ultricies nec, pellentesque eu, pretium quis,
                                                                        sem. Nulla consequat massa quis enim. Donec pede
                                                                        justo, fringilla vel, aliquet nec, vulputate
                                                                        eget, arcu. Lorem ipsum dolor sit amet,
                                                                        consectetuer adipiscing elit. Aenean commodo
                                                                        ligula eget dolor. Aenean massa.</p>
                                                                </div>
                                                            </div>
                                                            <div class="new_comment_form_content">
                                                                <div id="new_comment_form_error"
                                                                     class="error alert alert-danger">
                                                                    <ul></ul>
                                                                </div>
                                                                <ul id="criterions_list">
                                                                    <li>
                                                                        <label>Quality</label>
                                                                        <div class="star_content">
                                                                            <input class="star" type="radio"
                                                                                   name="criterion[1]" value="1">
                                                                            <input class="star" type="radio"
                                                                                   name="criterion[1]" value="2">
                                                                            <input class="star" type="radio"
                                                                                   name="criterion[1]" value="3">
                                                                            <input class="star" type="radio"
                                                                                   name="criterion[1]" value="4">
                                                                            <input class="star" type="radio"
                                                                                   name="criterion[1]" value="5"
                                                                                   checked="checked">
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </li>
                                                                </ul>
                                                                <label for="comment_title">Title for your review<sup
                                                                        class="required">*</sup></label>
                                                                <input id="comment_title" name="title" type="text"
                                                                       value="">

                                                                <label for="content">Your review<sup
                                                                        class="required">*</sup></label>
                                                                <textarea id="content" name="content"></textarea>

                                                                <label>Your name<sup class="required">*</sup></label>
                                                                <input id="commentCustomerName" name="customer_name"
                                                                       type="text" value="">

                                                                <div id="new_comment_form_footer">
                                                                    <input id="id_product_comment_send"
                                                                           name="id_product" type="hidden" value='1'>
                                                                    <div class="fl"><sup class="required">*</sup>
                                                                        Required fields
                                                                    </div>
                                                                    <div class="fr">
                                                                        <button id="submitNewMessage"
                                                                                data-dismiss="modal" aria-label="Close"
                                                                                class="btn btn-primary"
                                                                                name="submitMessage" type="submit">Send
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form><!-- /end new_comment_form_content -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-3 col-md-5">
                                     <div class="nov-html col-xl-12 col-lg-12 col-md-12 policy-product no-padding">
                                        <div class="block">
                                            <div class="block_content">
                                                <div class="policy-row d-flex">
                                                    <div class="icon-policy"><i
                                                            class="noviconpolicy noviconpolicy-1">1</i></div>
                                                    <div class="policy-content">
                                                        <div class="policy-name">Free Delivery</div>
                                                        <div class="policy-des">From $ 250</div>
                                                    </div>
                                                </div>
                                                <div class="policy-row d-flex">
                                                    <div class="icon-policy"><i
                                                            class="noviconpolicy noviconpolicy-2">2</i></div>
                                                    <div class="policy-content">
                                                        <div class="policy-name">Money Back</div>
                                                        <div class="policy-des">Guarantee</div>
                                                    </div>
                                                </div>
                                                <div class="policy-row d-flex">
                                                    <div class="icon-policy"><i
                                                            class="noviconpolicy noviconpolicy-3">3</i></div>
                                                    <div class="policy-content">
                                                        <div class="policy-name">Authenticity</div>
                                                        <div class="policy-des">100% guaranteed</div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                <p>There are @if( isset($related_products)) {{count($related_products) ?? '0'}} @endif Related Products</p>
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
                                            @if( isset($related_products) && count($related_products) > 0 )
                                                @foreach($related_products as $_product)
                                                    <div class="item  col-lg-3 col-md-6 col-xs-12 text-center no-padding">
                                                        <div class="product-miniature js-product-miniature item-one"
                                                            data-id-product="22" data-id-product-attribute="408" itemscope=""
                                                            itemtype="http://schema.org/Product">
                                                            <div class="thumbnail-container">
                                                                <a href="{{route('product-info', $_product->slug)}}"
                                                                class="thumbnail product-thumbnail two-image">
                                                                <img class="img-fluid"
                                                                        src="{{asset($_product->photo)}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{asset($_product->photo)}}"
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
                                                                            {{$_product -> in_stock ? 'in stock' : 'out of stock'}}
                                                                        </div>
                                                                    </div>

                                                                    <p class="seller_name">
                                                                        <a title="View seller profile"
                                                                            href="{{route('product-info', $_product->slug)}}">
                                                                            <i class="fa fa-circle"></i>
                                                                            {{$_product->name}}
                                                                        </a>
                                                                    </p>
                                                                    <p class="seller_name">
                                                                        <i class="fa fa-circle mr-3"></i>
                                                                        {{$_product->description}}
                                                                    </p>
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            @if( $_product->special_price == null )
                                                                                <span itemprop="price" class="price">
                                                                                    <i class="fa fa-circle mr-3"></i>
                                                                                    Price : $ {{$_product->price}}
                                                                                </span>
                                                                                @else
                                                                                <span itemprop="price" class="price">
                                                                                    <i class="fa fa-circle mr-3"></i>
                                                                                    Special Price : $ {{$_product->special_price}}  --  <span class="regular-price">$ {{$product -> price}}</span>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-buttons d-flex justify-content-center"
                                                                    itemprop="offers" itemscope=""
                                                                    itemtype="http://schema.org/Offer">
                                                                    <form action="" method="post" class="formAddToCart">
                                                                        @csrf
                                                                        <input type="hidden" name="id_product" value="{{$_product -> id}}">
                                                                        <a class="add-to-cart cart-addition" data-product-id="{{$_product -> id}}" data-product-slug="{{$_product -> slug}}" href="#"
                                                                            data-button-action="add-to-cart">
                                                                            <i class="novicon-cart"></i>
                                                                            <span>Add to cart</span>
                                                                        </a>
                                                                    </form>
                                                                    <a class="addToWishlist  wishlistProd_22" href="#"
                                                                        data-product-id="{{$_product -> id}}">
                                                                        <i class="fa fa-heart"></i>
                                                                        <span>Add to Wishlist</span>
                                                                    </a>
                                                                    <a href="{{route('product-info', $_product->slug)}}#" class="quick-view hidden-sm-down"
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
                </section>
            </div>
        </div>
    </div>
    @include('front.includes.not-login')
    @include('front.includes.alert')
    @include('front.includes.alert2')
@stop

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
                url: "{{route('user/add-card')}}",
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
        });;
        
    </script>

@stop

