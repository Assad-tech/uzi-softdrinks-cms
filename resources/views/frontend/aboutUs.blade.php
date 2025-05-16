@extends('frontend.layouts.master')
@section('title', 'About Us')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')
    <!-- about banner -->
    <div class="about">
        <section class="about-sec" data-aos="fade-right" data-aos-offset="400">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="about-content">

                            <h1>{{ $about->site_name ?? 'ABOUT UZI' }}</h1>
                            <p>{!! $about->banner_description ??
                                "<b>What's in UZI?:</b> At UZI Hard Seltzer, we craft bold, refreshing drinks using natural
                                ingredients. Our hard seltzer features real fruit juice and a vodka base, plus added
                                electrolytes to keep you hydrated. We’re all about delivering unique experiences with every
                                sip. When you grab a UZI Hard Seltzer, you’re joining a vibe. It’s about good times with
                                friends and making memories. So crack open a can and enjoy!" !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="fruit-sec">
            <div class="container">
                <div class="frut-main">
                    <div class="row">
                        {{-- @dd($aboutBanners) --}}
                        {{-- <div class="frut-1">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12" data-aos="fade-left" data-aos-offset="400">
                                <div class="fruit1-inner">
                                    <img src="{{asset('front/assets/images/frut-1.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-12 col-12" data-aos="fade-right" data-aos-offset="400">
                                <h2>WELCOME TO THE FAMILY</h2>
                                <p>Welcome to the UZI Family! When you crack open an UZI, you’re embracing unforgettable
                                    flavor and letting the good times roll. Join us for a vibrant experience that brings
                                    everyone together!</p>

                            </div>
                        </div>

                        <div class="frut-2">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12" data-aos="fade-up" data-aos-offset="400">
                                <div class="frut-content-2">

                                    <h2>THE UZI DIFFERENCE</h2>
                                    <p>It’s all about our special ingredients! We’ve got electrolytes to keep you refreshed
                                        and hydrated, ensuring the good times keep rolling. Grab a can and taste the
                                        difference!</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 " data-aos="fade-right" data-aos-offset="400">
                                <div class="fruit2-inner">
                                    <img src="{{asset('front/assets/images/frut-2.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="frut-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12" data-aos="fade-left" data-aos-offset="400">
                                <div class="fruit3-inner">
                                    <img src="{{asset('front/assets/images/frut-3.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">

                                <div class="frut-content-3">

                                    <h2>THE NEW WAY TO BUZZ</h2>
                                    <p>Forget the same old, same old. UZI is the new way to buzz! Whether you're at a
                                        beach party, a backyard BBQ, or just chilling with friends, UZI brings that
                                        extra + to your experience. We're here to shake things up!</p>
                                </div>

                            </div>
                        </div>

                        <div class="frut-4" data-aos="fade-right" data-aos-offset="400">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="frut-content-4">

                                    <h2>Join The UZI Movement</h2>
                                    <p>We're more than just a hard seltzer. We're a lifestyle. A community of
                                        like-minded individuals who believe in having fun and making the most out of
                                        every moment. So, crack open a can of UZI!</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="fruit4-inner">
                                    <img src="{{asset('front/assets/images/frut-4.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div> --}}

                        @foreach ($aboutBanners as $index => $banner)
                            @php
                                // Determine the CSS class for alternating layouts
                                $isOdd = $index % 2 === 0;
                            @endphp

                            <div class="frut-{{ $index + 1 }}">
                                @if ($isOdd)
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" data-aos="fade-left"
                                        data-aos-offset="400">
                                        <div class="fruit{{ $index + 1 }}-inner">
                                            <img src="{{ asset('front/assets/images/' . $banner->image) }}"
                                                class="img-fluid" alt="About Us Banner {{ $index + 1 }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-8 col-sm-12 col-12" data-aos="fade-right"
                                        data-aos-offset="400">
                                        <h2>{{ $banner->heading }}</h2>
                                        <p>{{ $banner->description }}</p>
                                    </div>
                                @else
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-12" data-aos="fade-up"
                                        data-aos-offset="400">
                                        <div class="frut-content-{{ $index + 1 }}">
                                            <h2>{{ $banner->heading }}</h2>
                                            <p>{{ $banner->description }}</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" data-aos="fade-right"
                                        data-aos-offset="400">
                                        <div class="fruit{{ $index + 1 }}-inner">
                                            <img src="{{ asset('front/assets/images/' . $banner->image) }}"
                                                class="img-fluid" alt="About Us Banner {{ $index + 1 }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
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
