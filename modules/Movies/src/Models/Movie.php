<?php

namespace Movies\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 * @package Movies\Models
 * @property int $id
 * @property string $title
 * @property string $director
 * @property \DateTime $duration
 * @property string $description
 */
class Movie extends Model
{
    /**
     * Indicates actors table name in database
     * @var string $table
     */
    protected $table = 'movies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'director', 'description', 'duration'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

}