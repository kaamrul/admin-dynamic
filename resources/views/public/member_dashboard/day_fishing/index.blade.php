@extends('public.member_dashboard.dashboard_master')
@section('title', 'Day Fishing')
@section('day-fishing', 'active')

@section('member_content')
<style>
    .membership ul li {
        font-size: 20px;
        justify-content: center;
        padding: 5px 0;
        display: flex;
        align-items: center;
    }

    .membership ul {
        padding: 0 !important;
        list-style: none;
        color: #6c757d;
        text-align: left;
        line-height: 20px;
    }
</style>
<div class="row ">
    <div class="col-md-12 content-area pt-3">
        <h2>Day Fishing</h2>
        <hr>
    {{-- @php
        $subscription =
    @endphp --}}
        <!-- ======= Membership Section ======= -->
    <section id="membership" class="membership" style="padding: 20px 0">
        <div class="container" data-aos="fade-up">
        <form method="post" class="form" action="{{ '/subscribe/' . $subscription->id }}"
            enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-11 col-sm-12 col-md-12 col-lg-7 col-xl-7 mt-1 mb-2">
                    <!-- Subscription ---->

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <div id="subscription" class="card px-5 pt-4 pb-1 mt-3 mb-3 shadow-sm main box-shadow-primary">
                        <input type="hidden" id="dates" name="dates" value="">

                        <div class="p-sm-2">
                            <div class="form-group row @error('date') error @enderror date-div">
                                <label class="col-sm-3 col-form-label required">{{ __('Select Date') }}</label>
                                <div class="col-sm-9">
                                    <div id="mdp-demo"></div>
                                    @error('date')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-11 col-sm-12 col-md-12 col-lg-5 col-xl-5 mt-1 mb-2">
                    <!-- Subscription ---->
                    <div id="subscription" class="card pb-1 mt-3 mb-3 shadow-sm main box-shadow-primary">
                        <div class="card-header">
                            <h5 class="card-title text-center">Subscription Details</h5>
                        </div>
                        <div class="px-3">
                            <div class="card-body" style="padding-bottom: 0">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="py-1 ps-0">
                                                    <p class="mb-0">Subscription Type</p>
                                                </td>
                                                <td class="text-center text-capitalize">
                                                    <p >{{ ucwords($subscription->name) }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1 ps-0">
                                                    <p class="mb-0">Amount Per Day</p>
                                                </td>
                                                <td class="text-center text-capitalize">
                                                    <p>${{ $subscription->amount }}</p>
                                                </td>
                                            </tr>

                                            @if(isset($tournament) && false)
                                            <tr>
                                                <td class="py-1 ps-0">
                                                    <p class="mb-0">Subscribe For Tournament</p>
                                                </td>
                                                <td class="text-center text-capitalize">
                                                    <p >{{ ucwords($tournament->tournament_name) }}</p>
                                                </td>
                                            </tr>
                                            @endif

                                            <tr>
                                                <td class="py-1 ps-0">
                                                    <strong class="mb-0">Total</strong>
                                                </td>
                                                <td class="text-center text-capitalize">
                                                    <p id="side_amount">$0</p>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive mt-2">
                                    <div id="dateList">
                                        <h4 class="card-title">Date List</h4>
                                        <ul id="selectedDate" class="">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row px-3 pb-3" style="padding-top: 0;">
                            <div class="modal-footer justify-content-center col-md-12">

                                <button type="submit" id="pay" class="btn buy-btn d-none">Pay</button>

                                <button id="pay-disabled" disabled class="btn buy-btn">Pay</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        </div>
    </section><!-- End Membership Section -->
    </div>
</div>
@endsection

@include('admin.assets.multi-date-picker')
@include('admin.assets.select2')

@push('scripts')

<script>
    $(document).ready(function () {
        $("#tournament_id").select2({
            placeholder: "Select Tournament",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#tournament_id').on('select2:open', function() {
            // Use a small timeout to allow the Select2 elements to render
            setTimeout(function() {
                $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
            }, 1);
        });


        //========= MultiDate Select ===========//
        var today = new Date();
        console.log(today);
        var time = today.getHours();
        var crrentTimeString = today.toLocaleTimeString();
        var amRegex = /\bAM\b/i;
        var containsAM = amRegex.test(crrentTimeString);

        if (!containsAM || (containsAM && time > 7)) {
            $('#mdp-demo').multiDatesPicker({
                adjustRangeToDisabled: true,
                addDisabledDates: [today]
            });
        }

        //disable days which already enrolled by auth member
        var date_array = <?php echo $memberSubscriptionDates ?>;

        if(date_array != 0){
            $('#mdp-demo').multiDatesPicker({
                adjustRangeToDisabled: true,
                addDisabledDates: date_array,
            });
        }
        //End


        $('#mdp-demo').multiDatesPicker({
            onSelect: function () {
                totalForDay();
                getDates();
            },
        });

        function totalForDay() {
            var dateLength = $('#mdp-demo').multiDatesPicker('getDates').length;
            var day_amount = <?php echo $subscription->amount ?>;
            $("#side_amount").empty();
            $("#side_amount").html( '$' + day_amount * dateLength);
        }

        function getDates() {
            $('#selectedDate').empty();
            var dates = $('#mdp-demo').multiDatesPicker('getDates');

            $.each(dates, function (i, item) {
                $("#selectedDate").append('<li>' + item + '</li>');
            });

            if (dates.length == 0) {
                $('#pay').addClass('d-none')
                $('#pay-disabled').removeClass('d-none')
            } else {
                $("#dates").val('');
                $("#dates").val(JSON.stringify(dates));

                $('#pay').removeClass('d-none')
                $('#pay-disabled').addClass('d-none')
            }
        };
        //=============End Multi Date============//
    });
</script>
@endpush
