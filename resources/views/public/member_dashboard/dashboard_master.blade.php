@extends('public.layout.master')

@section('title', 'Dashboard')

@section('content')
<section id="dashboard" class="dashboard mt-3">
    <div class="container-fluid" style="padding: 0 60px;">

        @if(auth()->user()->status != App\Library\Enum::USER_STATUS_ACTIVE && isClubMember(authId()))
            {!!\App\Library\Html::getUserStatusAlert(auth()->user()->status)!!}
        @endif

        <div class="row gx-lg-0 gy-4">

            <div class="col-lg-3 px-4 d-none d-xl-block">
                @include('public.member_dashboard.partials.sidebar')
            </div>

            <div class="col-lg-9">
                @yield('member_content')
            </div><!-- End Contact Form -->
        </div>
    </div>
</section>
@stop

@push('scripts')

@endpush
