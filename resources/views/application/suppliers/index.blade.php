@extends('layouts.app', ['page' => 'suppliers'])

@section('title', 'Supplier')
    
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Supplier</li>
                </ol>
            </nav>
            <h1 class="m-0">Supplier</h1>
        </div>
        <a href="{{ route('suppliers.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success ml-3"><i class="material-icons"></i>Create Supplier</a>
    </div>
@endsection

@section('content')
    @include('application.suppliers.filters')

    <div class="card">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Supplier</h4>
                        <a href="{{ route('suppliers.create', ['company_uid' => $currentCompany->uid]) }}"
                            class="btn btn-primary  ml-3 float-right"><i class="material-icons"></i>
                            Create Supplier</a>
                    </div>
                    @if ($suppliers->count() > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.#id') }}</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $key=>$supplier)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $supplier->name ?? '' }}</td>
                                    <td> {{ $supplier->email ?? '' }}</td>
                                    <td>{{ $supplier->company ?? '' }}</td>
                                    <td>{{ $supplier->phone ?? '' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu"> 
                                            <a class="dropdown-item"
                                            href="{{ route('suppliers.edit', ['supplier' => $supplier->id, 'company_uid' => $currentCompany->uid]) }}">
                                            <i data-feather="edit-2"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item"
                                                href="{{ route('suppliers.delete', ['supplier' => $supplier->id, 'company_uid' => $currentCompany->uid]) }}">
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
                    {{-- <div class="row card-body pagination-light justify-content-center text-center">
                        {{ $suppliers->links() }}
                    </div> --}}
                    @else
                    {{-- <div class="row justify-content-center card-body pb-0 pt-5">
                        <i class="material-icons fs-64px">store</i>
                    </div> --}}
                    <div class="row justify-content-center card-body pb-5">
                        <p class="h4">No suppliers</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

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
