<div id="createBoatModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Boat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pb-0">
                <form id="boatStoreForm" method="post" class="form" action="{{ route('member.dashboard.tournament.store.boat', $tournament->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <div class="mt-3" id="">
                            <label for="registerNumber" class="form-label required">Boat Name</label>
                            <input type="text" class="form-control" id="boatRegisterNumber" name="registration_number" placeholder="Enter Boat Name">
                            <span class="text-danger d-none" id="boatRegisterNumberError">Boat name is required</span>
                        </div>
                    </div>

                    <div class="row existing_team mt-3">
                        <div class="modal-footer justify-content-center col-md-12 pb-0">
                            <button type="submit" id="createBoat" class="btn buy-btn">Create Boat</button>
                        </div>
                    </div>
                </form>
            </div>

            </form>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createBoat').on('click', function (e) {
        e.preventDefault();

        hasError = false;

        if (!$('#boatRegisterNumber').val()) {
            hasError = true;
            $('#boatRegisterNumberError').removeClass('d-none');
        } else if ($('#boat').val()) {
            $('#boatRegisterNumberError').addClass('d-none');
        }

        if (!hasError) {
            let registration_number = $('#boatRegisterNumber').val();
            let data = { registration_number: registration_number };
            $.ajax({
                url: BASE_URL + "/member/dashboard/tournaments/store-boat",
                type:"POST",
                data: JSON.stringify(data),
                dataType: 'json',
                contentType : 'application/json',
                success:function (data) {
                    if (data) {
                        //data.registration_number
                        var newOption = new Option(data.registration_number, data.id, true, true);
                        // Append it to the select
                        $('#boat').append(newOption).trigger('change');
                        $('#teamName').val(data.registration_number)
                        $('#boatRegisterNumber').val('')
                        $('#createBoatModal').modal('hide');
                    } else {
                        notify('Something went wrong!', 'error');
                    }
                }
            })
        }
    });
</script>
