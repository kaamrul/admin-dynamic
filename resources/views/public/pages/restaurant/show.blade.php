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

                        <div class="d-flex flex-column flex-md-row gap-lg-4 gap-1">
                            <p>
                                <span tooltip="Start Date"><i class="fa-solid fa-hourglass-start me-2"></i></span>
                                <span>{{ date('D, jS M Y  h:i A', strtotime($tournament->start_date)) }}</span>
                            </p>
                            <p>
                                <span tooltip="End Date"><i class="fa-solid fa-hourglass-end me-2"></i></span>
                                <span>{{ date('D, jS M Y  h:i A', strtotime($tournament->end_date)) }}</span>
                            </p>
                        </div>

                        <p>
                            <span tooltip="Last Entry Date"><i class="fa-solid fa-calendar-check me-2"></i></span>
                            <span>
                                {{ date('D,jS M Y h:i A', strtotime($tournament->last_entry_date)) }}
                            </span>
                        </p>
                        <p>
                            <span tooltip="Tournament Location"><i class="fa-solid fa-location-dot me-2"></i></span>
                            <span>{{ $tournament->address }}</span>
                        </p>
                        @if($tournament->tournament_type == 'boat')
                        <p>
                            <span tooltip="Boat Cost"><i class="fa-solid fa-money-bill-1 me-2"></i></span>
                            <span>{{ $tournament->boat_cost ? formatBoatAmount($tournament) :$tournament->boat_cost }}</span>
                        </p>
                        @else
                        <div class="d-flex flex-column flex-md-row gap-lg-4 gap-1">
                            <p title="Day Member">
                                <span tooltip="Day Member Fee"><i class="fa-solid fa-user-xmark  me-2"></i></span>
                                <span>{{ getFormattedMemberFee($tournament, 'non-club-member') }}</span>
                            </p>
                            <p title="Affiliated Club Member">
                                <span tooltip="Affiliated Club Member Fee"><i class="fa-solid fa-user-check  me-2"></i></span>
                                <span>{{ getFormattedMemberFee($tournament, 'affiliated-club-member')) }}</span>
                            </p>
                            <p title="MBGFC Club Member">
                                <span tooltip="MBGFC Club Member Fee"><i class="fa-solid fa-user-check  me-2"></i></span>
                                <span>{{ getFormattedMemberFee($tournament, 'member')) }}</span>
                            </p>
                        </div>
                        @endif
                        <p>{{ $tournament->short_description }}</p>
                        <p>
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-md btn-success me-2"> Join Now </a>
                            @endguest

                            @auth
                                @if(now() <=  $tournament->end_date)
                                    <a href="javascript:void(0)" onclick="isValidMember({{ $tournament->id }})"
                                        class="btn btn-md btn-success me-2">
                                        Join Now
                                    </a>
                                @else
                                    <a href="javascript:void(0)"
                                        class="btn btn-md btn-danger me-2">
                                        Join Time's Up
                                    </a>
                                @endif
                            @endauth
                        </p>
                    </div>bo
                </div>
            </div>
            <div class="row">
                @if($tournament->description && $tournament->description != '')
                <div class="col-lg-12 mt-5">
                    <h3 class="fw-bold fs-2 mb-4">Description</h3>
                    <p>{!! $tournament->description !!}</p>
                </div>
                @endif

                @if($tournament->rules)
                <div class="col-lg-12 mt-5">
                    <h3 class="fw-bold fs-2 mb-4">Rules</h3>
                    <p>{!! $tournament->rules !!}</p>
                </div>
                @endif
            </div>
        </div>
    </section>
</main><!-- End #main -->

@include('public.pages.tournament.partials.show_modal')
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
                            console.log(data);
                            if (data.status) {
                                $("#member_subscription_id").val(data.member_subscription_id);
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

    </script>

@endpush
