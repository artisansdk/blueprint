<?php

namespace ArtisanSdk\Blueprint\Elements;

class Resource extends Base
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $actions;

    /**
     * Setup element variables
     *
     * @return void
     */
    public function setup()
    {
        parent::setup();
        $this->actions = $this->mapActions();
    }

    /**
     * Map actions
     *
     * @return \Illuminate\Support\Collection
     */
    protected function mapActions()
    {
        return collect($this->reynaldo->getTransitions())
            ->map(function ($transition) {
                return new Action($transition, $this);
            });
    }
}
