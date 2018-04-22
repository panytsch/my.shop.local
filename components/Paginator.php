<?php

namespace components;

/**
 * Class Paginator
 * @package components
 */

class Paginator
{
    /**
     * @var array
     */
    public $buttons = array();
    /**
     * @var int
     */
    private $itemsCount;
    /**
     * @var int
     */
    private $itemsPerPage;
    /**
     * @var float|int
     */
    private $currentPage;

    /**
     * Paginator constructor.
     * @param int $itemsCount
     * @param int $itemsPerPage
     * @param int $currentPage
     */
    public function __construct(int $itemsCount,int $itemsPerPage = 5,int $currentPage = 1)
    {
        if (!$currentPage) {
            return;
        }

        $pagesCount = ceil($itemsCount / $itemsPerPage);

        if ($pagesCount == 1) {
            return;
        }

        if ($currentPage > $pagesCount) {
            $currentPage = $pagesCount;
        }

        for ($i = 1; $i <= $pagesCount; $i++) {
            $active = $currentPage != $i;
            $this->buttons[] = new Button($i, $active);
        }

        $this->itemsCount = $itemsCount;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
    }
}