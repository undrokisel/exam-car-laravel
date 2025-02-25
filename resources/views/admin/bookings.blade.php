@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h2 class="text-center">Управление бронированиями</h2>

        @if ($bookings->isEmpty())
            <p class="text-center">Бронирований пока нет.</p>
        @else
            <div class="flex flex-center gap20">
                <table class="text rounded">
                    <thead class=" bg-white text-dark">
                        <tr>
                            <th class="">Клиент</th>
                            <th class="">Контакты</th>
                            <th class="">Автомобиль</th>
                            <th class="">Дата</th>
                            <th class="">Статус</th>
                            <th class="">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-dark text-center">
                        @foreach ($bookings as $booking)
                            <tr>
                                <td class="">{{ $booking->user->name }}</td>
                                <td class="">
                                    <div>{{ $booking->user->phone }}</div>
                                    <div class="text-sm text-gray-500">{{ $booking->user->email }}</div>
                                </td>
                                <td class="">{{ $booking->car->name }}</td>
                                <td class="">{{ $booking->booking_date->format('d.m.Y') }}</td>
                                <td class="">
                                    @if ($booking->status === 'new')
                                        <span class="">Новая</span>
                                    @elseif($booking->status === 'approved')
                                        <span class="success">Подтверждена</span>
                                    @else
                                        <span class="danger">Отклонена</span>
                                    @endif
                                </td>
                                <td class="">
                                    @if ($booking->status === 'new')
                                        <div class="flex flex-col gap10">
                                            <form method="POST" action="{{ route('admin.bookings.status', $booking) }}"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn w-100 success py10">
                                                    Подтвердить
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.bookings.status', $booking) }}"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn w-100 danger py10">
                                                    Отклонить
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="">не требуется</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
@endsection
