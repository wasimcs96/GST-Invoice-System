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
    <!-- <div class="row card-group-row">
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">{{ __('messages.users') }}</div>
                    <div class="text-amount">{{ isset($users) ? $users : '0'}}</div>
                </div>
                <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">{{ __('messages.active_subscriptions') }}</div>
                    <div class="text-amount">{{ isset($active_subscriptions) ? $active_subscriptions : '0'}}</div>
                </div>
                <div><i class="material-icons icon-muted icon-40pt ml-3">assessment</i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">{{ __('messages.total_earnings') }}</div>
                    <div class="text-amount">{!! money($total_earnings, get_system_setting('application_currency')) !!}</div>
                </div>
                <div><i class="material-icons icon-muted icon-40pt ml-3">monetization_on</i></div>
            </div>
        </div>
    </div> -->
    <div class="row card-group-row">
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="users" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{ __('messages.users') }}</h2>
                <p class="card-text">{{ isset($users) ? $users : '0'}}</p>
            </div>
             <div id="gained-chart"></div> 
        </div>
    </div>
    {{-- <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users font-medium-5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{ __('messages.users') }}</h2>
                <p class="card-text">{{ isset($users) ? $users : '0'}}</p>
            </div>
            <div id="line-area-chart-1" style="min-height: 100px;"><div id="apexchartsu0fdy1tf" class="apexcharts-canvas apexchartsu0fdy1tf apexcharts-theme-light" style="width: 237px; height: 100px;"><svg id="SvgjsSvg1942" width="237" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1944" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1943"><clipPath id="gridRectMasku0fdy1tf"><rect id="SvgjsRect1949" width="243.5" height="102.5" x="-3.25" y="-1.25" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMasku0fdy1tf"><rect id="SvgjsRect1950" width="241" height="104" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1955" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1956" stop-opacity="0.7" stop-color="rgba(115,103,240,0.7)" offset="0"></stop><stop id="SvgjsStop1957" stop-opacity="0.5" stop-color="rgba(241,240,254,0.5)" offset="0.8"></stop><stop id="SvgjsStop1958" stop-opacity="0.5" stop-color="rgba(241,240,254,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1948" x1="0" y1="0" x2="0" y2="100" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1961" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1962" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1964" class="apexcharts-grid"><g id="SvgjsG1965" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1967" x1="0" y1="0" x2="237" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1968" x1="0" y1="20" x2="237" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1969" x1="0" y1="40" x2="237" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1970" x1="0" y1="60" x2="237" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1971" x1="0" y1="80" x2="237" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1972" x1="0" y1="100" x2="237" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1966" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1974" x1="0" y1="100" x2="237" y2="100" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1973" x1="0" y1="1" x2="0" y2="100" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1951" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1952" class="apexcharts-series" seriesName="Subscribers" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1959" d="M 0 100L 0 77.77777777777777C 13.825 77.77777777777777 25.675 51.111111111111114 39.5 51.111111111111114C 53.325 51.111111111111114 65.175 60 79 60C 92.825 60 104.675 24.444444444444443 118.5 24.444444444444443C 132.325 24.444444444444443 144.175 55.55555555555556 158 55.55555555555556C 171.825 55.55555555555556 183.675 6.666666666666657 197.5 6.666666666666657C 211.325 6.666666666666657 223.175 17.777777777777786 237 17.777777777777786C 237 17.777777777777786 237 17.777777777777786 237 100M 237 17.777777777777786z" fill="url(#SvgjsLinearGradient1955)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasku0fdy1tf)" pathTo="M 0 100L 0 77.77777777777777C 13.825 77.77777777777777 25.675 51.111111111111114 39.5 51.111111111111114C 53.325 51.111111111111114 65.175 60 79 60C 92.825 60 104.675 24.444444444444443 118.5 24.444444444444443C 132.325 24.444444444444443 144.175 55.55555555555556 158 55.55555555555556C 171.825 55.55555555555556 183.675 6.666666666666657 197.5 6.666666666666657C 211.325 6.666666666666657 223.175 17.777777777777786 237 17.777777777777786C 237 17.777777777777786 237 17.777777777777786 237 100M 237 17.777777777777786z" pathFrom="M -1 140L -1 140L 39.5 140L 79 140L 118.5 140L 158 140L 197.5 140L 237 140"></path><path id="SvgjsPath1960" d="M 0 77.77777777777777C 13.825 77.77777777777777 25.675 51.111111111111114 39.5 51.111111111111114C 53.325 51.111111111111114 65.175 60 79 60C 92.825 60 104.675 24.444444444444443 118.5 24.444444444444443C 132.325 24.444444444444443 144.175 55.55555555555556 158 55.55555555555556C 171.825 55.55555555555556 183.675 6.666666666666657 197.5 6.666666666666657C 211.325 6.666666666666657 223.175 17.777777777777786 237 17.777777777777786" fill="none" fill-opacity="1" stroke="#7367f0" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasku0fdy1tf)" pathTo="M 0 77.77777777777777C 13.825 77.77777777777777 25.675 51.111111111111114 39.5 51.111111111111114C 53.325 51.111111111111114 65.175 60 79 60C 92.825 60 104.675 24.444444444444443 118.5 24.444444444444443C 132.325 24.444444444444443 144.175 55.55555555555556 158 55.55555555555556C 171.825 55.55555555555556 183.675 6.666666666666657 197.5 6.666666666666657C 211.325 6.666666666666657 223.175 17.777777777777786 237 17.777777777777786" pathFrom="M -1 140L -1 140L 39.5 140L 79 140L 118.5 140L 158 140L 197.5 140L 237 140"></path><g id="SvgjsG1953" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1980" r="0" cx="0" cy="0" class="apexcharts-marker w87gged3s no-pointer-events" stroke="#ffffff" fill="#7367f0" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1954" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1975" x1="0" y1="0" x2="237" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1976" x1="0" y1="0" x2="237" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1977" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1978" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1979" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1947" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1963" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1945" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 50px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(115, 103, 240);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 238px; height: 238px;"></div></div><div class="contract-trigger"></div></div></div>
    </div> --}}
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-secondary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="file" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{ __('messages.active_subscriptions') }}</h2>
                <p class="card-text">{{ isset($active_subscriptions) ? $active_subscriptions : '0'}}</p>
            </div>
            <div id="order-chart"></div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-info p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="package" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{ __('messages.total_earnings') }}</h2>
                <p class="card-text">{!! money($total_earnings, get_system_setting('application_currency')) !!}</p>
            </div>
            <!-- <div id="gained-chart"></div> -->
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
                            <div id="support-trackers-chart" style="min-height: 253.208px;"><div id="apexchartspr5pqhaj" class="apexcharts-canvas apexchartspr5pqhaj apexcharts-theme-light" style="width: 300px; height: 253.208px;"><svg id="SvgjsSvg1380" width="300" height="253.20833333333337" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1382" class="apexcharts-inner apexcharts-graphical" transform="translate(28, 20)"><defs id="SvgjsDefs1381"><clipPath id="gridRectMaskpr5pqhaj"><rect id="SvgjsRect1384" width="252" height="270" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskpr5pqhaj"><rect id="SvgjsRect1385" width="250" height="272" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1390" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1391" stop-opacity="1" stop-color="rgba(115,103,240,1)" offset="0"></stop><stop id="SvgjsStop1392" stop-opacity="1" stop-color="rgba(255,255,255,1)" offset="1"></stop><stop id="SvgjsStop1393" stop-opacity="1" stop-color="rgba(255,255,255,1)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1401" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1402" stop-opacity="1" stop-color="rgba(115,103,240,1)" offset="0"></stop><stop id="SvgjsStop1403" stop-opacity="1" stop-color="rgba(234,84,85,1)" offset="1"></stop><stop id="SvgjsStop1404" stop-opacity="1" stop-color="rgba(234,84,85,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1386" class="apexcharts-radialbar"><g id="SvgjsG1387"><g id="SvgjsG1388" class="apexcharts-tracks"><g id="SvgjsG1389" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 170.24481707317074 215.83042356502926" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="16.828048780487805" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 170.24481707317074 215.83042356502926"></path></g></g><g id="SvgjsG1395"><g id="SvgjsG1400" class="apexcharts-series apexcharts-radial-series" seriesName="CompletedxTickets" rel="1" data:realIndex="0"><path id="SvgjsPath1405" d="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 216.3263099534417 148.78143536953007" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1401)" stroke-opacity="1" stroke-linecap="butt" stroke-width="16.828048780487805" stroke-dasharray="8" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="249" data:value="83" index="0" j="0" data:pathOrig="M 75.7551829268292 215.83042356502926 A 94.48963414634149 94.48963414634149 0 1 1 216.3263099534417 148.78143536953007"></path></g><circle id="SvgjsCircle1396" r="81.07560975609758" cx="123" cy="134" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1397" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1398" font-family="Helvetica, Arial, sans-serif" x="123" y="129" text-anchor="middle" dominant-baseline="auto" font-size="1rem" font-weight="400" fill="#5e5873" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Completed Tickets</text><text id="SvgjsText1399" font-family="Helvetica, Arial, sans-serif" x="123" y="165" text-anchor="middle" dominant-baseline="auto" font-size="1.714rem" font-weight="400" fill="#5e5873" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">83%</text></g></g></g></g><line id="SvgjsLine1406" x1="0" y1="0" x2="246" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1407" x1="0" y1="0" x2="246" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1383" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
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
