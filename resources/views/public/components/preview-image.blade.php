<div id="showImageModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="show_subject"> </span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body showImage">
                <div class="row">
                    <div class="col-md-12">
                        <img src="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')

    <style>
        .showImage {
            text-align: center;
        }
    </style>

@endpush

@push('scripts')

    <script>
        function clickImage(image) {
            $('#showImageModal').modal('show');
            $(".showImage img").attr("src", image);
        }
    </script>

@endpush


