@extends('public.member_dashboard.dashboard_master')
@section('accounts', 'active')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        <h2>Accounts</h2>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-2"> Payment History </h4>
                    </div>
                </div>

                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered  align-middle">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"> SN </th>
                                <th scope="col"> Amount </th>
                                <th scope="col"> Payment Type </th>
                                <th scope="col"> Payment Method </th>
                                <th scope="col"> Date </th>
                                <th scope="col"> Payment Status </th>
                                <th scope="col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payment_history as $key => $payment)
                            <tr class="text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <th scope="row"> {{ ++$key }} </th>
                                <td>{{ formatPrice($payment->total_amount) }}</td>
                                <td>{{ App\Library\Enum::getPaymentType($payment->payment_type) }}</td>
                                <td>{{ \App\Library\Enum::getPaymentMethod($payment->payment_method) }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{!! getPaymentStatusBadge($payment->payment_status) !!}</td>
                                <td class="text-center d-flex justify-content-center">
                                    <div class="dropdown">
                                        <button style="background-color: #1c006a; color: #fff; padding: 6px; font-size: 14px;" class="btn dropdown-toggle" type="button" id="dropdownActiove" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-tools me-1"></i> Action
                                        </button>
                                        <ul style="min-width: 6rem; font-size: 14px;" class="dropdown-menu" aria-labelledby="dropdownActiove">
                                            @if ($payment->payment_status == 'failed')
                                            <a class="dropdown-item" href="{{ route('member.dashboard.account.payment.pay', $payment->payment_tracking) }}">
                                                <i class="fa fa-reply"></i> Pay Again
                                            </a>
                                            @endif
                                            @if ($payment->attempts->count())
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-reply"></i> Details
                                            </a>
                                            @endif
                                            @if ($payment->payment_status != 'failed' && !$payment->attempts->count())
                                            <span class="text-center">N/A</span>
                                            @endif
                                        </ul>
                                      </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!------------ End Div ---------->
    </div>
</div>
@endsection
