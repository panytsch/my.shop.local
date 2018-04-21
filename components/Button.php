<?php

namespace components;

/**
 * Class Button
 * @package components
 */
class Button
{
    /**
     * @var
     */
    public $page;
    /**
     * @var null
     */
    public $text;
    /**
     * @var bool
     */
    public $isActive;

    /**
     * Button constructor.
     * @param $page
     * @param bool $isActive
     * @param null|string $text
     */
    public function __construct($page, $isActive = true, $text = null)
    {
        $this->page = $page;
        $this->text = is_null($text) ? $page : $text;
        $this->isActive = $isActive;
    }

    public function activate()
    {
        $this->isActive = true;
    }

    public function deactivate()
    {
        $this->isActive = false;
    }

}