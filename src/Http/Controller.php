<?php

namespace ArtisanSdk\Blueprint\Http;

use ArtisanSdk\Blueprint\Service;
use ArtisanSdk\Blueprint\Providers\Configs;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Show the API Blueprint documentation.
     *
     * @param \ArtisanSdk\Blueprint\Service $service
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Service $service)
    {
        $blueprint = $service
            ->parse(config(Configs::PACKAGE.'::blueprint.manifest'))
            ->api();

        return view('blueprint::index')
            ->with('blueprint', $blueprint);
    }
}
