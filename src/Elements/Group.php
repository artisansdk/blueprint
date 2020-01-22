<?php

namespace ArtisanSdk\Blueprint\Elements;

class Group extends Base
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $resources;

    /**
     * Setup element variables
     *
     * @return void
     */
    protected function setup()
    {
        parent::setup();
        $this->resources = $this->mapResources();
    }

    /**
     * Map resources
     *
     * @return \Illuminate\Support\Collection
     */
    protected function mapResources()
    {
        return collect($this->reynaldo->getResources())
            ->map(function ($resource) {
                return new Resource($resource, $this);
            });
    }
}
