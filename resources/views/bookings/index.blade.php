@extends('layouts.app')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-center">
            <h2 class="">Ваши бронирования ({{ $user }})</h2>
        </div>

        @if ($bookings->isEmpty())
            <p class="text-center text">У вас пока нет бронирований.</p>
        @else
            <div class="table flex flex-center rounded">
                <table class="text text-dark rounded">
                    <thead class="text dark bg-white">
                        <tr>
                            <th class="">Автомобиль</th>
                            <th class="">Дата</th>
                            <th class="">Статус</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($bookings as $booking)
                            <tr>
                                <td class="">
                                    {{ $booking->car->name }}
                                </td>
                                <td class="">
                                    {{ $booking->booking_date->format('d.m.Y') }}
                                </td>
                                <td class="">
                                    @if ($booking->status === 'new')
                                        <span class="">Новая</span>
                                    @elseif($booking->status === 'approved')
                                        <span class="">Подтверждена</span>
                                    @else
                                        <span class="">Отклонена</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="flex flex-center">
            <a href="{{ route('bookings.create') }}" class="btn btn__book">
                Забронировать автомобиль
            </a>
        </div>


    </div>

@endsection
