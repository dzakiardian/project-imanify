<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DescriptionItem>
 */
class DescriptionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['item in', 'item out'];
        shuffle($status);
        return [
            'item_name' => fake()->colorName(),
            'amount' => fake()->randomDigit() + 1,
            'status' => $status[0],
            'date' => fake()->date(),
            'source_of_found' => fake()->city(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
