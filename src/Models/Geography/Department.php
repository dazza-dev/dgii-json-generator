<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Geography;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class Department extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
