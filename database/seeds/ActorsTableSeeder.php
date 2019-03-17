<?php

use Illuminate\Database\Seeder;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 32; $i++) {
            \Movies\Models\Actor::create([
                'name' => $faker->name,
            ]);
        }
    }
}
