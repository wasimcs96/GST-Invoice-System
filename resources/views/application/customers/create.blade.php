@extends('layouts.app', ['page' => 'customers'])

@section('title', __('messages.create_customer'))

@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a
                            href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.customers') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create_customer') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.create_customer') }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('customers.store', ['company_uid' => $currentCompany->uid]) }}" id="submitform" method="POST"
        enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf

        @include('application.customers._form')
    </form>
@endsection

@section('page_head_scripts')

    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/pages/app-invoice.css') }}">
    <style>
        .select2-selection__arrow {
            display: none;
        }

    </style>

@endsection

@section('page_body_scripts')
<script src="{{ asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{ asset('theme/app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.oi').on('change', function() {

                var stateID = $(this).val();
                console.log(stateID);
                console.log("s")
                if (stateID) {
                    console.log("s")

                    $.ajax({
                        url: "{{ route('application.customer.city') }}",
                        type: "GET",
                        data: {
                            id: stateID
                        },
                        success: function(data) {
                            //    console.log(data);

                            $('select[name="billing[city]"]').empty();
                            $.each(data, function(key, value) {
                                // console.log(value.name);
                                $('select[name="billing[city]"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                            $('select[name="shipping[city]"]').empty();
                            $.each(data, function(key, value) {
                                // console.log(value.name);
                                $('select[name="shipping[city]"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });


                        }
                    });
                } else {
                    $('select[name="billing[city]"]').empty();
                    $('select[name="billing[city]"]').empty();
                }
            });
        });
    </script>
    <script>
        $('#checkbox').on('click', function() {
            // assuming the textarea is inside <div class="controls /">
            if ($(this).is(':checked')) {
                $(function() {
                    var $src = $('#billing_name'),
                        $dst = $('#shipping_name');
                    $src.on('input', function() {
                        $dst.val($src.val());
                    });
                });

                $(function() {
                    var $src1 = $('#billing_phone'),
                        $dst1 = $('#shipping_phone');
                    $src1.on('input', function() {
                        $dst1.val($src1.val());
                    });
                });

                $(function() {
                    var $src2 = $('#billing_country_id'),
                        $dst2 = $('#shipping_country_id');
                    $src2.on('input', function() {
                        $dst2.val($src2.val());
                    });
                });

                $(function() {
                    var $src3 = $('#billing_state'),
                        $dst3 = $('#shipping_state');
                    $src3.on('input', function() {
                        $dst3.val($src3.val());
                    });
                });

                $(function() {
                    var $src4 = $('#billing_city'),
                        $dst4 = $('#shipping_city');
                    $src4.on('input', function() {
                        $dst4.val($src4.val());
                    });
                });
                $(function() {
                    var $src6 = $('#billing_zip'),
                        $dst6 = $('#shipping_zip');
                    $src6.on('input', function() {
                        $dst6.val($src6.val());
                    });
                });

                $(function() {
                    var $src5 = $('#billing_address'),
                        $dst5 = $('#shipping_address');
                    $src5.on('input', function() {
                        $dst5.val($src5.val());
                    });
                });
            }
        });
    </script>
@endsection
