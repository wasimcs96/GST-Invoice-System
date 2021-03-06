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
    <form action="{{ route('invoices.store', ['company_uid' => $currentCompany->uid]) }}" method="POST"
        enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf

        @include('application.invoices._form')
    </form>

    <!--Customer Modal -->
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
                                                        placeholder="{{ __('messages.contact_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="email">Company</label>
                                                    <input name="company" id="company" type="text" class="form-control"
                                                        placeholder="Enter Company">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="email">{{ __('messages.email') }}</label>
                                                    <input name="email" id="email" type="email" class="form-control"
                                                        placeholder="{{ __('messages.email') }}">
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
                                                        data-select2-id="currency_id">
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
                                                        class="form-control select2 select2-hidden-accessible"
                                                        data-select2-id="gst_type">
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
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="vat_number">Attachment</label>
                                                    <input name="attachment" id="attachment" type="file"
                                                        class="form-control">
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
                                                        placeholder="{{ __('messages.address_name') }}">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="billing[phone]">{{ __('messages.phone') }}</label>
                                                    <input name="billing[phone]" id="billing_phone" type="number"
                                                        class="form-control" placeholder="{{ __('messages.phone') }}">
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="billing[country_id]">{{ __('messages.country') }}</label>
                                                    <select id="billing_count" name="billing[country_id]"
                                                        data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible"
                                                        data-select2-id="billing[country_id]">
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
                                                    <select id="billing_s" name="billing[state]" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible oi"
                                                        data-select2-id="billing[state]">
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
                                                        data-select2-id="billing[city]">
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
                                                    <textarea name="billing[address_1]" id="billing_add"
                                                        class="form-control" rows="2"
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
                            <div class="form-check form-group">
                                <label>shipping Address Same As Billing Address</label>
                                <input class="btn" type="checkbox" value="Checkout" id="checkbox"
                                    name="checkout" />
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[name]">{{ __('messages.name') }}</label>
                                            <input name="shipping[name]" id="shipping_name" type="text"
                                                class="form-control" placeholder="{{ __('messages.address_name') }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[phone]">{{ __('messages.phone') }}</label>
                                            <input name="shipping[phone]" id="shipping_phone" type="number"
                                                class="form-control" placeholder="{{ __('messages.phone') }}">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping[country_id]">{{ __('messages.country') }}</label>
                                            <select id="shipping_count" name="shipping[country_id]" data-toggle="select"
                                                class="form-control select2 select2-hidden-accessible"
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
                                            <select id="shipping_s" name="shipping[state]" data-toggle="select"
                                                class="form-control select2 select2-hidden-accessible oi"
                                                data-select2-id="billing[state]">
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
                                                data-select2-id="billing[city]">
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
                                            <textarea name="shipping[address_1]" id="shipping_add" class="form-control"
                                                rows="2" placeholder="{{ __('messages.address') }}"></textarea>
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

    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Product Category</h5>
                </div>
                <div class="modal-body"><a data-toggle="modal" href="#myModal">

                        <label for="myModal">
                            <h5 class="modal-title" id="exampleModalLabel"><i data-feather="shopping-bag"></i>Inventory
                            </h5>Products you buy and/or sell and that you track quantiti
                        </label></a>
                    <br /><br />
                    <hr>
                    <a data-toggle="modal" href="#myModal2">

                        <label for="test7">
                            <h5 class="modal-title" id="exampleModalLabel"><i data-feather="box"></i>Non-Inventory</h5>
                            Products you buy and/or sell but don???t need to (or can???t) track quantities of, for example, nuts
                            and bolts used in an installation.
                        </label></a>
                    <br /><br />
                    <hr>
                    <a data-toggle="modal" href="#myModal3">

                        <label for="test6">
                            <h5 class="modal-title"><i data-feather="aperture"></i>Service</h5>

                            Services that you provide to customers, for example, landscaping or tax preparation services.
                        </label></a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>

        <!-- NonInventory Product Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product/Service information</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><i data-feather="box"></i>Non-inventory</h4>
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
                                                    <div class="form-group required">
                                                        <label for="sku">SKU</label>
                                                        <input name="sku" type="text" class="form-control"
                                                            placeholder="Enter a SKU" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="unit">Category</label>

                                                        <select id="category_id" class="select2 form-control"
                                                            name="category_id" id="default-select-multi">
                                                            <option disabled selected>Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                            <option value="cate" id="dd" style="color: blue;"> <a
                                                                    data-toggle="modal" data-target="#categorymodal"
                                                                    id="cato" class="font-weight-300">+
                                                                    Add new Category</a></option>
                                                        </select>
                                                    </div>
                                                </div>
                                       
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group required">
                                                        <label for="hsn">HSN Code</label>
                                                        <input name="hsn" type="text" class="form-control"
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
                                                                <option value="{{ $option['id'] }}">
                                                                    {{ $option['text'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-12">

                                                    <div class="form-group">
                                                        <label for="income_account1">Income Account</label>

                                                        <select id="income_account" class="select2 form-control"
                                                            name="income_account" id="default-select-multi">
                                                            <option disabled selected>Select Income Account
                                                            </option>
                                                            @foreach ($inventory_accounts as $inventory_account)
                                                                <option value="{{ $inventory_account->id }}">
                                                                    {{ $inventory_account->name }}</option>
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
                                                      
                                                        <select id="taxess" class="select2 form-control"
                                                            id="default-select-multi">
                                                            <option value="0" data-percent="0">Select Tax
                                                            </option>
                                                            @foreach ($all_taxes as $option)
                                                            <option value="{{ $option['id'] }}"
                                                                data-percent="{{ $option['percent'] }}">{{ $option['name'] }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-12">
                                                    <div class="form-group">
                                                        <label for="inputImage">Image</label>
                                                        <input type="file" id="file" onchange="loadFilef(event)"
                                                            name="image" id="inputImage" class="form-control" required>
                                                    </div>
                                                    <img id="output" width="100" />
                                                </div>
                                                <div class="col col-12">
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

        {{-- Product Inventory Modal --}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product/Service information</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><i data-feather="shopping-bag"></i>Inventory</h4>
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
                                                    <div class="form-group required">
                                                        <label for="sku">SKU</label>
                                                        <input name="sku" type="text" class="form-control"
                                                            placeholder="Enter a SKU" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>

                                                        <select id="category_id1" class="select2 form-control"
                                                            name="category_id" id="default-select-multi">
                                                            <option disabled selected>Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                            <option value="cate" id="dd" style="color: blue;"> <a
                                                                    data-toggle="modal" data-target="#categorymodal"
                                                                    id="cato" class="font-weight-300">+
                                                                    Add new Category</a></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group required">
                                                        <label for="initial_quantity">Initial quantity on hand</label>
                                                        <input name="initial_quantity" type="number" class="form-control"
                                                            placeholder="Enter" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group required">
                                                        <label for="as_date">As of Date</label>
                                                        <input name="as_date" type="date" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col col-12">
                                                    <div class="form-group">
                                                        <label for="inventory_account1">Inventory assest account</label>

                                                        <select id="inventory_account1" class="select2 form-control"
                                                            name="inventory_assests_accounts_id" id="default-select-multi">
                                                            <option disabled selected>Select Account</option>
                                                            @foreach ($inventory_accounts as $inventory_account)
                                                                <option value="{{ $inventory_account->id }}">
                                                                    {{ $inventory_account->name }}</option>
                                                            @endforeach
                                                            {{-- <option value="cate" id="dd" style="color: blue;"> <a  data-toggle="modal" data-target="#categorymodal" id="cato"
                                                             class="font-weight-300">+
                                                               Add new Category</a></option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group required">
                                                        <label for="hsn">HSN Code</label>
                                                        <input name="hsn" type="text" class="form-control"
                                                            placeholder="Enter a valid HSN code" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">

                                                    <div class="form-group">
                                                        <label for="unit">{{ __('messages.unit') }}</label>

                                                        <select id="unit_id1" class="select2 form-control" name="unit_id"
                                                            id="default-select-multi">
                                                            <option disabled selected>{{ __('messages.select_unit') }}
                                                            </option>
                                                            @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                                                <option value="{{ $option['id'] }}">
                                                                    {{ $option['text'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-12">

                                                    <div class="form-group">
                                                        <label for="income_account1">Income Account</label>

                                                        <select id="income_account1" class="select2 form-control"
                                                            name="income_account" id="default-select-multi">
                                                            <option disabled selected>Select Income Account
                                                            </option>
                                                            @foreach ($inventory_accounts as $inventory_account)
                                                                <option value="{{ $inventory_account->id }}">
                                                                    {{ $inventory_account->name }}</option>
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
                                                       
                                                        <select id="tax1" class="select2 form-control"
                                                            id="default-select-multi">
                                                            <option value="0" data-percent="0">Select Tax
                                                            </option>
                                                            @foreach ($all_taxes as $option)
                                                            <option value="{{ $option['id'] }}"
                                                                data-percent="{{ $option['percent'] }}">{{ $option['name'] }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-12">
                                                    <div class="form-group">
                                                        <label for="inputImage">Image</label>
                                                        <input type="file" onchange="loadFilef(event)" name="image"
                                                            id="inputImage" class="form-control" required>
                                                    </div>
                                                    <img id="output" width="100" />
                                                </div>
                                                <div class="col col-12">
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
        {{-- Product Service Modal --}}
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product/Service information</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><i data-feather="aperture"></i>Service</h4>
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
                                                    <div class="form-group required">
                                                        <label for="sku">SKU</label>
                                                        <input name="sku" type="text" class="form-control"
                                                            placeholder="Enter a SKU" required>
                                                    </div>
                                                </div>
                                                <div class="col col-12">
                                                    <div class="form-group">
                                                        <label for="sac_id">SAC Code</label>

                                                        <select id="sac_id" class="select2 form-control" name="sac_id"
                                                            id="default-select-multi">
                                                            <option disabled selected>Select SAC Code</option>
                                                            @foreach ($product_sac as $product_sa)
                                                                <option value="{{ $product_sa->id }}">
                                                                    {{ $product_sa->name }}
                                                                </option>
                                                            @endforeach
                                                            {{-- <option value="cate" id="dd" style="color: blue;"> <a  data-toggle="modal" data-target="#categorymodal" id="cato"
                                                             class="font-weight-300">+
                                                               Add new Category</a></option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>

                                                        <select id="category_id2" class="select2 form-control"
                                                            name="category_id" id="default-select-multi">
                                                            <option disabled selected>Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                            <option value="cate" id="dd" style="color: blue;"> <a
                                                                    data-toggle="modal" data-target="#categorymodal"
                                                                    id="cato" class="font-weight-300">+
                                                                    Add new Category</a></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">

                                                    <div class="form-group">
                                                        <label id="unit_id2" for="unit">{{ __('messages.unit') }}</label>

                                                        <select class="select2 form-control" name="unit_id"
                                                            id="default-select-multi">
                                                            <option disabled selected>{{ __('messages.select_unit') }}
                                                            </option>
                                                            @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                                                <option value="{{ $option['id'] }}">
                                                                    {{ $option['text'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-12">

                                                    <div class="form-group">
                                                        <label for="income_account2">Income Account</label>

                                                        <select id="income_account2" class="select2 form-control"
                                                            name="income_account" id="default-select-multi">
                                                            <option disabled selected>Select Income Account
                                                            </option>
                                                            @foreach ($inventory_accounts as $inventory_account)
                                                                <option value="{{ $inventory_account->id }}">
                                                                    {{ $inventory_account->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-12">

                                                    <div class="form-group">
                                                        <label for="service_id2">Service Type</label>

                                                        <select id="service_id2" class="select2 form-control"
                                                            name="service_id" id="default-select-multi">
                                                            <option disabled selected>Select Service Type
                                                            </option>
                                                            @foreach ($product_servicess as $product_services)
                                                                <option value="{{ $product_sa->id }}">
                                                                    {{ $product_services->name }}
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
                                                      
                                                        <select id="tax2" class="select2 form-control"
                                                            id="default-select-multi">
                                                            <option value="0" data-percent="0">Select Tax
                                                            </option>
                                                            @foreach ($all_taxes as $option)
                                                                <option value="{{ $option['id'] }}"
                                                                    data-percent="{{ $option['percent'] }}">
                                                                    {{ $option['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-12">
                                                    <div class="form-group">
                                                        <label for="inputImage">Image</label>
                                                        <input type="file" onchange="loadFilef(event)" name="image"
                                                            id="inputImage" class="form-control" required>
                                                    </div>
                                                    <img id="output" width="100" />
                                                </div>
                                                <div class="col col-12">
                                                    <div class="form-group">
                                                        <label
                                                            for="description">{{ __('messages.description') }}</label>
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

        {{-- Category Modal --}}
        <div class="modal fade" id="categorymodal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    </div>
                    <div class="modal-body">
                        <form
                            action="{{ route('settings.invoice.product_categories.store', ['company_uid' => $currentCompany->uid]) }}"
                            method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group required">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input name="name" type="text" class="form-control"
                                            placeholder="{{ __('messages.name') }}" required>
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
        <div class="modal fade" id="taxModal" tabindex="-1" role="dialog" aria-labelledby="taxModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Tax</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.tax.store', ['company_uid' => $currentCompany->uid]) }}"
                            method="POST">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="form-group required">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input name="name" type="text" class="form-control"
                                            placeholder="{{ __('messages.name') }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group required">
                                        <label for="percent">{{ __('messages.percent') }}</label>
                                        <input name="percent" type="number" class="form-control"
                                            placeholder="{{ __('messages.percent') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('messages.description') }}</label>
                                        <textarea name="description" class="form-control"
                                            placeholder="{{ __('messages.description') }}" rows="4"></textarea>
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
            $('#category_id').on('change', function() {
                if (this.value == "cate") {
                    window.location =
                        '{{ route('settings.product_categories', ['company_uid' => $currentCompany->uid]) }}';
                    $("#cato").trigger('click');
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
        <script>
            //   $(function () {
            //         $("#supply").change(function () {
            //             console.log($('#selecttax').prop('disabled', false));
            //             if ($(this).val() >0) {
            //                 $("#selecttax").off();
            //             $('#selecttax').prop('disabled', false);

            //             } else {
            //                 $('#selecttax').prop('disabled', true);
            //             }
            //         });
            //     });
            // document.getElementById('customer').onchange = function () {

            //     document.getElementById("select02").disabled ;
            //     // = this.value == '';
            // }
            // $(document).ready(function() {

            //     $('#supply').change(function() {
            //         console.log('hii');
            //         if ($(this).val() == 1) {

            //             $('#progress').prop("disabled", false);
            //         } else {
            //             $('#progress').prop("disabled", true);
            //         }
            //     });

            // });
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
            $('#checkbox').on('click', function() {
                // assuming the textarea is inside <div class="controls /">
                if ($(this).is(':checked')) {
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
                        var $src2 = $('#billing_count'),
                            $dst2 = $('#shipping_count');
                        $src2.on('input', function() {
                            $dst2.val($src2.val());
                        });
                    });

                    $(function() {
                        var $src3 = $('#billing_s'),
                            $dst3 = $('#shipping_s');
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
                        var $src6 = $('#billing_zip'),
                            $dst6 = $('#shipping_zip');
                        $src6.on('input', function() {
                            $dst6.val($src6.val());
                        });
                    });

                    $(function() {
                        var $src5 = $('#billing_add'),
                            $dst5 = $('#shipping_add');
                        $src5.on('input', function() {
                            $dst5.val($src5.val());
                        });
                    });
                }
            });
        </script>
        <script>
            $('input[type="checkbox"]').on('change', function(e) {
                if (e.target.checked) {
                    $('#myModal').modal();
                }
            });
        </script>
        <script>
            var loadFilef = function(event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>

    @endsection
