<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{
    protected $model = RoomType::class;

    public function definition()
    {
        return [
            'type_name' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
            'price_per_night' => $this->faker->randomFloat(2, 50, 300),
        ];
    }
}
