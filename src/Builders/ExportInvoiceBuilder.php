<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\ExportInvoice;

class ExportInvoiceBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance for export invoice
     */
    protected function createDocument(): ExportInvoice
    {
        return new ExportInvoice($this->documentData);
    }

    /**
     * Get document type for export invoice
     */
    protected function getDocumentType(): string
    {
        return 'export-invoice';
    }

    /**
     * Get the export invoice instance
     */
    public function getExportInvoice(): ExportInvoice
    {
        return $this->getDocument();
    }
}
