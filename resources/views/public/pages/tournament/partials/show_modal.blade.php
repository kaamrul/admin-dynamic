<div id="showSelectTypeModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pb-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="select-team-tab" data-bs-toggle="tab" data-bs-target="#select-team" type="button" role="tab" aria-controls="select-team" aria-selected="true">Select Team</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="create-team-tab" data-bs-toggle="tab" data-bs-target="#create-team" type="button" role="tab" aria-controls="create-team" aria-selected="false">Create Own Team</button>
                        </li>
                    </ul>

                    <!-- Tabs content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Select Team Tab -->
                        <div class="tab-pane fade show active" id="select-team" role="tabpanel" aria-labelledby="select-team-tab">
                        <form method="post" class="form" action="{{ route('member.dashboard.tournament.addMember') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="member_subscription_id" id="member_subscription_id">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <div class="form-group @error('team') error @enderror">
                                        <label class="col-form-label required">
                                            {{ __('Select Team') }}
                                        </label>
                                        <div class="col-lg-12">
                                            <select class="form-control w-100" id="team" name="team" required>
                                                <option value="" class="selected highlighted">Select One</option>
                                                @foreach($teams as $key => $team)
                                                <option value="{{ $team->id }}">
                                                    {{ $team->name }} - Owner: {{ $team?->owner?->user?->full_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('team')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row @error('amount') error @enderror @if($tournament->tournament_type == 'boat') d-none @endif">
                                        <label class="col-form-label required">
                                            {{ __('Pay Amount') }}
                                        </label>
                                        @php
                                            $fee = 0;
                                            if (auth()?->user()?->user_type == \App\Library\Enum::USER_TYPE_NON_CLUB_MEMBER) {
                                                $fee = str_replace('$', '', getFormattedMemberFee($tournament, 'non-club-member'));
                                            } elseif (auth()?->user()?->user_type == \App\Library\Enum::USER_TYPE_AFFILIATED_CLUB_MEMBER) {
                                                $fee = str_replace('$', '', getFormattedMemberFee($tournament, 'affiliated-club-member'));
                                            } elseif (auth()?->user()?->user_type == \App\Library\Enum::USER_TYPE_CUSTOMER) {
                                                $fee = str_replace('$', '', getFormattedMemberFee($tournament, 'member'));
                                            }
                                        @endphp
                                        <div class="col-sm-12">
                                            <input type="number" name="amount" class="form-control" step="any" value="{{ $tournament->tournament_type != 'boat' ? $fee : 0 }}" readonly>
                                            @error('amount')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($tournament->getTermsPdf())
                                <div class="mt-4">
                                    <input type="checkbox" id="teamTerms">
                                    <label for="teamTerms">I have read and understand the <a style="color: #2257C0; text-decoration: underline" href="{{ $tournament->getTermsPdf() }}" target="_blank">rules</a></label>
                                </div>
                            @endif

                            <div class="row existing_team mt-3">
                                <div class="modal-footer justify-content-center col-md-12 pb-0">
                                    @if ($tournament->getTermsPdf())
                                        <button type="submit" disabled id="pay" class="btn buy-btn">Pay</button>
                                    @else
                                        <button type="submit" id="pay" class="btn buy-btn">Pay</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        </div>


                        <!-- Create Own Team Tab -->
                        <div class="tab-pane fade" id="create-team" role="tabpanel" aria-labelledby="create-team-tab">
                            <form id="teamStoreForm" method="post" class="form" action="{{ route('member.dashboard.tournament.store.team', $tournament->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <div class="mb-3 position-relative">
                                        <label for="boat" class="form-label">Boat Name<span class="text-danger">*</span></label>
                                        <div class="d-flex justify-content-between">
                                            <select class="form-select" id="boat" name="boat_id">
                                                @foreach ($boats as $boat)
                                                    <option value="">Select Boat Name</option>
                                                    <option data-tournament_id="{{ $tournament->id }}" value="{{ $boat->id }}" data-name={{ $boat->boat_name }}>
                                                        {{ $boat->boat_name ? $boat->boat_name.'-' : '' }}{{ $boat->id }}{{ $boat?->load('owner')->owner ? '-'.$boat?->load('owner')->owner?->full_name : '' }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <button type="button" class="btn btn-primary ms-2" id="addBoatBtn" title="Create New Boat">
                                                <i class="fas fa-plus"></i>
                                            </button> --}}
                                        </div>
                                        <p class="text-danger d-none" id="boat-name-warning">This boat already used in a team.</p>
                                        <span class="text-danger d-none" id="boatNameError">Boat name is required</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="teamName" class="form-label">Team Name <span class="text-danger">*</span></label>
                                        <input type="text" name="team_name" class="form-control" id="teamName" placeholder="Team Name">
                                        <span class="text-danger d-none" id="teamNameError">Team name is required</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="skipper" class="form-label">Skipper</label>
                                        <select class="form-select" id="skipper" name="boat_skipper_id">
                                            @foreach ($skippers as $skipper)
                                                <option value="{{ $skipper?->id }}">{{ $skipper?->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="captain" class="form-label">Team Captain</label>
                                        <select class="form-select" id="captain" name="captain_id">
                                            @foreach ($users as $user)
                                                <option value="{{ $user?->member?->id }}">{{ $user?->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @if ($tournament->getTermsPdf())
                            <div class="mt-4">
                                <input type="checkbox" id="teamTerms2">
                                <label for="teamTerms2">I have read and understand the <a style="color: #2257C0; text-decoration: underline" href="{{ $tournament->getTermsPdf() }}" target="_blank">rules</a></label>
                            </div>
                            @endif

                            <div class="row existing_team mt-3">
                                <div class="modal-footer justify-content-center col-md-12 pb-0">
                                    @if ($tournament->getTermsPdf())
                                        <button type="submit" disabled id="createTeam" class="btn buy-btn">Create Team</button>
                                    @else
                                        <button type="submit" id="createTeam" class="btn buy-btn">Create Team</button>
                                    @endif
                                    {{-- <a href="{{ route('public.tournament.teamDetails') }}"><button type="button" class="btn buy-btn">Create Team</button></a> --}}
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>

            {{-- <div class="row existing_team">
                <div class="modal-footer justify-content-center col-md-12">
                    <button type="submit" class="btn buy-btn">Pay</button>
                    <a href="{{ route('public.tournament.teamDetails') }}"><button type="button" class="btn bg-secondary text-white">Checkout</button></a>
                </div>
            </div> --}}
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#addBoatBtn').on('click', function() {
            $('#createBoatModal').modal('show');
        });

        $('input[type="checkbox"]').on('change', function() {
            if ($('#teamTerms').is(':checked')) {
                $('#pay').removeAttr('disabled');
            } else {
                $('#pay').attr('disabled', 'disabled');
            }
        });

        $('input[type="checkbox"]').on('change', function() {
            if ($('#teamTerms2').is(':checked')) {
                $('#createTeam').removeAttr('disabled');
            } else {
                $('#createTeam').attr('disabled', 'disabled');
            }
        });

        $('#boat').on('change', function() {
            const selectedOption = $(this).find(':selected');
            const dataName = selectedOption.data('name');

            $('#teamName').val(dataName)
        });

        $('#createTeam').on('click', function (e) {
            e.preventDefault();
            boatRequired = false;
            teamName = false;

            if (!$('#boat').val()) {
                $('#boatNameError').removeClass('d-none');
                boatRequired = true;
            } else {
                $('#boatNameError').addClass('d-none');
            }

            if (!$('#teamName').val()) {
                teamName = true;
                $('#teamNameError').removeClass('d-none');
            }

            if (!boatRequired && !teamName) {
                $("#teamStoreForm").trigger("submit");
            }
        });
    });
</script>

@push('styles')
<script>
    $(document).ready(function () {
        $('#boat').on('change', function () {
            const boatId = $('#boat option:selected').val();
            const id = $('#boat option:selected').data('tournament_id');
            const warningElement = $('#boat-name-warning');

            if (boatId.trim() !== '') {
                $.ajax({
                    url: BASE_URL + '/tournaments/'+ id +'/check-boat-name',
                    method: 'GET',
                    data: { boat_id: boatId },
                    success: function (response) {
                        if (response.exists) {
                            warningElement.css('cssText', 'display: block !important;');
                        } else {
                            warningElement.css('cssText', 'display: none !important;');
                        }
                    },
                    error: function () {
                        console.error('An error occurred while checking the boat name.');
                    }
                });
            } else {
                warningElement.hide();
            }
        });
    });
</script>
@endpush