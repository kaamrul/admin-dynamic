@extends('public.member_dashboard.dashboard_master')
@section('title', 'Catch Card')
@section('catchCard', 'active')

@section('member_content')
<div class="row ">
    <div class="col-md-12 content-area pt-3">
        <h2>Catch Card List</h2>
        <hr>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Tournament Name</th>
                        <th>Team Name</th>
                        <th>Fish Type</th>
                        <th>Boat Name</th>
                        <th>Fish Species</th>
                        <th>Line Weight(kg)</th>
                        <th>Scoring</th>
                        <th>Date</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catchCards as $key => $catchCard)
                    <tr class="text-center">
                        <td>{{ ++$key }}</td>
                        <td>{{$catchCard->tournament?->tournament_name ?? 'N/A' }}</td>
                        <td>{{$catchCard->tournamentTeam?->name ?? 'N/A' }}</td>
                        <td>{{ $catchCard->fish_type }}</td>

                        <td>{{$catchCard->boat?->boat_name ?? 'N/A' }}</td>
                        <td>{{$catchCard->fishSpecies?->name ?? 'N/A' }}</td>
                        <td>{{$catchCard->line_weight }}</td>
                        <td>{{ $catchCard->scoring }} </td>
                        <td>{{ getFormattedDate($catchCard->date_of_catch) }}</td>
                        <td><a href="{{ route('member.dashboard.catchCard.show', $catchCard->id) }}"
                            class="icon-btn me-2"><i class="fas fa-eye"></i></a> </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
