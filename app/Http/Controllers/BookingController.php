<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('customer', 'room')->get();
        return view('vendor.voyager.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $customers = Customer::all();
        $rooms = Room::with('roomType')->get();
        return view('vendor.voyager.bookings.create', compact('customers', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_amount' => 'required|numeric|min:0',
            'booking_date' => 'required|date',
        ]);

        // Check room availability
        if (!$this->isRoomAvailable($request->room_id, $request->check_in_date, $request->check_out_date)) {
            return redirect()->back()->withErrors(['error' => 'The room is not available for the selected dates.']);
        }

        Booking::create($request->all());

        return redirect()->route('voyager.bookings.index')->with('success', 'Booking created successfully');
    }

    public function show($id)
    {
        $booking = Booking::with('customer', 'room')->findOrFail($id);
        return view('vendor.voyager.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $customers = Customer::all();
        $rooms = Room::with('roomType')->get();

        return view('vendor.voyager.bookings.edit', compact('booking', 'customers', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_amount' => 'required|numeric|min:0',
            'booking_date' => 'required|date',
        ]);

        $booking = Booking::findOrFail($id);

        if (!$this->isRoomAvailable($request->room_id, $request->check_in_date, $request->check_out_date, $id)) {
            return redirect()->back()->withErrors(['error' => 'The room is not available for the selected dates.']);
        }

        $booking->update($request->all());

        return redirect()->route('voyager.bookings.index')->with('success', 'Booking updated successfully');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('voyager.bookings.index')->with('success', 'Booking deleted successfully');
    }

    private function isRoomAvailable($roomId, $checkInDate, $checkOutDate, $bookingId = null)
    {
        // Check if there are any bookings overlapping with the provided dates for the given room
        $query = Booking::where('room_id', $roomId)
                        ->where(function ($query) use ($checkInDate, $checkOutDate) {
                            // Check if the room is already booked between the provided dates
                            $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                                $query->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                                    ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate])
                                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                                        $query->where('check_in_date', '<=', $checkInDate)
                                            ->where('check_out_date', '>=', $checkOutDate);
                                    });
                            });
                        })
                        // Ensure the new check-in date is not equal to the check-out date of an existing booking
                        ->where('check_out_date', '!=', $checkInDate);

        // Exclude the current booking if updating
        if ($bookingId) {
            $query->where('id', '!=', $bookingId);
        }

        // If no overlapping bookings found, room is available
        return $query->count() === 0;
    }


}
