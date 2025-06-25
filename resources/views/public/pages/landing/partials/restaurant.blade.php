<section id="restaurant" class="restaurant">
        <div class="container" data-aos="fade-up">
            <div class="row gy-5">
                <div class="col-lg-6 col-12">
                    <h2>CLUBHOUSE</h2>
                    <div class="restaurant-box">
                        <div><i style="font-size: 26px; color: #1c3263" class="fa-solid fa-location-dot"></i></div>
                        {{-- <div><img src="{{ Vite::asset(\App\Library\Enum::RESTAURANT_IMAGE_ICON1_PATH) }}" alt=""></div> --}}
                        <div>
                            <h3>ADDRESS</h3>
                            <p>12 The Esplanade Whitianga</p>
                        </div>
                    </div>
                    <div class="restaurant-box">
                        <div><i style="font-size: 26px; color: #1c3263" class="fa-solid fa-clock"></i></div>
                        {{-- <div><img src="{{ Vite::asset(\App\Library\Enum::RESTAURANT_IMAGE_ICON2_PATH) }}" alt=""></div> --}}
                        <div>
                            <h3>OPENING HOURS</h3>
                            <p>Bar open from  3pm  daily<br>Bistro open from 5:30pm daily</p>
                        </div>
                    </div>
                    {{-- <div class="restaurant-box">
                        <div><img src="{{ Vite::asset(\App\Library\Enum::RESTAURANT_IMAGE_ICON3_PATH) }}" alt=""></div>
                        <div>
                            <h3>Urna, tortor tempus</h3>
                            <p>Nullam a lacinia ipsum, nec dignissim purus. Nulla</p>
                        </div>
                    </div> --}}
                    <div>
                        @php
                        $restaurant_menu = App\Models\Document::where('type', 'restaurant_menu')->first()
                        @endphp

                        @if ($restaurant_menu)
                            <a target="_blank" href="{{ asset($restaurant_menu->document) }}"><button class="btn restaurant-btn"><i class="fa-solid fa-burger"></i> {{ $restaurant_menu->title }}<span class="ms-2">
                                <i class="fa-solid fa-arrow-right"></i></span></button></a>
                        @else
                            <a href="#"><button class="btn restaurant-btn"><i class="fa-solid fa-burger"></i>No File Attached</button></a>
                        @endif

                        <a href="/club-house"><button class="btn restaurant-btn">Explore More<span class="ms-2">
                            <i class="fa-solid fa-arrow-right"></i></span></button></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 position-relative">
                    <div>
                        <div class="restaurant-img position-relative">
                            <div><img src="{{ Vite::asset(\App\Library\Enum::RESTAURANT_IMAGE1_PATH) }}" alt=""></div>
                            <div><img src="{{ Vite::asset(\App\Library\Enum::RESTAURANT_IMAGE2_PATH) }}" alt=""></div>
                        </div>
                        <img src="{{ Vite::asset(\App\Library\Enum::RESTAURANT_IMAGE_BG1_PATH) }}" class="blur-img"
                            alt="">
                        <img src="{{ Vite::asset(\App\Library\Enum::RESTAURANT_IMAGE_BG2_PATH) }}" class="square-img"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
