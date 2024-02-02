@extends('FrontEnd.master')
@section('body')
    <!-- Start about temple -->

        <div class="contact-page-wrap">
            <!-- work gallery start -->
            <section class="blog-listing our-articles pt-80 pb-80">
                <div class="container">
                    <div class="row">
                        @if(!$blogs->isEmpty())
                            @foreach($blogs as $blog)
                        <article class="col-lg-4 col-md-6 post">
                            <div class="blog-wrapper">
                                <div class="blog-img">
                                    <a href="{{url('/blog-details/'.$blog->slug)}}">
                                        <img src="@if($blog->blog_photo) {{$blog->blog_photo}} @else assets/images/mondir/blog.jpg  @endif" class="img-fluid full-width" alt="Blog">
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <?php $date=\Carbon\Carbon::parse($blog['created_at'])->format('M d Y'); ?>
                                            <?php list($month, $day, $year) = explode(' ',$date); ?>
                                            <div class="date text-custom-white">{{$day}} <sup>{{$month}}</sup> <span class="year bg-yellow text-custom-white">{{$year}}</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-meta">
                                    <div class="cat-box">
                                        <div class="cats">
                                            <a href="#">{{$blog->blog_source}}</a>
                                        </div>
                                    </div>
                                    <h2 class="fw-600 mb-xl-20"><a href="{{url('/blog-details/'.$blog->slug)}}" class="text-custom-black">{{$blog->blog_title}}</a></h2>
                                    <div class="post-meta-middle">
                                        <span class="text-custom-pink fs-14 mr-4"><i class="fas fa-eye mr-1"></i> <a href="#" class="text-dark-white">10</a></span>
                                        <span class="text-custom-pink fs-14 mr-4"><i class="fas fa-thumbs-up mr-1"></i> <a href="#" class="text-dark-white">08</a></span>
                                        <span class="text-custom-pink fs-14 mr-4"><i class="fas fa-comments mr-1"></i> <a href="#" class="text-dark-white">02</a></span>
                                    </div>
                                    <div class="text-custom-black blog-description" style="height:100px;overflow: hidden">{!! $blog->blog_description  !!}</div>
                                    <div class="blog-footer">
                                        <div class="post-author">
                                            <span class="text-dark-white fw-600 fs-14">@lang('blog.post_by')  <a href="" class="text-dark-white">{{$name->name($blog->created_by)->name}}</a></span>
                                        </div>
                                        <a href="{{url('/blog-details/'.$blog->slug)}}" class="text-custom-black fs-14 fw-600 link">@lang('blog.read_more')</a>

                                    </div>
                                </div>
                            </div>
                        </article>
                            @endforeach
                            @endif
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="lined-btn text-md-center">
                                {{ $blogs->links() }}
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <!-- work gallery end -->
        </div>

    <!-- End about temple -->
@endsection
