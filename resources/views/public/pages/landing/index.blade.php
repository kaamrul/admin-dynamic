@extends('public.layout.master')
@section('title', settings('app_title') ? settings('app_title') : 'Paws on Tour')
@section('home', 'active')

@section('content')
<!-- ======= Hero Section ======= -->
@include('public.pages.landing.partials.hero')
<!-- End Hero Section -->

<!-- ======= Hero Section ======= -->
@include('public.pages.landing.partials.slider')
<!-- End Hero Section -->

<!-- ====== Weather Section ====== -->
@include('public.pages.landing.partials.weather')
<!-- ====== End Weather Section ====== -->

    <!-- ======= Clients Section ======= -->
    @include('public.pages.landing.partials.clients')
   <!-- End Clients Section -->


<main id="main">

    <!-- ======= Oldest Game Section ======= -->
    {{-- @include('public.pages.landing.partials.about') --}}
    <!-- End Oldest Game Section -->

    <!-- ==== Membership Section ==== -->
    @include('public.pages.landing.partials.membership')
    <!-- ==== End Membership Section ==== -->

    <!-- ==== Tournaments Section ==== -->
    @include('public.pages.landing.partials.tournament')
    <!-- ==== End Tournaments Section ==== -->

    <!-- ==== Restaurant Section ==== -->
    @include('public.pages.landing.partials.restaurant')
    <!-- ==== End Restaurant Section ==== -->

    <!-- ===== Club News Section ===== -->
    @include('public.pages.landing.partials.club-news')
    <!-- ===== End Club News Section ===== -->

    <!-- ======= Contact Section ======= -->
    @include('public.pages.landing.partials.contact-us')
    <!-- End Contact Section -->

    <section id="tournaments" class="tournaments px-2">
        <div class="container">
            <h2>Proud to be associated with</h2>
            <div class="row px-xxl-5 mt-lg-5 mt-4 gy-lg-5 gx-lg-5 gy-4">
                <div class="col-lg-6">
                    <div class="text-center">
                        <a href="https://www.nzsportfishing.co.nz/" target="_blank">
                            <img width="50%" src="{{ asset('assets/sportfishing.png') }}" />
                            <h3>The New Zealand Sport Fishing Council</h3>
                        </a>
                        <p>
                            The New Zealand Sport Fishing Council Inc (NZSFC), is a not for profit organisation originally founded in 1957 and incorporated on 3 March 1959. We currently have 54 affiliated member Clubs from the top of the North Island to the bottom of the South Island.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="text-center">
                        <a href="https://igfa.org/" target="_blank">
                            <img width="50%" src="{{ asset('assets/IGFA.png') }}" />
                            <h3>The International Game Fish Association</h3>
                        </a>
                        <p>
                            The IGFA is a nonprofit organization committed to the conservation of game fish and the promotion of responsible, ethical angling practices, through science, education, rule making, record keeping and recognition of outstanding accomplishments in the field of angling.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@stop
@push('scripts')
@endpush
