@extends('admin.layouts.master')

@section('title', settings('app_title') ? settings('app_title') : 'Paws on Tour')

@push('styles')
    <style>
        :root {
            --color-primary: #0e8747;
            --color-deep-primary:#0c7b40;
            --color-secondary: #0d924b;
            --color-deep-secondary: #0b6636;
            --color-light-deep-secondary: #21bd6b;
            --color-light-secondary : #cbffe4;
            --color-light-secondary-trans : #6ddaa220;
            --color-black: #000000;
            --color-white: #FFFFFF;
            --color-red: #FF4747;
            --color-soft-gray: #ededed;
        }
        .background-primary {
            background: var(--color-deep-primary) !important;
        }

        .card .card-body {
            padding: 0 1.25rem 1.25rem;
        }

        .table td {
            font-size: 0.875rem;
        }

        .table th,
        .table td {
            line-height: 0;
            font-weight: 500;
        }

        .br-15 {
            border-radius: 15px;
        }

        .admin-dashboard-card-design {
            cursor: pointer;
            border-radius: 20px;
            box-shadow: 3px 4px 8px var(--color-light-deep-secondary);
            transition: all 0.5s;
        }

        .admin-dashboard-card-design:hover {
            transform: translateY(-2%);
            box-shadow: 0px 0px 10px #00000099, inset 0px 0px 15px var(--color-deep-secondary);
        }

        .input-group {
            position: relative;
            .date-icon {
                z-index: 3;
                color: #fff;
                top: 0.85rem;
                right: 0.65rem;
                cursor: pointer;
                position: absolute;
            }
        }
        .dateRange{
            border-radius: 8px;
            background: var(--color-deep-secondary);
            color: white;
        }
        .title-border {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        ::placeholder {
            color: #fff !important;
            opacity: 0.6 !important;
        }
        .table-row1{
            background-color: #264488;
            color: #fff;
        }
        .table-row2{
            background-color: #6688d6;
            color: #fff;
        }
        .table-row3{
            background-color: #98acda;
            color: black;
        }
        .table-total{
            background-color: #dde1ec;
        }

    </style>
@endpush

@section('content')

@php
    $checkMembershipType = array_sum(array_values($getMembershipType));
@endphp

    <div class="content-wrapper">
        <div class="content-header">

            <div class="text-center" style="margin-top: 15%;">
                <h1>Coming Soon...</h1>
            </div>

            @if(false)
            <div class="row">
                <div class="col-md-8 d-block mb-2">
                    <h4 class="content-title text-blod" style="font-size: 20px; font-weight:900;">DASHBOARD </h4>
                </div>

                <div class="col-md-4 text-right">

                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-between mb-2">
                            <form class="mobile-res">
                                <button type="submit" class="btn btn2-secondary">
                                    Default
                                </button>
                            </form>

                            <form class="mobile-res">
                                <button type="submit" class="btn btn2-secondary">
                                    <input type="hidden" name="last_month" value="1">
                                    Last Month
                                </button>
                            </form>
                        </div>

                        <form enctype='multipart/form-data' id='dateForm'>
                            <div class="form-group">
                                <input type="hidden" name="from" value="">
                                <input type="hidden" name="to" value="">
                            </div>
                        </form>
                        {{--
                        <form class="col-md-6">
                            <div class="input-group with-icon">
                                <input type="text" name="date_range" class="form-control dateRange" id="daterangepickerDashboard" value="{{ $date_range }}"
                                placeholder="{{ inputDateFormat() }} - {{ inputDateFormat() }}" />
                                <i class="date-icon fa-solid fa-calendar-days"></i>
                            </div>
                        </form> --}}

                    </div>

                </div>

            </div>
            @endif

        </div>

        @if(false)
        <div class="row">

            {{-- Member --}}
            <div class="col-lg-4 col-md-3 stretch-card mb-3">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="card-body pt-3">
                        <div class="table-responsive br-15">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-white background-primary">
                                        <th colspan="2" style="font-size: 20px; font-weight: bold;">
                                            Member States
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $totalClient = 0;
                                    @endphp

                                    <tr style="font-size: 15px; font-weight: bold;"
                                    class="table-row1">
                                        <td>Active Members</td>
                                        <td>{{ App\Models\User::active()->where('user_type', 'member')->count() }}</td>
                                    </tr>
                                    <tr style="font-size: 15px; font-weight: bold;"
                                    class="table-row2">
                                        <td>Active Affiliated Members</td>
                                        <td>{{ App\Models\User::active()->where('user_type', 'affiliated-club-member')->count() }}</td>
                                    </tr>
                                    <tr style="font-size: 15px; font-weight: bold;"
                                    class="table-row3">
                                        <td>Active Day Members</td>
                                        <td>{{ App\Models\User::active()->where('user_type', 'non-club-member')->count() }}</td>
                                    </tr>


                                    {{-- @foreach (\App\Library\Enum::getUserStatus() as $key => $value)
                                        <tr style="font-size: 15px; font-weight: bold;"
                                            class="table-{{ \App\Library\Helper::getDashboardColorClass($value) }}">
                                            <td>
                                                {{ \App\Library\Enum::getUserStatus($key) }}
                                            </td>
                                            <td>
                                                {{ isset($member[$key]) ? $member[$key] : 0 }}
                                            </td>
                                        </tr>

                                        @php
                                            $totalClient += isset($member[$key]) ? $member[$key] : 0;
                                        @endphp

                                    @endforeach --}}

                                    {{-- <tr style="font-size: 15px; font-weight: bold;" class="table-total">
                                        <td>
                                            Total
                                        </td>
                                        <td>
                                            {{ $totalClient }}
                                        </td>
                                    </tr> --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Employee --}}
            <div class="col-lg-4 col-md-3 stretch-card mb-3">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="card-body pt-3">
                        <div class="table-responsive br-15">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-white background-primary">
                                        <th colspan="2" style="font-size: 20px; font-weight: bold;">
                                            Employee
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $totalEmployee = 0;
                                    @endphp

                                    @foreach (\App\Library\Enum::getUserStatus() as $key => $value)

                                        <tr style="font-size: 15px; font-weight: bold;"
                                            class="table-{{ \App\Library\Helper::getDashboardColorClass($value) }}">
                                            <td>
                                                {{ \App\Library\Enum::getUserStatus($key) }}
                                            </td>
                                            <td>
                                                {{ isset($employee[$key]) ? $employee[$key] : 0 }}
                                            </td>
                                        </tr>

                                        @php
                                            $totalEmployee += isset($employee[$key]) ? $employee[$key] : 0;
                                        @endphp

                                    @endforeach

                                    <tr style="font-size: 15px; font-weight: bold;" class="table-total">
                                        <td>
                                            Total
                                        </td>
                                        <td>
                                            {{ $totalEmployee }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Referral --}}


            <div class="col-lg-4 col-md-3 stretch-card mb-3">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="card-body pt-3">
                        <div class="table-responsive br-15">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-white background-primary">
                                        <th colspan="2" style="font-size: 20px; font-weight: bold;">
                                            Tournament
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tournaments as $key => $value)
                                        <tr style="font-size: 15px; font-weight: bold;"
                                            class="table-{{ \App\Library\Helper::getDashboardColorClass($key) }}">
                                            <td>
                                                {{ $key }}
                                            </td>
                                            <td>
                                                {{ $value ?? 0 }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Ticket --}}
            <div class="col-lg-3 col-md-3 stretch-card mb-3 d-none">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="card-body pt-3">
                        <div class="table-responsive br-15">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-white background-primary">
                                        <th colspan="2" style="font-size: 20px; font-weight: bold;">
                                            Ticket Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Library\Enum::getTicketStatus() as $key => $value)

                                        @if ($key == \App\Library\Enum::TICKET_STATUS_NEW)

                                            <tr style="font-size: 15px; font-weight: bold;"
                                                class="table-{{ \App\Library\Helper::getColorClass($value) }}">
                                                <td>
                                                    {{ \App\Library\Enum::getTicketStatus($key) }}
                                                </td>
                                                <td>
                                                    {{ isset($ticket[$key]) ? $ticket[$key] : 0 }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    @foreach (\App\Library\Enum::getTicketStatus() as $key => $value)

                                        @if ($key == \App\Library\Enum::TICKET_STATUS_NEW)
                                            @continue
                                        @endif

                                        <tr style="font-size: 15px; font-weight: bold;"
                                            class="table-{{ \App\Library\Helper::getColorClass($value) }}">
                                            <td>
                                                {{ \App\Library\Enum::getTicketStatus($key) }}
                                            </td>
                                            <td>
                                                {{ isset($ticket[$key]) ? $ticket[$key] : 0 }}
                                            </td>
                                        </tr>
                                    @endforeach

                                    {{-- <tr style="font-size: 15px; font-weight: bold;" class="table-danger">
                                        <td>
                                            Total
                                        </td>
                                        <td>
                                            {{ $totalTicket }}
                                        </td>
                                    </tr> --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- All Charts --}}
        <div class="row">

            <div class="col-lg-3 col-md-3 stretch-card">
                <div class="card admin-dashboard-card-design mt-2 mb-2 ">
                    <div class="client-card-title d-block text-center text-white background-primary pb-3 title-border">
                        <span><b>Membership Type Chart</b></span>
                    </div>

                    @if ($checkMembershipType)
                        <div id="membershipTypeChart" style="width: 100%; padding:0px 10px"></div>
                    @else
                        <div style="text-align: center; padding:20%; color:red">
                            <b>No data found!</b>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-md-3 stretch-card">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="client-card-title d-block text-center text-white background-primary pb-3 title-border">
                        <span><b>Membership Paid vs Due Chart</b></span>
                    </div>

                    @if ($paidOrDueFiltered)
                        <div id="memberPaidOrDueChart" style="width: 100%;"></div>
                    @else
                        <div style="text-align: center; padding:20%; color:red">
                            <b>No data found!</b>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-md-3 stretch-card">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="client-card-title d-block text-center text-white background-primary pb-3 title-border">
                        <span><b>Active Member vs Tournament Participation Chart</b></span>
                    </div>

                    @if ($memberVsTournamentFiltered)
                        <div id="membershipVsParticipationChart" style="width: 100%;"></div>
                    @else
                        <div style="text-align: center; padding:20%; color:red">
                            <b>No data found!</b>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-md-3 stretch-card">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="client-card-title d-block text-center text-white background-primary pb-3 title-border">
                        <span><b>Boat Type Chart</b></span>
                    </div>

                    @if ($boatsFiltered)
                        <div id="boatTypeChart" style="width: 100%;"></div>
                    @else
                        <div style="text-align: center; padding:20%; color:red">
                            <b>No data found!</b>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 stretch-card mt-4">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="client-card-title d-block text-center text-white background-primary pb-3 title-border">
                        <span><b>Angler Leader Board</b></span>
                    </div>
                    <div class="table-responsive" style="border-bottom-left-radius: 20px; border-bottom-right-radius:20px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>MID</th>
                                    {{-- <th>User Name</th> --}}
                                    <th>Name</th>
                                    <th>Total No. of Catch</th>
                                    <th>Total Weight (kg)</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($individualLeadership as $index => $individualLeader)
                                <tr>
                                    <td>{{ $individualLeader?->member?->user?->id ?? 'N/A' }}</td>
                                    {{-- <td>{{ $individualLeader?->member?->user?->user_name ?? 'N/A' }}</td> --}}
                                    <td>{{ $individualLeader?->member?->user?->full_name ?? 'N/A' }}</td>
                                    <td>{{ $individualLeader->totalCatch }}</td>
                                    <td>{{ $individualLeader->fishWeight }}</td>
                                    <td>{{ $individualLeader->total_score }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 stretch-card mt-4">
                <div class="card admin-dashboard-card-design mt-2 mb-2">
                    <div class="client-card-title d-block text-center text-white background-primary pb-3 title-border">
                        <span><b>Boat Leader Board</b></span>
                    </div>
                    <div class="table-responsive" style="border-bottom-left-radius: 20px; border-bottom-right-radius:20px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tournament Name</th>
                                    <th>Tournament Type</th>
                                    <th>Total No. of Catch</th>
                                    <th>Total Weight (kg)</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($tournamentLeadership as $index => $tournamentLeader)
                                    <tr>
                                        <td>{{ $tournamentLeader->tournament_id ?? 'N/A' }}</td>
                                        <td>{{ $tournamentLeader?->tournament?->tournament_name ?? 'N/A' }}</td>
                                        <td>{{ $tournamentLeader?->tournament?->tournament_type ?? 'N/A' }}</td>
                                        <td>{{ $tournamentLeader->totalCatch }}</td>
                                        <td>{{ $tournamentLeader->fishWeight }}</td>
                                        <td>{{ $tournamentLeader->total_score }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        @endif

    </div>
@stop

@include('admin.assets.chart')
@include('admin.assets.date-range-picker')


@push('scripts')
    <script type="text/javascript">

        // Start Date Range picker & submit from
        $(function() {
            var options = {};
            options.opens = 'left',
            options.locale = {
                format: inputDateFormat,
                separator: ' - ',
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
                firstDay: 1
            }

            $('#daterangepickerDashboard').daterangepicker(options, function(start, end, label) {
                $('#dateForm').find('input[name="from"]').val(start.format('YYYY-MM-DD'));
                $('#dateForm').find('input[name="to"]').val(end.format('YYYY-MM-DD'));

                $('#dateForm').submit();
            });

            // Date range value clear
            // $('#daterangepickerDashboard').val("");
            $('#daterangepickerDashboard').on('cancel.daterangepickerDashboard', function(ev, picker) {
                $('#daterangepickerDashboard').val("");
            });

        });
        // End Date Range picker

        // Membership Pie Chart
        @if ($checkMembershipType)
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawNotes);

            function drawNotes() {
                var data = google.visualization.arrayToDataTable([
                    ['Membership Type', 'Total'],

                    @foreach ($getMembershipType as $key => $datas)
                        [
                            '{{ ucwords($key) }}', {{ $datas }}
                        ],
                    @endforeach
                ]);

                var options = {
                    chartArea: {
                        width: '85%',
                        height: '80%',
                    },
                    animation: {
                        startup: true,
                        duration: 2000,
                        easing: 'out',
                    },
                    is3D: true,
                    pieHole: 0.4,
                    height: 400,
                    backgroundColor: 'transparent',
                    legend: {
                        position: 'bottom',
                        alignment: 'center'
                    },
                    slices: {
                        0: {
                            color: '#98acda',
                            offset: 0.02
                        },
                        1: {
                            color: '#6688d6',
                            offset: 0.02
                        },
                        2: {
                            color: '#1c3263',
                            offset: 0.02
                        },
                        3: {
                            color: '#dde1ec',
                            offset: 0.02
                        },
                    },
                };

                var chart = new google.visualization.PieChart(document.getElementById('membershipTypeChart'));

                google.visualization.events.addListener(chart, 'select', function() {
                    var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var sliceLabel = data.getValue(selectedItem.row, 0);
                        redirectToMemberURL(sliceLabel);
                    }
                });

                chart.draw(data, options);
            };

            function redirectToMemberURL(sliceLabel) {
                var urls = {
                    @foreach ($getMembershipType as $key => $datas)
                        '{{ ucwords($key) }}': "members/all?type={{ $key }}",
                    @endforeach
                };

                // Open the corresponding URL in a new tab
                if (urls[sliceLabel]) {
                    window.open(urls[sliceLabel], '_blank');
                }
            }

        @endif

        // Membership Paid vs Due Pie Chart

        @if ($paidOrDueFiltered)
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawPaidOrDuePieChart);

            function drawPaidOrDuePieChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Paid', 'Due'],

                    @foreach ($memberships as $key => $datas)
                        [
                            '{{ $key }}', {{ $datas }}
                        ],
                    @endforeach
                ]);

                var options = {
                    chartArea: {
                        left: 0,
                        right: 0,
                        top: 20,
                        bottom: 70,
                        width: '100%',
                    },
                    pieHole: 0.4,
                    height: 400,
                    is3D: true,
                    backgroundColor: 'transparent',
                    legend: {
                        position: 'bottom',
                        alignment: 'center'
                    },
                    pieSliceText: 'value',
                    slices: {
                        0: {
                            color: '#1c3263',
                            offset: 0.03
                        },
                        1: {
                            color: '#6688d6'
                        }
                    },
                };

                var chart = new google.visualization.PieChart(document.getElementById('memberPaidOrDueChart'));

                google.visualization.events.addListener(chart, 'select', function() {
                    var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var sliceLabel = data.getValue(selectedItem.row, 0);
                        redirectToDueReportURL(sliceLabel);
                    }
                });

                chart.draw(data, options);
            };

            function redirectToDueReportURL(sliceLabel) {
                var urls = {
                    @foreach ($memberships as $key => $datas)
                        '{{ ucwords($key) }}': "report/due?type={{ strtolower($key) }}",
                    @endforeach
                };

                if (urls[sliceLabel]) {
                    window.open(urls[sliceLabel], '_blank');
                }
            }
        @endif


        // Active Membership vs Tournament Participation Pie Chart
        @if ($memberVsTournamentFiltered)
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawUserReferralComparisonChart);

            function drawUserReferralComparisonChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Active Membership', 'Tournament Participation'],

                    @foreach ($getMemberVsTournament as $key => $datas)
                        [
                            '{{ $key }}', {{ $datas }}
                        ],
                    @endforeach
                ]);

                var options = {
                    chartArea: {
                        left: 0,
                        right: 0,
                        top: 20,
                        bottom: 70,
                        width: '100%',
                    },
                    // pieHole: 0.4,
                    height: 400,
                    backgroundColor: 'transparent',
                    legend: {
                        position: 'bottom',
                        alignment: 'center'
                    },
                    is3D: true,
                    pieSliceText: 'value',
                    slices: {
                        0: {
                            color: '#6688d6',
                            offset: 0.05
                        },
                        1: {
                            color: '#1c3263'
                        }
                    },
                };

                var chart = new google.visualization.PieChart(document.getElementById('membershipVsParticipationChart'));

                google.visualization.events.addListener(chart, 'select', function() {
                    var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var sliceLabel = data.getValue(selectedItem.row, 0);
                        redirectToChart3URL(sliceLabel);
                    }
                });

                chart.draw(data, options);
            };

            function redirectToChart3URL(sliceLabel) {
                var urls = {
                    @foreach ($getMemberVsTournament as $key => $value)
                        @if ($key == 'Active Membership')
                            '{{ $key }}': "members/all?type=active",
                        @else
                            '{{ $key }}': "members/all?type=tournaments",
                        @endif
                    @endforeach
                };

                if (urls[sliceLabel]) {
                    window.open(urls[sliceLabel], '_blank');
                }
            }
        @endif


        // Boats Type Pie Chart
        @if ($boatsFiltered)
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawBoatTypeChart);

            function drawBoatTypeChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Boat Type', 'Total'],

                    @foreach ($getBoats as $key => $datas)
                        [
                            '{{ ucwords($key) }}', {{ $datas }}
                        ],
                    @endforeach
                ]);

                var options = {
                    chartArea: {
                        left: 0,
                        right: 0,
                        top: 20,
                        bottom: 70,
                        width: '100%',
                    },
                    pieHole: 0.4,
                    height: 400,
                    backgroundColor: 'transparent',
                    legend: {
                        position: 'bottom',
                        alignment: 'center'
                    },
                    // is3D: true,
                    pieSliceText: 'value',
                    slices: {
                        0: {
                            color: '#6688d6',
                            offset: 0.01
                        },
                        1: {
                            color: '#1c3263'
                        }
                    },
                };

                var chart = new google.visualization.PieChart(document.getElementById('boatTypeChart'));

                google.visualization.events.addListener(chart, 'select', function() {
                    var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var sliceLabel = data.getValue(selectedItem.row, 0);
                        redirectToBoatURL(sliceLabel);
                    }
                });

                chart.draw(data, options);
            };

            function redirectToBoatURL(sliceLabel) {
                var urls = {
                    @foreach ($getBoats as $key => $value)
                        '{{ ucwords($key) }}': "boats?type={{ $key }}",
                    @endforeach
                };

                if (urls[sliceLabel]) {
                    window.open(urls[sliceLabel], '_blank');
                }
            }
        @endif

    </script>
@endpush
