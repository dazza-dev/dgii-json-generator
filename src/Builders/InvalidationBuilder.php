<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\Invalidation\Invalidation;

class InvalidationBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance for invalidation
     */
    protected function createDocument(): Invalidation
    {
        return new Invalidation($this->documentData);
    }

    /**
     * Get document type for invalidation
     */
    protected function getDocumentType(): string
    {
        return 'invalidation';
    }

    /**
     * Get the invalidation instance
     */
    public function getInvalidation(): Invalidation
    {
        return $this->getDocument();
    }
}
