<?php namespace Ln\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLnMovies extends Migration
{
    public function up()
    {
        Schema::table('ln_movies_', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ln_movies_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
