@extends('layouts.app')

@section('content')
<div class="mx-auto flex flex-col">
    <h2 class="text-center">Забронировать автомобиль</h2>

    <form method="POST" action="{{ route('bookings.store') }}" class="form form__book flex gap20">
        @csrf

        <div class="flex flex-col gap10">
            <label for="car_id" class="block mb-1">Автомобиль</label>
            <select class="input" name="car_id" id="car_id" class="w-full border rounded px-3 py-2" required>
                <option value="">Выберите автомобиль</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                        {{ $car->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap10">
            <label for="booking_date" class="block mb-1">Дата бронирования</label>
            <input class="input" type="date" name="booking_date" id="booking_date" 
                value="{{ old('booking_date') }}" 
                min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="btn">
            Забронировать
        </button>
    </form>
</div>
@endsection