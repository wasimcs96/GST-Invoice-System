<div class="card card-form container-fluid">
    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{ __('messages.payment_information') }}</strong></p>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group required">
                        <label for="payment_date">{{ __('messages.payment_date') }}</label>
                        <input name="payment_date" type="date" class="form-control input" data-toggle="flatpickr" data-flatpickr-default-date="{{ $payment->payment_date ?? now() }}" placeholder="{{ __('messages.payment_date') }}" required>
                    </div>
                </div>
                <div class="col"> 
                    <div class="form-group required">
                        <label for="payment_number">{{ __('messages.payment_number') }}</label>
                        <div class="input-group">
                            <input name="payment_prefix" type="hidden" value="{{ $payment->payment_prefix }}">
                            <input name="payment_number" type="text" maxlength="6" class="form-control form-control-prepended" value="{{ $payment->payment_num }}" autocomplete="off" required>
                            {{-- <div class="input-group-prepend"> --}}
                                <div class="input-group-text">
                                    {{ $payment->payment_prefix }}
                                </div>
                            {{-- </div> --}}
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
                        <select id="payment_method_id" name="payment_method_id" data-toggle="select" class="form-control select2-hidden-accessible select2 select-with-footer" data-minimum-results-for-search="-1" data-select2-id="payment_method_id">
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
</div>
