@if(count($sponsors))
<style>
    .sponsors .sponsor-card img
    {
        height: 100px;
    }
</style>
<section id="clients" class="clients">
    <div class="container" data-aos="zoom-out">

        <div class="row mb-4">
            <div class="col-3">
                @php
            $map = App\Models\Document::where('type', 'map')->first()
            @endphp
            @if ($map)
                <a class="btn btn2-secondary" target="_blank" href="{{ asset($map->document) }}">{{ $map->title }}</a>
            @else
                <a class="btn btn2-secondary" href="#">No File Attached</a>
            @endif
            </div>
        </div>

        <div class="row gy-4 mb-3">
            <div class="col-lg-3 col-12" style="margin: auto;">
                <h2>Our Sponsors</h2>
            </div>
            <div class="col-lg-9 col-12">
                <div id="sponsors" class="sponsors">
                    <div class="container px-4 px-lg-0">
                        <div class="row gy-4">
                            @foreach($sponsors as $key => $sponsor)
                            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-6" onclick="showSponsorDetails({{ $sponsor->id }})">
                                <div class="sponsor-card d-flex justify-content-between align-items-center gap-md-2 gap-4 rounded-2">
                                    <div>
                                        <img width="100" height="100" src="{{ $sponsor->getImage() }}" class="img-fluid" alt="">
                                    </div>
                                    <div style="width: 80%;">
                                        <h4 class="m-0">{{ $sponsor->name }}</h4>
                                        <p class="m-0">{{ $sponsor->website }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach($sponsors as $key => $sponsor)
                        <div class="swiper-slide" onclick="showSponsorDetails({{ $sponsor->id }})">
                            <img src="{{ $sponsor->getImage() }}" class="img-fluid" alt="">
                        </div>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>

        @if (count($sponsors))
            <div class="mt-4 mt-lg-5">
                <a href="/sponsors">
                    <button class="btn news-btn">Explore More<span class="ms-2">
                            <i class="fa-solid fa-arrow-right"></i></span>
                    </button>
                </a>
            </div>
        @endif

        <div class="row" style="margin-top: 40px">
            <h3 style="text-align: center; color: #1c3263; padding: 0 100px;">Many thanks to all our wonderful Sponsors. We value your support and we encourage all of our members to support you in return!</h3>
        </div>
    </div>
</section>
@endif
@include('public.pages.about.sponsor.show_modal')
