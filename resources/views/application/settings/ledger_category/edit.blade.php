@extends('layouts.app', ['page' => 'settings'])

@section('title','Edit Ledger Category')
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('settings.expense_categories', ['company_uid' => $currentCompany->uid]) }}">Edit Ledger Category</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">{{ __('messages.edit_expense_category') }}</li> --}}
            </ol>
        </nav>
        <h1 class="m-1">Edit Ledger Category</h1>
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
                                    <strong class="headings-color">Edit Ledger Category</strong>
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('settings.ledger_categories.update', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}" method="POST">
                            @include('layouts._form_errors')
                            @csrf
                            
                            @include('application.settings.ledger_category._form')

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update_category') }}</button>
                                <a href="{{ route('settings.ledger_categories.delete', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light text-danger delete-confirm">
                                    <i data-feather="trash"></i>
                                    {{ __('messages.delete') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

