<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\Contingency\Contingency;
use DazzaDev\DgiiJsonGenerator\Models\CreditNote;
use DazzaDev\DgiiJsonGenerator\Models\DebitNote;
use DazzaDev\DgiiJsonGenerator\Models\DeliveryNote;
use DazzaDev\DgiiJsonGenerator\Models\DonationReceipt;
use DazzaDev\DgiiJsonGenerator\Models\ExemptTaxpayerInvoice;
use DazzaDev\DgiiJsonGenerator\Models\ExportInvoice;
use DazzaDev\DgiiJsonGenerator\Models\Invalidation\Invalidation;
use DazzaDev\DgiiJsonGenerator\Models\Invoice;
use DazzaDev\DgiiJsonGenerator\Models\TaxCreditInvoice;

abstract class BaseDocumentBuilder
{
    protected string $environmentCode;

    protected array $documentData;

    protected mixed $document;

    /**
     * Constructor
     */
    public function __construct(string $environmentCode, array $documentData)
    {
        $this->environmentCode = $environmentCode;
        $this->documentData = $documentData;
        $this->documentData['environment'] = $this->environmentCode;

        // Initialize document (implemented by child classes)
        $this->document = $this->createDocument();
    }

    /**
     * Get document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Get document JSON
     */
    public function toJson(): string
    {
        return $this->document->toJson();
    }

    /**
     * Get version
     */
    public function getVersion(): int
    {
        return $this->document->getVersion();
    }

    /**
     * Get document generation code
     */
    public function getGenerationCode(): string
    {
        return $this->document->getGenerationCode();
    }

    /**
     * Get control number
     */
    public function getControlNumber(): string
    {
        return $this->document->getControlNumber();
    }

    /**
     * Create document instance (must be implemented by child classes)
     */
    abstract protected function createDocument(): Invoice|CreditNote|DebitNote|DeliveryNote|DonationReceipt|ExportInvoice|ExemptTaxpayerInvoice|TaxCreditInvoice|Contingency|Invalidation;

    /**
     * Get document type for XML generation (must be implemented by child classes)
     */
    abstract protected function getDocumentType(): string;
}
