@php
    $footer_logo = getSiteContent('footer_logo');
    $copyright = getSiteContent('copyright');
    // dd($desc);
    $fb = getSocialLinks('facebook');
    $insta = getSocialLinks('instagram');
    $tiktok = getSocialLinks('tiktok');
    $youtube = getSocialLinks('youtube');
    // dd($consultation);
@endphp

<footer class="pt-4">
    <div class="foot-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                    <div class="foot-link">
                        <h4>Product</h4>
                        <ul>
                            {{-- <li><a href="{{ route('shop') }}">Shop</a></li> --}}
                            <li><a href="{{ route('about') }}">About UZI</a></li>
                        </ul>
                    </div>
                    
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                    <div class="foot-link">
                        <h4>Learn</h4>
                        <ul>
                            <li><a href="{{ route('ingredients') }}">Ingredients</a></li>
                            <li><a href="{{ route('find.uzi') }}">Find Stores</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                    <div class="foot-link">
                        <h4>More</h4>
                        <ul>
                            <li><a href="{{ route('terms-and-conditions') }}">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="foot-logo">
                        <img src="{{ asset('front/assets/images/'.$footer_logo->footer_logo ?? 'front/assets/images/logo.png') }}" class="img-fluid">
                    </div>
                </div>

                <div class="copyright-sec">
                    <div class="copy-text">
                        <p>&copy; {{ date('Y') }} {{$copyright->copyright}}</p>
                    </div>

                    <div class="copy-icon">
                        <ul>
                            <li><a href="{{ $youtube->youtube }}"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="{{ $tiktok->tiktok }}"><i class="fa-brands fa-tiktok"></i></a></li>
                            <li><a href="{{ $insta->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="{{ $fb->facebook }}"><i class="fa-brands fa-facebook"></i></a></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>

    </div>
</footer>
