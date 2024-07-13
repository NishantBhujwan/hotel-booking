<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'room_id' => Room::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->paragraph,
            'review_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}

