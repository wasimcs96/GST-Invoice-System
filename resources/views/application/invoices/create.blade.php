@extends('layouts.app', ['page' => 'invoices'])

@section('title', __('messages.create_invoice'))

@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a
                            href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.invoices') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create_invoice') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.create_invoice') }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('invoices.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
        @include('layouts._form_errors')
        @csrf

        @include('application.invoices._form')
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('customers.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('messages.customer_information') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="display_name">{{ __('messages.display_name') }}</label>
                                                    <input name="display_name" type="text" class="form-control"
                                                        placeholder="{{ __('messages.display_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="contact_name">{{ __('messages.contact_name') }}</label>
                                                    <input name="contact_name" type="text" class="form-control"
                                                        placeholder="{{ __('messages.contact_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email">{{ __('messages.email') }}</label>
                                                    <input name="email" type="email" class="form-control"
                                                        placeholder="{{ __('messages.email') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone">{{ __('messages.phone') }}</label>
                                                    <input name="phone" type="number" class="form-control"
                                                        placeholder="{{ __('messages.phone') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="currency_id">{{ __('messages.currency') }}</label>
                                                    <select name="currency_id" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible"
                                                        data-select2-id="currency_id">
                                                        <option disabled selected>
                                                            {{ __('messages.select_currency') }}</option>
                                                        @foreach (get_currencies_select2_array() as $option)
                                                            <option value="{{ $option['id'] }}">
                                                                {{ $option['text'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="website">{{ __('messages.website') }}</label>
                                                    <input name="website" type="url" class="form-control"
                                                        placeholder="{{ __('messages.website') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="vat_number">{{ __('messages.vat_number') }}</label>
                                                    <input name="vat_number" type="number" class="form-control"
                                                        placeholder="{{ __('messages.vat_number') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('messages.billing_address') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[name]">{{ __('messages.name') }}</label>
                                                    <input name="billing[name]" type="text" class="form-control"
                                                        placeholder="{{ __('messages.address_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[phone]">{{ __('messages.phone') }}</label>
                                                    <input name="billing[phone]" type="number" class="form-control"
                                                        placeholder="{{ __('messages.phone') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[country_id]">{{ __('messages.country') }}</label>
                                                    <select id="billing[country_id]" name="billing[country_id]"
                                                        data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible"
                                                        data-select2-id="billing[country_id]">
                                                        <option disabled selected>
                                                            {{ __('messages.select_country') }}</option>
                                                        @foreach (get_countries_select2_array() as $option)
                                                            <option value="{{ $option['id'] }}">
                                                                {{ $option['text'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[state]">{{ __('messages.state') }}</label>
                                                    <input name="billing[state]" type="text" class="form-control"
                                                        placeholder="{{ __('messages.state') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[city]">{{ __('messages.city') }}</label>
                                                    <input name="billing[city]" type="text" class="form-control"
                                                        placeholder="{{ __('messages.city') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[zip]">{{ __('messages.postal_code') }}</label>
                                                    <input name="billing[zip]" type="text" class="form-control"
                                                        placeholder="{{ __('messages.postal_code') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[address_1]">{{ __('messages.address') }}</label>
                                                    <textarea name="billing[address_1]" class="form-control" rows="2"
                                                        placeholder="{{ __('messages.address') }}"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('messages.shipping_address') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[name]">{{ __('messages.name') }}</label>
                                            <input name="shipping[name]" type="text" class="form-control"
                                                placeholder="{{ __('messages.address_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[phone]">{{ __('messages.phone') }}</label>
                                            <input name="shipping[phone]" type="number" class="form-control"
                                                placeholder="{{ __('messages.phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[country_id]">{{ __('messages.country') }}</label>
                                            <select id="shipping[country_id]" name="shipping[country_id]"
                                                data-toggle="select" class="form-control select2 select2-hidden-accessible"
                                                data-select2-id="shipping[country_id]">
                                                <option disabled selected>{{ __('messages.select_country') }}
                                                </option>
                                                @foreach (get_countries_select2_array() as $option)
                                                    <option value="{{ $option['id'] }}">
                                                        {{ $option['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[state]">{{ __('messages.state') }}</label>
                                            <input name="shipping[state]" type="text" class="form-control"
                                                placeholder="{{ __('messages.state') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[city]">{{ __('messages.city') }}</label>
                                            <input name="shipping[city]" type="text" class="form-control"
                                                placeholder="{{ __('messages.city') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[address_1]">{{ __('messages.address') }}</label>
                                            <textarea name="shipping[address_1]" class="form-control" rows="2"
                                                placeholder="{{ __('messages.address') }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!--Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                        method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('messages.product_information') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="{{ __('messages.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">

                                                <div class="form-group">
                                                    <label for="unit">{{ __('messages.unit') }}</label>

                                                    <select id="unit_id" class="select2 form-control" name="unit_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>{{ __('messages.select_unit') }}
                                                        </option>
                                                        @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}">{{ $option['text'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="price">{{ __('messages.price') }}</label>
                                                    <input name="price" type="text" class="form-control price_input"
                                                        placeholder="{{ __('messages.price') }}" autocomplete="off"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="price">{{ __('Taxes') }}</label>

                                                    <select id="taxess" class="select2 form-control" multiple="multiple"
                                                        id="default-select-multi">
                                                        @foreach (get_tax_types_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}"
                                                                data-percent="{{ $option['percent'] }}">
                                                                {{ $option['text'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('messages.description') }}</label>
                                                    <textarea name="description" class="form-control" cols="30"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--Tax Modal -->
    <div class="modal fade" id="taxModal" tabindex="-1" role="dialog" aria-labelledby="taxModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('settings.tax.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    <label for="name">{{ __('messages.name') }}</label>
                                    <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group required">
                                    <label for="percent">{{ __('messages.percent') }}</label>
                                    <input name="percent" type="number" class="form-control" placeholder="{{ __('messages.percent') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">{{ __('messages.description') }}</label>
                                    <textarea name="description" class="form-control" placeholder="{{ __('messages.description') }}" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page_head_scripts')

    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href={{ asset('theme/app-assets/css/pages/app-invoice.css') }}">
    <style>
        .select2-selection__arrow {
            display: none;
        }

    </style>

@endsection

{{-- @section('page_body_scripts')
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    @include('application.invoices._js')
    <script>
        $(document).ready(function() {
            $("#add_product_row").click(function() {
               console.log('hiiiii');
                addProductRow();
              });
            });
    </script>
@endsection --}}

@section('page_body_scripts')
    <script src="{{ asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    @include('application.invoices._js')
    <script>
        $(document).ready(function() {
            addProductRow();
        });
    </script>

    {{-- @include('application.estimates._js') --}}
    {{-- <script>
        $(document).ready(function() {
            $("#add_product_row").click(function() {
               console.log('hiiiii');
                addProductRow();
              });
              $(".priceListener").change(function() {
            calculateRowPrice()    
        });
            });
    </script> --}}
    <script>
        $('#total_tax').on('change', function() {
            if (this.value == "hell") {
                window.location =
                    '{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}';
                $("#taxes").trigger('click');
            }

        });
        //   $('#customer').on('change', function() {
        //     if (this.value == "hii") {
        //         window.location='{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}';
        //         $("#cust").trigger('click');
        //     }

        //   });
    </script>

    <script>
        $(document).ready(function() {
            var date = new Date();
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

            $('#datepicker1').datepicker({
                format: "mm/dd/yyyy",
                todayHighlight: true,
                startDate: today,
                endDate: end,
                autoclose: true
            });

            $('#datepicker1').datepicker('setDate', today);
        });
    </script>

@endsection
