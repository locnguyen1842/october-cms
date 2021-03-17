<?php namespace Ln\Movies\Updates;

use Ln\Movies\Models\Movie;
use October\Rain\Database\Updates\Seeder;
use Faker;

class SeedMovies extends Seeder
{
  public function run()
  {
    $faker = Faker\Factory::create();

    for ($i=0; $i < 100; $i++) { 
      Movie::create([
        'name' => $name = $faker->sentence(3),
        'slug' => str_slug($name),
        'description' => $faker->paragraph(),
        'year' => $faker->year(),
      ]);
    }

  }
}