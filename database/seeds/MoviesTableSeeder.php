<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \Movies\Models\Movie::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {

            $movie = \Movies\Models\Movie::create([
                'title' => $faker->word,
                'director' => $faker->name,
                'description' => $faker->text,
                'duration' => $faker->time('H:i:s', 14400),
            ]);

            $movie->actors()->sync([$i + 1, $movie->id]);
            $movie->actors()->sync([$i + 2, $movie->id]);
            $movie->actors()->sync([$i + 3, $movie->id]);
        }
    }
}
