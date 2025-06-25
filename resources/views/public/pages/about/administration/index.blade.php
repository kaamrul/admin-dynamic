@extends('public.layout.master')
@section('title', 'Administration')
@section('about', 'active')

@section('content')
<main id="main">

    {!! \App\Library\Html::breadcrumbsSection('Administration') !!}

    <section id="tournaments" class="tournaments px-2">
        <div class="container">
            <h2>Administration</h2>
            <div class="row mt-3 px-xxl-5 gy-lg-5 gx-lg-5 gy-4">
                <div class="col-lg-6">
                    <div class="tournament-card d-flex align-items-center justify-content-between">
                        <div style="height: 100px;">
                            <div class="hr"></div>
                            @php
                                $constitution = App\Models\Document::where('type', 'constitution')->first()
                            @endphp
                            @if ($constitution)
                                <a target="_blank" href="{{ asset($constitution->document) }}">
                                    <h3 style="font-size: 22px">{{ $constitution->title }}</h3>
                                </a>
                            @else
                                <a href="#">
                                    <h3 style="font-size: 22px">No File Attached</h3>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="tournament-card d-flex align-items-center justify-content-between">

                        <div style="height: 100px;">
                            <div class="hr"></div>
                            @php
                                $code_of_conduct = App\Models\Document::where('type', 'code_of_conduct')->first()
                            @endphp
                            @if ($code_of_conduct)
                                <a target="_blank" href="{{ asset($code_of_conduct->document) }}">
                                    <h3 style="font-size: 22px">{{ $code_of_conduct->title }}</h3>
                                </a>
                            @else
                                <a href="#">
                                    <h3 style="font-size: 22px">No File Attached</h3>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="tournament-card d-flex align-items-center justify-content-between">
                        <div style="height: 100px;">
                            <div class="hr"></div>
                            @php
                                $dispute_resolution_policy = App\Models\Document::where('type', 'dispute_resolution_policy')->first()
                            @endphp
                            @if ($dispute_resolution_policy)
                                <a target="_blank" href="{{ asset($dispute_resolution_policy->document) }}">
                                    <h3 style="font-size: 22px">{{ $dispute_resolution_policy->title }}</h3>
                                </a>
                            @else
                                <a href="#">
                                    <h3 style="font-size: 22px">No File Attached</h3>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="tournament-card d-flex align-items-center justify-content-between">
                        <div style="height: 100px;">
                            <div class="hr"></div>
                            @php
                                $privacy_policy = App\Models\Document::where('type', 'privacy_policy')->first()
                            @endphp
                            @if ($privacy_policy)
                                <a target="_blank" href="{{ asset($privacy_policy->document) }}">
                                    <h3 style="font-size: 22px">{{ $privacy_policy->title }}</h3>
                                </a>
                            @else
                                <a href="#">
                                    <h3 style="font-size: 22px">No File Attached</h3>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- @include('public.pages.landing.partials.weather') --}}


    <section id="weather" class="weather">
        <div class="container" data-aos="zoom-out">
            <div class="row gy-4">
                <div class="col-lg-3 col-12">
                    <div class="mt-md-5 text-center text-md-start">
                        <h2>Fishing today?</h2>
                        <p>Don't forget to check the rules.</p>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row ps-lg-5 gy-4 text-center">
                        <div class="col-md-4">
                            @php
                                $rule = App\Models\Document::where('type', 'club_fishing_rules')->first()
                            @endphp

                            @if ($rule)
                            <a href="{{ asset($rule->document) }}" target="_blank">
                                <div class="weather-img">
                                    <img style="height: 162px; width: 162px" src="{{ Vite::asset(\App\Library\Enum::LOGO_PATH) }}" alt="">
                                </div>
                            </a>
                            @else
                            <a href="https://www.ashfieldangling.com/fishing_rules.php">
                                <div class="weather-img">
                                    <img style="height: 162px; width: 162px" src="{{ Vite::asset(\App\Library\Enum::LOGO_PATH) }}" alt="">
                                </div>
                            </a>
                            @endif

                            <h3>Club Fishing Rules</h3>
                        </div>
                        <div class="col-md-4">
                            <a href="https://www.nzsportfishing.co.nz/wp-content/uploads/2019/02/NZSFC-Fishing-Rules-and-Regulations-September-2018.pdf" target="_blank">
                                <div class="weather-img">
                                    <img style="height: 162px; width: 162px" src="https://igfa.org/wp-content/uploads/2018/04/logo_IGFA_512.png" alt="">
                                </div>
                            </a>
                            <h3>NZSFC Fishing Rules</h3>
                        </div>
                        <div class="col-md-4">
                            <a href="https://igfa.org/international-angling-rules/?gad_source=1&gclid=Cj0KCQjw28W2BhC7ARIsAPerrcLk9zRxVF2B22nQ4x0OyMTKYmEXs1rNmiico2-AhUavbkvq9X0PIQwaAk_pEALw_wcB" target="_blank">
                                <div class="weather-img">
                                    <img style="height: 162px; width: 162px" src="https://www.nzsportfishing.co.nz/wp-content/themes/nzsfc/images/logo.svg" alt="">
                                </div>
                            </a>
                            <h3>IGFA Rules</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="weather" class="weather">
        <div class="container" data-aos="zoom-out">
            <div class="row gy-4">
                <div class="col-lg-3 col-12">
                    <div class="mt-md-5 text-center text-md-start">
                        <h2>Notices to Members</h2>
                        {{-- <p>Don't forget to check the rules.</p> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row ps-lg-5 gy-4 text-center">
                        <div class="col-md-4 tournaments">
                            @php
                                $financial_reports_2023 = App\Models\Document::where('type', 'financial_reports_2023')->first()
                            @endphp

                            @if ($financial_reports_2023)
                            {{-- <a href="{{ asset($financial_reports_2023->document) }}" target="_blank">
                                <div class="weather-img">
                                    <img style="height: 162px; width: 162px" src="{{ asset('assets/pdf.png') }}" alt="">
                                </div>
                            </a>
                            <h3>{{ $financial_reports_2023->title }}</h3> --}}
                            <div style="padding: 40px;" class="tournament-card d-flex align-items-center justify-content-between">
                                <div  style="height: 140px; text-align: left;">
                                    <div class="hr"></div>
                                        <a target="_blank" href="{{ asset($financial_reports_2023->document) }}">
                                            <h3 style="font-size: 18px;">{{ $financial_reports_2023->title }}</h3>
                                        </a>
                                </div>
                            </div>

                            @else
                            <div style="padding: 40px;" class="tournament-card d-flex align-items-center justify-content-between">
                                <div style="height: 140px; text-align: left;">
                                    <div class="hr"></div>
                                        <a href="#">
                                            <h3 style="font-size: 18px;">No File Attached</h3>
                                        </a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4 tournaments">
                            @php
                                $agm_and_prizegiving_2023 = App\Models\Document::where('type', 'agm_and_prizegiving_2023')->first()
                            @endphp
                            @if ($agm_and_prizegiving_2023)
                            {{-- <a href="{{ asset($agm_and_prizegiving_2023->document) }}" target="_blank">
                                <div class="weather-img">
                                    <img style="height: 162px; width: 162px" src="{{ asset('assets/pdf.png') }}" alt="">
                                </div>
                            </a>
                            <h3>{{ $agm_and_prizegiving_2023->title }}</h3> --}}
                            <div style="padding: 40px;" class="tournament-card d-flex align-items-center justify-content-between">
                                <div  style="height: 140px; text-align: left;">
                                    <div class="hr"></div>
                                        <a target="_blank" href="{{ asset($agm_and_prizegiving_2023->document) }}">
                                            <h3 style="font-size: 18px;">{{ $agm_and_prizegiving_2023->title }}</h3>
                                        </a>
                                </div>
                            </div>
                            @else
                            <div style="padding: 40px;" class="tournament-card d-flex align-items-center justify-content-between">
                                <div  style="height: 140px; text-align: left;">
                                    <div class="hr"></div>
                                        <a href="#">
                                            <h3 style="font-size: 18px;">No File Attached</h3>
                                        </a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4 tournaments">
                            @php
                                $proposal_to_changes_to_constitution = App\Models\Document::where('type', 'proposal_to_changes_to_constitution')->first()
                            @endphp
                            @if ($proposal_to_changes_to_constitution)
                            {{-- <a href="{{ asset($proposal_to_changes_to_constitution->document) }}" target="_blank">
                                <div class="weather-img">
                                    <img style="height: 162px; width: 162px" src="{{ asset('assets/pdf.png') }}" alt="">
                                </div>
                            </a>
                            <h3>{{ $proposal_to_changes_to_constitution->title }}</h3> --}}
                            <div style="padding: 40px;" class="tournament-card d-flex align-items-center justify-content-between">
                                <div  style="height: 140px; text-align: left;">
                                    <div class="hr"></div>
                                        <a target="_blank" href="{{ asset($proposal_to_changes_to_constitution->document) }}">
                                            <h3 style="font-size: 18px;">{{ $proposal_to_changes_to_constitution->title }}</h3>
                                        </a>
                                </div>
                            </div>
                            @else
                            <div style="padding: 40px;" class="tournament-card d-flex align-items-center justify-content-between">
                                <div  style="height: 140px; text-align: left;">
                                    <div class="hr"></div>
                                        <a href="#">
                                            <h3 style="font-size: 18px;">No File Attached</h3>
                                        </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@stop
