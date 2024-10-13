<?php

namespace Database\Seeders;

use App\Models\AllItem;
use App\Models\Place;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        AllItem::factory(20)->create();

        Place::factory()->create([
            'place_name' => 'Lab PPLG 1',
        ]);

        Place::factory()->create([
            'place_name' => 'Lab PPLG 2',
        ]);

        Place::factory()->create([
            'place_name' => 'Lab PPLG 3',
        ]);

        Place::factory()->create([
            'place_name' => 'Lab PPLG 4',
        ]);

        Place::factory()->create([
            'place_name' => 'Toolman',
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
