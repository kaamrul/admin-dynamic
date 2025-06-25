@php
    $user = App\Models\User::getAuthUser();
@endphp
<div class="row">
    <div class="card col-md-12">
        <div class="card-body d-flex flex-column align-items-center justify-content-center">
            <img src="{{ $user->getAvatar() }}" class="img-fluid border-3" width="30%">
            <h5 class="mt-3"> {{ $user->full_name }} {!! \App\Library\Html::getUserStatusIcon($user->status)!!}</h5>
            <span class="text-secondary">ID: {{ $user->id }} </span>

            @if($user?->member?->currentMemberSubscription)
                <span class="text-secondary text-capitalize">Member Type: {{ $user?->member?->currentMemberSubscription?->subscription?->name }} Club Member </span>
            @else
                <span class="text-secondary text-capitalize">Member Type: {{  \App\Library\ENUM::getUserType($user->user_type) }} </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="info-container d-flex flex-column align-items-center justify-content-center col-md-12 mt-2">

        <div class="info-item @yield('dashboard','')">
            <a href="{{ route('member.dashboard.index') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                <span class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-gauge"></i></span>
                <h4>Dashboard</h4>
            </a>
        </div><!-- End Info Item -->

        {{-- @if (auth()->user()->user_type == \App\Library\ENUM::USER_TYPE_NON_CLUB_MEMBER && \App\Models\Subscription::active()->whereName( \App\Library\ENUM::SUBSCRIPTION_TYPE_DAY)->first())
            <div class="info-item @yield('day-fishing','') ">
                <a href="{{ route('member.dashboard.day.fishing') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                    <span class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-user"></i></span>
                    <h4>Day Fishing</h4>
                </a>
            </div><!-- End Info Item -->
        @endif --}}

        <div class="info-item @yield('profile','') ">
            <a href="{{ route('member.dashboard.profile.index') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                <span class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-user"></i></span>
                <h4>Profile</h4>
            </a>
        </div><!-- End Info Item -->

        <div class="info-item @yield('order','') ">
            <a href="{{ route('member.dashboard.order.index') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                <span class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-user"></i></span>
                <h4>My Orders</h4>
            </a>
        </div>

        <div class="info-item @yield('tournament','') ">
            <a href="{{ route('member.dashboard.tournament.current') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                <span class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-fish"></i></span>
                <h4>Tournaments</h4>
            </a>
        </div><!-- End Info Item -->

        <div class="info-item @yield('catchCard','') ">
            <a href="{{ route('member.dashboard.catchCard.index') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                <span class="d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-scale-unbalanced-flip"></i>
                </span>
                <h4>Catch Cards</h4>
            </a>
        </div><!-- End Info Item -->

        @php
            $subscription = App\Models\Subscription::where('name', App\Library\Enum::SUBSCRIPTION_TYPE_DAY)->first();

            $dayMemberships = App\Models\MemberSubscription::where('member_id', authMemberId())
                ->where('subscription_id', $subscription?->id)
                ->orderBy('id', 'desc')
                ->get();
        @endphp

        @if ($dayMemberships->count() || authUser()->user_type == App\Library\Enum::USER_TYPE_NON_CLUB_MEMBER)
            <div class="info-item @yield('dayMembership','') ">
                <a href="{{ route('member.dashboard.account.dayMembership') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                    <span class="d-flex align-items-center justify-content-center"><i
                        class="fa-solid fa-money-bill-1"></i></span>
                        <h4>Day Membership</h4>
                </a>
            </div>
        @endif

        <div class="info-item @yield('catchCard','') ">
            <a href="{{ route('member.dashboard.account.payment.index') }}" class="info-link d-flex align-items-center gap-lg-4 gap-2">
                <span class="d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-money-bill-1"></i>
                </span>
                <h4>Accounts</h4>
            </a>
        </div><!-- End Info Item -->

        @if(false)
        <div class="info-item @yield('logout','')">
            <a href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="info-link d-flex align-items-center gap-lg-4 gap-2">
                <span class="d-flex align-items-center justify-content-center"><i
                        class="fa-solid fa-right-from-bracket"></i></span>
                <h4>Logout</h4>
            </a>
        </div><!-- End Info Item -->
        @endif
    </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
