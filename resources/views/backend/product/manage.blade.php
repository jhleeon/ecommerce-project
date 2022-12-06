@extends('layouts.backend.admin-master')

@section('products-active')
    active show-sub
@endsection
@section('manage-products-active')
    active
@endsection 

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('product.create') }}">Products</a>
            <span class="breadcrumb-item active">Manage</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title text-center">product List</h6>
                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Serial</th>
                                        <th class="wd-15p">Cat</th>
                                        <th class="wd-15p">Bra</th>
                                        <th class="wd-15p">Name</th>
                                        <th class="wd-15p">Code</th>
                                        <th class="wd-15p">Price</th>
                                        <th class="wd-15p">Quant</th>
                                        <th class="wd-20p">Stat</th>
                                        <th class="wd-20p">Thum</th>
                                        <th class="wd-20p">Img 2</th>
                                        <th class="wd-20p">Img 3</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->category->category_name }}</td>
                                            <td>{{ $product->brand->brand_name }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                  
                                            <td>
                                                @if ($product->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td><img height="20px" width="20px" src="{{url($product->image_one) }}" alt=""></td>
                                            <td><img height="20px" width="20px" src="{{url($product->image_two) }}" alt=""></td>
                                            <td><img height="20px" width="20px" src="{{url($product->image_three) }}" alt=""></td>
                        
                                            <td>
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('product.delete', $product->id) }}"
                                                    class="btn btn-danger" onclick="return confirm('Are You Want To Delete')"><i class="fa fa-trash"></i></a>
                                                @if ($product->status == 1)
                                                    <a href="{{ route('product.inactive', $product->id) }}"
                                                        class="btn btn-danger"><i class="fa fa-arrow-circle-down"></i></a>
                                                @else
                                                    <a href="{{ route('product.active', $product->id) }}"
                                                        class="btn btn-success"><i class="fa fa-arrow-circle-up"></i></a>
                                                @endif
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody> 
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
                 
                   
               
            </div><!-- row -->
        @endsection 

{{-- 
        @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}



{{--        
        --}}


     