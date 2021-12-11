<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class CategoryPortfolio
 * @package Source\Models
 */
class CategoryPortfolio extends Model
{
    /**
     * CategoryPortfolio constructor.
     */
    public function __construct()
    {
        parent::__construct("categories_portfolio", ["id"], ["title", "description"]);
    }

    /**
     * @param string $uri
     * @param string $columns
     * @return null|CategoryPortfolio
     */
    public function findByUri(string $uri, string $columns = "*"): ?CategoryPortfolio
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    /**
     * @return Portfolio
     */
    public function posts(): Portfolio
    {
        return (new Portfolio())->find("category = :id", "id={$this->id}");
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        $checkUri = (new CategoryPortfolio())->find("uri = :uri AND id != :id", "uri={$this->uri}&id={$this->id}");

        if ($checkUri->count()) {
            $this->uri = "{$this->uri}-{$this->lastId()}";
        }

        return parent::save();
    }
}
