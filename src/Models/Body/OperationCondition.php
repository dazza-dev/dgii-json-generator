<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Body;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class OperationCondition extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
