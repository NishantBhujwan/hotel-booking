<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::with('roomType', 'images')->orderBy('id', 'DESC')->get();
        return view('vendor.voyager.rooms.index', compact('rooms'));
    }

    public function create(Request $request)
    {
        $roomTypes = RoomType::all();
        return view('vendor.voyager.rooms.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_per_night' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);

        $room = Room::create($request->except('images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('rooms', 'public');
                RoomImage::create(['room_id' => $room->id, 'image_path' => $path]);
            }
        }

        return redirect()->route('voyager.rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Request $request, $id)
    {
        $room = Room::with('roomType', 'images')->findOrFail($id);
        return view('vendor.voyager.rooms.show', compact('room'));
    }

    public function edit(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $roomTypes = RoomType::all();
        return view('vendor.voyager.rooms.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_per_night' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);

        $room->update($request->except('images'));

        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($room->images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }

            // Upload new images
            foreach ($request->file('images') as $image) {
                $path = $image->store('rooms', 'public');
                RoomImage::create(['room_id' => $room->id, 'image_path' => $path]);
            }
        }

        return redirect()->route('voyager.rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        if ($room->bookings()->exists()) {
            return redirect()->route('voyager.rooms.index')->withErrors(['error' => 'Room cannot be deleted because it has active bookings.']);
        }

        // Delete images
        foreach ($room->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $room->delete();

        return redirect()->route('voyager.rooms.index')->with('success', 'Room deleted successfully.');
    }
    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'room_ids' => 'required|array',
            'room_ids.*' => 'exists:rooms,id',
        ]);
        dd($request->input('room_ids'));

        $roomIds = $request->input('room_ids');

        foreach ($roomIds as $id) {
            $room = Room::findOrFail($id);

            if ($room->bookings()->exists()) {
                return redirect()->route('voyager.rooms.index')->withErrors(['error' => 'One or more rooms cannot be deleted because they have active bookings.']);
            }

            // Delete images
            foreach ($room->images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }

            $room->delete();
        }

        return redirect()->route('voyager.rooms.index')->with('success', 'Rooms deleted successfully.');
    }
}
