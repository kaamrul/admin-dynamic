@extends('public.layout.master')
@section('title', 'Active Tournaments')
@section('tournament', 'active')

@section('content')

<main id="main">
<!-- ======= Breadcrumbs ======= -->
{!! \App\Library\Html::breadcrumbsSection($tournament_type, null, null, true) !!}
<!-- End Breadcrumbs -->
<style>
    .tournamentss .tournament-card:hover {
        background-color: #F0F7FF
    }
</style>
<section id="tournaments" class="tournaments px-2">
    <div class="container">

        <div class="row px-xxl-5 gy-lg-5 gx-lg-5 gy-4">

            <div class="tournaments tournamentss">
                <div class="tournament-card">
                    <h5>Our tournaments require entrants to be members of MBGFC or members of affiliated clubs. In order to enter a tournament online, you must have a current login or create a user profile <strong>

                        @auth
                        <a href="/member/dashboard">here</a>
                        @else
                        <a href="/register">here</a>
                        @endauth

                    </strong>.<br><br>
                    Once you have created a user profile, you will be able to apply for your preferred membership type or select your affiliated club.</h5>
                </div>
            </div>

            @if(count($tournaments))
            @foreach($tournaments as $key => $tournament)
            <div class="col-lg-6">
                <div class="tournament-card d-flex align-items-center justify-content-between">
                    <div>
                        <div class="hr"></div>
                        <p class="text-uppercase">{{ date('D, jS M Y', strtotime($tournament->start_date)) }} -
                            {{ date('D, jS M Y', strtotime($tournament->end_date)) }}</p>
                            <a href="{{ route('public.tournament.show', $tournament->id)}}"><h3>{{ $tournament->tournament_name }}</h3></a>
                        <p class="fw-bold ">{{ ucwords($tournament->tournament_type) }}</p>
                    </div>
                    <a href="{{ route('public.tournament.show', $tournament->id)}}">
                        <div class="tournament-icon d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
</main><!-- End #main -->
@stop

