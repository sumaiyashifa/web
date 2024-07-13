<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration - Login Page</title>
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

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                                    <div class="dropdown-menu">
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
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('asset/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{ $job->job_tittle }}</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>{{ $job->job_tittle }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- header area end -->

    <!-- offcanvas area start -->

    <div class="container">
        @if (\Session::has('save'))
            <div class="alert alert-success">
                <p>{!! \Session::get('save') !!}</p>
            </div>
        @endif
    </div>
    <div class="container">
        @if (\Session::has('apply'))
            <div class="alert alert-success">
                <p>{!! \Session::get('apply') !!}</p>
            </div>
        @endif
    </div>
    <div class="container">
        @if (\Session::has('applied'))
            <div class="alert alert-success">
                <p>{!! \Session::get('applied') !!}</p>
            </div>
        @endif
    </div>
    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="{{ asset('asset/images/' . $job->image . '') }}" alt="Image">
                        </div>
                        <div>
                            <h2>{{ $job->job_tittle }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span
                                        class="icon-briefcase mr-2"></span>{{ $job->company }}</span>
                                <span class="m-2"><span
                                        class="icon-room mr-2"></span>{{ $job->job_region }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                                        class="text-primary">{{ $job->job_type }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <figure class="mb-5"><img src="{{ asset('asset/images/job_single_img_1.jpg') }}"
                                    alt="Image" class="img-fluid rounded"></figure>
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-align-left mr-3"></span>Job Description</h3>
                            <p>{{ $job->jobdescription }}</p>

                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-rocket mr-3"></span>Responsibilities</h3>
                            <p>{{ $job->responsibilities }}</p>
                        </div>



                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-turned_in mr-3"></span>Other Benifits</h3>
                            <p>{{ $job->otherbenifits }}</p>
                        </div>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-turned_in mr-3"></span>Due_Date</h3>
                            <p>{{ $job->Due_Date }}</p>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
                                @if (isset(Auth::user()->id))
                                    <form action ="{{ route('save.job') }}" method="POST">
                                        @csrf
                                        <input name="job_id"type="hidden" value="{{ $job->id }}">
                                        <input name="user_id"type="hidden" value="{{ Auth::user()->id }}">
                                        <input name="job_image"type="hidden" value="{{ $job->image }}">
                                        <input name="job_tittle"type="hidden" value="{{ $job->job_tittle }}">
                                        <input name="job_region"type="hidden" value="{{ $job->job_region }}">
                                        <input name="job_type"type="hidden" value="{{ $job->job_type }}">
                                        <input name="company"type="hidden" value="{{ $job->company }}">
                                        @if ($savedJob > 0)
                                            <button class="btn btn-block btn-success btn-md" disabled>You saved this
                                                Job</button>
                                        @else
                                            <button name="submit"
                                                type="success"class="btn btn-block btn-light btn-md">Save Job</button>
                                        @endif
                                        <!--add text-danger to it to make it read-->
                                    </form>
                                @endif
                            </div>
                            <div class="col-6">
                                @if (isset(Auth::user()->id))
                                    @if ($appliedJob > 0)
                                        <button class="btn btn-block btn-success btn-md" disabled>You applied for this
                                            job</button>
                                    @else
                                        @php
                                            $available = DB::table('applications')->where('job_id',$job->id)->first();
                                        @endphp
                                        @if (!$available || !$available->status )
                                            <button id="showApplyForm" class="btn btn-block btn-light btn-md">Apply
                                                Now</button>
                                            <div id="applyForm" style="display: none;">
                                                <form action="{{ route('apply.job') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="job_id"
                                                        value="{{ $job->id }}">
                                                    <input type="hidden" name="job_image"
                                                        value="{{ $job->image }}">
                                                    <input type="hidden" name="job_tittle"
                                                        value="{{ $job->job_tittle }}">
                                                    <input type="hidden" name="job_region"
                                                        value="{{ $job->job_region }}">
                                                    <input type="hidden" name="job_type"
                                                        value="{{ $job->job_type }}">
                                                    <input type="hidden" name="company"
                                                        value="{{ $job->company }}">
                                                    <div class="form-group">
                                                        <label for="time_required">Estimated time required (in
                                                            hours):</label>
                                                        <input type="number" class="form-control" id="time_required"
                                                            name="time_required" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price">How much do you charge ($):</label>
                                                        <input type="number" class="form-control" id="price"
                                                            name="price" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Submit
                                                        Application</button>
                                                </form>
                                            </div>
                                        @else
                                        <div> job already accepted</div>
                                        @endif
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-block btn-success btn-md">Login to
                                        apply for this job</a>
                                @endif
                            </div>

                            <script>
                                document.getElementById('showApplyForm').addEventListener('click', function() {
                                    document.getElementById('applyForm').style.display = 'block';
                                });
                            </script>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Published
                                        on:</strong>{{ $job->created_at }} </li>

                                <li class="mb-2"><strong class="text-black">Employment
                                        Status:</strong>{{ $job->job_type }} </li>
                                <li class="mb-2"><strong
                                        class="text-black">Experience:</strong>{{ $job->experience }} </li>
                                <li class="mb-2"><strong class="text-black">Job
                                        Location:</strong>{{ $job->job_region }}</li>
                                <li class="mb-2"><strong class="text-black">Salary:</strong>{{ $job->salary }}
                                </li>
                                <li class="mb-2"><strong class="text-black">Gender:</strong>{{ $job->gender }}
                                </li>

                            </ul>
                        </div>

                        <div class="bg-light p-3 border rounded">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                            <div class="px-3">
                                <a href="https://www.facebook.com/" class="pt-3 pb-3 pr-3 pl-0"><span
                                        class="icon-facebook"></span></a>
                                <a href="https://www.facebook.com/"  class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                <a href="https://www.facebook.com/"  class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            </div>
                        </div>
                        <div class="bg-light p-3 border mt-5 rounded mb-4">
                            <h3 class="text-primary   h5 pl-3 mb-3 ">Catagories </h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                @foreach ($catagories as $catagory)
                                    <li class="mb-2"><a class="text-decoration-none"
                                            href="{{ route('catagories.single', $catagory->name) }}">{{ $catagory->name }}({{ $catagory->total }})
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $relatedJobsCount }} Related Jobs</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach ($relatedJobs as $job)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single.job', $job->id) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('asset/images/' . $job->image . '') }}"
                                alt="Free Website Template by Free-Template.co" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $job->job_tittle }}</h2>
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
                    <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
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
