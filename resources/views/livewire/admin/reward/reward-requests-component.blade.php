<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Bings Convert Requests</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Bings Convert Requests</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">All Bings Convert Requests</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                                    <label class="font-weight-normal" style="">Show</label>
                                    <select name="sortuserresults" class="sinput" id=""
                                        wire:model="sortingValue" wire:change='resetPage'>
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
                                            <th class="align-middle">Phone</th>
                                            <th class="align-middle text-center">Email</th>
                                            <th class="align-middle text-center">Request Amount</th>
                                            <th class="align-middle text-center">Current Bings Balance</th>
                                            <th class="align-middle text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($reward_requests->count() > 0)
                                            @php
                                                $sl = $reward_requests->perPage() * $reward_requests->currentPage() - ($reward_requests->perPage() - 1);
                                            @endphp
                                            @foreach ($reward_requests as $reward_request)
                                                <tr>
                                                    <td class="text-center">{{ $sl++ }}</td>
                                                    <td>
                                                        {{ getUserByID($reward_request->user_id)->first_name }}
                                                        {{ getUserByID($reward_request->user_id)->last_name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ getUserByID($reward_request->user_id)->phone }}</td>
                                                    <td class="text-center">
                                                        {{ getUserByID($reward_request->user_id)->email }}</td>
                                                    <td class="text-center">€{{ $reward_request->amount }}</td>
                                                    <td class="text-center">
                                                        {{ getUserByID($reward_request->user_id)->bings_balance }} Bings
                                                    </td>
                                                    <td class="text-center" style="width: 15%;">
                                                        @if ($reward_request->status == 0)
                                                            <button class="btn btn-xs btn-danger"
                                                                wire:click.prevent='changeStatus({{ $reward_request->id }})'
                                                                style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!! loadingStateStatus('changeStatus(' . $reward_request->id . ')', 'Pending') !!}</button>
                                                        @else
                                                            <button class="btn btn-xs btn-success"
                                                                wire:click.prevent='changeStatus({{ $reward_request->id }})'
                                                                style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!! loadingStateStatus('changeStatus(' . $reward_request->id . ')', 'Approved') !!}</button>
                                                        @endif
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
                        </div>
                        <div class="card-footer bg-white">
                            {{ $reward_requests->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
@endpush
