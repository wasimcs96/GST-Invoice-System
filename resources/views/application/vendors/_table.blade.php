<!-- @if($vendors->count() > 0)
    <div class="table-responsive">
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center w-30px">{{ __('messages.#id') }}</th>
                    <th>{{ __('messages.display_name') }}</th>
                    <th>{{ __('messages.contact_name') }}</th>
                    <th class="w-50px">{{ __('messages.expenses') }}</th>
                    <th class="text-center width: 120px;">{{ __('messages.created_at') }}</th>
                    <th class="w-50px">{{ __('messages.view') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="vendors">
                @foreach ($vendors as $vendor)
                    <tr>
                        <td>
                            <div class="badge badge-light">#{{ $vendor->id }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-primary">business</i>
                                    <a href="{{ route('vendors.details', ['vendor' => $vendor->id, 'company_uid' => $currentCompany->uid]) }}">{{ $vendor->display_name }}</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="material-icons icon-16pt mr-1">pin_drop</i>
                                    {{ $vendor->displayShortAddress('billing') }}
                                </small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-muted">person</i>
                                    <p class="text-muted mb-0">{{ $vendor->contact_name }}</p>
                                </div>
                            </div> 
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="material-icons icon-16pt mr-1">email</i>
                                    {{ $vendor->email }}
                                </small>
                            </div>
                            
                        </td>
                        <td class="text-center w-80px">
                            <i class="material-icons icon-16pt text-muted mr-1">monetization_on</i>
                            <a class="text-muted">{{ $vendor->expenses()->count() }}</a>
                        </td>
                        <td class="text-center"><i class="material-icons icon-16pt text-muted-light mr-1">today</i> {{ $vendor->created_at->format('Y-m-d') }}</td>
                        <td><a href="{{ route('vendors.details', ['vendor' => $vendor->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $vendors->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px" >local_shipping</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_vendors_yet') }}</p>
    </div>
@endif -->

<!-- Basic Tables start -->
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('messages.vendors') }}</h4>
                <a href="{{ route('vendors.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary ml-3 float-right"><i class="material-icons"></i> {{ __('messages.create_vendor') }}</a>
            </div>
            @if($vendors->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('messages.#id') }}</th>
                                <th>{{ __('messages.display_name') }}</th>
                                <th>{{ __('messages.contact_name') }}</th>
                                <th>{{ __('messages.expenses') }}</th>
                                <th>{{ __('messages.created_at') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($vendors as $vendor)
                                <tr>
                                    <td>
                                    {{ $vendor->id }}
                                    </td>
                                    <td><div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-primary">business</i>
                                    <a href="{{ route('vendors.details', ['vendor' => $vendor->id, 'company_uid' => $currentCompany->uid]) }}">{{ $vendor->display_name }}</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="material-icons icon-16pt mr-1">pin_drop</i>
                                    {{ $vendor->displayShortAddress('billing') }}
                                </small>
                            </div></td>
                                    <td>
                                    <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-muted">person</i>
                                    <p class="text-muted mb-0">{{ $vendor->contact_name }}</p>
                                </div>
                            </div> 
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="material-icons icon-16pt mr-1">email</i>
                                    {{ $vendor->email }}
                                </small>
                            </div>
                                    </td>
                                    <td>
                                    <i class="material-icons icon-16pt text-muted mr-1">monetization_on</i>
                            <a class="text-muted">{{ $vendor->expenses()->count() }}</a>
                                    </td>
                                    <td><i class="material-icons icon-16pt text-muted-light mr-1">today</i>
                                    {{ $vendor->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                href="{{ route('vendors.details', ['vendor' => $vendor->id, 'company_uid' => $currentCompany->uid]) }}">
                                                    <i data-feather="eye" class="mr-50"></i>
                                                    <span>Detail</span>
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
                {{ $vendors->links() }}
                </div>
            @else
                <div class="row justify-content-center card-body pb-0 pt-5">
                    <i class="material-icons fs-64px">local_shipping</i>
                </div>
                <div class="row justify-content-center card-body pb-5">
                    <p class="h4">{{ __('messages.no_vendors_yet') }}</p>
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