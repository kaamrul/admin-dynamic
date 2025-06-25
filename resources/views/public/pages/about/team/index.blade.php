@extends('public.layout.master')
@section('title', 'Our Team')
@section('about', 'active')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Our Team') !!}
    <!-- End Breadcrumbs -->

    <div class="team">
        <section id="admin" class="admin pb-4">
            <div class="container" data-aos="fade-up">
                <div class="text-center">
                    <h2 class="text-center">Admin</h2>
                </div>
                <div class="row gy-3 d-flex align-items-center justify-content-center mt-4">
                    <div class="col-xxl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member shadow  border-secondary-4 ">
                            <img width="110%" src="{{ asset('assets/image/page/team/hero-img.jpg') }}" class="img-fluid" alt="">
                            <h4>Office</h4>
                            <span>07 866 4121</span>
                            <p>office@mbgfc.co.nz</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xxl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/clubroom-MBGFC.jpg') }}" class="img-fluid" alt="">
                            <h4>Clubrooms</h4>
                            <span>07 866 5620</span>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xxl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/hero-img.jpg') }}" class="img-fluid" alt="">
                            <h4>John East</h4>
                            <span>Club Manager</span>
                            <p>gm@mbgfc.co.nz</p>
                        </div>
                    </div><!-- End Team Member -->
                </div>
        </section>

        <section id="committee" class="committee">
            <div class="container" data-aos="fade-up">
                <div class="text-center">
                    <h2 class="text-center mt-5">The Committee</h2>
                </div>
                <div class="row gy-3 mt-4">
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Warren.MBGFC_.jpg') }}" class="img-fluid" alt="">
                            <h4>Warren Harris</h4>
                            <span>PATRON</span>
                            <p>027 499 2895</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="500">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Gordon.mc3_.MBGFC_.jpg') }}" class="img-fluid" alt="">
                            <h4>Gordon McIvor</h4>
                            <span>PRESIDENT</span>
                            <p>0274 979737</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="600">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Anne.Smal_.MBGFC_.jpg') }}" class="img-fluid" alt="">
                            <h4>Anne Smal</h4>
                            <span>VICE-PRESIDENT</span>
                            <p>021 738873</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Brad.Johnson.MBGFC_.jpg') }}" class="img-fluid" alt="">
                            <h4>Brad Johnson</h4>
                            <span>COMMITTEE</span>
                            <p>027 4140343</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Mark.Franklin.MBGFC_.jpg') }}" class="img-fluid" alt="">
                            <h4>Mark Franklin</h4>
                            <span>COMMITTEE</span>
                            <p>021 995528</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/scott.farrell.MBGFC_.jpg') }}" class="img-fluid" alt="">
                            <h4>Scott Farrell</h4>
                            <span>COMMITTEE</span>
                            <p>0272 316332</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Dave-Enright.jpg') }}" class="img-fluid" alt="">
                            <h4>Dave Enright</h4>
                            <span>COMMITTEE</span>
                            <p>021 778805</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Tim.png') }}" class="img-fluid" alt="">
                            <h4>Tim Hennessey</h4>
                            <span>COMMITTEE</span>
                            <p>0274 788422</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Dianna-Andrews.jpg') }}" class="img-fluid" alt="">
                            <h4>Diana Andrews</h4>
                            <span>COMMITTEE</span>
                            <p>021 945413</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Craig-Scarrott-1.png') }}" class="img-fluid" alt="">
                            <h4>Craig Scarrott</h4>
                            <span>COMMITTEE</span>
                            <p>021 732743</p>
                        </div>
                    </div><!-- End Team Member -->
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                        <div class="member shadow ">
                            <img width="110%" src="{{ asset('assets/image/page/team/Doug-Ray-1.png') }}" class="img-fluid" alt="">
                            <h4>Doug Ray</h4>
                            <span>COMMITTEE</span>
                            <p>021 654764</p>
                        </div>
                    </div><!-- End Team Member -->

                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->
@stop
@push('scripts')
@endpush