<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Paws on Tour">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="currency_symbol" content="{{ settings('currency_symbol') ? settings('currency_symbol') : config('app.currency_sign') }}">
    <link rel="shortcut icon" href="{{ settings('favicon') ? asset(settings('favicon')) : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}">
    @vite('resources/admin_assets/sass/app.scss')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        window.auth_role_permissions = JSON.parse('{!! json_encode(config('auth.role_permissions')) !!}');
    </script>
    @stack('styles')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.components.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.components.sidebar')
            <!-- partial -->
            <div id="app" class="main-panel">

                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.components.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="{{ asset('assets/js/admin.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>

    <script>
        var dateFormat = "{{ inputDateFormat() }}";
        var inputDateFormat = "{{ inputDateFormat() }}";
        var inputTimeFormat = "{{ inputTimeFormat() }}";
        var inputDateTimeFormat = "{{ inputDateTimeFormat() }}";

        // chack 24h format or 12h format
        var timeFormat = "{{ settings('time_format') }}";

        var hourFormat = false;
        if (timeFormat == '24h') {
            hourFormat = true;
        }

    </script>

    @vite('resources/admin_assets/js/app.js')
    @include('admin.components.flash')
    @stack('scripts')
</body>
</html>
