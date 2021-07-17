<!-- Application Scripts -->
<!-- BEGIN: Vendor JS-->
    <script src="{{asset('theme/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('theme/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    {{-- <script src="{{asset('theme/app-assets/vendors/js/extensions/toastr.min.js')}}"></script> --}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('theme/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('theme/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->
<!-- Application Scripts -->
<script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>
<script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>
<script src="{{ asset('assets/js/toggle-check-all.js') }}"></script>
<script src="{{ asset('assets/js/check-selected-row.js') }}"></script>
<script src="{{ asset('assets/js/dropdown.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-mini.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script> --}}
<script src="{{ asset('assets/js/jquery.priceformat.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>


    <!-- BEGIN: Page JS-->
    {{-- <script src="{{asset('theme/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script> --}}
    @yield('page_body_scripts')
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>



