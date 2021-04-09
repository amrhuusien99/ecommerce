    <!-- Page Sidebar Start-->
    <div class="sidebar-wrapper">
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{asset('files/admin/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('files/admin/images/logo/logo-icon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links custom-scrollbar">
                        <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{asset('files/admin/images/logo/logo-icon.png')}}" alt=""></a>
                            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                        </li>

                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="lan-1">General</h6>
                                <p class="lan-2">Dashboards</p>
                            </div>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-success"></label><a class="sidebar-link" href="#"><i data-feather="home"></i><span class="lan-3">Dashboard</span></a>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="airplay"></i><span class="lan-6">Widgets</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="general-widget.html">General</a></li>
                                <li><a href="chart-widget.html">Chart</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{url(route('admin-logout'))}}"><i class="fas fa-sign-out-alt fa fa-lg mr-2"></i><span>Logout</span></a></li>

                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="lan-8">Applications</h6>
                                <p class="lan-9">Ready to use Apps</p>
                            </div>
                        </li>

                        <li class="sidebar-list">
                            <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Project</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="projects.html">Project List</a></li>
                                <li><a href="projectcreate.html">Create new</a></li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="file-text"></i><span>Forms</span></a>
                            <ul class="sidebar-submenu">
                                <li><a class="submenu-title" href="#">Form Controls<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="form-validation.html">Form Validation</a></li>
                                        <li><a href="base-input.html">Base Inputs</a></li>
                                        <li><a href="radio-checkbox-control.html">Checkbox & Radio</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="knowledgebase.html"><i data-feather="sunrise"> </i><span>Knowledgebase</span></a></li>
                    
                    </ul>
                </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
    <!-- Page Sidebar Ends-->