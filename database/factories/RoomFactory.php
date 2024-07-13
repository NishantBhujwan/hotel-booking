<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'room_number' => $this->faker->unique()->numberBetween(100, 999),
            'room_type_id' => RoomType::factory(),
            'floor' => $this->faker->numberBetween(1, 10),
            'is_available' => $this->faker->boolean,
        ];
    }
}

