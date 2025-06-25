@extends('admin.layouts.master')

@section('title', __('Update Employee'))

@section('content')
<div class="content-wrapper">

    <div class="content-header d-flex justify-content-start">
    {!! \App\Library\Html::linkBack(route('admin.user.employee.index')) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Update Employee')) }}</h4>
        </div>
    </div>


    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach

    <div class="card shadow-sm">
        <div class="card-body py-sm-4">
            <form method="post" action="{{ route('admin.user.employee.update', $user->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="p-sm-3">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">{{ __('Name') }}</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-12 col-sm-12">
                                            <div class="form-group @error('first_name') error @enderror">
                                                <input type="text" class="form-control" id="fname"
                                                    value="{{ old('first_name', $user->first_name) }}" name="first_name"
                                                    placeholder="{{ __('First Name') }}" required>

                                                <span class="error-message text-danger"
                                                    id="error-fname"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12 col-sm-12">
                                            <div class="form-group @error('last_name') error @enderror">
                                                <input type="text" class="form-control"
                                                    name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                                    id="lname" placeholder="{{ __('Last Name') }}"
                                                    required>

                                                <span class="error-message text-danger"
                                                    id="error-lname"></span>
                                            </div>
                                        </div>
                                    </div>

                                    @error('first_name')
                                        <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror

                                    @error('last_name')
                                        <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row @error('email') error @enderror">
                                <label class="col-sm-3 col-form-label required">{{ __('Email') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="{{ __('Email') }}" required>
                                    @error('email')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('phone') error @enderror">
                                <label class="col-sm-3 col-form-label required">{{ __('Phone') }}</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        {{-- <div class="input-group-prepend">
                                            <select name="user[country_code]"
                                                class="input-group-text text-secondary" required>
                                                @foreach ($countries as $key => $country)
                                                    <option
                                                        value="{{ old('user.country_code', $country['code']) }}"
                                                        {{ $key == 'NZ' ? 'selected' : '' }}>
                                                        {{ $key }}
                                                        {{ $country['code'] }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <input type="number" name="phone" id="phone"
                                            value="{{ old('phone', $user->phone) }}" class="form-control"
                                            placeholder="{{ __('013 355 666') }}" required>
                                    </div>
                                    @error('phone')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    <span class="error-message text-danger" id="error-phone"></span>
                                </div>
                            </div>
                            
                            <div class="form-group row @error('gender') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('Gender') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="gender" id="gender">
                                        <option value="" class="selected highlighted">Select One</option>
                                        @foreach($genders as $gender)
                                            <option class="text-capitalize" value="{{ $gender }}" {{ (old("gender", $user->gender) == $gender) ? "selected" : "" }}>
                                                {{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row @error('designation') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('Designation') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="designation" id="designation">
                                        <option value="" class="selected highlighted">Select One</option>
                                        @foreach($designations as $designation)
                                            <option class="text-capitalize" value="{{ $designation }}" {{ (old("designation", $user->designation) == $designation) ? "selected" : "" }}>
                                                {{ $designation }}</option>
                                        @endforeach
                                    </select>
                                    @error('designation')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row @error('territory_id') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('Territory') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="territory_id" id="territoryId">
                                        <option value="" class="selected highlighted">Select One</option>
                                        @foreach($territories as $territory)
                                            <option class="text-capitalize" value="{{ $territory->id }}" {{ (old("territory_id", $user->territory_id) == $territory->id) ? "selected" : "" }}>
                                                {{ $territory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('territory_id')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-sm-3">
                            
                            <div class="form-group row @error('van_id') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('Van') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="van_id[]" id="vanId" multiple>
                                        {{-- <option value="" class="selected highlighted">Select One</option> --}}
                                        @foreach($vans as $van)
                                            <option class="text-capitalize" value="{{ $van->id }}" 
                                                {{ in_array($van->id, old('van_id', $user->vans->pluck('van_id')->toArray())) ? 'selected' : '' }}
                                            >
                                                {{ $van->reg_number }}</option>
                                        @endforeach
                                    </select>
                                    @error('van_id')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('driving_license') error @enderror">
                                <label class="col-sm-3 col-form-label">{{ __('Driving License') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="driving_license"
                                        value="{{ old('driving_license', $user->driving_license) }}" placeholder="{{ __('Driving License') }}">
                                    @error('driving_license')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Address') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group @error('street_address') error @enderror">
                                        <input type="text" class="form-control" id="street_address"
                                            value="{{ old('street_address', $user?->address?->street_address) }}" name="street_address"
                                            placeholder="{{ __('Address ') }}">

                                        <span class="error-message text-danger"
                                            id="error-street_address"></span>
                                    </div>

                                    @error('street_address')
                                        <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Post Code') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group @error('post_code') error @enderror">
                                        <input type="number" class="form-control"
                                            name="post_code" value="{{ old('post_code', $user?->address?->post_code) }}"
                                            id="post_code" placeholder="{{ __('Post Code') }}">

                                        <span class="error-message text-danger"
                                            id="error-post_code"></span>
                                    </div>

                                    @error('post_code')
                                        <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row @error('description') error @enderror">
                                <label class="col-sm-3 col-form-label" for="description">{{ __('Description') }}</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3"
                                        name="description" placeholder="Write here description....">{{ old('description', $user->description) }}</textarea>

                                        @error('description')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row @error('avatar') error @enderror">
                                <label class="col-sm-3 col-form-label">Avatar</label>
                                <div class="col-sm-9">
                                    <div class="file-upload-section">
                                        <input name="avatar" type="file"
                                            class="form-control d-none" allowed="png,gif,jpeg,jpg,webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info"
                                                disabled="" readonly
                                                placeholder="Size: 200x200 and max 500kB">
                                            <span class="input-group-append">
                                                <button
                                                    class="file-upload-browse btn btn-outline-secondary"
                                                    type="button"><i class="fas fa-upload"></i>
                                                    Browse</button>
                                            </span>
                                        </div>
                                        @error('avatar')
                                            <p class="error-message">{{ $message }}</p>
                                        @enderror
                                        <div class="display-input-image {{ $user->avatar ? '' : 'd-none' }}">
                                            <img src="{{ $user->getAvatar() }}" alt="Preview Image" />
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

@include('admin.assets.select2')

@push('scripts')
@vite('resources/admin_assets/js/select2.js')
@endpush
