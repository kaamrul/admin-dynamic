@extends('admin.layouts.master')
@section('title', 'Page Details')
@section('content')

@php
use App\Library\Helper;
@endphp


<div class="content-wrapper">
    <div class="content-header d-flex justify-content-start">
        {!! \App\Library\Html::linkBack(route('admin.page.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Page Details')) }}</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="border-bottom text-center pb-2">
                        <img src="{{ $page->getImage() }}" alt="profile" class="img-lg rounded-circle mb-3"
                            onclick="clickImage('{{ $page->getImage() }}')">
                        <div class="mb-3">
                            <h3>{{ $page->title }} </h3>
                        </div>

                    </div>

                    <div class="text-center my-4">

                        @if(Helper::hasAuthRolePermission('page_update_status'))
                        <button
                            class="btn btn-sm mr-1 {{ $page->is_active == \App\Library\Enum::STATUS_ACTIVE ? 'btn-secondary' : 'btn2-secondary' }}"
                            onclick="confirmFormModal('{{ route('admin.page.change_status', $page->id) }}', 'Confirmation', 'Are you sure to change status?')">
                            <i class="fas fa-power-off"></i>
                            {{ $page->is_active == \App\Library\Enum::STATUS_ACTIVE ? 'Make Inactive' : 'Make Active' }}
                        </button>
                        @endif

                        @if(Helper::hasAuthRolePermission('page_update'))
                        <a href="{{ route('admin.page.update', $page->id) }}" class="btn btn-sm btn-warning mr-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        @endif

                        @if(Helper::hasAuthRolePermission('page_delete'))
                        <button class="btn btn-sm btn-danger mr-1"
                            onclick="confirmFormModal('{{ route('admin.page.delete', $page->id) }}', 'Confirmation', 'Are you sure you want to delete this record?')"><i
                                class="fas fa-trash-alt"></i> Delete </button>
                        @endif

                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body table-responsive">
                    <table class="table org-data-table table-bordered show-table">
                        <tbody>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <span
                                        class="badge {{ ($page->is_active == \App\Library\Enum::STATUS_ACTIVE) ? "btn2-secondary" : "btn-secondary" }}">
                                        {{ ($page->is_active == \App\Library\Enum::STATUS_ACTIVE) ? "Active" : "Inactive" }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>Slug/Link</td>
                                <td> {{ $page->slug }} </td>
                            </tr>

                            <tr>
                                <td>Operator</td>
                                <td> {{ $page->operator?->full_name }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body py-4">
                    <div class="text-left">
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('admin.assets.preview-image')
@stop

@push('scripts')
<script>
    function clickChangeStatus() {
        $(changeStatusModal).modal('show');
    }
</script>
@endpush
