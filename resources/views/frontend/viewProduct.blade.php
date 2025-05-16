@extends('frontend.layouts.master')
@section('title', 'Product Details')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')
    <div class="cheer">
        <!-- Product Details Banner-->
        <section class="about-sec" data-aos="fade-right" data-aos-offset="400">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="about-content">
                            <h1>Product Detail</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="product-detail-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                        <div class="thumbnail-img">
                            <img src="{{asset('front/assets/images/cherry.png')}}" class="img-fluid" alt="">
                        </div>

                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                        <div class="single-content">
                            <h2>Lorem Ipsum</h2>
                            <div class="price">
                                <del>$20.00</del>
                                <span>$18.00</span>
                            </div>
                            <div class="qauntity">
                                <h4>Add Quantity</h4>
                                <div class="quantity">
                                    <button class="minus" aria-label="Decrease">&minus;</button>
                                    <input type="number" class="input-box" value="1" min="1" max="10">
                                    <button class="plus" aria-label="Increase">&plus;</button>
                                </div>
                            </div>
                            <div class="short-dscription">
                                <h5>Description</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged.</p>
                            </div>

                            <a class="btn btn-primary bg-white text-dark" href="{{route('view.cart')}}">Add To Cart</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <section class="inner-footer">
        </section>
    </div>
@endsection
@section('footer')
    @include('frontend.partials.footer')
@endsection
@push('custom_js')
@endpush
