@extends('layouts.frontend.frontend-master')
@section('content')

<div class="container">
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Order</span>
        </nav>
    </div>

  <!-- Contact Section Begin -->
  <section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Phone</h4>
                    <p>0632140038</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Address</h4>
                    <p>Khilkhet, Dhaka, Bangladesh</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Open time</h4>
                    <p>10:00 am to  6:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>jhleon288@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->

<div class="map">
    <iframe
        src="https://www.google.com/maps/place/Khilkhet,+Dhaka/@23.8313401,90.4161036,15z/data=!3m1!4b1!4m5!3m4!1s0x3755c6422bc83d21:0x3a1bc96ce9f8ad8b!8m2!3d23.8311224!4d90.4243013"
        height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Khilkhet, Dhaka, Bangladesh</h4>
            <ul>
                <li>Phone: 01632140038</li>
                <li>Add: Khilkhet, Dhaka, Bangladesh</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

@endsection
