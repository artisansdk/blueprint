<?php

namespace ArtisanSdk\Blueprint;

use Hmaus\DrafterPhp\Drafter;
use Hmaus\Reynaldo\Parser\RefractParser;
use ArtisanSdk\Blueprint\Elements\Api;
use ArtisanSdk\Blueprint\Parser;

class Service
{
    /**
     * The API Blueprint Drafter wrapper.
     *
     * @var \Hmaus\DrafterPhp\Drafter
     */
    protected $drafter;

    /**
     * The API Blueprint to PHP refraction parser.
     *
     * @var \Hmaus\Reynaldo\Parser\RefractParser
     */
    protected $refractor;

    /**
     * The refracted API Blueprint.
     *
     * @var \Hmaus\Reynaldo\Elements\ApiDescriptionRoot
     */
    protected $refraction;

    /**
     * The API Blueprint refraction parser.
     *
     * @var \ArtisanSdk\Blueprint\Parser
     */
    protected $parser;

    /**
     * Inject service dependencies.
     *
     * @param \Hmaus\DrafterPhp\Drafter $drafter
     * @param \Hmaus\Reynaldo\Parser\RefractParser $refractor
     * @param \ArtisanSdk\Blueprint\Parser $parser
     */
    public function __construct(Drafter $drafter, RefractParser $refractor, Parser $parser)
    {
        $this->drafter = $drafter;
        $this->refractor = $refractor;
        $this->parser = $parser;
    }

    /**
     * Parse API Blueprint manifest.
     *
     * @param string[] $manifest
     *
     * @return Blueprint
     */
    public function parse($manifest)
    {
        $contents = [];
        foreach((array) $manifest as $file) {
            $contents[] = file_get_contents($file);
        }
        $input = base_path('blueprint.apib');
        file_put_contents($input, implode(PHP_EOL, $contents));

        $this->refraction = $this->refractor
            ->parse(json_decode(
                $this->drafter
                    ->input($input)
                    ->format('json')
                    ->run()
                , true)
            )->getApi();

        return $this;
    }

    /**
     * Get Blueprint API object for rendering.
     *
     * @return \ArtisanSdk\Blueprint\Elements\Api
     */
    public function api()
    {
        return new Api($this->refraction, $this->parser);
    }
}
