@extends('public.member_dashboard.dashboard_master')
@section('profile', 'active')

@section('member_content')
<div class="row" data-aos="fade-up">
    <div class="col-md-12 content-area">
        <h2>Profile Update</h2>
        <hr>
        <div class="row d-flex flex-column align-items-center justify-content-center shadow-lg p-4 rounded-4">
            <form method="post" action="{{ route('member.dashboard.profile.update') }}"
                class="client-signup-form" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif

                <div class="row gy-4">
                    <div class="col-12">
                        <div class="row gy-4 gx-5">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Name</label>
                                    <div class="col-sm-9">
                                        <div class="row gy-2">
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <input type="text"
                                                        class="form-control @error('first_name') error @enderror"
                                                        value="{{ old('first_name', $user->first_name) }}"
                                                        name="first_name" placeholder="First Name" required>

                                                    @error('first_name')
                                                    <p class="error-message text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <input type="text"
                                                        class="form-control @error('last_name') error @enderror"
                                                        name="last_name"
                                                        value="{{ old('last_name', $user->last_name) }}"
                                                        placeholder="Last Name" required>

                                                    @error('last_name')
                                                    <p class="error-message text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-3 col-form-label required"> Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control @error('email') error @enderror"
                                            name="email" id="email" value="{{ old('email', $user->email) }}"
                                            placeholder="Your Email" required>
                                        @error('email')
                                        <p class="error-message text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Date of Birth </label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('dob') error @enderror" name="dob"
                                            id="dob" value="{{ old('dob', $user->dob) }}" required>
                                        @error('dob')
                                        <p class="error-message text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group row @error('location') error @enderror">
                                    <label class="col-sm-3 col-form-label" for="name">{{
                                        __('Location') }}</label>
                                    <div class="col-sm-9">
                                        <select class="select form-control" name="location" id="location"
                                            style="width: 100%;">
                                            <option value="" selected disabled>Select One</option>
                                            @foreach(getLocations() as $location)
                                            <option value="{{ $location->name }}" {{ old('location',
                                                $user->location) == $location->name ? "selected" : "" }}
                                                data-params="{{ $location->name }}">
                                                {{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('location')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-6">
                                <div class="form-group row @error('ethnicity') error @enderror">
                                    <label class="col-sm-3 col-form-label" for="name">
                                        {{__('Ethnicity') }}</label>
                                    <div class="col-sm-9">

                                        <select class="select form-control" name="ethnicity" id="ethnicity"
                                            style="width: 100%;">
                                            <option value="" selected disabled>Select One</option>
                                            @foreach(getDropdown(\App\Library\Enum::CONFIG_DROPDOWN_ETHNICITY) as $ethnicity)
                                            <option value="{{ $ethnicity }}"
                                                {{
                                                old('ethnicity', $user->ethnicity) == $ethnicity ? "selected" : "" }}
                                                data-params="{{ $ethnicity }}">
                                                {{ $ethnicity }}</option>
                                            @endforeach
                                        </select>
                                        @error('ethnicity')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-3 col-form-label required"> Mobile </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select name="country_code" class="input-group-text text-primary"
                                                    required>
                                                    @foreach(\App\Library\Helper::getCountries() as $key => $country)
                                                    <option value="{{ old('country_code', $country['code']) }}"
                                                        {{ $country['code']==(explode('-', $user->phone))[0] ? "selected" : "" }}>
                                                        {{ $key }} {{ $country['code'] }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <input type="tel" name="phone" value="{{ old('phone', (explode('-', $user->phone))[1]) }}"
                                                class="form-control @error('phone') error @enderror"
                                                placeholder="013 355 666" required>

                                            @error('phone')
                                            <p class="error-message text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Profile Picture</label>
                                    <div class="col-sm-9">
                                        <div class="file-upload-section">
                                            <input name="avatar" type="file" class="form-control d-none"
                                                allowed="png,gif,jpeg,jpg">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    readonly placeholder="Size: 200x200 and max 500kB">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-outline-secondary"
                                                        type="button"><i class="fas fa-upload"></i>
                                                        Browse</button>
                                                </span>
                                            </div>
                                            <div class="display-input-image d-none">
                                                <img src="{{ asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
                                                    alt="Preview Image" />
                                                <button type="button" style="padding: 5px 8px"
                                                    class="btn btn-sm btn-outline-danger file-upload-remove"
                                                    title="Remove">x</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-3 col-form-label" for="name">Gender</label>
                                    <div class="col-sm-9">
                                        <select class="select form-control" name="gender" id="gender"
                                            style="width: 100%;">
                                            <option selected disabled value="">Select One</option>
                                            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="others" {{ old('gender', $user->gender) == 'others' ? 'selected' : '' }}>
                                                Others
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <h3 class="text-center fs-2 fw-bold mb-4">Address</h3>
                        <div class="row gy-4 gx-5">
                            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12">
                                <h5 class="text-center card-title">Home Address</h5>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group @error('home_street_address') error @enderror">
                                            <input type="text" class="form-control" name="home_street_address"
                                                value="{{ old('home_street_address', $user?->address?->home_street_address ) }}"
                                                placeholder="{{ __('Street Name & Number ') }}" id="homeStreetAddress"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group @error('home_suburb') error @enderror">
                                            <input type="text" class="form-control" name="home_suburb"
                                                value="{{ old('home_suburb', $user?->address?->home_suburb ) }}"
                                                placeholder="{{ __('Suburb') }}" id="homeSubRoad" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('home_city') error @enderror">
                                            <input type="text" class="form-control" name="home_city"
                                                value="{{ old('home_city', $user?->address?->home_city ) }}"
                                                id="homeCity" placeholder="{{ __('City') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('home_post_code') error @enderror">
                                            <input type="number" class="form-control" name="home_post_code"
                                                id="homePostCode"
                                                value="{{ old('home_post_code', $user?->address?->home_post_code ) }}"
                                                placeholder="{{ __('Post Code') }}" required>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('home_latitude') error @enderror">
                                            <input type="number" class="form-control" name="home_latitude"
                                                step="0.00001"
                                                value="{{ old('home_latitude', $user?->address?->home_latitude ) }}"
                                                placeholder="{{ __('Latitude (optional)') }}" id="homeLatitude">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('home_longitude') error @enderror">
                                            <input type="number" class="form-control" name="home_longitude"
                                                step="0.00001"
                                                value="{{ old('home_longitude', $user?->address?->home_longitude ) }}"
                                                placeholder="{{ __('Longitude (optional)') }}" id="homeLoggitude">
                                        </div>
                                    </div> --}}
                                </div>
                                @error('home_street_address')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('home_suburb')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('home_city')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('home_post_code')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('home_latitude')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('home_longitude')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror


                            </div>

                            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12">
                                <h5 class="text-center card-title">Postal Address | Same as Home <input
                                    type="checkbox" id="sameAddress"></h5>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group @error('postal_street_address') error @enderror">
                                            <input type="text" class="form-control"
                                                value="{{ old('postal_street_address', $user?->address?->postal_street_address ) }}"
                                                name="postal_street_address" id="postalStreetAddress"
                                                placeholder="{{ __('Street Name & Number') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group @error('postal_suburb') error @enderror">
                                            <input type="text" class="form-control" name="postal_suburb"
                                                value="{{ old('postal_suburb', $user?->address?->postal_suburb ) }}"
                                                id="postalSubRoad" placeholder="{{ __('Suburb') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('postal_city') error @enderror">
                                            <input type="text" class="form-control" name="postal_city"
                                                value="{{ old('postal_city', $user?->address?->postal_city ) }}"
                                                id="postalCity" placeholder="{{ __('City') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('postal_post_code') error @enderror">
                                            <input type="number" class="form-control" name="postal_post_code"
                                                id="postalPostCode"
                                                value="{{ old('postal_post_code', $user?->address?->postal_post_code ) }}"
                                                placeholder="{{ __('Post Code') }}" required>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('postal_latitude') error @enderror">
                                            <input type="number" class="form-control" name="postal_latitude"
                                                step="0.00001"
                                                value="{{ old('postal_latitude', $user?->address?->postal_latitude ) }}"
                                                placeholder="{{ __('Latitude (optional)') }}" id="postalLatitude">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group @error('postal_longitude') error @enderror">
                                            <input type="number" class="form-control" name="postal_longitude"
                                                step="0.00001"
                                                value="{{ old('postal_longitude', $user?->address?->postal_longitude ) }}"
                                                placeholder="{{ __('Longitude (optional)') }}" id="postalLoggitude">
                                        </div>
                                    </div> --}}
                                </div>
                                @error('postal_street_address')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('postal_suburb')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('postal_city')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('postal_post_code')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('postal_latitude')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror
                                @error('postal_longitude')
                                <p class="error-message text-danger">{{ $message }}</p>
                                @enderror


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

@push('scripts')
<script type="text/javascript">
$(document).on('change', '#sameAddress',function(){
    if (this.checked) {
        $("#postalStreetAddress").val($("#homeStreetAddress").val());
        $("#postalSubRoad").val($("#homeSubRoad").val());
        $("#postalCity").val($("#homeCity").val());
        $("#postalPostCode").val($("#homePostCode").val());
        $("#postalLatitude").val($("#homeLatitude").val());
        $("#postalLoggitude").val($("#homeLoggitude").val());
    } else {
        $("#postalStreetAddress").val('');
        $("#postalSubRoad").val('');
        $("#postalCity").val('');
        $("#postalPostCode").val('');
        $("#postalLatitude").val('');
        $("#postalLoggitude").val('');
    }
});
</script>
@endpush
