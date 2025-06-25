@extends('public.layout.master')
@section('title', 'Membership Plans')
@section('membership', 'active')

@section('content')

@php
    use App\Library\Enum;
@endphp

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Membership Plans') !!}
    <!-- End Breadcrumbs -->

    <style>
        .tournaments .tournament-card:hover {
            background-color: #F0F7FF
        }
    </style>

    <!-- ======= Membership Section ======= -->
    <section id="membership" class="membership">
        <div class="container" data-aos="fade-up">
            <div class="row g-4" data-aos="zoom-out" data-aos-delay="100">
            <div class="tournaments">
                <div class="tournament-card">
                    @auth
                    <h6>
                        In order to apply or renew your membership online, you must have a current login or create a user profile <strong><a href="/member/dashboard">here</a></strong>. Once you have created a user profile, you will be able to apply for your preferred membership type or select your affiliated club.
                    </h6>
                    @else
                    <h6>
                        In order to apply or renew your membership online, you must have a current login or create a user profile <strong><a href="/login">here</a></strong>. Once you have created a user profile, you will be able to apply for your preferred membership type or select your affiliated club.
                    </h6>
                    @endauth

                    <h4 style="text-align: left; font-size: 24px;">Find out about our membership options below.</h4>
                    <strong>Please note:</strong>
                    <h5><i class="fa-solid fa-angles-right"></i> Membership year is from 1 July to 30 June.</h5>
                    <h5><i class="fa-solid fa-angles-right"></i> New applications for Senior and Family membership will incur a nomination fee of $40 (once off).</h5>
                    <h5><i class="fa-solid fa-angles-right"></i> Late renewals after 20 September will incur a late penalty of $20.</h5>
                    <h5><i class="fa-solid fa-angles-right"></i> Part year applications still incur full membership fees.</h5>
                    <h5 style="display: flex; gap: 4px;">
                        <i class="fa-solid fa-angles-right"></i>
                        <span>You will require the names of two current members of MBGFC to nominate you when you do your online application for membership. Once you select their names, they will receive an email to verify their nomination.</span>
                    </h5>
                </div>
            </div>

                @foreach($subscriptions as $key => $subscription)
                <div class="col-xxl-3 col-lg-4 col-md-6">
                    <div class="membership-item">
                        <h3>{{ ucwords($subscription->name) }}</h3>
                        <div class="icon">
                            <i class="bi bi-box"></i>
                        </div>
                        <h4>{{ formatPrice($subscription->amount) }}<span> /
                                {{ $subscription->name!= 'day' ? 'year' : $subscription->name}}</span></h4>
                        <p class="text-justify">{{ \Illuminate\Support\Str::limit($subscription->short_description, 350, $end = '...') }}</p>
                        <div class="d-flex justify-content-around align-items-center">
                            <div class="text-center"><a href="javascript:void(0)" onclick="showMembershipDetails({{ $subscription->id }})" class="btn details-btn">Details</a></div>
                        @auth
                            
                            
                        @if (
                            auth()->user()->user_type == 'non-club-member' || 
                            auth()->user()->user_type == 'affiliated-club-member'
                        )
                            <div class="text-center"><button onclick="showMembershipBuy('{{ $subscription->name }}')" class="btn buy-btn">Buy Now</button></div>
                        @else
                            <div class="text-center">
                                @if (auth()->user()->member->isJunior() &&
                                    (
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_SENIOR || 
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_INTERMEDIATE || 
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_FAMILY || 
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_DAY
                                    )
                                )
                                    <button disabled class="btn buy-btn">Buy Now</button>
                                    
                                @elseif (
                                    auth()->user()->member->isIntermediate() &&
                                    (
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_SENIOR ||
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_JUNIOR || 
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_FAMILY || 
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_DAY
                                    )
                                )
                                    <button disabled class="btn buy-btn">Buy Now</button>
                                @elseif (
                                    auth()->user()->member->isSenior() &&
                                    (
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_JUNIOR || 
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_INTERMEDIATE || 
                                        $subscription->name == Enum::SUBSCRIPTION_TYPE_DAY 
                                    )
                                )
                                    <button disabled class="btn buy-btn">Buy Now</button>
                                @else
                                    <a href="{{ $subscription->name == Enum::SUBSCRIPTION_TYPE_FAMILY || $subscription->name == Enum::SUBSCRIPTION_TYPE_DAY ? '/subscribe/' . $subscription->id . '/details' : '/subscribe/' . $subscription->id }}" class="btn buy-btn">Buy Now</a>
                                @endif
                            </div>
                        @endif

                        @else
                            <div class="text-center"><a href="{{ route('login') }}" class="btn buy-btn">Buy Now</a></div>
                        @endauth
                        </div>
                    </div>
                </div><!-- End membership Item -->
                @endforeach
            </div>
        </div>
    </section><!-- End Membership Section -->
</main><!-- End #main -->
@include('public.pages.membership.membership_plan.show_modal')
@include('public.pages.membership.membership_plan.buy_membership_plan')
@stop
@push('scripts')
@endpush
