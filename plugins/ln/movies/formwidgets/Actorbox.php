<?php namespace Ln\Movies\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Ln\Movies\Models\Actor;

class ActorBox extends FormWidgetBase
{
  public function widgetDetails()
  {
    return [
      'name' => 'Actor Box',
      'description' => 'Field for adding actors'

    ];
  }

  public function prepareVars()
  {
    $this->vars['id'] = $this->model;
    $this->vars['actors'] = Actor::all();
    $this->vars['name'] = $this->formField->getName(). '[]';
    $this->vars['selectedValues'] = $this->getLoadValue() ?? [];
  }

  public function render() {
    $this->prepareVars();
    return $this->makePartial('widget');
  }

  public function getSaveValue($value)
  {
    $newArr = [];

    if($value) {
      foreach($value as $actorId) {
        if(is_numeric($actorId)) {
          $newArr[] = $actorId;
        }else {
          $fullNameArr = explode(" ", $actorId);
  
          $newActor = Actor::create([
            'first_name' => $fullNameArr[0],
            'last_name' => implode(" ", array_slice($fullNameArr, 1))
          ]);
          
          $newArr[] = $newActor->id;
        }

      }
    }

    return $newArr;
  }

  public function loadAssets()
  {
    $this->addJs('js/select2.js');
  }
}