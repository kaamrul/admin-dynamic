<div id="showMembershipBuy" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered buyMembership">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-4">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-circle-xmark" style="font-size: 100px; color: #e65757; font-weight: 400"></i>
                    </div>
                    <div class="col-sm-6">
                        <div class="ml-4">
                            <a href="{{ route('member.dashboard.index') }}" class="btn btn-success">Be a MBGFC Member</a>
                            <a href="{{ '/subscribe/'. $subscription->id .'/details' }}" class="btn btn-warning mt-3">Buy Day Membership</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <h5 class="fw-bold fs-5 title text-center">Only MBGFC club member can buy family plan.</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    const showMembershipBuyModal = "#showMembershipBuy";

    function showMembershipBuy(title) {
        $(showMembershipBuyModal).modal('show');
        title = `Only MBGFC club member can buy ${title} plan.`;
        $('.title').html(title);
    }
</script>
@endpush
