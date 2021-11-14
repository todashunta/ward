<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/header.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" >
    <link rel="stylesheet" href="@yield('css')">
    <title>@yield('title')</title>
</head>
<body>
    <div id="header-menu">
        <header>
            <h1><span>L</span>earn <span>E</span>nglish</h1>
            <div class="header-menu">
                <p>選択中の単語一覧</p>
                <p>選択中の単語一覧</p>
            </div>
        </header>
        <div class="menu-open-btn" :class="headerMenu" @@click="menuToggle">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <menu id="slide-bar">
            <p>単語検索</p>
            <p>すべての単語一覧</p>
            <p>単語作成</p>
            <p>単語編集</p>
            <p>単語消去</p>
        </menu>
    </div>
        <div class="content">
            @yield('content')
            
            
        </div>
        <footer>
            <p>
                created by SuntaToda
            </p>
        </footer>
        <script src="https://unpkg.com/vue@next"></script>
        <script src="{{ asset('js/headerMenu.js') }}"></script>
        <script src="@yield('script')"></script>
</body>
</html>
