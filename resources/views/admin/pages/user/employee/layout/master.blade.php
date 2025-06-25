@extends('admin.layouts.master')

@section('title', 'Employee Details')

@section('content')

@php
    use App\Library\Helper;
    $user_role = App\Models\User::getAuthUserRole();
@endphp

<div class="content-wrapper">
    <div class="content-header d-flex justify-content-start">
        {!! \App\Library\Html::linkBack(route('admin.user.employee.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Employee Details')) }}</h4>
        </div>
    </div>

    <input type="hidden" value="{{ $user->id }}" id="employeeId">

    <div class="card shadow-sm">
        @include('admin.pages.user.employee.partials.topbar', ['user', $user])
    </div>

    <div class="tab-content mt-4">
        <!-- Home -->
        <div class="row">

            @include('admin.pages.user.employee.partials.sidebar')

            <!----------------- SideBar Content -------------------->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body py-4">
                        <div class="tab-content tab-content-vertical">

                            <div class="tab-pane fade show active">
                                @yield('employeeContent')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!----------------- End SideBar Content -------------------->

        </div>

    </div>
</div>

<common-update-password></common-update-password>
@include('admin.pages.user.common.update_user_status_modal', ['user', $user->user])
@include('admin.assets.preview-image')

@stop

@include('admin.assets.dt')
@include('admin.assets.dt-buttons')
@include('admin.assets.dt-buttons-export')

@push('scripts')
    @vite('resources/admin_assets/js/pages/user/employee/show.js')
@endpush


@push('styles')
    <style>
        .count {
            top: -3px !important;
        }

        .nav-link i {
            width: 25px;
        }
    </style>
@endpush
