<form action="" method="GET">
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row mx-0 my-1">
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="filter[estimate_number]">{{ __('messages.estimate_number') }}</label>
                        <input name="filter[estimate_number]" type="text" class="form-control" value="{{ isset(Request::get("filter")['estimate_number']) ? Request::get("filter")['estimate_number'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="filter[from]">{{ __('messages.from') }}</label>
                        <input name="filter[from]" type="date" class="form-control" data-toggle="flatpickr" data-flatpickr-default-date="{{ isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : '' }}"  placeholder="{{ __('messages.from') }}">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="filter[to]">{{ __('messages.to') }}</label>
                        <input name="filter[to]" type="date" class="form-control" data-toggle="flatpickr" data-flatpickr-default-date="{{ isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : '' }}"  placeholder="{{ __('messages.to') }}">
                    </div>
                </div>
                <div class="col-md-3 col-12" style="margin-top: 22px;">
                  
                            <button type="submit" class="btn btn-primary ">
                    
                                Refresh / {{ __('messages.filter') }}
                            </button>
                    
                    
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 mx-1">
                    <a href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.clear_filters') }}</a>
                </div>
            </div>
        </div>
       
    </div>
</form>
