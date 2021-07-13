{{-- @if ($users->count() > 0)
    <div class="table-responsive">
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="w-30px" class="text-center">{{ __('messages.#id') }}</th>
                    <th>{{ __('messages.company') }}</th>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.subscribed_to') }}</th>
                    <th>{{ __('messages.role') }}</th>
                    <th class="text-center width: 120px;">{{ __('messages.created_at') }}</th>
                    <th class="w-50px">{{ __('messages.edit') }}</th>
                </tr> 
            </thead>
            <tbody class="list" id="users">
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <div class="badge">#{{ $user->id }}</div>
                        </td>
                        <td> 
                            <p class="mb-0">{{ $user->currentCompany()->name }}</p>
                        </td>
                        <td>
                            <p class="mb-0">{{ $user->full_name }}</p>
                        </td>
                        <td>
                            <p class="mb-0">{{ $user->email }}</p>
                        </td>
                        <td>
                            @if ($user->currentSubscriptionPlan())
                                <a class="mb-0" href="{{ route('super_admin.plans.edit', $user->currentSubscriptionPlan()->id) }}">{{ $user->currentSubscriptionPlan()->name }}</a>
                            @else
                                <a class="mb-0">-</a>
                            @endif
                        </td>
                        <td>
                            @if ($user->hasRole('super_admin'))
                                <p class="mb-0">{{ __('messages.super_admin') }}</p>
                            @elseif($user->hasRole('admin'))
                                <p class="mb-0">{{ __('messages.admin') }}</p>
                            @elseif($user->hasRole('staff'))
                                <p class="mb-0">{{ __('messages.staff') }}</p>
                            @endif
                        </td>
                        <td class="text-center"><i class="material-icons icon-16pt text-muted-light mr-1">today</i> {{ $user->created_at->format('Y-m-d') }}</td>
                        <td><a href="{{ route('super_admin.users.edit', $user->id) }}" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $users->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">account_box</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_users_yet') }}</p>
    </div>
@endif --}}

<!-- Basic Tables start -->
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
                <a href="{{ route('super_admin.users.create') }}" class="btn btn-primary ml-3 float-right"><i class="material-icons"></i> {{ __('messages.add_user') }}</a>
            </div>
            @if ($users->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('messages.#id') }}</th>
                                <th>{{ __('messages.company') }}</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.email') }}</th>
                                <th>{{ __('messages.subscribed_to') }}</th>
                                <th>{{ __('messages.role') }}</th>
                                <th>{{ __('messages.created_at') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>{{ $user->currentCompany()->name }}</td>
                                    <td>
                                        {{ $user->full_name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        @if ($user->currentSubscriptionPlan())
                                            <a class="mb-0"
                                                href="{{ route('super_admin.plans.edit', $user->currentSubscriptionPlan()->id) }}">{{ $user->currentSubscriptionPlan()->name }}</a>
                                        @else
                                            <a class="mb-0">-</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->hasRole('super_admin'))
                                            <p class="mb-0">{{ __('messages.super_admin') }}</p>
                                        @elseif($user->hasRole('admin'))
                                            <p class="mb-0">{{ __('messages.admin') }}</p>
                                        @elseif($user->hasRole('staff'))
                                            <p class="mb-0">{{ __('messages.staff') }}</p>
                                        @endif
                                    </td>
                                    <td><i class="material-icons icon-16pt text-muted-light mr-1">today</i>
                                        {{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('super_admin.users.edit', $user->id) }}">
                                                    <i data-feather="edit-2"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item"
                                                href="{{ route('super_admin.users.delete', $user->id) }}">
                                                <i data-feather="trash"></i>
                                                    <span>{{ __('messages.delete_user') }}</span>
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
                    {{ $users->links() }}
                </div>
            @else
                <div class="row justify-content-center card-body pb-0 pt-5">
                    <i class="material-icons fs-64px">account_box</i>
                </div>
                <div class="row justify-content-center card-body pb-5">
                    <p class="h4">{{ __('messages.no_users_yet') }}</p>
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
