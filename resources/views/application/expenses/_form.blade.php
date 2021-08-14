<div class="card card-form">
    <div class="row no-gutters card-form__body card-body bg-white">

        <div class="col-md-4 pr-2">
            <div class="form-group required select-container">
                <label for="customer">Payee</label>
                <select id="" name="supplier_id" data-toggle="select"
                    class="form-control select2 select2-hidden-accessible select-with-footer" data-select2-id="">
                    <option disabled selected>Select Supplier</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">
                        {{ $supplier->display_name }}
                    </option>
                    @endforeach
                    
                </select>
                <div class="d-none select-footer">
                    <a class="font-weight-300" data-toggle="modal" data-target="#exampleModal">+
                        Add Supplier</a>
                </div>
                
            </div>  
        </div>

        <div class="col-md-4 pr-4 pl-4">
            <div class="form-group required">
                <label for="payment_date">Payment Date</label>
                <input name="payment_date" type="date" class="form-control input" data-toggle="flatpickr" data-flatpickr-default-date="{{ $expense->payment_date ?? now() }}" value="{{ $expense->payment_date}}" required>
            </div>
            <div class="form-group required select-container">
                <label for="customer">Payment Method</label>
                <select id="payment_method" name="payment_method" data-toggle="select" class="form-control select2 select2-hidden-accessible select-with-footer"
                 {{-- data-select2-id="customer" --}}
                 >
                    <option disabled selected>Select Payment Method</option>
                    @foreach($paymethod as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->name }}
                        </option>
                    @endforeach
                </select> 
                <div class="d-none select-footer">
                    <a data-toggle="modal" data-target="#typeModal" class="font-weight-300">+ Add Payment Method</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 pl-4">
            <div class="form-group">
                <label for="reference_number">{{ __('messages.reference_number') }}</label>
                <div class="input-group input-group-merge">
                    <input name="reference_number" type="text" maxlength="6" class="form-control form-control-prepended" value="{{ $expense->reference_number }}" autocomplete="off">
                    {{-- <div class="input-group-prepend"> --}}
                        <div class="input-group-text">
                            #
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
            {{-- {{ dd($account) }} --}}

            <div class="form-group required select-container">
                <label for="customer">Payment Account</label>
                <select id="payment_account_id" name="payment_account_id" data-toggle="select" class="form-control select2 select2-hidden-accessible select-with-footer"
                 >
                 <option disabled selected>Select Payment Account</option>
                 @foreach($account as $value)
                     <option value="{{ $value->id }}">
                         {{ $value->name }}
                     </option>
                 @endforeach
                </select>  
                <div class="d-none select-footer">
                    <a data-toggle="modal" data-target="#accountModal" class="font-weight-300">+ Add Payment Account</a>
                </div>   
            </div>
        </div>
 
        <div class="col-12 mt-5">
            <div class="table-responsive" data-toggle="lists">
                <table class="table table-xl mb-0 thead-border-top-0 table-striped">
                    <thead>
                        <tr>
                                <th class="w-30">{{ __('messages.category') }}</th>
                                <th class="w-10">{{ __('messages.description') }}</th>
                                <th class="w-15">{{ __('messages.price') }}</th>
                                <th class="text-right w-10" style="padding-right: 143px;">{{ __('messages.amount') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="items">
                        <tr id="product_row_template" class="d-none">
                            
                            <td class="select-container"  style="padding-right: 103px;">
                                {{-- <select id="expense_category_id" name="expense_category_id" data-toggle="select" class="form-control select2 select-with-footer" data-select2-id="expense_category_id" data-minimum-results-for-search="-1" required>
                                    <option disabled selected>{{ __('messages.select_category') }}</option>
                                    @foreach(get_expense_categories_select2_array($currentCompany->id) as $option)
                                        <option value="{{ $option['id'] }}" {{ $expense->expense_category_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                                    @endforeach
                                </select> --}}
                                <select name="expense_category_id[]" class="form-control priceListener select-with-footer" style="padding-right: 103px;" required>
                                    <option disabled selected>Select Category</option>
                                </select>
                                <div class="d-none select-footer">
                                    {{-- <a href="{{ route('settings.expense_categories.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_expense_category') }}</a> --}}
                                    <a data-toggle="modal" data-target="#categoryModal" class="font-weight-300">+ Add Category</a>
                                </div>
                            </td>
                            <td>
                                <input hidden name="quantity[]" type="number" class="form-control priceListener" value="1" required>
                                <input name="description[]" type="text" class="form-control priceListener" required>
                            </td>
                            <td>
                                <input name="price[]" type="text" class="form-control price_input priceListener" autocomplete="off" value="0" required>
                            </td>
                            <td class="text-right">
                                <p class="mb-1">
                                    <input type="text" name="total[]" class="price_input price-text amount_price" value="0" readonly>
                                    {{-- <input type="text" name="total[]" class="price_input price-text amount_price" value="{{ $item->total }}" readonly> --}}

                                </p>
                                <div class="tax_list"></div>
                            </td>
                            <td>
                                <a onclick="removeRow(this)">
                                    <i data-feather="x"></i>
                                </a>
                            </td>
                        </tr>

                        @if($expense->items->count() > 0)
                            @foreach($expense->items as $item)
                                <tr>
                                    <td class="select-container">
                                        <select name="expense_category_id[]" class="form-control priceListener select-with-footer" required>
                                            <option value="{{ $item->expense_category_id }}" {{ $item->category->name ? 'selected=""' : '' }}>{{ $item->category->name }}</option>
                                        </select>
                                        <div class="d-none select-footer">
                                            <a data-toggle="modal" data-target="#categoryModal" class="font-weight-300">+ Add Category</a>
                                        </div>
                                    </td>
                                    <td>
                                        <input hidden name="quantity[]" type="number" class="form-control priceListener" value="{{ $item->quantity }}" required>
                                        <input name="description[]" type="text" class="form-control priceListener" value="{{ $item->description }}" required>
                                    </td>
                                    <td>
                                        <input name="price[]" type="text" class="form-control price_input priceListener" autocomplete="off" value="{{ $item->price }}" required>
                                    </td>
                                    <td class="text-right">
                                        <p class="mb-1">
                                            <input type="text" name="total[]" class="price_input price-text amount_price" value="{{ $item->total }}" readonly>
                                        </p>
                                        <div class="tax_list"></div>
                                    </td>
                                    <td>
                                        <a onclick="removeRow(this)">
                                            <i data-feather="x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div>
            <div class="row card-body pagination-light justify-content-center text-center">
                <button id="add_product_row" type="button" class="btn btn-light">
                    <i data-feather="plus"></i> Add
                </button>
            </div>
        </div>

        <div class="col-md-5 mt-5 pr-4">
            <div class="form-group">
                <label for="vat_number">Attachment</label>
                <input name="attachment" id="attachment" type="file" class="form-control" value="{{ $expense->attachment }}">
            </div>
        </div>

        <div class="col-md-4 offset-md-3 mt-5 pl-4">
            <div class="card card-body shadow-none border">

                <div class="d-flex align-items-center mb-3">
                    <div class="h6 mb-0 w-50">
                        <strong class="text-muted">{{ __('messages.sub_total') }}</strong>
                    </div>
                    <div class="ml-auto h6 mb-0">
                        <input id="sub_total" name="sub_total" type="text" class="price_input price-text w-100 fs-inherit" value="{{ $expense->sub_total ?? 0 }}" readonly>
                    </div>
                </div>

                @if($tax_per_item == false)
                    <div class="row mb-1">
                        <div class="col-12 h6 mb-1">
                            <strong class="text-muted">{{ __('messages.taxes') }}</strong>
                        </div>
                        <div class="col-12 h6 mb-0">
                            <div class="form-group select-container">
                                <select id="total_taxes" name="total_taxes[]" data-toggle="select" multiple class="form-control priceListener select-with-footer select2" data-select2-id="total_taxes">
                                    @foreach(get_tax_types_select2_array($currentCompany->id) as $option)
                                        <option value="{{ $option['id'] }}" data-percent="{{ $option['percent'] }}" {{ $expense->hasTax($option['id']) ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                                    @endforeach
                                </select> 
                                <div class="d-none select-footer">
                                    <a data-toggle="modal" data-target="#taxModal" class="font-weight-300">+ {{ __('messages.add_new_tax') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endif

                <div class="total_tax_list"></div>

                <hr>
                <div class="d-flex align-items-center mb-3">
                    <div class="h5 mb-0">
                        <strong class="text-muted">{{ __('messages.total') }}</strong>
                    </div>
                    <div class="ml-auto h5 mb-0">
                        <input id="grand_total" name="grand_total" type="text" class="price_input price-text w-100 fs-inherit" value="{{ $expense->total ?? 0 }}" readonly>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="col-12 text-center float-right mt-3">
            <button type="button" class="btn btn-primary save_form_button">{{ __('messages.save_expense') }}</button>
        </div>
    </div>
</div>
