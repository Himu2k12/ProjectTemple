
<!-- cta start -->

<!-- cta end -->
<!-- footer start -->
<footer class="bg-light-white relative">
    <div class="footer-style pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-box mb-md-80">
                        <div class="ft-logo mb-xl-20">
                            <a href="{{url('/')}}">
                                <img src="{{asset('assets/')}}/images/logo/footerLogo.png" width="40%" class="img-fluid" alt="img">
                            </a>
                        </div>
                        <p class="text-custom-black mb-xl-20"></p>
                        <ul class="custom contact-detail">
                            <li>
                                <a href="#" class="text-custom-black fs-14">
                                    <i class="fas fa-map-marker-alt text-custom-pink"></i>
                                    <span class="ml-2">@lang('footer.address')</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-custom-black fs-14">
                                    <i class="fas fa-envelope text-custom-pink"></i>
                                    <span class="ml-2">aryadharmotola@gmail.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-box mb-md-80">
                        <div class="ft-head">
                            <h5 class="fs-23 f-700 mb-xl-20">@lang('footer.quick_link')</h5>
                        </div>
                        <ul class="custom links">
                            <li class="mb-10">
                                <a href="{{url('/')}}" class="text-custom-black">@lang('navbar.home')</a>
                            </li>
                            <li class="mb-10">
                                <a href="{{url('/contact-us')}}" class="text-custom-black">@lang('navbar.contact_us')</a>
                            </li>
                            <li class="mb-10">
                                <a href="{{url('/blogs')}}" class="text-custom-black">@lang('navbar.blog')</a>
                            </li>
                            <li class="mb-10">
                                <a href="{{url('/events')}}" class="text-custom-black">@lang('navbar.events')</a>
                            </li>
                            <li class="mb-10">
                                <a href="{{url('/admin')}}" class="text-custom-black">@lang('navbar.admin')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-box mb-xs-80">
                        <div class="ft-head">
                            <h5 class="fs-23 f-700 mb-xl-20">@lang('footer.upcoming_event')</h5>
                        </div>
                        <div class="temple-events">
                            @if(!$events->isEmpty())
                                    @foreach($events as $event)
                                    <div class="event-box mb-10">
                                        <h6 class="mb-1 fs-18"><a href="#">{{$event->event_title}}</a></h6>
                                        <cite class="text-custom-pink fs-12">{{$event->event_date}}</cite>
                                    </div>
                                    @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-box">
                        <div class="ft-head">
                            <h5 class="fs-23 f-700 mb-xl-20">@lang('footer.follow')</h5>
                        </div>
                        <ul class="custom instagram">
                            <li>
                                <a href="https://www.facebook.com/groups/Arjo.Dhormotola">
                                    <img src="{{asset('assets/')}}/images/mondir/fb.jpg" width="50px" class="image-fit" alt="fb">
                                </a>
                                <div class="insta-icon">
                                    <a href="https://www.facebook.com/groups/Arjo.Dhormotola">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCZKs4SyLkSc0EOFTAN7j7KQ/">
                                    <img src="{{asset('assets/')}}/images/mondir/yt.jpg" class="image-fit" alt="youtube">
                                </a>
                                <div class="insta-icon">
                                    <a href="https://www.youtube.com/channel/UCZKs4SyLkSc0EOFTAN7j7KQ/">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer pb-35">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hr-2 mb-35 bg-black opacity-1"></div>
                </div>
                <div class="col-lg-6 col-md-12 text-center text-lg-left mb-md-10">
                    <ul class="social-icons footer-social">
                        <li> <a href="https://www.facebook.com/groups/Arjo.Dhormotola"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li> <a href="https://www.youtube.com/channel/UCZKs4SyLkSc0EOFTAN7j7KQ/"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li style="font-size: .5em"> Developed By:Himangshu Das
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12 text-center text-lg-right">© আর্য্য ধর্মতলা ভক্ত সংঘ হরিসভা</div>
            </div>
        </div>
        <a href="#" class="btn scroll-btn f-right flex-center z-25 opacity-0"> <i class="fas fa-arrow-up"></i>
        </a>
    </div>
</footer>
<!-- footer end -->
<!-- ********************* -->
<!-- JS Files -->
<script src="{{asset('assets/')}}/js/modernizr-3.5.0.min.js"></script>
<script src="{{asset('assets/')}}/js/jquery-1.12.4.min.js"></script>
<script src="{{asset('assets/')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/')}}/js/jquery.magnific-popup.min.js"></script>
<!-- Jarallex -->
<script src="{{asset('assets/')}}/js/jarallax.min.js"></script>
<script src="{{asset('assets/')}}/js/jarallax-video.min.js"></script>
<script src="{{asset('assets/')}}/js/jquery.nice-select.min.js"></script>
<script src="{{asset('assets/')}}/js/jquery.waypoints.min.js"></script>
<script src="{{asset('assets/')}}/js/jquery.counterup.min.js"></script>
<script src="{{asset('assets/')}}/js/jquery.countdown.min.js"></script>
<script src="{{asset('assets/')}}/js/lightslider.min.js"></script>
<script src="{{asset('assets/')}}/js/wow.min.js"></script>
<script src="{{asset('assets/')}}/js/isotope.pkgd.min.js"></script>
<script src="{{asset('assets/')}}/js/jquery.meanmenu.min.js"></script>
<script src="{{asset('assets/')}}/js/tilt.jquery.min.js"></script>
<script src="{{asset('assets/')}}/js/main.js"></script>
<script src="{{asset('assets/')}}/js/audio-file.js"></script>
<!-- JS Files end -->
