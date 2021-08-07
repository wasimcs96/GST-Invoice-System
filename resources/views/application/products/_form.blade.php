<!-- <div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{ __('messages.product_information') }}</strong></p>
            <p class="text-muted">{{ __('messages.basic_product_information') }}</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <div class="row">
                <div class="col"> 
                    <div class="form-group required">
                        <label for="name">{{ __('messages.name') }}</label>
                        <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}" value="{{ $product->name }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group select-container required">
                        <label for="unit">{{ __('messages.unit') }}</label>
                        <select id="unit_id" name="unit_id" data-toggle="select" class="form-control select2-hidden-accessible select-with-footer" data-select2-id="unit_id" data-minimum-results-for-search="-1">
                            <option disabled selected>{{ __('messages.select_unit') }}</option>
                            @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ $product->unit_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                        <div class="d-none select-footer">
                            <a href="{{ route('settings.product.unit.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_product_unit') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group required">
                        <label for="price">{{ __('messages.price') }}</label>
                        <input name="price" type="text" class="form-control price_input" placeholder="{{ __('messages.price') }}" autocomplete="off" value="{{ $product->price ?? 0 }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group select-container">
                        <label for="taxes">{{ __('messages.taxes') }}</label> 
                        <select id="taxes" name="taxes[]" data-toggle="select" multiple="multiple" class="form-control select2-hidden-accessible select-with-footer" data-select2-id="taxes">
                            @foreach (get_tax_types_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ $product->hasTax($option['id']) ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                        <div class="d-none select-footer">
                            <a href="{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}" target="_blank" class="font-weight-300">+ {{ __('messages.add_new_tax') }}</a>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="description">{{ __('messages.description') }}</label>
                        <textarea name="description" class="form-control" cols="30" rows="3">{{ $product->description }}</textarea>
                    </div>
                </div>
            </div>

            @if ($product->getCustomFields()->count() > 0)
                <div class="row">
                    @foreach ($product->getCustomFields() as $custom_field)
                        <div class="col">
                            @include('layouts._custom_field', ['model' => $product, 'custom_field' => $custom_field])
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="form-group text-center mt-3">
                <button type="button" class="btn btn-primary form_with_price_input_submit">{{ __('messages.save_product') }}</button>
            </div>
        </div>
    </div>
</div> -->

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('messages.product_information') }}</h4>
                    <p class="text-muted">{{ __('messages.basic_product_information') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        

                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="sku">SKU</label>
                                <input name="sku" type="text" class="form-control" placeholder="Enter a SKU"
                                    value="{{ $product->sku }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="name">{{ __('messages.name') }}</label>
                                <input name="name" type="text" class="form-control"
                                    placeholder="{{ __('messages.name') }}" value="{{ $product->name }}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="unit">Category</label>

                                <select id="category_id" class="select2 form-control" name="category_id"
                                    id="default-select-multi">
                                    <option disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                    <option value="cate" style="color: blue;"> <a id="cato"
                                        href="{{ route('settings.product_categories', ['company_uid' => $currentCompany->uid]) }}""
                                            target="_blank" class="font-weight-300">+
                                           Add new Category</a></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="hsn">HSN Code</label>
                                <input name="hsn" type="text" class="form-control" placeholder="Enter a valid HSN code"
                                    value="{{ $product->hsn }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">

                            <div class="form-group">
                                <label for="unit">{{ __('messages.unit') }}</label>

                                <select id="unit_id" class="select2 form-control" name="unit_id"
                                    id="default-select-multi">
                                    <option disabled selected>{{ __('messages.select_unit') }}</option>
                                   
                                    @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                    <option value="{{ $option['id'] }}"
                                        {{ $product->unit_id == $option['id'] ? 'selected=""' : '' }}>
                                        {{ $option['text'] }}</option>
                                @endforeach
                                    <option value="tyyy" style="color: blue;"> <a id="naya"
                                            href="{{ route('settings.product.unit.create', ['company_uid' => $currentCompany->uid]) }}"
                                            target="_blank" class="font-weight-300">+
                                            {{ __('messages.add_new_product_unit') }}</a></option>
                                </select>
                            </div>

                            {{-- <div class="d-none select-footer">
                                <a href="{{ route('settings.product.unit.create', ['company_uid' => $currentCompany->uid]) }}"
                                    target="_blank" class="font-weight-300">+
                                    {{ __('messages.add_new_product_unit') }}</a>
                            </div> --}}
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group required">
                                <label for="price">{{ __('messages.price') }}</label>
                                <input name="price" type="text" class="form-control price_input"
                                    placeholder="{{ __('messages.price') }}" autocomplete="off"
                                    value="{{ $product->price ?? 0 }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="price">{{ __('Taxes') }}</label>

                                <select id="taxess" class="select2 form-control" multiple="multiple"
                                    id="default-select-multi">
                                    @foreach (get_tax_types_select2_array($currentCompany->id) as $option)
                                        <option value="{{ $option['id'] }}"
                                            data-percent="{{ $option['percent'] }}"
                                            {{ $product->hasTax($option['id']) ? 'selected=""' : '' }}>
                                            {{ $option['text'] }}</option>
                                    @endforeach
                                    <option value="hel" style="color: blue;"> <a id="pro"
                                            href="{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}"
                                            target="_blank" class="font-weight-300">+
                                            {{ __('messages.add_new_tax') }}</a></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="inputImage">Image</label>
                                <input type="file" id="file"  onchange="loadFilef(event)" name="image" id="inputImage" class="form-control" required>
                              </div>
                              <img id="output" width="100" />	
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="description">{{ __('messages.description') }}</label>
                                <textarea name="description" class="form-control" cols="30"
                                    rows="3">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        @if ($product->getCustomFields()->count() > 0)
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    @foreach ($product->getCustomFields() as $custom_field)
                                        <div class="col">
                                            @include('layouts._custom_field', ['model' => $product, 'custom_field' =>
                                            $custom_field])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif




                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- @section('page_head_scripts')
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
@endsection --}}

{{-- @section('page_body_scripts')
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js')}}"></script>
@endsection --}}

@section('page_body_scripts')
    <script src="{{ asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script>
        var loadFilef = function(event) {
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
        };
        </script>

    <script>
        $('#unit_id').on('change', function() {
            if (this.value == "tyyy") {
                window.location =
                    '{{ route('settings.product.unit.create', ['company_uid' => $currentCompany->uid]) }}';
                $("#naya").trigger('click');
            }

        });

    </script>
    <script>
        $('#taxess').on('change', function() {
            if (this.value == "hel") {
                window.location =
                    '{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}';
                $("#pro").trigger('click');
            }

        });
        // $('#taxess').on('change', function() {
        //     if (this.value == "hel") {
        //         window.location =
        //             '{{ route('settings.tax_types.create', ['company_uid' => $currentCompany->uid]) }}';
        //         $("#pro").trigger('click');
        //     }

        // });
        $('#category_id').on('change', function() {
            if (this.value == "cate") {
                window.location =
                    '{{ route('settings.product_categories', ['company_uid' => $currentCompany->uid]) }}';
                $("#cato").trigger('click');
            }

        });

    </script>
@endsection
