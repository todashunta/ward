<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/header.css')}}" >
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" >
    <link rel="stylesheet" href="@yield('css')">
    <title>@yield('title')</title>
</head>
<body>
    <header>
    <ul>
        <li><a href="/index">index</a></li>
        <li><a href="/create">create</a></li>
    </ul>
    </header>
    @yield('content')

    <footer>
        <p>
            created by SuntaToda
        </p>
    </footer>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="@yield('script')"></script>
    {{-- <script src="js/script.js"></script> --}}
</body>
</html>
