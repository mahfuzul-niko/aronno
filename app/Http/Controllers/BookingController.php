<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
        $categories = Category::all();
        $rooms = Room::with('bookings');

        // Filter by Category
        if ($request->filled('category_id')) {
            $rooms->where('category_id', $request->category_id);
        }

        $rooms = $rooms->get();

        $checkIn = $request->check_in;
        $checkOut = $request->check_out;

        return view('backend.booking.index', compact('rooms', 'categories', 'checkIn', 'checkOut'));
    }
    public function makeAvailable($roomId)
    {
        // Cancel all active bookings for this room today (or logic as needed)
        Booking::where('room_id', $roomId)
            ->where('booking_status', '!=', 'cancelled')
            ->whereDate('end_date', '>=', now()->toDateString())
            ->update(['booking_status' => 'cancelled']);

        return back()->with('success', 'Room is now available.');
    }
    public function checkout(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'room_id' => 'required|exists:rooms,id',
        ]);

        session([
            'booking' => [
                'room_id' => $request->room_id,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'price' => $request->price,
            ]
        ]);

        return redirect()->route('admin.booking.checkout.page')->with('info', 'Fill the Information to Finish Up.');
    }
    public function checkoutPage()
    {
        $booking = session('booking');

        if (!$booking || !isset($booking['room_id'], $booking['check_in'], $booking['check_out'])) {
            return redirect()->route('admin.booking.index')->with('error', 'Please select a room and dates first.');
        }

        $room = Room::findOrFail($booking['room_id']);
        $checkIn = $booking['check_in'];
        $checkOut = $booking['check_out'];
        $price = $booking['price'];

        return view('backend.booking.checkout', compact('room', 'checkIn', 'checkOut', 'price'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|integer',
            'guest_name' => 'required|string',
            'guest_number' => 'required|string',
            'guest_email' => 'required|email',
            'payment_type' => 'required|in:cash,online',
        ]);

        Booking::create([
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'guest_name' => $request->guest_name,
            'guest_number' => $request->guest_number,
            'guest_email' => $request->guest_email,
            'price' => $request->price,
            'payment_type' => $request->payment_type,
            'payment_status' => $request->payment_status,
            'booking_status' => $request->booking_status,
        ]);

        session()->forget('booking');

        return redirect()->route('admin.booking.index')->with('success', 'Booking completed successfully.');
    }
    public function list()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('backend.booking.bookings', compact('bookings'));
    }



}
