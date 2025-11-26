<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\DonationReceipt;

class DonationReceiptBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): DonationReceipt
    {
        return new DonationReceipt($this->documentData);
    }

    /**
     * Get document type for donation receipt
     */
    protected function getDocumentType(): string
    {
        return 'donation-receipt';
    }

    /**
     * Get the donation receipt instance
     */
    public function getDonationReceipt(): DonationReceipt
    {
        return $this->getDocument();
    }
}
