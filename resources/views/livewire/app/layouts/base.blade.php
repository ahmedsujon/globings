<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Globings</title>

    <link rel="shortcut icon" href="{{ asset('assets/app/images/header/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/number-input/intlTelInput.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/sass/style.css') }}" />
</head>

<body>
    <!-- Scroll To Top -->
    <div class="scrolltop" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </div>

    <main>
        {{ $slot }}
    </main>


    <!-- JS Here -->
    <script src="{{ asset('assets/app/plugins/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.rcounter.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.segmentedInput.js') }}"></script>

    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/app/js/main.js') }}"></script>

    @stack('scripts')

</body>

</html>
