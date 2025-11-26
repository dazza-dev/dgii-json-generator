<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Base;

class BillingModel extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
