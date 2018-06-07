<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $connection = 'mysql2';

    public $table = "pokemon_profiles";
    public $timestamps = false;

    protected $fillable = [
        'id', 'form', 'abilities', 'stats', 'name', 'weight',
        'moves', 'sprites', 'held_items', 'location_area_encounters',
        'height', 'is_default', 'species', 'order', 'game_indices',
        'base_experience', 'types'
    ];

}
