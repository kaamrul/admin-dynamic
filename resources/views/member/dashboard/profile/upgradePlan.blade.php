@extends('public.member_dashboard.dashboard_master')
@section('title', 'Upgrade Membership Plan')
@section('profile', 'active')

@section('member_content')

@php
    use App\Library\Html;
    use App\Library\Enum;
@endphp

<div class="row" data-aos="fade-up">
    <div class="col-md-12 content-area">
        <h4>Upgrade Membership Plan</h4>
        <hr>
        <div class="row d-flex flex-column align-items-center justify-content-center shadow-lg p-4 rounded-4">
            <form id="upgradeForm" method="post" action="{{ route('member.dashboard.upgrade.membership.plan') }}"
                class="client-signup-form" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif

                <div class="row">

                    <div class="col-11 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1 mb-2">
                        <!-- Subscription ---->
                        <div id="subscription" class="card px-5 pt-4 pb-1 mt-3 mb-3 shadow-sm main box-shadow-primary">

                            <div class="p-sm-2">
                                <input type="hidden" id="member_ids" name="member_ids[]" />
                                <div class="form-group row @error('subscription_id') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Type') }}</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="subscription_id" id="subscription_id" required>
                                            @foreach ($subscriptions ?? [] as $key => $subscription)
                                                @if ($subscription->name != Enum::SUBSCRIPTION_TYPE_FAMILY)
                                                    @continue
                                                @endif
                                                <option class="text-capitalize" value="{{ $subscription->id }}"
                                                    data-type="{{ $subscription->name }}" data-amount="{{$subscription->amount}}"
                                                    {{ old('subscription_id', $subscription->name == Enum::SUBSCRIPTION_TYPE_FAMILY) ==  $subscription->id ? 'selected' : '' }}
                                                    {{ $subscription->name == Enum::SUBSCRIPTION_TYPE_FAMILY ? '' : 'disabled' }}>
                                                    {{ ucwords($subscription->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subscription_id')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row @error('member_id') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Family Member') }} </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="member_id" id="member_id">
                                            <option value="" class="selected highlighted">Select One</option>
                                            @foreach ($members as $member)
                                            @if (ageGroup($member->user->dob) == 'intermediate')
                                                @continue;
                                            @endif
                                                <option value="{{ $member->id }}"
                                                    {{ old('member_id') ==  $member->id ? 'selected' : '' }} data-age="{{ ageGroup($member->user->dob) }}">
                                                    {{ $member->user->full_name }} - {{ ucfirst(ageGroup($member->user->dob)) }} - {{ $member->user->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('member_id')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row @error('amount') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Amount') }}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="amount" id="amount" step="0.01"
                                            value="{{ $familyPlan->amount }}" placeholder="{{ __('EX: 100') }}" required readonly>
                                        @error('amount')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" value="{{ $familyPlan->amount }}" id="familyPlanAmount">

                                <div class="form-group row @error('manual_payment_method') error @enderror">
                                    <label
                                        class="col-sm-3 col-form-label required">{{ __('Payment Method') }}</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control" name="manual_payment_method">
                                            @foreach(getDropdown(App\Library\Enum::CONFIG_DROPDOWN_PAYMENT_METHOD) as $paymentMethod)
                                            <option value="{{ $paymentMethod }}"
                                                {{(old("manual_payment_method") == $paymentMethod) ? "selected" : ""}}>
                                                {{ $paymentMethod }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('manual_payment_method')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row @error('note') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Note') }}</label>
                                    <div class="col-sm-9">
                                        <div class="input-group with-icon">
                                            <textarea type="text" class="form-control" name="note" rows="5">{{ old('note') }}</textarea>
                                        </div>
                                        @error('note')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-11 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1 mb-2">
                        <!-- Subscription ---->
                        <div id="subscription" class="card pb-1 mt-3 mb-3 shadow-sm main box-shadow-primary">
                            <div class="card-header">
                                <h4 class="card-title mb-2 mt-2">Subscription Plan Details</h4>
                            </div>
                            <div class="p-sm-3">
                                <div class="card-body">
                                    <div class="title mt-0">
                                        <h5><strong>Current Plan</strong></h5>
                                    </div>
                                    <div class="table-responsive mb-4">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="py-1 ps-0" width="50%"><p class="mb-0">Type</p></td>
                                                    <td id="currentPlan"></td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 ps-0" width="50%"><p class="mb-0">Paid Amount</p></td>
                                                    <td id="currentPaidAmount"></td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 ps-0" width="50%"><p class="mb-0">Expired At</p></td>
                                                    <td id="currentExpiredDate"></td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 ps-0" width="50%"><p class="mb-0">Created At</p></td>
                                                    <td id="currentCreatedDate"></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="title mt-4">
                                        <h5><strong>Upgraded Plan</strong></h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="py-1 ps-0" width="50%">
                                                        <p class="mb-0">Type</p>
                                                    </td>
                                                    <td class="">
                                                        {{ ucwords($familyPlan->name) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 ps-0" width="50%">
                                                        <p class="mb-0">Amount</p>
                                                    </td>
                                                    <td class="">
                                                        {{ getFormattedAmount($familyPlan->amount) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 ps-0" width="50%">
                                                        <p class="mb-0">Expired At</p>
                                                    </td>
                                                    <td id="upgradeExpiredDate"></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <h4 class="card-title mt-4 text-center">Member Details</h4>
                                    <div class="table-responsive mt-2">

                                        <table id="familyTable" class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Age Group</th>
                                                    <th width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="d-none text-center" id="paidBy_row">

                                                </tr>

                                            </tbody>
                                            <tfoot id="memberFoot" class="">
                                                {{-- <tr>
                                                    <td colspan="2"><span>Late Fee :</span> </td>
                                                    <td colspan="2"><span id="late_fee" class="pl-5"></span> </td>
                                                </tr> --}}
                                                <tr>
                                                    <td colspan="2"><strong>Total Amount :</strong> </td>
                                                    <td colspan="2"><strong id="side_total" class="pl-5"></strong> </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="mt-4 d-none" id="dateList">
                                            <h4 class="card-title">Date List</h4>
                                            <ul id="date" class="">

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row p-sm-3">
                                <div class="modal-footer justify-content-center col-md-12" style="gap: 10px;">
                                    {!! \App\Library\Html::btnReset() !!}
                                    {!! \App\Library\Html::btnSubmit() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@include('admin.assets.select2')
@include('admin.assets.multi-date-picker')
@include('admin.assets.summernote-text-editor')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {

    window.getFormattedAmount = function (amount) {
        const symbol = '$';

        return `${symbol}${amount}`;
    }

    window.getFormattedDate = function (date) {
    if (!date) {
        return 'N/A';
    }

    return moment(date).format('YYYY-MM-DD');
    }

    window.getFormattedDateTime = function (dateTime) {
        return moment(dateTime).format('YYYY-MM-DD HH:mm:ss');
    }

    $('.form').on('submit', function (e) {
        if ($('#note').summernote('isEmpty')) {
            notify('Note is empty, fill it!', 'warning');
            e.preventDefault();
        }
        if ($('#member_id').val() == '') {
            notify('Member is empty, fill it!', 'warning');
            e.preventDefault();
        }
    });

    $("#member_id").select2({
        placeholder: "Select One",
        allowClear: true
    });

    $("#subscription_id").select2({
        placeholder: "Select One",
        allowClear: true
    });

    var paidByIds = '';
    var memberIds = [];
    var seniorMembers = [];

    // Function to handle AJAX requests
    function fetchMemberPlan(memberId) {
        return $.ajax({
            url: `${BASE_URL}/member/dashboard/upgrade/${memberId}/current-plan`,
            method: 'GET',
            dataType: 'json'
        });
    }

    // Function to add a member to the table
    function addMemberRow(member, isPaidBy = false) {
        let rowId = `row-${member.id}`;

        // Prevent duplicate entries
        if ($(`#${rowId}`).length) {
            notify('This member is already added!', 'warning');
            return;
        }

        let displayName = isPaidBy ? `${member.user.full_name} (Paid By)` : member.user.full_name;

        const paidBy = ! isPaidBy
            ? `<a class="text-danger" href="javascript:void(0)" onclick="removeData(${member.id})">
                <i class="fas fa-trash-alt"></i>
            </a>`
            : 'N/A';

        let rowData = `
            <tr class="text-center" id="${rowId}">
                <td><img src="${member.user.avatar_image}" alt="Profile Image" width="50"></td>
                <td>${displayName}</td>
                <td class="text-capitalize">${member.age_group}</td>
                <td>
                    ${paidBy}
                </td>
            </tr>
        `;

        $('#familyTable > tbody').append(rowData);
    }

    // Function to remove a row
    window.removeData = function (id) {
        let row = $(`#row-${id}`);
        if (row.length) {
            row.remove();
            memberIds = memberIds.filter(memberId => memberId != id);
            seniorMembers = seniorMembers.filter(seniorId => seniorId != id);
            paidByIds = paidByIds == id ? '' : paidByIds;

            $('#member_ids').val(memberIds)
        }
    };

    // Handle "Paid By" selection
    function init() {
        let memberId = "{{ $userId }}"
        let formAction = `${BASE_URL}/member/dashboard/upgrade/${memberId}/update`;
        $('#upgradeForm').attr('action', formAction);

        paidByIds = memberId;
        memberIds.push(memberId);
        $('#member_ids').val(memberIds);
        // loading('show');

        fetchMemberPlan(memberId)
            .done(response => {
                let planAmount = parseFloat($('#familyPlanAmount').val()) || 0;
                let currentAmount = parseFloat(response.currentPlan.amount) || 0;
                let lateFee = response.lateFee;
                let total = response.total;

                $('#late_fee').text('$' + lateFee);
                $('#side_total').text('$' + total);
                $('#amount').val(planAmount - currentAmount);
                $('#currentPlan').text(response.currentPlan.name || 'N/A');
                $('#currentPaidAmount').text(getFormattedAmount(currentAmount));
                $('#currentExpiredDate').text(getFormattedDate(response.member.expired_at || ''));
                $('#currentCreatedDate').text(getFormattedDateTime(response.member.current_member_subscription.created_at || ''));
                $('#upgradeExpiredDate').text(getFormattedDate(response.member.expired_at || ''));

                addMemberRow(response.member, false);
                // loading('hide');
            })
            .fail((xhr, status, error) => {
                console.error("Error:", error);
                alert("An error occurred while fetching the current plan. Please try again.");
                // loading('hide');
            })
            //.always(() => loading('hide'));
    }

    // Handle Member Selection
    $("#member_id").change(function () {
        const memberId = $(this).val();
        if (!memberId) {
            notify('Please select a valid member!', 'warning');
            return;
        }

        if (memberIds.includes(memberId)) {
            notify('This member already added!', 'warning');
            return;
        }

        let ageGroup = $(this).find(':selected').data("age");

        if (ageGroup === 'senior' && seniorMembers.length >= 1) {
            notify('You already selected 2 senior members. Now you can only add junior members!', 'warning');
            return;
        }

        if (ageGroup === 'senior') seniorMembers.push(memberId);

        memberIds.push(memberId);
        $('#member_ids').val(memberIds)
        // loading('show');

        $.ajax({
            url: `${BASE_URL}/member/dashboard/upgrade/get/member2`,
            method: 'GET',
            data: { id: memberId },
            dataType: 'json'
        })
        .done(response => {
            $('#familyTable > tbody').append(response);
        })
        .fail(() => alert("Failed to fetch member data. Please try again."))
        //.always(() => loading('hide'));
    });

    init();

});

</script>
@endpush
