@extends('layouts.app', ['page' => 'settings'])

@section('title', 'Account Detail')

@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item active" aria-current="page">Account Detail</li>
            </ol>
        </nav>
        <a href="{{ URL('' . auth()->user()->uid . '/settings/index') }}" class="btn btn-info float-right">Back</a>
        <h1 class="m-1">Account Detail</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-form container-fluid">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">

                        <div class="form-row align-items-center mb-4">
                            <div class="col">
                                <p class="h4 mb-0">
                                    <strong class="headings-color">Account Detail</strong>
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('settings.account_details.create', ['company_uid' => $currentCompany->uid]) }}"
                                    class="btn btn-primary text-white">
                                    Add Account Detail
                                </a>
                            </div>
                        </div>

                        @if ($account_details->count() > 0)
                            <div class="table-responsive" data-toggle="lists">
                                <table class="table table-xl mb-0 thead-border-top-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>{{ __('messages.name') }}</th>
                                            <th>{{ __('messages.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="expense_categories">
                                        @foreach ($account_details as $account_detail)
                                            <tr>
                                                <td class="h6">

                                                    <strong class="h6">
                                                        {{ $account_detail->id }}
                                                    </strong>

                                                </td>
                                                <td class="h6">

                                                    <strong class="h6">
                                                        {{ $account_detail->name }}
                                                    </strong>

                                                </td>
                                                {{-- <td class="h6">
                                                    <a href="{{ route('settings.expense_categories.edit', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}" class="btn text-primary">
                                                        <i class="material-icons icon-16pt"></i>
                                                        {{ __('messages.edit') }}
                                                    </a>
                                                    <a href="{{ route('settings.account_details.delete', ['account_detail' => $account_detail->id, 'company_uid' => $currentCompany->uid]) }}"
                                                        class="btn text-danger delete-confirm">
                                                        <i class="material-icons icon-16pt"></i>
                                                        {{ __('messages.delete') }}
                                                    </a>
                                                    <a href="{{ route('settings.account_details.delete', $account_detail->id) }}" class="btn text-danger delete-confirm">
                                                        <i class="material-icons icon-16pt"></i>
                                                        {{ __('messages.delete') }}
                                                    </a>
                                                </td> --}}

                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-sm text-black dropdown-toggle hide-arrow"
                                                            data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            {{-- <a class="dropdown-item"
                                                            href="{{ route('settings.accounts.edit', ['accounts_setting' => $account->id, 'company_uid' => $currentCompany->uid]) }}">
                                                            <i data-feather="edit-2"></i>
                                                            {{ __('messages.edit') }}
                                                                </a> --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('settings.account_details.delete', ['account_detail' => $account_detail->id, 'company_uid' => $currentCompany->uid]) }}">
                                                                <i data-feather="trash"></i>
                                                                {{ __('messages.delete') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-sm text-black dropdown-toggle hide-arrow"
                                                            data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('settings.product_categories.edit', ['product_category' => $product_category->id, 'company_uid' => $currentCompany->uid]) }}">
                                                                <i data-feather="edit-2"></i>
                                                                {{ __('messages.edit') }}
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('settings.account_details.delete', ['account_detail' => $account_detail->id, 'company_uid' => $currentCompany->uid]) }}">
                                                                <i data-feather="trash"></i>
                                                                {{ __('messages.delete') }}
                                                            </a>
                                                        </div>
                                                    </div> --}}

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="row card-body pagination-light justify-content-center text-center">
                                {{ $product_categories->links() }}
                            </div> --}}
                        @else
                            <div class="row justify-content-center card-body pb-0 pt-5">
                                <i class="material-icons fs-64px"></i>
                            </div>
                            <div class="row justify-content-center card-body pb-5">
                                <p class="h4">No Account Details</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
