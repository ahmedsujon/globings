<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>{{ admin()->name }}</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/admin/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4 pb-1">
                                    <div class="avatar-md profile-user-wid mb-2">
                                        <img src="{{ asset(admin()->avatar) }}" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ admin()->name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{ admin()->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row pb-1">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid pt-2 pb-2">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Admin</p>
                                            <h4 class="mb-0">{{ $total_admin }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid pt-2 pb-2">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total User</p>
                                            <h4 class="mb-0">{{ $total_user }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid pt-2 pb-2">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Shop</p>
                                            <h4 class="mb-0">{{ $total_shop }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid pt-2 pb-2">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Post</p>
                                            <h4 class="mb-0">{{ $total_post }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid pt-2 pb-2">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Category</p>
                                            <h4 class="mb-0">{{ $total_category }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid pt-2 pb-2">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Sub-Category</p>
                                            <h4 class="mb-0">{{ $total_sub_category }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Recent Register Shops</h4>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center">ID</th>
                                            <th class="align-middle">Name</th>
                                            <th class="align-middle">Address</th>
                                            <th class="align-middle">Shop Category</th>
                                            <th class="align-middle">Shop Visited</th>
                                            <th class="align-middle text-center">Status</th>
                                            <th class="align-middle text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($shops->count() > 0)
                                        @php
                                        $sl = $shops->perPage() * $shops->currentPage() -
                                        ($shops->perPage() - 1);
                                        @endphp
                                        @foreach ($shops as $shop)
                                        <tr>
                                            <td class="text-center">{{ $sl++ }}</td>
                                            <td>
                                                <img src="{{ asset($shop->profile_image) }}" style="height: 30px;"
                                                    class="img-fluid" alt="">
                                                {{ $shop->name }}
                                            </td>
                                            <td>{{ $shop->address }}</td>
                                            <td>{{ $shop->shop_category }}</td>
                                            <td>{{ $shop->visited }}</td>
                                            <td class="text-center" style="width: 15%;">
                                                @if ($shop->status == 0)
                                                <button class="btn btn-xs btn-danger"
                                                    wire:click.prevent='changeStatus({{ $shop->id }})'
                                                    style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!!
                                                    loadingStateStatus('changeStatus(' . $shop->id . ')', 'In-Active')
                                                    !!}</button>
                                                @else
                                                <button class="btn btn-xs btn-success"
                                                    wire:click.prevent='changeStatus({{ $shop->id }})'
                                                    style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!!
                                                    loadingStateStatus('changeStatus(' . $shop->id . ')', 'Active') !!}</button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-sm btn-soft-primary waves-effect waves-light action-btn edit_btn"
                                                    wire:click.prevent='editData({{ $shop->id }})'
                                                    wire:loading.attr='disabled'>
                                                    <i
                                                        class="mdi mdi-square-edit-outline font-size-13 align-middle"></i>
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-soft-danger waves-effect waves-light action-btn delete_btn"
                                                    wire:click.prevent='deleteConfirmation({{ $shop->id }})'
                                                    wire:loading.attr='disabled'>
                                                    <i class="bx bx-trash font-size-13 align-middle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center pt-5 pb-5">No category found!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <div class="card-footer bg-white">
                            {{ $shops->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
