@extends('layouts.app')
@section('content')
    <!-- about top area start -->
    <section class="about__heading about__heading-overlay about__spacing include-bg jarallax"
        data-background="{{ asset('asset/images/hero_1.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="about__heading-content text-center p-relative z-index-1">
                        <span class="about__heading-subtitle">About us</span>
                        <h3 class="about__heading-title">Get in touch with us to see how we can powerup your
                            freelance business</h3>
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
                        <p>Like every husband needs a wife or every wife needs a husband also a business owner needs
                            a co-founder or simply said - somebody to challenge you and give you a kick in the ass.
                            You need somebody to set goals and prove yourself. It has a huge value and you'll only
                            know once you try it. </p>

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
                        <p>Because we can negotiate huge group discounts and we know much better about the market
                            values because of our experiences and different challenges we encountered for every
                            freelancer that's part of the hub. We have a better solution for everything you
                            potentially need because together we're stronger!</p>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about__text-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <h3 class="about__text-title">Why the hub has better prices for the services i need to
                            support my business?
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
                        <p>An agency consists of team of professionals working together to serve multiple customers.
                            Therefore an agency has to put in a lot of effort on planning, efficiency and
                            consistency in their processes. Delivering a service goes further then your actual
                            profession. We can fill in this extra layer of professionalism on which you don't want
                            to focus in order to exceed the expectations of your client and delight your client!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about text area end -->

    <!-- faq area start -->
    <section class="faq__area p-relative">
        <div class="faq__video" data-background="{{ asset('asset/images/sq_img_12.jpg') }}"></div>
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
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Why would I need help for anything?
                                        <span class="accordion-btn"></span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>If you feel that you have everything under control and you maximized your
                                            business potential, then you don't need our services. But one thing is
                                            sure - you're wrong. Investing in yourself is the best investment you
                                            could ever make. It's not taxed and nobody can steal it from you! </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Why would I spend a monthly subscription for access to payed services?
                                        <span class="accordion-btn"></span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>See it as an insurance - you also pay every month not knowing if you need
                                            it. Because of our Hub powers we are able to get discounts and perks you
                                            can't negotiate yourself alone. If you show us your current operational
                                            costs we can calculate your ROI and demonstrate it to you in a
                                            simulation.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Why would I spend a one time fee for help with negotiation?
                                        <span class="accordion-btn"></span>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>First of all - if you sum up all the time you spend to filter out and
                                            negotiate your deal you'll be surprised how much time you put in it.
                                            Second of all - it's not your main business and you are not able to
                                            maximize the full potential of your negotiation. We can show you some
                                            use cases and you'll see the ROI is a no brainer. We negotiate every
                                            day, you only do this a couple of times in your life. Who's junior and
                                            who's senior on this expertise you think?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        When can I cancel the monthly subscription?
                                        <span class="accordion-btn"></span>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>Every month you can cancel, we don't work with yearly plans as we want to
                                            keep the flexibility for you. You only pay us if you want to stay &
                                            grows stronger! 💪</p>
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
        <div></div>
        <div class="container">
            <div class="cta__inner-5">
                <div class="cta__shape-bg include-bg" data-background="{{ asset('asset/images/sq_img_10.jpg') }}"></div>
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
@endsection
