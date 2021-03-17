<?php namespace Ln\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Ln\Contact\Components\ContactForm' => 'contactform'
        ];
    }

    public function registerSettings()
    {
    }
}
