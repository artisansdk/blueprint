<?php

namespace ArtisanSdk\Blueprint\Http;

use ArtisanSdk\Blueprint\Service;
use Illuminate\Routing\Controller;

class Controller extends Controller
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
        return view('blueprint::index')
            ->with('api', $service->parse(config('blueprint.manifest'))->api());
    }
}