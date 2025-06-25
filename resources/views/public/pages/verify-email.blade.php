@extends('public.layout.master')
@section('title', 'Verify Email')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Verify Email') !!}
    <!-- End Breadcrumbs -->

    <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8 my-5 py-3">
            <form method="post" action="{{ route('public.store.verify.email', ['member' => $member->id, 'type' => $type]) }}">
                @csrf

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2>Verify Your Email Address</h2>
                    </div>
                    <div class="card-body" style="padding: 50px 10px;">
                        <h4 class="text-center">Are you sure to verify your email?</h4>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-danger" onclick="window.close();">Close</button>
                            <button type="submit" class="btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
    </div>
</main>
@stop


