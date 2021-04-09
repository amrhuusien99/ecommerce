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
                                <h6 class="">{{__('admin/sidebar.general')}}</h6>
                            </div>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-success"></label>
                            <a class="sidebar-link" href="{{url(route('dashboard'))}}">
                                <i data-feather="home"></i><span class="">{{__('admin/sidebar.dashboard')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i class="fas fa-id-card-alt mr-2"></i><span class="">{{__('admin/sidebar.account_settings')}}</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('info-account-settings',auth()->user()->id))}}">{{__('admin/sidebar.account')}}</a></li>
                                <li><a href="{{url(route('chenge-admin-password',auth()->user()->id))}}">{{__('admin/sidebar.change_password')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-success"></label>
                            <a class="sidebar-link" href="{{url(route('settings'))}}">
                            <i class="fas fa-cogs mr-2"></i><span class="">{{__('admin/sidebar.settings')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{url(route('admin-logout'))}}">
                                <i class="fas fa-sign-out-alt fa fa-lg mr-2"></i><span>{{__('admin/sidebar.logout')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="">{{__('admin/sidebar.applications')}}</h6> 
                            </div>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Admin::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-user-shield fa fa-lg mr-2"></i><span>{{__('admin/sidebar.admins')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('admins-list'))}}">{{__('admin/sidebar.admins_list')}}</a></li>
                                <li><a href="{{url(route('create-new-admin'))}}">{{__('admin/sidebar.admins_create')}}</a>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Role::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-shipping-fast fa fa-lg mr-2"></i><span>{{__('admin/sidebar.roles')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('roles'))}}">{{__('admin/sidebar.roles_list')}}</a></li>
                                <li><a href="{{url(route('roles/create'))}}">{{__('admin/sidebar.roles_create')}}</a>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Vendor::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-shipping-fast fa fa-lg mr-2"></i><span>{{__('admin/sidebar.vendors')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('vendors'))}}">{{__('admin/sidebar.vendors_list')}}</a></li>
                                <li><a href="{{url(route('vendors/create'))}}">{{__('admin/sidebar.vendors_create')}}</a>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\User::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-users-cog fa fa-lg mr-2"></i><span>{{__('admin/sidebar.users')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('users'))}}">{{__('admin/sidebar.users_list')}}</a></li>
                                <li><a href="{{url(route('users/create'))}}">{{__('admin/sidebar.users_create')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Product::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fab fa-archive fa fa-lg mr-2"></i><span>{{__('admin/sidebar.products')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('products'))}}">{{__('admin/sidebar.products_list')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\MOdels\Category::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-code-branch fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.categories')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a class="submenu-title" href="#">{{__('admin/sidebar.main_categories')}}<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{url(route('main-categories.index'))}}">{{__('admin/sidebar.main_categories_list')}}</a></li>
                                        <li><a href="{{url(route('main-categories.create'))}}">{{__('admin/sidebar.main_categories_create')}}</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="#">{{__('admin/sidebar.sub_categories')}}<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{url(route('sub-categories.index'))}}">{{__('admin/sidebar.sub_categories_list')}}</a></li>
                                        <li><a href="{{url(route('sub-categories.create'))}}">{{__('admin/sidebar.sub_categories_create')}}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Brand::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-align-justify fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.brands')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('brands'))}}">{{__('admin/sidebar.brands_list')}}</a></li>
                                <li><a href="{{url(route('brands/create'))}}">{{__('admin/sidebar.brands_create')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Tag::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-tags fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.tags')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('tags'))}}">{{__('admin/sidebar.tags_list')}}</a></li>
                                <li><a href="{{url(route('tags/create'))}}">{{__('admin/sidebar.tags_create')}}</a></li>
                            </ul>
                        </li>

                        
                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Attribute::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-tags fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.attributes')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('admin/attributes'))}}">{{__('admin/sidebar.attributes_list')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Option::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-tags fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.options')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('admin/options'))}}">{{__('admin/sidebar.options_list')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title link-nav" href="{{route('admin/orders')}}"><i class="fas fa-calendar fa fa-lg mr-2 ml-1"></i><span>{{__('vendor/sidebar.orders')}}</span></a>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Slider::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-band-aid fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.sliders')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('sliders'))}}">{{__('admin/sidebar.sliders_list')}}</a></li>
                                <li><a href="{{url(route('sliders/create'))}}">{{__('admin/sidebar.sliders_create')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\PaymentMethod::count()}}</label><a class="sidebar-link sidebar-title" href="#"><i class="fas fa-credit-card fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.payments')}}</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url(route('payments'))}}">{{__('admin/sidebar.payments_list')}}</a></li>
                                <li><a href="{{url(route('payments/create'))}}">{{__('admin/sidebar.payments_create')}}</a>   
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Notification::count()}}</label><a class="sidebar-link sidebar-title link-nav" href="{{route('notifications')}}"><i class="fas fa-envelope-open-text fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.notifications')}}</span></a>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Contact::count()}}</label><a class="sidebar-link sidebar-title link-nav" href="{{route('contacts')}}"> <i class="fas fa-file-signature fa fa-lg mr-2 ml-1"></i><span>{{__('admin/sidebar.contacts')}}</span></a>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">{{App\Models\Cart::count()}}</label><a class="sidebar-link sidebar-title link-nav" href="{{route('carts')}}"> <i class="fas fa-shopping-cart fa fa-lg mr-2 mb-3"></i><span>{{__('admin/sidebar.carts')}}</span></a>
                        </li>
                    
                    </ul>
                </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
    <!-- Page Sidebar Ends-->