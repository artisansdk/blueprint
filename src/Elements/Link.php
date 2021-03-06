<?php

namespace ArtisanSdk\Blueprint\Elements;

class Link extends Mapping
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $descriptionHtml;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $required;

    /**
     * @var array
     */
    public $values;

    /**
     * @var string
     */
    public $example;

    /**
     * @var string
     */
    public $defaultValue;

    /**
     * Link constructor
     *
     * @param mixed $element
     * @param mixed $parent
     */
    public function __construct($element, $parent = null)
    {
        parent::__construct($element, $parent);
        $this->setup();
    }

    /**
     * Setup element variables
     *
     * @return void
     */
    protected function setup()
    {
        $this->name = $this->reynaldo->name;
        $this->description = $this->reynaldo->description;
        $this->descriptionHtml = resolve('Parsedown')->parse($this->reynaldo->description);
        $this->type = $this->reynaldo->dataType;
        $this->required = $this->reynaldo->required;
        $this->example = $this->reynaldo->example;
        $this->defaultValue = $this->mapDefault($this->reynaldo->default);
        $this->values = $this->reynaldo->values;
    }

    /**
     * Map default value to string
     *
     * @param mixed $default
     * @return string
     */
    protected function mapDefault($default)
    {
        return is_array($default) ? $default[0]['content'] : $default;
    }
}
