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
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->



</head>
<body>

@yield('navbar')

    <!-- Core JS files -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('plugin/js/sweet_alert.min.js') }}"></script>
    <script src="{{ asset('plugin/js/pnotify.min.js') }}"></script>
    <script src="{{ asset('plugin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('plugin/js/prism.min.js') }}"></script>


    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('plugin/js/all.js') }}"></script>
    <!-- /theme JS files -->

@yield('js')


</body>
</html>
