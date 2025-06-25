@extends('public.member_dashboard.dashboard_master')
@section('dayMembership', 'active')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        {{-- <h2>Accounts</h2>
        <hr> --}}
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-2"> Day Membership List </h4>
                    </div>
                </div>

                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered  align-middle">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"> SN </th>
                                <th scope="col"> Purchase Date </th>
                                <th scope="col"> Membership Date </th>
                                <th scope="col"> Amount </th>
                                <th scope="col"> Payment Status </th>
                                <th scope="col"> Payment Method </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dayMemberships as $key => $dayMembership)
                            <tr class="text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <th scope="row"> {{ ++$key }} </th>
                                <td>{{ getFormattedDate($dayMembership->created_at) }}</td>
                                <td>{{ getFormattedDate($dayMembership->expired_at) }}</td>
                                <td>{{ formatPrice($dayMembership->subscription->amount) }}</td>
                                <td>{!! getPaymentStatusBadge($dayMembership->singlePayment->payment_status) !!}</td>
                                <td>{{ \App\Library\Enum::getPaymentMethod($dayMembership->singlePayment->payment_method) }}</td>
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
