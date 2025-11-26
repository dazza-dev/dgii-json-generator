<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Invalidation;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class InvalidationType extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
