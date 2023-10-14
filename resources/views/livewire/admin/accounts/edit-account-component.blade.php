<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Private Accounts</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Private Accounts</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Personal Informatios</h4>
                            <form wire:submit.prevent='updateData' enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text" wire:model='first_name' class="form-control"
                                                placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text" wire:model='last_name' class="form-control"
                                                placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" wire:model='email' class="form-control"
                                                placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" wire:model='phone' class="form-control"
                                                placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" wire:model='password' class="form-control"
                                                placeholder="Enter Your Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="account_type" class="form-label">Account Type</label>
                                            <select class="form-select" wire:model='account_type'>
                                                <option selected="">Choose Account Type</option>
                                                <option value="Private">Private</option>
                                                <option value="Professional">Professional</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="avatar" class="form-label">Image</label>
                                            <input class="form-control mb-2" type="file" wire:model="avatar" />
                                            <div wire:loading="avatar" wire:target="avatar" wire:key="avatar"
                                                style="font-size: 12.5px;" class="mr-2"><i
                                                    class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>
                                            @if ($avatar)
                                            <img src="{{ $avatar->temporaryUrl() }}" width="120">
                                            @endif
                                            @error('avatar')
                                            <span class="text-danger" style="font-size: 12.5px;">{{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">
                                        {!! loadingStateWithText('updateData', 'Update Account') !!}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>