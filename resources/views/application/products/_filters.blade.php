<form action="" method="GET">
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row my-1 mx-0">
                <div class="col-md-auto">
                    <div class="form-group">
                        <label for="filter[name]">{{ __('messages.name') }}</label>
                        <input name="filter[name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['name']) ? Request::get("filter")['name'] : '' }}" placeholder="{{ __('messages.name') }}">
                    </div>
                </div>
                {{-- <div class="col-md-auto">
                    <div class="form-group">
                        <label for="filter[unit_id]">{{ __('messages.product_unit') }}</label>
                        <select id="filter[unit_id]" name="filter[unit_id]" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="filter[unit_id]">
                            <option selected value="">{{ __('messages.select_unit') }}</option>
                            @foreach(get_product_units_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ isset(Request::get("filter")['unit_id']) && Request::get("filter")['unit_id'] == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="col-md-auto">
                    <div class="form-group">
                        <label for="filter[unit_id]">{{ __('messages.product_unit') }}</label>
                        <select id="filter[unit_id]" name="filter[unit_id]" data-toggle="select" class="form-control select2 accessible" data-select2-id="filter[unit_id]">
                            <option selected value="">{{ __('messages.select_unit') }}</option>
                            @foreach(get_product_units_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ isset(Request::get("filter")['unit_id']) && Request::get("filter")['unit_id'] == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-auto" style="margin-top: 22px;">
                  
                    <button type="submit" class="btn btn-primary ">
            
                        Refresh / {{ __('messages.filter') }}
                    </button>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 mx-1">
                    <a href="{{ route('products', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.clear_filters') }}</a>
                </div>
            </div>
        </div>
        {{-- <button type="submit" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0" style="margin-left: auto;">
            <i class="material-icons text-primary icon-20pt">refresh</i>
            {{ __('messages.filter') }}
        </button> --}}
    </div>
</form>