<?php

namespace DazzaDev\DgiiJsonGenerator\Factories;

use DazzaDev\DgiiJsonGenerator\Builders\BaseDocumentBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\ContingencyBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\CreditNoteBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\DebitNoteBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\DeliveryNoteBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\DonationReceiptBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\ExemptTaxpayerInvoiceBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\ExportInvoiceBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\InvalidationBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\InvoiceBuilder;
use DazzaDev\DgiiJsonGenerator\Builders\TaxCreditInvoiceBuilder;
use InvalidArgumentException;

class DocumentBuilderFactory
{
    public const INVOICE = 'invoice';

    public const CREDIT_NOTE = 'credit-note';

    public const DEBIT_NOTE = 'debit-note';

    public const DELIVERY_NOTE = 'delivery-note';

    public const DONATION_RECEIPT = 'donation-receipt';

    public const EXPORT_INVOICE = 'export-invoice';

    public const EXEMPT_TAXPAYER_INVOICE = 'exempt-taxpayer-invoice';

    public const TAX_CREDIT_INVOICE = 'tax-credit-invoice';

    public const CONTINGENCY = 'contingency';

    public const INVALIDATION = 'invalidation';

    /**
     * Create a document builder based on document type name
     */
    public static function create(string $environmentCode, string $documentType, array $documentData): BaseDocumentBuilder
    {
        return match ($documentType) {
            self::INVOICE => new InvoiceBuilder($environmentCode, $documentData),
            self::CREDIT_NOTE => new CreditNoteBuilder($environmentCode, $documentData),
            self::DEBIT_NOTE => new DebitNoteBuilder($environmentCode, $documentData),
            self::DELIVERY_NOTE => new DeliveryNoteBuilder($environmentCode, $documentData),
            self::DONATION_RECEIPT => new DonationReceiptBuilder($environmentCode, $documentData),
            self::EXPORT_INVOICE => new ExportInvoiceBuilder($environmentCode, $documentData),
            self::EXEMPT_TAXPAYER_INVOICE => new ExemptTaxpayerInvoiceBuilder($environmentCode, $documentData),
            self::TAX_CREDIT_INVOICE => new TaxCreditInvoiceBuilder($environmentCode, $documentData),
            self::CONTINGENCY => new ContingencyBuilder($environmentCode, $documentData),
            self::INVALIDATION => new InvalidationBuilder($environmentCode, $documentData),
            default => throw new InvalidArgumentException("Unsupported document type: {$documentType}")
        };
    }

    /**
     * Create an invoice builder
     */
    public static function createInvoice(string $environmentCode, array $documentData): InvoiceBuilder
    {
        return new InvoiceBuilder($environmentCode, $documentData);
    }

    /**
     * Create a credit note builder
     */
    public static function createCreditNote(string $environmentCode, array $documentData): CreditNoteBuilder
    {
        return new CreditNoteBuilder($environmentCode, $documentData);
    }

    /**
     * Create a debit note builder
     */
    public static function createDebitNote(string $environmentCode, array $documentData): DebitNoteBuilder
    {
        return new DebitNoteBuilder($environmentCode, $documentData);
    }

    /**
     * Create a delivery note builder
     */
    public static function createDeliveryNote(string $environmentCode, array $documentData): DeliveryNoteBuilder
    {
        return new DeliveryNoteBuilder($environmentCode, $documentData);
    }

    /**
     * Create a donation receipt builder
     */
    public static function createDonationReceipt(string $environmentCode, array $documentData): DonationReceiptBuilder
    {
        return new DonationReceiptBuilder($environmentCode, $documentData);
    }

    /**
     * Create an export invoice builder
     */
    public static function createExportInvoice(string $environmentCode, array $documentData): ExportInvoiceBuilder
    {
        return new ExportInvoiceBuilder($environmentCode, $documentData);
    }

    /**
     * Create an exempt taxpayer invoice builder
     */
    public static function createExemptTaxpayerInvoice(string $environmentCode, array $documentData): ExemptTaxpayerInvoiceBuilder
    {
        return new ExemptTaxpayerInvoiceBuilder($environmentCode, $documentData);
    }

    /**
     * Create a tax credit invoice builder
     */
    public static function createTaxCreditInvoice(string $environmentCode, array $documentData): TaxCreditInvoiceBuilder
    {
        return new TaxCreditInvoiceBuilder($environmentCode, $documentData);
    }

    /**
     * Create a contingency builder
     */
    public static function createContingency(string $environmentCode, array $documentData): ContingencyBuilder
    {
        return new ContingencyBuilder($environmentCode, $documentData);
    }

    /**
     * Create an invalidation builder
     */
    public static function createInvalidation(string $environmentCode, array $documentData): InvalidationBuilder
    {
        return new InvalidationBuilder($environmentCode, $documentData);
    }
}
