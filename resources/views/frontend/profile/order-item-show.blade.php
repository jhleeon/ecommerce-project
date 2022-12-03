@extends('layouts.frontend.frontend-master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('order.index') }}">Orders</a>
            <span class="breadcrumb-item active">Order View</span>
        </nav>

        <div class="container">
            <div class="sl-pagebody">
                <div class="sl-page-title">
                    <h4 class="text-center">Order Details</h4>
                </div><!-- sl-page-title -->


                <div class="card pd-20 pd-sm-40 mt-3">
                    <div class="form-layout">
                        <div class="row mg-b-25 p-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">Name: </label>
                                    <span>{{ $shipping->shipping_name }}</span>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">Email: </label>
                                    <span>{{ $shipping->shipping_email }}</span>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">Phone: </label>
                                    <span>{{ $shipping->shipping_phone }}</span>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">Address: </label>
                                    <span>{{ $shipping->address }}</span>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">State: </label>
                                    <span>{{ $shipping->state }}</span>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">Post Code: </label>
                                    <span>{{ $shipping->post_code }}</span>
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                    </div><!-- form-layout -->
                </div><!-- card -->

                <div class="row row-sm mg-t-20 mt-3 mb-5">
                    <div class="col-xl-6">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-4 p-2">
                            <h4 class="card-body-title">Orders</h4>

                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Firstname: </label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <span>{{ $order->invoice_no }}</span>
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Subtoatl:</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <span>{{ $order->subtotal }}</span>
                                </div>
                            </div>

                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Total: </label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <span>{{ $order->total }}</span>
                                </div>
                            </div>

                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Payment Type: </label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <span>{{ $order->payment_type }}</span>
                                </div>
                            </div>

                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Cupon: </label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <span>{{ $order->cupon_discount }}</span>
                                </div>
                            </div>
                        </div><!-- card -->
                    </div><!-- col-6 -->

                    <div class="col-xl-6 mg-t-25 mg-xl-t-0 mb-5">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5 p-2">
                            <h4 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Order Items</h4>
                            @php $count = 1; @endphp
                            @foreach ($orderitems as $item)
                                <p>Product No- @php echo $count++ @endphp</p>
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Product Name: </label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <span>{{ $item->product_name }}</span>
                                    </div>
                                </div><!-- row -->
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Order Quantity:</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <span>{{ $item->product_quantity }}</span>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Image: </label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <img height="50px" width="50px" src="{{ asset($item->product->image_one) }}"
                                            alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- card -->
                    </div><!-- col-6 -->
                </div><!-- row -->
            </div>
        
        @endsection
