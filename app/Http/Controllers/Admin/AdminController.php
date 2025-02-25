<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'car'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.bookings', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        if ($booking->status !== 'new') {
            return back()->withErrors([
                'status' => 'Можно изменять статус только у новых заявок.',
            ]);
        }

        $request->validate([
            'status' => ['required', 'in:approved,rejected'],
        ]);

        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Статус заявки обновлен.');
    }
}
