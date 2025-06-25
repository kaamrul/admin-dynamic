@extends('admin.pages.config.general_settings.layout.master')
@section('title', 'Preference')
@section('preference', 'active')

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

                <input type="hidden" name="preference" value="preference">

                <div class="form-group row @error('cancellation_hours') error @enderror">
                    <label class="col-sm-3 col-form-label required">{{ __('Cancellation Hours') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="cancellation_hours"
                            value="{{ old('cancellation_hours') ?? settings('cancellation_hours') }}" placeholder="{{ __('Cancellation Hours') }}" required>
                        @error('cancellation_hours')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-group row @error('session_hours') error @enderror">
                    <label class="col-sm-3 col-form-label required">{{ __('Session Hours') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="session_hours"
                            value="{{ old('session_hours') ?? settings('session_hours') }}" placeholder="{{ __('Session Hours') }}" required>
                        @error('session_hours')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row @error('walk_balance_alert') error @enderror">
                    <label class="col-sm-3 col-form-label required">{{ __('Walk Balance Is Too Low') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="walk_balance_alert"
                            value="{{ old('walk_balance_alert') ?? settings('walk_balance_alert') }}" placeholder="{{ __('Walk Balance Is Too Low') }}" required>
                        @error('walk_balance_alert')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row @error('note_editable_duration') error @enderror">
                    <label class="col-sm-3 col-form-label required">{{ __('Allow Note Edit Within (hours)') }}</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="note_editable_duration"
                            value="{{ old('note_editable_duration') ?? settings('note_editable_duration') }}" placeholder="{{ __('Allow Note Edit Within (hours)') }}" required>
                        @error('note_editable_duration')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row @error('walks_rate') error @enderror">
                    <label class="col-sm-3 col-form-label required">{{ __('Walk Rate') }}</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="walks_rate"
                            value="{{ old('walks_rate') ?? settings('walks_rate') }}" placeholder="{{ __('Walk Rate') }}" required>
                        @error('walks_rate')
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

@stop