@extends('frontend.layouts.master')
@section('title', 'Home')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header')
@endsection
@php
    $fb = getSocialLinks('facebook');
    $insta = getSocialLinks('instagram');
    $tiktok = getSocialLinks('tiktok');
    $youtube = getSocialLinks('youtube');
@endphp
@section('content')
    <div class="home">
        <!-- Home Banner-->
        <section class="icons">
            <div class="container">
                <div class="main-icons">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="banner-content" data-aos="fade-right" data-aos-offset="400">
                                <h2>{{ strtoupper($banner->site_name ?? 'the new way to buzz!') }}</h2>
                                <p>{{ str($banner->banner_description ?? 'changing the game with one bold at a time') }}</p>
                                {{-- <a class="banner-btn" href="cheer.php">shop now</a> --}}
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="banner-img" data-aos="fade-up" data-aos-offset="300">
                                <img src="{{ asset('front/assets/images/banner/' . $banner->banner ?? 'front/assets/images/banner.image.png') }}"
                                    class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Slider 1 -->
        <section class="product-sec">
            <div class="container-fluid">
                <div class="owl-carousel">
                    {{-- @dd($products->all()) --}}
                    @foreach ($products as $product)
                        <div class="item">
                            <div class="product-box">
                                <!-- Middle Section -->
                                <div class="product-middle">
                                    <div class="product-middle-img">
                                        <img src="{{ asset('front/assets/images/products/' . $product->image) }}"
                                            alt="{{ $product->name }}" class="img-fluid">
                                    </div>
                                </div>

                                <!-- Top Section -->
                                <div class="product-top-box">
                                    <img src="{{ asset('front/assets/images/products/' . $product->packing_image) }}"
                                        alt="Packing of {{ $product->name }}" class="img-fluid">
                                </div>

                                <!-- Bottom Section -->
                                <div class="product-bottom-box">
                                    <div class="product-bott-img">
                                        <ul>
                                            <li>
                                                <img src="{{ asset('front/assets/images/products/' . $product->fruit_image) }}"
                                                    alt="Fruit of {{ $product->name }}" class="img-fluid">
                                                <p style="color:#A3CE47;">{{ $product->name }}</p>
                                            </li>
                                        </ul>
                                        <button>
                                            <a href="{{ route('find.uzi') }}" style="color:#A3CE47;">Shop Now</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="item">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{ asset('front/assets/images/apple.png') }}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{ asset('front/assets/images/graps.png') }}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{ asset('front/assets/images/product1.png') }}" class="img-fluid">
                                            <p style="color:#A3CE47;">Green
                                                Apple</p>
                                        </li>
                                    </ul>
                                    <button><a href="cheer.php" style="color:#A3CE47;">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{ asset('front/assets/images/main-product.png') }}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{ asset('front/assets/images/cherry.png') }}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{ asset('front/assets/images/product2.png') }}" class="img-fluid">
                                            <p style="color:#8B6DB0;">Grape
                                                pop</p>
                                        </li>
                                    </ul>
                                    <button><a href="cheer.php" style="color:#8B6DB0;">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{ asset('front/assets/images/SOUR.png') }}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{ asset('front/assets/images/product-drink.png') }}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{ asset('front/assets/images/product3.png') }}" class="img-fluid">
                                            <p style="color:#ED1B31;">
                                                Cherry</p>
                                        </li>
                                    </ul>

                                    <button><a href="cheer.php" style="color:#ED1B31;">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{ asset('front/assets/images/Passion.png') }}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{ asset('front/assets/images/passion-inner.png') }}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{ asset('front/assets/images/passin-small.png') }}"
                                                class="img-fluid">
                                            <p style="color:#ED047A;">Passion fruits</p>
                                        </li>
                                    </ul>
                                    <button><a href="cheer.php" style="color:#ED047A;">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{ asset('front/assets/images/Peach.png') }}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{ asset('front/assets/images/peach-inner.png') }}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{ asset('front/assets/images/peach-small.png') }}"
                                                class="img-fluid">
                                            <p style="color:#EF5087;">
                                                Peach</p>
                                        </li>
                                    </ul>

                                    <button><a href="cheer.php" style="color:#EF5087;">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="product-box">
                            <div class="product-middle">
                                <div class="product-middle-img">
                                    <img src="{{ asset('front/assets/images/Cotton.png') }}" class="img-fluid">
                                </div>
                            </div>

                            <div class="product-top-box">
                                <img src="{{ asset('front/assets/images/cotton-inner.png') }}" class="img-fluid">
                            </div>
                            <div class="product-bottom-box">
                                <div class="product-bott-img">
                                    <ul>
                                        <li><img src="{{ asset('front/assets/images/cotton-small.png') }}"
                                                class="img-fluid">
                                            <p style="color:#00BEDF;">
                                                Cotton
                                                Candy</p>
                                        </li>
                                    </ul>

                                    <button><a href="cheer.php" style="color:#00BEDF;">Shop Now</a></button>
                                </div>
                            </div>

                        </div>
                    </div> --}}
                </div>

                <button class="social-btn"><a href="{{ route('find.uzi') }}">UZI FLAVORS </a></button>

            </div>
        </section>

        {{-- Malibu Slider 2 --}}
        <section class="malibu" data-aos="fade-up" data-aos-offset="400">
            <div class="container-fluid">
                <div class="owl-carousel">
                    {{-- <div class="item" style="width:900px">
                        <img style="height: 465px;" src="{{ asset('front/assets/images/malibu.png') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="item" style="width:350px">
                        <img src="{{ asset('front/assets/images/graps-2.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="item" style="width:350px">
                        <img src="{{ asset('front/assets/images/cherry.jpg') }}" class="img-fluid" alt="">
                    </div> --}}
                    @foreach ($sliders as $slider)
                        <div class="item" style="width: 100%; min-width: 350px; max-width: 900px;">
                            <img style="height: 465px;" src="{{ asset('front/assets/images/sliders/' . $slider->image) }}"
                                class="img-fluid" alt="Malibu Slider">
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Social Links -->
        <section class="social-sec">
            <div class="container">
                <div class="row">
                    <div class="social-content">
                        <div class="col-lg-12" data-aos="fade-left" data-aos-offset="200">
                            <ul class="social-icn">
                                <li><a href="{{ $youtube->youtube }}"><i class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="{{ $tiktok->tiktok }}"><i class="fa-brands fa-tiktok"></i></a></li>
                                <li><a href="{{ $insta->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="{{ $fb->facebook }}"><i class="fa-brands fa-facebook"></i></a></li>
                            </ul>
                            <h2>THE NEW WAY TO BUZZ</h2>

                            <div class="img-txt-main">
                                <div class="first-text">
                                    <img src="{{ asset('front/assets/images/image 10.png') }}" class="img-fluid"
                                        alt="">
                                    <span>MILK THISTLE</span>
                                </div>

                                <div class="second-text">
                                    <img src="{{ asset('front/assets/images/image3.png') }}" class="img-fluid"
                                        alt="">
                                    <span>GLUTEN</span>
                                </div>

                                <div class="third-text">
                                    <img src="{{ asset('front/assets/images/image4.png') }}" class="img-fluid"
                                        alt="">
                                    <span>ELECTROLYTES </span>
                                </div>

                            </div>

                            <button class="social-btn"><a href="about.php">learn more</a></button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
@section('footer')
    @include('frontend.partials.footer')
@endsection
@push('custom_js')
@endpush
