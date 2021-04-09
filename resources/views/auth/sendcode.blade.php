<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 13:15:04 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('files/admin/images/icons/favicon.png')}}" type="image">
    <link rel="shortcut icon" href="{{asset('files/admin/images/icons/favicon.png')}}" type="image/x-icon">
    <title>Cuba - Reset Password</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/themify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/style.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link id="color" rel="stylesheet" href="{{asset('files/admin/css/color-1.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('files/admin/css/responsive.css')}}">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">     
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo" href="">
                                <img class="img-fluid for-light" src="{{asset('files/admin/images/icons/login.png')}}" alt="looginpage">
                            </a>
                        </div>
                        <div class="login-main"> 
                            <form method="POST" action="{{ route('reset-password-check') }}">
                                @csrf
                                @include('flash::message')
                                <h4>Reset Password</h4>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" required="" name="email" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block mt-2" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{asset('files/admin/js/script.js')}}"></script>
      <!-- login js-->
      <!-- Plugin used-->
    </div>
  </body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 13:15:08 GMT -->
</html>