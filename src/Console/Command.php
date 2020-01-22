<?php

namespace ArtisanSdk\Blueprint\Console;

use Illuminate\Console\Command as BaseCommand;
use Illuminate\Foundation\Application;

abstract class Command extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $prefix = 'blueprint';

    /**
     * Construct the command name with optional prefix.
     */
    public function __construct()
    {
        if ( ! $this->isStandalone()) {
            $this->name = $this->prefix.':'.$this->name;
            $this->signature = $this->prefix.':'.$this->signature;
        }

        parent::__construct();
    }

    /**
     * Is the application running as a standlone console.
     *
     * @return bool
     */
    protected function isStandalone(): bool
    {
        return Application::class !== get_class(app());
    }

    /**
     * Get the base path.
     *
     * @param string $path
     *
     * @return string
     */
    protected function basepath(string $path): string
    {
        return getcwd().DIRECTORY_SEPARATOR.$path;
    }
}
