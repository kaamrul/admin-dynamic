<style>
    #hero ul li {
        list-style-type: disc;
    }
</style>

<div id="hero" class="hero-section py-4 sticked-header-offset">
    <div class="hero">
        <div class="container h-100">
            <div class="row gx-5 gy-5 h-100" data-aos="fade-in">
                <div
                    class="p-0 col-lg-6 col-12 position-relative d-flex flex-column justify-content-center text-center text-lg-start">
                    {{-- <h2>Mercury Bay Game Paws on Tour</h2>
                    <p>Each season the club has 12 tournaments. Check out which ones you are interested.</p>
                    <div class="d-flex justify-content-center justify-content-lg-start z-1">
                        <a href="#contact" class="btn btn-get-started">Contact Now</a>
                    </div> --}}

                    <ul>
                        <li>
                            <h6 style="font-size: 22px;"> One of the <a href="/history">oldest</a> game Paws on Tours in NZ.</h6>
                        </li>
                        <li>
                            <h6 style="font-size: 22px;">
                                Regular <a href="/tournaments">tournaments</a> for all ages and skill levels.
                            </h6>
                        </li>
                        <li>
                            <h6 style="font-size: 22px;"> <a href="/membership-plans">Memberships</a> available.</h6>
                        </li>
                        <li>
                            <h6 style="font-size: 22px;">Bar and bistro <a href="/club-house">open</a> every night!</h6>
                        </li>
                    </ul>

                    {{-- <h6 style="font-size: 20px;"> <i style="font-size: 15px;" class="fa-solid fa-circle"></i> One of the <strong><a href="/history">oldest</a></strong> game Paws on Tours in NZ.</h6>
                    <h6 style="font-size: 20px;"> <i style="font-size: 15px;" class="fa-solid fa-circle"></i> Regular <strong><a href="/tournaments">tournaments</a></strong> throughout the year to cater for all ages and skill levels.</h6>
                    <h6 style="font-size: 20px;"> <i style="font-size: 15px;" class="fa-solid fa-circle"></i> <strong><a href="/register">Memberships</a></strong> available.</h6>
                    <h6 style="margin-bottom: 100px; font-size: 18px;"> <i style="font-size: 15px;" class="fa-solid fa-circle"></i> The club bar and bistro are <strong><a href="/club-house">open</a></strong> throughout the week for members to enjoy.</h6> --}}

                    <img src="{{ Vite::asset(\App\Library\Enum::HERO_BG_IMAGE1_PATH) }}"
                        class="position-absolute dot-img w-75" alt="dot bg">
                </div>
                <div class="col-lg-6 col-12">
                    <img src="{{ Vite::asset(\App\Library\Enum::HERO_IMAGE_PATH) }}" class="hero-img " alt="">

                    <img src="{{ Vite::asset(\App\Library\Enum::HERO_BG_IMAGE2_PATH) }}"
                        class="purple-circle position-absolute" alt="">

                    <img src="{{ Vite::asset(\App\Library\Enum::HERO_BG_IMAGE3_PATH) }}"
                        class="yellow-square position-absolute" alt="">


                </div>
            </div>
        </div>
    </div>
</div>
