<?php
namespace Movies\Controllers;

use App\Http\Controllers\Controller;
use Movies\Models\Movie;
use Movies\Requests\RateRequest;
use Movies\Services\RateService;

class RateController extends Controller
{
    /**
     * @var RateService
     */
    public $rateService;

    /**
     * RateService constructor.
     *
     * @param RateService $rateService
     */
    public function __construct(RateService $rateService)
    {
        $this->rateService = $rateService;
    }

    /**
     * @param RateRequest $request
     * @param Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function postRate(RateRequest $request, Movie $movie)
    {
        if(!$movie){
            return response()->json(['message' => 'Document not found'], 404);
        }
        $rate = $this->rateService->save($movie, $request->input('rate'));

        return response()->json(['rate' => $rate], 201);
    }
}