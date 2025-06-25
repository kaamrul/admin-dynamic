@extends('public.layout.master')
@section('title', $page->title)

@section('content')

<main id="main">
<!-- ======= Breadcrumbs ======= -->
{!! \App\Library\Html::breadcrumbsSection($page->title) !!}
<!-- End Breadcrumbs -->

@if($page)
<section id="tournaments" class="tournaments px-2">
    <div class="container">
        <div class="row px-xxl-5 gy-lg-5 gx-lg-5 gy-4">
            
            <div class="col-lg-12">
                {!! $page->description !!}
            </div>
            
        </div>
        
    </div>
</section>
@endif
</main><!-- End #main -->
@stop

