<?php

namespace Movies\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Actor
 * @package Movies\Models
 * @property string $name
 */
class Actor extends Model
{
    /**
     * Indicates actors table name in database
     * @var string $table
     */
    protected $table = 'actors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movie');
    }

}