@extends('admin.pages.config.general_settings.layout.master')

@section('title', 'Contact Us')

@section('settingsContent')

    <form method="post" action="{{ route('admin.config.general_settings.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <div class="col-md-12">
                <div class="p-sm-3">
                    <div class="form-group row @error('contact_email') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Contact Email to Send') }}</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="contact_email" value="{{ old('contact_email') ?? settings('contact_email')  }}"
                                placeholder="{{ __('example@example.com') }}" required>
                            @error('contact_email')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="p-sm-3">
                    <div class="form-group row @error('quote_email') error @enderror">
                        <label class="col-sm-3 col-form-label required">{{ __('Free Quote Email to Send') }}</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="quote_email" value="{{ old('quote_email') ?? settings('quote_email')  }}"
                                placeholder="{{ __('example@example.com') }}" required>
                            @error('quote_email')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
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
