<?php namespace Ln\Movies\Models;

use Model;

/**
 * Model
 */
class Genre extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ln_movies_genres';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    public $belongsToMany = [
        'movies' => [
            'Ln\Movies\Models\Movie',
            'table' => 'ln_movies_movies_genres',
            'order' => 'name',
        ]
    ];
}
