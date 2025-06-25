<div id="showMembershipDetailsModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title">Membership Plan Details</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <h3 class="fw-bold fs-2 mb-3 text-capitalize" id="subscription_name"></h3>
                            <h2 id="subscription_price"></h2>
                        </div>
                        <div id="buyNow" class="col-lg-6" style="text-align: right; margin: auto;">
                                {{-- <a style="text-align: right;" href="/" class="btn buy-btn">Buy Now</a> --}}
                        </div>
                        <hr>
                        <div class="col-lg-12">
                        <h3 class="fw-bold fs-2 mb-3">Who is it for</h3>
                           <p id="short_description"></p>
                        </div>

                        <div class="col-lg-12">
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
    const showMembershipDetailsModal = "#showMembershipDetailsModal";

    function showMembershipDetails(id) {

        $.ajax({
            url: BASE_URL + "/membership-plans/show",
            method: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (response) {

                $('#buyNow').html(response.buyNowHtml);
                $('#subscription_name').html(response.name);
                $('#subscription_price').html('$'+response.amount);
                $('#short_description').html(response.short_description);
                if(response.description){
                    $('#description').closest('div').removeClass('d-none');
                    $('#description').html(response.description);
                }else{
                    $('#description').closest('div').addClass('d-none');
                }

                $(showMembershipDetailsModal).modal('show');
            }
        });

    }
</script>
@endpush
