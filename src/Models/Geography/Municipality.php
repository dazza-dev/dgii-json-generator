<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Geography;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class Municipality extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
