<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@if(View::hasSection('title')) @yield('title') @else {{ config('app.name', 'Laravel') }} @endif </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ asset("/favicon/site.webmanifest") }}">

    <link href="{{ asset('/') . mix('css/front.css')}}" rel="stylesheet">

    @yield('css')
</head>

<body>
    @include('partials._header')

    @yield('content')

    @include('partials._footer')
    <script src="{{ asset('/') . mix('js/front.js') }}" type="text/javascript"></script>
    @yield('scripts')
</body>
</html>