@extends('public.member_dashboard.dashboard_master')
@section('tournament', 'active')
@section('current', 'active')

@section('member_content')

<div class="row ">
    <div class="col-md-12 content-area pt-3 table-responsive">

        @include('public.member_dashboard.partials.tournament_tab')

        <h2>Current Tournaments</h2>
        <hr>

        <div class="table-responsive">
        <table id="dataTable" class="table table-bordered ticket-data-table">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Team Name</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activeTournaments as $key => $activeTournament)
                @php
                    $teamAngler = $activeTournament->teamAnglers->where('member_id', auth()->user()->member->id)->first();
                @endphp
                <tr class="text-center">
                    <td>{{ ++$key }}</td>
                    <td>
                        <a href="{{ route('public.tournament.show', $activeTournament->id) }}" class="text-primary">
                        {{ $activeTournament->tournament_name }}
                        </a>
                    </td>
                    <td><a class="text-primary" href="{{ route('member.dashboard.tournament.show.team', $teamAngler?->tournament_team_id) }}" target="_blank">{{ $teamAngler?->team->name }}</a></td>
                    <td>{{ ucwords($activeTournament?->tournament_type) }}</td>
                    <td>{{ date('D,jS M Y', strtotime($activeTournament->start_date)) }}</td>
                    <td>{{ date('D,jS M Y', strtotime($activeTournament->end_date)) }}</td>
                    <td class="text-capitalize {{ $teamAngler->payment_status ? 'text-success' : 'text-danger' }}">{{  $teamAngler->payment_status ? 'Success' : 'Failed' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

    </div>
</div>
@endsection
