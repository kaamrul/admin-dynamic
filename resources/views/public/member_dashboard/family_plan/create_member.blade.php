@extends('public.member_dashboard.dashboard_master')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        <h4>Family Plan / Add New Member</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div id="membership" class="membership mt-3">
                    <div class="container" data-aos="fade-up">
                        <form method="post" class="form" action="/member/dashboard/family-plan/create-member"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row gy-4 gx-5">

                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Member Name
                                            </span></label>
                                        <div class="col-sm-9">
                                            <div class="row gy-2">
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input type="text" id="fname"
                                                            class="form-control @error('first_name') error @enderror"
                                                            value="{{ old('first_name') }}" name="first_name"
                                                            placeholder="First Name" required>

                                                        @error('first_name')
                                                        <p class="error-message text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <span class="error-message text-danger" id="error-fname"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input type="text" id="lname"
                                                            class="form-control @error('last_name') error @enderror"
                                                            name="last_name" value="{{ old('last_name') }}"
                                                            placeholder="Last Name" required>

                                                        @error('last_name')
                                                        <p class="error-message text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <span class="error-message text-danger" id="error-lname"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-3 col-form-label required"> Email</label>
                                        <div class="col-sm-9">
                                            <input type="email"  class="form-control @error('email') error @enderror"
                                                name="email" id="email" value="{{ old('email') }}"
                                                placeholder="Your Email" required>
                                            @error('email')
                                            <p class="error-message text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="error-message text-danger" id="error-email"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Password </label>
                                        <div class="col-sm-9">
                                            <div class="row gy-2">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="password" id="pass"
                                                            class="form-control @error('password') error @enderror"
                                                            name="password" placeholder="Password" required>
                                                        @error('password')
                                                        <p class="error-message text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <span class="error-message text-danger"
                                                                    id="error-pass"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input type="password" id="cpass"
                                                            class="form-control @error('password_confirmation') error @enderror"
                                                            name="password_confirmation" placeholder="Confirm Password"
                                                            required>

                                                        @error('password_confirmation')
                                                        <p class="error-message text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <span class="error-message text-danger"
                                                                    id="error-cpass"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-3 col-form-label required"> Mobile </label>
                                        <div class="col-sm-9">
                                            <div class="input-group  @error('phone') error @enderror">
                                                <div class="input-group-prepend">
                                                    <select name="country_code" class="input-group-text text-secondary"
                                                        required>
                                                        @foreach (\App\Library\Helper::getCountries() as $key =>
                                                        $country)
                                                        <option value="{{ old('country_code', $country['code']) }}"
                                                            {{($key=="NZ" ) ? "selected" : "" }}>{{$key}}
                                                            {{ $country['code']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <input type="number" name="phone" value="{{ old('phone') }}" id="mobile"
                                                    class="form-control @error('phone') error @enderror"
                                                    placeholder="013 355 666" required>
                                            </div>
                                            @error('phone')
                                            <p class="error-message text-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="error-message text-danger" id="error-mobile"></span>
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
                                                <div class="input-group col-xs-12 @error('avatar') error @enderror">
                                                    <input type="text" class="form-control file-upload-info" disabled=""
                                                        readonly placeholder="Size: 400x400 and max 1024kB">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-outline-secondary"
                                                            type="button"><i class="fas fa-upload"></i>
                                                            Browse</button>
                                                    </span>
                                                </div>
                                                @error('avatar')
                                                <p class="error-message text-danger">{{ $message }}</p>
                                                @enderror
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
                                        <label class="col-lg-2 col-12 col-form-label required" for="name">Date of Birth</label>
                                        <div class="col-sm-9">
                                            <input class="form-control datepicker-max-today" value="{{ old('dob') }}" id="dob"
                                                type="date" name="dob" placeholder="Date of Birth" required>
                                            <span class="error-message text-danger" id="error-dob"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" id="submit" class="btn register-btn">Submit</button>
                            </div>

                        </form>
                    </div>
                </div><!-- End Membership Section -->
            </div>
        </div>
        <!------------ End Div ---------->
    </div>
</div>
@endsection
