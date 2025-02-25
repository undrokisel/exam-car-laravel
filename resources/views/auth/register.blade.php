@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <h2 class="text-center">Регистрация</h2>

    <form method="POST" class="form form__register" action="{{ route('register') }}" class="space-y-4">
        @csrf

            <input class="input text dark text dark" type="text" name="name" id="name" value="{{ old('name') }}" 
                required placeholder="ФИО">

            <input class="input text dark" type="email" name="email" id="email" value="{{ old('email') }}" 
                required placeholder="Email">

            <input class="input text dark" type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                required placeholder="Телефон">

            <input class="input text dark" type="text" name="drivers_license" id="drivers_license"  placeholder="Водительское удостоверение"
                value="{{ old('drivers_license') }}" required>

        <input class="input text dark" type="password" name="password" id="password" 
            class="w-full border rounded px-3 py-2" required placeholder="Подтвердите пароль">
        <p class="text-sm  mt-1">Минимум 3 символа, должна быть хотя бы одна цифра</p>
        </input>

        <button type="submit" class="btn">
            Зарегистрироваться
        </button>
    </form>
</div>
@endsection