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
    <form action="javascript:void(0)" id="submitform" method="POST"
        enctype="multipart/form-data">
        @include('layouts._form_errors')
        @csrf

        @include('application.customers._form')
    </form>
@endsection


@section('page_body_scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $('.oi').on('change', function() {
            
            var stateID = $(this).val();
            console.log(stateID);
            console.log("s")
            if(stateID) {
            console.log("s")

                $.ajax({
                    url: "{{ route('application.customer.city') }}",
                    type: "GET",
                    data: { id:stateID },
                    success:function(data) {
                    //    console.log(data);
                        
                        $('select[name="billing[city]"]').empty();
                        $.each(data, function(key, value) {
                            // console.log(value.name);
                            $('select[name="billing[city]"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>
       {{-- launch page --}}

<script type="text/javascript">
    $(document).ready(function() {
        $('#submitform').on('submit', function(e) {


            e.preventDefault();
            let display = $('#display_name').val();
            let contact = $('#contact_name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let currency = $('#currency_id').val();
            let web = $('#website').val();
            let vat = $('#vat_number').val();
            let billingname = $('#billing_name').val();
            let billingphone = $('#billing_phone').val();
            let billingcountry = $('#billing[country_id]').val();
            let billingstate = $('#billing[state]').val();
            let city = $('#city').val();
            let billingzip = $('#billing_zip').val();
            let billingaddress = $('#billing_address ').val();
            let shippingname = $('#shipping_name').val();
            let shippingphone = $('#shipping_phone').val();
            let shippingcountry = $('#shipping[country_id]').val();
            let state = $('#billing[state]').val();
            let cr = $('#city').val();
            let shippingaddress = $('#shipping_address').val();
            // console.log(cr);
            // let calci_id = $('#calci_id').val();
            // 
            // $('#crlaunch').html(cr);


            // let traffic = $('#sumlaunch').val();
            // console.log(traffic);
            // let convertedlaunch = (cr * traffic) / 100;
            // console.log(convertedlaunch);
            // console.log(converted);    
            $('#shipping_name').html(billingname);
            $('#shipping_phone').html(billingphone);
            $('#shipping[country_id]').html(billingcountry);
            $('#billing[state]').html(billingstate);
            $('#city').html(city);
            $('#shipping_address').html(billingaddress);
            // console.log(name);

            $.ajax({
                url: "{{ route('customers.store', ['company_uid' => $currentCompany->uid]) }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    calci_id: calci_id,
                    converted: convertedlaunch,
                    cr: cr,

                },
                success: function(response) {
                    console.log(response);
                    $('#alert').html(' <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Changes Saved Successfully<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" style="border:none;background:none; float:right">X</button></div>');
                    location.reload();
                },
            });
        });
    });
</script>

{{-- launh page end --}}
@endsection
