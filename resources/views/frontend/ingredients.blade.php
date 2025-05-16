@extends('frontend.layouts.master')
@section('title', 'Ingredients')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')
    <div class="Ingredients">

        <!-- ingredients banner -->
        <section class="Ingred-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="ingred-content">
                            <h1>{{ $banner->site_name ?? 'INGREDIENTS' }}</h1>
                            <p>{!! $banner->banner_description ??
                                'At UZI Hard Seltzer, we’re all about bold flavors and innovative recipes. Our special hard
                                                            seltzer features real fruit juice and a vodka base for a refreshing taste, with added
                                                            electrolytes for a little extra kick. We’re here to push boundaries and deliver unique
                                                            experiences. So grab a can of UZI and let the good times roll!' !!}
                            </p>
                            <h2>THE NEW WAY TO BUZZ</h2>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="accordian">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="container p-4 bg-light">
                            {{-- @dd($ingredients) --}}
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach ($ingredients as $index => $ingredient)
                                    <div class="accordion-item rounded-3 border-0 shadow mb-2">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button border-bottom collapsed fw-semibold"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false"
                                                aria-controls="flush-collapse{{ $index }}">
                                                <img src="{{ asset('front/assets/images/ingredients/' . $ingredient->image) }}"
                                                    alt="{{ $ingredient->title }}">
                                                {{ $ingredient->title }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                {!! $ingredient->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
@push('custom_js')
@endpush
