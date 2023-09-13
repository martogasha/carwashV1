<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Add Users-Carwash</title>

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
                    <li class="">
                        <a href="{{url('charges')}}">Charges</a>
                    </li>
                    <li class="active">
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



                </div>
                @include('flash-message')
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body pt-0">

                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Add User</a>
                                    </li>

                                </ul>
                            </nav>


                            <div class="tab-content pt-0">
                                <div class="modal-body">
                                    <form action="{{url('storeUser')}}" method="post">
                                        @csrf
                                    <div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Input Name" id="first_na" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="email" class="form-control" name="email" placeholder="Input Email" id="add_phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                                <option value="1">User</option>
                                                <option value="0">Admin</option>
                                        </select>
                                    </div>
                                    <div class="container" id="role_type">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="cars" value="4" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Cars</label>
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="washers" value="3" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Washers</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="payments" value="2" id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">Payments</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="charges" value="1" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">Charges</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="users" value="0" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Users</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-danger" id="saveButton">Save</button>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
            </div>
            <form action="{{url('addWashers')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" id="first_na" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" id="last_na" required>
                            <span style="color: red" id="name_verification"><b>Name Already Exist</b></span>

                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" id="add_phone" required>
                            <span style="color: red" id="phone_verification"><b>Phone Number Already Exist</b></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" id="saveButton">Save</button>

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
    $('#phone_verification').hide();
    $('#name_verification').hide();

    $(document).on('click','.view',function () {
        $value = $(this).attr('id');
        $.ajax({
            type:"get",
            url:"{{url('editWasher')}}",
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

    function getResponse(data) {
        $('#washer_id').val(data.id);
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#phone').val(data.phone);
        $('#editModalTitle').text(data.first_name+' '+data.last_name);

    }
    $('#add_phone').on('keyup',function () {
        $value = $(this).val();
        $.ajax({
            type:"get",
            url:"{{url('getWasher')}}",
            data:{'phone':$value},
            success:function (data) {
                getResponse(data);
                console.log(data);

            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
        function getResponse(data) {
           if (data.phone==$('#add_phone').val()){
               $('#phone_verification').show();
               $('#saveButton').hide();


           }
           else {
               $('#phone_verification').hide();
               $('#saveButton').show();

           }

        }
    });
    $('#last_na').on('keyup',function () {
        $value = $(this).val();
        $value_one = $('#first_na').val();
        $.ajax({
            type:"get",
            url:"{{url('getName')}}",
            data:{'name':$value,'first_name':$value_one},
            success:function (data) {
                getResponse(data);
                console.log(data);

            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
        function getResponse(data) {
            if (data.last_name==$('#last_na').val()){
                $('#name_verification').show();
                $('#saveButton').hide();


            }
            else {
                $('#name_verification').hide();
                $('#saveButton').show();

            }

        }
    });
    $('#first_na').on('keyup',function () {
        $value = $(this).val();
        $value_one = $('#last_na').val();
        $.ajax({
            type:"get",
            url:"{{url('getName')}}",
            data:{'name':$value_one,'first_name':$value},
            success:function (data) {
                getRespons(data);
                console.log(data);

            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
        function getRespons(data) {
            if (data.last_name==$('#last_na').val()){
                $('#name_verification').show();
                $('#saveButton').hide();


            }
            else {
                $('#name_verification').hide();
                $('#saveButton').show();

            }

        }
    });
</script>
