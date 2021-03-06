@extends('layouts.app', ['page' => 'ledgers'])

@section('title', 'create ledger')
 
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('ledgers', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.expenses') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ledger</li>
                </ol>
            </nav>
            <h1 class="m-0">Ledger</h1>
        </div>
    </div>
@endsection
 
@section('content') 
    <form action="{{ route('ledgers.store', ['company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf
        
        @include('application.ledgers._form')
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

@section('page_body_scripts')
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
  
@endsection