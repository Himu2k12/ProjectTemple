@extends('FrontEnd.master')
@section('body')
    <!-- Start about temple -->

    <section class="inner-banner bg-cover" style="background-image: url({{asset('assets/images/Banner/inner-banner-1.jpg')}});">
        <h1 class="transform-center">@lang('events.event_details')</h1>
    </section>
    <div class="bnr-pagination pt-sm-20 pb-sm-20 bg-light-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h2 class="f-700">@lang('events.event_details')</h2>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <ul class="pagination-inner">
                        <li><a href="{{url('/')}}" class="text-custom-pink">@lang('navbar.home') </a>
                        </li>
                        <li>@lang('events.event_details')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Inner end -->
    <!--Event countdown -->
    <div class="coming-soon-section pt-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="outer-box border-color">
                        <div class="time-counter">
                            <div class="time-countdown clearfix" data-countdown="{{$EventDetails->event_date}}">
                                <div class="counter-column"><span id="days" class="count">64</span>Days</div>
                                <div class="counter-column"><span id="hours" class="count">07</span>Hours</div>
                                <div class="counter-column"><span id="min" class="count">08</span>Minutes</div>
                                <div class="counter-column"><span id="sec" class="count">01</span>Second</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Event countdown end -->
    <!-- Event head start -->
    <section class="blogs-header pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="blog-head-top relative">
                        <ul class="breadcrumb-blog rbt-slab fs-17 mb-10 f-700">
                            <?php $date=\Carbon\Carbon::parse($EventDetails['event_date'])->format('d M Y'); ?>

                            <li class="text-custom-pink">{{$date}}</li>
                            <li class="text-custom-pink">{{$EventDetails->event_time}}</li>
                        </ul>
                        <h2 class="mt-20 f-700 lh-12">{{$EventDetails->event_title}}</h2>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Event head end -->
    <!-- Event details start -->
    <section class="blog-details pb-80">
        <div class="container">
            <div class="row ">
                <div class="col-lg-10 offset-lg-1">
                    <!-- left Event start -->
                    <div class="blog-detail-left text-md-center" style="margin:20px">
                       <img src="{{asset($EventDetails->event_photo)}}">

                        <div class="block-quote-2 mb-30 mt-20">
                            <div class="block-quote-text z-5 text-md-left" style="font-size: 1.5em;color: black">
                                {!! $EventDetails->event_description !!}
                            </div>
                        </div>
                        <div class="blog-by-info pt-20 pb-20 mb-55 mt-55">
                            <ul class="list-inline fs-13 text-left text-sm-center">
                                <?php $date=\Carbon\Carbon::parse($EventDetails['created_at'])->format('M d Y'); ?>
                                <li class="list-inline-item"> <i class="far fa-user mr-10 fs-13 text-custom-pink"></i> {{$name->name($EventDetails->created_by)->name}}</li>
                                <li class="list-inline-item"> <i class="far fa-calendar mr-10 fs-13 text-custom-pink"></i>{{$date}} </li>
                            </ul>
                        </div>
                        <!--event-time-->
                    </div>
                </div>
                <!-- left Event end -->
            </div>
        </div>
    </section>
    <!-- Event details end -->
    <!-- cta start -->
    <section class="cta bg-yellow pt-30 pb-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-12 text-center text-lg-left">
                    <h3 class="f-700 fs-35 mb-md-20">Not A Member? Connect With Us... </h3>
                </div>
                <div class="col-lg-3 col-md-12 text-center text-lg-right"> <a href="contact-1.html" class="btn btn-black shadow-1">CONNECT WITH US</a>
                </div>
            </div>
        </div>
    </section>


    <!-- End about temple -->
@endsection
