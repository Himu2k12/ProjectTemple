<!-- Header start -->
<div class="topbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-sm-12 col-4">
                <div class="top-link left-side">
                    <ul class="custom">
                        <li>
                            <a href="mailto:info@domain.com"><i class="fas fa-envelope "></i> aryadharmotola@gmail.com</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-map-marker-alt "></i> @lang('navbar.area')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-12 col-4">
                <div class="top-link center">
                    <ul class="custom">
                        <li>
                            <a href="https://www.facebook.com/groups/Arjo.Dhormotola"><i class="fab fa-facebook-f "></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCZKs4SyLkSc0EOFTAN7j7KQ/"><i class="fab fa-youtube "></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-4">
                <div class="top-link right-side">
                    <ul class="custom">
                        <li>
                            <a href="locale/bn"><span><img src="{{asset('assets/')}}/images/mondir/bd.png" width="25px"> </span>@lang('navbar.bangla')</a>
                            <a href="locale/en"><span><img src="{{asset('assets/')}}/images/mondir/uk.png" width="25px"> </span>@lang('navbar.english')</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-user "></i> My Account</a>
                        </li>
                        <li>
                            <a href="{{url('/login')}}"><i class="fas fa-lock "></i> Login & Signup</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="type4 transition-5 relative mg-header mg-header-dark">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-2 col-4">
                <div class="logo2">
                    <a href="{{url('/')}}">
                        <img src="assets/images/logo/logo1.png" width="30%" alt="">
                    </a>

                </div>

            </div>
            <div class="col-md-8 col-4 text-right ">
                    <span class="toggle-category">
                        <i class="fas fa-chevron-down"></i>
                      </span>
                <ul class="nav nav-links1 list-type2 justify-content-center">
                    <li class="nav-link {!! Request::is('/') ? 'active':'' !!}">
                        <a href="{{url('/')}}">@lang('navbar.home')</a>
                    </li>
                    <li class="nav-link {!! Request::is('events') ? 'active':'' !!}"><a href="{{url('/events')}}">@lang('navbar.events')</a></li>
                    <li class="nav-link {!! Request::is('blogs') ? 'active':'' !!}"><a href="{{url('/blogs')}}">@lang('navbar.blog')</a></li>
{{--                    <li class="nav-link {!! Request::is('savings-report') ? 'active':'' !!}"><a href="services.html">@lang('navbar.admin')</a></li>--}}
{{--                    <li class="nav-link {!! Request::is('savings-report') ? 'active':'' !!}"><a href="{{url('/')}}">@lang('navbar.about_us')</a></li>--}}
                    <li class="nav-link {!! Request::is('contact-us') ? 'active':'' !!}"><a href="{{url('/contact-us')}}">@lang('navbar.contact_us')</a></li>
                    @can('isSuper')
                    <li class="nav-link {!! Request::is('dashboard') ? 'active':'' !!}"><a href="{{url('/dashboard')}}">@lang('navbar.dashboard')</a></li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
    <a href="#" class="menu-bars db-none right-menu ml-35 ml-xs-25">
        <div class="bars transform-center">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </a>
    <!--RIGHT MENU-->
    <div class="col-md-2 col-2 text-right">
        <div class="icon-links d-flex align-items-center justify-content-end">
            <div class="bg-menu-overlay transition-5 opacity-8"></div>
            <div class="fx-menu-wrapper bg-yellow-op-9 transition-5 d-flex justify-content-between flex-column">
                <p style="color:white;">@lang('home.mondir')</p>
                <div class="fx-menu-header d-flex justify-content-between">
                    <div class="close-menu">
                        <a href="#" class=""> <span></span>
                            <span> </span>
                        </a>
                    </div>
                </div>
                <div class="fx-menu-content mb-15">
                    <ul class="fx-menu-links rbt-slab">
                        <li class="nav-link {!! Request::is('/') ? 'active':'' !!}"><a href="{{url('/')}}">@lang('navbar.home')</a></li><br>
                        <li class="nav-link {!! Request::is('events') ? 'active':'' !!}"><a href="{{url('/events')}}">@lang('navbar.events')</a></li>
                        <li class="nav-link {!! Request::is('blogs') ? 'active':'' !!}"><a href="{{url('/blogs')}}">@lang('navbar.blog')</a></li>
{{--                        <li class="nav-link {!! Request::is('savings-report') ? 'active':'' !!}"><a href="services.html">@lang('navbar.admin')</a></li>--}}
{{--                        <li class="nav-link {!! Request::is('savings-report') ? 'active':'' !!}"><a href="{{url('/')}}">@lang('navbar.about_us')</a></li>--}}
                        <li class="nav-link {!! Request::is('contact-us') ? 'active':'' !!}"><a href="{{url('/contact-us')}}">@lang('navbar.contact_us')</a></li>
                        @can('isSuper')
                        <li class="nav-link {!! Request::is('dashboard') ? 'active':'' !!}"><a href="{{url('/dashboard')}}">@lang('navbar.dashboard')</a></li>
                        @endcan
                    </ul>

                </div>
                <div class="fx-menu-footer">
                    <ul class="mg-header social-icons menu-social black">
                        <li>
                            <a href="https://www.facebook.com/groups/Arjo.Dhormotola"><i class="fab fa-facebook-f "></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCZKs4SyLkSc0EOFTAN7j7KQ/"><i class="fab fa-youtube "></i></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- The search Modal start -->
<div class="search-popup modal" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#">
                    <div class="form-group relative">
                        <input type="text" class="form-control input-search" id="search" placeholder="Search here..."> <i class="fas fa-search transform-v-center"></i>
                    </div>
                </form>
            </div>
        </div>
    </div> <i class="fas fa-times close-search-modal" data-dismiss="modal"></i>
</div>
<!-- The search Modal end -->
<!-- Header end -->
