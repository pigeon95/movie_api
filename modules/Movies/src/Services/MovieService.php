<?php

namespace Movies\Services;

use Movies\Models\Movie;

class MovieService
{
    /**
     * @param Movie $movie
     * @return array $response
     */
    public function getMovieDetails(Movie $movie): array
    {
        $response = [
            'movie' => [
                'id' => $movie->id,
                'title' => $movie->title,
                'director' => $movie->director,
                'duration' => $movie->duration,
                'description' => $movie->description,
                'rates_average' =>  $this->getRatesAverage($movie),
                'actors' => $this->getActors($movie)
            ]
        ];

        return $response;
    }

    /**
     * @param Movie $movie
     * @return mixed
     */
    public function getRatesAverage(Movie $movie)
    {
        $rates = array();
        foreach ($movie->rates as $rate) {
            array_push($rates, $rate->rate);
        }
        if (count($rates) > 0) {
            return array_sum($rates) / count($rates);
        } else {
            return 'no ratings';
        }
    }

    /**
     * @param Movie $movie
     * @return mixed $actors
     */
    public function getActors(Movie $movie)
    {
        $actors = $movie->actors->map(function ($actor) {
            return collect($actor->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return $actors;
    }
}