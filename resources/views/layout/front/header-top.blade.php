<div class="header-top hidden-sm-down">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="header-top-left col-lg-6 col-md-6 d-flex justify-content-start align-items-center">
                    <div class="detail-email d-flex align-items-center justify-content-center">
                        <i class="icon-email"></i>
                        <p>Email : </p>
                        <span>
                  support@gmail.com
                </span>
                    </div>
                    <div class="detail-call d-flex align-items-center justify-content-center">
                        <i class="icon-deal"></i>
                        <p>Today Deals </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center header-top-right">
                    <div class="register-out">
                        @if( auth()->guard('user')->check() )
                            <i class="zmdi zmdi-account"></i>
                            <a href="#">
                                {{auth('user')->user()->name}}
                            </a>

                        @endif
                    </div>
                    <div class="register-out">
                        @if( auth()->guard('user')->check() )

                            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{route('site/logout')}}" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            
                        @else
                            <i class="zmdi zmdi-account"></i>
                            <a class="register" href="{{route('user/register')}}" data-link-action="display-register-form">
                                Register
                            </a>
                            <span class="or-text">or</span>
                            <a class="login" href="{{route('site/login')}}" rel="nofollow" title="Log in to your customer account">Sign in</a>

                        @endif
                    </div>
                    <div id="_desktop_currency_selector"
                         class="currency-selector groups-selector hidden-sm-down currentcy-selector-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                             role="main">
                            <span class="expand-more">GBP</span>
                        </div>
                        <div class="currency-list dropdown-menu">
                            <div class="currency-list-content text-left">
                                <div class="currency-item current flex-first">
                                    <a title="British Pound" rel="nofollow"
                                       href="index-1.htm?home=home_3&amp;SubmitCurrency=1&amp;id_currency=1">£ GBP</a>
                                </div>
                                <div class="currency-item">
                                    <a title="US Dollar" rel="nofollow"
                                       href="index-2.htm?home=home_3&amp;SubmitCurrency=1&amp;id_currency=2">$ USD</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="_desktop_language_selector"
                         class="language-selector groups-selector hidden-sm-down language-selector-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                             role="main">
                            <span class="expand-more"><i class="fas fa-globe-africa fa fa-lg"></i>
                        </div>
                        <div class="language-list dropdown-menu">
                            <div class="language-list-content text-left">
                                <div class="language-item current flex-first">
                                    <div class="current">
                                        <a href="{{route('lang',['lang'=> 'en'])}}">
                                            <i class="fas fa-globe-africa fa fa-lg"></i>
                                            <span>English</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="language-item">
                                    <div>
                                        <a href="{{route('lang',['lang'=> 'es'])}}">
                                            <i class="fas fa-globe-africa fa fa-lg"></i>
                                            <span>Español</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="language-item">
                                    <div>
                                        <a href="{{route('lang',['lang'=> 'ar'])}}">
                                            <i class="fas fa-globe-africa fa fa-lg"></i>
                                            <span>اللغة العربية</span>
                                        </a>
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
