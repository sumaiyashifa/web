<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/custom-bs.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/quill.snow.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body id="top">



    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                xmlns="{{ asset('http://www.w3.org/2000/svg') }}">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->

    <!-- header area start -->
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
    <div class="body-overlay"></div>
    <section class="home-section section-hero overlay bg-image"
        style="background-image: url('{{ asset('asset/images/hero_1.jpg') }}');" id="home-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">

                        <h6 class="about__heading-title"span class="about__heading-subtitle"
                            style="margin-top: 100px">Find the perfect Freelance services for your business</h6>
                        <span class="about__heading-subtitle">The #1 job site to find remote,work from home,and
                            flexible job opportunities since 2007</span>
                    </div>
                    <form method="post" action="{{ route('search.job') }}" class="search-jobs-form">
                        @csrf
                        <div class="row mb-5" style="margin-top: 50px">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <input name="job_tittle" type="text" class="form-control form-control-lg"
                                    placeholder="Job title" style="width: 110px; height: 40px;">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                {{-- <select name="job_region" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region"> --}}
                                <select name="job_region" class="" data-style="btn-white btn-lg"
                                    data-width="100%" data-live-search="true" title="Select Region">
                                    <option>Anywhere</option>
                                    <option>San Francisco</option>
                                    <option>Palo Alto</option>
                                    <option>New York</option>
                                    <option>Manhattan</option>
                                    <option>Ontario</option>
                                    <option>Toronto</option>
                                    <option>Kansas</option>
                                    <option>Mountain View</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select name="job_type"class="" data-style="btn-white btn-lg" data-width="100%"
                                    data-live-search="true" title="Select Job Type">
                                    <option>Part Time</option>
                                    <option>Full Time</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <button name ="submit" type="submit"
                                    class="btn btn-primary btn-lg btn-block text-white btn-search"><span
                                        class="icon-search icon mr-2"></span>Search Job</button>
                            </div>
                        </div>
                        <div class="row text-center" style="margin-top: 50px">
                            <div class="col-md-12 popular-keywords">
                                <h3 style="font-size: 18px">Trending Keywords:</h3>
                                <ul class="keywords list-unstyled m-0 p-0">
                                    <div>
                                        @foreach ($duplicates as $duplicate)
                                        <li><a href="#" class=""
                                                style="font-size: 12px">{{ $duplicate->keyword }}</a></li>
                                        @endforeach

                                    </div>

                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
        style="background-image: url('{{ asset('asset/images/hero_1.jpg') }}');">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
                    <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde
                        officiis recusandae sequi excepturi corrupti.</p>
                </div>
            </div>
            <div class="row pb-0 block__19738 section-counter">

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $totalcan }}">0</strong>
                    </div>
                    <span class="caption">Candidates</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $totalJobs }}">0</strong>
                    </div>
                    <span class="caption">Jobs Posted</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{$acceptedJobCount}}">0</strong>
                    </div>
                    <span class="caption">Jobs Filled</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="8">0</strong>
                    </div>
                    <span class="caption">Companies</span>
                </div>


            </div>
        </div>
    </section>



    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $totalJobs }} Job Listed</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach ($jobs as $job)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single.job', $job->id) }}" style="font-size: 15px"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('asset/images/' . $job->image . '') }}"
                                alt="Free Website Template by Free-Template.co" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2 style="font-size: 15px">{{ $job->job_tittle }}</h2>
                                <strong>{{ $job->company }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $job->job_region }}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">{{ $job->job_type }}</span>
                            </div>
                        </div>

                    </li>
                @endforeach





            </ul>



        </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay"
        style="background-image: url('{{ asset('asset/images/hero_1.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Looking For A Job?</h2>
                    <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
                        adipisci impedit.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="{{ route('register') }}" class="btn btn-warning btn-block btn-lg">Sign Up</a>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section py-4">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-12 text-center mt-4 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <h2 class="section-title mb-2">Company We've Helped</h2>
                            <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum
                                ipsam fugit mollitia ipsum facilis expedita tempora suscipit iste</p>
                        </div>
                    </div>

                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_mailchimp.svg') }}" alt="Image"
                        class="img-fluid logo-1">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_paypal.svg') }}" alt="Image" class="img-fluid logo-2">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_stripe.svg') }}" alt="Image" class="img-fluid logo-3">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_visa.svg') }}" alt="Image" class="img-fluid logo-4">
                </div>

                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_apple.svg') }}" alt="Image" class="img-fluid logo-5">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_tinder.svg') }}" alt="Image" class="img-fluid logo-6">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_sony.svg') }}" alt="Image" class="img-fluid logo-7">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('asset/images/logo_airbnb.svg') }}" alt="Image" class="img-fluid logo-8">
                </div>
            </div>
        </div>
    </section>


    <section class="bg-light pt-5 testimony-full">

        <div class="owl-carousel single-carousel">


            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-center text-lg-left">
                        <blockquote>
                            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium
                                libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem
                                voluptatum repudiandae.&rdquo;</p>
                            <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
                        </blockquote>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-right">
                        <img src="{{ asset('asset/images/person_transparent_2.png') }}" alt="Image"
                            class="img-fluid mb-0">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-center text-lg-left">
                        <blockquote>
                            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium
                                libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem
                                voluptatum repudiandae.&rdquo;</p>
                            <p><cite> &mdash; Chris Peters, @Google</cite></p>
                        </blockquote>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-right">
                        <img src="{{ asset('asset/images/person_transparent.png') }}" alt="Image"
                            class="img-fluid mb-0">
                    </div>
                </div>
            </div>

        </div>

    </section>
    {{-- <section class="pricing__area pt-130 p-relative z-index-1">
        <div class="pricing__shape">
            <img class="pricing__shape-6" src="./FreelanceHub_files/price-shape-1.png" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section__title-wrapper-7 text-center mb-60">
                        <span class="section__title-pre-7">Our Pricing</span>
                        <h3 class="section__title-7">Simple pricing for everyone.
                        </h3>
                    </div>
                </div>
            </div>
            <div class="pricing__table white-bg">
                <div class="pricing__table-wrapper">
                    <!-- pricng header -->
                    <div class="pricing__header grey-bg-13">
                        <div class="row gx-0">
                            <div class="col-xl-4 col-4">
                                <div class="pricing__header-content">
                                    <h3 class="pricing__header-title">Contact us!</h3>
                                    <a href="https://freelancehub.io/contact" class="tp-btn-11">Get started</a>
                                    <img class="pricing-header-shape" src="./FreelanceHub_files/price-icon-1.png"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-xl-8 col-8">
                                <div class="pricing__header-top-wrapper d-flex align-items-center">

                                    <!-- pricing heading one -->
                                    <div class="pricing__top-7 p-relative text-center">
                                        <div class="pricing__tag-7">
                                            <span> Starter</span>
                                        </div>
                                        <div class="pricing__title-wrapper-7">
                                            <h3 class="pricing__title-7">tbd</h3>
                                            <p>One time <br> No credit card required.</p>
                                        </div>
                                    </div>

                                    <!-- pricing heading two -->
                                    <div class="pricing__top-7 p-relative text-center">
                                        <div class="pricing__popular-2">
                                            <span>Best Choice</span>
                                        </div>
                                        <div class="pricing__tag-7">
                                            <span>Advanced</span>
                                        </div>
                                        <div class="pricing__title-wrapper-7">
                                            <h3 class="pricing__title-7">€100</h3>
                                            <p>Per month <br> No credit card required.</p>
                                        </div>
                                    </div>

                                    <!-- pricing heading three -->
                                    <div class="pricing__top-7 p-relative text-center">
                                        <div class="pricing__tag-7">
                                            <span>Expert</span>
                                        </div>
                                        <div class="pricing__title-wrapper-7">
                                            <h3 class="pricing__title-7">€195</h3>
                                            <p>Per month <br> No credit card required.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pricing features item wrapper -->
                    <div class="pricing__feature-item-wrapper">
                        <!-- pricing features item -->
                        <div class="pricing__feature-info-item">
                            <div class="row gx-0 align-items-center">
                                <div class="col-xl-4 col-4">
                                    <div class="pricing__feature-info-content d-flex align-items-center">
                                        <div class="pricing__feature-info-details">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 1.5C4.99594 1.5 1.75 4.74594 1.75 8.75C1.75 12.7541 4.99594 16 9 16C13.0041 16 16.25 12.7541 16.25 8.75C16.25 4.74594 13.0041 1.5 9 1.5ZM0.25 8.75C0.25 3.91751 4.16751 0 9 0C13.8325 0 17.75 3.91751 17.75 8.75C17.75 13.5825 13.8325 17.5 9 17.5C4.16751 17.5 0.25 13.5825 0.25 8.75ZM9 7.75C9.55229 7.75 10 8.19771 10 8.75V11.95C10 12.5023 9.55229 12.95 9 12.95C8.44771 12.95 8 12.5023 8 11.95V8.75C8 8.19771 8.44771 7.75 9 7.75ZM9 4.5498C8.44771 4.5498 8 4.99752 8 5.5498C8 6.10209 8.44771 6.5498 9 6.5498H9.008C9.56028 6.5498 10.008 6.10209 10.008 5.5498C10.008 4.99752 9.56028 4.5498 9.008 4.5498H9Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <div class="pricing__feature-info-tooltip transition-3">
                                                <p>1 hour dedicated 1:1 conference call with your assigned mentor</p>
                                            </div>
                                        </div>
                                        <div class="pricing__feature-info-text">
                                            <p>Mentorship</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-8">
                                    <div class="pricing__feature-info-wrapper d-flex align-items-center">
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pricing features item -->
                        <div class="pricing__feature-info-item">
                            <div class="row gx-0 align-items-center">
                                <div class="col-xl-4 col-4">
                                    <div class="pricing__feature-info-content d-flex align-items-center">
                                        <div class="pricing__feature-info-details">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 1.5C4.99594 1.5 1.75 4.74594 1.75 8.75C1.75 12.7541 4.99594 16 9 16C13.0041 16 16.25 12.7541 16.25 8.75C16.25 4.74594 13.0041 1.5 9 1.5ZM0.25 8.75C0.25 3.91751 4.16751 0 9 0C13.8325 0 17.75 3.91751 17.75 8.75C17.75 13.5825 13.8325 17.5 9 17.5C4.16751 17.5 0.25 13.5825 0.25 8.75ZM9 7.75C9.55229 7.75 10 8.19771 10 8.75V11.95C10 12.5023 9.55229 12.95 9 12.95C8.44771 12.95 8 12.5023 8 11.95V8.75C8 8.19771 8.44771 7.75 9 7.75ZM9 4.5498C8.44771 4.5498 8 4.99752 8 5.5498C8 6.10209 8.44771 6.5498 9 6.5498H9.008C9.56028 6.5498 10.008 6.10209 10.008 5.5498C10.008 4.99752 9.56028 4.5498 9.008 4.5498H9Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <div class="pricing__feature-info-tooltip transition-3 !tw--mt-5">
                                                <p>Access to all available powersups. See pricing details of each
                                                    powerup individual.</p>
                                            </div>
                                        </div>
                                        <div class="pricing__feature-info-text">
                                            <p>Powerup access</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-8">
                                    <div class="pricing__feature-info-wrapper d-flex align-items-center">
                                        <div class="pricing__feature-info-available text-center">
                                            <p>-</p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pricing features item -->
                        <div class="pricing__feature-info-item">
                            <div class="row gx-0 align-items-center">
                                <div class="col-xl-4 col-4">
                                    <div class="pricing__feature-info-content d-flex align-items-center">
                                        <div class="pricing__feature-info-details">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 1.5C4.99594 1.5 1.75 4.74594 1.75 8.75C1.75 12.7541 4.99594 16 9 16C13.0041 16 16.25 12.7541 16.25 8.75C16.25 4.74594 13.0041 1.5 9 1.5ZM0.25 8.75C0.25 3.91751 4.16751 0 9 0C13.8325 0 17.75 3.91751 17.75 8.75C17.75 13.5825 13.8325 17.5 9 17.5C4.16751 17.5 0.25 13.5825 0.25 8.75ZM9 7.75C9.55229 7.75 10 8.19771 10 8.75V11.95C10 12.5023 9.55229 12.95 9 12.95C8.44771 12.95 8 12.5023 8 11.95V8.75C8 8.19771 8.44771 7.75 9 7.75ZM9 4.5498C8.44771 4.5498 8 4.99752 8 5.5498C8 6.10209 8.44771 6.5498 9 6.5498H9.008C9.56028 6.5498 10.008 6.10209 10.008 5.5498C10.008 4.99752 9.56028 4.5498 9.008 4.5498H9Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <div class="pricing__feature-info-tooltip transition-3 !tw--mt-5">
                                                <p>1 hour group class per month via a conference call with the
                                                    appropriate teacher of the class.</p>
                                            </div>
                                        </div>
                                        <div class="pricing__feature-info-text">
                                            <p>Class group</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-8">
                                    <div class="pricing__feature-info-wrapper d-flex align-items-center">
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                -
                                            </p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pricing features item -->
                        <div class="pricing__feature-info-item">
                            <div class="row gx-0 align-items-center">
                                <div class="col-xl-4 col-4">
                                    <div class="pricing__feature-info-content d-flex align-items-center">
                                        <div class="pricing__feature-info-details">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 1.5C4.99594 1.5 1.75 4.74594 1.75 8.75C1.75 12.7541 4.99594 16 9 16C13.0041 16 16.25 12.7541 16.25 8.75C16.25 4.74594 13.0041 1.5 9 1.5ZM0.25 8.75C0.25 3.91751 4.16751 0 9 0C13.8325 0 17.75 3.91751 17.75 8.75C17.75 13.5825 13.8325 17.5 9 17.5C4.16751 17.5 0.25 13.5825 0.25 8.75ZM9 7.75C9.55229 7.75 10 8.19771 10 8.75V11.95C10 12.5023 9.55229 12.95 9 12.95C8.44771 12.95 8 12.5023 8 11.95V8.75C8 8.19771 8.44771 7.75 9 7.75ZM9 4.5498C8.44771 4.5498 8 4.99752 8 5.5498C8 6.10209 8.44771 6.5498 9 6.5498H9.008C9.56028 6.5498 10.008 6.10209 10.008 5.5498C10.008 4.99752 9.56028 4.5498 9.008 4.5498H9Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <div class="pricing__feature-info-tooltip transition-3 !tw--mt-5">
                                                <p>1 hour group meeting per month via a conference call with the mentor
                                                    and other expert level freelancers</p>
                                            </div>
                                        </div>
                                        <div class="pricing__feature-info-text">
                                            <p>Mastermind group</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-8">
                                    <div class="pricing__feature-info-wrapper d-flex align-items-center">
                                        <div class="pricing__feature-info-available text-center">
                                            <p>-</p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>-</p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pricing features item -->
                        <div class="pricing__feature-info-item">
                            <div class="row gx-0 align-items-center">
                                <div class="col-xl-4 col-4">
                                    <div class="pricing__feature-info-content d-flex align-items-center">
                                        <div class="pricing__feature-info-details">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 1.5C4.99594 1.5 1.75 4.74594 1.75 8.75C1.75 12.7541 4.99594 16 9 16C13.0041 16 16.25 12.7541 16.25 8.75C16.25 4.74594 13.0041 1.5 9 1.5ZM0.25 8.75C0.25 3.91751 4.16751 0 9 0C13.8325 0 17.75 3.91751 17.75 8.75C17.75 13.5825 13.8325 17.5 9 17.5C4.16751 17.5 0.25 13.5825 0.25 8.75ZM9 7.75C9.55229 7.75 10 8.19771 10 8.75V11.95C10 12.5023 9.55229 12.95 9 12.95C8.44771 12.95 8 12.5023 8 11.95V8.75C8 8.19771 8.44771 7.75 9 7.75ZM9 4.5498C8.44771 4.5498 8 4.99752 8 5.5498C8 6.10209 8.44771 6.5498 9 6.5498H9.008C9.56028 6.5498 10.008 6.10209 10.008 5.5498C10.008 4.99752 9.56028 4.5498 9.008 4.5498H9Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <div class="pricing__feature-info-tooltip transition-3 !tw--mt-5">
                                                <p>Dedicated help from your assigned mentor to negotiate your newest
                                                    contract to get the most out of it.</p>
                                            </div>
                                        </div>
                                        <div class="pricing__feature-info-text">
                                            <p>Negotiation</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-8">
                                    <div class="pricing__feature-info-wrapper d-flex align-items-center">
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                <span>
                                                    <svg width="11" height="9" viewBox="0 0 11 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                tbd per contract
                                            </p>
                                        </div>
                                        <div class="pricing__feature-info-available text-center">
                                            <p>
                                                tbd per contract
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pricing button -->
                        <div class="pricing__footer">
                            <div class="row gx-0">
                                <div class="col-xl-4 col-4">
                                    <div class="pricing__footer-content"></div>
                                </div>
                                <div class="col-xl-8 col-8">
                                    <div class="pricing__btn-wrapper-7 d-flex align-items-center">
                                        <div class="pricing__btn-7 text-center">
                                            <a href="https://freelancehub.io/contact?type=price&amp;price=starter"
                                                class="tp-btnr-border-2">Join Waitlist</a>
                                        </div>
                                        <div class="pricing__btn-7 price-active text-center">
                                            <a href="https://freelancehub.io/contact?type=price&amp;price=advanced"
                                                class="tp-btnr-border-2">Join Waitlist</a>
                                        </div>
                                        <div class="pricing__btn-7 text-center">
                                            <a href="https://freelancehub.io/contact?type=price&amp;price=expert"
                                                class="tp-btnr-border-2">Join Waitlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
                    <h2 class="text-white">Get The Mobile Apps</h2>
                    <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
                        adipisci impedit.</p>
                    <p class="mb-0">
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-apple mr-3"></span>App Store</a>
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-android mr-3"></span>Play Store</a>
                    </p>
                </div>
                <div class="col-md-6 ml-auto align-self-end">
                    <img src="{{ asset('asset/images/apps.png') }}" alt="Free Website Template by Free-Template.co"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer__area footer__style-green include-bg bg-luminosity" data-bg-color="footer-bg-green-dark"
            data-background="assets/img/footer/footer-shape-3.png"
            style="background-image: url(&quot;assets/img/footer/footer-shape-3.png&quot;);">
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
                                                <span><a
                                                        href="mailto:hello@freelancehub.io">hello@freelancehub.io</a></span>
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
                                                <input type="email" placeholder="email@example.com..."
                                                    name="email">
                                                <button type="submit" class="newsletterForm"><i
                                                        class="fa-regular fa-arrow-up-right"></i></button>
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
                                    <a href="{{ route('policy') }}">Privacy Policy</a>
                                    <a href="{{ route('terms') }}">Terms of Use</a>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6">
                                <div class="footer__copyright-7 !tw-text-center lg:!tw-text-right">
                                    <p><a href="https://freelancehub.io/">© 2024 FreelanceHub</a> All Rights Reserved.
                                    </p>
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



    <script src="{{ asset('assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/nouislider.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jarallax.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/parallax.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/backtotop.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/wow.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/charming.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/hover-reveal.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tween-max.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/main.js') }}"></script>


</body>

</html>
