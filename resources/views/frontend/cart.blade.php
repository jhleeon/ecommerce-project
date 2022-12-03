@extends('layouts.frontend.frontend-master')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="#">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Shoping Cart Section Begin -->
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
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img height="80px" width="80px" src="{{ $cartItem->product->image_one }}"
                                                alt="">
                                            <h5>{{ $cartItem->product->product_name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $cartItem->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">

                                            <form action="{{ route('cartUpdate', $cartItem->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" name="qty" value="{{ $cartItem->qty }}"
                                                            min="1">
                                                    </div>
                                                </div>
                                                <button type="submit" value="update"
                                                    class="btn btn-sm btn-primary">update</button>
                                            </form>
                                        </td>

                                        <td class="shoping__cart__total">
                                            {{ $cartItem->qty * $cartItem->price }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ route('cartDelete', $cartItem->id) }}"><span
                                                    class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('index') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if (Session::has('cupon'))
                        <div class="mt-3">
                            <p class="badge badge-pill badge-success"> <span>Your Cupon is
                                    {{ session()->get('cupon')['cupon_name'] }}</span></p>
                            <p class="badge badge-pill badge-warning"><span>You Got
                                    {{ session()->get('cupon')['cupon_discount'] }}% Dicsount</span></p>
                        </div>
                    @else
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="{{ route('cupon') }}" method="POST">
                                    @csrf
                                    <input type="text" name="cupon_name" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            @if (Session::has('cupon'))
                                <li>Subtotal <span>{{ $subtotal }}</span></li>
                                <li>Cuppon <span>{{ session()->get('cupon')['cupon_name'] }} 
                                    <a href="{{ route('cuponremove') }}" class="badge badge-dark"> Remove </a></span>
                                </li>
                                
                                <li>Discount
                                    <span>{{ $discount = ($subtotal * session()->get('cupon')['cupon_discount']) / 100 }}</span>
                                </li>
                                <li>Total <span>{{ $subtotal - $discount }}</span></li>
                            @else
                                {{-- <li>Subtotal <span>{{ $subtotal }}</span></li> --}}
                                <li>Total <span>{{ $subtotal }}</span></li>
                            @endif

                        </ul>
                        <a href="{{ route('checkoutpage') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
