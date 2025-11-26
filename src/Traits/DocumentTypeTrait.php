<?php

namespace DazzaDev\DgiiJsonGenerator\Traits;

use DazzaDev\DgiiJsonGenerator\DataLoader;
use DazzaDev\DgiiJsonGenerator\Models\Base\DocumentType;

trait DocumentTypeTrait
{
    /**
     * Document type
     */
    private DocumentType $documentType;

    /**
     * Get document type
     */
    public function getDocumentType(): DocumentType
    {
        return $this->documentType;
    }

    /**
     * Set document type
     */
    public function setDocumentType(string $documentTypeCode): void
    {
        $documentType = (new DataLoader('tipos-documento'))->getByCode($documentTypeCode);

        $this->documentType = new DocumentType($documentType);
    }
}
