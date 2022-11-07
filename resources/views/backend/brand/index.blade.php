@extends('layouts.backend.admin-master')
@section('brand-active')
    active
@endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Brand</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-7">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title text-center">Brand List</h6>
                        <div class="table-wrapper">
                            <table id="datatable1" class="table table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Serial</th>
                                        <th class="wd-15p">Brand Name</th>
                                        <th class="wd-20p">Status</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($brands as $brand )
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td> @if ($brand->status == 1)
                                      <span class="badge badge-success">Active</span>
                                      @else
                                      <span class="badge badge-danger">Inactive</span>
                                    @endif</td>
                                    <td>
                                      <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                      <a href="{{ route('brand.delete',$brand->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                      @if ($brand->status == 1)
                                      <a href="{{ route('brand.inactive',$brand->id) }}" class="btn btn-danger"><i class="fa fa-arrow-circle-down"></i></a>
                                      @else
                                      <a href="{{ route('brand.active',$brand->id) }}" class="btn btn-success"><i class="fa fa-arrow-circle-up"></i></a>
                                      @endif
                                    </td>
                                </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>


                <div class="col-5">
                    <div class="card w-100">
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h6 class="card-title text-center">Add Brand</h6>
                            <form action="{{ route('brand.store') }}" method="Post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-input">Brand-</label>
                                    <input type="text" name="brand_name"
                                        class="form-control @error('brand_name') is-invalid @enderror" id="brand_name"
                                        placeholder="Enter Brand">
                                </div>
                                @error('brand_name')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                <div>
                                    <input type="submit" value="Add" name="submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        @endsection
