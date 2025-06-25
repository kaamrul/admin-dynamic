@extends('public.layout.master')
@section('title', 'Club House')
@section('restaurant', 'active')

@section('content')

<main id="main">
    <!-- Hero Section -->
    <div id="clubHouse-hero" class="clubHouse-hero">
        <div class="heroBg-img w-100 h-100 position-relative"
            style="background-image: url({{ Vite::asset('resources/images/club-house/hero.webp') }}); z-index: 1">
        <div class="bg-color position-absolute top-0 left-0 w-100 h-100" style="background-color: rgba(3, 16, 44, 0.5); z-index: -1"></div>
            <div class="h-100 container-xl d-flex align-items-center">
                <div class="clubHouse-heroText text-white">
                    {{-- <h5>Welcome to Club House</h5> --}}
                    <h1>The Club has been the place to share fishy tales since 1925. Come and tell yours!</h1>
                    {{-- <p>Welcome to our vibrant clubhouse, where memories are made and friendships are forged. Step
                        inside our warm and inviting space, where every visit feels like coming home.</p> --}}
                    <!-- <a href="#" class="d-flex align-items-center gap-3 text-white"><span>Explore Clubhouse
                                Events</span><i class="fa-solid fa-arrow-up-long"></i></a> -->
                </div>
            </div>

            <img loading="lazy" class="bg-dot position-absolute"
                src="{{ Vite::asset('resources/images/club-house/icons/Dots.png') }}" alt="">
        </div>
    </div>

    <section class="px-5 text-center mid-text mx-auto pb-0">
        {{-- <p class="">Immerse yourself in the warm ambiance of our clubhouse, where friendships flourish
            and memories are made. Our welcoming environment is the perfect setting for socializing, relaxing, and
            enjoying life.</p>
    </section> --}}

    <!-- History Section -->
    {{-- <section id="history-section" class="history-section">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-6 position-relative order-2 order-lg-1">
                    <div class="history-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide rounded-5 overflow-hidden"><img loading="lazy"
                                    src="{{ Vite::asset('resources/images/club-house/history.png') }}"
                                    class="history-section-img rounded-5" alt="">
                            </div>
                            <div class="swiper-slide rounded-5 overflow-hidden"><img loading="lazy"
                                    src="{{ Vite::asset('resources/images/club-house/history.png') }}"
                                    class="history-section-img rounded-5" alt="">
                            </div>
                            <div class="swiper-slide rounded-5 overflow-hidden"><img loading="lazy"
                                    src="{{ Vite::asset('resources/images/club-house/history.png') }}"
                                    class="history-section-img rounded-5" alt="">
                            </div>
                            <div class="swiper-slide rounded-5 overflow-hidden"><img loading="lazy"
                                    src="{{ Vite::asset('resources/images/club-house/history.png') }}"
                                    class="history-section-img rounded-5" alt="">
                            </div>
                            <div class="swiper-slide rounded-5 overflow-hidden"><img loading="lazy"
                                    src="{{ Vite::asset('resources/images/club-house/history.png') }}"
                                    class="history-section-img rounded-5" alt="">
                            </div>
                            <div class="swiper-slide rounded-5 overflow-hidden"><img loading="lazy"
                                    src="{{ Vite::asset('resources/images/club-house/history.png') }}"
                                    class="history-section-img rounded-5" alt="">
                            </div>
                            <div class="swiper-slide rounded-5 overflow-hidden"><img loading="lazy"
                                    src="{{ Vite::asset('resources/images/club-house/history.png') }}"
                                    class="history-section-img rounded-5" alt="">
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center">
                    <div>
                        <h3>The History</h3>
                        <p>Delve into the rich history of our clubrooms, steeped in tradition and heritage. From
                            humble beginnings to present- day elegance, our journey reflects the spirit of
                            camaraderie and resilience.</p>
                        <a href="{{ route('public.history') }}"
                            class="d-flex align-items-center gap-3 text-dark"><span>Explore More</span><i
                                class="fa-solid fa-arrow-up-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Opening Section -->
    <section id="opening" class="opening z-1 position-relative">
        <div>
            <div class="container py-5">
                <div class="text-center">
                    <i class="fa-regular fa-clock"></i>
                    <h2>OPENING HOURS</h2>
                </div>

                <div class="openingCard-section mt-4 mt-xl-5">
                    <div class="row gx-5 gy-4">
                        <div class="col-lg-4 col-md-6 col-12" data-aos="fade-right">
                            <div class="opening-card rounded-4 position-relative"
                                style="background-image: url({{ Vite::asset('resources/images/club-house/MBGFC-9.webp') }});">
                                <div class="open-shadow h-100 w-100 rounded-4"></div>
                                <div class="w-100 h-100 d-flex flex-column justify-content-end text-white">
                                    <h3>OFFICE</h3>
                                    <p>9am – 4pm Mon – Fri</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up">
                            <div class="opening-card rounded-4 position-relative"
                                style="background-image: url({{ Vite::asset('resources/images/club-house/MBGFC-75.webp') }});">
                                <div class="open-shadow h-100 w-100 rounded-4"></div>
                                <div class="w-100 h-100 d-flex flex-column justify-content-end text-white">
                                    <h3>BAR</h3>
                                    <p>3pm – close</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12" data-aos="fade-left">
                            <div class="opening-card rounded-4 position-relative"
                                style="background-image: url({{ Vite::asset('resources/images/club-house/MBGFC-7.webp') }});">
                                <div class="open-shadow h-100 w-100 rounded-4"></div>
                                <div class="w-100 h-100 d-flex flex-column justify-content-end text-white">
                                    <h3>RESTAURANT</h3>
                                    <p>5:30pm – close</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img loading="lazy" class="right-circle"
            src="{{ Vite::asset('resources/images/club-house/icons/newsletter circle background.png') }}" alt="">
        <img loading="lazy" class="left-circle"
            src="{{ Vite::asset('resources/images/club-house/icons/newsletter circle background.png') }}" alt="">
    </section>

    <!-- Culinary Section -->
    <section id="culinary" class="culinary pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="culinary-image d-flex flex-column flex-md-row align-items-center gap-xxl-4 gap-3">
                        <div class="culinary-image-left">
                            <img loading="lazy" class="img-fluid h-100 rounded-5"
                                src="{{ Vite::asset('resources/images/club-house/round-plate2.jpg') }}" alt="">
                        </div>
                        <div class="culinary-image-right d-flex flex-column align-items-center gap-xxl-4 gap-3">
                            <img loading="lazy" class="img-fluid rounded-5"
                                src="{{ Vite::asset('resources/images/club-house/fried-vegetables2.jpg') }}" alt="">
                            <img loading="lazy" class="img-fluid rounded-5"
                                src="{{ Vite::asset('resources/images/club-house/restaurant-food2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 mt-4 mt-lg-0" style="    display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <div class="ps-lg-5 culinary-text">
                        <div>
                            <h2>THE HUNGRY MARLIN</h2>
                        </div>
                        <div class="my-xxl-5 my-4">
                            <p>Our restaurant offers something for everyone. Be sure to check out what specials are on!</p>
                            {{-- <p>Steak T-Bone</p>
                            <p>Lobster Bisque</p>
                            <p>Beef Wellington</p>
                            <p>Grilled Salmon</p>
                            <p>Caesar Salad</p>
                            <p>Chicken Parmesan</p>
                            <p>Spaghetti Carbonara</p>
                            <p>Shrimp Scampi</p> --}}
                            {{-- <h3>Discover dining bliss</h3> --}}
                        </div>

                        @php
                            $menu = App\Models\Document::where('type', 'restaurant_menu')->first()
                        @endphp

                        @if(isset($menu->document))
                        <a target="_blank" href="{{ asset($menu->document) }}"
                            class="btn btn-primary rounded-5 fs-6"><span>See Our Menu</span><i
                                class="fa-solid fa-arrow-right ms-4"></i></a>
                        @else
                        <a href="#"
                            class="btn btn-primary rounded-5 fs-6"><span>No File Attached</span><i
                                class="fa-solid fa-arrow-right ms-4"></i></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Night Club Section -->
    <section id="nightClub" class="nightClub">
        <div class="container position-relative" data-aos="fade-up">
            <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/icons/Blue Background Blur.png') }}"
                class="position-absolute start-0 bg-blue" alt="">
            <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/icons/Dots.png') }}" class="bg-dot" alt="">
            <div class="row mt-4">
                <div class="col-12 col-lg-4">
                    <div>
                        <h3>COME AND ENJOY CLUB NIGHTS</h3>
                        <p>Come and enjoy the hospitality of our Thursday club nights, steeped in tradition that reflects our spirit of camaraderie. From raffles, lucky draws and chuck-a-chook, you are sure to find something to make you smile.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-8 mt-4 mt-lg-0">
                    <div class="nightClub-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide rounded-5 overflow-hidden">
                                <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/MBGFC-18.webp') }}"
                                    class="nightClub-img rounded-5" alt="">
                                <h4 class="text-center mt-4">Moments of Joy: Relive the Fun</h4>
                            </div>

                            <div class="swiper-slide rounded-5 overflow-hidden">
                                <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/MBGFC-19.webp') }}"
                                    class="nightClub-img rounded-5" alt="">
                                <h4 class="text-center mt-4">Moments of Joy: Relive the Fun</h4>
                            </div>

                            <div class="swiper-slide rounded-5 overflow-hidden">
                                <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/MBGFC-24.webp') }}"
                                    class="nightClub-img rounded-5" alt="">
                                <h4 class="text-center mt-4">Moments of Joy: Relive the Fun</h4>
                            </div>

                            <div class="swiper-slide rounded-5 overflow-hidden">
                                <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/MBGFC-29.webp') }}"
                                    class="nightClub-img rounded-5" alt="">
                                <h4 class="text-center mt-4">Moments of Joy: Relive the Fun</h4>
                            </div>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Club Ride Section -->
    <section id="clubRide" class="clubRide position-relative">
        <div class="container">
            <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/icons/newsletter circle background.png') }}"
                class="ride-circle" alt="">
            <h2 class="text-center">Need a ride?</h2>
            <div class="row mt-4">
                <div class="col-12 col-lg-4">
                    <div class="h-100 d-flex flex-column justify-content-center">
                        {{-- <p class="fs-5">Travel with ease and convenience using our courtesy coach service, ensuring
                            you arrive and depart safely from our clubhouse. Sit back, relax, and let us take care
                            of your transportation needs.</p> --}}
                            <p>Operating every Thursday</p>
                            <p>Phone +64 0284112845 </p>
                        <div class="d-flex gap-2 justify-content-center justify-content-lg-start mt-2 mt-lg-4">
                            <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/icons/Light Purple Circle.png') }}"
                                class="light-pur" alt="">
                            <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/icons/Light Purple Circle.png') }}"
                                class="light-pur" alt="">
                            <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/icons/Light Purple Circle.png') }}"
                                class="light-pur" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 mt-5 mt-lg-0">
                    <img loading="lazy" src="{{ Vite::asset('resources/images/club-house/DSC0006.jpg') }}" class="clubRide-img" alt="">
                </div>
            </div>
        </div>
    </section>

    @php
        $blogs = App\Models\Post::with('operator')->where('post_type', 'what_on_club')->where('is_featured', 1)->where('is_active', 1)->latest()->limit(3)->get();
    @endphp

    @if (count($blogs))
    <section id="clubNews" class="clubNews">
        <div class="container" data-aos="zoom-up">

            <div class="row gy-4 posts-list">
                <div class="section-header text-center">
                    <h2>What is on at the Club?</h2>
                </div>

                {{-- <h2 class="text-center mb-4"> What is on at the Club?
                    <a style="float: right;" class="btn btn2-primary" href="/club_news?type=what_on_club">Explore More</a>
                </h2> --}}


                @foreach($blogs as $key => $blog)
                    <div class="col-lg-4 col-md-6 col-12 news">
                        <article>

                            <div class="post-img">
                                <img loading="lazy" src="{{ $blog->getFeaturedImage() }}" alt="" class="img-fluid">
                            </div>

                            {{-- <p class="post-category">{{ App\Library\Enum::getPostType($blog->post_type) }}</p> --}}

                            <h2 class="title">
                                <a href="{{ route('public.club_news.show', $blog->id)}}">{{ $blog->title }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img loading="lazy" src="{{ $blog->operator->getAvatar() }}" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">{{ $blog->operator->full_name }}</p>
                                    <p class="post-date">
                                        <time
                                            datetime="2022-01-01">{{ $blog->created_at->format('M d, Y') }}</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>

            @if (count($blogs))
            <div class="mt-4 mt-lg-5" style="float: left">
                <a href="/club_news?type=what_on_club">
                    <button class="btn news-btn">Explore More<span class="ms-2">
                            <i class="fa-solid fa-arrow-right"></i></span>
                    </button>
                </a>
            </div>
            @endif

        </div>
    </section>
    @endif


    @php
        $club_news = App\Models\Post::with('operator')->where('post_type', 'club_news')->where('is_featured', 1)->where('is_active', 1)->latest()->limit(3)->get();
    @endphp
    @if (count($club_news))
    <section id="clubNews" class="clubNews">
        <div class="container" data-aos="zoom-up">

            <div class="row gy-4 posts-list">
                <div class="section-header text-center">
                    <h2>Friday Flash</h2>
                </div>
{{--
                <h2 class="text-center mb-4">Club News

                    <a style="float: right;" class="btn btn2-primary" href="/club_news?type=club_news">Explore More</a>

                </h2> --}}

                @foreach($club_news as $key => $blog)
                    <div class="col-lg-4 col-md-6 col-12 news">
                        <article>

                            <div class="post-img">
                                <img loading="lazy" src="{{ $blog->getFeaturedImage() }}" alt="" class="img-fluid">
                            </div>

                            {{-- <p class="post-category">{{ App\Library\Enum::getPostType($blog->post_type) }}</p> --}}

                            <h2 class="title">
                                <a href="{{ route('public.club_news.show', $blog->id)}}">{{ $blog->title }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img loading="lazy" src="{{ $blog->operator->getAvatar() }}" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">{{ $blog->operator->full_name }}</p>
                                    <p class="post-date">
                                        <time
                                            datetime="2022-01-01">{{ $blog->created_at->format('M d, Y') }}</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>

            @if (count($club_news))
                <div class="mt-4 mt-lg-5" style="float: left">
                    <a href="/club_news?type=club_news">
                        <button class="btn news-btn">Explore More<span class="ms-2">
                                <i class="fa-solid fa-arrow-right"></i></span>
                        </button>
                    </a>
                </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Subscribe Section -->
    <section id="subscribe" class="subscribe">
        <div class="container">
            <div class="subscribe-section">
                <h5>Stay informed about upcoming events and
                    important announcements through our notice
                    space. Whether it s details about the next AGM
                    or special promotions, we ll keep you in the
                    loop.</h5>
                <div>
                    <form class="subscribe-field d-flex align-items-center" method="post" action="{{ route('public.club_house.subscriber.add') }}"
                 enctype="multipart/form-data">
                        @csrf
                        <input type="email" name="email" placeholder="example@gmail.com" required>
                        <button onclick="this.disabled=true; this.form.submit();" type="submit" class="d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        <button id="subscriber_submit" onclick="this.disabled=true; this.form.submit();" class="d-none" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@stop
@push('script')
<script>
function Submit(){
    alert(1);
    }
</script>
@endpush
