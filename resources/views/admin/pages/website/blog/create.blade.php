@extends('admin.layouts.master')

@section('title', __('New Post'))

@section('content')
<div class="content-wrapper">

    <div class="content-header d-flex justify-content-start">
        {!! \App\Library\Html::linkBack(route('admin.blog.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('New Post')) }}</h4>
        </div>
    </div>

    <div class="card shadow-sm col-md-8">
        <div class="card-body py-sm-4">
            <form method="post" class="form" action="{{ route('admin.blog.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="p-sm-3">
                    <div class="form-group row @error('post_type') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Post Type') }}</label>
                        <div class="col-sm-9">
                            <select class="form-control text-capitalize select2" name="post_type" id="category" required>
                                <option value="" class="selected highlighted">Select One</option>
                                @foreach(App\Library\Enum::getPostType() as $key => $value)
                                    <option value="{{ $key }}" {{(old("post_type") == $value) ? "selected" : ""}}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
{{--
                            <select class="form-control text-capitalize select2" name="category" id="category" required>
                                <option value="" class="selected highlighted">Select One</option>
                                @foreach($categories as $key => $value)
                                    <option value="{{ $value }}" {{(old("category") == $value) ? "selected" : ""}}>
                                        {{ $value }}</option>
                                @endforeach
                            </select> --}}
                            @error('post_type')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row @error('title') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Title') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title"
                                value="{{ old('title') }}" placeholder="{{ __('Write Your Blog Title') }}"
                                required>
                            @error('title')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('tags') error @enderror">
                        <label class="col-sm-3 col-form-label">{{ __('Tags') }}</label>
                        <div class="col-sm-9">
                            <select class="form-control text-capitalize select2" name="tags[]" id="tags" multiple>
                                <option value="" class="selected highlighted">Select</option>
                                @foreach($tags as $key => $value)
                                    <option value="{{ $value }}" {{(old("tags") == $value) ? "selected" : ""}}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tags')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('featured_image') error @enderror">
                        <label class="col-sm-3 col-form-label required">Thumbnail</label>
                        <div class="col-sm-9">
                            <div class="file-upload-section">
                                <input name="featured_image" type="file" class="form-control d-none" allowed="png,gif,jpeg,jpg">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" readonly placeholder="Size: 200x200 and max 500kB">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-outline-secondary" type="button"><i class="fas fa-upload"></i> Browse</button>
                                    </span>
                                </div>
                                @error('featured_image')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                                <div class="display-input-image d-none">
                                    <img src="{{ asset(\App\Library\Enum::NO_IMAGE_PATH) }}" alt="Preview Image"/>
                                    <button type="button" class="btn btn-sm btn-outline-danger file-upload-remove" title="Remove">x</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row @error('short_description') error @enderror">
                        <label class="col-sm-3 col-form-label required" for="short_description">{{ __('Short Description') }}</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="short_description" class="form-control"
                                placeholder="{{ __('Write Short Description') }}" rows="4" required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('description') error @enderror">
                        <label class="col-sm-3 col-form-label required" for="description">{{ __('Description') }}</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="summernote" placeholder="Write Blog Description....." name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
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
@vite('resources/admin_assets/js/pages/website/blog/create.js')
@endpush
