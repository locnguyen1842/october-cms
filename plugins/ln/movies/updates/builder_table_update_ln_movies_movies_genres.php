<?php namespace Ln\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLnMoviesMoviesGenres extends Migration
{
    public function up()
    {
        Schema::table('ln_movies_movies_genres', function($table)
        {
            $table->integer('movie_id')->unsigned()->change();
            $table->integer('genre_id')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('ln_movies_movies_genres', function($table)
        {
            $table->integer('movie_id')->unsigned(false)->change();
            $table->integer('genre_id')->unsigned(false)->change();
        });
    }
}
