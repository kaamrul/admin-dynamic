@extends('admin.layouts.master')

@section('title', __('New Page'))

@section('content')
<div class="content-wrapper">

    <div class="content-header d-flex justify-content-start">
        {!! \App\Library\Html::linkBack(route('admin.page.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('New Page')) }}</h4>
        </div>
    </div>

    <div class="card shadow-sm col-md-8">
        <div class="card-body py-sm-4">
            <form method="post" class="form" action="{{ route('admin.page.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="p-sm-3">
                    <div class="form-group row @error('title') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Title') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                placeholder="{{ __('EX: Terms & Condition') }}" required>
                            @error('title')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('slug') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Slug/Link') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                placeholder="{{ __('Ex: terms-condition') }}" required>
                            @error('slug')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('description') error @enderror">
                        <label class="col-sm-3 col-form-label required"
                            for="description">{{ __('Page Content') }}</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="summernote" placeholder="Write Page Description....."
                                name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('image') error @enderror">
                        <label class="col-sm-3 col-form-label">Page Image</label>
                        <div class="col-sm-9">
                            <div class="file-upload-section">
                                <input name="image" type="file" class="form-control d-none" allowed="png,gif,jpeg,jpg">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" readonly
                                        placeholder="Size: 200x200 and max 500kB">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-outline-secondary" type="button"><i
                                                class="fas fa-upload"></i> Browse</button>
                                    </span>
                                </div>
                                @error('image')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                                <div class="display-input-image d-none">
                                    <img src="{{ asset(\App\Library\Enum::NO_IMAGE_PATH) }}" alt="Preview Image" />
                                    <button type="button" class="btn btn-sm btn-outline-danger file-upload-remove"
                                        title="Remove">x</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="modal-footer justify-content-center col-md-12">
                        {!! \App\Library\Html::btnReset() !!}
                        {!! \App\Library\Html::btnSubmit() !!}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@include('admin.assets.summernote-text-editor')
@include('admin.assets.select2')

@push('scripts')
@vite('resources/admin_assets/js/pages/website/page/create.js')
@endpush