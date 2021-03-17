<?php namespace Ln\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLnMovies2 extends Migration
{
    public function up()
    {
        Schema::table('ln_movies_', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ln_movies_', function($table)
        {
            $table->dropColumn('actors');
        });
    }
}
