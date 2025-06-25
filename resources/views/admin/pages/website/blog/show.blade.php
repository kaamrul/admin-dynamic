@extends('admin.layouts.master')

@section('title', 'Post Details')

@section('content')

@php
use App\Library\Helper;
@endphp


<div class="content-wrapper">
    <div class="content-header d-flex justify-content-start">
        {!! \App\Library\Html::linkBack(route('admin.blog.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Post Details')) }}</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="border-bottom text-center pb-2">
                        <img src="{{ $blog->getFeaturedImage() }}" alt="profile" class="img-lg rounded-circle mb-3"
                        onclick="clickImage('{{ $blog->getFeaturedImage() }}')">
                        <div class="mb-3">
                            <h3>{{ $blog->title }} </h3>
                        </div>
                        <p class="mx-auto mb-2 w-75">{{ $blog->short_description }}</p>
                    </div>

                    <div class="text-center my-4">

                        @if(Helper::hasAuthRolePermission('blog_update_status'))
                            <button class="btn btn-sm mr-1 {{ $blog->is_active == \App\Library\Enum::STATUS_ACTIVE ? 'btn-secondary' : 'btn2-secondary' }}"
                                onclick="confirmFormModal('{{ route('admin.blog.change_status', $blog->id) }}', 'Confirmation', 'Are you sure to change status?')">
                                <i class="fas fa-power-off"></i> {{ $blog->is_active == \App\Library\Enum::STATUS_ACTIVE ? 'Make Inactive' : 'Make Active' }}
                            </button>
                        @endif

                        @if(Helper::hasAuthRolePermission('blog_update'))
                            <a href="{{ route('admin.blog.update', $blog->id) }}" class="btn btn-sm btn-warning mr-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        @endif

                        @if(Helper::hasAuthRolePermission('blog_delete'))
                        <button class="btn btn-sm btn-danger mr-1"
                            onclick="confirmFormModal('{{ route('admin.blog.delete', $blog->id) }}', 'Confirmation', 'Are you sure you want to delete this record?')"><i
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
                                        <span class="badge {{ ($blog->is_active == \App\Library\Enum::STATUS_ACTIVE) ? "btn2-secondary" : "btn-secondary" }}">
                                            {{ ($blog->is_active == \App\Library\Enum::STATUS_ACTIVE) ? "Active" : "Inactive" }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Post Type</td>
                                    <td> {{ $blog->post_type }} </td>
                                </tr>
                                <tr>
                                    <td>Tags</td>
                                    @if ($blog->tags)
                                    <td>
                                        @foreach ($blog->getTags() as $tag)
                                        <span class="badge btn2-secondary m-1">
                                            {{ $tag }}
                                        </span>
                                        @endforeach
                                    </td>
                                    @else
                                    <td> N/A </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Operator</td>
                                    <td> {{ $blog->operator?->full_name }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="card-title">Description</h4>
                </div>
                <div class="card-body py-4">
                    <div class="text-left">

                        {!! $blog->description !!}

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
