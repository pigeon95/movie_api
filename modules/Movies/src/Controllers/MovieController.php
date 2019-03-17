<?php
namespace Movies\Controllers;

use App\Http\Controllers\Controller;
use Movies\Models\Movie;
use Movies\Services\MovieService;

class MovieController extends Controller
{
    /**
     * @var MovieService
     */
    public $movieService;

    /**
     * MovieService constructor.
     *
     * @param MovieService $movieService
     */
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function getMovies(){
        $movies = Movie::all();

        $response = [
            'movies' => $movies
        ];

        return response()->json($response, 200);
    }

    /**
     * @param Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function getMovie(Movie $movie)
    {
        return response()->json($this->movieService->getMovieDetails($movie),200);
    }
}