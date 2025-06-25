@extends('public.member_dashboard.dashboard_master')
@section('accounts', 'active')

@section('member_content')
@php
use App\Library\Helper;
use App\Library\Enum;
@endphp

<div class="row">
    <div class="col-md-12 content-area">
        <h2>Payment Details</h2>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-body table-responsive">

                        <table class="table org-data-table table-bordered show-table">
                            <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <div class="mb-auto">{!! (getPaymentStatusBadge($payment->payment_status)) !!}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Payment Type</td>
                                    <td class="text-capitalize"> {{ App\Library\Enum::getPaymentType($payment->payment_type) }} </td>
                                </tr>

                                @if ($payment->payment_type == 'subscription')
                                <tr>
                                    <td>Subscription Type</td>
                                    <td class="text-capitalize">
                                        {{ $payment->memberSubscriptions[0]->subscription->name }}
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <td>Amount</td>
                                    <td> {{ formatPrice($payment->amount) }} </td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td class="text-capitalize"> {{ \App\Library\Enum::getPaymentMethod($payment->payment_method) }} </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- @if($payment->note)
                <div class="card shadow-sm mt-3">
                    <div class="card-header">
                        <h4 class="card-title"> Note</h4>
                    </div>
                    <div class="card-body py-4">
                        <div class="text-left">
                            {!! $payment->note !!}
                        </div>
                    </div>
                </div>
                @endif --}}
            </div>

            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-body py-4">
                        @if($payment->payment_type == Enum::PAYMENT_TYPE_SUBSCRIPTION)
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Expired Date</th>
                                    <th>Amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment?->memberSubscriptions as $key => $subscribedMember)
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>

                                    <td>{{ $subscribedMember->expired_at }}</td>
                                    <td class="text-capitalize">{{ formatPrice($subscribedMember->subscription->amount) }}</td>

                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                        @else

                        @if ($payment?->team?->teamAnglers)
                        <h4 class="card-title mt-1 text-center">Anglers List</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Age Group</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment?->team?->teamAnglers ?? [] as $key => $angler)
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <img src="{{ $angler->member->user->getAvatar() }}" alt="profile"
                                            class="img-lg rounded mb-3">
                                    </td>
                                    <td>{{ $angler->member->user->full_name }}</td>
                                    <td class="text-capitalize">{{ $angler->member->age_group }}</td>
                                    <td class="text-capitalize">
                                        {{ $payment->team->captain_id == $angler->member_id ? 'Team Captain' : 'Angler'}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
