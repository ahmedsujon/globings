<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Globings</title>

    <link rel="shortcut icon" href="{{ asset('assets/app/images/header/logo.png') }}" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/modal-video.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/number-input/intlTelInput.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/percircle.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/star-rating-svg.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/addSlider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/jquery.toast.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/app/plugins/css/pace-theme-flash.css') }}" /> --}}

    {{-- tagify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/app/sass/style.css') }}" />
</head>

<style>
    .invalid-feedback {
        display: block;
    }

    .comment_modal .nested_comment::after {
        background-image: url("../../../assets/app/icons/comment_border.png") !important;
    }

    .category_label {
        font-size: 12.5px !important;
        border: 1px solid red;
    }
</style>

<body>
    {{-- <div class="mainContentArea"> --}}
        <main>
            {{ $slot }}
        </main>
    {{-- </div> --}}
    @livewire('app.partials.home-component-partials')
    @if (user())
        <input type="hidden" id="notification_status" value="authenticated" />
    @else
        <input type="hidden" id="notification_status" value="no_auth" />
    @endif


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

    <!-- JS Here -->
    <script src="{{ asset('assets/app/plugins/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.rcounter.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.segmentedInput.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/percircle.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.star-rating-svg.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/Obj.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/addSlider.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.star-rating-svg.js') }}"></script>

    <script src="{{ asset('assets/app/plugins/js/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.expander.min.js') }}"></script>

    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>




    {{-- tagify --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.min.js"></script>


    <script src="{{ asset('assets/app/plugins/js/jquery.expander.min.js') }}"></script>

    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/app/js/main.js') }}"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyApeClQthA9ilOOZ5oYVSvjRe7wrhjpLL8",
            authDomain: "nzcoding-61a74.firebaseapp.com",
            projectId: "nzcoding-61a74",
            storageBucket: "nzcoding-61a74.appspot.com",
            messagingSenderId: "95008265144",
            appId: "1:95008265144:web:478b21933d538b5c57754d",
            measurementId: "G-VKY7QNE747"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        function startFCM() {
            var saved_token = $('#device_token').val();

            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function (response) {
                    $.ajax({
                        url: '{{ route("store.token") }}',
                        type: 'POST',
                        data: {
                            token: response,
                            _token: '<?php echo csrf_token(); ?>',
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            console.log('Token stored.');
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }).catch(function (error) {
                    console.log(error);
                });
        }

        $(document).ready(function(){
            var status = $('#notification_status').val();

            if(status == 'authenticated'){
                startFCM();
            }
        });

        messaging.onMessage(function (payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });
    </script>

    <!-- For range extension show  -->
    <script>
        function betterParseFloat(x) {
            if (isNaN(parseFloat(x)) && x.length > 0)
                return betterParseFloat(x.substr(1));
            return parseFloat(x);
        }

        function usd(x) {
            x = betterParseFloat(x);
            if (isNaN(x)) return "$0.00";
            var dollars = Math.floor(x);
            var cents = Math.round((x - dollars) * 100) + "";
            if (cents.length == 1) cents = "0" + cents;
            return dollars + "." + cents + " KM";
        }
    </script>

    <script>
        //Toastr Notification
        // $(document).ready(function() {
        //     toastr.options = {
        //         "progressBar": true,
        //         "positionClass": "toast-top-right"
        //     };
        // });
        // window.addEventListener('success', event => {
        //     toastr.success(event.detail[0].message);
        // });
        // window.addEventListener('warning', event => {
        //     toastr.warning(event.detail[0].message);
        // });
        // window.addEventListener('error', event => {
        //     toastr.error(event.detail[0].message);
        // });
        // @if (Session::has('success'))
        //     toastr.success("{{ Session::get('success') }}");
        // @endif

        //Delete conf.
        // window.addEventListener('show_delete_confirmation', event => {
        //     $('#deleteDataModal').modal('show');
        // });
        // window.addEventListener('action_btn_click_error', event => {
        //     $('.delete_btn').html('<i class="bx bx-trash font-size-13 align-middle"></i>');
        //     $('#deleteDataModal').modal('hide');
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Oops...',
        //         html: 'Something went wrong! <br> Please try again.'
        //     });
        // });
    </script>
    @stack('scripts')
</body>

</html>
