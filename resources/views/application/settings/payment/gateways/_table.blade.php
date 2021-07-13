<div class="table-responsive mb-4" data-toggle="gateways">
    <table class="table table-xl mb-0 thead-border-top-0 table-striped">
        <thead>
            <tr>
                <th>{{ __('messages.name') }}</th> 
                <th>{{ __('messages.status') }}</th> 
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </thead>
        <tbody class="list" id="gateways">
            <tr>
                <td class="h6">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'paypal']) }}">
                        <strong class="h6">
                            {{ __('messages.paypal') }}
                        </strong>
                    </a>
                </td>
                <td class="h6">
                    @if($currentCompany->isPaypalActive())
                        <div class="badge badge-success fs-0-9-rem">
                            {{ __('messages.enabled') }}
                        </div>
                    @else
                        <div class="badge badge-danger fs-0-9-rem">
                            {{ __('messages.disabled') }}
                        </div>
                    @endif
                </td>
                {{-- <td class="h6 text-right">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'paypal']) }}" class="btn text-primary">
                        <i class="material-icons icon-16pt"></i>
                        {{ __('messages.edit') }}
                    </a>
                </td> --}}
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu"> 
                        <a class="dropdown-item"
                        href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'paypal']) }}">
                        <i data-feather="edit-2"></i>
                        {{ __('messages.edit') }}
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="h6">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'stripe']) }}">
                        <strong class="h6">
                            {{ __('messages.stripe') }}
                        </strong>
                    </a>
                </td>
                <td class="h6">
                    @if($currentCompany->isStripeActive())
                        <div class="badge badge-success fs-0-9-rem">
                            {{ __('messages.enabled') }}
                        </div>
                    @else
                        <div class="badge badge-danger fs-0-9-rem">
                            {{ __('messages.disabled') }}
                        </div>
                    @endif
                </td>
                {{-- <td class="h6 text-right">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'stripe']) }}" class="btn text-primary">
                        <i class="material-icons icon-16pt"></i>
                        {{ __('messages.edit') }}
                    </a>
                </td> --}}
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu"> 
                        <a class="dropdown-item"
                        href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'stripe']) }}">
                        <i data-feather="edit-2"></i>
                        {{ __('messages.edit') }}
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="h6">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'razorpay']) }}">
                        <strong class="h6">
                            {{ __('messages.razorpay') }}
                        </strong>
                    </a>
                </td>
                <td class="h6">
                    @if($currentCompany->isRazorpayActive())
                        <div class="badge badge-success fs-0-9-rem">
                            {{ __('messages.enabled') }}
                        </div>
                    @else
                        <div class="badge badge-danger fs-0-9-rem">
                            {{ __('messages.disabled') }}
                        </div>
                    @endif
                </td>
                {{-- <td class="h6 text-right">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'razorpay']) }}" class="btn text-primary">
                        <i class="material-icons icon-16pt"></i>
                        {{ __('messages.edit') }}
                    </a>
                </td> --}}
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu"> 
                        <a class="dropdown-item"
                        href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'razorpay']) }}">
                        <i data-feather="edit-2"></i>
                        {{ __('messages.edit') }}
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="h6">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'mollie']) }}">
                        <strong class="h6">
                            {{ __('messages.mollie') }}
                        </strong>
                    </a>
                </td>
                <td class="h6">
                    @if($currentCompany->isMollieActive())
                        <div class="badge badge-success fs-0-9-rem">
                            {{ __('messages.enabled') }}
                        </div>
                    @else
                        <div class="badge badge-danger fs-0-9-rem">
                            {{ __('messages.disabled') }}
                        </div>
                    @endif
                </td>
                {{-- <td class="h6 text-right">
                    <a href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'mollie']) }}" class="btn text-primary">
                        <i class="material-icons icon-16pt"></i>
                        {{ __('messages.edit') }}
                    </a>
                </td> --}}
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu"> 
                        <a class="dropdown-item"
                        href="{{ route('settings.payment.gateway.edit', ['company_uid' => $currentCompany->uid, 'gateway' => 'mollie']) }}">
                        <i data-feather="edit-2"></i>
                        {{ __('messages.edit') }}
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>