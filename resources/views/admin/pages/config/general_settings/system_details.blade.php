@extends('admin.pages.config.general_settings.layout.master')

@section('title', 'System Details')

@section('settingsContent')

    <form method="post" action="{{ route('admin.config.general_settings.update') }}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="text-danger">{{$error}}</div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="p-sm-3">

                    <input type="hidden" name="system_details" value="system_details">

                    <div class="form-group row @error('app_title') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('App Title') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="app_title"
                                value="{{ old('app_title') ?? settings('app_title') }}" placeholder="{{ __('App Title') }}" required>
                            @error('app_title')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('version') error @enderror">
                        <label class="col-sm-3 col-form-label">{{ __('Version') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="version"
                                value="{{ old('version') ?? settings('version') }}" placeholder="{{ __('V-1.0.1') }}">
                            @error('version')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('copyright') error @enderror">
                        <label class="col-sm-3 col-form-label"
                            for="name">{{ __('Copyright Text') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="copyright" class="form-control"
                                placeholder="{{ __(' Example Company ') }}"
                                value="{{ old('copyright') ?? settings('copyright') }}">
                            @error('copyright')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row @error('website_url') error @enderror">
                        <label class="col-sm-3 col-form-label">{{ __('Website URL From Admin') }}</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" name="website_url"
                                value="{{ old('website_url') ?? settings('website_url')}}"
                                placeholder="{{ __('Website Url From Admin') }}">
                            @error('website_url')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="modal-footer justify-content-center col-md-12">
                {!! \App\Library\Html::btnReset() !!}
                {!! \App\Library\Html::btnSubmit() !!}
            </div>
        </div>
    </form>

@endsection
