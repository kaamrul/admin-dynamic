<div class="accordion accordion-solid-header" id="note-accordion" role="tablist">
    @include('admin.pages.user.employee.note.partials.note-item', ['notes' => $notes])
</div>

<div class="row d-flex justify-content-center mt-4">
    <button
        type="button"
        id="loadMoreBtn"
        class="btn btn-outline-success btn-icon-text"
        data-offset="10"
        data-user="{{ $user->id }}"
    >
        <i class="ti-reload btn-icon-prepend"></i>
        Load More
    </button>

</div>

@push('scripts')
<script>
    $(document).ready(function () {

        $('#loadMoreBtn').on('click', function () {
            loadNotes();
        });

        function loadNotes() {
            let btn = $('#loadMoreBtn');
            let offset = parseInt(btn.data('offset'));
            let userId = btn.data('user');

            $.ajax({
                url: `/users/employees/${userId}/note/getNotes`,
                method: 'GET',
                data: {
                    offset: offset,
                    user_id: userId
                },
                success: function (res) {
                    $('#note-accordion').append(res.notes);

                    let newOffset = offset + 10;
                    btn.data('offset', newOffset);

                    if (res.count < 10) {
                        btn.hide();
                    }
                }
            });
        }
    });
    $(document).ready(function () {
        $('#pills-tab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

@endpush
