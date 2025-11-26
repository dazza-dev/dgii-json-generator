<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\Contingency\Contingency;

class ContingencyBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance for contingency
     */
    protected function createDocument(): Contingency
    {
        return new Contingency($this->documentData);
    }

    /**
     * Get document type for contingency
     */
    protected function getDocumentType(): string
    {
        return 'contingency';
    }

    /**
     * Get the contingency invoice instance
     */
    public function getContingency(): Contingency
    {
        return $this->getDocument();
    }
}
