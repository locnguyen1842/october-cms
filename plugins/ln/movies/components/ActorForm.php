<?php namespace Ln\Movies\Components;

use Cms\Classes\ComponentBase;
use Input;
use Flash;
use Redirect;
use Ln\Movies\Models\Actor;

class ActorForm extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Actor Form',
      'description' => 'Create Actor',
    ];
  }

  public function onSave()
  {
    $actor = Actor::create([
      'first_name' => Input::get('first_name'),
      'last_name' => Input::get('last_name'),
      'actorimage' => Input::file('actorimage'),
    ]);
    
    Flash::success('Actor added!');

    return Redirect::back();


  }
}