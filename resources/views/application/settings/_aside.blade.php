{{-- <div class="card container-fluid">
<ul class="sidebar-menu">
    <li class="sidebar-menu-item">
        <a href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'account' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
            <span class="sidebar-menu-text">{{ __('messages.account_settings') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.membership', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'membership' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">card_membership</i>
            <span class="sidebar-menu-text">{{ __('messages.membership') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.notifications', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'notification' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">notifications</i>
            <span class="sidebar-menu-text">{{ __('messages.notification_settings') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.company', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'company' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">business</i>
            <span class="sidebar-menu-text">{{ __('messages.company_settings') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.preferences', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'preferences' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tune</i>
            <span class="sidebar-menu-text">{{ __('messages.preferences') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.invoice', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'invoice' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i>
            <span class="sidebar-menu-text">{{ __('messages.invoice_settings') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.estimate', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'estimate' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
            <span class="sidebar-menu-text">{{ __('messages.estimate_settings') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.payment', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'payment' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">payment</i>
            <span class="sidebar-menu-text">{{ __('messages.payment_settings') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.product', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'product' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">store</i>
            <span class="sidebar-menu-text">{{ __('messages.product_settings') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.tax_types', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'tax_types' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pages</i>
            <span class="sidebar-menu-text">{{ __('messages.tax_types') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.custom_fields', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'custom_fields' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">text_fields</i>
            <span class="sidebar-menu-text">{{ __('messages.custom_fields') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.expense_categories', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'expense_categories' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_balance_wallet</i>
            <span class="sidebar-menu-text">{{ __('messages.expense_categories') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.email_template', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'email_template' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">email</i>
            <span class="sidebar-menu-text">{{ __('messages.email_templates') }}</span>
        </a>
    </li>

    <li class="sidebar-menu-item">
        <a href="{{ route('settings.team', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'team' ? 'text-primary' : 'text-secondary' }}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">group</i>
            <span class="sidebar-menu-text">{{ __('messages.team') }}</span>
        </a>
    </li>
</ul>
</div> --}}



{{-- new --}}
{{-- <div class="col-md-3 mb-2 mb-md-0 my-1">
    <ul class="nav nav-pills flex-column nav-left">
        <li class="nav-item">
            <a href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'account' ? 'text-primary' : 'text-secondary' }}" aria-expanded="true">
                <i data-feather="home" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.account_settings') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.membership', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'membership' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="user" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.membership') }}</span>
            </a>
        </li>
        <li class="nav-item my-1">
            <a href="{{ route('settings.notifications', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'notification' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="bell" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.notification_settings') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.company', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'company' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="info" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.company_settings') }}</span>
            </a>
        </li>
        <li class="nav-item row">
            <a href="{{ route('settings.preferences', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'preferences' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="link" class="font-medium-3 "></i>
                <span class="sidebar-menu-text">{{ __('messages.preferences') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.invoice', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'invoice' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.invoice_settings') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.estimate', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'estimate' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.estimate_settings') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.payment', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'payment' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.payment_settings') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.product', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'product' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.product_settings') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.tax_types', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'tax_types' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.tax_types') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.custom_fields', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'custom_fields' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.custom_fields') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.expense_categories', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'expense_categories' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.expense_categories') }}</span>
            </a>
        </li>
        <li class="nav-item my-1">
            <a href="{{ route('settings.email_template', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'email_template' ? 'text-primary' : 'text-secondary' }} aria-expanded="false"">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.email_templates') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.team', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'team' ? 'text-primary' : 'text-secondary' }}" aria-expanded="false">
                <i data-feather="lock" class="font-medium-3"></i>
                <span class="sidebar-menu-text">{{ __('messages.team') }}</span>
            </a>
        </li>
    </ul>
</div> --}}
@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.Settings'))
    
@section('content')
<div class="row">
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-info p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="user" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="true">
                    {{-- <span class="card-text">{{ __('messages.account_settings') }}</span> --}}
                    <p class="card-text">{{ __('messages.account_settings') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body" style="height: 144px;">
                <div class="avatar bg-light-warning p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="award" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.membership', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.membership') }}</span> --}}
                    <p class="card-text">{{ __('messages.membership') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-danger p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="bell" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.notifications', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.notification_settings') }}</span> --}}
                    <p class="card-text">{{ __('messages.notification_settings') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-primary p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="heart" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.company', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.company_settings') }}</span> --}}
                    <p class="card-text">{{ __('messages.company_settings') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body" style="height: 144px;">
                <div class="avatar bg-light-success p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="credit-card" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.preferences', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.preferences') }}</span> --}}
                    <p class="card-text">{{ __('messages.preferences') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-danger p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="truck" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.invoice', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    <p class="card-text">{{ __('messages.invoice_settings') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-info p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="eye" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.estimate', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.estimate_settings') }}</span> --}}
                    <p class="card-text">{{ __('messages.estimate_settings') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-warning p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="dollar-sign" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.payment', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.payment_settings') }}</span> --}}
                    <p class="card-text">{{ __('messages.payment_settings') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-danger p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="shopping-bag" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.product', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.product_settings') }}</span> --}}
                    <p class="card-text">{{ __('messages.product_settings') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body" style="height: 144px;">
                <div class="avatar bg-light-primary p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="package" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.tax_types', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.tax_types') }}</span> --}}
                    <p class="card-text">{{ __('messages.tax_types') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body" style="height: 144px;">
                <div class="avatar bg-light-success p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="activity" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.custom_fields', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.custom_fields') }}</span> --}}
                    <p class="card-text">{{ __('messages.custom_fields') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-danger p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="file-text" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.expense_categories', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.expense_categories') }}</span> --}}
                    <p class="card-text">{{ __('messages.expense_categories') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-success p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="mail" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.email_template', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.email_templates') }}</span> --}}
                    <p class="card-text">{{ __('messages.email_templates') }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body" style="height: 144px;">
                <div class="avatar bg-light-danger p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="users" class="font-medium-5"></i>
                    </div>
                </div>
                <a href="{{ route('settings.team', ['company_uid' => $currentCompany->uid]) }}" class="card-text" aria-expanded="false">
                    {{-- <span class="card-text">{{ __('messages.team') }}</span> --}}
                    <p class="card-text">{{ __('messages.team') }}</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_head_scripts')
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/charts/chart-apex.css')}}">
@endsection

@section('page_body_scripts')
<script src="{{asset('theme/app-assets/js/scripts/pages/page-account-settings.js')}}"></script>
<script src="{{asset('theme/app-assets/js/scripts/cards/card-statistics.js')}}"></script>
@endsection