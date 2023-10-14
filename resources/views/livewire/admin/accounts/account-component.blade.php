<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Accounts</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Accounts</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">All Accounts</h4>
                            <a href="{{ route('admin.private.accounts.create') }}"
                                class="btn btn-sm btn-dark waves-effect waves-light" style="float: right;"><i
                                    class="bx bx-plus"></i> Add Private
                                Accounts</a>
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
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">Name</th>
                                            <th class="align-middle">Email</th>
                                            <th class="align-middle">Phone</th>
                                            <th class="align-middle text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($accounts->count() > 0)
                                        @php
                                        $sl = $accounts->perPage() * $accounts->currentPage() - ($accounts->perPage() -
                                        1);
                                        @endphp
                                        @foreach ($accounts as $account)
                                        <tr>
                                            <td>{{ $sl++ }}</td>
                                            <td>
                                                <img src="{{ asset($account->avatar) }}" style="height: 30px;"
                                                    class="img-fluid" alt="">
                                                {{ $account->first_name }} {{ $account->last_name }}
                                            </td>
                                            <td>{{ $account->email }}</td>
                                            <td>{{ $account->phone }}</td>
                                            <td class="text-center">
                                                <a href="#"
                                                    class="btn btn-sm btn-soft-success waves-effect waves-light action-btn edit_btn">
                                                    <i class="mdi mdi-eye-outline font-size-13 align-middle"></i>
                                                </a>
                                                <a href="{{ route('admin.professional.accounts.edit', ['id' => $account->id]) }}"
                                                    class="btn btn-sm btn-soft-primary waves-effect waves-light action-btn edit_btn">
                                                    <i class="mdi mdi-square-edit-outline font-size-13 align-middle"></i>
                                                </a>

                                                <button
                                                    class="btn btn-sm btn-soft-danger waves-effect waves-light action-btn delete_btn"
                                                    wire:click.prevent='deleteConfirmation({{ $account->id }})'
                                                    wire:loading.attr='disabled'>
                                                    <i class="bx bx-trash font-size-13 align-middle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center pt-5 pb-5">No account found!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            {{ $accounts->links('livewire.pagination-links') }}
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

        window.addEventListener('admin_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The admin has been deleted.",
                "success"
            );
        });
</script>
@endpush