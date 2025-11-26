<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\ExemptTaxpayerInvoice;

class ExemptTaxpayerInvoiceBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance for exempt taxpayer invoice
     */
    protected function createDocument(): ExemptTaxpayerInvoice
    {
        return new ExemptTaxpayerInvoice($this->documentData);
    }

    /**
     * Get document type for exempt taxpayer invoice
     */
    protected function getDocumentType(): string
    {
        return 'exempt-taxpayer-invoice';
    }

    /**
     * Get the exempt taxpayer invoice instance
     */
    public function getExemptTaxpayerInvoice(): ExemptTaxpayerInvoice
    {
        return $this->getDocument();
    }
}
