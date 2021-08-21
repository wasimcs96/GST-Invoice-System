@extends('layouts.app', ['page' => 'settings'])

@section('title', 'Add Account')
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}">Account</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">{{ __('messages.add_expense_category') }}</li> --}}
            </ol>
        </nav>
        <h1 class="m-1">Add Account</h1>
    </div>
 
    <div class="row">
        {{-- <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'expense_categories'])
        </div> --}}
        <div class="col-lg-12">
            <div class="card card-form container-fluid">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">
                        <div class="form-row align-items-center mb-4">
                            <div class="col">
                                <p class="h4 mb-0">
                                    <strong class="headings-color">Add Account</strong>
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('settings.accounts.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                            @include('layouts._form_errors')
                            @csrf
                            
                            @include('application.settings.accounting._form')

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Add Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
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
 
@endsection

@section('page_body_scripts')
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
{{-- <script src="{{asset('theme/app-assets/js/scripts/pages/app-invoice.js') }}"></script> --}}

    {{-- @include('application.invoices._js') --}}
   <script>  
   $('#detail_id').on('change', function() {
    if (this.value == "acc") {
        window.location = '{{ route('settings.account_details.create', ['company_uid' => $currentCompany->uid]) }}';
        $("#det").trigger('click');
    }

});</script>
@endsection

