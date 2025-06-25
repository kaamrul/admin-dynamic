@extends('public.member_dashboard.dashboard_master')
@section('title', 'Catch Card | Details')
@section('catchCard', 'active')

@section('member_content')

<div class="row ">
    <div class="col-md-12 content-area pt-3">

        <h2>Catch Card Details</h2>
        <hr>

        <div class="row">
            <div class="col-md-6 mb-4">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" style="margin-bottom: 0rem;">Angler's</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table org-data-table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Is Tournament</td>
                                    <td>
                                        <span
                                            class="badge {{ ($catchCard->is_tournament == true) ? "bg-success" : "bg-danger"}}">
                                            {{ ($catchCard->is_tournament == true) ? "Yes" : "No" }}
                                        </span>
                                    </td>
                                </tr>

                                @if ($catchCard->is_tournament == true)
                                <tr>
                                    <td> Tournament Name </td>
                                    <td> {{ $catchCard?->tournament?->tournament_name ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Team Name </td>
                                    <td> {{ $catchCard?->tournamentTeam?->name ?? 'N/A' }} </td>
                                </tr>
                                @endif

                                <tr>
                                    <td> Fish Type </td>
                                    <td> {{ ucwords($catchCard->fish_type) }} </td>
                                </tr>
                                <tr>
                                    <td> Fishing Method </td>
                                    <td> {{ $catchCard->fishing_method ?? 'N/A' }} </td>
                                </tr>

                                @if($catchCard->is_club_member == false)
                                <tr>
                                    <td> Club Name </td>
                                    <td> {{ $catchCard?->club?->name ?? 'N/A' }} </td>
                                </tr>
                                @endif

                                <tr>
                                    <td> Boat Name </td>
                                    <td> {{ $catchCard?->boat?->boat_name ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Skipper Name </td>
                                    <td> {{ $catchCard?->skipper?->full_name ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Sponsor Name </td>
                                    <td> {{ $catchCard?->sponsor?->name ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Fish Species </td>
                                    <td> {{ $catchCard?->fishSpecies?->name ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Line Weight (kg) </td>
                                    <td> {{ $catchCard->line_weight ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Date of Catch </td>
                                    <td> {{ $catchCard->date_of_catch ? getFormattedDate($catchCard->date_of_catch) : 'N/A' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td> Time of Hook Up </td>
                                    <td> {{ $catchCard->time_of_hook_up ? getFormattedTime($catchCard->time_of_hook_up) : 'N/A' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td> Boated Time </td>
                                    <td> {{ $catchCard->boated_time ? getFormattedTime($catchCard->boated_time) : 'N/A' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>Created At</td>
                                    <td>{{ getFormattedDateTime($catchCard->created_at) }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                @if ($tagFish)
                <div class="card shadow-sm mt-4">
                    <div class="card-header">
                        <h4 class="card-title text-center" style="margin-bottom: 0rem;">{{ __('Tag & Release') }}</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table org-data-table table-bordered">
                            <tbody>
                                <tr>
                                    <td> ID </td>
                                    <td> {{ $tagFish?->id ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Tag Number </td>
                                    <td> {{ $tagFish?->tag_number ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Estimated Weight </td>
                                    <td> {{ $tagFish?->tag_number ?? 'N/A' }} </td>
                                </tr>
                                <tr>
                                    <td> Fish Length </td>
                                    <td> {{ $tagFish?->fish_length ?? 'N/A' }} </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

            </div>

            <div class="col-md-6 mb-4">

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title text-center" style="margin-bottom: 0rem;">Weighmaster</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table org-data-table table-bordered">
                            <tbody>

                                <tr>
                                    <td> Line Test </td>
                                    <td>
                                        <span class="badge bg-success mr-2">Result 1 :
                                            {{ $weight_master?->line_test_result_1 }}</span>
                                        <span class="badge bg-success mr-2">Result 2 :
                                            {{ $weight_master?->line_test_result_2 }}</span>
                                        <span class="badge bg-success mr-2">Result 3 :
                                            {{ $weight_master?->line_test_result_3 }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Leader Length Max </td>
                                    <td> {{ $weight_master?->leader_length_max }} </td>
                                </tr>
                                <tr>
                                    <td> Double Line Max </td>
                                    <td> {{ $weight_master?->double_line_max }} </td>
                                </tr>
                                <tr>
                                    <td> Combined Leader & Double Line Max </td>
                                    <td> {{ $weight_master?->combined_leader_and_double_max }} </td>
                                </tr>
                                <tr>
                                    <td> Hook Checked </td>
                                    <td> {{ $weight_master?->hook_checked }} </td>
                                </tr>

                                @if($catchCard->fish_type == 'tagged')
                                <tr style="background: #f4f7f4">
                                    <td colspan="2" style="text-align: center;">
                                        <b>Tag & Release</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Tag Pole Lenth </td>
                                    <td> {{ $weight_master?->tag_pole_length }} </td>
                                </tr>
                                <tr>
                                    <td> Footage Checked </td>
                                    <td> {{ $weight_master?->footage_checked }} </td>
                                </tr>
                                <tr>
                                    <td> Tag Visible </td>
                                    <td> {{ $weight_master?->tag_visible }} </td>
                                </tr>
                                <tr>
                                    <td> Tag Release </td>
                                    <td> {{ $weight_master?->tag_release }} </td>
                                </tr>
                                <tr>
                                    <td> Date </td>
                                    <td> {{ $weight_master?->date_time ? getFormattedDate($weight_master?->date_time) : "N/A" }}
                                    </td>
                                </tr>
                                <tr>
                                    <td> Time </td>
                                    <td> {{ $weight_master?->date_time ? getFormattedTime($weight_master?->date_time) : "N/A" }}
                                    </td>
                                </tr>
                                @elseif($catchCard->fish_type == 'landed')
                                <tr style="background: #f4f7f4">
                                    <td colspan="2" style="text-align: center;">
                                        <b>Landed</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Fish Weight (kg) </td>
                                    <td> {{ $weight_master?->fish_weight }} </td>
                                </tr>
                                <tr>
                                    <td> Gaff Length </td>
                                    <td> {{ $weight_master?->gaff_length }} </td>
                                </tr>
                                <tr>
                                    <td> Gaff Rope </td>
                                    <td> {{ $weight_master?->gaff_rope }} </td>
                                </tr>
                                <tr>
                                    <td> Tail Rope </td>
                                    <td> {{ $weight_master?->tail_rope }} </td>
                                </tr>
                                <tr>
                                    <td> IGFA Rules </td>
                                    <td> {{ $weight_master?->igfa_roules_followed }} </td>
                                </tr>
                                @endif

                                <tr style="background: #f4f7f4">
                                    <td colspan="2" style="text-align: center;">
                                        <b>Weighmaster Comment</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> {!! $weight_master?->weighmaster_comment !!} </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
