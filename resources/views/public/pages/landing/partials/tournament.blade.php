@if(count($tournaments))
<section id="tournaments" class="tournaments px-2">
    <div class="container">
        <h2>Tournaments</h2>
        <div class="row px-xxl-5 mt-lg-5 mt-4 gy-lg-5 gx-lg-5 gy-4">
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
        </div>

        @if (count($tournaments))
        <div class="mt-5 ms-lg-5">
            <a href="{{ route('public.tournament.index') }}">
                <button class="btn tournament-btn">Explore More<span class="ms-2">
                        <i class="fa-solid fa-arrow-right"></i></span>
                </button>
            </a>
        </div>
        @endif
    </div>
</section>
@endif
