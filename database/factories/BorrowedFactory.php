<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BorrowedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'date_borrowed' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_returned' => $this->faker->optional()->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['borrowed', 'returned']),
            'officer' => User::inRandomOrder()->first()->id ?? 0000,
        ];
    }
}
