<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Issuer;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class EstablishmentType extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
