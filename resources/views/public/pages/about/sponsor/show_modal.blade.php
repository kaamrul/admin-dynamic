<div id="showSponsorDetailsModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sponsor Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="ps-lg-4 pt-lg-5">
                            <img src="" class="img-fluid" alt="" id="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="">
                            <h3 class="fw-bold mb-2" id="name"></h3>
                            <p class="fw-bold">
                                <i class="fa-solid fa-envelope me-2"></i>
                                <span id="email"></span>
                            </p>
                            <p class="fw-bold">
                                <i class="fa-solid fa-phone me-2"></i>
                                <span id="mobile"></span>
                            </p>
                            <p class="fw-bold">
                                <i class="fa-solid fa-globe me-2"></i>
                                <a href="" id="website" target="_blank"></a>
                            </p>

                            <p id="short_description"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ps-lg-4 mt-3">
                        <h3 class="fw-bold fs-2 mb-3">Description</h3>
                        <p id="description"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    const showSponsorDetailsModal = "#showSponsorDetailsModal";

    function showSponsorDetails(id) {

        $.ajax({
            url: BASE_URL + "/sponsors/show",
            method: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (response) {

                console.log(response);
                $('#img').attr('src',BASE_URL+'/'+response.logo);
                $('#name').html(response.name);
                $('#mobile').html(response.phone);
                $('#email').html(response.email);
                $('#website').html(response.website);
                $('#website').attr('href',response.website);
                $('#description').html(response.description);
                $('#short_description').html(response.short_description);

                $(showSponsorDetailsModal).modal('show');
            }
        });

    }
</script>
@endpush