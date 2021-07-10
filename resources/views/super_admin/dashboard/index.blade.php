@extends('layouts.app', ['page' => 'super_admin.dashboard'])

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
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header align-items-start pb-0">
                    <div>
                        <h2 class="font-weight-bolder">{{ isset($users) ? $users : '0' }}</h2>
                        <p class="card-text">{{ __('messages.users') }}</p>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div id="line-area-chart-5"></div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header align-items-start pb-0">
                    <div>
                        <h2 class="font-weight-bolder">{{ isset($active_subscriptions) ? $active_subscriptions : '0' }}
                        </h2>
                        <p class="card-text">{{ __('messages.active_subscriptions') }}</p>
                    </div>
                    <div class="avatar bg-light-success p-50">
                        <div class="avatar-content">
                            <i data-feather="user-check" class="font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div id="line-area-chart-6"></div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header align-items-start pb-0">
                    <div>
                        <h2 class="font-weight-bolder">{!! money($total_earnings, get_system_setting('application_currency')) !!}</h2>
                        <p class="card-text">{{ __('messages.total_earnings') }}</p>
                    </div>
                    <div class="avatar bg-light-warning p-50">
                        <div class="avatar-content">
                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div id="line-area-chart-7"></div>
            </div>
        </div>
    </div>

    {{-- <div class="card">
        <div class="card-header bg-white d-flex align-items-center">
            <h3 class="card-header__title mb-0 fs-1-3rem">{{ __('messages.earnings_this_year') }}</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="earningsChart" class="chart-canvas chartjs-render-monitor" width="1998" height="600"></canvas>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header align-items-start">
                    <div>
                        <h4 class="card-title mb-25">{{ __('messages.earnings_this_year') }}</h4>
                    </div>
                    <i data-feather="settings" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body pb-0">
                    <div id="sales-line-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header card-header-large bg-white">
            <h4 class="card-header__title">{{ __('messages.latest_orders') }}</h4>
        </div>

        @include('super_admin.orders._table', ['orders' => $latest_orders])

        <div class="card-footer text-center border-0">
            <a class="text-muted" href="{{ route('super_admin.orders') }}">{{ __('messages.view_all') }}</a>
        </div>
    </div>
@endsection

@section('page_head_scripts')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/pages/app-invoice-list.css') }}">
@endsection

@section('page_body_scripts')
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs-rounded-bar.js') }}"></script>
    <script src="{{ asset('assets/js/charts.js') }}"></script>
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('theme/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/pages/app-invoice-list.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/cards/card-analytics.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/cards/card-statistics.js') }}"></script>
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
                                        currency: "{{ get_system_setting('application_currency') }}"
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
                                        currency: "{{ get_system_setting('application_currency') }}"
                                    });
                                return 1 < e.datasets.length && (r +=
                                        '<span class="popover-body-label mr-auto">' + t + "</span>"),
                                    r += '<span class="popover-body-value">' + val + "</span>";
                            }
                        }
                    }
                }, options);
                var data = {
                    labels: @json($earnings_stats_label),
                    datasets: [{
                        label: "Earnings",
                        data: @json($earnings_stats)
                    }]
                };
                Charts.create(id, type, options, data);
            };
            Orders('#earningsChart');
        })();
    </script>
@endsection
