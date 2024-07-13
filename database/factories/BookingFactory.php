<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'room_id' => Room::factory(),
            'check_in_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'check_out_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'total_amount' => $this->faker->randomFloat(2, 100, 1000),
            'booking_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}

