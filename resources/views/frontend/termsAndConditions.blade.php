@extends('frontend.layouts.master')
@section('title', 'Terms And Conditions')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')
    <!-- Terms Condition banner -->
    <div class="about">
        <section class="terms-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="terms-heading">
                            <h1>{{ $terms->heading ?? 'Terms And Conditions' }}</h1>
                            <div>{!! $terms->description ?? '' !!}</div>
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
