@extends('public.member_dashboard.dashboard_master')
@section('profile', 'active')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        <h2>Profile</h2>
        <hr>
        <div class="row d-flex flex-column align-items-center justify-content-center p-4 rounded-4">
            <div class="col-md-8 col-sm-12">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ $user->getAvatar() }}" class="img-fluid rounded-3" width="30%">
                    <h4 class="mt-3 text-center"> {{ $user->full_name }}
                        {!!\App\Library\Html::getUserStatusIcon($user->status)!!}</h4>
                    <span class="text-primary"> {{ $user->email }} </span>

                    <div class="card-body d-flex flex-column flex-xl-row gap-2 mt-3 align-items-center justify-content-center">
                        <a href="{{ route('member.dashboard.profile.update') }}"
                            class="btn btn-md btn-success me-2" >
                            Edit Profile
                        </a>

                        <a href="{{ route('member.dashboard.profile.password.update') }}"
                        class="btn btn-md btn-success me-2" > Update Password </a>

                        <a href="{{ route('member.dashboard.boat.index') }}"
                        class="btn btn-md btn-success me-2" > My Boat </a>

                        @if($user->status == \App\Library\Enum::USER_STATUS_PENDING && isClubMember(authId()))
                        <a href="{{ route('member.dashboard.profile.verify') }}"
                            class="btn btn-md btn-success"> Verify Profile </a>
                        @endif

                        @if($user?->member?->currentSubscription?->name == \App\Library\Enum::SUBSCRIPTION_TYPE_SENIOR)
                            <a href="{{ route('member.dashboard.upgrade.membership.plan') }}"
                                class="btn btn-md btn-success"> Upgrade Membership Plan </a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
        <!------------ End Div ---------->

        <div class="row pt-4">
            <h6>Personal info</h6>
            <hr>
            <div class="col-md-6 card-wrap" data-aos="fade-up">
                <div class="card-body shadow-lg p-4 rounded-4">

                    {{-- <p>
                        <i class="fa-solid fa-user"></i>
                        User Name : <strong> {{ $user->user_name??'N/A' }} </strong>
                    </p> --}}

                    <p>
                        <i class="fa-solid fa-phone"></i>
                        Mobile : <strong> {{ $user->phone??'N/A' }} </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-calendar-days"></i>
                        Date Of Birth : <strong> {{ getFormattedDate($user->dob)??'N/A' }} </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-calendar-days"></i>
                        Age Group : <strong> {{ ucwords($user->member->age_group)??'N/A' }} </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-tags"></i>
                        Subscription Type : <strong> {{ $user?->member?->currentSubscription ? ucwords($user?->member?->currentSubscription?->name) : 'N/A' }}</strong>
                    </p>

                </div>
            </div>

            <div class="col-md-6 card-wrap" data-aos="fade-up">
                <div class="card-body shadow-lg p-4 rounded-4">

                    {{-- <p>
                        <i class="fa-solid fa-id-badge"></i> Ethnicity :
                        <strong> {{ $user->ethnicity??'N/A' }} </strong>
                    </p> --}}
{{--
                    <p>
                        <i class="fa-solid fa-location-dot"></i>
                        Location : <strong> {{ $user->location??'N/A' }} </strong>
                    </p> --}}

                    <p>
                        <i class="fa-solid fa-house"></i> Address :
                        <strong> {{ $user->getFullAddressAttribute() }} </strong>
                    </p>

                    @if(isClubMember(authId()))
                    <p>
                        <i class="fa-solid fa-user-shield"></i> First Nominated By:
                        <strong>
                            @if($user->member->is_nominated)
                            {{ $user->member->nominated->full_name }}
                            @else
                            <i class="fa-solid fa-circle-exclamation text-warning" title="Pending"></i>
                            @endif
                        </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-user-shield"></i> Second Nominated By :
                        <strong>
                            @if($user->member->is_seconded)
                            {{ $user->member->seconded->full_name }}
                            @else
                            <i class="fa-solid fa-circle-exclamation text-warning" title="Pending"></i>
                            @endif
                        </strong>
                    </p>
                    @endif
                </div>
            </div>

        </div>

        <div class="row pt-4">
            <h6>Emergency Contact</h6>
            <hr>
            @if($user?->emergency)
            <div class="col-md-6 card-wrap" data-aos="fade-up">

                <div class="card-body text-center shadow-lg p-4 rounded-4">
                    <img src="{{ $user?->emergency->getImage() }}" class="img-thumbnail border-3 rounded-4" width="20%">
                    <h5 class="mt-3"> {{ $user?->emergency->name }}
                    </h5>

                    <div class="text-center d-flex justify-content-center">
                    <a href="{{ route('member.dashboard.profile.emergency_contact') }}"
                        class="icon-btn btn-warning mb-3 me-2"><i class="fas fa-edit"></i></a>

                    <a class="icon-btn btn-sm btn-danger mb-3"
                        onclick="confirmFormModal('{{ route('member.dashboard.profile.emergency_contact.delete') }}', 'Confirmation', 'Are you sure you want to delete this record?')"><i
                            class="fas fa-trash-alt"></i> </a>
                </div>
                </div>
            </div>

            <div class="col-md-6 card-wrap" data-aos="fade-up">
                <div class="card-body shadow-lg p-4 rounded-4">

                    <p>
                        <i class="fa-solid fa-envelope"></i> Email :
                        <strong> {{ $user?->emergency->email ??'N/A' }} </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-phone"></i> Mobile :
                        <strong> {{ $user?->emergency->mobile_number??'N/A' }} </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-heart"></i>
                        Relationship : <strong> {{ $user?->emergency->relationship??'N/A' }} </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-house"></i> Address :
                        <strong> {{ $user?->emergency->address ?? 'N/A' }} </strong>
                    </p>

                    <p>
                        <i class="fa-solid fa-clipboard"></i> Note:
                        <strong>
                            {{ $user?->emergency->note ? \Illuminate\Support\Str::limit($user?->emergency->note, 45, $end = '...') : 'N/A'}}
                        </strong>
                    </p>

                </div>
            </div>
            @else
            <div class="col-md-12" data-aos="fade-up">
                <div class="card-body text-center shadow-lg p-4 rounded-4">

                    <h5 class="mt-3">No Data</h5>

                    <div class="text-center d-flex justify-content-center">
                    <a href="{{ route('member.dashboard.profile.emergency_contact') }}"
                        class="btn btn-success mb-3 me-2"><i class="fas fa-plus"></i> Add Emergency Contact</a>

                </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
