<form action="" method="GET">
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row container-fluid my-2">
                <!-- <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter[expense_category_id]">{{ __('messages.expense_category') }}</label>
                        <select id="filter[expense_category_id]" name="filter[expense_category_id]" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="filter[expense_category_id]">
                            <option selected value="">{{ __('messages.select_category') }}</option>
                            @foreach(get_expense_categories_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ isset(Request::get("filter")['expense_category_id']) && Request::get("filter")['expense_category_id'] == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> -->
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="filter[expense_category_id]">{{ __('messages.expense_category') }}</label>
                        <select id="filter[expense_category_id]"name="filter[expense_category_id]" data-toggle="select" class="form-control select2" data-select2-id="filter[expense_category_id]">
                            <option selected value="">{{ __('messages.select_category') }}</option>
                            @foreach(get_expense_categories_select2_array($currentCompany->id) as $option)
                            <option value="{{ $option['id'] }}" {{ isset(Request::get("filter")['expense_category_id']) && Request::get("filter")['expense_category_id'] == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                
               
                <!-- <div class="col-sm-auto"> -->
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="filter[from]">{{ __('messages.from') }}</label>
                        <input name="filter[from]" type="date" class="form-control" data-toggle="flatpickr" data-flatpickr-default-date="{{ isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : '' }}"  placeholder="{{ __('messages.from') }}">
                    </div> 
                </div>
                <!-- <div class="col-sm-auto"> -->
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
                    <a href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.clear_filters') }}</a>
                </div>
            </div>
        </div>
        {{-- <button type="submit" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0" style="margin-left: auto;">
            <i class="material-icons text-primary icon-20pt">refresh</i>
            {{ __('messages.filter') }}
        </button> --}}
    </div>
</form> 


@section('page_body_scripts')
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
@endsection

@section('page_head_scripts')

<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <style>
        .select2-selection__arrow {
            display: none;
        }

    </style>

@endsection