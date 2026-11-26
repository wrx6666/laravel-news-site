<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-content">
            <a class="wordmark" href="{{ route('home') }}">{{ config('app.name') }}</a>

            <nav class="site-nav" aria-label="Основное меню">
                <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Главная</a>
                <a href="{{ route('articles.index') }}" @if(request()->routeIs('articles.index')) aria-current="page" @endif>Статьи</a>
                <a href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>О нас</a>
                <a href="{{ route('contacts') }}" @if(request()->routeIs('contacts')) aria-current="page" @endif>Контакты</a>
                <a href="{{ route('signin') }}" @if(request()->routeIs('signin')) aria-current="page" @endif>Регистрация</a>
            </nav>
        </div>
    </header>

    <main class="container site-main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-content">
            <div><span>ФИО</span> {{ config('site.author') }}</div>
            <div><span>Группа</span> {{ config('site.group') }}</div>
        </div>
    </footer>
</body>
</html>
