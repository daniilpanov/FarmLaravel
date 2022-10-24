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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</head>

<body>
<header>
    @include('components.header')
</header>
<main class="container letter">
    @yield('content')
</main>
<footer>
    @include('components.footer')
</footer>

<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyCHurOK0eX8GZBZFUNYFfOz2LNYQxtHr1E",
        authDomain: "victoriafarm-7f0ee.firebaseapp.com",
        projectId: "victoriafarm-7f0ee",
        storageBucket: "victoriafarm-7f0ee.appspot.com",
        messagingSenderId: "660808331688",
        appId: "1:660808331688:web:7daf741741ea8e144b6d9d",
        measurementId: "G-W7PFFQ1ES5"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
</script>
</body>
</html>
