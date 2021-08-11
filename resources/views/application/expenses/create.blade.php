@extends('layouts.app', ['page' => 'expenses'])

@section('title', __('messages.create_expense'))
 
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.expenses') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create_expense') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.create_expense') }}</h1>
        </div>
    </div>
@endsection

@section('content')
<form action="{{ route('expenses.store', ['company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf

        @include('application.expenses._form')
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
                    <form action="{{ route('customers.estimate.store', ['company_uid' => $currentCompany->uid]) }}"
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
                                                <div class="form-group required">
                                                    <label for="display_name">{{ __('messages.display_name') }}</label>
                                                    <input name="display_name" id="display_name" type="text"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.display_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="contact_name">{{ __('messages.contact_name') }}</label>
                                                    <input name="contact_name" id="contact_name" type="text"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.contact_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="email">{{ __('messages.email') }}</label>
                                                    <input name="email" id="email" type="email" class="form-control"
                                                        placeholder="{{ __('messages.email') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone">{{ __('messages.phone') }}</label>
                                                    <input name="phone" id="phone" type="number" class="form-control"
                                                        placeholder="{{ __('messages.phone') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="currency_id">{{ __('messages.currency') }}</label>
                                                    <select name="currency_id" id="currency_id" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible"
                                                        data-select2-id="currency_id" required>
                                                        <option disabled selected>{{ __('messages.select_currency') }}
                                                        </option>
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
                                                    <input name="website" id="website" type="url" class="form-control"
                                                        placeholder="{{ __('messages.website') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="gst_type">GST registration type</label>
                                                    <select name="gst_type" id="gst_type" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible" data-select2-id="gst_type"
                                                        required>
                                                            <option value="0">GST registered- Regular</option>
                                                            <option value="1">GST registered- Composition</option>
                                                            <option value="2">GST unregistered</option>
                                                            <option value="3" selected>Consumer</option>
                                                            <option value="4">Overseas</option>
                                                            <option value="5">SEZ</option>
                                                            <option value="6">Deemed exports- EOU's, STP's EHTP's etc</option>
                    
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="vat_number">GST Number</label>
                                                    <input name="vat_number" id="vat_number" type="text"
                                                        class="form-control" placeholder="GST Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Billing Address</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="billing[name]">{{ __('messages.name') }}</label>
                                                    <input name="billing[name]" id="billing_name" type="text"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.address_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="billing[country_id]">{{ __('messages.country') }}</label>
                                                    <select id="billing_country_id" name="billing[country_id]"
                                                        data-toggle="select" class="form-control select2 select2-hidden-accessible"
                                                        data-select2-id="billing[country_id]" required>
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
                                                <div class="form-group required">
                                                    <label for="billing[state]">{{ __('messages.state') }}</label>
                                                    <select id="billing_state" name="billing[state]" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible oi"
                                                        data-select2-id="billing[state]" required>
                                                        <option disabled selected>Select state</option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="billing[city]">{{ __('messages.city') }}</label>
                                                    <select name="billing[city]" id="billing_city" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible"
                                                        data-select2-id="billing[city]" required>
                                                        <option disabled selected>Select city</option>
                                                        {{-- @foreach ($citie as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach --}}

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[zip]">{{ __('messages.postal_code') }}</label>
                                                    <input name="billing[zip]" id="billing_zip" type="text"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.postal_code') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="billing[address_1]">{{ __('messages.address') }}</label>
                                                    <textarea name="billing[address_1]" id="billing_address"
                                                        class="form-control" rows="2"
                                                        placeholder="{{ __('messages.address') }}"
                                                        required></textarea>
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
                                            <input name="shipping[name]" id="shipping_name" type="text" class="form-control"
                                                placeholder="{{ __('messages.address_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[country_id]">{{ __('messages.country') }}</label>
                                            <select id="shipping_country_id" name="shipping[country_id]"
                                                data-toggle="select" class="form-control select2 select2-hidden-accessible"
                                                data-select2-id="shipping[country_id]">
                                                <option disabled selected>{{ __('messages.select_country') }}</option>
                                                @foreach (get_countries_select2_array() as $option)
                                                    <option value="{{ $option['id'] }}">
                                                        {{ $option['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group required">
                                            <label for="billing[state]">{{ __('messages.state') }}</label>
                                            {{-- <select id="billing[state]" name="billing[state]" data-toggle="select"
                                                class="form-control select2-hidden-accessible oi" data-select2-id="billing[state]"
                                                required> --}}
                                            <select id="shipping_state" name="shipping[state]" data-toggle="select"
                                                class="form-control select2 select2-hidden-accessible oi"
                                                data-select2-id="billing[state]" required>
                                                <option disabled selected>Select state</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label for="billing[city]">{{ __('messages.city') }}</label>
                                            <select name="shipping[city]" id="shipping_city" data-toggle="select"
                                                class="form-control select2 select2-hidden-accessible"
                                                data-select2-id="billing[city]" required>
                                                <option disabled selected>Select city</option>
                                                {{-- @foreach ($citie as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach --}}

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="billing[zip]">{{ __('messages.postal_code') }}</label>
                                            <input name="shipping[zip]" id="shipping_zip" type="text" class="form-control"
                                                placeholder="{{ __('messages.postal_code') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[address_1]">{{ __('messages.address') }}</label>
                                            <textarea name="shipping[address_1]" id="shipping_address" class="form-control"
                                                rows="2"
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.estimate.store', ['company_uid' => $currentCompany->uid]) }}"
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
                                                <label>{{ __('messages.receipt') }}</label><br>
                                                <input type="file" onchange="changePreview(this);" class="d-none"
                                                    name="image" id="image">
                                                <label for="image">
                                                    <div class="media align-items-center">
                                                        <div class="mr-3">
                                                            <div class="avatar avatar-xl">
                                                                <img id="file-prev" class="avatar-img rounded">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <a
                                                                class="btn btn-sm btn-primary choose-button">{{ __('messages.choose_file') }}</a>
                                                        </div>
                                                    </div>
                                                </label><br>
                                                {{-- @if ($product->image)
                                                    <a href="{{ asset($product->image) }}" target="_blank"
                                                        class="btn btn-sm btn-info text-white choose-button">{{ __('messages.download_receipt') }}</a>
                                                    @endif --}}
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">SKU</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="Enter a SKU" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="{{ __('messages.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="unit">Category</label>
                    
                                                    <select id="category_id" class="select2 form-control" name="category_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                        <option value="cate" id="dd" style="color: blue;"> <a  data-toggle="modal" data-target="#categorymodal" id="cato"
                                                             class="font-weight-300">+
                                                               Add new Category</a></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">HSN Code</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="Enter a valid HSN code" required>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Tax</h5>
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
        href="{{ asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/pages/app-invoice.css') }}">
    <style>
        .select2-selection__arrow {
            display: none;
        }

    </style>

@endsection

@section('page_body_scripts')
    <script src="{{ asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    @include('application.estimates._js')
    <script>
        $(document).ready(function() {
            $("#add_product_row").click(function() {
                console.log('hiiiii');
                addProductRow();
            });
            $(".priceListener").change(function() {
                calculateRowPrice()
            });
        });
    </script>
    <script>
        $('#total_taxes').on('change', function() {
            if (this.value == "hyy") {
                window.location =
                    '{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}';
                $("#tax").trigger('click');
            }

        });
        $('#customer').on('change', function() {
            if (this.value == "hii") {
                window.location = '{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}';
                $("#cust").trigger('click');
            }

        });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.oi').on('change', function() {

            var stateID = $(this).val();
            console.log(stateID);
            console.log("s")
            if (stateID) {
                console.log("s")

                $.ajax({
                    url: "{{ route('application.customer.city') }}",
                    type: "GET",
                    data: {
                        id: stateID
                    },
                    success: function(data) {
                        //    console.log(data);

                        $('select[name="billing[city]"]').empty();
                        $.each(data, function(key, value) {
                            // console.log(value.name);
                            $('select[name="billing[city]"]').append(
                                '<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                        $('select[name="shipping[city]"]').empty();
                        $.each(data, function(key, value) {
                            // console.log(value.name);
                            $('select[name="shipping[city]"]').append(
                                '<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });


                    }
                });
            } else {
                $('select[name="billing[city]"]').empty();
                $('select[name="billing[city]"]').empty();
            }
        });
    });
</script>
<script>
    $(function() {
        var $src = $('#billing_name'),
            $dst = $('#shipping_name');
        $src.on('input', function() {
            $dst.val($src.val());
        });
    });

    $(function() {
        var $src1 = $('#billing_phone'),
            $dst1 = $('#shipping_phone');
        $src1.on('input', function() {
            $dst1.val($src1.val());
        });
    });

    $(function() {
        var $src2 = $('#billing_country_id'),
            $dst2 = $('#shipping_country_id');
        $src2.on('input', function() {
            $dst2.val($src2.val());
        });
    });

    $(function() {
        var $src3 = $('#billing_state'),
            $dst3 = $('#shipping_state');
        $src3.on('input', function() {
            $dst3.val($src3.val());
        });
    });

    $(function() {
        var $src4 = $('#billing_city'),
            $dst4 = $('#shipping_city');
        $src4.on('input', function() {
            $dst4.val($src4.val());
        });
    });

    $(function() {
        var $src5 = $('#billing_address'),
            $dst5 = $('#shipping_address');
        $src5.on('input', function() {
            $dst5.val($src5.val());
        });
    });

    $(function() {
            var $src6 = $('#billing_zip'),
                $dst6 = $('#shipping_zip');
            $src6.on('input', function() {
                $dst6.val($src6.val());
            });
        });    
</script>

<script>
     function initializeProductSelect2(elem) {
        //  console.log('ajax')
        elem.select2({
            ajax: { 
                url: "{{ route('ajax.category', ['company_uid' => $currentCompany->uid]) }}",
                type: "get",
                dataType: "json",
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
                    };
                },
                processResults: function (response) {
                    console.log(response)
                    return {
                        results: response                     
                    };
                    // console.log('response')
                },
                cache: true
            },
            tags: true,
            templateSelection: function (data, container) {
                // console.log(response.data)
                $(data.element).attr('data-taxes', JSON.stringify(data.taxes));
                $(data.element).attr('data-price', data.price);
                return data.text;
            }
        });

        elem.change(function() {
            var element = $(this);
            var selectedOption = element.find(':selected');
            var taxesSelect = element.closest('tr').find('[name="taxes[]"]');
            var priceInput = element.closest('tr').find('.price_input');

            // Set selected taxes from product
            var taxIds = [];
            var taxes = selectedOption.data('taxes');
            taxes.forEach(tax => {
                taxIds.push(tax.tax_type_id);
            });
            taxesSelect.val(taxIds);
            taxesSelect.trigger('change');

            // Set product price for price input
            priceInput.val(selectedOption.data('price'));
            priceInput.focusout();

            calculateRowPrice();
        });
    }
    function addProductRow() {
        
        var productItems = $('#items');
        var template = $('#product_row_template')
                .clone()
                .removeAttr('id')
                .removeClass('d-none');
        productItems.append(template);

        var product_select = template.find('[name="expense_category_id[]"]');
        // console.log(product_select);
        initializeProductSelect2(product_select);

        var tax_select = template.find('[name="taxes[]"]');
        initializeTaxSelect2(tax_select);

        initializePriceListener();
        calculateRowPrice();
        setupSelect2FooterListener();
    }

    // function removeRow(elem) {
    //     $(elem).closest('tr').remove();
    //     calculateRowPrice();
    // }

    function validateForm() {
        $('tbody tr').each(function(index, element) {
            var row = $(element);
            var product = row.find('[name="expense_category_id[]"]')
        });
    }
</script>


@endsection
