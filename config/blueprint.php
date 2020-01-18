<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route to Docs
    |--------------------------------------------------------------------------
    |
    | Find your rendered docs at the given path or set to false if you
    | want to use your own route and controller.
    |
    */

    'action' => '\ArtisanSdk\Blueprint\Http\Controller@index'
    'path'   => 'docs',
    'route'  => 'api.docs',

    /*
    |--------------------------------------------------------------------------
    | Condensed Navigation
    |--------------------------------------------------------------------------
    |
    | Find your rendered docs at the given route or set route to false if you
    | want to use your own route and controller. Provide a fully qualified
    | path to your API blueprint as well as to the required Drafter CLI.
    |
    */

    'condensed' => false,

    /*
    |--------------------------------------------------------------------------
    | Blueprint Files
    |--------------------------------------------------------------------------
    |
    | Provide a fully qualified path to the API Blueprint or an array manifest
    | of fully qualified paths to API Blueprint partials in the order they
    | should be combined to generate the full API Blueprint.
    |
    */

    'manifest' => [
        base_path('blueprint.apib'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Drafter Binary
    |--------------------------------------------------------------------------
    |
    | Provide a fully qualified path to the required Drafter binary.
    |
    */

    'drafter' => base_path('vendor/bin/drafter'),

];
