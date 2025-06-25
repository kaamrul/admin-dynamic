<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center dropdown-logo">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ settings('logo') ? asset(settings('logo')) : Vite::asset(\App\Library\Enum::LOGO_PATH) }}"
                alt="">
            <!-- <h1>Logo</h1> -->
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="@yield('home','')" href="/">Home</a></li>

                <li class="dropdown"><a class="@yield('about','')" href="#"><span>About</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{ route('public.administration') }}">Administration</a></li>
                        <li><a href="{{ route('public.history') }}">History</a></li>
                        <li><a href="{{ route('public.team.index') }}">Team</a></li>
                        <li><a href="/club_news?type=all">Club News</a></li>
                        <li><a href="{{ route('public.sponsor.index') }}">Sponsors</a></li>
                        {{-- <li><a href="#">Records</a></li> --}}
                    </ul>
                </li>

                <li><a class="@yield('restaurant','')" href="{{ route('public.club_house.index') }}">Club House</a></li>

                <li><a class="@yield('tournament','')" href="{{ route('public.tournament.index') }}">Tournaments</a></li>

                <li><a class="@yield('membership','')" href="{{ route('public.membership_plan.index') }}">Membership</a></li>
{{--
                <li class="dropdown"><a class="@yield('membership','')" href="#"><span>Membership</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @if(! auth()->check())
                        <li><a href="{{ route('register') }}">Become New User</a></li>

                        @endif
                        <li><a href="{{ route('public.membership_plan.index') }}">Subscription</a>
                        </li>
                    </ul>
                </li> --}}

                <li><a class="@yield('store','')" href="{{ route('store.index') }}">Store</a></li>

                @guest
                <li>
                    <a class="@yield('contact','') d-none d-xl-block text-primary" href="{{ route('login') }}">Login</a>
                </li>
                @endguest

                @auth
                <li class="profile-dropdown d-none d-xl-block">

                    <button class="profile-btn d-flex align-items-center justify-content-center overflow-hidden p-0">
                        <i class="fa fa-user"></i>

                    </button>
                    <ul class="profile-list px-4" aria-labelledby="dropdownMenuButton1">
                        <li >
                            <div class="d-flex align-items-center gap-lg-3 gap-2">
                                <div
                                    class="profile-btn d-flex align-items-center justify-content-center overflow-hidden">
                                    <!-- <i class="fa fa-user"></i> -->
                                    <img src="{{ auth()->user()->getAvatar() }}" class="img-fluid h-100" alt="">
                                </div>
                                <div>
                                    <a href="{{ route('member.dashboard.index') }}">
                                        <h6 class="m-0 fw-normal text-wrap ">{{ auth()->user()->full_name }} </h6>
                                    </a>
                                    <!-- <p class="m-0">{{ auth()->user()->email }}</p> -->
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li class="mb-2"><a href="{{ route('member.dashboard.profile.index') }}">Profile</a>
                        </li>

                        {{-- @if(auth()->user()->boats()->count()) --}}
                            <li class="mb-2"><a href="{{ route('member.dashboard.boat.index') }}">My Boat</a></li>
                        {{-- @else
                            <li class="mb-2"><a href="{{ route('member.dashboard.boat.create') }}">Add Boat</a></li>
                        @endif --}}

                        <li class="mb-2"><a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </li>
                @endauth

                @php
                    $map = App\Models\Document::where('type', 'map')->first()
                @endphp

                @if($map)
                    <li>
                        <a style="padding: 0 15px;" class="download-sponsors btn btn-md btn-success text-white" target="_blank" href="{{ asset($map->document) }}">Download Sponsors</a>
                    </li>
                @endif
            </ul>
        </nav><!-- .navbar -->

        <div class="d-flex d-xl-none gap-3 align-items-center">
            @guest<a class="@yield('login','') d-xl-none text-primary" href="{{ route('login') }}">Login</a> @endguest

            @auth
            <div class="profile-dropdown d-xl-none position-relative">
                <button class="profile-btn d-flex align-items-center justify-content-center overflow-hidden p-0">
                    <i class="fa fa-user"></i>
                    <!-- <img src="" class="img-fluid h-100" alt=""> -->
                </button>
                <ul class="profile-list px-4" aria-labelledby="dropdownMenuButton1">
                    <li >
                        <div class="d-flex align-items-center gap-lg-3 gap-2">
                            <div class="profile-btn d-flex align-items-center justify-content-center overflow-hidden">
                                <!-- <i class="fa fa-user"></i> -->
                                <img src="{{ auth()->user()->getAvatar() }}" class="img-fluid h-100" alt="">
                            </div>
                            <div>
                            <a href="{{ route('member.dashboard.index') }}"> <h6 class="m-0 fw-bold ">{{ auth()->user()->full_name }} </h6> </a>
                                <!-- <p class="m-0">{{ auth()->user()->email }}</p> -->
                            </div>
                        </div>
                    </li>
                    <hr>
                    <li class="mb-2"><a href="{{ route('member.dashboard.index') }}">Dashboard</a>
                    <li class="mb-2"><a href="{{ route('member.dashboard.profile.index') }}">Profile</a></li>
                    @if(auth()->user()->boat)
                    <li class="mb-2"><a href="{{ route('member.dashboard.boat.show') }}">Boat Details</a></li>
                    @endif

                        <li class="mb-2"><a href="{{ route('member.dashboard.tournament.current') }}">Tournament</a>
                        <li class="mb-2"><a href="{{ route('member.dashboard.catchCard.index') }}">Catch Card</a>
                        <li class="mb-2"><a href="{{ route('member.dashboard.account.payment.index') }}">Accounts</a>
                    <li class="mb-2"><a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
            @endauth
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </div>
</header><!-- End Header -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
