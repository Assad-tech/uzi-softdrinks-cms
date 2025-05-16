   @php
       $logo = getSiteContent('logo');
       $fb = getSocialLinks('facebook');
       $insta = getSocialLinks('instagram');
       $tiktok = getSocialLinks('tiktok');
       $youtube = getSocialLinks('youtube');
       // dd($consultation);
   @endphp
   <header style="background-color: #8d18b6">
       <div class="mobile-menu">
           <div class="circle" id="navbar"><i class="fa fa-bars" aria-hidden="true"></i></div>


           <div class="nveMenu text-left">
               <div class="mobile-cross close-btn-nav" id="navbar"><i class="fas fa-times" aria-hidden="true"></i>
               </div>
               <div>
                   <a href="{{ route('home') }}"> <img src="{{ asset('front/assets/images/'.$logo->logo ?? 'front/assets/images/logo.png') }}"
                           class="img-fluid"></a>

               </div>
               <ul class="navlinks p-0 mt-4">
                   <li><a href="#">Get In Touch</a></li>
                   <li><a href="#">Blog</a></li>
                   <li><a href="#">Case Studies</a></li>
                   <li><a href="#">Gallery</a></li>
               </ul>
           </div>
           <div class="overlay"></div>

       </div>
       <div class="header-nav">
           <div class="container">
               <div class="row">
                   <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                       <div class="head-bar-main">
                           <ul>
                               <li><a href="{{ route('home') }}">Home</a></li>
                               <li><a href="{{ route('about') }}">About UZI</a></li>
                               <li><a href="{{ route('ingredients') }}">Ingredients</a></li>
                               <li><a href="{{ route('find.uzi') }}">Find UZI </a></li>
                           </ul>
                       </div>
                   </div>

                   <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                       <div class="head-logo">
                           <a href="{{ route('home') }}">
                               <img src="{{ asset('front/assets/images/logo.png') }}" class="img-fluid">
                           </a>
                       </div>


                   </div>
                   <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                       <div class="head-nav-social">
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

   </header>
