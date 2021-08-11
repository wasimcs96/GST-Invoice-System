<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group required">
            <label for="name">{{ __('messages.name') }}</label>
            <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}" value="{{ $accounts->name}}"
                required>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group required">
            <label for="name">As of Date</label>
            <input name="as_date" type="date" class="form-control" value="{{ $accounts->as_date}}" required>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="account_type">Account Type</label>

            <select id="account_type" class="select2 form-control" name="account_type" id="default-select-multi">
                <option disabled selected>Select Account Type</option>
                <option value="0" @if(isset($accounts->account_type) && $accounts->account_type==0)selected @endif>Account receivable (Debtors)</option>
                <option value="1" @if(isset($accounts->account_type) && $accounts->account_type==1)selected @endif>Current assets</option>
                <option value="2" @if(isset($accounts->account_type) && $accounts->account_type==2)selected @endif>Bank</option>
                <option value="3" @if(isset($accounts->account_type) && $accounts->account_type==3)selected @endif>Fixed assets</option>
                <option value="4" @if(isset($accounts->account_type) && $accounts->account_type==4)selected @endif>Non-current assets </option>
                <option value="5" @if(isset($accounts->account_type) && $accounts->account_type==5)selected @endif>Accounts payable (Creditors)</option>
                <option value="6" @if(isset($accounts->account_type) && $accounts->account_type==6)selected @endif>Credit Card</option>
                <option value="7" @if(isset($accounts->account_type) && $accounts->account_type==7)selected @endif>Current liabilities</option>
                <option value="8" @if(isset($accounts->account_type) && $accounts->account_type==8)selected @endif>Non-current liabilities</option>
                <option value="9" @if(isset($accounts->account_type) && $accounts->account_type==9)selected @endif>Equity</option>
                <option value="10" @if(isset($accounts->account_type) && $accounts->account_type==10)selected @endif>Income</option>
                <option value="11" @if(isset($accounts->account_type) && $accounts->account_type==11)selected @endif>Other Income</option>
                <option value="12" @if(isset($accounts->account_type) && $accounts->account_type==12)selected @endif>Cost of Goods sold</option>
                <option value="13" @if(isset($accounts->account_type) && $accounts->account_type==13)selected @endif>Expense</option>
                <option value="14" @if(isset($accounts->account_type) && $accounts->account_type==14)selected @endif>Other expense</option>
 
              
            </select>
        </div>
    </div>
 
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="detail_type">Detail Type</label>

            <select id="detail_id" class="select2 form-control" name="detail_id" value="{{ $accounts->detail_type }}" id="default-select-multi">
                <option disabled selected>Select Detail</option>
                @foreach ($details as $detail)
                <option value="{{ $detail->id }}">{{ $detail->name}}</option>
            @endforeach
            <option value="acc" style="color: blue;"> <a id="det"
                    href="{{ route('settings.account_details.create', ['company_uid' => $currentCompany->uid]) }}"
                    target="_blank" class="font-weight-300">+
                    Add new Details</a></option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group required">
            <label for="name">Balance</label>
            <input name="balance" type="number" class="form-control" value="{{ $accounts->balance }}" required>
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
                {{-- @foreach (get_tax_types_select2_array($currentCompany->id) as $option)
                    <option value="{{ $option['id'] }}"
                        data-percent="{{ $option['percent'] }}"
                        {{ $product->hasTax($option['id']) ? 'selected=""' : '' }}>
                        {{ $option['text'] }}</option>
                @endforeach --}}
                {{-- <option value="hel" style="color: blue;"> <a id="pro"
                        href="{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}"
                        target="_blank" class="font-weight-300">+
                        {{ __('messages.add_new_tax') }}</a></option> --}}
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
