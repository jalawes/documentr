<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Documentr') }}: @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
      window.App =; {!! json_encode([
            'user' => Auth::user(),
        ]) !!}
    </script>
</head>
<body>
    @include('layouts.partials.navbar')

    <section class="section">
        <div id="app" v-cloak>

            <notification message="{{ session('flash') }}"></notification>

            @yield('content')
        </div>
    </section>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
