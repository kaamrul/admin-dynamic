@extends('admin.layouts.master')

@section('title', 'General Settings')

@section('content')

<div class="content-wrapper">

    <div class="content-header d-flex justify-content-between">
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('General Settings' )) }}</h4>
        </div>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="post" action="{{ route('admin.config.general.settings.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-sm-3">

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

                            <div class="form-group row @error('phone') error @enderror">
                                <label class="col-sm-3 col-form-label required">{{ __('Mobile No') }}</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <select name="country_code" class="input-group-text text-secondary"
                                                required>
                                                @foreach($countries as $key => $country)
                                                <option value="{{ old('country_code', $country['code']) }}"
                                                    {{($key == 'NZ' || $country['code'] == (explode('-', settings('phone')))[0] ) ? "selected" : ""}}>{{$key}} {{ $country['code']}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="tel" name="phone" value="{{old('phone') ?? ((strpos(settings('phone'), '-') == true) ? (explode('-', settings('phone')))[1] : settings('phone')) }}" class="form-control"
                                            placeholder="{{ __('013 355 666') }}" required>
                                    </div>
                                    @error('phone')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('state') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('State') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="state" value="{{ old('state') ?? settings('state') }}"
                                        placeholder="{{ __('State') }}">
                                    @error('state')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('city') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('City') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" value="{{ old('city') ?? settings('city') }}"
                                        placeholder="{{ __('City') }}">
                                    @error('city')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('country') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('Country') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="country" value="{{ old('country') ?? settings('country') }}"
                                        placeholder="{{ __('Country') }}">
                                    @error('country')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('address') error @enderror">
                                <label class="col-sm-3 col-form-label" for="name">{{ __('Address') }}</label>
                                <div class="col-sm-9">
                                    <textarea type="text" name="address" class="form-control"
                                        placeholder="{{ __('Type Address') }}" rows="4">{{ old('address') ?? settings('address') }}</textarea>
                                    @error('address')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('zip_code') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('Zip Code') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="zip_code"
                                        value="{{ old('zip_code') ?? settings('zip_code')}}" placeholder="{{ __('Zip Code') }}">
                                    @error('zip_code')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('logo') error @enderror">
                                <label class="col-sm-3 col-form-label required">Logo</label>
                                <div class="col-sm-9">
                                    <div class="file-upload-section">
                                        <input name="logo" type="file" class="form-control d-none"
                                            allowed="png,gif,jpeg,jpg">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled=""
                                                readonly placeholder="Size: 300x50 and max 500kB">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-outline-secondary"
                                                    type="button"><i class="fas fa-upload"></i> Browse</button>
                                            </span>
                                        </div>
                                        @error('logo')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror

                                        <div class="display-input-image">
                                            <img src="{{ settings('logo') ? asset(settings('logo')) : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
                                                alt="Preview Image" />
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger file-upload-remove ml-3"
                                                title="Remove">x</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="p-sm-3 col-sm-12">

                                <div class="form-group row @error('email') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Email') }}</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') ?? settings('email')  }}"
                                            placeholder="{{ __('example@example.com') }}" required>
                                        @error('email')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                @if(false)
                                <div class="form-group row @error('ticket_email') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Ticket Notify Email') }}</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="ticket_email" value="{{ old('ticket_email') ?? settings('ticket_email')  }}"
                                            placeholder="{{ __('Ticket create notification send to this email. (example@example.com)') }}" required>
                                        @error('ticket_email')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                @endif

                                <div class="form-group row @error('copyright') error @enderror">
                                    <label class="col-sm-3 col-form-label required"
                                        for="name">{{ __('Copyright Text') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="copyright" class="form-control"
                                            placeholder="{{ __(' Example Company ') }}"
                                            value="{{ old('copyright') ?? settings('copyright') }}" required>
                                        @error('copyright')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row @error('copyright_url') error @enderror">
                                    <label class="col-sm-3 col-form-label required"
                                        for="name">{{ __('Copyright Url') }}</label>
                                    <div class="col-sm-9">
                                        <input type="url" name="copyright_url" class="form-control"
                                            placeholder="{{ __('www.example.com') }}"
                                            value="{{ old('copyright_url') ?? settings('copyright_url') }}" required>
                                        @error('copyright_url')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row @error('version') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Version') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="version"
                                            value="{{ old('version') ?? settings('version') }}" placeholder="{{ __('V-1.0.1') }}" required>
                                        @error('version')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row @error('date_format') error @enderror">
                                    <label class="col-sm-3 col-form-label required" for="name">{{ __('Date Format') }}</label>
                                    <div class="col-sm-9">
                                        <select class="select form-control" name="date_format"
                                            style="width: 100%;" required>

                                            <option value="" selected disabled>Select One</option>
                                            <option value="DD-MM-YYYY" {{ old('date_format', settings('date_format')) == 'DD-MM-YYYY' ? "selected" : "" }}
                                                data-params="DD-MM-YYYY"> {{ __('DD-MM-YYYY') }} </option>
                                            <option value="MM-DD-YYYY" {{ old('date_format', settings('date_format')) == 'MM-DD-YYYY' ? "selected" : "" }}
                                                data-params="MM-DD-YYYY"> {{ __('MM-DD-YYYY') }} </option>
                                            <option value="YYYY-MM-DD" {{ old('date_format', settings('date_format')) == 'YYYY-MM-DD' ? "selected" : "" }}
                                                data-params="YYYY-MM-DD"> {{ __('YYYY-MM-DD') }} </option>
                                            <option value="YYYY-DD-MM" {{ old('date_format', settings('date_format')) == 'YYYY-DD-MM' ? "selected" : "" }}
                                                data-params="YYYY-DD-MM"> {{ __('YYYY-DD-MM') }} </option>

                                            <option value="DD/MM/YYYY" {{ old('date_format', settings('date_format')) == 'DD/MM/YYYY' ? "selected" : "" }}
                                                data-params="DD/MM/YYYY"> {{ __('DD/MM/YYYY') }} </option>
                                            <option value="MM/DD/YYYY" {{ old('date_format', settings('date_format')) == 'MM/DD/YYYY' ? "selected" : "" }}
                                                data-params="MM/DD/YYYY"> {{ __('MM/DD/YYYY') }} </option>
                                            <option value="YYYY/MM/DD" {{ old('date_format', settings('date_format')) == 'YYYY/MM/DD' ? "selected" : "" }}
                                                data-params="YYYY/MM/DD"> {{ __('YYYY/MM/DD') }} </option>
                                            <option value="YYYY/DD/MM" {{ old('date_format', settings('date_format')) == 'YYYY/DD/MM' ? "selected" : "" }}
                                                data-params="YYYY/DD/MM"> {{ __('YYYY/DD/MM') }} </option>

                                        </select>
                                        @error('date_format')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row @error('time_format') error @enderror">
                                    <label class="col-sm-3 col-form-label required" for="name">{{ __('Time Format') }}</label>
                                    <div class="col-sm-9">

                                        <div class="d-inline-flex justify-content-start">
                                            <div class="form-check form-check-secondary mr-5">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input user-type-radio"
                                                        name="time_format" value="24h" required
                                                        {{ (!old('time_format') || old('time_format', settings('time_format')) == '24h') ? 'checked' : '' }}>
                                                    24h
                                                    <i class="input-helper"></i></label>
                                            </div>

                                            <div class="form-check form-check-secondary ">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input user-type-radio"
                                                        name="time_format" value="12h" required
                                                        {{ old('time_format', settings('time_format')) == '12h' ? 'checked' : '' }}>
                                                    12h
                                                    <i class="input-helper"></i></label>
                                            </div>

                                            @error('time_format')
                                            <p class="error-message text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                @if(false)
                                    <div class="form-group row @error('currency_name') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('Currency Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="currency_name"
                                                value="{{ old('currency_name') ?? settings('currency_name') }}" placeholder="{{ __('Currency Name') }}">
                                            @error('currency_name')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row @error('currency_symbol') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('Currency Symbol') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="currency_symbol"
                                                value="{{ old('currency_symbol') ?? settings('currency_symbol') }}"
                                                placeholder="{{ __('Currency Symbol') }}">
                                            @error('address')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row @error('favicon') error @enderror">
                                    <label class="col-sm-3 col-form-label required">Favicon</label>
                                    <div class="col-sm-9">
                                        <div class="file-upload-section">
                                            <input name="favicon" type="file" class="form-control d-none"
                                                allowed="png,gif,jpeg,jpg,JPEG">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    readonly placeholder="Size: 32X32 and max 500kB">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-outline-secondary"
                                                        type="button"><i class="fas fa-upload"></i> Browse</button>
                                                </span>
                                            </div>
                                            @error('favicon')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                            <div class="display-input-image">
                                                <img src="{{ settings('favicon') ? asset(settings('favicon')) : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
                                                    alt="Preview Image" />
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger file-upload-remove ml-3"
                                                    title="Remove">x</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row @error('og_image') error @enderror">
                                    <label class="col-sm-3 col-form-label">OG Image</label>
                                    <div class="col-sm-9">
                                        <div class="file-upload-section">
                                            <input name="og_image" type="file" class="form-control d-none"
                                                allowed="png,gif,jpeg,jpg">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    readonly placeholder="Size: 200x200 and max 500kB">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-outline-secondary"
                                                        type="button"><i class="fas fa-upload"></i> Browse</button>
                                                </span>
                                            </div>
                                            @error('og_image')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                            <div class="display-input-image">
                                                <img src="{{ settings('og_image') ? asset(settings('og_image')) : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
                                                    alt="Preview Image" />
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger file-upload-remove ml-3"
                                                    title="Remove">x</button>
                                            </div>
                                        </div>
                                    </div>
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
        </div>
    </div>
</div>
@stop

@push('scripts')

@endpush
