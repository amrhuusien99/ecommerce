<div class="header-center hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div id="_desktop_logo"
                 class="contentsticky_logo d-flex align-items-center justify-content-start col-lg-3 col-md-3">
                <a href="{{route('home')}}">
                    <img class="logo img-fluid" src="http://demo.bestprestashoptheme.com/savemart/modules/novthemeconfig/images/logos/logo-1.png" alt="Prestashop_Savemart">
                </a>
            </div>
            <div class="col-lg-9 col-md-9 header-menu d-flex align-items-center justify-content-end">
                <div class="data-contact d-flex align-items-center">
                    <div class="title-icon">support<i class="icon-support icon-address"></i></div>
                    <div class="content-data-contact">
                        <div class="support">Call customer services :</div>
                        <div class="phone-support">
                            1234 567 899
                        </div>
                    </div>
                </div>
                <div class="contentsticky_group d-flex justify-content-end">
                    <div class="header_link_myaccount">
                        @if( auth()->guard('user')->check() )
                            <a class="login" href="{{route('user/information', auth()->guard('user')->user()->id)}}" rel="nofollow" title="Log in to your customer account">
                                <i class="header-icon-account"></i>
                            </a>
                        @else
                            <a class="login" href="{{route('site/login')}}" rel="nofollow" title="Log in to your customer account">
                                <i class="header-icon-account"></i>
                            </a>
                        @endif
                    </div>
                    <div class="header_link_wishlist">
                        @if( auth()->guard('user')->check() )
                            <a href="{{route('user/favorate/list')}}" title="My Wishlists">
                                <i class="header-icon-wishlist"></i>
                            </a>
                        @else
                            <a href="{{route('site/login')}}" title="My Wishlists">
                                <i class="header-icon-wishlist"></i>
                            </a>
                        @endif
                    </div>
                    <div id="_desktop_cart">
                        <div class="blockcart cart-preview active" data-refresh-url="">
                            <div class="header-cart">
                                <div class="cart-left">
                                    @if( auth()->guard('user')->check() )
                                        <a href="{{route('user/cart/list')}}" title="My Wishlists">
                                            <div class="shopping-cart">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                        </a>
                                        <div class="cart-products-count">0</div>
                                    @else
                                        <a href="{{route('site/login')}}" title="My Wishlists">
                                            <div class="shopping-cart">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                        </a>
                                        <div class="cart-products-count">0</div>
                                    @endif
                                </div>
                                <div class="cart-right d-flex flex-column align-self-end ml-13">
                                    <span class="title-cart">Cart</span>
                                    <span class="cart-item"> items</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

