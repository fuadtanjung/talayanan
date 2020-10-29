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
    <link href="{{ asset('plugin/css/all.css') }}" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

</head>
<body>
<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="" alt="">
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
                    <i class="icon-user-tie"></i>
                    <span class="d-md-none ml-2">Contact admin</span>
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
            <form id="form_pengaduan" class="flex-fill" role="form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('images/logo.png') }}" alt="" width="150 px">
                                    <h5 class="mb-0">Pengaduan</h5>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <label for="">Nama Pengguna/ Institusi</label>
                                    <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Pengguna/institusi">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-plus text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <label for="">Kontak</label>
                                    <input type="text" class="form-control" name="kontak_pengguna" placeholder="Kontak">
                                    <div class="form-control-feedback">
                                        <i class="icon-phone text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <label for="">Pengaduan</label>
                                    <textarea name="deskripsi" id="" class="form-control" cols="5" rows="3" placeholder="Pengaduan"></textarea>
                                    <div class="form-control-feedback">
                                        <i class="icon-pencil text-muted"></i>
                                    </div>
                                </div>

                                <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right" aksi="input" id="submit"><b><i class="icon-plus3"></i></b> Tambah Pengaduan</button>
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

<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('plugin/js/pnotify.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('plugin/js/all.js') }}"></script>

<script type="text/javascript">
    $(window).on('load', function () {
        $('#submit').click(function () {
            var aksi = $("#submit").attr("aksi");
            if (aksi == "input") {
                $.ajax({
                    url: "{{ url('/input') }}",
                    type: "post",
                    data: new FormData($('#form_pengaduan')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function (response) {
                        var pesan = JSON.parse(response);
                        if (pesan.error != null) {
                            new PNotify({
                                title: 'Error notice',
                                text: pesan.error,
                                type: 'error',
                                delay : '1000',
                                hide: true
                            });
                        } else if (pesan.success != null) {
                            setTimeout(function () {
                                window.location.reload(1);
                            },2000);
                            new PNotify({
                                title: 'Success notice',
                                text: pesan.success,
                                type: 'success'
                            });
                        } else {
                            new PNotify({
                                title: 'Warning',
                                text: "Can't retrieve any data from server",
                                hide: true
                            });
                            $('#submit').attr("data-aksi", "input");
                        }


                    },
                    fail: function () {
                        new PNotify({
                            title: 'Error notice',
                            text: 'Can\'t retrieve any data from server, please contact your administrator',
                        });
                    }
                });
            }
        });
    });
</script>
</html>
