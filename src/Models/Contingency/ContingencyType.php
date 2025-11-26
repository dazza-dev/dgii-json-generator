<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Contingency;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class ContingencyType extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
