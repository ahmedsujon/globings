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
    <link rel="stylesheet" href="{{ asset('assets/app/sass/style.css') }}" />
</head>

<style>
    .invalid-feedback{
        display: block;
    }
    .comment_modal .nested_comment::after {
        background-image: url("../../../assets/app/icons/comment_border.png") !important;
    }
</style>

<body>

    <main>
        {{ $slot }}
    </main>

    @livewire('app.partials.home-component-partials')


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
    <script src="{{ asset('assets/app/plugins/js/percircle.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/jquery.star-rating-svg.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/Obj.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/js/addSlider.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/app/js/main.js') }}"></script>

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
