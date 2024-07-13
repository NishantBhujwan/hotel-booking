<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\RoomType;

class RoomTypeController extends VoyagerBaseController
{
    public function index(Request $request)
    {
        $roomTypes = RoomType::all();
        return view('vendor.voyager.room_types.index', compact('roomTypes'));
    }

    public function create(Request $request)
    {
        return view('vendor.voyager.room_types.create');
    }

    public function store(Request $request)
    {
        RoomType::create($request->all());
        return redirect()->route('voyager.room-types.index');
    }

    public function show(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('vendor.voyager.room_types.show', compact('roomType'));
    }

    public function edit(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('vendor.voyager.room_types.edit', compact('roomType'));
    }

    public function update(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->all());
        return redirect()->route('voyager.room-types.index')
            ->with('success', 'Room Type updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);

        // Check for active rooms or other validation logic
        if ($roomType->rooms()->exists()) {
            return redirect()->route('voyager.room-types.index')->withErrors(['error' => 'Room type cannot be deleted because it has associated rooms.']);
        }
        $roomType->delete();

        return redirect()->route('voyager.room-types.index')->with('success', 'Room type deleted successfully.');
    }
}
