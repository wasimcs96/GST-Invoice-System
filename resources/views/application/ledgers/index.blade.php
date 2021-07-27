@extends('layouts.app', ['page' => 'ledgers'])

@section('title', 'ledgers')
    
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ledger</li>
                </ol>
            </nav>
            <h1 class="m-0">Ledger</h1>
        </div>
        <a href="{{ route('ledgers.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success ml-3">
            <i data-feather="plus"></i> 
            Add Account
        </a>
    </div>
@endsection

@section('content')
    @include('application.ledgers._filters')

    <div class="card">
        @include('application.ledgers._table')
    </div>
@endsection
