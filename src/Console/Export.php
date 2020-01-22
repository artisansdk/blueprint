<?php

namespace ArtisanSdk\Blueprint\Console;

use Symfony\Component\Process\Process;
use ArtisanSdk\Blueprint\Service;
use ArtisanSdk\Blueprint\Providers\Configs;

class Export extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export
        {--format=html : The export format.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export the API Blueprint to the format.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ansi = $this->option('ansi') || ! $this->option('no-ansi');
        $this->getOutput()->getFormatter()->setDecorated($ansi);

        $blueprint = app(Service::class)
            ->parse(config(Configs::PACKAGE.'::blueprint.manifest'))
            ->api();

        $html = view('blueprint::index')
            ->with('blueprint', $blueprint)
            ->render();

        $file = config(Configs::PACKAGE.'::blueprint.path').'/index.html';
        $path = public_path($file);

        $directory = dirname($path);
        if( ! is_dir($directory) ) {
            mkdir($directory, $mode = 0755, $recursive = true);
        }

        file_put_contents($path, $html);

        $this->line("<info>Blueprint exported as HTML:</info> {$file}");
    }
}
