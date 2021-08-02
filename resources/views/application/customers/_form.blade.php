<!-- <div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{ __('messages.customer_information') }}</strong></p>
            <p class="text-muted">{{ __('messages.basic_customer_information') }}</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="display_name">{{ __('messages.display_name') }}</label>
                        <input name="display_name" type="text" class="form-control" placeholder="{{ __('messages.display_name') }}" value="{{ $customer->display_name }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group required">
                        <label for="contact_name">{{ __('messages.contact_name') }}</label>
                        <input name="contact_name" type="text" class="form-control" placeholder="{{ __('messages.contact_name') }}" value="{{ $customer->contact_name }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="email">{{ __('messages.email') }}</label>
                        <input name="email" type="email" class="form-control" placeholder="{{ __('messages.email') }}" value="{{ $customer->email }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="phone">{{ __('messages.phone') }}</label>
                        <input name="phone" type="text" class="form-control" placeholder="{{ __('messages.phone') }}" value="{{ $customer->phone }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="currency_id">{{ __('messages.currency') }}</label> 
                        <select name="currency_id" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="currency_id" required>
                            <option disabled selected>{{ __('messages.select_currency') }}</option>
                            @foreach (get_currencies_select2_array() as $option)
                                <option value="{{ $option['id'] }}" {{ $customer->currency_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="website">{{ __('messages.website') }}</label>
                        <input name="website" type="text" class="form-control" placeholder="{{ __('messages.website') }}" value="{{ $customer->website }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="vat_number">{{ __('messages.vat_number') }}</label>
                        <input name="vat_number" type="text" class="form-control" placeholder="{{ __('messages.vat_number') }}" value="{{ $customer->vat_number }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{ __('messages.billing_address') }}</strong></p>
            <p class="text-muted">{{ __('messages.customer_billing_address') }}</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <p class="row"><strong class=" col headings-color">{{ __('messages.billing_address') }}</strong></p>
            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="billing[name]">{{ __('messages.name') }}</label>
                        <input name="billing[name]" type="text" class="form-control" placeholder="{{ __('messages.address_name') }}" value="{{ $customer->billing->name }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="billing[phone]">{{ __('messages.phone') }}</label>
                        <input name="billing[phone]" type="text" class="form-control" value="{{ $customer->billing->phone }}" placeholder="{{ __('messages.phone') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="billing[country_id]">{{ __('messages.country') }}</label>
                        <select id="billing[country_id]" name="billing[country_id]" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="billing[country_id]" required>
                            <option disabled selected>{{ __('messages.select_country') }}</option>
                            @foreach (get_countries_select2_array() as $option)
                                <option value="{{ $option['id'] }}" {{ $customer->billing->country_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="billing[state]">{{ __('messages.state') }}</label>
                        <input name="billing[state]" type="text" class="form-control" value="{{ $customer->billing->state }}" placeholder="{{ __('messages.state') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="billing[city]">{{ __('messages.city') }}</label>
                        <input name="billing[city]" type="text" class="form-control" value="{{ $customer->billing->city }}" placeholder="{{ __('messages.city') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="billing[zip]">{{ __('messages.postal_code') }}</label>
                        <input name="billing[zip]" type="text" class="form-control" value="{{ $customer->billing->zip }}" placeholder="{{ __('messages.postal_code') }}">
                    </div>
                </div>
            </div>

            <div class="form-group required">
                <label for="billing[address_1]">{{ __('messages.address') }}</label>
                <textarea name="billing[address_1]" class="form-control" rows="2" placeholder="{{ __('messages.address') }}" required>{{ $customer->billing->address_1 }}</textarea>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{ __('messages.shipping_address') }}</strong></p>
            <p class="text-muted">{{ __('messages.customer_shipping_address') }}</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <p class="row"><strong class=" col headings-color">{{ __('messages.shipping_address') }}</strong></p>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="shipping[name]">{{ __('messages.name') }}</label>
                        <input name="shipping[name]" type="text" class="form-control" value="{{ $customer->shipping->name }}" placeholder="{{ __('messages.address_name') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="shipping[phone]">{{ __('messages.phone') }}</label>
                        <input name="shipping[phone]" type="text" class="form-control" value="{{ $customer->shipping->phone }}" placeholder="{{ __('messages.phone') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="shipping[country_id]">{{ __('messages.country') }}</label>
                        <select id="shipping[country_id]" name="shipping[country_id]" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="shipping[country_id]">
                            <option disabled selected>{{ __('messages.select_country') }}</option>
                            @foreach (get_countries_select2_array() as $option)
                                <option value="{{ $option['id'] }}" {{ $customer->shipping->country_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="shipping[state]">{{ __('messages.state') }}</label>
                        <input name="shipping[state]" type="text" class="form-control" value="{{ $customer->shipping->state }}" placeholder="{{ __('messages.state') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="shipping[city]">{{ __('messages.city') }}</label>
                        <input name="shipping[city]" type="text" class="form-control" value="{{ $customer->shipping->city }}" placeholder="{{ __('messages.city') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="shipping[zip]">{{ __('messages.postal_code') }}</label>
                        <input name="shipping[zip]" type="text" class="form-control" value="{{ $customer->shipping->zip }}" placeholder="{{ __('messages.postal_code') }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="shipping[address_1]">{{ __('messages.address') }}</label>
                <textarea name="shipping[address_1]" class="form-control" rows="2" placeholder="{{ __('messages.address') }}">{{ $customer->shipping->address_1 }}</textarea>
            </div>
        </div>
    </div>

    @if ($customer->getCustomFields()->count() > 0)
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">{{ __('messages.custom_fields') }}</strong></p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <div class="row">
                    @foreach ($customer->getCustomFields() as $custom_field)
                        @include('layouts._custom_field', ['model' => $customer, 'custom_field' => $custom_field])
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>

<div class="form-group text-center mt-5">
    <button type="submit" class="btn btn-primary">{{ __('messages.save_customer') }}</button>
</div> -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('messages.customer_information') }}</h4>
                    <p class="text-muted">{{ __('messages.basic_customer_information') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="display_name">{{ __('messages.display_name') }}</label>
                                <input name="display_name" id="display_name" type="text" class="form-control"
                                    placeholder="{{ __('messages.display_name') }}"
                                    value="{{ $customer->display_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="contact_name">{{ __('messages.contact_name') }}</label>
                                <input name="contact_name" id="contact_name" type="text" class="form-control"
                                    placeholder="{{ __('messages.contact_name') }}"
                                    value="{{ $customer->contact_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="email">{{ __('messages.email') }}</label>
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="{{ __('messages.email') }}" value="{{ $customer->email }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="phone">{{ __('messages.phone') }}</label>
                                <input name="phone" id="phone" type="number" class="form-control"
                                    placeholder="{{ __('messages.phone') }}" value="{{ $customer->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="currency_id">{{ __('messages.currency') }}</label>
                                <select name="currency_id" id="currency_id" data-toggle="select"
                                    class="form-control select2-hidden-accessible" data-select2-id="currency_id"
                                    required>
                                    <option disabled selected>{{ __('messages.select_currency') }}</option>
                                    @foreach (get_currencies_select2_array() as $option)
                                        <option value="{{ $option['id'] }}"
                                            {{ $customer->currency_id == $option['id'] ? 'selected=""' : '' }}>
                                            {{ $option['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="website">{{ __('messages.website') }}</label>
                                <input name="website" id="website" type="url" class="form-control"
                                    placeholder="{{ __('messages.website') }}" value="{{ $customer->website }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="vat_number">GST Number</label>
                                <input name="vat_number" id="vat_number" type="text" class="form-control"
                                    placeholder="GST Number" value="{{ $customer->vat_number }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Address</h4>
                    <p class="text-muted">{{ __('messages.customer_billing_address') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="billing[name]">{{ __('messages.name') }}</label>
                                <input name="billing[name]" id="billing_name" type="text" class="form-control"
                                    placeholder="{{ __('messages.address_name') }}"
                                    value="{{ $customer->billing->name }}" required>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="billing[phone]">{{ __('messages.phone') }}</label>
                                <input name="billing[phone]" id="billing_phone" type="number" class="form-control"
                                    value="{{ $customer->billing->phone }}"
                                    placeholder="{{ __('messages.phone') }}">
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="billing[country_id]">{{ __('messages.country') }}</label>
                                <select id="billing_country_id" name="billing[country_id]" data-toggle="select"
                                    class="form-control select2-hidden-accessible" data-select2-id="billing[country_id]"
                                    required>
                                    <option disabled selected>{{ __('messages.select_country') }}</option>
                                    @foreach (get_countries_select2_array() as $option)
                                        <option value="{{ $option['id'] }}"
                                            {{ $customer->billing->country_id == $option['id'] ? 'selected=""' : '' }}>
                                            {{ $option['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="billing[state]">{{ __('messages.state') }}</label>
                                <input name="billing[state]" type="text" class="form-control"
                                    value="{{ $customer->billing->state }}"
                                    placeholder="{{ __('messages.state') }}">
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-12">
                        <div class="form-group required">
                            <label for="billing[state]">{{ __('messages.state') }}</label>
                            <select id="billing_state" name="billing[state]" data-toggle="select"
                                class="form-control select2-hidden-accessible oi" data-select2-id="billing[state]"
                                required>
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
                            <select name="billing[city]" id="billing_city" data-toggle="select"
                                class="form-control select2-hidden-accessible" data-select2-id="billing[city]"
                                required>
                                <option disabled selected>Select city</option>
                                {{-- @foreach ($citie as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach --}}
                              
                            </select>
                        </div>
                    </div>

                        {{-- <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="billing[city]">{{ __('messages.city') }}</label>
                                <input name="billing[city]" type="text" class="form-control"
                                    value="{{ $customer->billing->city }}"
                                    placeholder="{{ __('messages.city') }}">
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="billing[zip]">{{ __('messages.postal_code') }}</label>
                                <input name="billing[zip]" id="billing_zip" type="text" class="form-control"
                                    value="{{ $customer->billing->zip }}"
                                    placeholder="{{ __('messages.postal_code') }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="billing[address_1]">{{ __('messages.address') }}</label>
                                <textarea name="billing[address_1]" id="billing_address" class="form-control" rows="2"
                                    placeholder="{{ __('messages.address') }}"
                                    required>{{ $customer->billing->address_1 }}</textarea>
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
            <p class="text-muted">{{ __('messages.customer_shipping_address') }}</p>
        </div>
        {{-- <div class="form-check form-group">
            <input class="btn" type="checkbox" value="Checkout" name="checkout" />
        </div> --}}
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="shipping[name]">{{ __('messages.name') }}</label>
                        <input name="shipping[name]" id="shipping_name" type="text" class="form-control"
                            value="{{ $customer->shipping->name }}"
                            placeholder="{{ __('messages.address_name') }}">
                    </div>
                </div>
                {{-- <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="shipping[phone]">{{ __('messages.phone') }}</label>
                        <input name="shipping[phone]" id="shipping_phone" type="number" class="form-control"
                            value="{{ $customer->shipping->phone }}" placeholder="{{ __('messages.phone') }}">
                    </div>
                </div> --}}
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="shipping[country_id]">{{ __('messages.country') }}</label>
                        <select id="shipping_country_id" name="shipping[country_id]" data-toggle="select"
                            class="form-control select2-hidden-accessible" data-select2-id="shipping[country_id]">
                            <option disabled selected>{{ __('messages.select_country') }}</option>
                            @foreach (get_countries_select2_array() as $option)
                                <option value="{{ $option['id'] }}"
                                    {{ $customer->shipping->country_id == $option['id'] ? 'selected=""' : '' }}>
                                    {{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12">

                    {{-- <div class="form-group">
                        <label for="shipping[state]">{{ __('messages.state') }}</label>
                        <select id="shipping[state]" name="shipping[state]" data-toggle="select"
                            class="form-control select2-hidden-accessible" data-select2-id="shipping[state]">
                            <option disabled selected>{{ __('messages.select_sta te') }}</option>
                            @foreach(get_countries_select2_array() as $option)
                            <option value="{{ $option['id'] }}"
                                {{ $customer->shipping->country_id == $option['id'] ? 'selected=""' : '' }}>
                                {{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group required">
                        <label for="billing[state]">{{ __('messages.state') }}</label>
                        {{-- <select id="billing[state]" name="billing[state]" data-toggle="select"
                            class="form-control select2-hidden-accessible oi" data-select2-id="billing[state]"
                            required> --}}
                            <select id="shipping_state" name="shipping[state]" data-toggle="select"
                                class="form-control select2-hidden-accessible oi" data-select2-id="billing[state]"
                                required>
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
                            class="form-control select2-hidden-accessible" data-select2-id="billing[city]"
                            required>
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
                            value="{{ $customer->shipping->zip }}"
                            placeholder="{{ __('messages.postal_code') }}">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="shipping[address_1]">{{ __('messages.address') }}</label>
                        <textarea name="shipping[address_1]" id="shipping_address" class="form-control" rows="2"
                            placeholder="{{ __('messages.address') }}">{{ $customer->shipping->address_1 }}</textarea>
                    </div>
                </div>
                @if ($customer->getCustomFields()->count() > 0)
                    <div class="col-md-6 col-12">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">{{ __('messages.custom_fields') }}</strong></p>
                        </div>
                        <div class="form-group">
                            @foreach ($customer->getCustomFields() as $custom_field)
                                @include('layouts._custom_field', ['model' => $customer, 'custom_field' =>
                                $custom_field])
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- <div class="col-12">
        <button type="submit" class="btn btn-primary mr-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div> -->
    <div class="form-group text-center mt-5">
        <button type="submit" class="btn btn-primary"
            style="margin-left: 240px;">{{ __('messages.save_customer') }}</button>
    </div>
    </div>
    </div>
</section>

@section('page_head_scripts')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">

@endsection