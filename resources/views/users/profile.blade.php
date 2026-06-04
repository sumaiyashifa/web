@extends('layouts.app')
@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('asset/images/hero_1.jpg') }}') ; margin-bottom:100px" id="home-section">
        <div class="container"style="padding-bottom: 100px">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card p-3 py-4">
                        <div class="container">
                            @if (\Session::has('update'))
                                <div class="alert alert-success">
                                    <p>{!! \Session::get('update') !!}</p>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('asset/images/' . $profile->image . '') }}" width="100"
                                class="rounded-circle">
                        </div>

                        <div class="text-center mt-3">
                            <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                            <h5 class="mt-2 mb-0">{{ $profile->name }}</h5>
                            <span> {{ $profile->job_tittle }}</span>
                            <div>
                                <a href="{{ asset('asset/cvs/' . $profile->cv . '') }}"
                                    class="btn btn-success  text-white">Download Cv</a>
                            </div>

                            <div class="px-4 mt-1">
                                <p class="fonts">{{ $profile->bio }} </p>

                            </div>

                            <div class="px-3"style="padding-bottom: 100px">
                                <a href="https://www.facebook.com/" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span
                                        class="icon-facebook"></span></a>
                                <a href="https://www.facebook.com/" class="pt-3 pb-3 pr-3 pl-0"><span
                                        class="icon-twitter"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            </div>



                        </div>




                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
