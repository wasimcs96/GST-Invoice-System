@extends('layouts.app', ['page' => 'invoices'])

@section('title', __('messages.create_invoice'))
 
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.invoices') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create_invoice') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.create_invoice') }}</h1>
        </div>
    </div>
@endsection
 
@section('content') 
    <form action="{{ route('invoices.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
        @include('layouts._form_errors')
        @csrf
        
        @include('application.invoices._form')
    </form>
@endsection

@section('page_head_scripts')

<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href={{asset('theme/app-assets/css/pages/app-invoice.css') }}">
<style>
    .select2-selection__arrow {
        display: none;
    }
</style>

@endsection

{{-- @section('page_body_scripts')
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    @include('application.invoices._js')
    <script>
        $(document).ready(function() {
            $("#add_product_row").click(function() {
               console.log('hiiiii');
                addProductRow();
              });
            });
    </script>
@endsection --}}

@section('page_body_scripts')
    <script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{asset('theme/app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    @include('application.invoices._js')
    <script>
        $(document).ready(function() {
            addProductRow();
        });
    </script>

    {{-- @include('application.estimates._js') --}}
    {{-- <script>
        $(document).ready(function() {
            $("#add_product_row").click(function() {
               console.log('hiiiii');
                addProductRow();
              });
              $(".priceListener").change(function() {
            calculateRowPrice()    
        });
            });
    </script> --}}
    <script>
        $('#total_tax').on('change', function() {
        if (this.value == "hell") {
            window.location='{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}';
            $("#taxes").trigger('click');
        }
        
      });
        //   $('#customer').on('change', function() {
        //     if (this.value == "hii") {
        //         window.location='{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}';
        //         $("#cust").trigger('click');
        //     }
            
        //   });
    </script>
    
    

@endsection

