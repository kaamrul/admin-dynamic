@extends('public.member_dashboard.dashboard_master')
@section('dashboard', 'active')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Dashboard</h2>
            </div>
        </div>
        <hr>

        <div class="row mt-2">
            @if ((auth()->user()->user_type == \App\Library\ENUM::USER_TYPE_NON_CLUB_MEMBER && !auth()->user()?->member?->currentMemberSubscription) || (auth()->user()->user_type == \App\Library\ENUM::USER_TYPE_NON_CLUB_MEMBER && auth()->user()?->member?->currentMemberSubscription?->subscription?->name == 'day'))
                <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
                    <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                        <div class="card-body py-4 px-0 text-center">
                                <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                                <h5>
                                    <a href="{{ route('member.dashboard.day.fishing') }}" class="text-white">
                                        <h5>Get Day Membership</h5>
                                    </a>
                                </h5>
                        </div>
                    </div>
                </div>
            @endif

            @if (auth()->user()->user_type != \App\Library\ENUM::USER_TYPE_CUSTOMER)
            <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
                <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                    <div class="card-body py-4 px-0 text-center">
                        <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                            <h5 style="cursor: pointer" id="createTeam">Become a MBGFC Member</h5>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->user_type == \App\Library\ENUM::USER_TYPE_CUSTOMER && !auth()->user()->member->currentMemberSubscription)
            <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
                <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                    <div class="card-body py-4 px-0 text-center">
                            <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                            <h5>
                                <a href="/membership-plans" class="text-white">
                                    <h5>Complete Registration</h5>
                                </a>
                            </h5>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->member?->currentMemberSubscription?->subscription?->name == \App\Library\ENUM::SUBSCRIPTION_TYPE_FAMILY)
            <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
                <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                    <div class="card-body py-4 px-0 text-center">
                            <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                            <h5>
                                <a href="/member/dashboard/family-plan" class="text-white">
                                    <h5>Family Plan</h5>
                                </a>
                            </h5>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
            <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                <div class="card-body py-4 px-0 text-center">
                    <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                        <h5>
                            <a href="/member/dashboard/tournaments/current" class="text-white">
                                <h5>Tournaments</h5>
                            </a>
                        </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
            <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                <div class="card-body py-4 px-0 text-center">
                    <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                        <h5>
                            <a href="/member/dashboard/accounts/payments" class="text-white">
                                <h5>Accounts</h5>
                            </a>
                        </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
            <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                <div class="card-body py-4 px-0 text-center">
                        <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                        <h5>
                            <a href="/member/dashboard/catchCards" class="text-white">
                                <h5>My Catch History</h5>
                            </a>
                        </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2 col-6 p-1" data-aos="fade-right" data-aos-duration="900" >
            <div class="card col-md-12 shadow-lg py-3 bg-primary mobile-dashboard-card text-white rounded-2">
                <div class="card-body py-4 px-0 text-center">
                    <span style="color: #1C3263"> &nbsp;&nbsp;&nbsp;</span>
                    <h5>
                        @php
                            $invitation = \App\Models\InvitedUser::where('member_id', authUser()->member->id)->count();
                        @endphp
                        <a href="/member/dashboard/alerts?type=unseen" class="text-white">
                            <h5>Alerts ({{ auth()->user()->unreadNotifications->count() }})</h5>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        </div>
        <hr>
    </div>
</div>


<div id="showSelectTypeModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Select Nominee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pb-0">
                <div id="mbgfcMemberFields">
                    <form action="{{ route('member.dashboard.become.member') }}" method="POST">
                    @csrf
                    <div class="email-container">
                        <div class="w-100 d-flex align-items-center gap-4 email-field mb-3">
                            <div class="w-100">
                                <input required type="text" class="form-control" name="nominee1" id="searchBox1"
                                    placeholder="Search 1st Nominee by Full Name or member ID">
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-outline-secondary btn-sm"
                                id="searchBtn1">Go</button>
                            </div>
                        </div>
                    </div>
                    <div class="email-container">
                        <div class="w-100 d-flex align-items-center gap-4 email-field mb-3">
                            <div class="w-100">
                                <input required type="text" id="searchBox2" class="form-control" name="nominee2"
                                    placeholder="Search 2nd Nominee by Full Name or member ID">
                            </div>
                            <div class="d-flex align-items-center">
                                <button id="searchBtn2" class="btn btn-outline-secondary btn-sm"
                                    id="searchNominee2">Go</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mt-3">Become MBGFC Member</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="searchModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Nominee List</h5>
                <button type="button" class="btn-close closeModal"></button>
            </div>

            <div class="modal-body">
                <select id="searchResults" class="form-control">
                    <!-- Options will be added here dynamically -->
                </select>
                <h3 id="noResults" class="text-center mt-3 text-danger" style="display: none;">No member found</h3>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal">Close</button>
                <button type="button" id="selectMemberBtn" class="btn btn-primary">Select</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    $(document).ready(function() {

    $('#createTeam').on('click', function (e) {
        $("#showSelectTypeModal").modal('show');
    });

    let activeSearchBox = null;

    function searchMembers(query, searchBoxId) {
        activeSearchBox = searchBoxId;
        axios.get('/search-members', { params: { query: query } })
            .then(response => {
                const members = response.data;
                const searchResults = $('#searchResults');
                searchResults.empty();
                if (members.length > 0) {
                    members.forEach(member => {
                        searchResults.append(`<option value="${member.full_name} - ${member.user_name}">${member.full_name} - (${member.email} - ${member.user_name})</option>`);
                    });
                    $('#noResults').hide();
                } else {
                    $('#noResults').show();
                }
                $('#searchModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching members:', error);
                $('#noResults').show();
                $('#searchModal').modal('show');
            });
    }

    $('#searchBtn1').on('click', function(e) {
        e.preventDefault();
        const query = $('#searchBox1').val();
        searchMembers(query, '#searchBox1');
    });

    $('#searchBtn2').on('click', function(e) {
        e.preventDefault();
        const query = $('#searchBox2').val();
        searchMembers(query, '#searchBox2');
    });

    $('#selectMemberBtn').on('click', function() {
        const selectedMember = $('#searchResults').val();
        if (activeSearchBox && selectedMember) {
            let arr =[$('[name=nominee1]').val(),  $('[name=nominee2]').val()];

            if (arr.includes(selectedMember)) {
                alert('Both nominee can not be same member')
            } else {
                $(activeSearchBox).val(selectedMember);
                $('#searchModal').modal('hide');
            }
        }
    });

    $('.closeModal').on('click', function() {
        $(activeSearchBox).val('');
        $('#searchModal').modal('hide');
    });
});
</script>

@endpush
