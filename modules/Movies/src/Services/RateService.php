<?php

namespace Movies\Services;

use Illuminate\Support\Facades\DB;
use Movies\Models\Movie;
use Movies\Models\Rate;

class RateService
{
    /**
     * @param Movie $movie
     * @param $data
     * @return Rate $rate
     */
    public function save(Movie $movie, $data): Rate
    {
        $rate = new Rate();

        DB::beginTransaction();
        try {
            $rate->rate = $data;
            $rate->movie()->associate($movie);
            $rate->save();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e]);
        }
        DB::commit();

        return $rate;
    }
}