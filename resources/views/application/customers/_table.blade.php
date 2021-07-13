<!-- @if($customers->count() > 0)
    <div class="table-responsive">
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="w-30px" class="text-center">{{ __('messages.#id') }}</th>
                    <th>{{ __('messages.display_name') }}</th>
                    <th>{{ __('messages.contact_name') }}</th>
                    <th class="w-50px">{{ __('messages.invoices') }}</th>
                    <th class="text-center">{{ __('messages.amount_due') }}</th>
                    <th class="text-center width: 120px;">{{ __('messages.created_at') }}</th>
                    <th class="w-50px">{{ __('messages.view') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="customers">
                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            <div class="badge badge-light">#{{ $customer->id }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-primary">business</i>
                                    <a href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}">{{ $customer->display_name }}</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="material-icons icon-16pt mr-1">pin_drop</i>
                                    {{ $customer->displayShortAddress('billing') }}
                                </small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-muted">person</i>
                                    <p class="text-muted mb-0">{{ $customer->contact_name }}</p>
                                </div>
                            </div> 
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="material-icons icon-16pt mr-1">email</i>
                                    {{ $customer->email }}
                                </small>
                            </div>
                            
                        </td>
                        <td class="w-80px" class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">receipt</i>
                            <a class="text-muted">{{ $customer->invoices()->count() }}</a>
                        </td>
                        <td class="text-center">
                            <strong>{!! money($customer->invoice_due_amount, $customer->currency_code) !!}</strong>
                        </td>
                        <td class="text-center"><i class="material-icons icon-16pt text-muted-light mr-1">today</i> {{ $customer->created_at->format('Y-m-d') }}</td>
                        <td><a href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $customers->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">account_box</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_customers_yet') }}</p>
    </div>
@endif -->

<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('messages.customers') }}</h4>
                <a href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary  ml-3 float-right"><i class="material-icons"></i> {{ __('messages.create_customer') }}</a>
            </div>
            @if ($customers->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('messages.#id') }}</th>
                                <th>{{ __('messages.display_name') }}</th>
                                <th>{{ __('messages.contact_name') }}</th>
                                <th>{{ __('messages.invoices') }}</th>
                                <th>{{ __('messages.amount_due') }}</th>
                                <th>{{ __('messages.created_at') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                    {{ $customer->id }}
                                    </td>
                                    
                                    <td>
                                    <a href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}">{{ $customer->display_name }}</a>
                                                <p>{{ $customer->displayShortAddress('billing') }}</p>
                            
                            </td>
                                    <td>
                                   
                                  <p>  {{ $customer->contact_name }}</p>
                                
                            
                                  <p>   {{ $customer->email }}</p>
                           
                                    </td>
                                    <td>
                                   
                            <a class="text-muted">{{ $customer->invoices()->count() }}</a>
                                    </td>
                                    <td>
                                   {!! money($customer->invoice_due_amount, $customer->currency_code) !!}
                                    </td>
                                    <td><i class="material-icons icon-16pt text-muted-light mr-1">today</i>
                                    {{ $customer->created_at->format('Y-m-d') }}</td>
                                   
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu"> 
                                            <a class="dropdown-item"
                                            href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}">
                                            <i data-feather="eye"></i>
                                                    <span>Detail</span>
                                                </a>

                                            <!-- <a href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row card-body pagination-light justify-content-center text-center">
                    {{ $customers->links() }}
                </div>
            @else
                <div class="row justify-content-center card-body pb-0 pt-5">
                <i class="material-icons fs-64px">account_box</i>
                </div>
                <div class="row justify-content-center card-body pb-5">
                <p class="h4">{{ __('messages.no_customers_yet') }}</p>
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
