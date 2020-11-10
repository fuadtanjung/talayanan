<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

</head>
<body>
<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="../../../../global_assets/images/logo_light.png" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="{{ route('login.index') }}" class="navbar-nav-link">
                    <i class="icon-display4"></i>
                    <span>Login</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Registration form -->
            <form id="form_daftar" action="{{ route('register.post') }}" class="flex-fill" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Create account</h5>
                                    <span class="d-block text-muted">All fields are required</span>
                                </div>

                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2">Your Contact</span>
                                 </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip">
                                    <div class="form-control-feedback">
                                        <i class="icon-credit-card2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="kontak" id="kontak" placeholder="No.Hp/Telephone">
                                    <div class="form-control-feedback">
                                        <i class="icon-phone text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2">Your credentials</span>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            <div class="form-control-feedback">
                                                <i class="icon-key text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right" aksi="input" id="submit_pengguna"><b><i class="icon-plus3"></i></b> Create account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /registration form -->

        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020. <a href="#">LPSE Diskominfo</a> <a href="#"></a>
					</span>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
</body>
<!-- Core JS files -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/blockui.min.js') }}"></script>
<script src="{{ asset('assets/js/uniform.min.js') }}"></script>
<script src="{{ asset('plugin/js/sweet_alert.min.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer: 2000,
    })
</script>
<script type="text/javascript">
    function resetFormdaftar() {
        $("#form_daftar")[0].reset();
        $('#nip').val("").change();
        $('#nama').val("").change();
        $('#kontak').val("").change();
        $('#username').val("").change();
        $('#password').val("").change();
    }

    $('#submit_pengguna').click(function () {
        var aksi = $("#submit_pengguna").attr("aksi");
        $.ajax({
            url: "{{ url('registerpost') }}",
            type: "post",
            data: new FormData($('#form_daftar')[0] ),
            async: false,
            cache: false,
            contentType: false,
            processData: false,

            success: function (response) {
                var pesan = JSON.parse(response);
                if(pesan.error != null){
                    Toast.fire({
                        type: 'error',
                        position: 'top-right',
                        text: pesan.error,
                    });
                    resetFormdaftar();
                }else if(pesan.success != null){
                    Toast.fire({
                        type: 'success',
                        position: 'top-right',
                        text: pesan.success,
                    });
                    resetFormdaftar();
                }else {
                    Toast.fire({
                        type: 'warning',
                        position: 'top-right',
                        text: 'Can\'t retrieve any data from server',
                    });
                }
            },
            fail: function () {
                Toast.fire({
                    type: 'error',
                    position: 'top-right',
                    text: 'Gagal Menambahkan Data pengguna',
                });
            }
        });
    });

    $('#register').on('show.bs.modal',function () {
        resetFormdaftar();
        $("#submit_pengguna").attr("submit_pengguna");
    });
</script>
