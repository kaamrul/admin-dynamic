@extends('public.layout.master')
@section('title', 'Club News')
@section('about', 'active')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Club News') !!}
    <!-- End Breadcrumbs -->
    <style>
        .clubNews .btn {
            width: 100%;
            background-color: #fff;
            color: #1c3263;
            border: 1px solid #1c3263;
        }

        .clubNews .btn:hover {
            background-color: #1c3263;
            color: #fff;
        }
    </style>
    <!-- ======= Membership Section ======= -->
    <section id="clubNews" class="clubNews">
        <div class="container" data-aos="zoom-up">

            <div class="row gy-4 posts-list">

                <div class="col-2">
                    <a @if (request()->type == 'all') style="background: #1c3263; color: #fff" @endif class="btn btn2-secondary mb-1" href="/club_news?type=all">All</a><br>
                    @foreach ($blogTypes as $key => $postType)
                    <a @if (request()->type == $key) style="background: #1c3263; color: #fff" @endif class="btn btn2-secondary mb-1" href="/club_news?type={{ $key }}">{{ $postType }}</a><br>
                    @endforeach
                </div>

                <div class="col-10">
                    <div class="row">
                        @foreach($blogs as $key => $blog)
                            <div class="col-lg-4 col-md-6 col-12 news mb-4">
                                <article>

                                    <div class="post-img">
                                        <a href="{{ route('public.club_news.show', $blog->id)}}">
                                            <img src="{{ $blog->getFeaturedImage() }}" alt="" class="img-fluid">
                                        </a>
                                    </div>

                                    <p class="post-category">{{ App\Library\Enum::getPostType($blog->post_type) }}</p>

                                    <h2 class="title">
                                        <a href="{{ route('public.club_news.show', $blog->id)}}">{{ $blog->title }}</a>
                                    </h2>

                                    <div class="d-flex align-items-center">
                                        <img src="{{ $blog->operator->getAvatar() }}" alt=""
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
                </div>
            </div>

        </div>
    </section><!-- End Membership Section -->
</main><!-- End #main -->
@stop
@push('scripts')
@endpush
