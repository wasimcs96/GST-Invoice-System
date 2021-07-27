@extends('layouts.app', ['page' => 'ledgers'])

@section('title', 'Update Ledgers')
    
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('ledgers', ['company_uid' => $currentCompany->uid]) }}">Ledger</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Ledger</li>
                </ol>
            </nav>
            <h1 class="m-0 h3">Update Ledger</h1>
        </div>
        <a href="{{ route('ledgers.delete', ['ledger' => $expense->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger ml-3 delete-confirm">
            <i data-feather="trash"></i> 
            Ledger
        </a>
    </div>
@endsection
 
@section('content') 
    <form action="{{ route('ledgers.update', ['ledger' => $expense->id, 'company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf
        
        @include('application.ledgers._form')
    </form>
@endsection