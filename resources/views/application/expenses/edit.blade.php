{{-- @extends('layouts.app', ['page' => 'expenses'])

@section('title', __('messages.update_expense'))
    
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.expenses') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.update_expense') }}</li>
                </ol>
            </nav>
            <h1 class="m-0 h3">{{ __('messages.update_expense') }}</h1>
        </div>
        <a href="{{ route('expenses.delete', ['expense' => $expense->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger ml-3 delete-confirm">
            <i class="material-icons">delete</i> 
            {{ __('messages.delete_expense') }}
        </a>
    </div>
@endsection
 
@section('content') 
    <form action="{{ route('expenses.update', ['expense' => $expense->id, 'company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf
        
        @include('application.expenses._form')
    </form>
@endsection --}}

@extends('layouts.app', ['page' => 'expenses'])

@section('title', __('messages.update_expense'))
 
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.expenses') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.update_expense') }}</li>
                </ol>
            </nav>
            <h1 class="m-0 h3">{{ __('messages.update_expense') }}</h1>
        </div>
        <a href="{{ route('expenses.delete', ['expense' => $expense->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger ml-3 delete-confirm">
            <i class="material-icons">delete</i> 
            {{ __('messages.delete_expense') }}
        </a>
    </div>
@endsection

@section('content')
<form action="{{ route('expenses.update', ['expense' => $expense->id, 'company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf

        {{-- @include('application.expenses._form') --}}
        <div class="card card-form">
            <div class="row no-gutters card-form__body card-body bg-white">
        
                <div class="col-md-4 pr-2">
                    <div class="form-group required select-container">
                        <label for="customer">Payee</label>
                        <select id="" name="supplier_id" data-toggle="select"
                            class="form-control select2 select2-hidden-accessible select-with-footer" data-select2-id="">
                            <option disabled selected>Select Supplier</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $expense->supplier->display_name ? 'selected=""' : '' }}>
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
                                <option value="{{ $value->id }}" {{ $expense->paymentmethod->name ? 'selected=""' : '' }}>
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
                             <option value="{{ $value->id }}" {{ $expense->account->name ? 'selected=""' : '' }}>
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
                                            {{-- <input type="text" name="total[]" class="price_input price-text amount_price" value="{{  $item->total }}" readonly> --}}

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
                                    
                                        <td class="select-container"  style="padding-right: 103px;">
                                            {{-- <select id="expense_category_id" name="expense_category_id" data-toggle="select" class="form-control select2 select-with-footer" data-select2-id="expense_category_id" data-minimum-results-for-search="-1" required>
                                                <option disabled selected>{{ __('messages.select_category') }}</option>
                                                @foreach(get_expense_categories_select2_array($currentCompany->id) as $option)
                                                    <option value="{{ $option['id'] }}" {{ $expense->expense_category_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                                                @endforeach
                                            </select> --}}
                                            <select name="expense_category_id[]" class="form-control priceListener select-with-footer" style="padding-right: 103px;" required>
                                                <option disabled selected>Select Category</option>
                                                <option value="{{ $item->expense_category_id }}" {{ $item->category->name ? 'selected=""' : '' }}>{{$item->category->name ?? '' }}</option>
                                            </select>
                                            <div class="d-none select-footer">
                                                {{-- <a href="{{ route('settings.expense_categories.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_expense_category') }}</a> --}}
                                                <a data-toggle="modal" data-target="#categoryModal" class="font-weight-300">+ Add Category</a>
                                            </div>
                                        </td>
                                        <td>
                                            <input hidden name="quantity[]" type="number" class="form-control priceListener" value="1" required>
                                            <input name="description[]" type="text" class="form-control priceListener" value="{{ $item->description }}" required>
                                        </td>
                                        <td>
                                            <input name="price[]" type="text" class="form-control price_input priceListener" autocomplete="off" value="{{ $item->price }}" required>
                                        </td>
                                        <td class="text-right">
                                            <p class="mb-1">
                                                <input type="text" name="total[]" class="price_input price-text amount_price" value="{{ $item->total }}" readonly>
                                                {{-- <input type="text" name="total[]" class="price_input price-text amount_price" value="{{  $item->total }}" readonly> --}}
    
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
                        <input name="attachment" id="attachment12" type="file" class="form-control" value="{{ $expense->attachment }}">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($expense->attachment) }}" style="height:100px; width:100px;" alt="">
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
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('suppliers.expense.store', ['company_uid' => $currentCompany->uid]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Supplier</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label for="display_name">Name</label>
                                            <input name="name" id="name" type="text" class="form-control"
                                                placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label for="email">{{ __('messages.email') }}</label>
                                            <input name="email" id="email" type="email" class="form-control"
                                                placeholder="{{ __('messages.email') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label for="email">Company</label>
                                            <input name="company" id="company" type="text" class="form-control"
                                                placeholder="Enter Company"
                                                required>
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
                                            <label for="display_name">{{ __('messages.display_name') }}</label>
                                            <input name="display_name" id="display_name" type="text" class="form-control"
                                                placeholder="{{ __('messages.display_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label for="display_name">Website</label>
                                            <input name="website" id="website" type="url" class="form-control"
                                                placeholder="Enter Website" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label for="display_name">Billing rate (/hr)</label>
                                            <input name="billing_rate" id="billing_rate" type="text" class="form-control"
                                                placeholder="Enter Billing rate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="website">PAN No.</label>
                                            <input name="pan_number" id="pan_number" type="text" class="form-control"
                                                placeholder="Pan Number">
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
                                                    <option value="3">Overseas</option>
                                                    <option value="4">SEZ</option>
            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">GSTIN</label>
                                            <input name="gstin" id="gstin" type="text" class="form-control"
                                                placeholder="GST Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Apply TDS for this supplier</label>
                                        <input class="btn checkbox" type="checkbox" value="Checkout" id="checkbox" name="checkout" />
                                    </div>
                                    <div class="shownDiv col-12" style="display:none;">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="gst_type">Entity</label>
                                                    <select name="tds_entity" id="tds_entity" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible" data-select2-id="tds_entity"
                                                        required>
                                                            <option value="0">Resident Individual/HUF</option>
                                                            <option value="1">Resident Other</option>
                                                            <option value="2">NRI Individual/HUF</option>
                                                            <option value="3">NRI Other</option>
                    
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="gst_type">Section</label>
                                                    <select name="tds_section" id="tds_section" data-toggle="select"
                                                        class="form-control select2 select2-hidden-accessible" data-select2-id="tds_section"
                                                        required>
                                                            <option value="0">Not Applicable</option>
                                                            <option value="1">192-Salaries</option>
                                                            <option value="2">193-Interest on debentures</option>
                                                            <option value="3">194-Deemed Dividend</option>
                                                            <option value="4">194-Dividend</option>
                                                            <option value="5">194A-Interest by Bank</option>
                                                            <option value="6">194A-Interest by Others</option>
                                                            <option value="7">194B-Lottery / Crossword puzzle</option>
                                                            <option value="8">194BB-Winnings from Horse Race</option>
                                                            <option value="9">194C(1)-Contracts</option>
                                                            <option value="10">194C(2)-Sub-Contracts / Advertisements</option>
                                                            <option value="11">194D-Insurance Commission to a resident</option>
                                                            <option value="12">194E-Payment to Non-resident sports association</option>
                                                            <option value="13">194EE-Payments out of deposits under NSS</option>
                                                            <option value="14">194F-Repurchase of Units by MF / UTI</option>
                                                            <option value="15">194G-Commission on sale of Lottery Tickets</option>
                                                            <option value="16">194H-Commission on Brokerage</option>
                                                            <option value="17">194I-(1)-Rent-Land and building</option>
                                                            <option value="18">194I-(2)-Rent-Plant and Machinery</option>
                                                            <option value="19">194IA-Transfer of immovable property</option>
                                                            <option value="20">194J-(1)-Fees for Professional and Technical Services</option>
                                                            <option value="21">194J-(2)-Remuneration to Director</option>
                                                            <option value="22">194LA-Compensation on immovable property</option>
                                                            <option value="23">194LB-Interest on Infrastructure debt fund</option>
                                                            <option value="24">194LC-Interest from Indian Company</option>
                                                            <option value="25">194LD-Interest on certain bonds and Govt. Securities</option>
                                                            <option value="26">195-Payment to Non-resident: -a. Income of Foreign Exchange assets</option>
                                                            <option value="27">195-Payment to Non-resident: -b. LTCG u/s 115E or 112(1)(c)(iii)</option>
                                                            <option value="28">195-Payment to Non-resident: -c. Income by way of STCG 111A</option>
                                                            <option value="29">195-Payment to Non-resident: -d. Any Other LTCG</option>
                                                            <option value="30">195-Payment to Non-resident: -e.Payment to Interest</option>
                                                            <option value="31">195-Payment to Non-resident: -f. Royalty</option>
                                                            <option value="32">195-Payment to Non-resident: -g. Other Royalty, agreement before April 1976</option>
                                                            <option value="33">195-Payment to Non-resident: -g. Other Royalty, agreement after April 1976</option>
                                                            <option value="34">195-Payment to Non-resident: -h. Technical fees, agreement before April 1976</option>
                                                            <option value="35">195-Payment to Non-resident: -h. Technical fees, agreement after April 1976</option>
                                                            <option value="36">195-Payment to Non-resident: -i. Any other income</option>
                                                            <option value="37">196-Payment to government / Reserve bank / Other Corporations</option>
                                                            <option value="38">196B-Income from Units</option>
                                                            <option value="39">196C-Income from foreign currency bonds or shares of Indian Company</option>
                                                            <option value="40">196D-Income of Foreign Institutional Investors from Securities</option>
                                                            <option value="41">196A-Income for units of Non Residents</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">Notes</label>
                                            <input name="notes" id="notes" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">Opening balance</label>
                                            <input name="balance" id="balance" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">as of</label>
                                            <input name="balance_date" id="balance_date" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">Account no.</label>
                                            <input name="account_number" id="account_number" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">Tax Registration Number</label>
                                            <input name="tax_reg_number" id="tax_reg_number" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">Effective Date</label>
                                            <input name="effective_date" id="effective_date" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vat_number">Attachment</label>
                                            <input name="attachment" id="attachment" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Address</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label>Address</label>
                                            <input name="address" id="address" type="text" class="form-control"
                                                placeholder="{{ __('messages.address_name') }}" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label>State</label>
                                            <input name="state" id="state" type="text" class="form-control"
                                                placeholder="state" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label>City</label>
                                            <input name="city" id="city" type="text" class="form-control"
                                                placeholder="city" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label>Country</label>
                                            <input name="country" id="country" type="text" class="form-control"
                                                placeholder="country" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group required">
                                            <label>Pin Code</label>
                                            <input name="pin_code" id="pin_code" type="text" class="form-control"
                                                placeholder="pin code" required>
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


    <!--Method Modal -->
    <div class="modal fade" id="typeModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Payment Method</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('settings.payment.expense.type.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Payment Method</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}" required>
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

    <!--Account Modal -->
    <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Payment Account</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('settings.accounts.expense.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Payment Account</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">As of Date</label>
                                                    <input name="as_date" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="account_type">Account Type</label>
                                        
                                                    <select id="account_type" class="select2 form-control" name="account_type" id="default-select-multi">
                                                        <option disabled selected>Select Account Type</option>
                                                        <option value="0">Account receivable (Debtors)</option>
                                                        <option value="1">Current assets</option>
                                                        <option value="2">Bank</option>
                                                        <option value="3">Fixed assets</option>
                                                        <option value="4">Non-current assets </option>
                                                        <option value="5">Accounts payable (Creditors)</option>
                                                        <option value="6">Credit Card</option>
                                                        <option value="7">Current liabilities</option>
                                                        <option value="8">Non-current liabilities</option>
                                                        <option value="9">Equity</option>
                                                        <option value="10">Income</option>
                                                        <option value="11">Other Income</option>
                                                        <option value="12">Cost of Goods sold</option>
                                                        <option value="13">Expense</option>
                                                        <option value="14">Other expense</option>
                                         
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="detail_type">Detail Type</label>
                                        
                                                    <select id="detail_id" class="select2 form-control" name="detail_id" id="default-select-multi">
                                                        <option disabled selected>Select Detail</option>
                                                        @foreach ($details as $detail)
                                                        <option value="{{ $detail->id }}">{{ $detail->name}}</option>
                                                    @endforeach
                                                    {{-- <option value="acc" style="color: blue;"> <a id="det"
                                                            href="{{ route('settings.account_details.create', ['company_uid' => $currentCompany->uid]) }}"
                                                            target="_blank" class="font-weight-300">+
                                                            Add new Details</a></option> --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">Balance</label>
                                                    <input name="balance" type="number" class="form-control" required>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="price">Default Tax</label>
                                        
                                                    <select id="tax" class="select2 form-control" id="default-select-multi" >
                                                        <option disabled selected>Select Tax</option>
                                                        <option value="0">18.0% IGST</option>
                                                        <option value="1">14.0% ST</option>
                                                        <option value="2">0% IGST</option>
                                                        <option value="3">Out of Scope</option>
                                                        <option value="4">0% GST</option>
                                                        <option value="5">14.5% ST</option>
                                                        <option value="6">14.0% VAT</option>
                                                        <option value="7">6.0% IGST</option>
                                                        <option value="8">28.0% IGST</option>
                                                        <option value="9">15.0% ST</option>
                                                        <option value="10">28.0% GST</option>
                                                        <option value="11">12.0% GST</option>
                                                        <option value="12">18.0% GST</option>
                                                        <option value="13">3.0% GST</option>
                                                        <option value="14">0.25% IGST</option>
                                                        <option value="15">Exempt IGST</option>
                                                        <option value="16">4.0% VAT</option>
                                                        <option value="17">5.0% GST</option>
                                                        <option value="18">12.36% ST</option>
                                                        <option value="19">5.0% GST</option>
                                                        <option value="20">Exempt GST</option>
                                                        <option value="21">12.0% IGST</option>
                                                        <option value="22">12.0% IGST</option>
                                                        <option value="23">2.0% GST</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('messages.description') }}</label>
                                                    <textarea name="description" class="form-control" cols="30" rows="3"></textarea>
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

    <!--Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('settings.expense_categories.expense.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Category</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('messages.description') }}</label>
                                                    <textarea name="description" class="form-control" rows="4" placeholder="{{ __('messages.description') }}"></textarea>
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
                    <form action="{{ route('settings.tax.expense.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
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
    $(document).ready(function() {
    $('.checkbox').on('change', function() {
        console.log('changed');
        $('.shownDiv').toggle();
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
