<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Body\Tax;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class TaxType extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
