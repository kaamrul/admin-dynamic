@if(count($news))
<section id="clubNews" class="clubNews">
    <div class="container" ata-aos="zoom-out">

        <div class="row gy-4">
            <div class="section-header text-center">
                <h2>Club News</h2>
            </div>

            @foreach($news as $key => $blog)
            <div class="col-lg-4 col-md-6 col-12 news">
                <article>

                    <a href="{{ route('public.club_news.show', $blog->id)}}">
                        <div class="post-img">
                            <img src="{{ $blog->getFeaturedImage() }}" alt="" class="img-fluid">
                        </div>
                        </a>
                    {{-- <p class="post-category">{{ ucwords($blog->category) }}</p> --}}

                    <h2 class="title">
                        <a href="{{ route('public.club_news.show', $blog->id)}}">{{ $blog->title }}</a>
                    </h2>

                    <div class="d-flex align-items-center">
                        <img src="{{ $blog->operator->getAvatar() }}" alt=""
                            class="img-fluid post-author-img flex-shrink-0">
                        <div class="post-meta">
                            <p class="post-author">{{ $blog->operator->full_name }}</p>
                            <p class="post-date">
                                <time datetime="2022-01-01">{{ $blog->created_at->format('M d, Y')}}</time>
                            </p>
                        </div>
                    </div>

                </article>
            </div>
            @endforeach

        </div>

        @if (count($news))
        <div class="mt-4 mt-lg-5">
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
