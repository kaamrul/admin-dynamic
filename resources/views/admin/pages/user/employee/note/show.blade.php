<div class="card shadow-sm">
    <div class="card-body py-sm-4">

        <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Timeline</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Attachments</a>
            </li>
        </ul>
        <hr>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @include('admin.pages.user.employee.note.partials.timeline')
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                 @include('admin.pages.user.employee.note.partials.attachment')
            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div style="z-index: 999999 !important;" class="modal fade" id="updateReferralAttachmentModal" tabindex="-1" role="dialog" aria-labelledby="referralModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <form id="updateReferralAttachmentForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ __('Edit Attachment') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label class="required" for="name">{{ __('Name') }}</label>
                <div class="form-group mb-0 @error('name') error @enderror">
                    <input id="attachmentName" type="text" name="name" class="form-control" required/>
                </div>

                <label class="mt-3" for="name">{{ __('Attachment') }}</label>
                <div class="file-upload-section">
                    <div class="input-group col-xs-12">
                        <input type="text"
                            class="form-control file-upload-info @error('image') error @enderror"
                            disabled="" readonly placeholder="Size: 200x200 and max 200kB">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-outline-secondary"
                                type="button"><i class="fas fa-upload"></i> Browse</button>
                        </span>

                    </div>
                    <input name="image" type="file" class="form-control hidden_file"
                        allowed="*">
                    <div class="display-input-image d-none">
                        <img id="attachmentImage" src="{{ asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
                            alt="Preview Image" />
                        <button type="button"
                            class="btn btn-sm btn-outline-danger file-upload-remove"
                            title="Remove">x</button>
                    </div>

                    <div class="display-pdf d-none text-center mt-2">
                        <a id="attachmentPdf" href="" target="_blank" class="btn btn-sm btn-light"><i class="ti-eye text-primary"></i> View PDF</a>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                {!! \App\Library\Html::btnSubmit() !!}
            </div>
        </div>
      </form>

    </div>
</div>

@push('scripts')


<script>
    const updateReferralAttachmentModal = "#updateReferralAttachmentModal";
    const updateReferralAttachmentForm = "#updateReferralAttachmentForm";

    var attachmentId = '';

    window.showAttachment = function (id) {
        attachmentId = id;
        // clearValidation(updateReferralAttachmentForm);

        $(updateReferralAttachmentForm).find("input[name='name']").val('');
        $("input.file-upload-info").val('');
        $(".display-input-image").addClass('d-none')
        $(".display-pdf").addClass('d-none')
        $("input[type='file']").val('');

        let url = BASE_URL + '/referrals/attachment/' + attachmentId;
        axios.get(url)
        .then(response => {
            console.log(response.data);
            $('#attachmentName').val(response?.data?.name);

            if (response?.data?.attachment.split('.').pop() != 'pdf') {
                $('#attachmentImage').attr('src', '/' + (response?.data?.attachment || ''));
                $(".display-input-image").removeClass('d-none')
            } else {
                $('#attachmentPdf').attr('href', '/' + (response?.data?.attachment || ''));
                $(".display-pdf").removeClass('d-none')
            }
        })
        .catch(error => {
            console.log(error);
        })

        $(updateReferralAttachmentModal).modal('show');
    }

    $(document).ready(function() {
        $('#updateReferralAttachmentForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            let url = BASE_URL + '/referrals/update-attachment/' + attachmentId;
            axios.post(url, formData)
            .then(response => {
                $(this)[0].reset();
                $(updateReferralAttachmentModal).modal('hide');
                notify(response?.data?.message, 'success');
                setTimeout(function() {
                    location.reload(); // Reload the page after 5 seconds
                }, 3000);
            })
            .catch(error => {
                $(this)[0].reset();
                const response = error.response;
                if (response) {
                    if (response.status === 422) {
                        notify(response?.data?.errors['image'], 'error');
                    } else {
                        notify(response?.data?.message, 'error');
                    }

                    $(updateReferralAttachmentModal).modal('hide');
                    setTimeout(function() {
                        location.reload(); // Reload the page after 5 seconds
                    }, 3000);
                }
            })
        });
    });

    $(document).ready(function () {
        $('#pills-tab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

@endpush
