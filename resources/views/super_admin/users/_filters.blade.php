<form action="" method="GET">
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row container-fluid my-2">
                {{-- <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter[first_name]">{{ __('messages.first_name') }}</label>
                        <input name="filter[first_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['first_name']) ? Request::get("filter")['first_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div> --}}
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="filter[first_name]">{{ __('messages.first_name') }}</label>
                        <input type="text" id="first-name-column" class="form-control" value="{{ isset(Request::get("filter")['first_name']) ? Request::get("filter")['first_name'] : '' }}" placeholder="{{ __('messages.search') }}" name="filter[first_name]" />
                    </div>
                </div>
                {{-- <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter[email]">{{ __('messages.email') }}</label>
                        <input name="filter[email]" type="text" class="form-control" value="{{ isset(Request::get("filter")['email']) ? Request::get("filter")['email'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div> --}}
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="filter[email]">{{ __('messages.email') }}</label>
                        <input type="text" id="last-name-column" class="form-control" value="{{ isset(Request::get("filter")['email']) ? Request::get("filter")['email'] : '' }}" placeholder="{{ __('messages.search') }}" name="filter[email]" />
                    </div>
                </div>
                <div class="col-md-auto" style="margin-top: 22px;">
                  
                    <button type="submit" class="btn btn-primary">
            
                        Refresh / {{ __('messages.filter') }}
                    </button>
                </div>
            </div>
            <div class="row col-md-6 col-12">
                <div class="col-12 mb-2">
                    <a href="{{ route('super_admin.users') }}">{{ __('messages.clear_filters') }}</a>
                </div>
            </div>
        </div>
        {{-- <div class="col-md- col-12 mt-3 float-right"> --}}
        {{-- <button type="submit" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0" style="margin-left: auto;">
            <i class="material-icons text-primary icon-20pt">refresh</i>
            {{ __('messages.filter') }}
        </button> --}}
        {{-- </div> --}}
    </div>
</form>