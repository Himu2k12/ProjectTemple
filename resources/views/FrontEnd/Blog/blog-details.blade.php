@extends('FrontEnd.master')
@section('body')
    <!-- Start about temple -->

    <section class="inner-banner bg-cover" style="background-image: url({{asset('assets/images/Banner/inner-banner-1.jpg')}});">
        <h1 class="transform-center">@lang('blog.blog_details')</h1>
    </section>
    <section class="bnr-pagination pt-sm-80 pb-sm-20 bg-light-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h2 class="f-700">@lang('blog.published_by'): {{$name->name($blogDetails->created_by)->name}}</h2>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <ul class="pagination-inner">
                        <li><a href="{{url('/')}}" class="text-custom-pink">Home </a>
                        </li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Inner end -->
    <!-- Blog head start -->
    <section class="blogs-header pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="blog-head-top relative">
                        <ul class="breadcrumb-blog rbt-slab fs-17 mb-10 f-700">
                            <li class="text-custom-pink">{{$blogDetails->blog_source}}</li>
                        </ul>
                        <h2 class="mt-20 f-700 lh-12">{{$blogDetails->blog_title}}</h2>
                    </div>
                    <div class="blog-by-info pt-20 pb-20 mb-55 mt-55">
                        <ul class="list-inline fs-13 text-left text-sm-center">
                            <?php $date=\Carbon\Carbon::parse($blogDetails['created_at'])->format('M d Y'); ?>
                            <li class="list-inline-item"> <i class="far fa-calendar mr-10 fs-13 text-custom-pink"></i> {{$date}}</li>
                            <li class="list-inline-item"> <i class="far fa-comments mr-10 fs-13 text-custom-pink"></i> Null Comments</li>
                        </ul>
                    </div>
                    <a href="#">
                        <img src="@if($blogDetails->blog_photo) {{asset($blogDetails->blog_photo)}} @else {{asset('assets/images/mondir/blog.jpg')}}  @endif" class="img-fluid full-width" alt="Blog">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog head end -->
    <!-- Blog details start -->
    <section class="blog-details pb-80">
        <div class="container">
            <div class="row ">
                <div class="col-lg-10 offset-lg-1">
                    <!-- left blog start -->
                    <article class="blog-detail-left" style="padding-top: 10%; font-size: 1.3em">
                           {!! $blogDetails->blog_description !!}
                        <div class="row mb-35">
                            <div class="col-md-6 mb-sm-15">
                                <img src="assets/images/blog/blog3.jpg" class="img-100" alt="">
                            </div>
                            <div class="col-md-6">
                                <img src="assets/images/blog/blog3a.jpg" class="img-100" alt="">
                            </div>
                        </div>
                        <div class="tag-social pt-20 pt-sm-15 pb-20 mt-30">
                            <div class="row align-items-center">
                                <div class="col-xl-7">
                                    <div class="tag-list d-flex align-items-center"> <span class="f-700 mr-15">Tags:</span>
                                        <ul>
                                            <li><a href="#">#{{$blogDetails->blog_source}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="social-shate mt-lg-15 d-flex align-items-center justify-content-start justify-content-xl-end"> <span class="f-700 mr-15">Share:</span>
                                        <ul class="social-icons footer-social social-md">
                                            <li> <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li> <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li> <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments">
                            <h3 class="f-700 mt-30 mb-30 mb-xs-15">Comments (<span>3</span>)</h3>
                            <ul class="connent-lists">
                                <li>
                                    <div class="d-flex flex-column flex-sm-row">
                                        <div class="comment-image mt-10">
                                            <img src="{{asset('assets/images/testimonial/member-3.jpg')}}" class="rounded-circle" alt="">
                                        </div>
                                        <div class="comment-text">
                                            <div class="top-head">
                                                <h6 class="f-700">Very Nice</h6>
                                            </div>
                                            <p class="mt-10 mb-10">Nunc quis lorem quis sapien tristique blandit. Etiam ac interdum sem. Pellentesque volutpat id neque et viverra. Nulla lacinia.</p>
                                            <div class="name-replay">
                                                <ul class="list-inline fs-13">
                                                    <li class="list-inline-item"> <i class="far fa-user mr-10 fs-13 text-custom-pink"></i> David Mille</li>
                                                    <li class="list-inline-item"> <i class="far fa-calendar mr-10 fs-13 text-custom-pink"></i> August 11, 2019</li>
                                                </ul>
                                                <a href="#" class="reply text-custom-pink f-700"> <i class="fas fa-reply mr-10"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="replay-comment">
                                    <div class="d-flex flex-column flex-sm-row">
                                        <div class="comment-image mt-10">
                                            <img src="{{asset('assets/images/testimonial/member-2.jpg')}}" class="rounded-circle" alt="">
                                        </div>
                                        <div class="comment-text">
                                            <div class="top-head">
                                                <h6 class="f-700">Good News</h6> <span class="comment-date">20 may 2019</span>
                                            </div>
                                            <p class="mt-10 mb-10">Donec lobortis justo nec imperdiet rutrum. Sed at diam sed tellus su scipit consectetur. Mauris a fermentum magna</p>
                                            <div class="name-replay">
                                                <ul class="list-inline fs-13">
                                                    <li class="list-inline-item"> <i class="far fa-user mr-10 fs-13 text-custom-pink"></i> Mary Jhoseoh</li>
                                                    <li class="list-inline-item"> <i class="far fa-calendar mr-10 fs-13 text-custom-pink"></i> July 5, 2019</li>
                                                </ul>
                                                <a href="#" class="reply text-custom-pink f-700"> <i class="fas fa-reply mr-10"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex flex-column flex-sm-row">
                                        <div class="comment-image mt-10">
                                            <img src="{{asset('assets/images/testimonial/member-1.jpg')}}" class="rounded-circle" alt="">
                                        </div>
                                        <div class="comment-text">
                                            <div class="top-head">
                                                <h6 class="f-700">Very Nice Article</h6> <span class="comment-date">20 may 2019</span>
                                            </div>
                                            <p class="mt-10 mb-10">Nunc quis lorem quis sapien tristique blandit. Etiam ac interdum sem. Pellentesque volutpat id neque et viverra. Nulla lacinia.</p>
                                            <div class="name-replay">
                                                <ul class="list-inline fs-13">
                                                    <li class="list-inline-item"> <i class="far fa-user mr-10 fs-13 text-custom-pink"></i>Jessica</li>
                                                    <li class="list-inline-item"> <i class="far fa-calendar mr-10 fs-13 text-custom-pink"></i> April 11, 2019</li>
                                                </ul>
                                                <a href="#" class="reply text-custom-pink f-700"> <i class="fas fa-reply mr-10"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="post-comment">
                            <h3 class="f-700 mt-30 mb-30">Leave Your Comment </h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group relative mb-30">
                                            <input type="text" class="form-control input-white yellow-border" name="name" placeholder="Enter your name">
                                            <i class="far fa-user transform-v-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group relative mb-30">
                                            <input type="email" class="form-control input-white yellow-border" id="email2" placeholder="Enter your email">
                                            <i class="far fa-envelope transform-v-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="form-control input-white yellow-border mb-30" name="message" id="message" cols="30" rows="7" placeholder="Your message"></textarea>
                                    </div>
                                    <div class="col-lg-12 mb-50">
                                        <a href="#" class="btn btn-black shadow-1">SUBMIT</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </article>
                </div>
                <!-- left blog end -->
            </div>
        </div>
    </section>
    <!-- Blog details end -->
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
