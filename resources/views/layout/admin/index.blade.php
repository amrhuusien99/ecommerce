<!DOCTYPE html> 
<html lang="en" dir="{{ app() -> getLocale() === 'ar' ? 'rtl' : ' ' }}">
  
<!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 13:10:57 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('files/admin/images/icons/favicon.png')}}" type="image">
    <link rel="shortcut icon" href="{{asset('files/admin/images/icons/favicon.png')}}" type="image/x-icon">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/themify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/rating.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('files/admin/css/color-1.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/responsive.css')}}">

    @if(app() -> getLocale() === 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/prism.css')}}">
    @endif

  </head>
  <body onload="startTime()" class="{{ app() -> getLocale() === 'ar' ? 'rtl' : ' ' }}">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page NavBar Start-->
            @include('layout.admin.navbar')
        <!-- Page NavBar Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">

            <!-- Page Sidebar Start-->
                @include('layout.admin.sidebar')
            <!-- Page Sidebar Ends-->

            @yield('content')

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2020 © Cuba theme by pixelstrap  </p>
                    </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->

        </div>
        <!-- Page Body end-->

    </div>
    <!-- page-wrapper end-->

    <!-- latest jquery-->
    <script src="{{asset('files/admin/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('files/admin/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('files/admin/js/bootstrap/bootstrap.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('files/admin/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('files/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('files/admin/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('files/admin/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('files/admin/js/ecommerce.js')}}../assets/js"></script>
    <script src="{{asset('files/admin/js/product-list-custom.js')}}"></script>
    <script src="{{asset('files/admin/js/rating/jquery.barrating.js')}}"></script>
    <script src="{{asset('files/admin/js/rating/rating-script.js')}}"></script>
    <script src="{{asset('files/admin/js/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('files/admin/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('files/admin/js/tooltip-init.js')}}"></script>
    <script src="{{asset('files/admin/js/chart/chartist/chartist.js')}}"></script>
    <script src="{{asset('files/admin/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{asset('files/admin/js/chart/knob/knob.min.js')}}"></script>
    <script src="{{asset('files/admin/js/chart/knob/knob-chart.js')}}"></script>
    <script src="{{asset('files/admin/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('files/admin/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('files/admin/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('files/admin/js/dashboard/default.js')}}"></script>
    <script src="{{asset('files/admin/js/notify/index.js')}}"></script>
    <script src="{{asset('files/admin/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('files/admin/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('files/admin/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('files/admin/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('files/admin/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('files/admin/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('files/admin/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('files/admin/js/typeahead-search/typeahead-custom.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('files/admin/js/script.js')}}"></script>
    <script src="{{asset('files/admin/js/theme-customizer/customizer.js{{asset('files/admin"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 13:14:19 GMT -->
</html>