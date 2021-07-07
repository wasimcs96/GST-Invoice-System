@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.estimate_settings'))
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.estimate_settings') }}</li>
            </ol>
        </nav>
        <a href="{{ URL(''.auth()->user()->uid.'/settings/index') }}" class="btn btn-info float-right">Back</a>
        <h1 class="m-1">{{ __('messages.estimate_settings') }}</h1>
    </div>

    <div class="row">
        {{-- <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'estimate'])
        </div> --}}
        <div class="col-lg-12">
            
            <div class="card card-form container-fluid">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">
                        <form action="{{ route('settings.estimate.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                            @include('layouts._form_errors')
                            @csrf

                            <div class="form-group mb-4">
                                <p class="h5 mb-0">
                                    <strong class="headings-color">{{ __('messages.estimate_settings') }}</strong>
                                </p>
                                <p class="text-muted">{{ __('messages.customize_estimate_settings') }}</p>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="form-group required">
                                        <label for="estimate_prefix">{{ __('messages.estimate_prefix') }}</label>
                                        <input name="estimate_prefix" type="text" class="form-control" value="{{ $currentCompany->getSetting('estimate_prefix') }}" placeholder="{{ __('messages.estimate_prefix') }}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="estimate_auto_archive">{{ __('messages.auto_archive') }}</label><br>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="estimate_auto_archive" id="estimate_auto_archive" {{ $currentCompany->getSetting('estimate_auto_archive') ? 'checked' : '' }} class="custom-control-input" checked id="accountSwitch1">
                                            <label class="custom-control-label" for="estimate_auto_archive">{{ __('messages.yes') }}</label>
                                        </div>
                                        {{-- <label for="estimate_auto_archive" class="mb-0">{{ __('messages.yes') }}</label> --}}
                                        <small class="form-text text-muted">
                                            {{ __('messages.auto_archive_description') }}
                                        </small>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="form-group required">
                                        <label for="estimate_color">{{ __('messages.estimate_color') }}</label>
                                        <input name="estimate_color" type="color" class="form-control" value="{{ $currentCompany->getSetting('estimate_color') }}" placeholder="{{ __('messages.estimate_color') }}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="estimate_auto_convert">{{ __('messages.auto_convert') }}</label><br>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="estimate_auto_convert" id="estimate_auto_convert" {{ $currentCompany->getSetting('estimate_auto_convert') ? 'checked' : '' }} class="custom-control-input" checked id="accountSwitch1">
                                            <label class="custom-control-label" for="estimate_auto_convert">{{ __('messages.yes') }}</label>
                                        </div>
                                        {{-- <label for="estimate_auto_convert" class="mb-0">{{ __('messages.yes') }}</label> --}}
                                        <small class="form-text text-muted">
                                            {{ __('messages.auto_convert_description') }}
                                        </small>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="estimate_footer">{{ __('messages.footer') }}</label>
                                <textarea name="estimate_footer" class="form-control" rows="4" placeholder="{{ __('messages.footer') }}">{{ $currentCompany->getSetting('estimate_footer') }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="estimate_template">{{ __('messages.estimate_template') }}</label>
                                @php $default_template = get_company_setting('estimate_template', $currentCompany->id) @endphp
                                <div class="row mt-3">
                                    @foreach(\App\Models\EstimateTemplate::all() as $template)
                                        <div class="col-md-3">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="{{$template->view}}" name="estimate_template" value="{{$template->view}}" @if($default_template === $template->view) checked='' @endif>
                                                <label class="custom-control-label" for="{{$template->view}}">
                                                    <img src="{{ $template->path }}" class="img-fluid modal-image">
                                                    <span>{{ $template->name }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
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
@endsection

