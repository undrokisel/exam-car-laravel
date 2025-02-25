<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Эх, прокачу!') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>
    <header class="header">
        <nav class="nav">
            <a 
                @auth 
                href="/bookings" 
                @else
                href="/login" 
                @endauth
                class="logo">Эх, прокачу!</a>
            <div class="nav__links">
                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.bookings') }}" class="">Админ панель</a>
                    @endif
                    <a href="{{ route('bookings.index') }}" class="">Мои бронирования</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="link">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="">Войти</a>
                    <a href="{{ route('register') }}" class="">Регистрация</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="badge success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="badge error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <script>
            setTimeout(() => {
                document.querySelector('.badge').remove();
            }, 4000);
        </script>

        @yield('content')
    </main>
</body>

</html>
