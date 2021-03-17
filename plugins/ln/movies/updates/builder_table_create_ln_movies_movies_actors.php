<?php namespace Ln\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLnMoviesMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('ln_movies_movies_actors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('movie_id')->unsigned();
            $table->integer('actor_id')->unsigned();
            $table->primary(['movie_id','actor_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ln_movies_movies_actors');
    }
}
