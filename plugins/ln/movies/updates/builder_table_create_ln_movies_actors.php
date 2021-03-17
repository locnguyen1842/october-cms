<?php namespace Ln\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLnMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('ln_movies_actors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ln_movies_actors');
    }
}
