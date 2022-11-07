@extends('layouts.backend.admin-master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Brand</a>
            <a class="breadcrumb-item" href="{{ route('brand.index') }}">Index</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Add Brand</h5>
                    <form action="{{ route('brand.update',$brand->id) }}" method="Post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="brand_name" class="form-input">Brand-</label>
                            <input type="text" name="brand_name"
                                class="form-control @error('brand_name') is-invalid @enderror" id="brand_name"
                                placeholder="Enter Brnad" value="{{ $brand->brand_name }}">
                        </div>
                        @error('brand_name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                        <div>
                            <input type="submit" value="update" name="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- row -->
@endsection
