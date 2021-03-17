<?php namespace Ln\Movies;

use Ln\Movies\Models\Movie;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Ln\Movies\Components\Actors' => 'actors',
            'Ln\Movies\Components\ActorForm' => 'actorform',
        ];
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Ln\Movies\FormWidgets\ActorBox' => [
                'label' => 'Actor box field',
                'code' => 'actorbox',
            ]
        ];
    }

    public function boot()
    {
        \Event::listen('offline.sitesearch.query', function ($query) {

            // The controller is used to generate page URLs.
            $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

            // Search your plugin's contents
            $items = Movie::where('name', 'like', "%${query}%")
                ->orWhere('description', 'like', "%${query}%")
                ->get();

            // Now build a results array
            $results = $items->map(function ($item) use ($query, $controller) {

                // If the query is found in the title, set a relevance of 2
                $relevance = mb_stripos($item->title, $query) !== false ? 2 : 1;
                
                // Optional: Add an age penalty to older results. This makes sure that
                // newer results are listed first.
                // if ($relevance > 1 && $item->created_at) {
                //    $ageInDays = $item->created_at->diffInDays(\Illuminate\Support\Carbon::now());
                //    $relevance -= \OFFLINE\SiteSearch\Classes\Providers\ResultsProvider::agePenaltyForDays($ageInDays);
                // }

                return [
                    'title'     => $item->name,
                    'text'      => $item->description,
                    'url'       => $controller->pageUrl('movie-detail', ['slug' => $item->slug]),
                    'thumb'     => optional($item->poster)->first(),
                    'relevance' => $relevance,
                ];
            });

            return [
                'provider' => 'Movie', // The badge to display for this result
                'results'  => $results,
            ];
        });
    }
}
