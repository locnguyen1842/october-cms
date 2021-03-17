<?php namespace Ln\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
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
    public $table = 'ln_movies_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /** Relations */

    public $belongsToMany = [
        'genres' => [
            'Ln\Movies\Models\Genre',
            'table' => 'ln_movies_movies_genres',
            'order' => 'genre_title',
        ],
        'actors' => [
            'Ln\Movies\Models\Actor',
            'table' => 'ln_movies_movies_actors',
            'order' => 'first_name',
        ]
    ];

    public $attachOne = [
        'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'movie_gallery' =>  'System\Models\File'
    ];
}
