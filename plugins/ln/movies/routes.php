<?php

use Ln\Movies\Models\Movie;
use Ln\Movies\Models\Genre;

Route::get('/hello', function() {
    echo 'Hello';
});



Route::get('/populate-movies', function(){
    
    $faker = Faker\Factory::create();
    
    $movies = Movie::all();
    

    foreach ($movies as $index => $movie) {
        $genres = Genre::all()->random(2);
        
        $movie->genres = $genres;
        
        $movie->created_at = $faker->date($format = 'Y-m-d H:i:s', $max = 'now');
        $movie->published = $faker->boolean($chanceOfGettingTrue = 50);
        $movie->save();
    }

    return $movies;

});
