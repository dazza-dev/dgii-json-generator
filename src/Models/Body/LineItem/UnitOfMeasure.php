<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Body\LineItem;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class UnitOfMeasure extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
