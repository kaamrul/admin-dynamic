@extends('public.layout.master')
@section('title', 'Coming Soon')
@section('about', 'active')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Coming Soon') !!}
    <!-- End Breadcrumbs -->

    <div class="container">
        <div class="text-center min-vh-75 m-5 p-5">
            <h1> Coming Soon </h1>
        </div>
    </div>
</main>
@stop
