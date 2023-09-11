<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Globings - Admin Login</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body class="authentication-bg position-relative">

    {{ $slot }}

    <footer class="footer footer-alt fw-medium">
        <span class="bg-body"><script>document.write(new Date().getFullYear())</script> © Globings</span>
    </footer>

    <!-- Vendor js -->
    <script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>

</body>
</html>
