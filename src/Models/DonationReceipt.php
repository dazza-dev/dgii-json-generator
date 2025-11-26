<?php

namespace DazzaDev\DgiiJsonGenerator\Models;

use DazzaDev\DgiiJsonGenerator\Models\Base\Document;
use DazzaDev\DgiiJsonGenerator\Traits\JsonTrait;

class DonationReceipt extends Document
{
    use JsonTrait;

    /**
     * Donation receipt constructor
     */
    public function __construct(array $data = [])
    {
        $this->setDocumentType('15');
        $this->setVersion(1);

        // Initialize donation receipt data
        parent::__construct($data);
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        $document = parent::toArray();

        // Remove fields
        unset($document['ventaTercero']);
        unset($document['documentoRelacionado']);
        unset($document['extension']);

        // identification
        unset($document['identificacion']['tipoContingencia']);
        unset($document['identificacion']['motivoContin']);

        // Donatario
        $issuer = $this->getIssuer();
        $document['donatario'] = $document['emisor'];
        $document['donatario']['tipoDocumento'] = $issuer->getIdentificationType()->getCode();
        $document['donatario']['numDocumento'] = $issuer->getIdentificationNumber();
        unset($document['donatario']['nit']);
        unset($document['emisor']);

        // Donante
        $receiver = $this->getReceiver();
        $document['donante'] = $document['receptor'];
        $document['donante']['codDomiciliado'] = (int) $receiver->getTaxDomicile()->getCode();
        $document['donante']['codPais'] = $receiver->getAddress()->getCountry()->getCode();
        unset($document['receptor']);

        // Remove cuerpoDocumento fields
        $lineItems = $this->getLineItems();
        foreach ($document['cuerpoDocumento'] as $key => $item) {
            unset($document['cuerpoDocumento'][$key]['tipoItem']);
            unset($document['cuerpoDocumento'][$key]['montoDescu']);
            unset($document['cuerpoDocumento'][$key]['ventaGravada']);
            unset($document['cuerpoDocumento'][$key]['ivaItem']);
            unset($document['cuerpoDocumento'][$key]['ventaNoSuj']);
            unset($document['cuerpoDocumento'][$key]['ventaExenta']);
            unset($document['cuerpoDocumento'][$key]['tributos']);
            unset($document['cuerpoDocumento'][$key]['noGravado']);
            unset($document['cuerpoDocumento'][$key]['psv']);
            unset($document['cuerpoDocumento'][$key]['codTributo']);
            unset($document['cuerpoDocumento'][$key]['numeroDocumento']);
            unset($document['cuerpoDocumento'][$key]['precioUni']);

            // New Fields
            $document['cuerpoDocumento'][$key]['tipoDonacion'] = $lineItems[$key]?->getDonationTypeCode();
            $document['cuerpoDocumento'][$key]['valorUni'] = $lineItems[$key]?->getUnitPrice();
            $document['cuerpoDocumento'][$key]['valor'] = $lineItems[$key]?->getTotalValue();
            $document['cuerpoDocumento'][$key]['depreciacion'] = $lineItems[$key]?->getDepreciation();
        }

        // Remove summary fields
        unset($document['resumen']['totalNoSuj']);
        unset($document['resumen']['descuNoSuj']);
        unset($document['resumen']['totalIva']);
        unset($document['resumen']['ivaRete1']);
        unset($document['resumen']['subTotalVentas']);
        unset($document['resumen']['subTotal']);
        unset($document['resumen']['reteRenta']);
        unset($document['resumen']['tributos']);
        unset($document['resumen']['descuExenta']);
        unset($document['resumen']['totalDescu']);
        unset($document['resumen']['numPagoElectronico']);
        unset($document['resumen']['descuGravada']);
        unset($document['resumen']['porcentajeDescuento']);
        unset($document['resumen']['totalGravada']);
        unset($document['resumen']['montoTotalOperacion']);
        unset($document['resumen']['totalNoGravado']);
        unset($document['resumen']['saldoFavor']);
        unset($document['resumen']['totalExenta']);
        unset($document['resumen']['totalPagar']);
        unset($document['resumen']['condicionOperacion']);
        $document['resumen']['valorTotal'] = $this->getSummary()->getTotal();

        // Remove payments fields
        foreach ($document['resumen']['pagos'] as $key => $item) {
            unset($document['resumen']['pagos'][$key]['periodo']);
            unset($document['resumen']['pagos'][$key]['plazo']);
        }

        return $document;
    }
}
