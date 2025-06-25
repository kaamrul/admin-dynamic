@extends('admin.layouts.master')

@section('title', 'Subscribers')

@section('content')

@php
    $user_role = App\Models\User::getAuthUser()->roles()->first();
    $hasPermission = $user_role->hasPermission('role_create');
@endphp

<div class="content-wrapper">

    <div class="content-header d-flex justify-content-between">
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Subscribers' )) }}</h4>
        </div>
    </div>

    <div class="card shadow-sm col-md-10">
        <div class="card-body">

            <table id="dataTable" class="table table-bordered no-footer dtr-inline">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
@include('admin.assets.dt')
@include('admin.assets.dt-buttons')
@include('admin.assets.dt-buttons-export')

@push('scripts')
    @vite('resources/admin_assets/js/pages/website/subscriber/index.js')
@endpush
