@extends('layouts.app', ['page' => 'estimates'])

@section('title', __('messages.create_estimate'))
 
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.estimates') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create_estimate') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.create_estimate') }}</h1>
        </div>
    </div>
@endsection
 
@section('content') 
    <form action="{{ route('estimates.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
        @include('layouts._form_errors')
        @csrf
        
        @include('application.estimates._form')
    </form>
@endsection

@section('page_head_scripts')

<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">

<style>
    .select2-selection__arrow {
        display: none;
    }
</style>

@endsection
s
@section('page_body_scripts')
    <script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    @include('application.estimates._js')
    <script>
        $(document).ready(function() {
            $("#add_product_row").click(function() {
               console.log('hiiiii');
                addProductRow();
              });
            });
    </script>
  

@endsection


