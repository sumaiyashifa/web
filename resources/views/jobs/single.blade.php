@extends('layouts.app')
@section('content')
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
                                <span class="m-2"><span class="icon-room mr-2"></span>{{ $job->job_region }}</span>
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
                                            <button name="submit" type="success"class="btn btn-block btn-light btn-md">Save
                                                Job</button>
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
                                            $available = DB::table('applications')->where('job_id', $job->id)->first();
                                        @endphp
                                        @if (!$available || !$available->status)
                                            <button id="showApplyForm" class="btn btn-block btn-light btn-md">Apply
                                                Now</button>
                                            <div id="applyForm" style="display: none;">
                                                <form action="{{ route('apply.job') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                    <input type="hidden" name="job_image" value="{{ $job->image }}">
                                                    <input type="hidden" name="job_tittle" value="{{ $job->job_tittle }}">
                                                    <input type="hidden" name="job_region" value="{{ $job->job_region }}">
                                                    <input type="hidden" name="job_type" value="{{ $job->job_type }}">
                                                    <input type="hidden" name="company" value="{{ $job->company }}">
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
                                <li class="mb-2"><strong class="text-black">Experience:</strong>{{ $job->experience }}
                                </li>
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
                                <a href="https://www.facebook.com/" class="pt-3 pb-3 pr-3 pl-0"><span
                                        class="icon-twitter"></span></a>
                                <a href="https://www.facebook.com/" class="pt-3 pb-3 pr-3 pl-0"><span
                                        class="icon-linkedin"></span></a>
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
                    <img src="{{ asset('asset/images/logo_mailchimp.svg') }}" alt="Image" class="img-fluid logo-1">
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

@endsection
