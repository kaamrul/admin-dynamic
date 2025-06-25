@if(count($subscriptions))
<section id="membership" class="membership">
    <div class="container">
        <h2>We Offer Different Subscriptions</h2>
        <div class="row g-4 py-lg-5 mt-5 mx-md-5" data-aos="zoom-out" data-aos-delay="100">
            @foreach($subscriptions as $key => $subscription)
                <div class="col-xxl-4 col-lg-4">
                    <div class="membership-item @if($subscription->name == 'family') featured @endif">
                        <h3>{{ ucwords($subscription->name) }}</h3>
                        <div class="icon">
                            <i class="bi bi-box"></i>
                        </div>
                        <h4><sup></sup>{{ formatPrice($subscription->amount) }}<span> /
                                {{ $subscription->name!= 'day' ? 'year' : $subscription->name}}</span></h4>
                        <p class="text-justify">{{ \Illuminate\Support\Str::limit($subscription->short_description, 350, $end = '...') }}</p>
                        <div class="d-flex justify-content-around align-items-center">
                            <div class="text-center"><a href="javascript:void(0)" onclick="showMembershipDetails({{ $subscription->id }})" class="btn details-btn">Details</a></div>
                            @auth
                            <div class="text-center">
                                @if (auth()->user()?->member?->isJunior())
                                    <a href="{{ $subscription->name == App\Library\Enum::SUBSCRIPTION_TYPE_FAMILY || $subscription->name == App\Library\Enum::SUBSCRIPTION_TYPE_DAY ? '/subscribe/' . $subscription->id . '/details' : '/subscribe/' . $subscription->id }}" class="btn buy-btn">Buy Now</a>
                                @elseif (auth()->user()?->member?->isIntermediate() && $subscription->name == App\Library\Enum::SUBSCRIPTION_TYPE_JUNIOR)
                                    <button disabled class="btn buy-btn">Buy Now</button>
                                @elseif (auth()->user()?->member?->isSenior() && ($subscription->name == App\Library\Enum::SUBSCRIPTION_TYPE_JUNIOR || $subscription->name == App\Library\Enum::SUBSCRIPTION_TYPE_INTERMEDIATE))
                                    <button disabled class="btn buy-btn">Buy Now</button>
                                @else
                                    <a href="{{ $subscription->name == App\Library\Enum::SUBSCRIPTION_TYPE_FAMILY || $subscription->name == App\Library\Enum::SUBSCRIPTION_TYPE_DAY ? '/subscribe/' . $subscription->id . '/details' : '/subscribe/' . $subscription->id }}" class="btn buy-btn">Buy Now</a>
                                @endif
                            </div>
                            @else
                                <div class="text-center"><a href="{{ route('login') }}" class="btn buy-btn">Buy Now</a></div>
                            @endauth
                        </div>
                    </div>
                </div><!-- End membership Item -->
            @endforeach

        </div>
        @if (count($subscriptions))
        <div class="mt-lg-5 mt-4">
            <a href="{{ route('public.membership_plan.index') }}">
                <button class="btn membership-btn">Explore More<span class="ms-2">
                        <i class="fa-solid fa-arrow-right"></i></span>
                </button>
            </a>
        </div>
        @endif
    </div>
</section>
@include('public.pages.membership.membership_plan.show_modal')
@endif
