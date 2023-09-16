<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard-Carwash</title>

    <link type="image/x-icon" href="assets/img/favicon.png" rel="icon">

    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/libs/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/libs/feather/feather.css">

    <link rel="stylesheet" href="assets/libs/fancybox/jquery.fancybox.min.css">

    <link rel="stylesheet" href="assets/libs/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="assets/libs/select2/dist/css/select2.min.css">

    <link rel="stylesheet" href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="assets/libs/dropzone/dropzone.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/libs/fullcalendar/fullcalendar.min.css">

    <link rel="stylesheet" href="assets/css/app.css">
</head>
<div class="main-wrapper">

    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
<span></span>
<span></span>
<span></span>
</span>
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo">
                    <img src="assets/img/logo.jpg" class="img-fluid" alt="Logo">
                </a>
            </div>

            <ul class="nav header-navbar-rht">
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img">
<img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31" alt="Ryan Taylor">
</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <h6>{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                                @else
                                    <script>window.location = "/login";</script>

                                @endif
                                    <p class="text-muted mb-0">Patient</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{url('profile')}}">Profile</a>

                        <form action="{{url('logout')}}" method="post" id="logout">
                            @csrf
                            <a class="dropdown-item" href="javascript:document.getElementById('logout').submit();">Logout</a>

                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    </header>



    <div class="content">
        <div class="container-fluid">
                    <div style="margin-bottom: 3em;" class="app">
                        <ul class="list" style="display: contents;">
                            @if(isset(\Illuminate\Support\Facades\Auth::user()->cars))
                            @if(\Illuminate\Support\Facades\Auth::user()->cars==4)
                                <li style="display: block;">
                                    <a href="{{url('cars')}}" class="card tile text-dark">
                                        <div class="card-header topper"></div>
                                        <div style="display: flex;background-color: #00d285" class="card-body flex-column">
                                            <strong class="display-4 Title">CARS</strong>
                                            <span class="fab fa-js-square fa-3x mb-auto mt-auto"></span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            @endif

                                @if(isset(\Illuminate\Support\Facades\Auth::user()->washer))
                                @if(\Illuminate\Support\Facades\Auth::user()->washer==3)
                                <li style="display: block;">
                                <a href="{{url('washers')}}" class="card tile text-dark">
                                    <div class="card-header topper"></div>
                                    <div style="display: flex;background-color:blue" class="card-body flex-column">
                                        <strong class="display-4 Title">WASHERS</strong>
                                        <span class="fab fa-css3-alt fa-3x mb-auto mt-auto"></span>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @endif


                                    @if(isset(\Illuminate\Support\Facades\Auth::user()->payments))
                                @if(\Illuminate\Support\Facades\Auth::user()->payments==2)
                                <li style="display: block;">
                                <a href="{{url('payments')}}" class="card tile text-dark">
                                    <div class="card-header topper"></div>
                                    <div style="display: flex;background-color:red" class="card-body flex-column">
                                        <strong class="display-4 Title">PAYMENTS</strong>
                                        <span class="fas fa-database mb-auto fa-3x mt-auto"></span>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @endif

                                    @if(isset(\Illuminate\Support\Facades\Auth::user()->users))
                                @if(\Illuminate\Support\Facades\Auth::user()->users==5)
                                <li style="display: block;">
                                <a href="{{url('users')}}" class="card tile text-dark">
                                    <div class="card-header topper"></div>
                                    <div style="display: flex;background-color:orange" class="card-body flex-column">
                                        <strong class="display-4 Title">Users</strong>
                                        <span class="fas fa-user-friends mb-auto fa-3x mt-auto"></span>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @endif

                        </ul>
                    </div>

            </div>
        </div>
    </div>

</div>
<style>


    .app {
        display: grid;
        grid-gap: 15px;
        grid-template-columns: repeat(auto-fit, minmax(10em,1fr));
        justify-items: center;
    }

    .display-4 {
        font-size: 1.3rem;
    }

    .card.tile {
        height: 10em;
        width: 10.75em;
        text-align: center;
    }

    .card.tile:hover {
        box-shadow: 0 0 1rem 0 #00000040;
        transform: scale(1.05);
    }


    .top {
        display: flex;
        justify-content: space-between;
    }

    .topper {
        padding: 0;
        height: .5rem;
    }

    a {
        text-decoration: none !important;
    }

    a.btn.btn-info.btn-sm {
        justify-content: center;
    }

    .top {
        align-items: baseline;
    }

    span.fa-3x.mb-auto.mt-auto {
        color: black;
    }
</style>
<script data-cfasync="false" src="https://doccure-laravel.dreamguystech.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/libs/jquery/jquery.min.js"></script>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/feather/feather.min.js"></script>
<script src="assets/js/respond.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/libs/daterangepicker/daterangepicker.js"></script>

<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/libs/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/pages/fullcalendar.init.js"></script>

<script src="assets/libs/theia-sticky-sidebar/dist/ResizeSensor.js"></script>
<script src="assets/libs/theia-sticky-sidebar/dist/theia-sticky-sidebar.js"></script>

<script src="assets/libs/select2/dist/js/select2.min.js"></script>

<script src="assets/libs/fancybox/jquery.fancybox.min.js"></script>

<script src="assets/libs/dropzone/dropzone-min.js"></script>
<script src="assets/js/pages/dropzone.init.js"></script>

<script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<script src="assets/js/pages/profile-settings.init.js"></script>

<script src="assets/js/circle-progress.min.js"></script>

<script src="assets/js/slick.js"></script>

<script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
</html>
<script>
    $(document).ready(function(){
        // alert(1);
        /*$('.submenu li a').click(function(){
          $(.submenu li a).removeClass("active");
          $(this).addClass("active");
          $('.has-submenu a').removeClass("active");
          $('.has-submenu a').addClass("active");

          //$(this).toggleClass("active");
        });*/
    });
</script>
