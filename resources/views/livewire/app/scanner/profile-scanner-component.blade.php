<div>
    <style>
        .scanner {
            text-align: center;
            font-size: 15px;
        }
        .scanned_cont {
            text-align: center;
            font-size: 17px;
            margin-top: 35px;
        }
    </style>

    <div class="scanner">
        <video id="preview" style="width: 100%;"></video>
    </div>
    <div class="scanned_cont d-none">
        <div class="scaning_loader">
            <i class="fa fa-spinner fa-spin" style="font-size: 30px; margin-bottom: 25px;"></i><br>
            Validating QrCode
            <br>
            Please wait...
        </div>
    </div>

</div>
@push('scripts')
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });

        scanner.addListener('scan', function(content) {
            $('.scanner').addClass('d-none');
            $('.scanned_cont').removeClass('d-none');
            var data = content;

            $.ajax({
                type: 'POST',
                url: "{{ route('app.scannerScan') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data" : data
                },
                beforeSend: function() {
                },
                success: function(data) {
                    if(data['message'] == 'insufficient_bings'){
                        toast_msg('Not enough bings balance', 'error');
                        $('.scanner').removeClass('d-none');
                        $('.scanned_cont').addClass('d-none');
                    }
                    if(data['message'] == 'second_scan'){
                        toast_msg('Already scanned on this shop', 'error');
                        $('.scanner').removeClass('d-none');
                        $('.scanned_cont').addClass('d-none');
                    }
                    if(data['message'] == 'error_self_scan'){
                        toast_msg('Can not scan self code!', 'error');
                        $('.scanner').removeClass('d-none');
                        $('.scanned_cont').addClass('d-none');
                    }
                    if(data['message'] == 'invalid_qr_code'){
                        toast_msg('Invalid QrCode', 'error');
                        $('.scanner').removeClass('d-none');
                        $('.scanned_cont').addClass('d-none');
                    }
                    if(data['message'] == 'scan_successful'){
                        toast_msg('Validation successful, redirecting...', 'success');

                        window.location.href = "{{ URL::to('/') }}/scanner/scan-success?scan_id="+data['scan_id'];
                    }
                }
            });
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });

        function toast_msg(msg,type){
            $.toast({
                heading: "",
                text: msg,
                showHideTransition: "slide", //plain,fade
                icon: type, //success,warning,error,info
                position: "bottom-center",
                hideAfter: 3000,
                loader: true,
            });
        }

    </script>
@endpush
