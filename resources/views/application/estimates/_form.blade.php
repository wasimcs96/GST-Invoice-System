




<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('messages.expense_information') }}</h4>
                    <p class="text-muted">{{ __('messages.basic_expense_information') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                                         
                       <div class="col-md-6 col-12">
                            <div class="form-group required select-container">
                                <label for="customer">{{ __('messages.customer') }}</label>
                                <select id="customer" onchange="customerselect()" id="customerselect" name="customer_id" data-toggle="select"
                                    class="form-control select2-hidden-accessible select-with-footer"
                                    data-select2-id="customer">
                                    <option disabled selected>{{ __('messages.select_customer') }}</option>
                                    
                                    @if($estimate->customer_id)
                                    <option value="{{ $estimate->customer_id }}" selected=""
                                        data-currency="{{ $estimate->customer->currency }}"
                                        data-billing_address="{{$estimate->customer->displayLongAddress('billing')}}"
                                        data-shipping_address="{{$estimate->customer->displayLongAddress('shipping')}}">
                                        {{ $estimate->customer->display_name }}
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




                            
                            <div id="address_component" class="form-row d-none">
                                <div class="col-6">
                                    <strong>{{ __('messages.bill_to') }}:</strong>
                                    <p id="billing_address"></p>
                                </div>
                                <div class="col-6">
                                    <strong>{{ __('messages.ship_to') }}:</strong>
                                    <p id="shipping_address"></p>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="expiry_date">{{ __('messages.expiry_date') }}</label>
                                <input name="expiry_date" type="date" class="form-control input" data-toggle="flatpickr"
                                    data-flatpickr-default-date="{{ $estimate->expiry_date ?? now() }}" required>
                            </div>
                            <div class="form-group">
                                <label for="reference_number">{{ __('messages.reference_number') }}</label>
                                <div class="input-group input-group-merge">
                                    <input name="reference_number" type="text" maxlength="6"
                                        class="form-control form-control-prepended"
                                        value="{{ $estimate->reference_number }}" autocomplete="off">
                                    <!-- <div class="input-group-prepend"> -->
                                    <div class="input-group-text">
                                        #
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="estimate_date">{{ __('messages.estimate_date') }}</label>
                                <input name="estimate_date" type="date" class="form-control input"
                                    data-toggle="flatpickr"
                                    data-flatpickr-default-date="{{ $estimate->estimate_date ?? now() }}" required>
                            </div>
                            <div class="form-group required">
                                <label for="estimate_number">{{ __('messages.estimate_number') }}</label>
                                <div class="input-group">
                                    <input name="estimate_prefix" type="hidden"
                                        value="{{ $estimate->estimate_prefix }}">
                                    <input name="estimate_number" type="text" maxlength="6"
                                        class="form-control form-control-prepended"
                                        value="{{ $estimate->estimate_num }}" autocomplete="off" required>
                                    <!-- <div class="input-group-prepend"> -->
                                    <div class="input-group-text">
                                        {{ $estimate->estimate_prefix }}
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-12">
                            <div class="table-responsive" data-toggle="lists">



                                <table class="table table-xl mb-0 thead-border-top-0 table-striped">
                                    <thead>
                                        <tr>
                                            @if($tax_per_item and $discount_per_item)
                                                <th class="w-30">{{ __('messages.product') }}</th>
                                                <th class="w-20">{{ __('messages.taxes') }}</th>
                                                <th class="w-10">{{ __('messages.quantity') }}</th>
                                                <th class="w-15">{{ __('messages.price') }}</th>
                                                <th class="w-15">{{ __('messages.discount') }}</th>
                                                <th class="text-right w-10" style="padding-right: 140px;">{{ __('messages.amount') }}</th>
                                            @elseif($tax_per_item and !$discount_per_item)
                                                <th class="w-40">{{ __('messages.product') }}</th>
                                                <th class="w-25">{{ __('messages.taxes') }}</th>
                                                <th class="w-10">{{ __('messages.quantity') }}</th>
                                                <th class="w-15">{{ __('messages.price') }}</th>
                                                <th class="text-right w-10" style="padding-right: 140px;">{{ __('messages.amount') }}</th>
                                            @elseif(!$tax_per_item and $discount_per_item)
                                                <th class="w-40">{{ __('messages.product') }}</th>
                                                <th class="w-10">{{ __('messages.quantity') }}</th>
                                                <th class="w-20">{{ __('messages.price') }}</th>
                                                <th class="w-20">{{ __('messages.discount') }}</th>
                                                <th class="text-right w-10" style="padding-right: 140px;">{{ __('messages.amount') }}</th>
                                            @elseif(!$tax_per_item and !$discount_per_item)
                                                <th class="w-60">{{ __('messages.product') }}</th>
                                                <th class="w-10">{{ __('messages.quantity') }}</th>
                                                <th class="w-20">{{ __('messages.price') }}</th>
                                                <th class="text-right w-10"  style="padding-right: 140px;">{{ __('messages.amount') }}</th>
                                            @endif
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="items">
                                        <tr id="product_row_template" class="d-none">
                                            <td class="select-container col md-4">
                                                <select name="product[]"
                                                    class="form-control priceListener select-with-footer" required>
                                                    <option disabled selected>{{ __('messages.select_product') }}
                                                    </option>
                                                </select>
                                                <div class="d-none select-footer">
                                                    <a href="{{ route('products.create', ['company_uid' => $currentCompany->uid]) }}"
                                                        target="_blank" class="font-weight-300">+
                                                        {{ __('messages.add_new_product') }}</a>
                                                </div>
                                            </td>

                                            {{-- <td class="select-container">
                                                <select name="product[]" class="form-control priceListener select-with-footer"  required>
                                                    <option disabled selected>{{ __('messages.select_product') }}</option>
                                                </select>
                                                <div class="d-none select-footer">
                                                    <a href="{{ route('products.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_product') }}</a>
                                                </div>
                                            </td> --}}

                                            @if($tax_per_item)
                                            <td class="select-container">
                                                <select name="taxes[]" multiple
                                                    class="form-control priceListener select-with-footer">
                                                    @foreach(get_tax_types_select2_array($currentCompany->id) as
                                                    $option)
                                                    <option value="{{ $option['id'] }}"
                                                        data-percent="{{ $option['percent'] }}">{{ $option['text'] }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <div class="d-none select-footer">
                                                    <a href="{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}"
                                                        target="_blank" class="font-weight-300">+
                                                        {{ __('messages.add_new_tax') }}</a>
                                                </div>
                                            </td>
                                            @endif
                                            <td>
                                                <input name="quantity[]" type="number"
                                                    class="form-control priceListener" value="1" required>
                                            </td>
                                            <td>
                                                <input name="price[]" type="text"
                                                    class="form-control price_input priceListener" autocomplete="off"
                                                    value="0" required>
                                            </td>
                                            @if($discount_per_item)
                                            <td>
                                                <div class="input-group input-group-merge">
                                                    <input name="discount[]" type="number"
                                                        class="form-control form-control-prepended priceListener"
                                                        value="0">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            %
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
                                            <td class="text-right">
                                                <p class="mb-1">
                                                    <input type="text" name="total[]"
                                                        class="price_input price-text amount_price" value="$0" readonly>
                                                </p>
                                                <div class="tax_list"></div>
                                            </td>
                                            
                                            <td>
                                                <a onclick="removeRow(this)">
                                                    <i class="material-icons icon-16pt">clear</i>
                                                </a>
                                            </td>
                                        </tr>
                                        @if($estimate->items->count() > 0)
                                        @foreach($estimate->items as $item)
                                        <tr>
                                            <td class="select-container">
                                                <select name="product[]"
                                                    class="form-control priceListener select-with-footer" required>
                                                    <option value="{{ $item->product_id }}" selected="">
                                                        {{ $item->product->name }}</option>
                                                </select>
                                                <div class="d-none select-footer">
                                                    <a href="{{ route('products.create', ['company_uid' => $currentCompany->uid]) }}"
                                                        target="_blank" class="font-weight-300">+
                                                        {{ __('messages.add_new_product') }}</a>
                                                </div>
                                            </td>
                                            @if($tax_per_item)
                                            <td class="select-container">
                                                <select name="taxes[]" multiple
                                                    class="form-control priceListener select-with-footer">
                                                    @foreach(get_tax_types_select2_array($currentCompany->id) as
                                                    $option)
                                                    <option value="{{ $option['id'] }}"
                                                        data-percent="{{ $option['percent'] }}"
                                                        {{ $item->hasTax($option['id']) ? 'selected=""' : '' }}>
                                                        {{ $option['text'] }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="d-none select-footer">
                                                    <a href="{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}"
                                                        target="_blank" class="font-weight-300">+
                                                        {{ __('messages.add_new_tax') }}</a>
                                                </div>
                                            </td>
                                            @endif
                                            <td>
                                                <input name="quantity[]" type="number"
                                                    class="form-control priceListener" value="{{ $item->quantity }}"
                                                    required>
                                            </td>
                                            <td>
                                                <input name="price[]" type="text"
                                                    class="form-control price_input priceListener" autocomplete="off"
                                                    value="{{ $item->price }}" required>
                                            </td>
                                            @if($discount_per_item)
                                            <td>
                                                <div class="input-group input-group-merge">
                                                    <input name="discount[]" type="number"
                                                        class="form-control form-control-prepended priceListener"
                                                        value="{{ $item->discount_val }}">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            %
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif

                                            <td>
                                                 <p class="mb-1">
                                                
                                                     <input type="text" name="total[]"
                                                        class="price_input price-text amount_price"
                                                        value="{{ $item->total }}" readonly>
                                                </p>
                                                 <div class="tax_list"></div>
                                                <h4>${{ $item->total }}</h4>
                                            </td>
                                            <td>
                                                <a onclick="removeRow(this)">
                                                    <i class="material-icons icon-16pt">clear</i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="row card-body pagination-light justify-content-center text-center">
                                    <button id="add_product_row" type="button" class="btn btn-light">
                                        <i data-feather="plus"></i> {{ __('messages.add_product') }}
                                    </button>
                                </div>
                            </div>
                            <!-- <div class="row card-body pagination-light justify-content-center text-center">
                                <button id="add_product_row" type="button" class="btn btn-light">
                                    <i class="material-icons icon-16pt"></i> {{ __('messages.add_product') }}
                                </button>
                            </div> -->
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="notes">{{ __('messages.notes') }}</label>
                                <textarea name="notes" class="form-control" rows="4">{{ $estimate->notes }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="private_notes">{{ __('messages.private_notes') }}</label>
                                <textarea name="private_notes" class="form-control"
                                    rows="4">{{ $estimate->private_notes }}</textarea>
                            </div>
                        </div>



                        <div class="col-md-6 col-12 my-2"  style="
                         padding-left: 147px;">

                            <div class="card card-body shadow-none border">

                                <div class="row mb-3">
                                    <div class="h6 col-md-4 mb-0 w-50">
                                        <strong class="text-muted">{{ __('messages.sub_total') }}</strong>
                                    </div>
                                    <div class="ml-auto col-md-4 h6 mb-0">
                                        <input id="sub_total" name="sub_total" type="text" class="price_input price-text w-100 fs-inherit" value="${{ $estimate->sub_total ?? 0 }}" readonly style="border: none;">

                                        {{-- <h4>${{ $estimate->sub_total ?? 0 }}</h4> --}}
                                    </div>
                                </div>

                                @if($tax_per_item == false)
                                <div class="row mb-1">
                                    {{-- <div class="col-12 h6 mb-1">
                                        <strong class="text-muted">{{ __('messages.taxes') }}</strong>
                                    </div> --}}
                                    {{-- <div class="col-12 h6 mb-0">
                                        <div class="form-group select-container">
                                            <select id="total_taxes" name="total_taxes[]" data-toggle="select" multiple
                                                class="form-control priceListener select-with-footer"
                                                data-select2-id="total_taxes">
                                                @foreach(get_tax_types_select2_array($currentCompany->id) as $option)
                                                <option value="{{ $option['id'] }}"
                                                    data-percent="{{ $option['percent'] }}"
                                                    {{ $estimate->hasTax($option['id']) ? 'selected=""' : '' }}>
                                                    {{ $option['text'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="d-none select-footer">
                                                <a href="{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}"
                                                    target="_blank" class="font-weight-300">+
                                                    {{ __('messages.add_new_tax') }}</a>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-12 mb-1">
                                        <strong class="text-muted">{{ __('messages.taxes') }}</strong>
                                        {{-- <label>Multiple</label> --}}
                                        <select id="total_taxes" name="total_taxes[]" class="select2 form-control"  data-select2-id="total_taxes" multiple>
                                            {{-- <optgroup label="Alaskan/Hawaiian Time Zone"> --}}
                                                @foreach(get_tax_types_select2_array($currentCompany->id) as $option)
                                                <option value="{{ $option['id'] }}"
                                                    data-percent="{{ $option['percent'] }}"
                                                    {{ $estimate->hasTax($option['id']) ? 'selected=""' : '' }}>
                                                    {{ $option['text'] }}</option>
                                                @endforeach
                                            
                                            <option value="hyy"> <a id="tax" href="{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}"
                                                target="_blank" class="font-weight-300">+
                                                {{ __('messages.add_new_tax') }}</a>
                                            </option>
                                        </select>
                                    </div>


                                </div>
                                @endif

                                <div class="total_tax_list"></div>

                                @if($discount_per_item == false)
                                <div class="row mt-2 mb-1">
                                    <div class="col-12 h6 mb-1">
                                        <strong class="text-muted">{{ __('messages.discount') }}</strong>
                                    </div>
                                    <div class="col-12 h6 mb-0">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <input id="total_discount" name="total_discount" type="number"
                                                    class="form-control form-control-prepended priceListener"
                                                    value="${{ $estimate->discount_val ?? 0 }}">
                                                <!-- <div class="input-group-prepend"> -->
                                                <div class="input-group-text">
                                                    %
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endif

                                <hr>
                                <!-- <div class="d-flex align-items-center mb-3"> -->
                                <div class="row mb-3">
                                    <div class="h6 col-md-4 mb-0 w-50">
                                        <strong class="text-muted">{{ __('messages.total') }}</strong>
                                    </div>
                                    <div class="ml-auto col-md-4 h6 mb-0">
                                        <input id="grand_total" name="grand_total" type="text" class="price_input price-text w-100 fs-inherit" style="border: none;" value="${{ $estimate->total ?? 0 }}" readonly>

                                        {{-- <h4>${{ $estimate->total ?? 0 }}</h4> --}}
                                    </div>
                                </div>
                                <!-- </div> -->

                            </div>

                        </div>

                        <div class="col-12">

                            {{-- <div class="col-12">
                                @if($estimate->getCustomFields()->count() > 0)
                                <div class="col-12">
                                    @foreach ($estimate->getCustomFields() as $custom_field)
                                    @include('layouts._custom_field', ['model' => $estimate, 'custom_field' =>
                                    $custom_field])
                                    @endforeach
                                </div>
                                @endif
                            </div> --}}
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
<script>
function customerselect() {
    var x = document.getElementById("customerselect").value;
    console.log(x);
    document.getElementById("demo").innerHTML = "You selected: " + x;
  }
  </script>
@endsection --}}