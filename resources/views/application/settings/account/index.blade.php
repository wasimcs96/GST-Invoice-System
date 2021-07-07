@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.account_settings'))
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.account_settings') }}</li>
            </ol>
        </nav>
        <a href="{{ URL(''.auth()->user()->uid.'/settings/index') }}" class="btn btn-info float-right">Back</a>
        <h1 class="m-1">{{ __('messages.account_settings') }}</h1>
    </div>

    <div class="row">
        {{-- <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'account'])
        </div> --}}
        <div class="col-lg-12">
            <div role="tabpanel" class="tab-pane active" id="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}" aria-expanded="true" aria-labelledby="account-pill-setting" aria-expanded="true">
            <div class="card card-form container-fluid">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">
                        <form action="{{route('settings.account.update', ['company_uid' => $currentCompany->uid])}}" method="POST" enctype="multipart/form-data">
                            @include('layouts._form_errors')
                            @csrf

                            <div class="form-group">
                                <label>{{ __('messages.profile_image') }}</label><br>
                                <input id="avatar" name="avatar" class="d-none" type="file" onchange="changePreview(this);">
                                <label for="avatar">
                                    <div class="media align-items-center">
                                        <div class="mr-3">
                                            <div class="avatar avatar-xl">
                                                <img id="file-prev" src="{{ $authUser->avatar }}" class="avatar-img rounded">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <a class="btn btn-sm btn-light choose-button">{{ __('messages.choose_photo') }}</a>
                                        </div>
                                    </div>
                                </label> 
                            </div>
            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group required">
                                        <label for="first_name">{{ __('messages.first_name') }}</label>
                                        <input name="first_name" type="text" class="form-control" placeholder="{{ __('messages.first_name') }}" value="{{ $authUser->first_name }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group required">
                                        <label for="last_name">{{ __('messages.last_name') }}</label>
                                        <input name="last_name" type="text" class="form-control" placeholder="{{ __('messages.last_name') }}" value="{{ $authUser->last_name }}" required>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group required">
                                        <label for="email">{{ __('messages.email') }}</label>
                                        <input name="email" type="email" class="form-control" placeholder="{{ __('messages.email') }}" value="{{ $authUser->email }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">{{ __('messages.phone') }}</label>
                                        <input name="phone" type="text" class="form-control" placeholder="{{ __('messages.phone') }}" value="{{ $authUser->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <p class="mb-1"><strong class="headings-color">{{ __('messages.update_password') }}</strong></p>
                                    <p class="text-muted">{{ __('messages.update_password_description') }}</p>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="old_password">{{ __('messages.old_password') }}</label>
                                        <input name="old_password" type="password" class="form-control" placeholder="{{ __('messages.old_password') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="new_password">{{ __('messages.new_password') }}</label>
                                        <input name="new_password" type="password" class="form-control" placeholder="{{ __('messages.new_password') }}">
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
    </div>
@endsection


 {{-- new --}}
 {{-- @extends('layouts.app', ['page' => 'settings'])

 @section('title', __('messages.account_settings'))
 @section('content')
 <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Membership</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">business</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{ __('messages.account_settings') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    @include('application.settings._aside', ['tab' => 'account'])
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-setting" aria-expanded="true">
                                        <!-- header media -->
                                        <div class="media">
                                            <a href="javascript:void(0);" class="mr-25">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" id="account-upload-img" class="rounded mr-50" alt="profile image" height="80" width="80" />
                                            </a>
                                            <!-- upload and reset button -->
                                            <div class="media-body mt-75 ml-1">
                                                <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                <input type="file" id="account-upload" hidden accept="image/*" />
                                                <button class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                                <p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
                                            </div>
                                            <!--/ upload and reset button -->
                                        </div>
                                        <!--/ header media -->

                                        <!-- form -->
                                        <form class="validate-form mt-2">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">Username</label>
                                                        <input type="text" class="form-control" id="account-username" name="username" placeholder="Username" value="johndoe" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Name</label>
                                                        <input type="text" class="form-control" id="account-name" name="name" placeholder="Name" value="John Doe" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input type="email" class="form-control" id="account-e-mail" name="email" placeholder="Email" value="granger007@hogward.com" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">Company</label>
                                                        <input type="text" class="form-control" id="account-company" name="company" placeholder="Company name" value="Crystal Technologies" />
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-75">
                                                    <div class="alert alert-warning mb-50" role="alert">
                                                        <h4 class="alert-heading">Your email is not confirmed. Please check your inbox.</h4>
                                                        <div class="alert-body">
                                                            <a href="javascript: void(0);" class="alert-link">Resend confirmation</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-2">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ general tab -->

                                    <!-- change password -->
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-old-password">Old Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="account-old-password" name="password" placeholder="Old Password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-new-password">New Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" id="account-new-password" name="new-password" class="form-control" placeholder="New Password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-retype-new-password">Retype New Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="account-retype-new-password" name="confirm-new-password" placeholder="New Password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ change password -->

                                    <!-- information -->
                                    <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="accountTextarea">Bio</label>
                                                        <textarea class="form-control" id="accountTextarea" rows="4" placeholder="Your Bio data here..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-birth-date">Birth date</label>
                                                        <input type="text" class="form-control flatpickr" placeholder="Birth date" id="account-birth-date" name="dob" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="accountSelect">Country</label>
                                                        <select class="form-control" id="accountSelect">
                                                            <option>USA</option>
                                                            <option>India</option>
                                                            <option>Canada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-website">Website</label>
                                                        <input type="text" class="form-control" name="website" id="account-website" placeholder="Website address" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-phone">Phone</label>
                                                        <input type="text" class="form-control" id="account-phone" placeholder="Phone number" value="(+656) 254 2568" name="phone" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-1 mr-1">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ information -->

                                    <!-- social -->
                                    <div class="tab-pane fade" id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form">
                                            <div class="row">
                                                <!-- social header -->
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i data-feather="link" class="font-medium-3"></i>
                                                        <h4 class="mb-0 ml-75">Social Links</h4>
                                                    </div>
                                                </div>
                                                <!-- twitter link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-twitter">Twitter</label>
                                                        <input type="text" id="account-twitter" class="form-control" placeholder="Add link" value="https://www.twitter.com" />
                                                    </div>
                                                </div>
                                                <!-- facebook link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-facebook">Facebook</label>
                                                        <input type="text" id="account-facebook" class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>
                                                <!-- google plus input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-google">Google+</label>
                                                        <input type="text" id="account-google" class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>
                                                <!-- linkedin link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-linkedin">LinkedIn</label>
                                                        <input type="text" id="account-linkedin" class="form-control" placeholder="Add link" value="https://www.linkedin.com" />
                                                    </div>
                                                </div>
                                                <!-- instagram link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-instagram">Instagram</label>
                                                        <input type="text" id="account-instagram" class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>
                                                <!-- Quora link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-quora">Quora</label>
                                                        <input type="text" id="account-quora" class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>

                                                <!-- divider -->
                                                <div class="col-12">
                                                    <hr class="my-2" />
                                                </div>

                                                <div class="col-12 mt-1">
                                                    <!-- profile connection header -->
                                                    <div class="d-flex align-items-center mb-3">
                                                        <i data-feather="user" class="font-medium-3"></i>
                                                        <h4 class="mb-0 ml-75">Profile Connections</h4>
                                                    </div>

                                                    <div class="row">
                                                        <!-- twitter user -->
                                                        <div class="col-6 col-md-3 text-center mb-1">
                                                            <p class="font-weight-bold">Your Twitter</p>
                                                            <div class="avatar mb-1">
                                                                <span class="avatar-content">
                                                                    <img src="../../../app-assets/images/avatars/11-small.png" alt="avatar img" width="40" height="40" />
                                                                </span>
                                                            </div>
                                                            <p class="mb-0">@johndoe</p>
                                                            <a href="javascript:void(0)">Disconnect</a>
                                                        </div>
                                                        <!-- facebook button -->
                                                        <div class="col-6 col-md-3 text-center mb-1">
                                                            <p class="font-weight-bold mb-2">Your Facebook</p>
                                                            <button class="btn btn-outline-primary">Connect</button>
                                                        </div>
                                                        <!-- google user -->
                                                        <div class="col-6 col-md-3 text-center mb-1">
                                                            <p class="font-weight-bold">Your Google</p>
                                                            <div class="avatar mb-1">
                                                                <span class="avatar-content">
                                                                    <img src="../../../app-assets/images/avatars/3-small.png" alt="avatar img" width="40" height="40" />
                                                                </span>
                                                            </div>
                                                            <p class="mb-0">@luraweber</p>
                                                            <a href="javascript:void(0)">Disconnect</a>
                                                        </div>
                                                        <!-- github button -->
                                                        <div class="col-6 col-md-3 text-center mb-2">
                                                            <p class="font-weight-bold mb-1">Your GitHub</p>
                                                            <button class="btn btn-outline-primary">Connect</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <!-- submit and cancel button -->
                                                    <button type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ social -->

                                    <!-- notifications -->
                                    <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                        <div class="row">
                                            <h6 class="section-label mx-1 mb-2">Activity</h6>
                                            <div class="col-12 mb-2">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch1" />
                                                    <label class="custom-control-label" for="accountSwitch1">
                                                        Email me when someone comments onmy article
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch2" />
                                                    <label class="custom-control-label" for="accountSwitch2">
                                                        Email me when someone answers on my form
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="accountSwitch3" />
                                                    <label class="custom-control-label" for="accountSwitch3">Email me hen someone follows me</label>
                                                </div>
                                            </div>
                                            <h6 class="section-label mx-1 mt-2">Application</h6>
                                            <div class="col-12 mt-1 mb-2">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch4" />
                                                    <label class="custom-control-label" for="accountSwitch4">News and announcements</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch6" />
                                                    <label class="custom-control-label" for="accountSwitch6">Weekly product updates</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-75">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="accountSwitch5" />
                                                    <label class="custom-control-label" for="accountSwitch5">Weekly blog digest</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary mt-2">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ notifications -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->

        </div>
    </div>
</div>
@endsection --}}
{{-- new end --}}
