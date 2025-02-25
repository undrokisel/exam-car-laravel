@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <h2 class="text-center">Вход</h2>

    <form method="POST" action="{{ route('login') }}" class="form space-y-4">
        @csrf

        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                class="input text dark" required placeholder="Email">

        <input type="password " name="password" id="password" placeholder="Пароль"
                class="input text dark" required>

        <button type="submit" class="btn text text-dark">
            Войти
        </button>
    </form>
</div>
@endsection