<!-- @if($invoices->count() > 0)
    <div class="table-responsive">
        <table class="table table-xl mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.invoice_number') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ __('messages.customer') }}</th>
                    <th>{{ __('messages.status') }}</th>
                    <th>{{ __('messages.paid_status') }}</th>
                    <th>{{ __('messages.amount_due') }}</th>
                    <th class="w-50px">{{ __('messages.view') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="invoices">
                @foreach ($invoices as $invoice)
                    <tr>
                        <td class="h6">
                            <a href="{{ route('invoices.details', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}">
                                {{ $invoice->invoice_number }}
                            </a>
                        </td>
                        <td class="h6">
                            {{ $invoice->formatted_invoice_date }}
                        </td>
                        <td class="h6">
                            {{ $invoice->customer->display_name }}
                        </td>
                        <td class="h6">
                            @if($invoice->status == 'DRAFT')
                                <div class="badge badge-dark fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'SENT')
                                <div class="badge badge-info fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'VIEWED')
                                <div class="badge badge-primary fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'OVERDUE')
                                <div class="badge badge-danger fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'COMPLETED')
                                <div class="badge badge-success fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @endif
                        </td>
                        <td class="h6">
                            @if($invoice->paid_status == 'UNPAID')
                                <div class="badge badge-warning fs-0-9rem">
                                    {{ $invoice->paid_status }}
                                </div>
                            @elseif($invoice->paid_status == 'PARTIALLY_PAID')
                                <div class="badge badge-info fs-0-9rem">
                                    {{ $invoice->paid_status }}
                                </div>
                            @elseif($invoice->paid_status == 'PAID')
                                <div class="badge badge-success fs-0-9rem">
                                    {{ $invoice->paid_status }}
                                </div>
                            @endif
                        </td>
                        <td class="h6">
                            {!! money($invoice->due_amount, $invoice->currency_code) !!}
                        </td>
                        <td class="h6">
                            <a href="{{ route('invoices.details', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link">
                                <i class="material-icons icon-16pt">arrow_forward</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $invoices->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">description</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_invoices_yet') }}</p>
    </div>
@endif -->



<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ __('messages.invoices') }}</h4>
        <a href="{{ route('export.invoice', ['company_uid' => $currentCompany->uid]) }}"
            class="btn btn-primary  ml-3 float-right"><i class="material-icons"></i>
            Bulk Upload</a>
        <a href="{{ route('invoices.create', ['company_uid' => $currentCompany->uid]) }}"
            class="btn btn-primary  ml-3 float-right"><i class="material-icons"></i>
            {{ __('messages.create_invoice') }}</a>

    </div>
    @if ($invoices->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('messages.invoice_number') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ __('messages.customer') }}</th>
                    <th>{{ __('messages.status') }}</th>
                    <th>{{ __('messages.paid_status') }}</th>
                    <th>{{ __('messages.amount_due') }}</th>
                    <!-- <th class="w-50px">{{ __('messages.view') }}</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="list" id="invoices">
                @foreach ($invoices as $invoice)
                <tr>
                    <td>
                        <a
                            href="{{ route('invoices.details', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}">
                            {{ $invoice->invoice_number }}
                        </a>
                    </td>
                    <td>
                        {{ $invoice->formatted_invoice_date }} </td>
                    <td>
                        {{ $invoice->customer->display_name }}
                    </td>
                    <td>
                            @if($invoice->status == 'DRAFT')
                                <div class="badge badge-dark fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'SENT')
                                <div class="badge badge-info fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'VIEWED')
                                <div class="badge badge-primary fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'OVERDUE')
                                <div class="badge badge-danger fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @elseif($invoice->status == 'COMPLETED')
                                <div class="badge badge-success fs-0-9rem">
                                    {{ $invoice->status }}
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($invoice->paid_status == 'UNPAID')
                                <div class="badge badge-warning fs-0-9rem">
                                    {{ $invoice->paid_status }}
                                </div>
                            @elseif($invoice->paid_status == 'PARTIALLY_PAID')
                                <div class="badge badge-info fs-0-9rem">
                                    {{ $invoice->paid_status }}
                                </div>
                            @elseif($invoice->paid_status == 'PAID')
                                <div class="badge badge-success fs-0-9rem">
                                    {{ $invoice->paid_status }}
                                </div>
                            @endif
                        </td>
                    <td>
                    {!! money($invoice->due_amount, $invoice->currency_code) !!}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                                <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu"> 
                            {{-- <a class="dropdown-item"
                            href="{{ route('invoices.details', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}">
                            <i data-feather="eye"></i>
                                    <span>Detail</span>
                                </a> --}}
                                <a class="dropdown-item"
                                href="{{ route('pdf.invoice', ['invoice' => $invoice->uid, 'download' => true]) }}">
                            <i data-feather="arrow-down"></i>
                                    <span>Download</span>
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
    {{ $invoices->links() }}
    </div>
    @else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">Description</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_invoices_yet') }}</p>
    </div>
    @endif
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