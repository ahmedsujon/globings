<div>
    <style>
        .scanner {
            text-align: center;
            font-size: 15px;
        }
    </style>

    <div class="scanner">
        <video id="preview" style="width: 100%; height: 50%;"></video>

        <div class="scaning_loader" style="margin-top: 25px;"></div>
    </div>

</div>
@push('scripts')
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });

        scanner.addListener('scan', function(content) {
            var data = content;

            $.ajax({
                type: 'POST',
                url: "{{ route('app.scannerScan') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data" : data
                },
                beforeSend: function() {
                    $(".scaning_loader").html('<i class="fa fa-spinner fa-spin"></i> Scaning...');
                },
                success: function(data) {
                    if(data['message'] == 'insufficient_bings'){
                        toast_msg('Not enough bings balance', 'error');
                        $(".scaning_loader").html('');
                    }
                    if(data['message'] == 'second_scan'){
                        toast_msg('Already scanned on this shop', 'error');
                        $(".scaning_loader").html('');
                    }
                    if(data['message'] == 'error_self_scan'){
                        toast_msg('Can not scan self code!', 'error');
                        $(".scaning_loader").html('');
                    }
                    if(data['message'] == 'invalid_qr_code'){
                        toast_msg('Invalid QrCode', 'error');
                        $(".scaning_loader").html('');
                    }
                    if(data['message'] == 'scan_successful'){
                        toast_msg('Scan successful, redirecting...', 'success');

                        window.location.href = "{{ URL::to('/') }}/scanner/scan-success?scan_id="+data['scan_id'];
                    }
                }
            });
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[1]);
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
