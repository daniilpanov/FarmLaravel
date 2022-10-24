@php
    use App\Models\Page;
    /**
     * @var $page Page|null
     */
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--  -->
    <title>{{ $page->title ?? 'Ферма Виктории Кулюдиной' }}</title>

    <!--  -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="all">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')
    <!--  -->
    <meta name="description" content="{{ $page->description ?? '' }}">
    <meta name="keywords" content="{{ $page->keywords ?? '' }}">

    <!--  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    <!--  -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</head>

<body>
@yield('content')
</body>
</html>
