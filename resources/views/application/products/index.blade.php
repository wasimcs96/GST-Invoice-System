@extends('layouts.app', ['page' => 'products'])

@section('title', __('messages.products'))
    
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.products') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.products') }}</h1>
        </div>
        <a href="{{ route('products.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success ml-3"><i class="material-icons">add</i> {{ __('messages.create_product') }}</a>
    </div>
@section('page_head_scripts')

<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href={{asset('theme/app-assets/css/pages/app-invoice.css') }}"> --}}
<style>
    .select2-selection__arrow {
        display: none;
    }
</style>

@endsection

@endsection

@section('page_body_scripts')
<script src="{{asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{asset('theme/app-assets/js/scripts/pages/app-invoice.js') }}"></script>

    
   
@endsection

@section('content')
    @include('application.products._filters')

    <div class="card">
        @include('application.products._table')
    </div>
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Product Category</h5>
                </div>
                <div class="modal-body"><a data-toggle="modal" href="#myModal">
                  
                    <label for="myModal"> <h5 class="modal-title" id="exampleModalLabel"><i data-feather="shopping-bag"></i>Inventory</h5>Products you buy and/or sell and that you track quantiti</label></a>
                    <br /><br /><hr>
                    <a  data-toggle="modal" href="#myModal2">
                    
                    <label for="myModal3"> <h5 class="modal-title" id="exampleModalLabel1"><i data-feather="box"></i>Non-Inventory</h5>Products you buy and/or sell but don’t need to (or can’t) track quantities of, for example, nuts and bolts used in an installation.</label></a>
                    <br /><br /><hr>
                    <a  data-toggle="modal" href="#myModal3">
                   
                    <label for="test6"> <h5 class="modal-title" ><i data-feather="aperture"></i>Service</h5>	
                        
                        Services that you provide to customers, for example, landscaping or tax preparation services.</label></a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
            </div>
        </div>
    </div> 
     <!-- Inventory Product Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                        method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('messages.product_information') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                           
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="sku">SKU</label>
                                                    <input name="sku" type="text" class="form-control"
                                                        placeholder="Enter a SKU" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="{{ __('messages.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                    
                                                    <select id="category_id"  class="select2 form-control" name="category_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                        <option value="cate" id="dd" style="color: blue;"> <a  data-toggle="modal" data-target="#categorymodal" id="cato"
                                                             class="font-weight-300">+
                                                               Add new Category</a></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="hsn">HSN Code</label>
                                                    <input name="hsn" type="text" class="form-control"
                                                        placeholder="Enter a valid HSN code" required>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 col-12">
                                                    <div class="form-group required">
                                                        <label for="name">{{ __('messages.name') }}</label>
                                                        <input name="name" type="text" class="form-control"
                                                            placeholder="{{ __('messages.name') }}" required>
                                                    </div>
                                                </div> --}}
                                            <div class="col-md-6 col-12">

                                                <div class="form-group">
                                                    <label for="unit">{{ __('messages.unit') }}</label>

                                                    <select  id="unit_id" class="select2 form-control" name="unit_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>{{ __('messages.select_unit') }}
                                                        </option>
                                                        @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}">
                                                                {{ $option['text'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="price">{{ __('messages.price') }}</label>
                                                    <input name="price" type="text" class="form-control price_input"
                                                        placeholder="{{ __('messages.price') }}" autocomplete="off"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="price">{{ __('Taxes') }}</label>

                                                    <select  id="tax" class="select2 form-control" multiple="multiple"
                                                        id="default-select-multi">
                                                        @foreach (get_tax_types_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}"
                                                                data-percent="{{ $option['percent'] }}">
                                                                {{ $option['text'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="inputImage">Image</label>
                                                    <input type="file" onchange="loadFilef(event)" name="image" id="inputImage" class="form-control" required>
                                                  </div>
                                                  <img id="output" width="100" />	
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('messages.description') }}</label>
                                                    <textarea name="description" class="form-control" cols="30"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

     {{-- Product Noninventory Modal --}}
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                        method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('messages.product_information') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                         

                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="sku">SKU</label>
                                                    <input name="sku" type="text" class="form-control"
                                                        placeholder="Enter a SKU" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="{{ __('messages.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                    
                                                    <select id="category_id1" class="select2 form-control" name="category_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                        <option value="cate" id="dd" style="color: blue;"> <a  data-toggle="modal" data-target="#categorymodal" id="cato"
                                                             class="font-weight-300">+
                                                               Add new Category</a></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="hsn">HSN Code</label>
                                                    <input name="hsn" type="text" class="form-control"
                                                        placeholder="Enter a valid HSN code" required>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 col-12">

                                                <div class="form-group">
                                                    <label for="unit">{{ __('messages.unit') }}</label>

                                                    <select id="unit_id1" class="select2 form-control" name="unit_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>{{ __('messages.select_unit') }}
                                                        </option>
                                                        @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}">
                                                                {{ $option['text'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="price">{{ __('messages.price') }}</label>
                                                    <input name="price" type="text" class="form-control price_input"
                                                        placeholder="{{ __('messages.price') }}" autocomplete="off"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="price">{{ __('Taxes') }}</label>

                                                    <select id="tax1" class="select2 form-control" multiple="multiple"
                                                        id="default-select-multi">
                                                        @foreach (get_tax_types_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}"
                                                                data-percent="{{ $option['percent'] }}">
                                                                {{ $option['text'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="inputImage">Image</label>
                                                    <input type="file"  onchange="loadFilef(event)" name="image" id="inputImage" class="form-control" required>
                                                  </div>
                                                  <img id="output" width="100" />	
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('messages.description') }}</label>
                                                    <textarea name="description" class="form-control" cols="30"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
  {{-- Product Service Modal --}}
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.customer.store', ['company_uid' => $currentCompany->uid]) }}"
                        method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('messages.product_information') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                          
                                            <div class="col-md-6 col-12">                                               <div class="form-group required">
                                                    <label for="sku">SKU</label>
                                                    <input name="sku" type="text" class="form-control"
                                                        placeholder="Enter a SKU" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="name">{{ __('messages.name') }}</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="{{ __('messages.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                    
                                                    <select id="category_id2" class="select2 form-control" name="category_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                        <option value="cate" id="dd" style="color: blue;"> <a  data-toggle="modal" data-target="#categorymodal" id="cato"
                                                             class="font-weight-300">+
                                                               Add new Category</a></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="hsn">HSN Code</label>
                                                    <input name="hsn" type="text" class="form-control"
                                                        placeholder="Enter a valid HSN code" required>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 col-12">

                                                <div class="form-group">
                                                    <label id="unit_id2" for="unit">{{ __('messages.unit') }}</label>

                                                    <select  class="select2 form-control" name="unit_id"
                                                        id="default-select-multi">
                                                        <option disabled selected>{{ __('messages.select_unit') }}
                                                        </option>
                                                        @foreach (get_product_units_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}">
                                                                {{ $option['text'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group required">
                                                    <label for="price">{{ __('messages.price') }}</label>
                                                    <input name="price" type="text" class="form-control price_input"
                                                        placeholder="{{ __('messages.price') }}" autocomplete="off"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="price">{{ __('Taxes') }}</label>

                                                    <select id="tax2" class="select2 form-control" multiple="multiple"
                                                        id="default-select-multi">
                                                        @foreach (get_tax_types_select2_array($currentCompany->id) as $option)
                                                            <option value="{{ $option['id'] }}"
                                                                data-percent="{{ $option['percent'] }}">
                                                                {{ $option['text'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="inputImage">Image</label>
                                                    <input type="file" onchange="loadFilef(event)" name="image" id="inputImage" class="form-control" required>
                                                  </div>
                                                  <img id="output" width="100" />	
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('messages.description') }}</label>
                                                    <textarea name="description" class="form-control" cols="30"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
