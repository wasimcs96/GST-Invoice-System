<div class="row">
  <div class="col-md-6 col-12">
        <div class="form-group required">
            <label for="name">{{ __('messages.name') }}</label>
            <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}" value="" required>
        </div>
  </div>
    <div class="col-md-6 col-12">
        <div class="form-group required">
            <label for="name">As of Date</label>
            <input name="name" type="date" class="form-control" value="" required>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group required">
            <label for="name">Balance</label>
            <input name="name" type="number" class="form-control" value="" required>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="account_type">Account Type</label>

            <select id="account_type" class="select2 form-control" name="account_type"
                id="default-select-multi">
               

                {{-- @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach --}}
                {{-- <option value="cate" style="color: blue;"> <a id="cato"
                    href="{{ route('settings.product_categories', ['company_uid' => $currentCompany->uid]) }}""
                        target="_blank" class="font-weight-300">+
                       Add new Category</a></option> --}}
            </select>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="price">Default Tax</label>

            <select id="taxess" class="select2 form-control" 
                id="default-select-multi">
                <option disabled selected>Select Tax</option>
                <option value="0">18.0% IGST</option>
                <option value="1">14.0% ST</option>
                <option value="0">0% IGST</option>
                <option value="1">Out of Scope</option>
                <option value="0">0% GST</option>
                <option value="1">14.5% ST</option>
                <option value="0">14.0% VAT</option>
                <option value="1">6.0% IGST</option>
                <option value="0">28.0% IGST</option>
                <option value="1">15.0% ST</option>
                <option value="0">28.0% GST</option>
                <option value="1">12.0% GST</option>
                <option value="0">18.0% GST</option>
                <option value="1">3.0% GST</option>
                <option value="0">0.25% IGST</option>
                <option value="1">Exempt IGST</option>
                <option value="0">4.0% VAT</option>
                <option value="1">5.0% GST</option>
                <option value="0">12.36% ST</option>
                <option value="0">5.0% GST</option>
                <option value="1">Exempt GST</option>
                <option value="0">12.0% IGST</option>
                <option value="1">12.0% IGST</option>
                <option value="0">2.0% GST</option>
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
            <label for="detail_type">Detail Type</label>

            <select id="detail_type" class="select2 form-control" name="detail_type"
                id="default-select-multi">
                <option disabled selected>Select Detail</option>
                {{-- @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach --}}
                {{-- <option value="cate" style="color: blue;"> <a id="cato"
                    href="{{ route('settings.product_categories', ['company_uid' => $currentCompany->uid]) }}""
                        target="_blank" class="font-weight-300">+
                       Add new Category</a></option> --}}
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

