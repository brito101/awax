<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Certificate
 * @package Source\Models
 */
class Certificate extends Model {

    /**
     * Certificate constructor.
     */
    public function __construct() {
        parent::__construct("certificates", ["id"], ["title", "uri"]);
    }

    /**
     * @return bool
     */
    public function save(): bool {
        $checkUri = (new Certificate())->find("uri = :uri AND id != :id", "uri={$this->uri}&id={$this->id}");

        if ($checkUri->count()) {
            $this->uri = "{$this->uri}-{$this->lastId()}";
        }

        return parent::save();
    }

}
