<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Globings - Admin Login</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>

    <div class="wrapper">
        @livewire('admin.layouts.inc.header')
        @livewire('admin.layouts.inc.sidebar')
        <div class="content-page">
            <div class="content">

                {{ $slot }}

            </div>

            @livewire('admin.layouts.inc.footer')

        </div>
    </div>


    <!-- Vendor js -->
    <script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>

    <!-- Daterangepicker js -->
    <script src="{{ asset('assets/admin/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('assets/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('assets/admin/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('assets/admin/js/pages/demo.dashboard.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>

</body>
</html>
