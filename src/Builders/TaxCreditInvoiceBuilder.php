<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\TaxCreditInvoice;

class TaxCreditInvoiceBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance for tax credit invoice
     */
    protected function createDocument(): TaxCreditInvoice
    {
        return new TaxCreditInvoice($this->documentData);
    }

    /**
     * Get document type for tax credit invoice
     */
    protected function getDocumentType(): string
    {
        return 'tax-credit-invoice';
    }

    /**
     * Get the tax credit invoice instance
     */
    public function getTaxCreditInvoice(): TaxCreditInvoice
    {
        return $this->getDocument();
    }
}
