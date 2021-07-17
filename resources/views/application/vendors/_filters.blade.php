<form action="" method="GET">
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row container-fluid my-2">
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="filter[display_name]">{{ __('messages.display_name') }}</label>
                        <input name="filter[display_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['display_name']) ? Request::get("filter")['display_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="filter[contact_name]">{{ __('messages.contact_name') }}</label>
                        <input name="filter[contact_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['contact_name']) ? Request::get("filter")['contact_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div>
                <div class="col-md-auto" style="margin-top: 22px;">
                  
                    <button type="submit" class="btn btn-primary">
            
                        Refresh / {{ __('messages.filter') }}
                    </button>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 mx-1">
                    <a href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.clear_filters') }}</a>
                </div>
            </div>
        </div>
        {{-- <button type="submit" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0" style="margin-left: auto;">
            <i class="material-icons text-primary icon-20pt">refresh</i>
            {{ __('messages.filter') }}
        </button> --}}
    </div>
</form>