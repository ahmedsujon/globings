<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Articles</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Articles</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">All Articles</h4>
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
                                        @if ($articles->count() > 0)
                                        @php
                                        $sl = $articles->perPage() * $articles->currentPage() -
                                        ($articles->perPage() - 1);
                                        @endphp
                                        @foreach ($articles as $article)
                                        <tr>
                                            <td class="text-center">{{ $sl++ }}</td>
                                            <td>
                                                <img src="{{ asset('assets/images/article_icons') }}/{{ $article->avatar }}" style="height: 30px;"
                                                    class="img-fluid" alt="">
                                                {{ $article->name }}
                                            </td>
                                            <td class="text-center">{{ $article->slug }}</td>
                                            <td class="text-center" style="width: 15%;">
                                                @if ($article->status == 0)
                                                <button class="btn btn-xs btn-danger"
                                                    wire:click.prevent='changeStatus({{ $article->id }})'
                                                    style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!!
                                                    loadingStateStatus('changeStatus(' . $article->id . ')', 'In-Active')
                                                    !!}</button>
                                                @else
                                                <button class="btn btn-xs btn-success"
                                                    wire:click.prevent='changeStatus({{ $article->id }})'
                                                    style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!!
                                                    loadingStateStatus('changeStatus(' . $article->id . ')', 'Active') !!}</button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-sm btn-soft-primary waves-effect waves-light action-btn edit_btn"
                                                    wire:click.prevent='editData({{ $article->id }})'
                                                    wire:loading.attr='disabled'>
                                                    <i
                                                        class="mdi mdi-square-edit-outline font-size-13 align-middle"></i>
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-soft-danger waves-effect waves-light action-btn delete_btn"
                                                    wire:click.prevent='deleteConfirmation({{ $article->id }})'
                                                    wire:loading.attr='disabled'>
                                                    <i class="bx bx-trash font-size-13 align-middle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center pt-5 pb-5">No article found!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            {{ $articles->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Data Modal -->
            {{-- <div wire:ignore.self class="modal fade" id="addDataModal" tabindex="-1" role="dialog"
                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modelTitleId">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: white;">
                            <h5 class="modal-title m-0" id="mySmallModalLabel">Add New Admin</h5>
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
                                                <label for="example-number-input" class="col-form-label">Category Icon</label>
                                                <input type="file" class="form-control" wire:model='avatar' />
                                                @error('avatar')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                @enderror

                                                <div wire:loading wire:target='avatar' wire:key='avatar'>
                                                    <span class="spinner-border spinner-border-xs" role="status"
                                                        aria-hidden="true"></span> <small>Uploading</small>
                                                </div>
                                                @if ($avatar)
                                                <img src="{{ $avatar->temporaryUrl() }}" class="img-fluid mt-2"
                                                    style="height: 55px; width: 55px;" />
                                                @elseif ($uploadedAvatar)
                                                <img src="{{ asset($uploadedAvatar) }}" class="img-fluid mt-2"
                                                    style="height: 55px; width: 55px;" />
                                                @endif
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-50">
                                                    {!! loadingStateWithText('storeData', 'Add Category') !!}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Edit Data Modal -->
            {{-- <div wire:ignore.self class="modal fade" id="editDataModal" tabindex="-1" role="dialog"
                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modelTitleId">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: white;">
                            <h5 class="modal-title m-0" id="mySmallModalLabel">Edit Category</h5>
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
                                                <label for="example-number-input" class="col-form-label">Category Icon</label>
                                                <input type="file" class="form-control" wire:model='avatar' />
                                                @error('avatar')
                                                <span class="text-danger" style="font-size: 11.5px;">{{ $message
                                                    }}</span>
                                                @enderror

                                                <div wire:loading wire:target='avatar' wire:key='avatar'>
                                                    <span class="spinner-border spinner-border-xs" role="status"
                                                        aria-hidden="true"></span> <small>Uploading</small>
                                                </div>
                                                @if ($avatar)
                                                <img src="{{ $avatar->temporaryUrl() }}" class="img-fluid mt-2"
                                                    style="height: 55px; width: 55px;" />
                                                @elseif ($uploadedAvatar)
                                                <img src="{{ asset($uploadedAvatar) }}" class="img-fluid mt-2"
                                                    style="height: 55px; width: 55px;" />
                                                @endif
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-50">
                                                    {!! loadingStateWithText('updateData', 'Update Category') !!}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

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

        window.addEventListener('category_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The category has been deleted.",
                "success"
            );
        });
</script>
@endpush