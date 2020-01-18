<?php

namespace ArtisanSdk\Blueprint;

use Illuminate\Support\Str;
use Parsedown;

class Parser extends Parsedown
{
    /**
     * @var string
     */
    protected $markup;

    /**
     * @var array
     */
    protected $headings = [];

    /**
     * Parse markdown.
     *
     * @param string $text
     *
     * @return \ArtisanSdk\Blueprint\Parser
     */
    public function parse($text)
    {
        $this->headings = [];
        $this->markup = parent::text($text);

        return $this;
    }

    /**
     * Get HTML markup from parsed markdown.
     *
     * @return string
     */
    public function getCopyText()
    {
        return $this->markup;
    }

    /**
     * Get headings from parsed markdown.
     *
     * @return array
     */
    public function getHeadings()
    {
        return $this->headings;
    }

    /**
     * Handle markdown elements.
     *
     * @param array $element
     *
     * @return string
     */
    protected function element(array $element)
    {
        if ($this->isHeader($element)) {
            $element['attributes']['id'] = sprintf(
                'description-%s-%d',
                Str::slug($element['text'], '-'),
                count($this->headings)
            );
            $element['level'] = $element['name'][1];
            array_push($this->headings, $element);
        }

        return parent::element($element);
    }

    /**
     * Evaluate header tag.
     *
     * @param array $element
     *
     * @return boolean
     */
    protected function isHeader(array $element)
    {
        return preg_match('/^[hH][1-6]$/', $element['name']) ? true : false;
    }
}
