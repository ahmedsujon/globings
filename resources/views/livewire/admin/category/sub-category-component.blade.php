<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sub Category</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sub Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">All Sub Category</h4>
                            <button class="btn btn-sm btn-dark waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#addDataModal" style="float: right;"><i class="bx bx-plus"></i> Add New
                                Sub Category</button>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                                    <label class="font-weight-normal" style="">Show</label>
                                    <select name="sortuserresults" class="sinput" id="" wire:model="sortingValue"
                                        wire:change='resetPage'>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <label class="font-weight-normal" style="">entries</label>
                                </div>

                                <div style="position: absolute; text-align: center;" wire:loading
                                    wire:target='searchTerm,sortingValue,previousPage,gotoPage,nextPage'>
                                    <span class="bg-light" style="padding: 5px 15px; border-radius: 2px;"><span
                                            class="spinner-border spinner-border-xs align-middle" role="status"
                                            aria-hidden="true"></span> Processing</span>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 search_cont">
                                    <label class="font-weight-normal mr-2">Search:</label>
                                    <input type="search" class="sinput" placeholder="Search..." wire:model="searchTerm"
                                        wire:keyup='resetPage' />
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center">ID</th>
                                            <th class="align-middle">Name</th>
                                            <th class="align-middle text-center">Slug</th>
                                            <th class="align-middle text-center">Status</th>
                                            <th class="align-middle text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($sub_categories->count() > 0)
                                        @php
                                        $sl = $sub_categories->perPage() * $sub_categories->currentPage() -
                                        ($sub_categories->perPage() - 1);
                                        @endphp
                                        @foreach ($sub_categories as $sub_category)
                                        <tr>
                                            <td class="text-center">{{ $sl++ }}</td>
                                            <td>{{ $sub_category->name }}</td>
                                            <td class="text-center">{{ $sub_category->slug }}</td>
                                            <td class="text-center" style="width: 15%;">
                                                @if ($sub_category->status == 0)
                                                <button class="btn btn-xs btn-danger"
                                                    wire:click.prevent='changeStatus({{ $sub_category->id }})'
                                                    style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!!
                                                    loadingStateStatus('changeStatus(' . $sub_category->id . ')', 'In-Active')
                                                    !!}</button>
                                                @else
                                                <button class="btn btn-xs btn-success"
                                                    wire:click.prevent='changeStatus({{ $sub_category->id }})'
                                                    style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!!
                                                    loadingStateStatus('changeStatus(' . $sub_category->id . ')', 'Active') !!}</button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-sm btn-soft-primary waves-effect waves-light action-btn edit_btn"
                                                    wire:click.prevent='editData({{ $sub_category->id }})'
                                                    wire:loading.attr='disabled'>
                                                    <i
                                                        class="mdi mdi-square-edit-outline font-size-13 align-middle"></i>
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-soft-danger waves-effect waves-light action-btn delete_btn"
                                                    wire:click.prevent='deleteConfirmation({{ $sub_category->id }})'
                                                    wire:loading.attr='disabled'>
                                                    <i class="bx bx-trash font-size-13 align-middle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center pt-5 pb-5">No sub-category found!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            {{ $sub_categories->links('livewire.pagination-links') }}
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
                            <h5 class="modal-title m-0" id="mySmallModalLabel">Add New Sub Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <form wire:submit.prevent='storeData'>
                                        <div class="row">

                                            <div class="col-md-6 mb-2">
                                                <label for="example-number-input" class="col-form-label">Name</label>
                                                <input class="form-control" type="text" wire:model="name"
                                                    placeholder="Enter name" wire:keyup='generateSlug'>
                                                @error('name')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="example-number-input" class="col-form-label">Slug</label>
                                                <input class="form-control" type="text" wire:model="slug"
                                                    placeholder="Enter slug" readonly>
                                                @error('slug')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="col-md-2 col-form-label">Select Category</label>
                                                <div class="col-md-12">
                                                    <select class="form-select" wire:model='category_id'>
                                                        <option>Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ getCategoryID($category->id)->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('category_id')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-50">
                                                    {!! loadingStateWithText('storeData', 'Add SubCategory') !!}
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
                            <h5 class="modal-title m-0" id="mySmallModalLabel">Edit Sub Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click.prevent='resetInputs'></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <form wire:submit.prevent='updateData'>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="example-number-input" class="col-form-label">Name</label>
                                                <input class="form-control" type="text" wire:model="name"
                                                    placeholder="Enter name" wire:keyup='generateSlug'>
                                                @error('name')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="example-number-input" class="col-form-label">Slug</label>
                                                <input class="form-control" type="text" wire:model="slug"
                                                    placeholder="Enter slug" readonly>
                                                @error('slug')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="col-md-2 col-form-label">Select Category</label>
                                                <div class="col-md-12">
                                                    <select class="form-select" wire:model='category_id'>
                                                        <option>Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option>{{ getCategoryID($category->id)->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('category_id')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-50">
                                                    {!! loadingStateWithText('updateData', 'Update SubCategory') !!}
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

        window.addEventListener('sub_category_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The sub-category has been deleted.",
                "success"
            );
        });
</script>
@endpush
