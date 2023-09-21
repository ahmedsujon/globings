<div>
    @push('styles')
    <style>

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
                                @foreach ($onboarding_images as $onboarding_image)
                                <div class="col-md-3">
                                    <a style="border: none;" wire:click.prevent='editData({{ $onboarding_image->id }})'
                                        wire:loading.attr='disabled'>
                                        <img class="rounded me-2" height="700"
                                            src="{{ asset($onboarding_image->photo) }}" data-holder-rendered="true">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Data Modal -->
            <div wire:ignore.self class="modal fade" id="addDataModal" tabindex="-1" role="dialog"
                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modelTitleId">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: white;">
                            <h5 class="modal-title m-0" id="mySmallModalLabel">Add New Onboarding Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <form wire:submit.prevent='storeData'>
                                        <div class="row">
                                            <div class="col-md-12 mb-2" style="text-align: center;">
                                                <label for="example-number-input" class="col-form-label">Image</label>

                                                <input type="file" class="form-control" wire:model='photo' />
                                                @error('photo')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                @enderror
                                                <div wire:loading wire:target='photo' wire:key='photo'>
                                                    <span class="spinner-border spinner-border-xs" role="status"
                                                        aria-hidden="true"></span> <small>Uploading</small>
                                                </div>
                                                @if ($photo)
                                                <img src="{{ $photo->temporaryUrl() }}" class="img-fluid mt-2"
                                                    style="height: 570px; width: 280px;" />
                                                @endif
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-50">
                                                    {!! loadingStateWithText('storeData', 'Add Image') !!}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Data Modal -->
            <div wire:ignore.self class="modal fade" id="editDataModal" tabindex="-1" role="dialog"
                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modelTitleId">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: white;">
                            <h5 class="modal-title m-0" id="mySmallModalLabel">Edit Onboarding Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click.prevent='resetInputs'></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <form wire:submit.prevent='updateData'>
                                        <div class="row">
                                            <div class="col-md-12 mb-2" style="text-align: center;">
                                                <label for="example-number-input" class="col-form-label">Image</label>
                                                <input type="file" class="form-control" wire:model='photo' />
                                                @error('photo')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                @enderror

                                                <div wire:loading wire:target='photo' wire:key='photo'>
                                                    <span class="spinner-border spinner-border-xs" role="status"
                                                        aria-hidden="true"></span> <small>Uploading</small>
                                                </div>
                                                @if ($photo)
                                                <img src="{{ $photo->temporaryUrl() }}" class="img-fluid mt-2"
                                                    style="height: 570px; width: 280px;" />
                                                @elseif ($uploadedPhoto)
                                                <img src="{{ asset($uploadedPhoto) }}" class="img-fluid mt-2"
                                                    style="height: 570px; width: 280px;" />
                                                @endif
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-50">
                                                    {!! loadingStateWithText('updateData', 'Update Image') !!}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div wire:ignore.self class="modal fade" id="deleteDataModal" tabindex="-1" role="dialog"
                aria-labelledby="modelTitleId">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md" role="document">
                    <div class="modal-content p-5 bg-transparent border-0">
                        <div class="modal-body pt-4 pb-4 bg-white" style="border-radius: 10px;">
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-11 text-center">
                                    <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                        <div class="swal2-icon-content">!</div>
                                    </div>
                                    <h2>Are you sure?</h2>
                                    <p class="mb-4">You won't be able to revert this!</p>

                                    <button type="button" class="btn btn-sm btn-success waves-effect waves-light"
                                        wire:click.prevent='deleteData' wire:loading.attr='disabled'>
                                        {!! loadingStateWithText('deleteData', 'Yes, Delete.') !!}
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light"
                                        data-bs-dismiss="modal">No, Cancel.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    window.addEventListener('closeModal', event => {
            $('#addDataModal').modal('hide');
            $('#editDataModal').modal('hide');
        });

        window.addEventListener('showEditModal', event => {
            $('#editDataModal').modal('show');
        });

        window.addEventListener('image_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The image has been deleted.",
                "success"
            );
        });
</script>
@endpush