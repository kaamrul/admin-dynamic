@extends('public.member_dashboard.dashboard_master')
@section('profile', 'active')

@section('member_content')
<div class="row" data-aos="fade-left">
    <div class="col-md-12 content-area">
        <h2>{{ $emergency_contact ? 'Update' : 'Add'}} Emergency Contact</h2>
        <hr>
        <div class="row d-flex flex-column align-items-center justify-content-center p-4 rounded-4">
            <form method="post" action="{{ route('member.dashboard.profile.emergency_contact') }}"
                class="client-signup-form" enctype="multipart/form-data">
                @csrf

                <div class="row gy-4">
                    <div class="col-12">
                        <div class="row gy-4 gx-5">

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">{{ __('Name') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $emergency_contact->name??'') }}"
                                            placeholder="{{ __('Name') }}" required>
                                        @error('name')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row @error('email') error @enderror">
                                    <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $emergency_contact->email??'') }}"
                                            placeholder="{{ __('Email Address') }}">
                                        @error('email')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row @error('mobile') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Mobile') }}</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <select name="country_code" class="input-group-text text-secondary"
                                                    required>
                                                    @foreach(\App\Library\Helper::getCountries() as $key => $country)
                                                    <option value="{{ old('country_code', $country['code']) }}"
                                                        {{ $country['code'] == ($emergency_contact ? (explode('-', $emergency_contact->mobile_number??''))[0] : '+64') ? "selected" : ""}}>
                                                        {{$key}}
                                                        {{ $country['code']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="number" name="mobile_number"
                                                value="{{  old('mobile_number',  ((strpos($emergency_contact->mobile_number??'', '-') == true) ? (explode('-', $emergency_contact->mobile_number??''))[1] : $emergency_contact->mobile_number??'') )}}"
                                                class="form-control" placeholder="{{ __('013 355 666') }}" required>
                                        </div>
                                        @error('mobile_number')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row @error('relationship') error @enderror">
                                    <label class="col-sm-3 col-form-label required">{{ __('Relationship') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="relationship"
                                            value="{{ old('relationship', $emergency_contact->relationship??'') }}"
                                            placeholder="{{ __('Ex: Brother, Sister, Father') }}" required>
                                        @error('relationship')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row @error('address') error @enderror">
                                    <label class="col-sm-3 col-form-label" for="name">{{ __('Address') }}</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="address" class="form-control"
                                            placeholder="{{ __('Write Your Address') }}"
                                            rows="4">{{ old('address', $emergency_contact->address??'') }}</textarea>
                                        @error('address')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row @error('note') error @enderror">
                                    <label class="col-sm-3 col-form-label" for="name">{{ __('Note') }}</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="note" class="form-control"
                                            placeholder="{{ __('Write About You') }}"
                                            rows="4">{{ old('note', $emergency_contact->note??'') }}</textarea>
                                        @error('note')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row @error('image') error @enderror">
                                    <label class="col-sm-3 col-form-label">Picture</label>
                                    <div class="col-sm-9">
                                        <div class="file-upload-section">
                                            <input name="image" type="file" class="form-control d-none"
                                                allowed="png,gif,jpeg,jpg">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    readonly placeholder="Size: 200x200 and max 500kB">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-outline-secondary"
                                                        type="button"><i class="fas fa-upload"></i> Browse</button>
                                                </span>
                                            </div>
                                            @error('image')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                            <div class="display-input-image">
                                                <img src="{{ $emergency_contact? $emergency_contact->getImage() : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
                                                    alt="Preview Image" />
                                                <button type="button"
                                                    class="icon-btn btn-sm btn-outline-danger file-upload-remove"
                                                    title="Remove">x</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button class="btn register-btn" type="submit"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
