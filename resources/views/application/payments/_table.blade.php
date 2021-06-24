<!-- @if($payments->count() > 0)
    <div class="table-responsive">
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.payment_#') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ __('messages.customer') }}</th>
                    <th>{{ __('messages.payment_type') }}</th>
                    <th>{{ __('messages.invoice') }}</th>
                    <th>{{ __('messages.amount') }}</th>
                    <th class="w-50px">{{ __('messages.view') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="payments">
                @foreach ($payments as $payment)
                    <tr>
                        <td>
                            <a href="{{ route('payments.edit', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}">
                                {{ $payment->payment_number }}
                            </a>
                        </td>
                        <td>
                            {{ $payment->formatted_payment_date }}
                        </td>
                        <td>
                            {{ $payment->customer->display_name }}
                        </td>
                        <td>
                            {{ $payment->payment_method->name ?? "-"}}
                        </td>
                        <td>
                            {{ $payment->invoice->invoice_number ?? "-" }}
                        </td>
                        <td>
                            {!! money($payment->amount, $payment->currency_code) !!}
                        </td>
                        <td>
                            <a href="{{ route('payments.edit', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link">
                                <i class="material-icons icon-16pt">arrow_forward</i>
                            </a> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $payments->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">payment</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_payments_yet') }}</p>
    </div>
@endif -->

<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('messages.payments') }}</h4>
                <a href="{{ route('payments.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success ml-3 float-right"><i class="material-icons"></i> {{ __('messages.create_payment') }}</a>

            </div>
            @if ($payments->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>{{ __('messages.payment_#') }}</th>
                            <th>{{ __('messages.date') }}</th>
                            <th>{{ __('messages.customer') }}</th>
                            <th>{{ __('messages.payment_type') }}</th>
                            <th>{{ __('messages.invoice') }}</th>
                            <th>{{ __('messages.amount') }}</th>
                            <!-- <th class="w-50px">{{ __('messages.view') }}</th> -->
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                        <td>
                            <a href="{{ route('payments.edit', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}">
                                {{ $payment->payment_number }}
                            </a>
                        </td>
                        <td>
                            {{ $payment->formatted_payment_date }}
                        </td>
                        <td>
                            {{ $payment->customer->display_name }}
                        </td>
                        <td>
                            {{ $payment->payment_method->name ?? "-"}}
                        </td>
                        <td>
                            {{ $payment->invoice->invoice_number ?? "-" }}
                        </td>
                        <td>
                            {!! money($payment->amount, $payment->currency_code) !!}
                        </td>
                        <td>
                            <a href="{{ route('payments.edit', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link">
                                <i class="material-icons icon-16pt">arrow_forward</i>
                            </a> 
                        </td>
                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row card-body pagination-light justify-content-center text-center">
        {{ $payments->links() }}
    </div>
            @else
            <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">payment</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_payments_yet') }}</p>
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
