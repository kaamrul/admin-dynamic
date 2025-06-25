
@extends('admin.layouts.master')
@section('title', __('Employee Notes'))
@section('note', 'active')

@section('content')
<div class="content-wrapper">

    <div class="content-header d-flex justify-content-start">
        {!! \App\Library\Html::linkBack(route('admin.user.employee.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Employee Notes')) }}</h4>
        </div>
    </div>

    <input type="hidden" id="customerId" value="{{ $user->id }}">

    <!-- TabMenu Start -->
    <div class="card shadow-sm">
        @include('admin.pages.user.employee.partials.topbar', ['user', $user])
    </div>
    <!-- TabMenu End -->

    <div class="tab-content mt-4">
        <!-- Home -->
        <div>
            <div class="row">
                <div class="col-xl-5 col-md-12 col-sm-6 col-12 mb-4">
                    @include('admin.pages.user.employee.note.create')
                </div>
            
                <div class="col-xl-7 col-md-12 col-sm-6 col-12 mb-4">
                    @include('admin.pages.user.employee.note.show')
                </div>
            </div>
        </div>
    </div>
</div>

@stop
