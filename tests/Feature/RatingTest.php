<?php

namespace Tests\Feature;

use Movies\Models\Movie;
use Movies\Services\RateService;
use Tests\TestCase;

class RatingTest extends TestCase
{
    /**
     * @return void
     */
    public function testsRatePostedCorrectly()
    {
        $movie = factory(Movie::class)->create([
            'title' => 'Movie 1',
            'director' => 'Director 1',
            'duration' => '14400',
            'description' => 'Lorem ipsum.',
        ]);
        $data = 5;

        $rateService = new RateService();
        $rate = $rateService->save($movie, $data);

        $this->json('POST', '/api/movie/' . $movie->id . '/rate', $rate->toArray())
            ->assertStatus(201);
    }

    /**
     * @return void
     */
    public function testsRatePostedIncorrectly()
    {
        $movie = factory(Movie::class)->create([
            'title' => 'Movie 1',
            'director' => 'Director 1',
            'duration' => '14400',
            'description' => 'Lorem ipsum.',
        ]);
        $data = 11;

        $rateService = new RateService();
        $rate = $rateService->save($movie, $data);

        $this->json('POST', '/api/movie/' . $movie->id . '/rate', $rate->toArray())
            ->assertStatus(422);
    }

    /**
     * @return void
     */
    public function testsMoviesHaveCorrectAverageRating()
    {
        $movie = factory(Movie::class)->create([
            'title' => 'Movie 1',
            'director' => 'Director 1',
            'duration' => '14400',
            'description' => 'Lorem ipsum.',
        ]);

        $ratesArray = array();
        $rateService = new RateService();
        for($i = 0; $i < 10; $i++){
            $rate = rand(0, 10);
            array_push($ratesArray, $rate);
            $rateService->save($movie, $rate);
        }

        $response = $this->json('GET', '/api/movie/' . $movie->id)
            ->assertStatus(200)
            ->assertJsonFragment([
                'rates_average' => array_sum($ratesArray) / count($ratesArray)
            ]);
    }
}
