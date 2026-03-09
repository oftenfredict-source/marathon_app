<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarathonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marathon = \App\Models\Marathon::create([
            'name' => 'Swahili Marathon 2026',
            'event_date' => '2026-06-27',
            'location' => 'Dar es Salaam, Tanzania',
            'description' => 'The premier marathon event in East Africa.',
            'is_active' => true,
        ]);

        $categories = [
            ['name' => '42km Full Marathon', 'distance' => 42.19, 'price_local' => 40000, 'price_international' => 15, 'registration_limit' => 500],
            ['name' => '21km Half Marathon', 'distance' => 21.10, 'price_local' => 40000, 'price_international' => 15, 'registration_limit' => 1000],
            ['name' => '10km Run', 'distance' => 10.00, 'price_local' => 40000, 'price_international' => 15, 'registration_limit' => 2000],
            ['name' => '5km Fun Run', 'distance' => 5.00, 'price_local' => 40000, 'price_international' => 15, 'registration_limit' => 3000],
            ['name' => '2.5km Family Run', 'distance' => 2.50, 'price_local' => 40000, 'price_international' => 15, 'registration_limit' => 1000],
        ];

        foreach ($categories as $category) {
            $marathon->categories()->create($category);
        }
    }
}
