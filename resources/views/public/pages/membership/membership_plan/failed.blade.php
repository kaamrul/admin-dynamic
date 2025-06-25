@extends('public.layout.master')
@section('title', 'Subscription Failed')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Subscription Failed') !!}
    <!-- End Breadcrumbs -->

    <!-- ======= Membership Section ======= -->
    <section id="membership" class="membership">
        <div class="container" data-aos="fade-up">
            <h3>{{ $message }}</h3>
        </div>
    </section><!-- End Membership Section -->
</main><!-- End #main -->
@stop

