<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Charges-Carwash</title>

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
                    <li class="">
                            <a href="{{url('cars')}}">Cars</a>
                    </li>
                    <li class="">
                        <a href="{{url('washers')}}">Washers</a>
                    </li>
                    <li class="">
                        <a href="{{url('payments')}}">Payments</a>
                    </li>
                    <li class="active">
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
                                <h6>Richard Wilson</h6>
                                <p class="text-muted mb-0">Patient</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="patient-dashboard.html">Dashboard</a>
                        <a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                    <div class="appointment-tab" style="text-align: center">

                                <a class="btn btn-success" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#edit_rate">Edit Rate</a>
                        <p>Washers Payment Rate</p><span style="font-size: 30px"><b>{{$rate->rate}}</b>%</span>

                    </div>
                            @include('flash-message')

            </div>
        </div>
    </div>

</div>
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Charge</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <a class="dropdown-item" href="{{url('profile')}}">Profile</a>

            <form action="{{url('addCharge')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div>
                        <div class="form-group">
                            <label>Car type</label>
                            <input type="text" class="form-control" name="car_type" placeholder="Car Type">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="car_amount" placeholder="Amount">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="edit_charge">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit <span id="editModalTitle" style="color:red;"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('eCharge')}}" method="post">
                @csrf
                <input type="hidden" id="charge_id" name="id">
                <div class="modal-body">

                    <div>
                        <div class="form-group">
                            <label>Car type</label>
                            <input type="text" class="form-control" id="car_type" name="car_type">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" id="car_amount" name="car_amount">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="edit_rate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Rate %</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('eRate')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div>
                        <div class="form-group">
                            <label>Washers Payment Rate %</label>
                            <input type="text" class="form-control" id="rate" name="rate">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>

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
            url:"{{url('editCharge')}}",
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

        $('#charge_id').val(data.id);
        $('#car_amount').val(data.car_amount);
        $('#car_type').val(data.car_type);
        $('#editModalTitle').text(data.car_type);

    }
    $('#edit_rate').on('click',function () {
        $.ajax({
            type:"get",
            url:"{{url('editRate')}}",
            data:{},
            success:function (dat) {
                getRespons(dat);
                console.log(dat);

            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });

    var dat;
    function getRespons(respons) {
        dat = respons;

        $('#rate').val(dat.rate);


    }
</script>
