@extends('public.layout.master')
@section('title', 'Verify Email')
@section('about', 'active')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('After Verify') !!}
    <!-- End Breadcrumbs -->

    <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-lg-8 my-5 py-3">
            <div class="card shadow-sm">
                <div class="card-body" style="padding: 50px 10px;">
                    <h4 class="text-center text-capitalize">{{ $message }}</h4>
                </div>
            </div>

        </div>
    </div>
    </div>
</main>
@stop

