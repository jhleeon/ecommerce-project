@extends('layouts.backend.admin-master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Category</a>
            <a class="breadcrumb-item" href="{{ route('category.index') }}">Index</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Add Category</h5>
                    <form action="{{ route('category.update',$category->id) }}" method="Post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="" class="form-input">Category-</label>
                            <input type="text" name="category_name"
                                class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                                placeholder="Enter Category" value="{{ $category->category_name }}">
                        </div>
                        @error('category_name')
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
