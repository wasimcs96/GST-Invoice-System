<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ledger</h4>
            <a href="{{ route('ledgers.create', ['company_uid' => $currentCompany->uid]) }}"
                class="btn btn-primary  ml-3 float-right"><i data-feather="plus"></i>
                Add Account</a>

        </div>
        @if ($expenses->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center w-30px">{{ __('messages.#id') }}</th>
                        <th>{{ __('messages.category') }}</th>
                        <th>{{ __('messages.date') }}</th>
                        <th>{{ __('messages.note') }}</th>
                        <th>{{ __('messages.amount') }}</th>
                        <!-- <th class="w-50px">{{ __('messages.view') }}</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                    <tr>
                        <td>
                            <a
                                href="{{ route('ledgers.edit', ['ledger' => $expense->id, 'company_uid' => $currentCompany->uid]) }}">
                                #{{ $expense->id }}
                            </a>
                        </td>
                        <td>
                            <a
                                href="{{ route('ledgers.edit', ['ledger' => $expense->id, 'company_uid' => $currentCompany->uid]) }}">
                                <strong class="h6">
                                    {{ $expense->category->name ?? '-' }}
                                </strong>
                            </a>
                        </td>
                        <td>
                            {{ $expense->formatted_expense_date }}
                        </td>
                        <td>
                            {{ $expense->notes ?? '-' }}
                        </td>
                        <td>
                            {!! money($expense->amount, $expense->currency_code) !!}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu"> 
                                <a class="dropdown-item"
                                href="{{ route('ledgers.edit', ['ledger' => $expense->id, 'company_uid' => $currentCompany->uid]) }}">
                                <i data-feather="edit-2"></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item"
                                    href="{{ route('ledgers.delete', ['ledger' => $expense->id, 'company_uid' => $currentCompany->uid]) }}">
                                <i data-feather="trash"></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row card-body pagination-light justify-content-center text-center">
            {{ $expenses->links() }}
        </div>
        @else
    
        <div class="row justify-content-center card-body pb-5">
            <p class="h4">no ledgers yet</p>
        </div>
        @endif
    </div>
</div>
</div>
<!-- Basic Tables end -->
@section('page_head_scripts')
<link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('theme/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('theme/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('theme/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('theme/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('theme/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css"
    href="{{ asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<!-- END: Page CSS-->
@endsection

@section('page_body_scripts')
<!-- BEGIN: Page JS-->
<script src="{{ asset('theme/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
<!-- END: Page JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->
@endsection