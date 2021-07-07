@extends('layouts.app', ['page' => 'dashboard'])

@section('title', __('messages.dashboard'))

@section('page_header')
<div class="page__heading d-flex align-items-center">
    <div class="flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.dashboard') }}</li>
            </ol>
        </nav>
        <h1 class="m-0">{{ __('messages.dashboard') }}</h1>
    </div>
</div>
@endsection

@section('content')
<!-- <div class="row card-group-row">
        <div class="col-lg-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                    <div class="flex">
                        <a href="{{route('customers', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none">
                            <div class="card-header__title text-muted mb-2 d-flex">
                                {{ __('messages.customers') }}
                            </div>
                            <span class="h4 m-0">{{ $customersCount }}</span>
                        </a>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">account_box</i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                    <div class="flex">
                        <a href="{{route('invoices', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none">
                            <div class="card-header__title text-muted mb-2 d-flex">
                                {{ __('messages.invoices') }}
                            </div>
                            <span class="h4 m-0">{{ $invoicesCount }}</span>
                        </a>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">receipt</i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                    <div class="flex">
                        <a href="{{route('estimates', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none">
                            <div class="card-header__title text-muted mb-2 d-flex">
                                {{ __('messages.estimates') }}
                            </div>
                            <span class="h4 m-0">{{ $estimatesCount }}</span>
                        </a>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">description</i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2 d-flex">{{ __('messages.due_amount') }}</div>
                        <span class="h4 m-0">{!! money($totalDueAmount, $currentCompany->currency->code) !!}</span>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">monetization_on</i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white d-flex align-items-center">
            <h3 class="card-header__title mb-0 fs-1-3rem">{{ __('messages.expenses') }}</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="expensesChart" class="chart-canvas chartjs-render-monitor" width="1998" height="600"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header card-header-large bg-white">
                    <h4 class="card-header__title">{{ __('messages.due_invoices') }}</h4>
                </div>

                @include('application.dashboard._due_invoices')
                
                <div class="card-footer text-center border-0">
                    <a class="text-muted" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.view_all') }}</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header card-header-large bg-white">
                    <h4 class="card-header__title">{{ __('messages.due_estimates') }}</h4>
                </div>

                @include('application.dashboard._due_estimates')

                <div class="card-footer text-center border-0">
                    <a class="text-muted" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.view_all') }}</a>
                </div>
            </div>
        </div>
    </div> -->
<div class="row card-group-row">
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="users" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{ $customersCount }}</h2>
                <p class="card-text"><a href="{{route('customers', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none">{{ __('messages.customers') }}</a></p>
            </div>
            <!-- <div id="gained-chart"></div> -->
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-secondary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="file" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{ $invoicesCount }}</h2>
                <p class="card-text">  <a href="{{route('invoices', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none">{{ __('messages.invoices') }}</a></p>
            </div>
            <!-- <div id="gained-chart"></div> -->
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-info p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="package" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{ $estimatesCount }}</h2>
                <p class="card-text"> <a href="{{route('estimates', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none"> {{ __('messages.estimates') }}</a></p>
            </div>
            <!-- <div id="gained-chart"></div> -->
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-warning p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="dollar-sign" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{!! money($totalDueAmount, $currentCompany->currency->code) !!}</h2>
                <p class="card-text">{{ __('messages.due_amount') }}</p>
            </div>
            <!-- <div id="order-chart"></div> -->
        </div>
    </div>
</div>
{{-- <div class="card">
        <div class="card-header bg-white d-flex align-items-center">
            <h3 class="card-header__title mb-0 fs-1-3rem">{{ __('messages.expenses') }}</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="expensesChart" class="chart-canvas chartjs-render-monitor" width="1998" height="600"></canvas>
            </div>
        </div>
    </div> --}}
     <div class="row match-height">
        <!-- Avg Sessions Chart Card starts -->
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-sm-6 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                            <div class="mb-1 mb-sm-0">
                                <h2 class="font-weight-bolder mb-25">2.7K</h2>
                                <p class="card-text font-weight-bold mb-2">Avg Sessions</p>
                                <div class="font-medium-2">
                                    <span class="text-success mr-25">+5.2%</span>
                                    <span>vs last 7 days</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary">View Details</button>
                        </div>
                        <div class="col-sm-6 col-12 d-flex justify-content-between flex-column text-right order-sm-2 order-1">
                            {{-- <div class="dropdown chart-dropdown">
                                <button class="btn btn-sm border-0 dropdown-toggle p-50" type="button" id="dropdownItem5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Last 7 Days
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem5">
                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                </div>
                            </div> --}}
                            <div id="avg-sessions-chart"></div>
                        </div>
                    </div>
                    <hr />
                    <div class="row avg-sessions pt-50">
                        <div class="col-6 mb-2">
                            <p class="mb-50">Goal: $100000</p>
                            <div class="progress progress-bar-primary" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100" style="width: 50%"></div>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <p class="mb-50">Users: 100K</p>
                            <div class="progress progress-bar-warning" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="mb-50">Retention: 90%</p>
                            <div class="progress progress-bar-danger" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="70" aria-valuemax="100" style="width: 70%"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="mb-50">Duration: 1yr</p>
                            <div class="progress progress-bar-success" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="90" aria-valuemax="100" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Avg Sessions Chart Card ends -->

        <!-- Support Tracker Chart Card starts -->
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h4 class="card-title">Profit Loss Tracker</h4>
                    {{-- <div class="dropdown chart-dropdown">
                        <button class="btn btn-sm border-0 dropdown-toggle p-50" type="button" id="dropdownItem4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Last 7 Days
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem4">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                            <h1 class="font-large-2 font-weight-bolder mt-2 mb-0">163</h1>
                            {{-- <p class="card-text">Profit Loss Tracker</p> --}}
                        </div>
                        {{-- <div class="col-sm-10 col-12 d-flex justify-content-center">
                            <div id="support-trackers-chart"></div>
                        </div> --}}
                        <div class="col-sm-10 col-12 d-flex justify-content-center">
                            <div id="support-trackers-chart" style="min-height: 253.208px;"><div id="apexchartskvtiqlt6l" class="apexcharts-canvas apexchartskvtiqlt6l apexcharts-theme-light" style="width: 300px; height: 253.208px;"><svg id="SvgjsSvg1142" width="300" height="253.20833333333337" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1144" class="apexcharts-inner apexcharts-graphical" transform="translate(28, 20)"><defs id="SvgjsDefs1143"><clipPath id="gridRectMaskkvtiqlt6l"><rect id="SvgjsRect1146" width="252" height="270" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskkvtiqlt6l"><rect id="SvgjsRect1147" width="250" height="272" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1152" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1153" stop-opacity="1" stop-color="rgba(115,103,240,1)" offset="0"></stop><stop id="SvgjsStop1154" stop-opacity="1" stop-color="rgba(255,255,255,1)" offset="1"></stop><stop id="SvgjsStop1155" stop-opacity="1" stop-color="rgba(255,255,255,1)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1163" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1164" stop-opacity="1" stop-color="rgba(115,103,240,1)" offset="0"></stop><stop id="SvgjsStop1165" stop-opacity="1" stop-color="rgba(234,84,85,1)" offset="1"></stop><stop id="SvgjsStop1166" stop-opacity="1" stop-color="rgba(234,84,85,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1148" class="apexcharts-radialbar"><g id="SvgjsG1149"><g id="SvgjsG1150" class="apexcharts-tracks"><g id="SvgjsG1151" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 170.24481707317074 215.83042356502926" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="16.828048780487805" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 170.24481707317074 215.83042356502926"></path></g></g><g id="SvgjsG1157"><g id="SvgjsG1162" class="apexcharts-series apexcharts-radial-series" seriesName="CompletedxTickets" rel="1" data:realIndex="0"><path id="SvgjsPath1167" d="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 216.3263099534417 148.78143536953007" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1163)" stroke-opacity="1" stroke-linecap="butt" stroke-width="16.828048780487805" stroke-dasharray="8" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="249" data:value="83" index="0" j="0" data:pathOrig="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 216.3263099534417 148.78143536953007"></path></g><circle id="SvgjsCircle1158" r="81.07560975609758" cx="123" cy="134" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1159" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1160" font-family="Helvetica, Arial, sans-serif" x="123" y="129" text-anchor="middle" dominant-baseline="auto" font-size="1rem" font-weight="400" fill="#5e5873" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Completed Tickets</text><text id="SvgjsText1161" font-family="Helvetica, Arial, sans-serif" x="123" y="165" text-anchor="middle" dominant-baseline="auto" font-size="1.714rem" font-weight="400" fill="#5e5873" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">83%</text></g></g></g></g><line id="SvgjsLine1168" x1="0" y1="0" x2="246" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1169" x1="0" y1="0" x2="246" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1145" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 408px; height: 254px;"></div></div><div class="contract-trigger"></div></div><div class="resize-triggers"><div class="expand-trigger"><div style="width: 396px; height: 254px;"></div></div><div class="contract-trigger"></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 408px; height: 254px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <div class="text-center">
                            <p class="card-text mb-50">Profit</p>
                            <span class="font-large-1 font-weight-bold">29</span>
                        </div>
                        <div class="text-center">
                            <p class="card-text mb-50">Loss</p>
                            <span class="font-large-1 font-weight-bold">63</span>
                        </div>
                        <div class="text-center">
                            <p class="card-text mb-50">Response Time</p>
                            <span class="font-large-1 font-weight-bold">1d</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Tracker Chart Card ends -->
    </div>
    <div class="row">
    <div class="col">
            <div class="card">
                <div class="card-header card-header-large bg-white">
                    <h4 class="card-header__title">{{ __('messages.due_invoices') }}</h4>
                </div>

                @include('application.dashboard._due_invoices')
                
                <div class="card-footer text-center border-0">
                    <a class="text-muted" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.view_all') }}</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header card-header-large bg-white">
                    <h4 class="card-header__title">{{ __('messages.due_estimates') }}</h4>
                </div>

                @include('application.dashboard._due_estimates')

                <div class="card-footer text-center border-0">
                    <a class="text-muted" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.view_all') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_head_scripts')
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/charts/chart-apex.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('theme/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/pages/app-invoice-list.css')}}">
@endsection

@section('page_body_scripts')
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/chartjs-rounded-bar.js') }}"></script>
<script src="{{ asset('assets/js/charts.js') }}"></script>
<!-- BEGIN: Page JS-->
<script src="{{asset('theme/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<script src="{{asset('theme/app-assets/js/scripts/pages/app-invoice-list.js')}}"></script>
<!-- END: Page JS-->

<script>
(function() {
    'use strict';
    Charts.init();

    var Orders = function Orders(id) {
        var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'roundedBar';
        var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
        options = Chart.helpers.merge({
            barRoundness: 1.2,
            scales: {
                yAxes: [{
                    ticks: {
                        callback: function callback(a) {
                            return a.toLocaleString("en-US", {
                                style: "currency",
                                currency: "{{ $currency_code }}"
                            });
                        }
                    }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function label(a, e) {
                        var t = e.datasets[a.datasetIndex].label || "",
                            o = a.yLabel,
                            r = "",
                            val = o.toLocaleString("en-US", {
                                style: "currency",
                                currency: "{{ $currency_code }}"
                            });
                        return 1 < e.datasets.length && (r +=
                                '<span class="popover-body-label mr-auto">' + t + "</span>"), r +=
                            '<span class="popover-body-value">' + val + "</span>";
                    }
                }
            }
        }, options);
        var data = {
            labels: @json($expense_stats_label),
            datasets: [{
                label: "Expenses",
                data: @json($expense_stats)
            }]
        };
        Charts.create(id, type, options, data);
    };
    Orders('#expensesChart');
})();
</script>
@endsection