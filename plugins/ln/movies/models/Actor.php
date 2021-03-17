<?php namespace Ln\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
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
    public $table = 'ln_movies_actors';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'movies' => [
            'Ln\Movies\Models\Movie',
            'table' => 'ln_movies_movies_actors',
            'order' => 'name',
        ]
    ];

    public $attachOne = [
        'actorimage' => 'System\Models\File',
    ];

    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
