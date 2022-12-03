@extends('layouts.frontend.frontend-master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Order</span>
        </nav>
    </div>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-12">

                @if (session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif



                <div class="container">


                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title text-center">order List</h6>
                        <div class="table-wrapper">
                            <table id="datatable1" class="table table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Serial</th>
                                        <th class="wd-15p">Invoice</th>
                                        <th class="wd-20p">Sub Total</th>
                                        <th class="wd-20p">Total</th>
                                        <th class="wd-20p">Payment Type</th>
                                        <th class="wd-20p">Cupon</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->invoice_no }}</td>
                                            <td>{{ $order->subtotal }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>
                                                @if ($order->cupon_discount == null)
                                                    <span class="badge badge-danger">No Cupon</span>
                                                @else
                                                    <span class="badge badge-success">{{ $order->cupon_discount }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('orderitemshow', $order->id) }}"
                                                    class="btn btn-success"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
            </div>
        </div><!-- row -->
    </div>
@endsection
