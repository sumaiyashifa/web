<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/custom-bs.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/fonts/line-icons/style.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/quill.snow.css')}}">
  
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css')}}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/backtotop.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">

  </head>
<body id="top">
  <div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="{{ asset('http://www.w3.org/2000/svg')}}">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
</div>

  
<!-- header area end -->

<!-- offcanvas area start -->
<header>
    <div class="header__area header__white-solid">
        <div class="header__bottom-7 header__padding-6 header__sticky" id="header-sticky">
            <div class="container">
                <div class="mega-menu-wrapper p-relative">
                    <div class="row align-items-center">
                        <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-4 col-sm-5 col-8">
                            <div class="logo">
                                <a href="./">
                                    <img src="{{ asset('asset/images/logo.svg') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-7 col-xl-7 col-lg-8 d-none d-xl-block">
                            <div class="main-menu main-menu-7">
                                <nav id="mobile-menu-3">
                                    <ul>
                                        <li><a href="{{ url('/') }}" class="nav-link active">Home</a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>

                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <li><a href="{{ route('news') }}">World Wide</a></li>


                                    </ul>

                                </nav>
                                <!-- for wp -->

                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-8 col-sm-7 col-4">
                            <div class="header__bottom-right-6 d-flex justify-content-end align-items-center pl-30">

                                <div class="dropdown  hide-menu" style="font-size: 18px">
                                    @auth

                                        <a href="#" data-toggle="dropdown">{{ Auth::user()->name }}<span
                                                class="caret"></span></a>
                                        <div class="dropdown-menu mobile-menu-3"style="font-size: 15px ">
                                            <a class="dropdown-item" href="{{ route('profile') }}">
                                                <i class="fa fa-user-circle"></i> View Profile
                                            </a>
                                            <a class="dropdown-item" href="{{ route('edit.details') }}">
                                                <i class="fa fa-edit"></i> Edit Profile
                                            </a>
                                            <a class="dropdown-item" href="{{ route('saved.jobs') }}">
                                                <i class="fa fa-bookmark"></i> Saved Jobs
                                            </a>
                                            <a class="dropdown-item" href="{{ route('edit.cv') }}">
                                                <i class="fa fa-file-alt"></i> Update CV
                                            </a>
                                            <a class="dropdown-item" href="{{ route('applications') }}">
                                                <i class="fa fa-envelope-open-text"></i> Applications
                                            </a>
                                            <a class="dropdown-item" href="{{ route('accept') }}">
                                                <i class="fa fa-check-square"></i> Accept
                                            </a>
                                            @auth
                                                <a class="dropdown-item">
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-flex" role="search">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Logout</button>
                                                    </form>
                                                </a>
                                            </div>

                                        @endauth
                                    @else
                                        <a href="{{ route('login') }} ">Log In/</a>
                                        <a href="{{ route('register') }}">Register</a>



                                    @endauth
                                </div>

                                <div class="header__hamburger ml-50 d-xl-none">
                                    <button type="button"
                                        class="hamburger-btn hamburger-btn-black offcanvas-open-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- header area end -->

<!-- offcanvas area start -->
<div class="offcanvas__area offcanvas__area-1 ">
    <div class="offcanvas__wrapper">
        <div class="offcanvas__shape">
            <img class="offcanvas__shape-1" src="{{ asset('asset/images/logo.svg') }}" alt="">
        </div>
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn offcanvas-close-btn">
                <i class="fa-regular fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                <div class="offcanvas__logo logo">
                    <a href="./">
                        <img src="{{ asset('asset/images/logo.svg') }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="mobile-menu-3 fix mb-40">
                @auth
                    <div class="offcanvas__contact" style="font-weight: bold;">
                        <ul>
                            <li class="offcanvas__contact-mail" style="font-weight: bold;">
                                <a href="#" data-toggle="dropdown">{{ Auth::user()->name }}<span
                                        class="caret"></span></a>
                                <div class="dropdown-menu" >
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fa fa-user-circle"></i> View Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('edit.details') }}">
                                        <i class="fa fa-edit"></i> Edit Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('saved.jobs') }}">
                                        <i class="fa fa-bookmark"></i> Saved Jobs
                                    </a>
                                    <a class="dropdown-item" href="{{ route('edit.cv') }}">
                                        <i class="fa fa-file-alt"></i> Update CV
                                    </a>
                                    <a class="dropdown-item" href="{{ route('applications') }}">
                                        <i class="fa fa-envelope-open-text"></i> Applications
                                    </a>
                                    <a class="dropdown-item" href="{{ route('accept') }}">
                                        <i class="fa fa-check-square"></i> Accept
                                    </a>
                                    @auth
                                        <a class="dropdown-item">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-flex" role="search">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Logout</button>
                                            </form>
                                        </a>
                                    </div>
                                </li>
                        </div>
                    @endauth
                @else
                    </style>
                    <div class="offcanvas__contact">
                        <li class="offcanvas__contact-mail"> <a href="{{ route('login') }}">Log In</a></li>
                        <li class="offcanvas__contact-mail"> <a href="{{ route('register') }}">Register</a></li>
                    </div>

                    </ul>
                @endauth


            </div>






            <div class="offcanvas__btn">
                <a href="contact" class="tp-btn-offcanvas">Contact Us <i
                        class="fa-regular fa-chevron-right"></i></a>
            </div>
            <div class="tw-h-[100px] tw-w-full"></div>
            <div class="offcanvas__contact">
                <p class="offcanvas__contact-mail"><a
                        href="mailto:hello@freelancehub.io">hello@freelancehub.io</a>
                </p>
            </div>
        </div>
    </div>
</div>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('asset/images/hero_1.jpg')}}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold"> Update Details</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Update Details</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <div class="container">
     @if(\Session::has('update'))
     <div class="alert alert-success">
      <p>{!!\Session::get('update')!!}</p>
     </div>
     @endif
  </div>
  <section class="site-section">
    <div class="container">

      <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Update user Details</h2>
            </div>
          </div>
        </div>
       
      </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{route('update.details')}}" method="post">
          
           @csrf
          
            <div class="form-group">
              <label for="job-title">Name</label>
              <input type="text" value={{$userDetails->name}} name="name" class="form-control" id="job-title" placeholder="name ">
            
            </div>
            @if($errors->has('name'))
            <p class="alert alert-success">{{$errors->first('name')}}</p>
            @endif
            <div class="form-group">
                <label for="job-title">Job Tittle</label>
                <input type="text"value={{$userDetails->job_tittle}} name="job_tittle" class="form-control" id="job-title" placeholder="job_tittle">
              </div>
              @if($errors->has('job_tittle'))
              <p class="alert alert-success">{{$errors->first('job_tittle')}}</p>
              @endif
            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Bio</label> 
                  <textarea  name="bio" id="job-title" cols="30" rows="7" class="form-control" placeholder="bio" style="font-size: 16px">{{$userDetails->bio}}</textarea>
                </div>
            </div>
                @if($errors->has('bio'))
                <p class="alert alert-success">{{$errors->first('bio')}}</p>
                @endif
                  <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text"value={{$userDetails->facebook}} name="facebook" class="form-control" id="job-title" placeholder="Facebook">
                  </div>
                  @if($errors->has('facebook'))
                  <p class="alert alert-success">{{$errors->first('facebook')}}</p>
                  @endif
                  <div class="form-group">
                    <label for="job-title">Twitter</label>
                    <input type="text"value={{$userDetails->twitter}} name="twitter" class="form-control" id="twitter" placeholder="Twitter">
                  </div>
                  @if($errors->has('twitter'))
                  <p class="alert alert-success">{{$errors->first('twitter')}}</p>
                  @endif
                  <div class="form-group">
                    <label for="job-title">LinkedIn</label>
                    <input type="text"value={{$userDetails->linkedIn}} name="linkedIn" class="form-control" id="linkedIn" placeholder="LinkedIn">
                  </div>
                  @if($errors->has('linkedIn'))
                  <p class="alert alert-success">{{$errors->first('linkedIn')}}</p>
                  @endif
                </div>
              </div>
              <div class="col-lg-4 ml-auto" style="margin-right:10px">
                <div class="row">  
                  <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Update">
                  </div>
                </div>
            </div>


          </form>
        </div>

       
      </div>
     
    </div>
  </section>
  <footer>
    <div class="footer__area footer__style-green include-bg bg-luminosity" data-bg-color="footer-bg-green-dark" data-background="assets/img/footer/footer-shape-3.png" style="background-image: url(&quot;assets/img/footer/footer-shape-3.png&quot;);">
    <div class="footer__top footer__top-7">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer__widget footer__widget-7 mb-50 footer-col-7-1">
                    <div class="footer__logo">
                        <a href="https://freelancehub.io/home-main.html">
                            <img src="./About - FreelanceHub_files/logo.svg" alt="">
                        </a>
                    </div>

                    <div class="footer__widget-content">
                        <div class="footer__info">
                            <p>The premier community for ambitious independent professionals.</p>
                            
                            <div class="footer__contact">
                            <div class="footer__contact-mail">
                                <span><a href="mailto:hello@freelancehub.io">hello@freelancehub.io</a></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer__widget footer__widget-7 mb-50 footer-col-7-2">
                    <h3 class="footer__widget-title-7">Quick Link</h3>

                    <div class="footer__widget-content">
                        <ul>
                            <li><a href="https://freelancehub.io/">Home</a></li>
                            <li><a href="https://freelancehub.io/about-us">About</a></li>
                            <li><a href="https://freelancehub.io/powerups">Powerups</a></li>
                            <li><a href="https://freelancehub.io/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-6 col-sm-6">
                
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer__widget footer__widget-7 mb-50 footer-col-7-4">
                    <h3 class="footer__widget-title-7">Newsletter</h3>

                    <div class="footer__widget-content">
                        <div class="footer__subscribe-7">
                            <p>Subscribe our newsletter to get the latest news &amp; updates.</p>
                            <form action="https://freelancehub.io/about-us" class="newsletterForm">
                                <input type="hidden" name="action" value="newsletter">
                                <div class="footer__subscribe-input-7">
                                    <input type="email" placeholder="email@example.com..." name="email">
                                    <button type="submit" class="newsletterForm"><i class="fa-regular fa-arrow-up-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom-7">
        <div class="container">
            <div class="footer__bottom-inner-7">
                <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer__link-7 tw-text-center lg:tw-text-left">
                        <a href="{{route('policy')}}">Privacy Policy</a>
                        <a href="{{route('terms')}}">Terms of Use</a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="footer__copyright-7 !tw-text-center lg:!tw-text-right">
                        <p><a href="https://freelancehub.io/">© 2024 FreelanceHub</a> All Rights Reserved.</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

</div>
  <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('asset/js/stickyfill.min.js') }}"></script>
  <script src="{{ asset('asset/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('asset/js/jquery.easing.1.3.js') }}"></script>
  
  <script src="{{ asset('asset/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('asset/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('asset/js/quill.min.js') }}"></script>
  
  
  <script src="{{ asset('asset/js/bootstrap-select.min.js') }}"></script>
  
  <script src="{{ asset('asset/js/custom.js') }} "></script>



  <script src="{{ asset('assets/js/vendor/waypoints.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap-bundle.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/meanmenu.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/swiper-bundle.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/slick.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/nouislider.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jarallax.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/parallax.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/backtotop.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/nice-select.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/purecounter.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/wow.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/isotope-pkgd.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded-pkgd.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/charming.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/hover-reveal.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/tween-max.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/ajax-form.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/main.js')}}"></script>
</body>
</html>