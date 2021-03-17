<?php namespace Ln\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;
use ValidationException;

class ContactForm extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Contact Form',
      'description' => 'Simple contact form',
    ];
  }

  public function onSend()
  {
    $data = post();

    $rules = [
      'name' => ['required'],
      'email' => ['required', 'email'],
    ];

    $validator = Validator::make($data, $rules);

    if($validator->fails()) {
      throw new ValidationException($validator);
    }


    $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content')];

      $res = Mail::send('ln.contact::mail.message', $vars, function($message) {
        $message->to('youremail@gmail.com', 'Admin Person');
    });
  }
}