@extends('frontend.layouts.master')
@section('title', 'Shop')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')
    <div class="Ingredients">
        <!-- Shop Banner-->
        <section class="about-sec" data-aos="fade-right" data-aos-offset="400">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="about-content">
                            <h1>Shop</h1>

                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="product-sec inner-shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-12">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{asset('front/assets/images/apple.png')}}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{asset('front/assets/images/graps.png')}}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{asset('front/assets/images/product1.png')}}" class="img-fluid">
                                            <p>Sour
                                                Apple</p>
                                        </li>
                                    </ul>
                                    <button><a href="{{route('product.details')}}">Shop Now</a></button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-12">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{asset('front/assets/images/main-product.png')}}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{asset('front/assets/images/cherry.png')}}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{asset('front/assets/images/product2.png')}}" class="img-fluid">
                                            <p>Grape
                                                pop</p>
                                        </li>
                                    </ul>
                                    <button><a href="{{route('product.details')}}">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-12">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{asset('front/assets/images/SOUR.png')}}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{asset('front/assets/images/cheer-2.png')}}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{asset('front/assets/images/product3.png')}}" class="img-fluid">
                                            <p>Sour
                                                Cherry</p>
                                        </li>
                                    </ul>

                                    <button><a href="{{route('product.details')}}">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-12">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{asset('front/assets/images/apple.png')}}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{asset('front/assets/images/graps.png')}}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{asset('front/assets/images/product1.png')}}" class="img-fluid">
                                            <p>Sour
                                                Apple</p>
                                        </li>
                                    </ul>
                                    <button><a href="{{route('product.details')}}">Shop Now</a></button>
                                </div>
                            </div>

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
