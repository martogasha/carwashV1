<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Cars-Carwash</title>

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
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo">
                    <img src="assets/img/logo.jpg" class="img-fluid" alt="Logo">
                  </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.html" class="menu-logo">
                        <img src="assets/img/logo.jpg" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">
                        <a href="{{url('cars')}}">Cars</a>
                    </li>
                    <li class="">
                        <a href="{{url('washers')}}">Washers</a>
                    </li>
                    <li class="">
                        <a href="{{url('payments')}}">Payments</a>
                    </li>
                    <li class="">
                        <a href="{{url('charges')}}">Charges</a>
                    </li>
                    <li class="">
                        <a href="{{url('users')}}">Users</a>
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
            <div class="row">
                <div class="appointment-tab" style="text-align: center">

                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                        <li class="nav-item">
                            <a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#appt_details">Book Car</a>
                        </li>
                    </ul>

                </div>
                @include('flash-message')
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 text-end">
                        <form action="{{url('filterD')}}">
                            @csrf
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
                </div>

                <div class="row">
                    <div class="col-lg-12 col-12 form-group">
                        <label>Search</label>
                        <input type="text" placeholder="Search" class="form-control" id="myInput">
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body pt-0">

                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Cars</a>
                                    </li>
                                </ul>
                            </nav>


                            <div class="tab-content pt-0">

                                <div id="pat_appointments" class="tab-pane fade show active">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Phone Number</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                        <th>Payment</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                    @foreach($cars as $car)
                                                        <tr class="view" id="{{$car->id}}" data-bs-toggle="modal" data-bs-target="#payCar">
                                                            <td>{{$car->date}}</td>
                                                            <td>{{$car->number_plate}}</td>
                                                            @if($car->phone)
                                                                <td>{{$car->phone}}</td>

                                                            @else
                                                                <td>N/A</td>

                                                            @endif
                                                            <td>{{$car->washer->first_name}} {{$car->washer->last_name}}</td>
                                                            <td>Ksh {{$car->amount}}</td>
                                                            @if($car->payment_method)
                                                                @if($car->payment_method==1)
                                                                    <td> <span class="badge rounded-pill bg-success-light">Mpesa</span></td>
                                                                @else
                                                                    <td> <span class="badge rounded-pill bg-primary-light">Cash</span></td>

                                                                @endif
                                                            @else
                                                                <td>Pending</td>

                                                            @endif
                                                            @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                                                                <td><a class="btn btn-sm bg-success-light del" id={{$car->id}} href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#delete_carlist">Delete</a></td>

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
<div class="modal fade custom-modal" id="payCar">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pay For: <span id="editModalTitle" style="color:red;"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('pCar')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="car_id">
                <div class="modal-body">

                    <div>
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select class="form-control select" name="payment_method">
                                <option value="1">Mpesa</option>
                                <option value="2">Cash</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Car</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('addCar')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label>Number Plate</label>
                            <input type="text" class="form-control" name="number_plate" placeholder="Number Plate" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" id="myform_phone">
                            <span style="color: red" id="phone_error">INPUT VALID PHONE NUMBER</span>
                        </div>
                    </div>

                    <div id="paymentMethod">
                        <div class="form-group">
                            <label>Washer</label>
                            <select class="form-control select" name="washer_id">
                                @foreach($washers as $washer)
                                    <option value="{{$washer->id}}">{{$washer->first_name}} {{$washer->last_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount" id="chargeAmount" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" id="bookButton">Book</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="delete_carlist">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DELETE RECORD FOR: <span id="del_title" style="color:red;"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('deleteCar')}}" method="post">
                @csrf
                <input type="hidden" id="carId" name="carId">
                <div class="modal-body">
                    <button type="submit" class="btn btn-danger" id="bookButton">Delete</button>

                </div>
            </form>
        </div>
    </div>
</div>

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
    $(document).on('click','.view',function () {
        $value = $(this).attr('id');
        $.ajax({
            type:"get",
            url:"{{url('payCar')}}",
            data:{'id':$value},
            success:function (data) {
                getResponse(data);
                console.log(data);

            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    var data;
    function getResponse(response) {
        data = response;

        $('#editModalTitle').text(data.number_plate);
        $('#car_id').val(data.id);


    }
    $(document).on('click','.del',function () {
        $value = $(this).attr('id');
        $.ajax({
            type:"get",
            url:"{{url('deleteCarlist')}}",
            data:{'id':$value},
            success:function (data) {
                getResp(data);
                console.log(data);

            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    var dat;
    function getResp(response) {
        dat = response;

        $('#del_title').text(dat.number_plate);
        $('#carId').val(dat.id);


    }
    $('#carCharge').change(function(){
        $value = $(this).val();
        $.ajax({
            type:"get",
            url:"{{url('getAmount')}}",
            data:{'id':$value},
            success:function (data) {
                $('#chargeAmount').val(data.car_amount);
            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function validatePhoneNumber(input_str) {
        var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

        return re.test(input_str);
    }

    function validateForm(event) {
        var phone = $('#myform_phone').val();
        if (!validatePhoneNumber(phone)) {
            $('#phone_error').show();
            $('#bookButton').hide();

        }
        else {
            $('#phone_error').hide();
            $('#bookButton').show();


        }
        event.preventDefault();
    }
    $('#phone_error').hide();

    $('#myform_phone').on('keyup',function () {
        validateForm();
    });
</script>
