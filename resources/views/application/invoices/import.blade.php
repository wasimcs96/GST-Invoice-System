@extends('layouts.app', ['page' => 'Bulk Upload'])

@section('title', __('Bulk Upload'))

@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bulk Upload</li>
                </ol>
            </nav>
            <h1 class="m-0">Bulk Upload</h1>
        </div>
    </div>
@endsection

@section('content')
{{-- <div class="card-body">

    <form action="{{ route('import', ['company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import Invoice Data</button>
        <a class="btn btn-warning" href="{{ route('export', ['company_uid' => $currentCompany->uid]) }}">Export User Data</a>
    </form>

</div> --}}
<section id="input-file-browser">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bulk Upload</h4>
                </div>
                <form action="{{ route('import', ['company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" required/>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group required">
                                {{-- <label>Product</label> --}}
                                <select name="product_id" id="product_id" data-toggle="select"
                                    class="form-control select2 accessible" data-select2-id="product_id"
                                    required>
                                    <option disabled selected>Select Product</option>
                                    @foreach ($products as $option)
                                        <option value="{{ $option['id'] }}">
                                            {{ $option['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 float-right my-1">
                        <button type="submit" class="btn btn-primary save_form_button">Upload</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_head_scripts')
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<style>
    .select2-selection__arrow {
        display: none;
    }

</style>
@endsection

@section('page_body_scripts')
<script src="{{asset('theme/app-assets/js/scripts/forms/form-tooltip-valid.js')}}"></script>
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
@endsection
