@php
    $logo = getSiteContent('logo');
    $fb = getSocialLinks('facebook');
    $insta = getSocialLinks('instagram');
    $tiktok = getSocialLinks('tiktok');
    $youtube = getSocialLinks('youtube');
    // dd($consultation);
@endphp

<header id="main-content">
    <div class="mobile-menu">
        <div class="circle" id="navbar"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <div class="nveMenu text-left">
            <div class="mobile-cross close-btn-nav" id="navbar"><i class="fas fa-times" aria-hidden="true"></i></div>
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('front/assets/images/'.$logo->logo ?? 'front/assets/images/logo.png') }}" class="img-fluid">
                </a>
            </div>
            <ul class="navlinks p-0 mt-4">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About UZI</a></li>
                <li><a href="{{ route('ingredients') }}">Ingredients</a></li>
                <li><a href="{{ route('find.uzi') }}">Find UZI </a></li>
            </ul>
        </div>
        <div class="overlay"></div>
    </div>
    <div class="main-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="nav-bar-main">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About UZI</a></li>
                            <li><a href="{{ route('ingredients') }}">Ingredients</a></li>
                            <li><a href="{{ route('find.uzi') }}">Find UZI </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="main-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('front/assets/images/logo.png') }}" class="img-fluid">
                        </a>
                    </div>


                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="main-nav-social">
                        <ul>
                            <li><a href="{{$youtube->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="{{$tiktok->tiktok}}"><i class="fa-brands fa-tiktok"></i></a></li>
                            <li><a href="{{$insta->instagram}}"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="{{$fb->facebook}}"><i class="fa-brands fa-facebook"></i></a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>


{{-- <!-- Login Modal -->
<div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 " style="background-color: #C6B19F;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 bg-light">
                <div class="row text-center">
                    <a href="{{ route('home') }}">
                        @if ($logo)
                            <img class="img-fluid w-75" src="{{ asset('front/assets/images/' . $logo->logo) }}"
                                alt="logo">
                        @else
                            <img src="{{ asset('front/assets/images/logo.png') }}" alt="logo">
                        @endif
                    </a>
                </div>
                <div id="loginErrors" class="text-danger small mb-2"></div>

                <!-- Include your login form here -->
                <form id="loginForm" action="{{ route('user.login.submit') }}" method="POST" class="auth-form mt-2">
                    <p class="text-center mb-3">Sign in to your account</p>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 my-2">
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="inputUser">Email</label>
                                <input type="email" id="inputUser" name="email" class="form-control"
                                    placeholder="Email">
                                <span class="text-danger error-email"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                    placeholder="Password">
                                <span class="text-danger error-password"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <!-- .form-group -->
                            <button class="w-100 btn btn-primary" type="submit">Sign In</button>
                        </div>

                    </div>
                    <!-- recovery links -->
                    <div class="text-center pt-3">
                        <p class="text-muted">
                            Don't have an account?
                            <a href="javascript:void(0);" class="text-primary" id="openRegisterModal">
                                Create One
                            </a>
                        </p>
                        <a href="#" class="link">Forgot Password?</a>
                    </div><!-- /recovery links -->
                </form><!-- /.auth-form -->
            </div>
            <!-- copyright -->
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header rounded-0" style="background-color: #C6B19F;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 bg-light">
                <div class="row text-center">
                    <a href="{{ route('home') }}">
                        @if ($logo)
                            <img class="img-fluid w-75" src="{{ asset('front/assets/images/' . $logo->logo) }}"
                                alt="logo">
                        @else
                            <img src="{{ asset('front/assets/images/logo.png') }}" alt="logo">
                        @endif
                    </a>
                </div>
                <div id="registerErrors" class="text-danger small mb-2"></div>

                <!-- Registration Form -->
                <form id="registerForm" method="POST" class="auth-form">
                    @csrf
                    <p class="text-center">Sign up new account</p>
                    <div class="row">
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Name">
                                <span class="text-danger error-name"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" id="inputEmail" class="form-control"
                                    placeholder="Email">
                                <span class="text-danger error-email"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                    placeholder="Password">
                                <span class="text-danger error-password"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirm Password">
                                <span class="text-danger error-password_confirmation"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <button class="w-100 btn btn-primary" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- recovery links -->
                <p class="text-center text-muted"> Already have an account? please
                    <a href="javascript:void(0);" id="openLoginModal">
                        Sign In
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>


<script>
    // Open Register Modal from Login Modal
    document.getElementById('openRegisterModal').addEventListener('click', function() {
        const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
        if (loginModal) loginModal.hide();

        const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
        registerModal.show();
    });

    // Open Login Modal from Register Modal
    document.getElementById('openLoginModal').addEventListener('click', function() {
        const registerModal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
        if (registerModal) registerModal.hide();

        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });

    document.addEventListener("DOMContentLoaded", function() {
        // LOGIN AJAX
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            loginForm.querySelector('.error-email').textContent = '';
            loginForm.querySelector('.error-password').textContent = '';

            const formData = new FormData(loginForm);

            fetch("{{ route('user.login.submit') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            const errors = data.errors;
                            if (errors.email) {
                                loginForm.querySelector('.error-email').textContent = errors
                                    .email[0];
                            }
                            if (errors.password) {
                                loginForm.querySelector('.error-password').textContent =
                                    errors.password[0];
                            }
                        });
                    } else if (response.status === 401) {
                        return response.json().then(data => {
                            loginForm.querySelector('.error-email').textContent = data
                                .error;
                        });
                    } else if (response.ok) {
                        return response.json().then(data => {
                            if (data.success && data.redirect) {
                                window.location.href = data.redirect;
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Request failed', error);
                });
        });

        // REGISTER AJAX
        const registerForm = document.getElementById('registerForm');

        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear all previous errors
            ['name', 'email', 'password', 'password_confirmation'].forEach(function(field) {
                const errorSpan = registerForm.querySelector('.error-' + field);
                if (errorSpan) errorSpan.textContent = '';
            });

            const formData = new FormData(registerForm);

            fetch("{{ route('user.register.submit') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            const errors = data.errors;
                            for (let key in errors) {
                                const errorElement = registerForm.querySelector('.error-' +
                                    key);
                                if (errorElement) {
                                    errorElement.textContent = errors[key][0];
                                }
                            }
                        });
                    } else if (response.ok) {
                        return response.json().then(data => {
                            if (data.success && data.redirect) {
                                window.location.href = data.redirect;
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Register request failed:', error);
                });
        });
    });
</script> --}}
