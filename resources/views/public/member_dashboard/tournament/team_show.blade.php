@extends('public.member_dashboard.dashboard_master')
@section('title', 'Tournament | Team Details')
@section('tournament', 'active')
@section('current', 'active')

@section('member_content')

@php
    use App\Library\Enum;
@endphp

<style>
    .table td {
        padding: 10px !important;
    }
</style>

<div class="row ">
    <div class="col-md-12 content-area pt-3 table-responsive">

        @include('public.member_dashboard.partials.tournament_tab')

        <h2>Team Details</h2>
        <hr>

        <input type="hidden" value="{{ $tournament_team->id }}" id="tournamentTeamId">

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table org-data-table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Team Name</td>
                                    <td>{{$tournament_team->name}}</td>
                                </tr>

                                <tr>
                                    <td>Paid By</td>
                                    <td>{{ $tournament_team?->owner?->user->full_name ?? 'N/A' }}</td>
                                </tr>

                                <tr>
                                    <td>Boat ID</td>
                                    <td>{{ $tournament_team?->boat?->boat_name ?? 'N/A' }}</td>
                                </tr>

                                <tr>
                                    <td>Boat Skipper</td>
                                    <td>{{ $tournament_team->skipper->full_name ?? 'N/A' }}</td>
                                </tr>

                                <tr>
                                    <td>Team Captain</td>
                                    <td>{{ $tournament_team->captain->user->full_name ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4 class="card-title">Tournament Details</h4>
                        </div>
                        <div class="card-body table-responsive m-2">
                            <table class="table org-data-table table-bordered">
                                <tbody>

                                    <tr>
                                        <td>Tournament Name</td>
                                        <td>{{ $tournament_team?->tournament->tournament_name ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Tournament Type</td>
                                        <td>{{ $tournament_team?->tournament->tournament_type ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Last Entry Date</td>
                                        <td>{{ getFormattedDateTime($tournament_team?->tournament->start_date) ?? 'N/A' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Start Date</td>
                                        <td>{{ getFormattedDateTime($tournament_team?->tournament->end_date) ?? 'N/A' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>End Date</td>
                                        <td>{{ getFormattedDateTime($tournament_team?->tournament->last_entry_date) ?? 'N/A' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $tournament_team?->tournament->address ?? 'N/A' }}</td>
                                    </tr>

                                    @if ($tournament_team?->tournament->tournament_type !== 'boat')
                                    <tr>
                                        <td>Club Member Fee</td>
                                        <td>{{ $tournament_team->tournament->club_member_fee ? formatPrice($tournament_team->tournament->club_member_fee) : "N/A" }}</td>
                                    </tr>

                                    <tr>
                                        <td>Affiliated Club Member Fee</td>
                                        <td>{{ $tournament_team->tournament->affiliated_club_member_fee ? formatPrice($tournament_team->tournament->affiliated_club_member_fee) : "N/A" }}</td>
                                    </tr>

                                    <tr>
                                        <td>Day Member Fee</td>
                                        <td>{{ $tournament_team->tournament->non_club_member_fee ? formatPrice($tournament_team->tournament->non_club_member_fee) : "N/A" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Special Club Member Fee</td>
                                        <td>{{ $tournament_team->tournament->special_club_member_fee ? formatPrice($tournament_team->tournament->special_club_member_fee) : "N/A" }}</td>
                                    </tr>

                                    <tr>
                                        <td>Special Affiliated Club Member Fee</td>
                                        <td>{{ $tournament_team->tournament->special_affiliated_club_member_fee ? formatPrice($tournament_team->tournament->special_affiliated_club_member_fee) : "N/A" }}</td>
                                    </tr>

                                    <tr>
                                        <td>Special Day Member Fee</td>
                                        <td>{{ $tournament_team->tournament->special_non_club_member_fee ? formatPrice($tournament_team->tournament->special_non_club_member_fee) : "N/A" }}
                                        </td>
                                    </tr>
                                    @endif

                                    @if ($tournament_team?->tournament->tournament_type == 'boat')
                                    <tr>
                                        <td>Boat Cost</td>
                                        <td>{{ $tournament_team->tournament->boat_cost ? formatPrice($tournament_team->tournament->boat_cost) : "N/A" }}</td>
                                    </tr>

                                    <tr>
                                        <td>Special Boat Cost</td>
                                        <td>{{ $tournament_team->tournament->special_boat_cost ? formatPrice($tournament_team->tournament->special_boat_cost) : "N/A" }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-4">
                <div class="row">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="border-bottom d-flex justify-content-between">

                            <div class="mb-3">
                                <h4 class="text-primary">Team Anglers </h4>
                            </div>

                            <div class="mb-3">
                                <a href="javascript:void(0)" onclick="clickAddAction()" class="btn btn-md btn-success me-2">
                                    Add Angler
                                </a>
                            </div>

                        </div>

                        <table id="dataTable" class="table table-bordered role-data-table">
                            <input type="hidden" id="team_id" value="{{ $tournament_team->id }}">
                            <thead>
                                <tr>
                                    <th>SN.</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    {{-- <th>Age Group</th> --}}
                                    <th>Payment ID</th>
                                    <th>Paid By</th>
                                    {{-- <th>Role</th> --}}
                                    @if ($tournament_team->tournament->tournament_type != 'boat')
                                        <th>Payment Status</th>
                                    @endif
                                    <th>Approval</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $anglers->load('payment.paymentBy') as $key => $angler)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <img src="{{ $angler->member->user->getAvatar() }}" alt="profile"
                                            class="img-lg rounded mb-3">
                                    </td>
                                    <td>{{ $angler->member->user->full_name }} - {{ $angler->member->user_id }}</td>
                                    {{-- <td class="text-capitalize">{{ $angler->member->age_group }}</td> --}}
                                    <td class="text-capitalize">{{ $angler?->payment?->id ?? 'N/A' }}</td>

                                    <td class="text-capitalize">{{ $angler?->payment?->where('team_id', $tournament_team->id)->first()?->paymentBy?->full_name ?? 'N/A' }}</td>
                                    {{-- <td class="text-capitalize">
                                        {{ $tournament_team->captain_id == $angler->member_id ? 'Team Captain' : 'Angler'}}
                                    </td> --}}
                                    @if ($tournament_team->tournament->tournament_type != 'boat')
                                    <td class="text-capitalize"><span class="{{ $angler->payment_status ? 'text-center' : 'text-danger' }}"> {{ $angler->payment_status ? 'Success' : 'Failed' }}</span></td>
                                    @endif
                                    <td>
                                        @if ($angler->payment_status)
                                            @if($angler->status == Enum::TEAM_ANGLER_STATUS_APPROVED)
                                            <span class="icon-btn success me-1" tooltip="Approved"><i
                                                    class="fa-solid fa-circle-check"></i> </span>
                                            @elseif($angler->status == Enum::TEAM_ANGLER_STATUS_PENDING)
                                            <div class="d-flex justify-content-between">
                                                <a href="javascript:void(0)" onclick="confirmFormModal('{{ route('member.dashboard.tournament.member.approve', $angler->id) }}', 'Confirmation', 'Are you sure to Approve This Member?')" class="icon-btn success me-1" tooltip="Approve"><i
                                                        class="fa-solid fa-circle-check"></i></a>
                                                <a href="javascript:void(0)" onclick="confirmFormModal('{{ route('member.dashboard.tournament.member.declined', $angler->id) }}', 'Confirmation', 'Are you sure to Declined This Member?')" class="icon-btn danger" tooltip="Declined"><i
                                                        class="fa-solid fa-circle-xmark"></i></a>
                                            </div>
                                            @endif
                                        @else
                                        <a href="javascript:void(0)" onclick="confirmFormModal('{{ route('member.dashboard.tournament.member.delete', $angler->id) }}', 'Confirmation', 'Are you sure to Declined This Member?')" class="icon-btn danger" tooltip="Declined"><i
                                            class="fa-solid fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

                @php
                    $sweepstakeOrders = $tournament_team->sweepstakeOrders;
                @endphp

                @if ($sweepstakeOrders)
                    <div class="row mt-4">
                        <div class="card shadow-sm">
                            <div class="card-body table-responsive m-2">

                                <div class="border-bottom d-flex justify-content-between">
                                    <div class="mb-3">
                                        <h4 class="text-primary">Sweepstakes Details</h4>
                                    </div>

                                    @php
                                        $ids = $sweepstakeOrders
                                            ->flatMap(fn($order) => $order->OrderDetails->pluck('sweepstake.id'))
                                            ->toArray() ?? [];

                                        $count = $tournament_team?->tournament->sweepstakes->whereNotIn('id', $ids)->count();
                                    @endphp

                                    @if($count > 0)
                                        <div class="mb-3">
                                            <a href="javascript:void(0)" onclick="buySweepstakes()" class="btn btn-md btn-success me-2">
                                                Buy Sweepstakes
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <table class="table org-data-table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class="text-center">Amount</th>
                                            <th>Details</th>
                                            <th>Paid By</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sweepstakeOrders as $order)
                                            @foreach ($order?->OrderDetails as $OrderDetail)
                                                <tr>
                                                    <td>{{ $OrderDetail?->sweepstake?->name }}</td>
                                                    <td class="text-center">{{ getFormattedAmount($OrderDetail?->product_price) }}</td>
                                                    <td>{{ $OrderDetail?->sweepstake?->details }}</td>
                                                    <td>{{ $order->payment?->paymentBy?->full_name ?? 'N/A' }}</td>
                                                    <td class="text-center">{{ getFormattedDate($OrderDetail?->created_at) }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="border-bottom d-flex justify-content-between">

                                <div class="mb-3">
                                    <h5 class="text-primary">Merchandise Details</h5>
                                </div>

                                <div class="mb-3">
                                    <a href="{{ route('member.dashboard.tournament.merchandise', $tournament_team->id) }}" class="btn btn-md btn-success me-2">
                                        Buy Merchandise
                                    </a>
                                </div>

                            </div>

                            <table id="dataTable" class="table table-bordered role-data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Paid By</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Transaction ID</th>
                                        <th>Payment ID</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $merchandise as $key => $item)
                                    <tr>
                                        <td>{{ $item->order_id }}</td>
                                        <td class="text-capitalize">{{ $item->payment?->paymentBy?->full_name }}</td>
                                        <td class="">{{ getFormattedAmount($item->payment?->amount) }}</td>
                                        <td class=""><span class=""> {{ getFormattedDate($item->payment?->created_at) }}</span></td>
                                        <td class="text-capitalize">{{ $item->payment?->transaction_id ?? 'N/A' }}</td>
                                        <td class="text-capitalize">{{ $item->payment?->id }}</td>
                                        <td class=""><a target="_blank" class="text-primary" href="{{ route('member.dashboard.order.order.products', $item->order_id) }}"><i class="fas fa-eye"></i> View </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@include('public.member_dashboard.tournament.modal_create')
@include('public.member_dashboard.tournament.sweepstake_modal')

@include('admin.assets.select2')
@endsection

@push('scripts')
    @vite('resources/public_assets/js/dashboard/buy_sweepstakes.js')
@endpush
