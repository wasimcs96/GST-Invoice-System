@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.edit_product_unit'))
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('settings.product', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.product_settings') }}</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">{{ __('messages.edit_product_unit') }}</li> --}}
            </ol>
        </nav>
        <h1 class="m-1">{{ __('messages.edit_product_unit') }}</h1>
    </div>
 
    <div class="row">
        {{-- <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'product'])
        </div> --}}
        <div class="col-lg-12">
            <div class="card card-form container-fluid">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">
                        <div class="form-row align-items-center mb-4">
                            <div class="col">
                                <p class="h4 mb-0">
                                    <strong class="headings-color">{{ __('messages.edit_product_unit') }}</strong>
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('settings.product.unit.update', ['product_unit' => $product_unit->id, 'company_uid' => $currentCompany->uid]) }}" method="POST">
                            @include('layouts._form_errors')
                            @csrf
                            
                            @include('application.settings.product.unit._form')

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update_product_unit') }}</button>
                                <a href="{{ route('settings.product.unit.delete', ['product_unit' => $product_unit->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light text-danger delete-confirm">
                                    <i class="material-icons icon-16pt"></i>
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

