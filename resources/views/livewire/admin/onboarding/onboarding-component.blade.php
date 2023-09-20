<div>
    @push('styles')
    <style>
        .onboarding-image {
            border: 1px solid #ddd;
            border-radius: 10px;
        }
    </style>
    @endpush
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Onboarding</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Onboarding Images</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">Onboarding Images</h4>
                            <button class="btn btn-sm btn-dark waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#addDataModal" style="float: right;"><i class="bx bx-plus"></i> Add New
                                Screen</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="rounded onboarding-image  me-2" height="700"
                                        src="{{ asset('assets/images/onboarding.jpg') }}" data-holder-rendered="true">
                                </div>
                                <div class="col-md-3">
                                    <img class="rounded onboarding-image me-2" height="700"
                                        src="{{ asset('assets/images/onboarding.jpg') }}" data-holder-rendered="true">
                                </div>
                                <div class="col-md-3">
                                    <img class="rounded onboarding-image me-2" height="700"
                                        src="{{ asset('assets/images/onboarding.jpg') }}" data-holder-rendered="true">
                                </div>
                                <div class="col-md-3">
                                    <img class="rounded onboarding-image me-2" height="700"
                                        src="{{ asset('assets/images/onboarding.jpg') }}" data-holder-rendered="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>