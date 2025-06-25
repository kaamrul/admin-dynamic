@extends('public.layout.master')
@section('title', 'Sponsors')
@section('about', 'active')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Sponsors') !!}
    <!-- End Breadcrumbs -->
    <style>
        .sponsors .sponsor-card img
        {
            height: 100px;
        }
    </style>
    @if(count($sponsors))
    <section id="sponsors" class="sponsors">
        <div class="container px-4 px-lg-0">
            <div class="row gy-4">
                @foreach($sponsors as $key => $sponsor)
                <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6" onclick="showSponsorDetails({{ $sponsor->id }})">
                    <div class="sponsor-card d-flex justify-content-center gap-md-2 gap-4 rounded-2">
                        <div>
                            <img width="100" height="100" src="{{ $sponsor->getImage() }}" class="img-fluid" alt="">
                        </div>
                        <div style="margin: auto">
                            <h4 class="m-0">{{ $sponsor->name }}</h4>
                            <p class="m-0">{{ $sponsor->website }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</main><!-- End #main -->

@include('public.pages.about.sponsor.show_modal')
@stop
