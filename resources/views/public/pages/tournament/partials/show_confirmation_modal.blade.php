<div id="showConfirmationModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <h5 class="text-danger text-center" id="errorMsg"> </h5>

                <div class="row">
                    <div class="modal-footer justify-content-center col-md-12">
                        <a href="{{ route('subscribe.day', $tournament->id) }}" class="btn buy-btn">Enroll Day Plan</a>
                        <button href="#" class="btn buy-btn">Enroll Others Plan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>