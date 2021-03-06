{{-- @extends('layouts.auth')

@section('title', __('messages.register'))

@section('content')
<h1 class="text-center h6 mb-4">{{ __('messages.register_welcome') }}</h1>

<form id="auth-form" action="{{ route('register') }}" method="POST" novalidate>
    @csrf

    <div class="form-group">
        <label class="text-label" for="first_name">{{ __('messages.first_name') }}:</label>
        <div class="input-group">
            <input id="first_name" name="first_name" type="text"
                class="form-control form-control-prepended @error('first_name') is-invalid @enderror"
                placeholder="{{ __('messages.first_name') }}" value="{{ old('first_name') }}"
                 required>
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="last_name">{{ __('messages.last_name') }}:</label>
        <div class="input-group">
            <input id="last_name" name="last_name" type="text"
                class="form-control form-control-prepended @error('last_name') is-invalid @enderror"
                placeholder="{{ __('messages.last_name') }}" value="{{ old('last_name') }}"
                required>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="company_name">{{ __('messages.company_name') }}:</label>
        <div class="input-group">
            <input id="company_name" name="company_name" type="text"
                class="form-control form-control-prepended @error('company_name') is-invalid @enderror"
                placeholder="{{ __('messages.company_name') }}" value="{{ old('company_name') }}"
                required>
            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="email">{{ __('messages.email') }}:</label>
        <div class="input-group">
            <input id="email" name="email" type="email"
                class="form-control form-control-prepended @error('email') is-invalid @enderror"
                placeholder="user@example.com" value="{{ old('email') }}" autocomplete="email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="password">{{ __('messages.password') }}:</label>
        <div class="input-group">
            <input id="password" name="password" type="password"
                class="form-control form-control-prepended @error('password') is-invalid @enderror"
                placeholder="{{ __('messages.enter_your_password') }}" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="password_confirmation">{{ __('messages.confirm_password') }}:</label>
        <div class="input-group">
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="form-control form-control-prepended @error('password_confirmation') is-invalid @enderror"
                placeholder="{{ __('messages.confirm_password') }}" required>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        @if(get_system_setting('google_recapthca_key'))
            <button class="btn btn-block btn-primary g-recaptcha" data-sitekey="{{ get_system_setting('google_recapthca_key') }}" data-callback="onSubmit" data-action="submit">{{ __('messages.register') }}</button>
        @else
            <button class="btn btn-block btn-primary" type="submit">{{ __('messages.register') }}</button>
        @endif
    </div>

    <div class="form-group text-center">
        <a href="{{ route('login') }}">{{ __('messages.login') }}</a> <br>
    </div>
</form>

@endsection

@section('page_body_scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    @if(get_system_setting('google_recapthca_key'))
        <script>
            function onSubmit(token) {
                document.getElementById("auth-form").submit();
            }
        </script>
    @endif
@endsection --}}


@extends('layouts.auth')

@section('title', 'Sign up')

@section('content')

<?php 
$states = DB::table('states')->get();

?>
{{-- {{ dd($states) }}   --}}

<!-- begin:: Page -->

    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Login v1 -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="javascript:void(0);" class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h2 class="brand-text text-primary ml-1">Calcigo</h2>
                    </a>

                    <h4 class="card-title mb-1" style="text-align: center;">Welcome to Calcigo! ????</h4>
                    <p class="card-text mb-2">Please sign-up to your account and start the adventure</p>

                   
<form id="auth-form" action="{{ route('register') }}" method="POST" novalidate>
    @csrf

    <div class="form-group">
        <label class="text-label" for="first_name">{{ __('messages.first_name') }}:</label>
        <div class="input-group">
            <input id="first_name" name="first_name" type="text"
                class="form-control form-control-prepended @error('first_name') is-invalid @enderror"
                placeholder="{{ __('messages.first_name') }}" value="{{ old('first_name') }}"
                 required>
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="last_name">{{ __('messages.last_name') }}:</label>
        <div class="input-group">
            <input id="last_name" name="last_name" type="text"
                class="form-control form-control-prepended @error('last_name') is-invalid @enderror"
                placeholder="{{ __('messages.last_name') }}" value="{{ old('last_name') }}"
                required>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="company_name">{{ __('messages.company_name') }}:</label>
        <div class="input-group">
            <input id="company_name" name="company_name" type="text"
                class="form-control form-control-prepended @error('company_name') is-invalid @enderror"
                placeholder="{{ __('messages.company_name') }}" value="{{ old('company_name') }}"
                required>
            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="email">{{ __('messages.email') }}:</label>
        <div class="input-group">
            <input id="email" name="email" type="email"
                class="form-control form-control-prepended @error('email') is-invalid @enderror"
                placeholder="user@example.com" value="{{ old('email') }}" autocomplete="email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="text-label" for="state">{{ __('messages.state') }}:</label>
        <div class="input-group">
            <select id="state_id" name="state_id"  class="form-control form-control-prepended @error('state_id') is-invalid @enderror"
            required>
            <option disabled selected>Select state</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach

        </select>
            {{-- <input id="email" name="email" type="email"
                class="form-control form-control-prepended @error('email') is-invalid @enderror"
                placeholder="user@example.com" 
                > --}}
            @error('state_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    {{-- <div class="col-md-6 col-12"> --}}
        {{-- <div class="form-group">
            <label for="billing[state]">{{ __('messages.state') }}</label>
            <select id="state_id" name="state_id" data-toggle="select"
                class="form-control select2-hidden-accessible oi" data-select2-id="billing[state]"
                required>
                <option disabled selected>Select state</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach

            </select>
        </div> --}}
    {{-- </div> --}}
    <div class="form-group">
        <label class="text-label" for="password">{{ __('messages.password') }}:</label>
        <div class="input-group">
            <input id="password" name="password" type="password"
                class="form-control form-control-prepended @error('password') is-invalid @enderror"
                placeholder="{{ __('messages.enter_your_password') }}" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="text-label" for="password_confirmation">{{ __('messages.confirm_password') }}:</label>
        <div class="input-group">
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="form-control form-control-prepended @error('password_confirmation') is-invalid @enderror"
                placeholder="{{ __('messages.confirm_password') }}" required>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        @if(get_system_setting('google_recapthca_key'))
            <button class="btn btn-block btn-primary g-recaptcha" data-sitekey="{{ get_system_setting('google_recapthca_key') }}" data-callback="onSubmit" data-action="submit">{{ __('messages.register') }}</button>
        @else
            <button class="btn btn-block btn-primary" type="submit">{{ __('messages.register') }}</button>
        @endif
    </div>

    <div class="form-group text-center">
        <a href="{{ route('login') }}">{{ __('messages.login') }}</a> <br>
    </div>
</form>

                    <p class="text-center mt-2">
                        <span>New on our platform?</span>
                        <a href="{{ route('register') }}">
                            <span>Create an account</span>
                        </a>
                    </p>

                    {{-- <div class="divider my-2">
                        <div class="divider-text">or</div>
                    </div>

                    <div class="auth-footer-btn d-flex justify-content-center">
                        <a href="javascript:void(0)" class="btn btn-facebook">
                            <i data-feather="facebook"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-twitter white">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-google">
                            <i data-feather="mail"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-github">
                            <i data-feather="github"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
            <!-- /Login v1 -->
        </div>
    </div>
    @endsection