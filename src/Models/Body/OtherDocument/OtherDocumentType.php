<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Body\OtherDocument;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class OtherDocumentType extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
