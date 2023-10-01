<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}" type="image/png" />
</head>

<body>
    <div id="auth">
        @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>