@if ($sliders->count() > 0)
    <section class="deals-section">
        <div class="container">
            <div>
                <h2 class="text-center mb-5">New Module</h2>
            </div>
            <div class="swiper deals">
                <div class="swiper-wrapper w-100">
                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="w-100">
                                <img src="{{ $slider->getBackgroundImage() }}" class="img-fluid h-100 w-100" alt="deals image">
                            </div>
                            <div class="slider-title">
                                <h5 class="text-start">{{ $slider->title }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif