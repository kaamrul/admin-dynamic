@extends('public.member_dashboard.dashboard_master')
@section('tournament', 'active')
@section('upcoming', 'active')

@section('member_content')
<div class="row ">
    <div class="col-md-12 content-area pt-3">
        @include('public.member_dashboard.partials.tournament_tab')
        
        <h2>History</h2>
        <hr>

        <table id="dataTable" class="table table-bordered ticket-data-table">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team_anglers as $key => $team_angler)
                <tr class="text-center">
                    <td>{{ ++$key }}</td>
                    <td>{{ $team_angler->tournamentTeam->tournament->tournament_name }}</td>
                    <td>{{ ucwords($team_angler->tournamentTeam->tournament->tournament_type) }}</td>
                    <td>{{ date('D,jS M Y', strtotime($team_angler->tournamentTeam->tournament->start_date)) }}</td>
                    <td>{{ date('D,jS M Y', strtotime($team_angler->tournamentTeam->tournament->end_date)) }}</td>
                    <td><a href="{{ route('public.tournament.show', $team_angler->tournamentTeam->tournament->id) }}"
                            class="icon-btn me-2"><i class="fas fa-eye"></i></a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection