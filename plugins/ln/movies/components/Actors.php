<?php namespace Ln\Movies\Components;

use Cms\Classes\ComponentBase;
use Ln\Movies\Models\Actor;

class Actors extends ComponentBase
{
  public $actors;

  private $defaultResults = 20;

  public function componentDetails()
  {
    return [
      'name' => 'Actor list',
      'description' => 'List of actors',
    ];
  }

  public function defineProperties()
  {
    return [
      'results' => [
        'title' => 'Number of Actors',
        'description' => 'How many actors do you want to display?',
        'default' => $this->defaultResults,
        'validationPattern' => '^[0-9]+$',
        'validationMessage' => 'Only numbers allowed'
      ],
      'sortOrder' => [
        'title' => 'Sort Actors',
        'description' => 'Sort those actors',
        'type' => 'dropdown',
        'default' => 'name asc'
      ]
    ];
  }

  public function getSortOrderOptions() {
    return [
      'name asc' => 'Name (ascending)',
      'name desc' => 'Name (descending)',
    ];
  }

  public function onRun()
  {
    $this->actors = $this->loadActors();
  }

  protected function loadActors() {
    $query = Actor::query();

    if($this->property('sortOrder') == 'name desc') {
      $query->orderBy('first_name', 'desc');
    }else {
      $query->orderBy('first_name');
    }
    $totalRecord = $this->property('results') > 0 ? $this->property('results') : $this->defaultResults;

    return $query->simplePaginate($totalRecord);
  }
}