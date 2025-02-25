<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Car;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = auth()->user()->bookings()->with('car')->get();
        $user = auth()->user()->name;
        return view('bookings.index', compact('bookings', 'user'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('bookings.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => ['required', 'exists:cars,id'],
            'booking_date' => ['required', 'date', 'after:today'],
        ]);

        // Проверяем, не забронирована ли машина на эту дату
        $existingBooking = Booking::where('car_id', $validatedData['car_id'])
        ->where('booking_date', $validatedData['booking_date'])
        ->whereIn('status', ['new', 'approved'])
        ->exists();

        if ($existingBooking) {
            return back()->withErrors([
                'booking_date' => 'Автомобиль уже забронирован на эту дату.',
            ]);
        }

        auth()->user()->bookings()->create($validatedData);

        return redirect()->route('bookings.index')
            ->with('success', 'Заявка на бронирование создана.');


    }
}
