<?php

namespace ArtisanSdk\Blueprint\Elements;

use Hmaus\Reynaldo\Elements\ApiDescriptionRoot;
use ArtisanSdk\Blueprint\Parser;

class Api
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $meta;

    /**
     * @var string
     */
    public $format;

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $descriptionHtml;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $descriptionHeadings;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $resourceGroups;

    /**
     * @var \Hmaus\Reynaldo\Elements\ApiDescriptionRoot
     */
    protected $refraction;

    /**
     * @var \ArtisanSdk\Blueprint\Parser
     */
    protected $parser;

    /**
     * Api constructor
     *
     * @param \Hmaus\Reynaldo\Elements\ApiDescriptionRoot $refraction
     * @param \ArtisanSdk\Blueprint\Parser $parser
     */
    public function __construct(ApiDescriptionRoot $refraction, Parser $parser)
    {
        $this->refraction = $refraction;
        $this->parser = $parser;
        $this->setup();
    }

    /**
     * Setup element variables
     *
     * @return void
     */
    protected function setup()
    {
        $this->name = $this->refraction->getTitle();
        $this->meta = collect($this->refraction->getApiMetaData());
        $this->format = !empty($this->meta['FORMAT']) ? $this->meta['FORMAT'] : '';
        $this->host = !empty($this->meta['HOST']) ? $this->meta['HOST'] : '';
        $this->resourceGroups = $this->mapResourceGroups();
        $this->parseDescription();
    }

    /**
     * Parse description to markup and get headings
     *
     * @return void
     */
    protected function parseDescription()
    {
        $this->parser->parse($this->refraction->getApiDocumentDescription());

        $this->descriptionHtml = $this->parser->getCopyText();
        $this->descriptionHeadings = collect($this->parser->getHeadings())
            ->map(function ($heading) {
                return (object) [
                    'id' => $heading['attributes']['id'],
                    'name' => $heading['name'],
                    'text' => $heading['text'],
                    'level' => $heading['level']
                ];
            })->values();
    }

    /**
     * Map resource Groups
     *
     * @return \Illuminate\Support\Collection
     */
    protected function mapResourceGroups()
    {
        return collect($this->refraction->getResourceGroups())->map(function ($group) {
            return new ResourceGroup($group);
        });
    }
}
