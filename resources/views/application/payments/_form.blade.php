<!-- <div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{ __('messages.payment_information') }}</strong></p>
            <p class="text-muted">{{ __('messages.basic_payment_information') }}</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="payment_date">{{ __('messages.payment_date') }}</label>
                        <input name="payment_date" type="text" class="form-control input" data-toggle="flatpickr" data-flatpickr-default-date="{{ $payment->payment_date ?? now() }}" placeholder="{{ __('messages.payment_date') }}" readonly="readonly" required>
                    </div>
                </div>
                <div class="col"> 
                    <div class="form-group required">
                        <label for="payment_number">{{ __('messages.payment_number') }}</label>
                        <div class="input-group input-group-merge">
                            <input name="payment_prefix" type="hidden" value="{{ $payment->payment_prefix }}">
                            <input name="payment_number" type="text" maxlength="6" class="form-control form-control-prepended" value="{{ $payment->payment_num }}" autocomplete="off" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    {{ $payment->payment_prefix }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group select-container required">
                        <label for="customer">{{ __('messages.customer') }}</label>
                        <select id="customer" name="customer_id" data-toggle="select" class="form-control select2-hidden-accessible select-with-footer" data-select2-id="customer">
                            <option disabled selected>{{ __('messages.select_customer') }}</option>
                            @if($payment->customer_id)
                                <option value="{{ $payment->customer_id }}" selected>{{ $payment->customer->display_name }}</option>
                            @endif
                        </select>
                        <div class="d-none select-footer">
                            <a href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_customer') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group select-container required">
                        <label for="invoice_select">{{ __('messages.invoice') }}</label>
                        <select id="invoice_select" name="invoice_id" data-toggle="select" class="form-control select2-hidden-accessible select-with-footer" data-minimum-results-for-search="-1" data-select2-id="invoice_select">
                            <option disabled selected>{{ __('messages.select_invoice') }}</option>
                            @if($payment->invoice_id)
                                <option value="{{ $payment->invoice_id }}" selected>{{ $payment->invoice->invoice_number }}</option>
                            @endif
                        </select>
                        <div class="d-none select-footer">
                            <a href="{{ route('invoices.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_invoice') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="amount">{{ __('messages.amount') }}</label>
                        <input id="amount" name="amount" type="text" class="form-control price_input" placeholder="{{ __('messages.amount') }}" autocomplete="off" value="{{ $payment->amount ?? 0 }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group select-container required">
                        <label for="payment_method_id">{{ __('messages.payment_type') }}</label>
                        <select id="payment_method_id" name="payment_method_id" data-toggle="select" class="form-control select2-hidden-accessible select-with-footer" data-minimum-results-for-search="-1" data-select2-id="payment_method_id">
                            <option disabled selected>{{ __('messages.select_payment_type') }}</option>
                            @foreach(get_payment_methods_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ $payment->payment_method_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                        <div class="d-none select-footer">
                            <a href="{{ route('settings.payment.type.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_payment_method') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="notes">{{ __('messages.notes') }}</label>
                        <textarea name="notes" class="form-control" rows="4" placeholder="{{ __('messages.notes') }}">{{ $payment->notes }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="private_notes">{{ __('messages.private_notes') }}</label>
                        <textarea name="private_notes" class="form-control" rows="4" placeholder="{{ __('messages.private_notes') }}">{{ $payment->private_notes }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                @if($payment->getCustomFields()->count() > 0)
                    <div class="col-12">
                        @foreach ($payment->getCustomFields() as $custom_field)
                            @include('layouts._custom_field', ['model' => $payment, 'custom_field' => $custom_field])
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="form-group text-center mt-3">
                <button type="button" class="btn btn-primary form_with_price_input_submit">{{ __('messages.save_payment') }}</button>
            </div>
        </div>
    </div>
</div> -->


<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('messages.payment_information') }}</h4>
                    <p class="text-muted">{{ __('messages.basic_payment_information') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="first_name">{{ __('messages.payment_date') }}</label>
                                <input name="first_name" type="date" class="form-control"
                                    placeholder="{{ __('messages.payment_date') }}" value="" required>
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="payment_number">{{ __('messages.payment_number') }}</label>
                                <div class="input-group">
                                    <input name="payment_prefix" type="hidden" value="{{ $payment->payment_prefix }}">
                                    <input name="payment_number" type="text" maxlength="6"
                                        class="form-control form-control-prepended" value="{{ $payment->payment_num }}"
                                        autocomplete="off" required>
                                    <!-- <div class="input-group-prepend"> -->
                                    <div class="input-group-text">
                                        {{ $payment->payment_prefix }}
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                          

                            <div class="form-group required select-container">
                                <label for="customer">{{ __('messages.customer') }}</label>
                                <select id="customer" onchange="customerselect()" id="customerselect" name="customer_id" data-toggle="select"
                                    class="form-control select2-hidden-accessible select-with-footer"
                                    data-select2-id="customer">
                                    <option disabled selected>{{ __('messages.select_customer') }}</option>
                                    
                                    @if($payment->customer_id)
                                    <option value="{{ $payment->customer_id }}" selected=""
                                        data-currency="{{ $payment->customer->currency }}"
                                        data-billing_address="{{$payment->customer->displayLongAddress('billing')}}"
                                        data-shipping_address="{{$payment->customer->displayLongAddress('shipping')}}">
                                        {{ $payment->customer->display_name }}
                                    </option>
                                    @endif
                                   {{-- <option value="hii"><a id="cust" href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ Add new customer</a>
                                   </option> --}}
                                </select>
                                <span value="hii"><a id="cust" href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ Add new customer</a>
                                </span>
                                {{-- <div class="d-none select-footer">
                                    <a href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_customer') }}</a>
                                </div> --}}
                                {{-- <div class="select2-results__option border-top mt-1 sel-footer">
                                    <a href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ Add new customer</a>
                                </div> --}}
                            </div>


                        </div>
                        <div class="col-md-6 col-12">
                           
                            <div class="form-group">
                                <label for="invoice_select">{{ __('messages.invoice') }}</label>
                                {{-- <option disabled selected>{{ __('messages.select_customer') }}</option> --}}

                                <select id="invoice_select" name="invoice_id" class="select2 form-control" id="default-select-multi">
                                    <option disabled selected>{{ __('messages.select_invoice') }}</option>

                                    @if($payment->invoice_id)
                                    <option value="{{ $payment->invoice_id }}" selected>
                                        {{ $payment->invoice->invoice_number }}</option>
                                    @endif
                                    
                                <option value="hi"  style="color: blue;"><a id="inv" href="{{ route('invoices.create', ['company_uid' => $currentCompany->uid]) }}"
                                    target="_blank" class="font-weight-300">+
                                    {{ __('messages.add_new_invoice') }}</a>
                                </option>
                                </select>
                            </div>


                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="amount">{{ __('messages.amount') }}</label>
                                <input id="amount" name="amount" type="text" class="form-control price_input"
                                    placeholder="{{ __('messages.amount') }}" autocomplete="off"
                                    value="{{ $payment->amount ?? 0 }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            {{-- <div class="form-group select-container required">
                                <label for="payment_method_id">{{ __('messages.payment_type') }}</label>
                                <select id="payment_method_id" name="payment_method_id" data-toggle="select"
                                    class="form-control select2-hidden-accessible select-with-footer"
                                    data-minimum-results-for-search="-1" data-select2-id="payment_method_id">
                                    <option disabled selected>{{ __('messages.select_payment_type') }}</option>
                                    @foreach(get_payment_methods_select2_array($currentCompany->id) as $option)
                                    <option value="{{ $option['id'] }}"
                                        {{ $payment->payment_method_id == $option['id'] ? 'selected=""' : '' }}>
                                        {{ $option['text'] }}</option>
                                    @endforeach
                                </select>
                                <div class="d-none select-footer">
                                    <a href="{{ route('settings.payment.type.create', ['company_uid' => $currentCompany->uid]) }}"
                                        target="_blank" class="font-weight-300">+
                                        {{ __('messages.add_new_payment_method') }}</a>
                                </div>
                            </div>
 --}}

                            <div class="form-group">
                                <label for="payment_method_id">{{ __('messages.payment_type') }}</label>
                                {{-- <option disabled selected>{{ __('messages.select_customer') }}</option> --}}

                                <select id="payment_method_id" name="payment_method_id" class="select2 form-control" id="default-select-multi">
                                    <option disabled selected>{{ __('messages.select_payment_type') }}</option>

                                    @foreach(get_payment_methods_select2_array($currentCompany->id) as $option)
                                    <option value="{{ $option['id'] }}"
                                        {{ $payment->payment_method_id == $option['id'] ? 'selected=""' : '' }}>
                                        {{ $option['text'] }}</option>
                                    @endforeach
                                    
                                <option value="pay"  style="color: blue;"> <a id="payment" href="{{ route('settings.payment.type.create', ['company_uid' => $currentCompany->uid]) }}"
                                    target="_blank" class="font-weight-300">+
                                    {{ __('messages.add_new_payment_method') }}</a>
                                </option>
                                </select>
                            </div>



                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="notes">{{ __('messages.notes') }}</label>
                                <textarea name="notes" class="form-control" rows="4"
                                    placeholder="{{ __('messages.notes') }}">{{ $payment->notes }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="private_notes">{{ __('messages.private_notes') }}</label>
                                <textarea name="private_notes" class="form-control" rows="4"
                                    placeholder="{{ __('messages.private_notes') }}">{{ $payment->private_notes }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            @if($payment->getCustomFields()->count() > 0)
                            <div class="col-12">
                                @foreach ($payment->getCustomFields() as $custom_field)
                                @include('layouts._custom_field', ['model' => $payment, 'custom_field' =>
                                $custom_field])
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- @section('page_head_scripts')
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
@endsection --}}

{{-- @section('page_body_scripts')

<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>

<script>
    $('#payment').on('change', function() {
        if (this.value == "hay") {
            window.location='{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}';
            $("#pay").trigger('click');
        }
        
      });
      $('#invoice_select').on('change', function() {
        if (this.value == "hi") {
            window.location='{{ route('invoices.create', ['company_uid' => $currentCompany->uid]) }}';
            $("#inv").trigger('click');
        }
        
      });
      $('#payment_method_id').on('change', function() {
        if (this.value == "pay") {
            window.location='{{ route('settings.payment.type.create', ['company_uid' => $currentCompany->uid]) }}';
            $("#payment").trigger('click');
        }
        
      });
</script>

    

@endsection --}}
