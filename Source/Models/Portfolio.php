<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Portfolio
 * @package Source\Models
 */
class Portfolio extends Model
{
    /**
     * Portfolio constructor.
     */
    public function __construct()
    {
        parent::__construct("portfolio", ["id"], ["title", "uri", "subtitle", "content"]);
    }

    /**
     * @param null|string $terms
     * @param null|string $params
     * @param string $columns
     * @return mixed|Model
     */
    public function findPost(?string $terms = null, ?string $params = null, string $columns = "*")
    {
        $terms = "status = :status AND post_at <= NOW()" . ($terms ? " AND {$terms}" : "");
        $params = "status=post" . ($params ? "&{$params}" : "");

        return parent::find($terms, $params, $columns);
    }

    /**
     * @param string $uri
     * @param string $columns
     * @return null|Portfolio
     */
    public function findByUri(string $uri, string $columns = "*"): ?Portfolio
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    /**
     * @return null|User
     */
    public function author(): ?User
    {
        if ($this->author) {
            return (new User())->findById($this->author);
        }
        return null;
    }

    /**
     * @return null|CategoryPortfolio
     */
    public function category(): ?CategoryPortfolio
    {
        if ($this->category) {
            return (new CategoryPortfolio())->findById($this->category);
        }
        return null;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        $checkUri = (new Portfolio())->find("uri = :uri AND id != :id", "uri={$this->uri}&id={$this->id}");

        if ($checkUri->count()) {
            $this->uri = "{$this->uri}-{$this->lastId()}";
        }

        return parent::save();
    }
}
