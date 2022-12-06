@extends('layouts.backend.admin-master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('product.create') }}">Products</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="sl-pagebody">
                <div class="sl-page-title">
                    
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title text-muted text-center mb-3">Edit Products</h6>
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="row col-12">
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Category: <span
                                                    class="tx-danger">*</span></label>
                                            <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                                                <option label="Choose Category"></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected' :' ' }}>{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Brand: <span
                                                    class="tx-danger">*</span></label>
                                            <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                                                <option label="Choose Brand"></option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"  {{$brand->id == $product->brand_id ? 'selected' :' ' }}>{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                              <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Name: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_name"
                                            value="{{ $product->product_name }}" placeholder="Enter product name">
                                    </div>
                                    @error('product_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                     @enderror
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Code: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_code"
                                            value="{{ $product->product_code }}" placeholder="Enter Product Code">
                                    </div>
                                    @error('product_code')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Price: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="price"
                                            value="{{ $product->price }}" placeholder="Enter Price">
                                    </div>
                                    @error('price')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="quantity"
                                            value="{{ $product->quantity }}" placeholder="Enter Quantity">
                                    </div>
                                    @error('quantity')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Short Description: <span
                                                class="tx-danger">*</span></label>
                                        <textarea name="short_description" id="summernote" cols="30" rows="10">{{ $product->short_description }}</textarea>
                                    </div>
                                    @error('short_description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Long Description: <span
                                                class="tx-danger">*</span></label>
                                        <textarea name="long_description" id="summernote2" cols="30" rows="10">{{ $product->long_description }}</textarea>
                                    </div>
                                    @error('long_description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Thumnail: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="image_one" >
                                    </div>
                                    <img height="50px" width="50px" src="{{ url($product->image_one)}}" class="mt-2">
                                    @error('image_one')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Image Two: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="image_two" >
                                    </div>
                                    <img height="50px" width="50px" src="{{ url($product->image_two)}}" class="mt-2">
                                    @error('image_two')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Image Three: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="image_three">
                                    </div>
                                    <img height="50px" width="50px" src="{{ url($product->image_three)}}" class="mt-2">
                                    @error('image_three')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                              
                            </div>
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Add Products</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
