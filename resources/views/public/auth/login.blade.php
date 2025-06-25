@extends('public.layout.master')
@section('title', 'Login Page')
@section('membership', 'active')

@section('content')

<section class="login" data-aos="fade-up" data-aos-delay="100">
    <form method="POST" action="/login?from={{ request()->query('from') }}">
        @csrf
        <div class="login-card shadow-lg" style="padding: 30px 0;">
            <a href="{{ url('/') }}" class="d-flex justify-content-center"><img src="{{ Vite::asset(\App\Library\Enum::LOGO_PATH) }}" class="w-50" alt="Logo"></a>
            <h1>Member Login</h1>
            <span></span>
            <div class="login-form">
                <!-- <h4>Email </h4>
                <div class="username-input">
                    <i class="fas fa-user"></i>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>
                </div>

                @error('email')
                    <span class="invalid-feedback d-block mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror -->

                <h4>Member Id </h4>
                <div class="username-input">
                    <i class="fas fa-user"></i>
                    <input id="user_name" type="text" class="@error('id')
                    is-invalid @enderror" name="id" value="" required

                    >
                </div>

                @error('id')
                    <span class="invalid-feedback d-block mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Password </h4>
                <div class="password-input">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    <i class="fas fa-eye" id="show_pass"></i>
                </div>

                @error('password')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="d-flex justify-content-between mt-2">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                    <a href="/register?from={{ request()->query('from') }}">Create a user profile</a>
                </div>
            </div>
            <h5 class="mb-3 text-center">Current member, first time logging in? <br>Reset your password to login</h5>
            <button type="submit" class="login-btn text-center">
                LOGIN
            </button>

        </div>
    </form>

</section>

@stop
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function () {
        $("#show_pass").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
            $("#password").attr("type", type);
        });
    });
</script>
@endpush
