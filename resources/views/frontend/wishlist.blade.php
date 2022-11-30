
@extends('layouts.frontend.frontend-master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!--- Session Message -->
    @if (session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!--- Session Message End -->

    <!-- Wishlist Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($wishlists as $wishlist)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img height="80px" width="80px" src="{{ $wishlist->product->image_one }}"
                                                alt="">
                                            <h5>{{ $wishlist->product->product_name }}</h5>
                                        </td>

                                        <td class="shoping__cart__price">
                                            {{ $wishlist->product->price }}
                                        </td>

                                        <td>
                                            <form action="{{ route('add-to-cart',$wishlist->product_id) }}" method="post">
                                                @csrf
                                            <button type="submit"><i class="fa fa-shopping-cart"></button></i>
                                            </form>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ route('wishlistdelete',$wishlist->id) }}"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
