@extends('layouts.app', ['page' => 'customers'])

@section('title', __('messages.customer_details'))
    
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.customers') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.customer_details') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.customer_details') }}</h1>
        </div>
    </div>
@endsection
 
@section('content')
    <!-- <div class="card">
        <div class="row pl-4 pr-4">
            <div class="col-12 col-md-3 mt-4 mb-4">
                <h5>{{ __('messages.details') }}</h5>
                <p class="mb-1">
                    <strong>{{ __('messages.name') }}:</strong> {{ $customer->display_name }} <br>
                </p>
                <p class="mb-1">
                    <strong>{{ __('messages.contact') }}:</strong> {{ $customer->contact_name }} <br>
                </p>
                <p class="mb-1">
                    <strong>{{ __('messages.email') }}:</strong> {{ $customer->email }} <br>
                </p>
            </div>
            <div class="col-12 col-md-3 mt-4 mb-4">
                <h5>{{ __('messages.billing') }}</h5>
                <p>
                    {{ $customer->displayLongAddress('billing') }}
                </p>
            </div>
            <div class="col-12 col-md-3 mt-4 mb-4">
                <h5>{{ __('messages.standing') }}</h5>
                <strong>{{ __('messages.due_amount') }}:</strong> 
                <p class="h5 mt-1">{!! money($customer->invoice_due_amount, $customer->currency_code) !!}</p>
            </div>
            <div class="col-12 col-md-3 text-right mt-4 mb-4"> 
                <a href="{{ route('customers.edit', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-primary">
                    <i class="material-icons">edit</i> 
                    {{ __('messages.edit') }}
                </a>
                <a href="{{ route('customers.delete', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger delete-confirm">
                    <i class="material-icons">delete</i> 
                    {{ __('messages.delete') }}
                </a>
            </div>
        </div>
    </div> -->

    <!-- new -->
    <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('messages.details') }}</h4>
                        </div>
                        <div class="card-body">
                          <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-hover table-striped">
                
                                  <tbody>
                                  <tr>
                                      <th scope="row">{{ __('messages.name') }}</th>
                                      <td>{{ $customer->display_name }} </td>
                                  </tr>
                  
                                  <tr>
                                      <th scope="row">{{ __('messages.contact') }}</th>
                                      <td>{{ $customer->contact_name }}</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">{{ __('messages.email') }}</th>
                                      <td>{{ $customer->email }} </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">{{ __('messages.billing') }}</th>
                                      <td> {{ $customer->displayLongAddress('billing') }}</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">{{ __('messages.standing') }}</th>
                                      <td> {{ __('messages.due_amount') }} :<p>{!! money($customer->invoice_due_amount, $customer->currency_code) !!}</p></td>
                                  </tr>
                                  <tr>
                                      <th scope="row">Action</th>
                                      {{-- <td class="float-right"> <a href="{{ route('customers.edit', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-primary">
                    <i class="material-icons"></i> 
                    {{ __('messages.edit') }}
                </a>
                <a href="{{ route('customers.delete', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger delete-confirm">
                    <i class="material-icons"></i> 
                    {{ __('messages.delete') }}
                </a></td> --}}
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm text-black dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu"> 
                        <a class="dropdown-item"
                        href="{{ route('customers.edit', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}">
                        <i data-feather="edit-2"></i>
                                <span>{{ __('messages.edit') }}</span>
                            </a>
                            <a class="dropdown-item"
                            href="{{ route('customers.delete', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}">
                        <i data-feather="trash"></i>
                                <span>{{ __('messages.delete') }}</span>
                            </a>

                        <!-- <a href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> -->
                        </div>
                    </div>
                </td>
                                  </tr>
                                  </tbody>
                
                              </table>
                            </div>  
                          </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- new end -->

    <nav class="nav nav-pills nav-justified w-100" role="tablist">
        <a href="#invoices" class="h6 nav-item nav-link bg-secondary text-white active show" data-toggle="tab" role="tab" aria-selected="true">{{ __('messages.invoices') }}</a>
        <a href="#estimates" class="h6 nav-item nav-link bg-secondary text-white" data-toggle="tab" role="tab" aria-selected="false">{{ __('messages.estimates') }}</a>
        <a href="#payments" class="h6 nav-item nav-link bg-secondary text-white" data-toggle="tab" role="tab" aria-selected="false">{{ __('messages.payments') }}</a>
        <a href="#activities" class="h6 nav-item nav-link bg-secondary text-white" data-toggle="tab" role="tab" aria-selected="false">{{ __('messages.activities') }}</a>
    </nav>

    <div class="tab-content">
        <div class="tab-pane active show" id="invoices">
            <div class="card">
                @include('application.invoices._table')
            </div>
        </div>
        <div class="tab-pane" id="estimates">
            <div class="card">
                @include('application.estimates._table')
            </div>
        </div>
        <div class="tab-pane" id="payments">
            <div class="card">
                @include('application.payments._table')
            </div>
        </div>
        <div class="tab-pane" id="activities">
            <div class="container-fluid page__container">
                <p class="text-dark-gray d-flex align-items-center mt-3">
                    <i class="material-icons icon-muted mr-2"></i>
                    <strong>{{ __('messages.activities') }}</strong>
                </p>

                @if($activities->count() > 0)
                    @foreach($activities as $activity)
                        <div class="row align-items-center projects-item mb-1">
                            <div class="col-sm-auto mb-1 mb-sm-0">
                                <div class="text-dark-gray">{{ $activity->created_at->format($currentCompany->getSetting('date_format')) }}</div>
                            </div>
                            <div class="col-sm">
                                <div class="card m-0">
                                    <div class="px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col mw-300px">
                                                <div class="d-flex align-items-center">
                                                    <a class="text-body">
                                                        <strong class="text-15pt mr-2">{{ $activity->description }}</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row align-items-center projects-item mb-1">
                        <div class="col-sm-auto mb-1 mb-sm-0"></div>
                        <div class="col-sm">
                            <div class="card m-0">
                                <div class="px-4 py-3">
                                    <div class="row align-items-center">
                                        <div class="col mw-300px">
                                            <div class="d-flex align-items-center">
                                                <a class="text-body">
                                                    <strong class="text-15pt mr-2">{{ __('messages.no_activities_yet') }}</strong>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
@endsection
