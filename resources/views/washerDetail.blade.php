<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{$wash->first_name}} {{$wash->last_name}} Payments-Carwash</title>

    <link type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" rel="icon">

    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/feather/feather.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/fancybox/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/dropzone/dropzone.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/fullcalendar/fullcalendar.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
</head>
<div class="main-wrapper">

    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo">
                    <img src="{{asset('assets/img/logo.jpg')}}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{url('/')}}" class="menu-logo">
                        <img src="{{asset('assets/img/logo.jpg')}}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="">
                        <a href="{{url('cars')}}">Cars</a>
                    </li>
                    <li class="">
                        <a href="{{url('washers')}}">Washers</a>
                    </li>
                    <li class="active">
                        <a href="{{url('payments')}}">Payments for <b style="color: blue">{{$wash->first_name}}</b></a>
                    </li>
                    <li class="">
                        <a href="{{url('charges')}}">Charges</a>
                    </li>
                </ul>
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
            <div class="row">

                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 text-end">
                        <form action="{{url('filterWasher')}}">
                            @csrf
                            <input type="hidden" value="{{$wash->id}}" name="id">
                            <span><b>From</b></span><input type="date" name="from">
                            <span><b>To</b></span><input type="date" name="to">
                            <button class="btn btn-dark">Search</button>
                        </form>
                    </div>

                </div>


                <div class="col-md-12 col-lg-12 col-xl-12" style="text-align: center">
                    @if(!isset($f))
                        <p style="font-size: large"><b>Today</b>:
                            {{$t}}
                        </p>
                    @else
                        <p style="font-size: large"><b>From</b>:
                            {{$f}}
                            <span><b>To</b>:</span> {{$t}}
                        </p>
                    @endif
                    <div class="card">
                        <div class="card-body pt-0">
<br>
                            <nav>
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item" id="payNav">
                                        <a href="#pat_appointments" data-bs-toggle="tab" style="color: red"><span style="color: black;font-size: larger"><i style="font-size: smaller">Total Amount:<br>Ksh</i> <b>{{$total}}</b></span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-bs-toggle="tab" style="color: blue">{{$wash->first_name}} {{$wash->last_name}} <span style="color: black;font-size: larger"><i style="font-size: smaller">Paid:<br>Ksh</i> <b>{{$paid}}</b></span></a>
                                    </li>
                                </ul>
                            </nav>
                            <br>
                            <nav>
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a href="#" data-bs-toggle="tab" style="color: red">MPESA <span style="color: black;font-size: larger"><i style="font-size: smaller"><br>Ksh</i> <b>{{$m}}</b></span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-bs-toggle="tab" style="color: blue">CASH <span style="color: black;font-size: larger"><i style="font-size: smaller"><br>Ksh</i> <b>{{$c}}</b></span></a>
                                    </li>
                                </ul>
                            </nav>

<br>
                            <div class="tab-content pt-0">

                                <div class="tab-pane fade show active" id="pat_appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cars as $car)
                                                        <tr>
                                                            <td>{{$car->date}}</td>
                                                            <td>{{$car->number_plate}}</td>
                                                            <td>{{$car->washer->first_name}} {{$car->washer->last_name}}</td>
                                                            <td>Ksh {{$car->amount}}</td>
                                                            @if($car->payment_method==1)
                                                                <td><span class="badge rounded-pill bg-success-light">Mpesa</span></td>

                                                            @else
                                                                <td><span class="badge rounded-pill bg-primary-light">Cash</span></td>

                                                            @endif

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pat_prescriptions">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($washers as $washer)
                                                        <tr>
                                                            <td>{{$washer->first_name}} {{$washer->last_name}}</td>
                                                            <td>{{$washer->phone}}</td>
                                                            <td>{{$washer->rate}}%</td>
                                                            <td>Ksh {{$washer->amount}}</td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pat_mpesa">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($mpesas as $mpesa)
                                                        <tr>
                                                            <td>{{$mpesa->date}}</td>
                                                            <td>{{$mpesa->number_plate}}</td>
                                                            <td>{{$mpesa->washer->first_name}} {{$mpesa->washer->last_name}}</td>
                                                            <td>Ksh {{$mpesa->amount}}</td>
                                                            @if($mpesa->payment_method==1)
                                                                <td><span class="badge rounded-pill bg-success-light">Mpesa</span></td>

                                                            @else
                                                                <td><span class="badge rounded-pill bg-primary-light">Cash</span></td>

                                                            @endif

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade"  id="pat_cash">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cashs as $cash)
                                                        <tr>
                                                            <td>{{$cash->date}}</td>
                                                            <td>{{$cash->number_plate}}</td>
                                                            <td>{{$cash->washer->first_name}} {{$cash->washer->last_name}}</td>
                                                            <td>Ksh {{$cash->amount}}</td>
                                                            @if($cash->payment_method==1)
                                                                <td><span class="badge rounded-pill bg-success-light">Mpesa</span></td>

                                                            @else
                                                                <td><span class="badge rounded-pill bg-primary-light">Cash</span></td>

                                                            @endif

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
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
    </div>

</div>

<script data-cfasync="false" src="https://doccure-laravel.dreamguystech.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/libs/jquery/jquery.min.js"></script>

<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/feather/feather.min.js')}}"></script>
<script src="{{asset('assets/js/respond.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/js/pages/fullcalendar.init.js')}}"></script>

<script src="{{asset('assets/libs/theia-sticky-sidebar/dist/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/libs/theia-sticky-sidebar/dist/theia-sticky-sidebar.js')}}"></script>

<script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>

<script src="{{asset('assets/libs/fancybox/jquery.fancybox.min.js')}}"></script>

<script src="{{asset('assets/libs/dropzone/dropzone-min.js')}}"></script>
<script src="{{asset('assets/js/pages/dropzone.init.js')}}"></script>

<script src="{{asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

<script src="{{asset('assets/js/pages/profile-settings.init.js')}}"></script>

<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

<script src="{{asset('assets/js/slick.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
</body>

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
</html>
<script>
    $(document).ready(function () {
        document.getElementById('payNav').style.backgroundColor = "lightgray";

    });
    $('#workerSalary').click(function () {
        $('#pat_appointments').hide();
        $('#pat_cash').hide();
        $('#pat_mpesa').hide();
        $('#pat_prescriptions').show();
        document.getElementById('workerNav').style.backgroundColor = "lightgray";
        document.getElementById('payNav').style.backgroundColor = "";
        document.getElementById('mpesaNav').style.backgroundColor = "";
        document.getElementById('cashNav').style.backgroundColor = "";

    });
    $('#paymentsTotal').click(function () {
        $('#pat_prescriptions').hide();
        $('#pat_cash').hide();
        $('#pat_mpesa').hide();
        $('#pat_appointments').show();
        document.getElementById('payNav').style.backgroundColor = "lightgray";
        document.getElementById('workerNav').style.backgroundColor = "";
        document.getElementById('mpesaNav').style.backgroundColor = "";
        document.getElementById('cashNav').style.backgroundColor = "";

    });
    $('#button_mpesa').click(function () {
        $('#pat_appointments').hide();
        $('#pat_prescriptions').hide();
        $('#pat_cash').hide();
        $('#pat_mpesa').show();
        document.getElementById('mpesaNav').style.backgroundColor = "lightgray";
        document.getElementById('payNav').style.backgroundColor = "";
        document.getElementById('workerNav').style.backgroundColor = "";
        document.getElementById('cashNav').style.backgroundColor = "";

    });
    $('#button_cash').click(function () {
        $('#pat_appointments').hide();
        $('#pat_prescriptions').hide();
        $('#pat_mpesa').hide();
        $('#pat_cash').show();
        document.getElementById('cashNav').style.backgroundColor = "lightgray";
        document.getElementById('mpesaNav').style.backgroundColor = "";
        document.getElementById('payNav').style.backgroundColor = "";
        document.getElementById('workerNav').style.backgroundColor = "";
    });
</script>
