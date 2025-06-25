<!-- Modal -->
<div class="modal fade" id="createAnglerModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <form id="createAnglerForm" method="post" action="{{ route('member.dashboard.tournament.addMembers') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" id="tournament_type" value="{{ $tournament_team->tournament->tournament_type}}">
            <input type="hidden" id="club_member_fee" value="{{ str_replace('$', '', getFormattedMemberFee($tournament_team->tournament, 'member'))}}">
            <input type="hidden" id="non_club_member_fee"  value="{{ str_replace('$', '', getFormattedMemberFee($tournament_team->tournament, 'non-club-member'))}}">
            <input type="hidden" id="affiliated_club_member_fee"  value="{{ str_replace('$', '', getFormattedMemberFee($tournament_team->tournament, 'affiliated-club-member'))}}">
            <input type="hidden" id="boat_cost" value="{{ $tournament_team->tournament->boat_cost ? str_replace('$', '', formatBoatAmount($tournament_team->tournament)) :$tournament_team->tournament->boat_cost}}">
            <input type="hidden" name="team" value="{{ $tournament_team->id }}">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize"><i
                            class="fas fa-plus"></i> {{ __('Add New Anglers') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="form-group">
                        <label class="col-form-label required">{{ __('Anglers') }}</label>

                        <select class="form-control" name="angler_id[]" id="angler_id" multiple>
                            <option value="" class="selected highlighted">Select One</option>
                            @foreach($members as $key => $user)
                            <option value="{{ $user->member->id }}" data-type="{{ $user->member?->currentSubscription?->name }}"
                                {{(old("angler_id") == $user->member->id) ? "selected" : ""}}>
                                {{ $user?->full_name }}
                            </option>
                            @endforeach
                        </select>
                        <small class="form-text error-message"></small>
                    </div> --}}

                    <div class="email-container">
                        <div class="w-100 d-flex align-items-center gap-4 email-field mb-3">
                            <div class="w-100">
                                <input type="text" class="form-control" name="nominee1" id="searchBox1"
                                    placeholder="Search angler by name / phone / member id">
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-outline-secondary btn-sm"
                                id="searchBtn1">Go</button>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label class="col-form-label required">{{ __('Amount') }}</label>

                        <input type="number" class="form-control" name="amount" id="amount" step="0.01"
                            value="{{ old('amount') }}" placeholder="{{ __('EX: 100') }}" required readonly>
                        <small class="form-text error-message"></small>
                    </div> --}}

                    <div id="angler-list">

                    </div>

                    <select class="form-control d-none" id="hiddenAnglerList" name="angler_id[]" multiple>

                    </select>

                    <div class="mb-4 border p-3 mt-3">
                        <h5 class="mb-3">Invite Member</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="email-containers">
                                    <div class="w-100 d-flex align-items-center gap-4 email-field mb-3">
                                        <div class="w-100">
                                            <input type="email" class="form-control" name="emails[]"
                                                placeholder="Enter Email">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-outline-secondary btn-sm"
                                                id="addEmail">+</button>
                                            <button class="btn bg-danger btn-danger btn-sm deleteEmail"
                                                style="display: none;">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 mt-lg-3">
                        <div class="card-body">
                            <h5 class="card-title">Payment Summary</h5>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Total: </span>
                                    <span id="amount">$0</span>
                                    <input type="hidden" name="amount" id="hiddenAmount" value="0"/>
                                </div>
                            </div>
                            {{-- <button class="btn btn-primary">Pay</button> --}}
                        </div>
                    </div>

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn2-light-secondary mr-3" data-dismiss="modal"><i
                            class="fas fa-times"></i> {{ __('Close') }}</button>
                    <button type="submit" class="btn btn2-secondary"><i class="fas fa-save"></i> {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<div id="searchModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Angler List</h5>
                <button type="button" class="btn-close closeModal"></button>
            </div>

            <div class="modal-body">
                <select id="searchResults" class="form-control">
                    <!-- Options will be added here dynamically -->
                </select>
                <h3 id="noResults" class="text-center mt-3 text-danger" style="display: none;">No angler found</h3>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal">Close</button>
                {{-- <button type="button" id="selectMemberBtn" class="btn btn-primary">Select</button> --}}
            </div>
        </div>
    </div>
</div>

<script>
    var selectedAnglers = [];
    const createAnglerModal = "#createAnglerModal";
    const createAnglerForm = "#createAnglerForm";
    const updateAnglerModal = "#updateAnglerModal";
    const updateAnglerForm = "#updateAnglerForm";

    function clearForm() {
        $(createAnglerModal).find("input[name='angler_id']").val('');
        $(createAnglerModal).find("input[name='amount']").val('');
    }

    window.clickAddAction = function () {
        //clearForm();
        $(createAnglerModal).modal('show');
    }

    var tournament_type = $("#tournament_type").val();
    var club_member_fee = $("#club_member_fee").val();
    var non_club_member_fee = $("#non_club_member_fee").val();
    var boat_cost = $("#boat_cost").val();
    var anglerFee = parseFloat(0);
    var amount = parseFloat(0);
    var previousValue = 0;

    window.addAngler = function (e, t)
    {
        e.preventDefault();
        const url = BASE_URL + '/tournaments/teams/'+ id +'/add/members';
        const form_data = $(t).serialize();
        loading('show');
        axios.post(url, form_data)
            .then(response => {
                $(createAnglerModal).modal('hide');
                notify(response.data.message, 'success', function (){
                    location.reload();
                });
            })
            .catch(error => {
                const response = error.response;
                if (response) {
                    if (response.status === 422)
                        validationForm(createAnglerForm, response.data.errors);
                    else
                        notify(response.data.message, 'error');
                }
            })
            .finally(() => {
                loading('hide');
            });
    }

    $(document).ready(function() {
        let activeSearchBox = null;
        let tournamentTeamId = "{{ $tournament_team->id }}"
        function searchMembers(query, searchBoxId) {
            activeSearchBox = searchBoxId;
            axios.get(`/search-anglers/${tournamentTeamId}`, { params: { query: query } })
                .then(response => {
                    const members = response.data;
                    const searchResults = $('#searchResults');
                    searchResults.empty();
                    if (members.length > 0) {
                        members.forEach(member => {
                            searchResults.append(`<option value="${member.member.id}">${member.full_name} - ${member?.user_type}</option>`);
                        });
                        $('#noResults').hide();
                    } else {
                        $('#noResults').show();
                    }
                    $("#searchResults").val(null).trigger("change");
                    $('#searchModal').modal('show');
                })
                .catch(error => {
                    console.error('Error fetching members:', error);

                    if (error.response && error.response.status === 422) {
                        const errorMessage = error.response.data.errors.angler || "An error occurred.";
                        notify(errorMessage, 'error');
                    } else {
                        notify('Something went wrong. Please try again.', 'error');
                    }

                    // $('#noResults').show();
                    // $('#searchModal').modal('show');
                });
        }

        $('#searchBtn1').on('click', function(e) {
            e.preventDefault();
            const query = $('#searchBox1').val();
            searchMembers(query, '#searchBox1');
        });

        $('.closeModal').on('click', function() {
            $(activeSearchBox).val('');
            $('#searchModal').modal('hide');
        });
    });


    $(document).ready(function () {
        $("#searchResults").select2({
            placeholder: "Select Angler",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#searchResults').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });
    });

    $('#searchResults').change(function() {
        var selectedValue = $(this).val();
        var selectedText = $('#searchResults option:selected').text();

        if (selectedValue) {
            if (selectedAnglers.length && selectedAnglers.includes(selectedValue)) {
                alert('This angler already added')
                return;
            } else {
                selectedAnglers.push(selectedValue)
            }
        }

        if (selectedValue) {
            let anglerFeeHtml = ''
            if (tournament_type != 'boat') {
                let memberType = selectedText.split("-")[1].trim();
                let non_club_member_fee = $('#non_club_member_fee').val();
                let affiliated_club_member_fee = $('#affiliated_club_member_fee').val();
                let club_member_fee = $('#club_member_fee').val();

                if (memberType == 'non') {
                    anglerFee = non_club_member_fee;
                } else if (memberType == 'affiliated') {
                    anglerFee = affiliated_club_member_fee;
                } else if (memberType == 'member') {
                    anglerFee = club_member_fee;
                }

                amount += parseFloat(anglerFee);

                anglerFeeHtml = '<p class="m-0">$' + anglerFee + '</p>';

                $('#amount').text('$' + amount)
                $('#hiddenAmount').val(amount)
            }

            // Create a new div for the selected angler
            var checkboxHtml = `<input type="checkbox" checked onchange="updateTotal(0)" id="${selectedValue.replace('$', '')}" data-amount="${anglerFee}" name="angler[]" value="${selectedValue.replace('$', '')}" class="angler-checkbox form-check-input mt-0 me-2">`

            if (tournament_type == 'boat') {
                checkboxHtml = `<input type="checkbox" checked onchange="updateTotal(0)" id="${selectedValue.replace('$', '')}" data-amount="${anglerFee}" name="angler[]" value="${selectedValue.replace('$', '')}" class="angler-checkbox form-check-input mt-0 me-2 d-none">`;
            }

            var anglerItem = `
                <label for="${selectedValue.replace('$', '')}" class="w-100 angler-item" data-value="${selectedValue.replace('$', '')}">
                    <div class="d-flex align-items-center border p-2 mt-2">
                            ${checkboxHtml}
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="m-0">${selectedText}</p>
                            ${anglerFeeHtml}
                        </div>
                        <button style="margin-left: 20px" class="remove-angler btn bg-danger btn-danger btn-sm py-1 px-2" data-value="${selectedValue.replace('$', '')}" data-text="${selectedText}">-</button>
                    </div>
                </label>
            `;

            var h = `<option selected value="${selectedValue}">${selectedText}</option>`;

            // Append the new div to the angler list
            $('#angler-list').append(anglerItem);

            $('#hiddenAnglerList').append(h);

            // Remove the selected option from the dropdown
            $('#searchResults option:selected').remove();
            $('#searchResults').val(''); // Reset the dropdown to the default option

            // $('#searchModal').modal('hide');
        }
    });

    // Event delegation to handle click event for dynamically added buttons
    $('#angler-list').on('click', '.remove-angler', function() {
        var anglerValue = $(this).data('value');
        var anglerText = $(this).data('text');

        // Remove the angler item from the list
        $(this).closest('.angler-item').remove();

        if (tournament_type != 'boat') {
            let memberType = anglerText.split("-")[1].trim();
            let non_club_member_fee = $('#non_club_member_fee').val();
            let affiliated_club_member_fee = $('#affiliated_club_member_fee').val();
            let club_member_fee = $('#club_member_fee').val();

            if (memberType == 'non') {
                anglerFee = non_club_member_fee;
            } else if (memberType == 'affiliated') {
                anglerFee = affiliated_club_member_fee;
            } else if (memberType == 'member') {
                anglerFee = club_member_fee;
            }

            amount -= parseFloat(anglerFee);

            $('#amount').text('$' + amount)
            $('#hiddenAmount').val(amount)
        }

        selectedAnglers = selectedAnglers.filter(item => item !== anglerValue);

        $('#hiddenAnglerList').empty();

        if (selectedAnglers.length) {
            selectedAnglers.forEach(angler => {
                var hh = `<option selected value="${angler}"></option>`;
                $('#hiddenAnglerList').append(hh);
            });
        }
    });

    function updateTotal(x) {
        var type = "{{ $tournament->tournament_type }}"

        amount = 0;
        amount += parseFloat(previousValue)

        if (x != 0) {
            amount += parseFloat(x);
        }

        if (type == 'boat') {
            return;
        }

        const checkboxes = document.querySelectorAll('.angler-checkbox');

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                amount += parseFloat(checkbox.getAttribute('data-amount'));
            }
        });

        // Update the displayed and hidden amounts
        $('#amount').text('$' + amount.toFixed(2));
        $('#hiddenAmount').val(amount.toFixed(2));
    }

    $(document).on('click', '#addEmail', function(e) {
            e.preventDefault();
            let currentEmailField = $(this).closest('.email-field');

            $(this).remove();
            currentEmailField.find('.deleteEmail').show();

            let emailField = currentEmailField.clone();
            emailField.find('input').val('');
            emailField.find('.deleteEmail').hide();
            emailField.find('.deleteEmail').before(
                '<button class="btn btn-outline-secondary btn-sm" id="addEmail">+</button>');
            $('.email-containers').append(emailField);
        });

        $(document).on('click', '.deleteEmail', function(e) {
            e.preventDefault();
            $(this).closest('.email-field').remove();
        });

        if ($('.email-field').length === 1) {
            $('.deleteEmail').hide();
        }

</script>
