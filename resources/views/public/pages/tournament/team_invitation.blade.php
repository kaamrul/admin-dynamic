@extends('public.member_dashboard.dashboard_master')
@section('title', 'Current Tournaments')

@section('member_content')
    <h4>Team Invitation</h4>
    <hr>
    <div id="tournaments" class="tournaments" style="margin-top: 40px">
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('member.dashboard.tournament.team.join') }}">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Joining</th>
                                    <th scope="col"> SN </th>
                                    <th scope="col"> Tournament Name </th>
                                    <th scope="col"> Team Name </th>
                                    <th scope="col"> Invited By </th>
                                    <th scope="col"> Fee </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $fee = 0;
                                    $totalFee = 0;
                                @endphp
                                @foreach($invitations as $key => $invitation)
                                    @php
                                        if (auth()?->user()?->user_type == \App\Library\Enum::USER_TYPE_NON_CLUB_MEMBER) {
                                            $fee = str_replace('$', '', getFormattedMemberFee($invitation->load('tournamentTeam.tournament')->tournamentTeam->tournament, 'non-club-member'));
                                        } elseif (auth()?->user()?->user_type == \App\Library\Enum::USER_TYPE_AFFILIATED_CLUB_MEMBER) {
                                            $fee = str_replace('$', '', getFormattedMemberFee($invitation->load('tournamentTeam.tournament')->tournamentTeam->tournament, 'affiliated-club-member'));
                                        } elseif (auth()?->user()?->user_type == \App\Library\Enum::USER_TYPE_CUSTOMER) {
                                            $fee = str_replace('$', '', getFormattedMemberFee($invitation->load('tournamentTeam.tournament')->tournamentTeam->tournament, 'member'));
                                        }

                                        $totalFee += $fee
                                    @endphp
                                    <tr class="text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                        <td><input type="checkbox" checked onchange="updateTotal()" data-amount="{{ $fee }}" name="team_ids[]" value="{{ $invitation->load('tournamentTeam.tournament')->tournamentTeam->id }}" class="form-check-input"></td>
                                        <th scope="row"> {{ ++$key }} </th>
                                        <td>{{ $invitation->load('tournamentTeam.tournament')->tournamentTeam->tournament->tournament_name }}</td>
                                        <td>{{ $invitation->load('tournamentTeam')->tournamentTeam->name }}</td>
                                        <td>{{ $invitation->load('tournamentTeam.owner.user')->tournamentTeam->owner->user->full_name }}</td>
                                        <td>${{ $fee }}</td>
                                    </tr>
                                @endforeach

                                <tr class="text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td><strong id="amount">${{ $totalFee }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        @if (count($invitations))
                            <div class="col-md-12" style="text-align: right">
                                <button type="submit" id="submit" class="btn buy-btn">Join Now</button>
                            </div>
                        @else
                        <p class="text-center">You have no invitation !</p>
                        @endif
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    let amount = 0;

    function updateTotal() {
        amount = 0;

        $('input[type="checkbox"]').each(function() {
            if ($(this).is(':checked')) {
                const checkboxAmount = parseFloat($(this).attr('data-amount'));

                if (!isNaN(checkboxAmount)) { // Ensure it's a valid number
                    amount += checkboxAmount;
                }
            }
        });

        $('#amount').text('$' + amount);

        if (amount === 0) {
            $('#submit').attr('disabled', 'disabled');
        } else {
            $('#submit').removeAttr('disabled');
        }
    }
</script>
@endpush

