@extends('public.layout.master')
@section('title', 'Create Team')
@section('tournament', 'active')

@php
use App\Library\Enum;
@endphp

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Create Team') !!}
    <!-- End Breadcrumbs -->

    @if($tournament)
    <section id="tournaments" class="tournaments px-2">
        <div class="container">
            <div class="row px-xxl-5 gy-lg-5 gx-lg-5 gy-4">
                <form method="post" action="{{ route('member.dashboard.tournament.create.team.test', $tournament->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif --}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card shadow-sm mt-4">
                                <div class="card-body py-sm-4">

                                    <input type="hidden" id="tournament_type" value="{{ $tournament->tournament_type}}">
                                    <input type="hidden" id="club_member_fee" value="{{ str_replace('$', '', getFormattedMemberFee($tournament, 'member'))}}">
                                    <input type="hidden" id="non_club_member_fee"
                                        value="{{ str_replace('$', '', getFormattedMemberFee($tournament, 'non-club-member'))}}">
                                    <input type="hidden" id="boat_cost" value="{{ $tournament->boat_cost ? str_replace('$', '', formatBoatAmount($tournament)) :$tournament->boat_cost}}">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="p-sm-3">

                                                <div class="form-group row @error('boat_id') error @enderror">
                                                    <label
                                                        class="col-sm-3 col-form-label required">{{ __('Boat') }}</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="boat_id" id="boat_id"
                                                            required>
                                                            <option value="" class="selected highlighted">Select One
                                                            </option>
                                                            @foreach($boats as $key => $boat)
                                                            <option value="{{ $boat->id }}"
                                                                data-name="{{$boat->boat_name }}"
                                                                {{(old("boat_id") == $boat->id) ? "selected" : ""}}>
                                                                {{ $boat->boat_name ? $boat->boat_name.'-' : '' }}{{ $boat->id }}{{ $boat?->load('owner')->owner ? '-'.$boat?->load('owner')->owner?->full_name : '' }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('boat_id')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row @error('name') error @enderror">
                                                    <label
                                                        class="col-sm-3 col-form-label required">{{ __('Team Name') }}</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name" id="name"
                                                            value="{{ old('name') }}"
                                                            placeholder="{{ __('Team Name') }}" required>
                                                        @error('name')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row @error('boat_skipper_id') error @enderror">
                                                    <label
                                                        class="col-sm-3 col-form-label required">{{ __('Skipper') }}</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="boat_skipper_id"
                                                            id="boat_skipper_id" required>
                                                            <option value="" class="selected highlighted">Select One
                                                            </option>
                                                            @foreach($skippers as $key => $skipper)
                                                                @if(hasActiveSubscription($skipper->id, $tournament->start_date, $tournament->end_date))
                                                                <option value="{{ $skipper->id }}"
                                                                    data-name="{{ $skipper->full_name }}"
                                                                    {{(old("boat_skipper_id") == $skipper->id) ? "selected" : ""}}>
                                                                    {{ $skipper->full_name }}
                                                                    {{ $skipper->user_type == Enum::USER_TYPE_SKIPPER ? '( Skipper )' : ''}}
                                                                </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('boat_skipper_id')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row @error('captain_id') error @enderror">
                                                    <label class="col-sm-3 col-form-label">{{ __('Team Captain') }}</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="captain_id" id="captain_id">
                                                            <option value="" class="selected highlighted">Select One
                                                            </option>
                                                            @foreach($members as $key => $member)
                                                            @if(hasActiveSubscription($member?->user->id, $tournament->start_date, $tournament->end_date))
                                                            <option value="{{ $member->id }}"
                                                                data-type="{{ $member->currentSubscription->name }}"
                                                                {{(old("captain_id") == $member->id) ? "selected" : ""}}>
                                                                {{ $member->user->full_name }}
                                                            </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('captain_id')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row @error('add_angler') error @enderror">
                                                    <label
                                                        class="col-sm-3 col-form-label">{{ __('Angler') }}</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="add_angler" id="add_angler">
                                                            <option value="" class="selected highlighted">Select One
                                                            </option>
                                                            @foreach($members as $key => $member)
                                                            @if(hasActiveSubscription($member?->user?->id, $tournament->start_date, $tournament->end_date) &&  (isMemberAddedInTournament(authUser()->member->id, $tournament->id)))
                                                            <option value="{{ $member->id }}" class="d-none"
                                                                data-type="{{ $member->currentSubscription->name }}"
                                                                data-id="{{ $member->id }}"
                                                                {{(old("add_angler") == $member->id) ? "selected" : ""}}>
                                                                {{ $member->user->full_name }}
                                                            </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('add_angler')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row @error('angler_id') error @enderror d-none">
                                                    <label
                                                        class="col-sm-3 col-form-label">{{ __('Anglers') }}</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="angler_id[]" id="angler_id"
                                                            multiple>
                                                            @foreach($members as $key => $member)
                                                                @if(hasActiveSubscription($member?->user?->id, $tournament->start_date, $tournament->end_date) &&  (isMemberAddedInTournament(authUser()->member->id, $tournament->id)))
                                                                <option value="{{ $member->id }}"
                                                                    data-type="{{ $member->currentSubscription->name }}"
                                                                    {{(old("angler_id") == $member->id) ? "selected" : ""}}>
                                                                    {{ $member->user->full_name }}
                                                                </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('angler_id')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row @error('amount') error @enderror">
                                                    <label
                                                        class="col-sm-3 col-form-label required">{{ __('Amount') }}</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="amount"
                                                            id="amount" step="0.01" value="{{ old('amount') }}"
                                                            placeholder="{{ __('EX: 100') }}" required readonly>
                                                        @error('amount')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="card shadow-sm mt-4">
                                <div class="card-header">
                                    <h4 class="card-title text-center">Team Details</h4>
                                </div>
                                <div class="card-body py-sm-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="py-1 ps-0">
                                                        <p class="mb-0">Team Name</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p id="side_name"></p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="py-1 ps-0">
                                                        <p class="mb-0">Boat</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p id="side_boat"></p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="py-1 ps-0">
                                                        <p class="mb-0">Skipper</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p id="side_skipper"></p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <h4 class="card-title mt-4 text-center">Anglers List</h4>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="members_table">
                                            <tbody>
                                                <tr class="d-none" id="captain_row">

                                                </tr>
                                                <tr class="d-none" id="paidBy_row">

                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2"><strong>Total Amount :</strong> </td>
                                                    <td colspan="2"><strong id="side_total"></strong> </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>

                                <div class="row p-sm-3">
                                    <div class="modal-footer justify-content-center col-md-12">
                                        <button type="submit" class="btn buy-btn"><i class="fas fa-money-bill-1"></i> Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endif
</main><!-- End #main -->
@stop
@include('admin.assets.select2')
@push('scripts')
<script>
    $(document).ready(function () {
        $('#captain_id').select2({
            placeholder: "Select One",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#captain_id').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });

        $('#boat_id').select2({
            placeholder: "Select One",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#boat_id').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });

        $('#boat_skipper_id').select2({
            placeholder: "Select One",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#boat_skipper_id').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });

        $('#created_by').select2({
            placeholder: "Select One",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#created_by').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });

        $('#angler_id').select2({
            placeholder: "Select One",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#angler_id').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });

        $('#add_angler').select2({
            placeholder: "Select One",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#add_angler').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });

        $("#name").on("keyup", function () {
            $("#side_name").html($(this).val());
        });

        $("#boat_id").change(function () {
            if ($(this).val()) {
                $("#name").val($(this).find('option:selected').data('name'));
                $("#side_name").html($(this).find('option:selected').data('name'));
                $("#side_boat").html($(this).find('option:selected').data('name'));
            } else {
                $("#side_boat").html('');
            }
        });

        $("#boat_skipper_id").change(function () {
            $("#side_skipper").html($(this).find('option:selected').data('name'));
        });

        $("#captain_id").change(function () {
            var type = $(this).find(":selected").data("type");
            var captain_id = $(this).val();
            console.log(BASE_URL + "/member/dashboard/tournaments/get/member");

            if (captain_id) {
                if (!isAvailable(captain_id)) {
                    checkData(captain_id, type, 'captain');
                } else {
                    $("#captain_id").val('').trigger('change');
                    notify('This Member is already Added in Angler, First Remove from Angler Then Try Again !!',
                        'error');
                }
            } else {
                $('#captain_row').empty();
                $('#captain_row').removeClass('d-none');
                findAvailableAnglers();
            }

        });

        $("#created_by").change(function () {
            var type = $(this).find(":selected").data("type");
            var created_by = $(this).val();

            if (created_by) {
                if (!isAvailable(created_by)) {
                    checkData(created_by, type, 'paidBy');
                } else {
                    $("#created_by").val('').trigger('change');
                    notify('This Member is already Added in Angler, First Remove from Angler Then Try Again !!',
                        'error');
                }
            } else {
                $('#paidBy_row').empty();
                $('#paidBy_row').removeClass('d-none');
                findAvailableAnglers();
            }
        });

        function isAvailable(id) {
            var member_arr = $("#angler_id").val();
            return member_arr.includes(id);
        }

        $("#add_angler").change(function () {

            var type = $(this).find(":selected").data("type");
            var add_angler = $(this).val();

            checkData(add_angler, type, 'angler');
            var userArr = $("#angler_id").val();
            userArr.push(add_angler);

            $('#angler_id').val(userArr).trigger("change");
        });

        var tournament_type = $("#tournament_type").val();
        var club_member_fee = $("#club_member_fee").val();
        var non_club_member_fee = $("#non_club_member_fee").val();
        var boat_cost = $("#boat_cost").val();

        window.removeData = function (id) {
            loading('show');
            var member_arr = $("#angler_id").val();
            var captainId = $("#captain_id").val();
            var paidId = $("#created_by").val();

            if (id == captainId) {
                $('#captain_row').empty();
                $('#captain_row').removeClass('d-none');
                $("#captain_id").val('').trigger('change');
            } else if (id == paidId) {
                $('#paidBy_row').empty();
                $('#paidBy_row').removeClass('d-none');
                $("#created_by").val('').trigger('change');
            } else {
                $('#row-' + id).remove();
                let updateArr = [];
                $.each(member_arr, function (key, value) {
                    if (value != id) {
                        updateArr.push(value);
                    }
                });
                $("#angler_id").val(updateArr);
                $("#angler_id").trigger('change');
            }
            loading('hide');
            findAvailableAnglers();
            checkFee();
        }

        function checkData(id, type, member_type) {

            var amount = $("#amount").val() ? $("#amount").val() : 0;
            var fee = 0;

            if (tournament_type != 'boat') {
                if (type == "day") {
                    amount = parseFloat(amount) + parseFloat(non_club_member_fee);
                    fee = non_club_member_fee;
                } else {
                    amount = parseFloat(amount) + parseFloat(club_member_fee);
                    fee = club_member_fee;
                }
            } else {
                amount = parseFloat(boat_cost);
                $("#side_total").html(amount);
            }
            $("#amount").val(amount);

            getAnglers(id, fee, member_type);
        }

        function getAnglers(id, fee, member_type) {
            loading('show');
            var captainId = $("#captain_id").val();
            var paidId = $("#created_by").val();
            $.ajax({
                url: BASE_URL + "/member/dashboard/tournaments/get/member",
                method: 'get',
                data: {
                    id: id,
                    fee: fee,
                    memberType: member_type,
                    paidId: paidId,
                },
                dataType: 'json',
                success: function (response) {
                    if (member_type == 'captain') {
                        $('#captain_row').empty();
                        $('#captain_row').removeClass('d-none');
                        $("#captain_row").html(response);
                    } else if (member_type == 'paidBy') {
                        $('#paidBy_row').empty();
                        $('#paidBy_row').removeClass('d-none');
                        $("#paidBy_row").html(response);
                    } else {
                        $('#members_table > tbody').append(response);
                    }
                    loading('hide');
                    checkFee();
                    findAvailableAnglers();
                }
            });
        }

        function findAvailableAnglers() {
            // loading('show');
            var temp_array = $("#angler_id").val();
            var anglers = $("#angler_id").val();
            temp_array.push($("#captain_id").val());
            temp_array.push($("#created_by").val());

            $('#angler_id').val(temp_array);

            temp_array = $("#angler_id").val();
            $('#angler_id').val(anglers);

            $.ajax({
                url: BASE_URL + "/member/dashboard/tournaments/available/member",
                method: 'get',
                data: {
                    angler: temp_array
                },
                dataType: 'json',
                success: function (response) {

                    $('#add_angler').empty();

                    $('#add_angler').append('<option value="">Select One</option>');

                    $.each(response, function (index, value) {
                        $('#add_angler').append('<option value="' + value.id +
                            '" data-type="' + value.subscription.name + '">' + value
                            .user.full_name + '</option>');
                    })
                }
            });
        }

        function checkFee() {
            if (tournament_type != 'boat') {
                var amount = 0;
                $("#members_table tr :input").each(function () {
                    amount = parseFloat(amount) + parseFloat(this.value);
                });

                var captainId = $("#captain_id").val();
                var paidId = $("#created_by").val();

                if (captainId == paidId) {
                    var type = $("#captain_id").find(":selected").data("type");
                    if (type == "day") {
                        amount = parseFloat(amount) - parseFloat(non_club_member_fee);
                    } else {
                        amount = parseFloat(amount) - parseFloat(club_member_fee);
                    }
                }
                $("#amount").val(amount);
                $("#side_total").html(amount);
            }
        }
    });
</script>
@endpush
