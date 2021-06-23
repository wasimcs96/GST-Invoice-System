@extends('layouts.app', ['page' => 'super_admin.plans'])

@section('title', __('messages.edit_plan'))
    
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('super_admin.plans') }}">{{ __('messages.plans') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.edit_plan') }}</li>
                </ol>
            </nav>
            <h1 class="m-0 h3">{{ __('messages.edit_plan') }}</h1>
        </div>
        {{-- <a href="{{ route('super_admin.plans.delete', $plan->id) }}" class="btn btn-danger ml-3 delete-confirm">
            <i class="material-icons">delete</i> 
            {{ __('messages.delete_plan') }}
        </a> --}}
    </div>
@endsection
 
@section('content') 
    <form action="{{ route('super_admin.plans.update', $plan->id) }}" method="POST" enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf
        
        @include('super_admin.plans._form')
    </form>
@endsection

@section('page_body_scripts')
    @include('super_admin.plans._js')
@endsection