    <!-- Page Sidebar Start-->
    <div class="sliders sidebar-wrapper"> 
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{asset('files/admin/images/icons/logo.png')}}" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('files/admin/images/icons/logo-icon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links custom-scrollbar">
                        
                        <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{asset('files/admin/images/icons/logo-icon.png')}}" alt=""></a>
                            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                        </li>

                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="">{{__('vendor/sidebar.general')}}</h6>
                            </div>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-success"></label>
                            <a class="sidebar-link" href="{{url(route('vendor-dashboard'))}}">
                                <i data-feather="home"></i><span class="">{{__('vendor/sidebar.dashboard')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i class="fas fa-id-card-alt mr-2"></i><span class="">{{__('vendor/sidebar.account_settings')}}</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('vendor-info-account-settings',auth()->user()->id))}}">{{__('vendor/sidebar.account')}}</a></li>
                                <li><a href="{{url(route('chenge-vendor-password',auth()->user()->id))}}">{{__('vendor/sidebar.change_password')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{url(route('update-vendor-state', auth()->user()->id))}}">
                                <i class="fas fa-store-alt-slash fa fa-lg mr-2"></i>
                                <span>
                                    @if(auth()->user()->state == 'close')
                                        {{__('vendor/sidebar.close')}} Now
                                    @else
                                        {{__('vendor/sidebar.open')}} Now
                                    @endif
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{url(route('vendor-logout'))}}">
                                <i class="fas fa-sign-out-alt fa fa-lg mr-2"></i><span>{{__('vendor/sidebar.logout')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="">{{__('vendor/sidebar.applications')}}</h6> 
                            </div>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{auth()->guard('vendor')->user()->products()->count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fab fa-archive fa fa-lg mr-2"></i><span>{{__('vendor/sidebar.products')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('products/index'))}}">{{__('vendor/sidebar.products_list')}}</a></li>
                                <li><a href="{{url(route('products/create'))}}">{{__('vendor/sidebar.product_create')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{auth()->guard('vendor')->user()->tags()->count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-tags fa fa-lg mr-2 ml-1"></i><span>{{__('vendor/sidebar.tags')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('vendor/tags'))}}">{{__('vendor/sidebar.tags_list')}}</a></li>
                                <li><a href="{{url(route('vendor/tags/create'))}}">{{__('vendor/sidebar.tags_create')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-tags fa fa-lg mr-2 ml-1"></i><span>{{__('vendor/sidebar.attributes')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('attributes'))}}">{{__('vendor/sidebar.attributes_list')}}</a></li>
                                <li><a href="{{url(route('attributes/create'))}}">{{__('vendor/sidebar.attribute_create')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-tags fa fa-lg mr-2 ml-1"></i><span>{{__('vendor/sidebar.options')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('options'))}}">{{__('vendor/sidebar.options_list')}}</a></li>
                                <li><a href="{{url(route('options/create'))}}">{{__('vendor/sidebar.option_create')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title link-nav" href="{{route('orders')}}"><i class="fas fa-calendar fa fa-lg mr-2 ml-1"></i><span>{{__('vendor/sidebar.orders')}}</span></a>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{auth()->guard('vendor')->user()->notification()->count()}}</label><a class="sidebar-link sidebar-title link-nav" href="{{route('notifications')}}"><i class="fas fa-envelope-open-text fa fa-lg mr-2 ml-1"></i><span>{{__('vendor/sidebar.notifications')}}</span></a>
                        </li>
                    
                    </ul>
                </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
    <!-- Page Sidebar Ends-->