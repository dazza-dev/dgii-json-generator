<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Body;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class ItemType extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
