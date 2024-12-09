<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mission;

class MissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 999; $i++) {
            Mission::create([
                'title' => $faker->sentence(),
                'preority' => $faker->numberBetween(0, 1),
                'publisher' => $faker->name(),
                'finished' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
