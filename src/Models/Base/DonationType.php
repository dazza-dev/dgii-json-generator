<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Base;

class DonationType extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
