@extends('public.layout.master')
@section('title', 'Tournament Details')
@section('tournament', 'active')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Tournament Details', route('public.tournament.index'), 'Tournaments') !!}
    <!-- End Breadcrumbs -->

    <section id="tournament-details" class="tournament-details">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-lg-6">
                    <div class="tournament-img">
                        <img src="{{ $tournament->getBannerImage() }}" class="img-fluid rounded-4 h-100 w-100" alt="">
                    </div>
                </div>
                <div class="col-xxl-5 col-lg-6">
                    <div class="details ps-5">
                        <h3 class="fw-bold mb-4">{{ $tournament->tournament_name }}</h3>

                        <p class="fw-bold text-uppercase">
                            <span tooltip="Tournament Type"><i class="fa-solid fa-ship me-2"></i></span>
                            <span>{{ ucwords($tournament->tournament_type) }}</span>
                        </p>

                        {{-- <p class="fw-bold">
                            <span>Tournament</span>
                        </p> --}}

                        <div class="">
                            <p class="mb-1">
                                {{-- <span tooltip="Start Date"><i class="fa-solid fa-hourglass-start me-2"></i></span> --}}
                                <span><i class="fa-solid fa-hourglass-start me-2"></i></span>
                                <span>Tournament Start Date: {{ date('D, jS M Y  h:i A', strtotime($tournament->start_date)) }}</span>
                            </p>
                            <p>
                                {{-- <span tooltip="End Date"><i class="fa-solid fa-hourglass-end me-2"></i></span> --}}
                                <span><i class="fa-solid fa-hourglass-end me-2"></i></span>
                                <span>Tournament End Date: {{ date('D, jS M Y  h:i A', strtotime($tournament->end_date)) }}</span>
                            </p>
                        </div>

                        @if($tournament->entry_open_closed && $tournament->entry_open_date && $tournament->entry_closed_date)
                        {{-- <p class="fw-bold">
                            <span>Entry</span>
                        </p> --}}
                        <div class="">
                            <p class="mb-1">
                                {{-- <span tooltip="Entry Open Date"><i class="fa-solid fa-calendar-check me-2"></i></span> --}}
                                <span><i class="fa-solid fa-hourglass-start me-2"></i></span>
                                <span>
                                    Entry Open Date: {{ date('D,jS M Y h:i A', strtotime($tournament->entry_open_date)) }}
                                </span>
                            </p>
                            <p>
                                {{-- <span tooltip="Entry Closed Date"><i class="fa-solid fa-hourglass-end me-2"></i></span> --}}
                                <span><i class="fa-solid fa-hourglass-end me-2"></i></span>
                                <span>Entry Close Date: {{ date('D, jS M Y  h:i A', strtotime($tournament->entry_closed_date)) }}</span>
                            </p>
                        </div>
                        @endif

                        <p>
                            <span><i class="fa-solid fa-location-dot me-2"></i></span>
                            {{-- <span tooltip="Tournament Location"><i class="fa-solid fa-location-dot me-2"></i></span> --}}
                            <span>Location: {{ $tournament->address }}</span>
                        </p>
                        @if($tournament->tournament_type == 'boat')
                        <p class="mb-1">
                            {{-- <span tooltip="Boat Cost"><i class="fa-solid fa-money-bill-1 me-2"></i></span> --}}
                            <span><i class="fa-solid fa-money-bill-1 me-2"></i></span>
                            @if ($tournament->special_boat_cost)
                                <span>Boat Cost: {{ formatBoatAmount($tournament) }}</span>
                                <del>{{ formatPrice($tournament->boat_cost) }}</del>
                            @else
                                <span>Boat Cost: {{ formatPrice($tournament->boat_cost) }}</span>
                            @endif
                        </p>
                        @else
                        <div class="">
                            <p class="mb-1">
                                {{-- <span tooltip="Day Member Fee"><i class="fa-solid fa-user me-2"></i></span> --}}
                                <span><i class="fa-solid fa-user me-2"></i></span>
                                @if ($tournament->special_non_club_member_fee)
                                    <span>Day Member Fee: {{ formatPrice($tournament->special_non_club_member_fee) }}</span>
                                    <del>{{ formatPrice($tournament->non_club_member_fee) }}</del>
                                @else
                                    <span>Day Member Fee: {{ formatPrice($tournament->non_club_member_fee) }}</span>
                                @endif
                            </p>
                            <p class="mb-1">
                                {{-- <span tooltip="Affiliated Club Member Fee"><i class="fa-solid fa-user me-2"></i></span> --}}
                                <span><i class="fa-solid fa-user me-2"></i></span>
                                @if ($tournament->special_affiliated_club_member_fee)
                                    <span>Affiliated Club Member Fee: {{ formatPrice($tournament->special_affiliated_club_member_fee) }}</span>
                                    <del>{{ formatPrice($tournament->affiliated_club_member_fee) }}</del>
                                @else
                                    <span>Affiliated Club Member Fee: {{ formatPrice($tournament->affiliated_club_member_fee) }}</span>
                                @endif
                            </p>
                            <p class="mb-1">
                                {{-- <span tooltip="MBGFC Club Member Fee"><i class="fa-solid fa-user me-2"></i></span> --}}
                                <span><i class="fa-solid fa-user me-2"></i></span>
                                @if ($tournament->special_club_member_fee)
                                    <span>MBGFC Club Member Fee: {{ formatPrice($tournament->special_club_member_fee) }}</span>
                                    <del>{{ formatPrice($tournament->club_member_fee) }}</del>
                                @else
                                    <span>MBGFC Club Member Fee: {{ formatPrice($tournament->club_member_fee) }}</span>
                                @endif
                            </p>
                        </div>
                        @endif

                        <p class="mt-4">
                            @if($tournament->entry_open_closed && now()->between($tournament->entry_open_date, $tournament->entry_closed_date))
                                @guest
                                <a href="{{ route('login') }}" class="btn btn-md btn-success me-2"> Join Now </a>
                                @endguest

                                @auth
                                    <a href="javascript:void(0)" onclick="isValidMember({{ $tournament->id }})"
                                        class="btn btn-md btn-success me-2">
                                        Join Now
                                    </a>
                                @endauth
                            @endif

                            @if(! empty($tournament->getTermsPdf()))
                                <a target="_blank" href="{{ $tournament->getTermsPdf() }}"
                                    class="btn btn-md btn-success me-2">
                                    Download Tournament Rules
                                </a>
                            @endif
                        </p>

                    </div>
                </div>
            </div>
            <div class="row">
                @if($tournament->short_description && $tournament->short_description != '')
                <div class="col-lg-12 mt-5">
                    <h3 class="fw-bold fs-2 mb-4">Short Description</h3>
                    <p>{{ $tournament->short_description }}</p>
                </div>
                @endif

                @if($tournament->description && $tournament->description != '')
                <div class="col-lg-12 mt-3">
                    <h3 class="fw-bold fs-2 mb-4">Description</h3>
                    <p>{!! $tournament->description !!}</p>
                </div>
                @endif

                @if($tournament->rules)
                <div class="col-lg-12 mt-3">
                    <h3 class="fw-bold fs-2 mb-4">Rules</h3>
                    <p>{!! $tournament->rules !!}</p>
                </div>
                @endif
            </div>
        </div>
    </section>
</main><!-- End #main -->

@include('public.pages.tournament.partials.show_modal')
@include('public.pages.tournament.partials.boat_modal')
@include('public.pages.tournament.partials.show_confirmation_modal')
@stop
@include('admin.assets.select2')

@push('scripts')
    <script type="text/javascript">
        const showSelectTypeModal = "#showSelectTypeModal";
        const showConfirmationModal = "#showConfirmationModal";

        function showAlert(type, msg) {

            if(type == 3){
                $("#errorMsg").html(msg);
                $(showConfirmationModal).modal('show');
            }else{
                notify(msg, 'error');
            }
        }

        function selectJoinType(id) {
            $(showSelectTypeModal).modal('show');
        }


        function isValidMember(tournament_id)
            {
                if (tournament_id) {
                    $.ajax({
                        url: BASE_URL + "/member/dashboard/tournaments/valid-member/" + tournament_id ,
                        type:"GET",

                        success:function (data) {
                            if (data.status) {
                                $("#member_subscription_id").val(data.member_subscription_id);

                                $('#boat').val('')
                                $('#boatRegisterNumber').val('')
                                $('#teamName').val('')
                                $('#teamTerms2').prop('checked', false);

                                $(showSelectTypeModal).modal('show');
                            } else {
                                if(data.day_subscription){
                                    $("#errorMsg").html(data.message);
                                    $(showConfirmationModal).modal('show');
                                }else{
                                    notify(data.message, 'error');
                                }
                            }
                        }
                    })
                } else {
                    notify('Tournament Id Not found', 'error');
                }
            }

        $(document).ready(function () {
            $("#team").select2({
                dropdownParent: $("#showSelectTypeModal"),
                placeholder: "Select Team",
                allowClear: true
            });
            // Add placeholder to the search input
            $('#team').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });
            $("#boat").select2({
                dropdownParent: $("#showSelectTypeModal"),
                placeholder: "Select Boat",
                allowClear: true
            });
            // Add placeholder to the search input
            $('#boat').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });
            $("#skipper").select2({
                dropdownParent: $("#showSelectTypeModal"),
                placeholder: "Select skipper",
                allowClear: true
            });
            // Add placeholder to the search input
            $('#skipper').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });
            $("#captain").select2({
                dropdownParent: $("#showSelectTypeModal"),
                placeholder: "Select captain",
                allowClear: true
            });
            // Add placeholder to the search input
            $('#captain').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });


            $('.team-type-radio').change(function () {

                if ($(this).val() == '1') {
                    $(".existing_team").removeClass('d-none');
                    $(".new_team").addClass('d-none');
                } else if ($(this).val() == '2') {
                    $(".existing_team").addClass('d-none');
                    $(".new_team").removeClass('d-none');
                }
            });
        });

        // $(document).ready(function() {
        //     $('#addBoatBtn').click(function() {
        //         $('#boatNameField').toggleClass('hidden');
        //         $(this).find('i').toggleClass('fa-plus fa-minus');
        //     });
        // });

    </script>

@endpush
