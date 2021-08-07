@extends('layouts.app', ['page' => 'suppliers'])

@section('title', 'Create Supplier')
 
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('suppliers', ['company_uid' => $currentCompany->uid]) }}">Supplier</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Supplier</li>
                </ol>
            </nav>
            <h1 class="m-0">Create Supplier</h1>
        </div>
    </div>
@endsection
 
@section('content') 
    <form action="{{ route('suppliers.store', ['company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf
        
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
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
            </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
            </div>
             
            </div>
            </div>
        </section>
    </form>
@endsection

@section('page_head_scripts')

<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href={{asset('theme/app-assets/css/pages/app-invoice.css') }}"> --}}
<style>
    .select2-selection__arrow {
        display: none;
    }
</style>

@endsection

@section('page_body_scripts')
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script>
    $(document).ready(function() {
    $('.checkbox').on('change', function() {
        console.log('changed');
        $('.shownDiv').toggle();
    });
});
</script>

{{-- <script src="{{asset('theme/app-assets/js/scripts/pages/app-invoice.js') }}"></script> --}}
@endsection