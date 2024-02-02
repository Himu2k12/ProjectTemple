@extends('FrontEnd.master')
@section('body')
    <!-- Start about temple -->
    <section class="pt-80 pb-80 about-temple temple-video-sec">
        <div class="contact-page-wrap">
                <div class="row">
                    <div class="offset-md-1 col-sm-12 col-lg-7">
                        <div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3504.0278213811516!2d89.54758513837864!3d22.846124889548637!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc9980dbf838c5af9!2z4KaW4Ka-4Kay4Ka_4Ka24Kaq4KeB4KawIOCmhuCmsOCnjeCmr-CnjeCmryDgpqfgprDgp43gpq7gpqTgprLgpr4g4Kat4KaV4KeN4KakIOCmuOCmguCmmCDgprngprDgpr_gprjgpq3gpr4!5e0!3m2!1sen!2sbd!4v1596539286700!5m2!1sen!2sbd" width="100%" height="670px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><a href="https://www.crocothemes.net">crocothemes.net</a></div><style>.mapouter{text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="entry-content">
                            <h2>@lang('contact.head')</h2>
                            <p></p>
                            <ul class="contact-info p-0">
                                <li><i class="fa fa-envelope"></i><span> AryaDharmotola@gmail.com</span></li><br>
                                <li><i class="fa fa-map-marker"></i><span> @lang('contact.address')</span></li>
                                <li> @lang('contact.address2')</li>
                            </ul>
                        </div>
                    </div><!-- .col -->

                </div><!-- .row -->
        </div>
    </section>
    <!-- End about temple -->
@endsection
