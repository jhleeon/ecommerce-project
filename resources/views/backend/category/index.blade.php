@extends('layouts.backend.admin-master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
            <span class="breadcrumb-item active">Dashboard</span>
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
                        <h6 class="card-body-title text-center">Category List</h6>
                        <div class="table-wrapper">
                            <table id="datatable1" class="table table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Serial</th>
                                        <th class="wd-15p">Category Name</th>
                                        <th class="wd-20p">Status</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($categories as $category)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td> @if ($category->status == 1)
                                      <span class="badge badge-success">Active</span>
                                      @else
                                      <span class="badge badge-danger">Inactive</span>
                                    @endif</td>
                                    <td>
                                      <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm me-1">Edit</a>
                                      <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                      @if ($category->status == 1)
                                      <a href="{{ route('category.inactive',$category->id) }}" class="btn btn-danger rounded-circle btn-sm">Inactive</a>
                                      @else
                                      <a href="{{ route('category.active',$category->id) }}" class="btn btn-success rounded-circle btn-sm">Active</a>
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
                            <h6 class="card-title text-center">Add Category</h6>
                            <form action="{{ route('category.store') }}" method="Post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-input">Category-</label>
                                    <input type="text" name="category_name"
                                        class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                                        placeholder="Enter Category">
                                </div>
                                @error('category_name')
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
