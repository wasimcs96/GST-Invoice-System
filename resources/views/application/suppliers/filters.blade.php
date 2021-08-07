<form action="" method="GET">
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row my-1 mx-0">
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="filter[name]">{{ __('messages.name') }}</label>
                        <input name="filter[name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['name']) ? Request::get("filter")['name'] : '' }}" placeholder="{{ __('messages.name') }}">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="filter[email]">{{ __('messages.email') }}</label>
                        <input name="filter[email]" type="email" class="form-control" value="{{ isset(Request::get("filter")['email']) ? Request::get("filter")['email'] : '' }}" placeholder="{{ __('messages.email') }}">
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
                    <a href="{{ route('suppliers', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.clear_filters') }}</a>
                </div>
            </div>
        </div>
    </div>
</form>