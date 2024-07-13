<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Room;

class RoomComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $rooms = Room::with('roomType')->get();
        foreach ($rooms as $room) {
            $room->is_available_today = $room->isAvailableToday();
        }
        $view->with('rooms', $rooms);
    }
}
