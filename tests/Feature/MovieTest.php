<?php

namespace Tests\Feature;

use Movies\Models\Movie;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * @return void
     */
    public function testMoviesAreListedWithCorrectData()
    {
        factory(Movie::class)->create([
            'title' => 'Movie 1',
            'director' => 'Director 1',
            'duration' => '14400',
            'description' => 'Lorem ipsum 1.',
        ]);

        factory(Movie::class)->create([
            'title' => 'Movie 2',
            'director' => 'Director 2',
            'duration' => '10000',
            'description' => 'Lorem ipsum 2.',
        ]);

        $response1 = $this->json('GET', '/api/movies')
            ->assertStatus(200)
            ->assertJsonFragment([
                'title' => 'Movie 1',
                'director' => 'Director 1',
                'duration' => '14400',
                'description' => 'Lorem ipsum 1.',
            ]);

        $response2 = $this->json('GET', '/api/movies')
            ->assertStatus(200)
            ->assertJsonFragment([
                'title' => 'Movie 2',
                'director' => 'Director 2',
                'duration' => '10000',
                'description' => 'Lorem ipsum 2.',
            ]);
    }
}
