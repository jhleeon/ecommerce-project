@extends('layouts.backend.admin-master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Cupon</a>
            <a class="breadcrumb-item" href="{{ route('cupon.index') }}">Index</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Edit Cupon</h5>
                    <form action="{{ route('cupon.update',$cupon->id) }}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-input">Cupon-</label>
                            <input type="text" name="cupon_name" class="form-control" id="cupon_name" value="{{$cupon->cupon_name}}">
                        </div>
                        @error('cupon_name')
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
