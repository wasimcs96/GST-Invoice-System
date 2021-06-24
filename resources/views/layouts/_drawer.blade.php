{{-- <div class="mdk-drawer js-mdk-drawer" id="default-drawer" data-align="start" data-position="left">
    <div class="mdk-drawer__scrim"></div>
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar="init">
            <div class="simplebar-wrapper">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset">
                        <div class="simplebar-content">

                            @if($authUser->hasRole('super_admin'))
                                <div class="sidebar-heading sidebar-m-t">Super Admin Menu</div>
                                <ul class="sidebar-menu">
                                    <li class="sidebar-menu-item {{ $page == 'super_admin.dashboard' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('super_admin.dashboard') }}">
                                            <span class="sidebar-menu-text">{{ __('messages.dashboard') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'super_admin.users' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('super_admin.users') }}">
                                            <span class="sidebar-menu-text">{{ __('messages.users') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'super_admin.plans' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('super_admin.plans') }}">
                                            <span class="sidebar-menu-text">{{ __('messages.plans') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'super_admin.subscriptions' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('super_admin.subscriptions') }}">
                                            <span class="sidebar-menu-text">{{ __('messages.subscriptions') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'super_admin.orders' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('super_admin.orders') }}">
                                            <span class="sidebar-menu-text">{{ __('messages.orders') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ str_contains($page, 'super_admin.settings.') ? 'active open' : ''}}">
                                        <a class="sidebar-menu-button {{ str_contains($page, 'super_admin.settings.') ? '' : 'collapsed'}}" data-toggle="collapse" href="#settings_menu" aria-expanded="false">
                                            <span class="sidebar-menu-text">{{ __('messages.settings') }}</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu {{ str_contains($page, 'super_admin.settings.') ? 'collapse show' : 'collapse'}}" id="settings_menu" style="">
                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.application' ? 'active' : ''}}">
                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.application') }}">
                                                    <span class="sidebar-menu-text">{{ __('messages.application_settings') }}</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.mail' ? 'active' : ''}}">
                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.mail') }}">
                                                    <span class="sidebar-menu-text">{{ __('messages.mail_settings') }}</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.payment' ? 'active' : ''}}">
                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.payment') }}">
                                                    <span class="sidebar-menu-text">{{ __('messages.payment_settings') }}</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.theme' ? 'active' : ''}}">
                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.theme', get_system_setting('theme')) }}">
                                                    <span class="sidebar-menu-text">{{ __('messages.theme_settings') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-menu-item d-xl-none d-md-none d-lg-none">
                                        <a class="sidebar-menu-button" href="{{ route('logout') }}">
                                            <span class="sidebar-menu-text">{{ __('messages.logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            @else
                                <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                                    <a href="{{ route('settings.company', ['company_uid' => $currentCompany->uid]) }}" class="flex d-flex align-items-center text-underline-0 text-body">
                                        <span class="avatar mr-3">
                                            <img src="{{ $currentCompany->avatar }}" alt="avatar" class="avatar-img rounded">
                                        </span>
                                        <span class="flex d-flex flex-column">
                                            <strong>{{ $currentCompany->name }}</strong>
                                        </span>
                                    </a>
                                </div>

                                <div class="sidebar-heading sidebar-m-t">Menu</div>
                                <ul class="sidebar-menu">
                                    <li class="sidebar-menu-item {{ $page == 'dashboard' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i>
                                            <span class="sidebar-menu-text">{{ __('messages.dashboard') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'customers' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i>
                                            <span class="sidebar-menu-text">{{ __('messages.customers') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'products' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('products', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">store</i>
                                            <span class="sidebar-menu-text">{{ __('messages.products') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'invoices' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i>
                                            <span class="sidebar-menu-text">{{ __('messages.invoices') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'estimates' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                            <span class="sidebar-menu-text">{{ __('messages.estimates') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'payments' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">payment</i>
                                            <span class="sidebar-menu-text">{{ __('messages.payments') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'expenses' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monetization_on</i>
                                            <span class="sidebar-menu-text">{{ __('messages.expenses') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ $page == 'vendors' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">local_shipping</i>
                                            <span class="sidebar-menu-text">{{ __('messages.vendors') }}</span>
                                        </a>
                                    </li>

                                    @if($currentCompany->subscription('main')->getFeatureValue('view_reports') === '1')
                                        <li class="sidebar-menu-item {{ str_contains($page, 'reports.') ? 'active open' : ''}}">
                                            <a class="sidebar-menu-button {{ str_contains($page, 'reports.') ? '' : 'collapsed'}}" data-toggle="collapse" href="#reports_menu" aria-expanded="false">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pie_chart_outlined</i>
                                                <span class="sidebar-menu-text">{{ __('messages.reports') }}</span>
                                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                            </a>
                                            <ul class="sidebar-submenu {{ str_contains($page, 'reports.') ? 'collapse show' : 'collapse'}}" id="reports_menu" style="">
                                                <li class="sidebar-menu-item {{ $page == 'reports.customer_sales' ? 'active' : ''}}">
                                                    <a class="sidebar-menu-button" href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}">
                                                        <span class="sidebar-menu-text">{{ __('messages.customer_sales') }}</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item {{ $page == 'reports.product_sales' ? 'active' : ''}}">
                                                    <a class="sidebar-menu-button" href="{{ route('reports.product_sales', ['company_uid' => $currentCompany->uid]) }}">
                                                        <span class="sidebar-menu-text">{{ __('messages.product_sales') }}</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item {{ $page == 'reports.profit_loss' ? 'active' : ''}}">
                                                    <a class="sidebar-menu-button" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}">
                                                        <span class="sidebar-menu-text">{{ __('messages.profit_loss') }}</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item {{ $page == 'reports.expenses' ? 'active' : ''}}">
                                                    <a class="sidebar-menu-button" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}">
                                                        <span class="sidebar-menu-text">{{ __('messages.expenses') }}</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item {{ $page == 'reports.vendors' ? 'active' : ''}}">
                                                    <a class="sidebar-menu-button" href="{{ route('reports.vendors', ['company_uid' => $currentCompany->uid]) }}">
                                                        <span class="sidebar-menu-text">{{ __('messages.vendors') }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                    <li class="sidebar-menu-item {{ $page == 'settings' ? 'active' : ''}}">
                                        <a class="sidebar-menu-button" href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">settings</i>
                                            <span class="sidebar-menu-text">{{ __('messages.settings') }}</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item d-xl-none d-md-none d-lg-none">
                                        <a class="sidebar-menu-button" href="{{ route('logout') }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">exit_to_app</i>
                                            <span class="sidebar-menu-text">{{ __('messages.logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder"></div>
            </div>
        </div>
    </div>
</div> --}}

<div class="main-menu-content">
    @if($authUser->hasRole('super_admin'))
    <div class="sidebar-heading sidebar-m-t mx-3 my-2">Super Admin Menu</div>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item {{ $page == 'super_admin.dashboard' ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ route('super_admin.dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">{{ __('messages.dashboard') }}</span><span class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a>
                </li>
                <li class=" nav-item {{ $page == 'super_admin.users' ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ route('super_admin.users') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Email">{{ __('messages.users') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'super_admin.plans' ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ route('super_admin.plans') }}"><i data-feather="message-square"></i><span class="menu-title text-truncate" data-i18n="Chat">{{ __('messages.plans') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'super_admin.subscriptions' ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ route('super_admin.subscriptions') }}"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Todo">{{ __('messages.subscriptions') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'super_admin.orders' ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ route('super_admin.orders') }}"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Calendar">{{ __('messages.orders') }}</span></a>
                </li>
                {{-- <li class=" nav-item {{ str_contains($page, 'super_admin.settings.') ? 'active open' : ''}}">
                    <a class="d-flex align-items-center {{ str_contains($page, 'super_admin.settings.') ? '' : 'collapsed'}}" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{ __('messages.settings') }}</span></a>
                    <ul class="menu-content {{ str_contains($page, 'super_admin.settings.') ? 'collapse show' : 'collapse'}}" id="settings_menu" style="">
                        <li class="{{ $page == 'super_admin.settings.application' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('super_admin.settings.application') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('messages.application_settings') }}</span></a>
                        </li>
                        <li class="{{ $page == 'super_admin.settings.mail' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('super_admin.settings.mail') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{ __('messages.mail_settings') }}</span></a>
                        </li>
                        <li class="{{ $page == 'super_admin.settings.payment' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('super_admin.settings.payment') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">{{ __('messages.payment_settings') }}</span></a>
                        </li>
                        <li class="{{ $page == 'super_admin.settings.theme' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('super_admin.settings.theme', get_system_setting('theme')) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">{{ __('messages.theme_settings') }}</span></a>
                        </li>
                    </ul>
                </li> --}}
                <li class="{{ Request::segment(2) == 'settings' ? ' nav-item active' :  'nav-item' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Menu Levels">{{ __('messages.settings') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::segment(3) == 'application' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('super_admin.settings.application') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Payment">{{ __('messages.application_settings') }}</span></a>
                        </li>
                        <li class="{{ Request::segment(3) == 'mail' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('super_admin.settings.mail') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Email">{{ __('messages.mail_settings') }}</span></a>
                        </li>
                        <li class="{{ Request::segment(3) == 'payment' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('super_admin.settings.payment') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="SMS">{{ __('messages.payment_settings') }}</span></a>
                        </li>
                        <li class="{{ Request::segment(3) == 'theme' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('super_admin.settings.theme', get_system_setting('theme')) }}"><i data-feather="circle"></i><span class="menu-item text-truncate"data-i18n="Third Party">{{ __('messages.theme_settings') }}</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="{{ route('logout') }}"><i data-feather="power"></i><span class="menu-title text-truncate" data-i18n="File Manager">{{ __('messages.logout') }}</span></a>
                </li>
            </ul>
            @else
            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account my-2">
                <a href="{{ route('settings.company', ['company_uid' => $currentCompany->uid]) }}" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="avatar mr-3">
                        <img src="{{ $currentCompany->avatar }}" alt="avatar" style="
                        height: 62px;
                    " class="avatar-img rounded">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong>{{ $currentCompany->name }}</strong>
                    </span>
                </a>
            </div>

            <div class="sidebar-heading sidebar-m-t mx-3 my-2">Menu</div>
            <ul class="navigation navigation-main" data-menu="menu-navigation">
                <li class=" nav-item {{ $page == 'dashboard' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('dashboard', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="home">dashboard</i><span class="menu-title text-truncate" data-i18n="Dashboards">{{ __('messages.dashboard') }}</span><span class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a>
                </li>
                <li class=" nav-item {{ $page == 'customers' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="user">account_box</i><span class="menu-title text-truncate" data-i18n="Email">{{ __('messages.customers') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'products' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('products', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="message-square">store</i><span class="menu-title text-truncate" data-i18n="Chat">{{ __('messages.products') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'invoices' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="check-square">receipt</i><span class="menu-title text-truncate" data-i18n="Todo">{{ __('messages.invoices') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'estimates' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="calendar">description</i><span class="menu-title text-truncate" data-i18n="Calendar">{{ __('messages.estimates') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'payments' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="calendar">payment</i><span class="menu-title text-truncate" data-i18n="Calendar">{{ __('messages.payments') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'expenses' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="calendar">monetization_on</i><span class="menu-title text-truncate" data-i18n="Calendar">{{ __('messages.expenses') }}</span></a>
                </li>
                <li class=" nav-item {{ $page == 'vendors' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="calendar">local_shipping</i><span class="menu-title text-truncate" data-i18n="Calendar">{{ __('messages.vendors') }}</span></a>
                </li>

                @if($currentCompany->subscription('main')->getFeatureValue('view_reports') === '1')
                {{-- <li class=" nav-item {{ str_contains($page, 'reports.') ? 'active open' : ''}}">
                    <a class="d-flex align-items-center {{ str_contains($page, 'reports.') ? '' : 'collapsed'}}" href="#"><i data-feather="user">pie_chart_outlined</i><span class="menu-title text-truncate" data-i18n="User">{{ __('messages.reports') }}</span></a>
                    <ul class="menu-content {{ str_contains($page, 'reports.') ? 'collapse show' : 'collapse'}}" id="reports_menu" style="">
                        <li class="{{ $page == 'reports.customer_sales' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('messages.customer_sales') }}</span></a>
                        </li>
                        <li class="{{ $page == 'reports.product_sales' ? 'active' : ''}}">
                            <a class="d-flex align-items-center"href="{{ route('reports.product_sales', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="View">{{ __('messages.product_sales') }}</span></a>
                        </li>
                        <li class="{{ $page == 'reports.profit_loss' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">{{ __('messages.profit_loss') }}</span></a>
                        </li>
                        <li class="{{ $page == 'reports.expenses' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">{{ __('messages.expenses') }}</span></a>
                        </li>
                        <li class="{{ $page == 'reports.vendors' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ route('reports.vendors', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">{{ __('messages.vendors') }}</span></a>
                        </li>
                    </ul>
                </li> --}}
                <li class="{{ Request::segment(2) == 'reports' ? ' nav-item active' :  'nav-item' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Menu Levels">{{ __('messages.reports') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::segment(3) == 'customer-sales' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Payment">{{ __('messages.customer_sales') }}</span></a>
                        </li>
                        <li class="{{ Request::segment(3) == 'product-sales' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('reports.product_sales', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Email">{{ __('messages.product_sales') }}</span></a>
                        </li>
                        <li class="{{ Request::segment(3) == 'profit-loss' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="SMS">{{ __('messages.profit_loss') }}</span></a>
                        </li>
                        <li class="{{ Request::segment(3) == 'expenses' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Third Party">{{ __('messages.expenses') }}</span></a>
                        </li>
                        <li class="{{ Request::segment(3) == 'vendors' ? 'active' : null }}"><a class="d-flex align-items-center" href="{{ route('reports.vendors', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Third Party">{{ __('messages.vendors') }}</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                
                <li class=" nav-item {{ $page == 'settings' ? 'active' : ''}}">
                    <a class="d-flex align-items-center" href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}"><i data-feather="type">settings</i><span class="menu-title text-truncate" data-i18n="Typography">{{ __('messages.settings') }}</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('logout') }}"><i data-feather="power"></i><span class="menu-title text-truncate" data-i18n="Colors">{{ __('messages.logout') }}</span></a>
                </li>
            </ul>
            @endif
        </div>