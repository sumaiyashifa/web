<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>About - FreelanceHub</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Place favicon.ico in the root directory -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/images/logo.svg')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
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

<script src="{{ asset('https://cdn.tailwindcss.com')}}"></script>
<script>
    tailwind.config = {
    prefix: "tw-",
    corePlugins: {
        preflight: false
    }
    }
</script>   </head>
   <body>

      <!-- back to top start -->
<div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
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
<!-- offcanvas area end -->
      <main>


         <!-- about top area start -->
         <section class="about__heading about__heading-overlay about__spacing include-bg jarallax" data-background="{{ asset('asset/images/hero_1.jpg')}}">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-10">
                     <div class="about__heading-content text-center p-relative z-index-1">
                        <span class="about__heading-subtitle">About us</span>
                        <h3 class="about__heading-title">Get in touch with us to see how we can powerup your freelance business</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about top area end -->

         <!-- about text area start -->
         <section class="about__text pt-115 tw-pb-20">
            <div class="container">
               <div class="row">
                  <div class="col-xl-5 col-lg-5">
                     <div class="about__text-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <h3 class="about__text-title">Why do i need a mentor? 
                        </h3>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-7">
                     <div class="about__text wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                        <p>Like every husband needs a wife or every wife needs a husband also a business owner needs a co-founder or simply said - somebody to challenge you and give you a kick in the ass. You need somebody to set goals and prove yourself. It has a huge value and you'll only know once you try it. </p>

                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="about__text tw-pt-50 tw-pb-20">
            <div class="container">
               <div class="row">
                  <div class="col-xl-7 col-lg-7">
                     <div class="about__text wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                        <p>Because we can negotiate huge group discounts and we know much better about the market values because of our experiences and different challenges we encountered for every freelancer that's part of the hub. We have a better solution for everything you potentially need because together we're stronger!</p>

                     </div>
                  </div>
                  <div class="col-xl-5 col-lg-5">
                     <div class="about__text-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <h3 class="about__text-title">Why the hub has better prices for the services i need to support my business?
                        </h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="about__text tw-pt-50 tw-pb-40">
            <div class="container">
               <div class="row">
                  <div class="col-xl-5 col-lg-5">
                     <div class="about__text-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <h3 class="about__text-title">What's the difference between a freelancer and an agency?
                        </h3>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-7">
                     <div class="about__text wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                        <p>An agency consists of team of professionals working together to serve multiple customers. Therefore an agency has to put in a lot of effort on planning, efficiency and consistency in their processes. Delivering a service goes further then your actual profession. We can fill in this extra layer of professionalism on which you don't want to focus in order to exceed the expectations of your client and delight your client!</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about text area end -->

         <!-- faq area start -->
         <section class="faq__area p-relative">
            <div class="faq__video" data-background="{{ asset('asset/images/sq_img_12.jpg')}}"></div>
            <div class="container-fluid">
               <div class="row justify-content-end">
                  <div class="col-xxl-7 col-xl-7 col-lg-7">
                     <div class="faq__wrapper-2 faq__gradient-border faq__style-2 tp-accordion pl-160">
                        <div class="faq__title-wrapper">
                           <span class="faq__title-pre">Get in touch with us to see how</span>
                           <h3 class="faq__title">we can powerup your freelance business</h3>
                        </div>
                        <div class="accordion" id="faqaccordion">
                           <div class="accordion-item">
                             <h2 class="accordion-header" id="headingOne">
                               <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               Why would I need help for anything?
                                 <span class="accordion-btn"></span>
                               </button>
                             </h2>
                             <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqaccordion">
                               <div class="accordion-body">
                                 <p>If you feel that you have everything under control and you maximized your business potential, then you don't need our services. But one thing is sure - you're wrong. Investing in yourself is the best investment you could ever make. It's not taxed and nobody can steal it from you! </p>
                               </div>
                             </div>
                           </div>
                           <div class="accordion-item">
                             <h2 class="accordion-header" id="headingTwo">
                               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               Why would I spend a monthly subscription for access to payed services?
                                 <span class="accordion-btn"></span>
                               </button>
                             </h2>
                             <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqaccordion">
                               <div class="accordion-body">
                                 <p>See it as an insurance - you also pay every month not knowing if you need it. Because of our Hub powers we are able to get discounts and perks you can't negotiate yourself alone. If you show us your current operational costs we can calculate your ROI and demonstrate it to you in a simulation.</p>
                               </div>
                             </div>
                           </div>
                           <div class="accordion-item">
                             <h2 class="accordion-header" id="headingThree">
                               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                               Why would I spend a one time fee for help with negotiation?
                                 <span class="accordion-btn"></span>
                               </button>
                             </h2>
                             <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqaccordion">
                               <div class="accordion-body">
                                 <p>First of all - if you sum up all the time you spend to filter out and negotiate your deal you'll be surprised how much time you put in it. Second of all - it's not your main business and you are not able to maximize the full potential of your negotiation. We can show you some use cases and you'll see the ROI is a no brainer. We negotiate every day, you only do this a couple of times in your life. Who's junior and who's senior on this expertise you think?</p>
                               </div>
                             </div>
                           </div>
                           <div class="accordion-item">
                             <h2 class="accordion-header" id="headingFour">
                               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                               When can I cancel the monthly subscription? 
                                 <span class="accordion-btn"></span>
                               </button>
                             </h2>
                             <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqaccordion">
                               <div class="accordion-body">
                                 <p>Every month you can cancel, we don't work with yearly plans as we want to keep the flexibility for you. You only pay us if you want to stay & grows stronger! 💪</p>
                               </div>
                             </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- faq area end -->

         <!-- cta area start -->
         <section class="cta__area cta__style-2 p-relative z-index-1 tw-mt-20">
            <div ></div>
            <div class="container">
               <div class="cta__inner-5" >
                  <div class="cta__shape-bg include-bg" data-background="{{ asset('asset/images/sq_img_10.jpg')}}"></div>
                  <div class="row align-items-center">
                     <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="cta__content-5">
                           <span>Get to meet Freelancehub</span>

                           <h3 class="cta__title-5">Let’s talk about your business challenges</h3>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="cta__btn-5 text-lg-end">
                           <a href="contact" class="tp-btn-orange-2">Get in Touch</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- cta area end -->

      </main>

      
<!-- footer area start -->
<footer>
   <div class="footer__area footer__style-green include-bg bg-luminosity" data-bg-color="footer-bg-green-dark" data-background="assets/img/footer/footer-shape-3.png" style="background-image: url(&quot;assets/img/footer/footer-shape-3.png&quot;);">
   <div class="footer__top footer__top-7">
       <div class="container">
           <div class="row">
               <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
               <div class="footer__widget footer__widget-7 mb-50 footer-col-7-1">
                   <div class="footer__logo">
                       <a href="https://freelancehub.io/home-main.html">
                           <img src="./Privacy Policy - FreelanceHub_files/logo.svg" alt="">
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
                           <form action="https://freelancehub.io/policy" class="newsletterForm">
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
                       <a href="https://freelancehub.io/policy">Privacy Policy</a>
                       <a href="https://freelancehub.io/terms">Terms of Use</a>
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
   
      


      <!-- JS here -->
      
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
   </body>
</html>
