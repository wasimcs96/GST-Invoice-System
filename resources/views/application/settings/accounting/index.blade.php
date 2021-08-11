@extends('layouts.app', ['page' => 'settings'])

@section('title', 'Account')
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </nav>
        <a href="{{ URL(''.auth()->user()->uid.'/settings/index') }}" class="btn btn-info float-right">Back</a>
        <h1 class="m-1">Account</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-form container-fluid">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">

                        <div class="form-row align-items-center mb-4">
                            <div class="col">
                                <p class="h4 mb-0">
                                    <strong class="headings-color">Account</strong>
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('settings.accounts.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary text-white">
                                    Add Account
                                </a>
                            </div>
                        </div>

                        @if($accounts->count() > 0)
                            <div class="table-responsive" data-toggle="lists">
                                <table class="table table-xl mb-0 thead-border-top-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>{{ __('messages.name') }}</th> 
                                            <th>Account Type</th>
                                            <th>Detail type</th>
                                            <th>{{ __('messages.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="expense_categories">
                                        @foreach($accounts as $account)
                                            <tr>
                                                <td class="h6">
                                                    <strong class="h6">
                                                        {{ $account->id }}
                                                    </strong>                                      
                                            </td>
                                                <td class="h6">
                                                        <strong class="h6">
                                                            {{ $account->name }}
                                                        </strong>                                      
                                                </td>
                                                <td class="h6">
                                                    <strong class="h6">
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 0) Account receivable (Debtors)  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 1) Current assets @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 2) Bank  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 3) Non-current assets @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 4)Accounts payable (Creditors) @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 5) Credit Card  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 6) Current liabilities  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 7) Non-current liabilities @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 8) Equity  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 9) Income @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 10) Other Income  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 11) Cost of Goods sold  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 12) Expense  @endif
                                                        @if(isset($account['account_type'])&& $account['account_type'] == 13) Other expense @endif
                                                       
                                                             
                                                    </strong>                                      
                                            </td>
                                            <td class="h6">
                                                <strong class="h6">
                                                    {{-- {{dd($account->accountDetail)}} --}}
                                                    {{$account->accountDetail->name ?? ''}}
                                                    
                                                </strong>                                      
                                            </td>
                                                {{-- <td class="h6">
                                                    <a href="{{ route('settings.expense_categories.edit', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}" class="btn text-primary">
                                                        <i class="material-icons icon-16pt"></i>
                                                        {{ __('messages.edit') }}
                                                    </a>
                                                    <a href="{{ route('settings.expense_categories.delete', ['expense_category' => $expense_category->id, 'company_uid' => $currentCompany->uid]) }}" class="btn text-danger delete-confirm">
                                                        <i class="material-icons icon-16pt"></i>
                                                        {{ __('messages.delete') }}
                                                    </a>
                                                </td> --}}
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu"> 
                                                        <a class="dropdown-item"
                                                        href="{{ route('settings.accounts.edit', ['accounts_setting' => $account->id, 'company_uid' => $currentCompany->uid]) }}">
                                                        <i data-feather="edit-2"></i>
                                                        {{ __('messages.edit') }}
                                                            </a>
                                                            <a class="dropdown-item"
                                                            href="{{ route('settings.accounts.delete', ['accounts_setting' => $account->id, 'company_uid' => $currentCompany->uid]) }}">
                                                            <i data-feather="trash"></i>
                                                            {{ __('messages.delete') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row card-body pagination-light justify-content-center text-center">
                                {{ $accounts->links() }}
                            </div>
                        @else
                            <div class="row justify-content-center card-body pb-0 pt-5">
                                <i class="material-icons fs-64px"></i>
                            </div>
                            <div class="row justify-content-center card-body pb-5">
                                <p class="h4">No Account</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

