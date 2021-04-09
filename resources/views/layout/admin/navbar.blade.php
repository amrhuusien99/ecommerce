
    <!-- Page navbar Start--> 
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <form class="form-inline search-full" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="header-logo-wrapper">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('files/admin/images/icons/logo.png')}}" alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="sliders"></i></div>
            </div>

            <div class="left-header col horizontal-wrapper pl-0">
                <ul class="horizontal-menu">
                    <li class="mega-menu outside"><a class="nav-link" href="#!"><i data-feather="layers"></i><span>Bonus Ui</span></a>
                    </li>
                    <li class="level-menu outside"><a class="nav-link" href="#!"><i data-feather="inbox"></i><span>Level Menu</span></a>
                    </li>
                </ul>
            </div>

            <div class="nav-right col-8 pull-right right-header p-0">
                <ul class="nav-menus">
                    <li class="language-nav">
                        <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang"><i class="fas fa-globe-africa fa fa-lg"></i><span class="lang-txt"></span></div>
                        </div>
                        <div class="more_lang">
                            <a href="{{route('admin/lang',['lang'=> 'en'])}}">
                                <div class="lang selected" data-value="en">
                                    <span class="lang-txt">English<span> (US)</span></span>
                                </div>
                            </a>
                            <a href="{{route('admin/lang',['lang'=> 'ar'])}}">
                                <div class="lang" data-value="ar">
                                    <span class="lang-txt">العربيه<span> (AR)</span></span>
                                </div>
                            </a>
                            <a href="{{route('admin/lang',['lang'=> 'es'])}}">
                                <div class="lang" data-value="ar">
                                    <span class="lang-txt">Spanish<span> (ES)</span></span>
                                </div>
                            </a>
                        </div>
                        </div>
                    </li>
                    <li>                         
                        <span class="header-search"><i data-feather="search"></i></span></li>
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="bell"> </i><span class="badge badge-pill badge-secondary">4</span></div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i data-feather="bell"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                            </ul>
                        </li>  
                    </li>
                    <li class="onhover-dropdown">
                        <div class="notification-box"><i data-feather="star"></i></div>
                        <div class="onhover-show-div bookmark-flip">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="back">
                                        <ul>
                                            <li>
                                                <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                                                <input type="text" placeholder="search...">
                                                </div>
                                            </li>
                                            <li>
                                                <button class="d-block flip-back" id="flip-back">Back</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                    <li class="cart-nav onhover-dropdown">
                        <div class="cart-box"><i data-feather="shopping-cart"></i><span class="badge badge-pill badge-primary">2</span></div>
                        <ul class="cart-dropdown onhover-show-div"></ul>
                    </li>
                    <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                    <li class="profile-nav onhover-dropdown p-0 mr-0">
                        <div class="media profile-media"><img style="max-height:350px;max-width:35px;" class="rounded-circle b-r-10" src="{{asset(auth()->user()->photo)}}" alt="">
                            <div class="media-body"><span>{{auth()->user()->name}}</span>
                                <p class="mb-0 font-roboto">Admin</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <script class="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">                        
                    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                        <div class="ProfileCard-details">
                        <div class="ProfileCard-realName"></div>
                    </div>
                </div>
            </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page nav Ends 