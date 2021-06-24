{{-- @if($orders->count() > 0)
    <div class="table-responsive">
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="w-30px" class="text-center">{{ __('messages.order_id') }}</th>
                    <th>{{ __('messages.transaction_id') }}</th>
                    <th>{{ __('messages.user') }}</th>
                    <th>{{ __('messages.plan') }}</th>
                    <th>{{ __('messages.price') }}</th>
                    <th>{{ __('messages.payment_type') }}</th>
                    <th>{{ __('messages.created_at') }}</th>
                </tr> 
            </thead> 
            <tbody class="list" id="orders">
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <p class="mb-0">{{ $order->order_id }}</p>
                        </td>
                        <td>
                            <p class="mb-0">{{ $order->transaction_id }}</p>
                        </td>
                        <td>
                            @if($order->company)
                                <a class="mb-0" href="{{ route('super_admin.users.edit', $order->company->owner->id) }}">{{ $order->company->owner->full_name }}</a>
                            @else
                                <a class="mb-0">-</a>
                            @endif
                        </td>
                        <td>
                            @if($order->plan)
                                <a class="mb-0" href="{{ route('super_admin.plans.edit', $order->plan->id) }}">{{ $order->plan->name ?? '-' }}</a>
                            @else
                                <a class="mb-0">-</a>
                            @endif
                        </td>
                        <td>
                            <p class="mb-0">{!! money($order->price, $order->currency) !!}</p>
                        </td>
                        <td>
                            {{ $order->payment_type }} 
                        </td>
                        <td class="text-center"><i class="material-icons icon-16pt text-muted-light mr-1">today</i> {{ $order->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(method_exists($orders, 'links'))
        <div class="row card-body pagination-light justify-content-center text-center">
            {{ $orders->links() }}
        </div>
    @endif
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">account_box</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_orders_yet') }}</p>
    </div>
@endif --}}

<!-- Basic Tables start -->
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('messages.orders') }}</h4>
                {{-- <a href="{{ route('super_admin.users.create') }}" class="btn btn-success ml-3 float-right"><i class="material-icons"></i> {{ __('messages.add_user') }}</a> --}}
            </div>
            @if($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('messages.order_id') }}</th>
                                <th>{{ __('messages.transaction_id') }}</th>
                                <th>{{ __('messages.user') }}</th>
                                <th>{{ __('messages.plan') }}</th>
                                <th>{{ __('messages.price') }}</th>
                                <th>{{ __('messages.payment_type') }}</th>
                                <th>{{ __('messages.created_at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->order_id }}
                                    </td>
                                    <td>{{ $order->transaction_id }}</td>
                                    <td>
                                        @if($order->company)
                                            <a class="mb-0" href="{{ route('super_admin.users.edit', $order->company->owner->id) }}">{{ $order->company->owner->full_name }}</a>
                                        @else
                                            <a class="mb-0">-</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->plan)
                                            <a class="mb-0" href="{{ route('super_admin.plans.edit', $order->plan->id) }}">{{ $order->plan->name ?? '-' }}</a>
                                        @else
                                            <a class="mb-0">-</a>
                                        @endif
                                    </td>
                                    <td>
                                        {!! money($order->price, $order->currency) !!}
                                    </td>
                                    <td>
                                        {{ $order->payment_type }} 
                                    </td>
                                    <td><i class="material-icons icon-16pt text-muted-light mr-1">today</i>
                                        {{ $order->created_at->format('Y-m-d') }}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                @if(method_exists($orders, 'links'))
                <div class="row card-body pagination-light justify-content-center text-center">
                    {{ $orders->links() }}
                </div>
            @endif
        @else
            <div class="row justify-content-center card-body pb-0 pt-5">
                <i class="material-icons fs-64px">account_box</i>
            </div>
            <div class="row justify-content-center card-body pb-5">
                <p class="h4">{{ __('messages.no_orders_yet') }}</p>
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
