<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AllItem>
 */
class AllItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['active', 'broken', 'mainten', 'stock'];
        shuffle($status);
        return [
            'item_name' => fake()->firstName(),
            'amount' => fake()->randomDigit(),
            'status' => $status[0],
            'place' => fake()->city(),
            'description' => fake()->address(),
            'user_id' => '7013',
        ];
    }
}
