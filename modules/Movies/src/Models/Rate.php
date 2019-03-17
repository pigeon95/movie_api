<?php

namespace Movies\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rate
 * @package Movies\Models
 * @property int $rate
 */
class Rate extends Model
{
    /**
     * Indicates actors table name in database
     * @var string $table
     */
    protected $table = 'rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rate', 'movie_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->BelongsTo(Movie::class);
    }

}