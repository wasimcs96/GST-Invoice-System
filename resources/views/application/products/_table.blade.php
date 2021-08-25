<!-- @if($products->count() > 0)
    <div class="table-responsive" data-toggle="lists">
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center w-30px">{{ __('messages.#id') }}</th>
                    <th>{{ __('messages.product') }}</th>
                    <th>{{ __('messages.unit') }}</th>
                    <th class="text-center">{{ __('messages.price') }}</th>
                    <th class="text-center width: 120px;">{{ __('messages.created_at') }}</th>
                    <th class="w-50px">{{ __('messages.view') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="products">
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <div class="badge badge-light">
                                <a class="mb-0" href="{{ route('products.edit', ['product' => $product->id, 'company_uid' => $currentCompany->uid]) }}">
                                    #{{ $product->id }}
                                </a>
                            </div>
                        </td>
                        <td>
                            <a  class="h6 mb-0" href="{{ route('products.edit', ['product' => $product->id, 'company_uid' => $currentCompany->uid]) }}">
                                <strong>{{ $product->name }}</strong>
                            </a>
                        </td>
                        <td class="text-center w-80px">
                            {{ $product->unit->name ?? '-' }}
                        </td>
                        <td class="text-center w-80px">
                            {!! money($product->price, $product->currency_code) !!}
                        </td>
                        <td class="text-center">
                            {{ $product->formatted_created_at }}
                        </td>
                        <td>
                            <a href="{{ route('products.edit', ['product' => $product->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link">
                                <i class="material-icons icon-16pt">arrow_forward</i>
                            </a> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $products->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">store</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_products_yet') }}</p>
    </div>
@endif -->


<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('messages.products') }}</h4>
                <a  data-toggle="modal" data-target="#addProduct" 
                    class="btn btn-primary  ml-3 float-right"><i class="material-icons"></i>
                    {{ __('messages.create_product') }}</a>
            </div>
            @if ($products->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('messages.#id') }}</th>
                            <th>{{ __('messages.product') }}</th>
                            <th>{{ __('messages.unit') }}</th>
                            <th>{{ __('messages.price') }}</th>
                            <th>{{ __('messages.created_at') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <a class="mb-0"
                                    href="{{ route('products.edit', ['product' => $product->id, 'company_uid' => $currentCompany->uid]) }}">
                                    {{ $product->id }}
                                </a>
                            </td>

                            <td>
                                <a class="h6 mb-0"
                                    href="{{ route('products.edit', ['product' => $product->id, 'company_uid' => $currentCompany->uid]) }}">
                                    <strong>{{ $product->name }}</strong>
                                </a>
                            </td>
                            <td>

                                {{ $product->unit->name ?? '-' }}
                            </td>
                            <td>
                                {!! money($product->price, $product->currency_code) !!}

                            </td>
                            <td>

                                {{ $product->formatted_created_at }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow"
                                        data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('products.edit', ['product' => $product->id, 'company_uid' => $currentCompany->uid]) }}">
                                            <i data-feather="edit-2"></i>
                                            <span>Edit</span>
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
                {{ $products->links() }}
            </div>
            @else
            {{-- <div class="row justify-content-center card-body pb-0 pt-5">
                <i class="material-icons fs-64px">store</i>
            </div> --}}
            <div class="row justify-content-center card-body pb-5">
                <p class="h4">{{ __('messages.no_products_yet') }}</p>
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