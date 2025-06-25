@extends('admin.layouts.master')

@section('title', __('Update Page'))

@section('content')
<div class="content-wrapper">

    <div class="content-header d-flex justify-content-start">
        {!! \App\Library\Html::linkBack(route('admin.page.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Update Page')) }}</h4>
        </div>
    </div>

    <div class="card shadow-sm col-md-8">
        <div class="card-body py-sm-4">
            <form method="post" action="{{ route('admin.page.update', $page->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="p-sm-3">

                    <input type="hidden" name="id" value="{{ $page->id }}">


                    <div class="form-group row @error('title') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Title') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title"
                                value="{{ old('title', $page->title) }}" placeholder="{{ __('Write Your Page Title') }}"
                                required>
                            @error('title')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('slug') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Slug/Link') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="slug" value="{{ old('slug', $page->slug) }}"
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
                            <textarea class="form-control" id="summernote" name="description"
                                required>{{ old('description', $page->description) }}</textarea>
                            @error('description')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('image') error @enderror">
                        <label class="col-sm-3 col-form-label required">Image</label>
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
                                <div class="display-input-image" style="display: {{ $page->image ? '' : 'd-none' }}">
                                    <img src="{{ $page->getImage() }}" alt="Preview Image" />
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
<script>
    $(document).ready(function () {
        var tags = < ? php echo $page - > tags ? > ;
        $('#tags').val(tags).trigger("change");
    });
</script>
@endpush