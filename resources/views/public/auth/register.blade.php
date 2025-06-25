@extends('public.layout.master')
@section('title', 'Register Page')
@section('membership', 'active')

@section('content')
<!-- ======= Breadcrumbs ======= -->
{!! \App\Library\Html::breadcrumbsSection('Create a User Profile') !!}
<!-- End Breadcrumbs -->

@if ($errors->any())
@foreach ($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@endif

<section id="register" class="register">
    <div class="container" data-aos="fade-up">
        <div>
            <div class="progress-container">
                <div class="step active">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="label">Personal</div>
                </div>
                <div class="step">
                    <div class="icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="label">Member</div>
                </div>
                <div class="step">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="label">Policy</div>
                </div>
                <div class="step">
                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="label">Finish</div>
                </div>
                <div class="progress-bar"></div>
                <div class="progress-bar-fill"></div>
            </div>


            <form method="POST" action="/register?from={{ request()->query('from') }}" class="" enctype="multipart/form-data">
                @csrf
                <div class="form-section active">
                    <div class="row gy-4">
                        <div class="col-12">

                            {{-- <h3 class="text-center fs-2 fw-bold mb-5">Registration step 1</h3> --}}

                            <div class="row gy-4 gx-5">

                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Name
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
                        </div>
                    </div>
                    <div class="text-center mt-3"><button class="btn register-btn" onclick="nextStep()" type="button">
                            Next </button>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-group row">
                        <div class="col-sm-11">
                            {{-- <h3 class="text-center fs-2 fw-bold mb-5">Registration step 2</h3> --}}

                            <div class="selector">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="selector-item mt-0">
                                            <input type="radio" id="nonMember" name="user_type" class="selector-item_radio" value="{{ \App\Library\Enum::USER_TYPE_NON_CLUB_MEMBER }}" checked required>
                                            <label for="nonMember" class="selector-item_label">Join As Day Member </label>
                                        </div>
                                        <div class="selector-item">
                                            <input type="radio" id="affiliatedClubMember" value="{{ \App\Library\Enum::USER_TYPE_AFFILIATED_CLUB_MEMBER }}" name="user_type" class="selector-item_radio" required>
                                            <label for="affiliatedClubMember" class="selector-item_label">Join As Affiliated Club Member </label>
                                        </div>
                                        <div class="selector-item">
                                            <input type="radio" id="mbgfcMember" name="user_type" value="{{ \App\Library\Enum::USER_TYPE_CUSTOMER }}" class="selector-item_radio" required>
                                            <label for="mbgfcMember" class="selector-item_label">Join As MBGFC Member </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-4 mt-lg-0">
                                        <div id="affiliatedClubMemberFields" style="display: none">
                                            <div class="form-group">
                                                <select id="affiliatedClub" class="form-control select" name="club_id">
                                                    @foreach ($clubs as $club)
                                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="error-message text-danger" id="error-cm"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="clubName" class="form-control" name="club_member_id" placeholder="Enter club member ID">
                                                <span class="error-message text-danger" id="error-cmi"></span>
                                            </div>
                                        </div>
                                        <div id="mbgfcMemberFields" style="display: none">
                                            <div class="email-container mb-3">
                                                <div class="w-100 d-flex align-items-center gap-4 email-field">
                                                    <div class="w-100">
                                                        <input type="text" class="form-control" name="nominee1" id="searchBox1"
                                                            placeholder="Search 1st Nominee by name / phone / member id">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-outline-secondary btn-sm"
                                                        id="searchBtn1">Go</button>
                                                    </div>
                                                </div>
                                                <span class="error-message text-danger" id="error-n1"></span>
                                            </div>
                                            <div class="email-container mb-3">
                                                <div class="w-100 d-flex align-items-center gap-4 email-field">
                                                    <div class="w-100">
                                                        <input type="text" id="searchBox2" class="form-control" name="nominee2"
                                                            placeholder="Search 2nd Nominee by name / phone / member id">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button id="searchBtn2" class="btn btn-outline-secondary btn-sm"
                                                            id="searchNominee2">Go</button>
                                                    </div>
                                                </div>
                                                <span class="error-message text-danger" id="error-n2"></span>
                                            </div>
                                            <div class="form-group">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @error('user_type')
                            <p class="error-message text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn register-btn" type="button" onclick="prevStep()">
                            Previous </button>
                        <button class="btn register-btn" type="button" onclick="nextStep()">
                            Next</button>
                    </div>
                </div>
                <div class="form-section">
                    <div class="mb-4">
                        {{-- <h3 class="text-center fs-2 fw-bold mb-5">Registration step 3</h3> --}}

                        @php
                            $constitution = App\Models\Document::where('type', 'constitution')->first();
                            $code_of_conduct = App\Models\Document::where('type', 'code_of_conduct')->first();
                            $privacy_policy = App\Models\Document::where('type', 'privacy_policy')->first();
                        @endphp


                        <div class="alert alert-secondary" role="alert">
                            <div>
                                <input type="checkbox" id="policy2">
                                @if ($constitution)

                                <label for="policy2">I have read and understood <a style="color: #2257C0; text-decoration: underline" target="_blank" href="{{ asset($constitution->document) }}">Constitution</a></label>
                                @else

                                <label for="policy2">I have read and understood <a style="color: #2257C0; text-decoration: underline" href="#">Constitution</a></label>
                                @endif
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <div>
                                <input type="checkbox" id="policy1">
                                @if ($code_of_conduct)

                                <label for="policy1">I have read and understood <a style="color: #2257C0; text-decoration: underline" target="_blank" href="{{ asset($code_of_conduct->document) }}">Code of Conduct</a></label>
                                @else

                                <label for="policy1">I have read and understood <a style="color: #2257C0; text-decoration: underline" href="#">Code of Conduct</a></label>
                                @endif
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <div>
                                <input type="checkbox" id="policy3">
                                @if ($privacy_policy)

                                <label for="policy3">I have read and understood <a style="color: #2257C0; text-decoration: underline" target="_blank" href="{{ asset($privacy_policy->document) }}">Privacy Policy</a></label>
                                @else

                                <label for="policy3">I have read and understood <a style="color: #2257C0; text-decoration: underline" href="#">Privacy Policy</a></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn register-btn"  onclick="prevStep()">Previous</button>
                        <button type="submit" id="submit" class="btn register-btn" disabled>Submit</button>
                    </div>
                </div>
            </form>
        </div><!-- End Contact Form -->

    </div>
</section>

<div id="searchModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Nominee List</h5>
                <button type="button" class="btn-close closeModal"></button>
            </div>

            <div class="modal-body">
                <select id="searchResults" class="form-control">
                    <!-- Options will be added here dynamically -->
                </select>
                <h3 id="noResults" class="text-center mt-3 text-danger" style="display: none;">No member found</h3>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal">Close</button>
                <button type="button" id="selectMemberBtn" class="btn btn-primary">Select</button>
            </div>
        </div>
    </div>
</div>

@stop

@include('admin.assets.datetimepicker')
@include('admin.assets.select2')
@push('scripts')
@vite('resources/public_assets/js/register.js')
@endpush
