@extends('layouts.app', ['page' => 'settings'])

@section('title', 'Add Product Service')
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('settings.product_service', ['company_uid' => $currentCompany->uid]) }}">Poduct Service</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">{{ __('messages.add_expense_category') }}</li> --}}
            </ol>
        </nav>
        <h1 class="m-1">Add Product Service</h1>
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
                                    <strong class="headings-color">Add Product Service</strong>
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('settings.product_service.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                            @include('layouts._form_errors')
                            @csrf
                            
                            @include('application.settings.product_service._form')

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Add Product Service</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
