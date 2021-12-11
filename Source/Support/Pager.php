<?php

namespace Source\Support;

use Brito101\Paginator\Paginator;

/**
 * @package Source\Support
 */
class Pager extends Paginator
{
    /**
     * Pager constructor.
     *
     * @param string $link
     * @param null|string $title
     * @param array|null $first
     * @param array|null $last
     */
    public function __construct(string $link, ?string $title = "Página", ?array $first = ["Primeira página", "&lt;&lt;"], ?array $last = ["Última página", "&gt;&gt;"])
    {
        parent::__construct($link, $title, $first, $last);
    }
}
