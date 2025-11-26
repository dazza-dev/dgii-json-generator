<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Contingency;

use DateTime;
use DazzaDev\DgiiJsonGenerator\DateValidator;
use DazzaDev\DgiiJsonGenerator\Models\Base\DTEModel;
use DazzaDev\DgiiJsonGenerator\Traits\ContingencyTypeTrait;
use DazzaDev\DgiiJsonGenerator\Traits\IssuerTrait;
use DazzaDev\DgiiJsonGenerator\Traits\JsonTrait;

class Contingency extends DTEModel
{
    use ContingencyTypeTrait;
    use IssuerTrait;
    use JsonTrait;

    /**
     * Contingency start date
     */
    private ?string $startDate = null;

    /**
     * Contingency start time
     */
    private ?string $startTime = null;

    /**
     * Contingency end date
     */
    private ?string $endDate = null;

    /**
     * Contingency end time
     */
    private ?string $endTime = null;

    /**
     * Contingency items
     */
    private array $contingencyItems = [];

    /**
     * Contingency constructor
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->setVersion(3);
        $this->initialize($data);
    }

    /**
     * Set contingency fields
     */
    public function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['issuer'])) {
            $this->setIssuer($data['issuer']);
        }

        if (isset($data['reason']['start_date'])) {
            $this->setStartDate($data['reason']['start_date']);
        }

        if (isset($data['reason']['end_date'])) {
            $this->setEndDate($data['reason']['end_date']);
        }

        if (isset($data['reason']['type'])) {
            $this->setContingencyType($data['reason']['type']);
        }

        if (isset($data['reason']['reason'])) {
            $this->setContingencyReason($data['reason']['reason']);
        }

        if (isset($data['items'])) {
            $this->setContingencyItems($data['items']);
        }
    }

    /**
     * Set start date
     */
    public function setStartDate(string|DateTime $date): void
    {
        $dateValidator = new DateValidator;

        $this->startDate = $dateValidator->getDate($date);
        $this->startTime = $dateValidator->getTime($date);
    }

    /**
     * Get start date
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * Get start time
     */
    public function getStartTime(): ?string
    {
        return $this->startTime;
    }

    /**
     * Set end date
     */
    public function setEndDate(string|DateTime $date): void
    {
        $dateValidator = new DateValidator;

        $this->endDate = $dateValidator->getDate($date);
        $this->endTime = $dateValidator->getTime($date);
    }

    /**
     * Get end date
     */
    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    /**
     * Get end time
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * Set contingency items
     */
    public function setContingencyItems(array $contingencyItems): void
    {
        $this->contingencyItems = [];
        foreach ($contingencyItems as $i => $item) {
            $this->contingencyItems[] = new ContingencyItem([
                'item_number' => $i + 1,
                'document_type' => $item['document_type'],
                'generation_code' => $item['generation_code'],
            ]);
        }
    }

    /**
     * Get contingency items
     */
    public function getContingencyItems(): array
    {
        return $this->contingencyItems;
    }

    /**
     * Get contingency issuer
     */
    public function getContingencyIssuer(): array
    {
        $issuer = $this->getIssuer();

        return [
            'nit' => $issuer->getNit(),
            'nombre' => $issuer->getLegalName(),
            'nombreResponsable' => $issuer->getResponsible()->getName(),
            'tipoDocResponsable' => $issuer->getResponsible()->getIdentificationType()->getCode(),
            'numeroDocResponsable' => $issuer->getResponsible()->getIdentificationNumber(),
            'tipoEstablecimiento' => $issuer->getEstablishment()->getType()->getCode(),
            'codEstableMH' => $issuer->getEstablishment()->getCode(),
            'codPuntoVenta' => $issuer->getSalePoint()->getCode(),
            'telefono' => $issuer->getPhone(),
            'correo' => $issuer->getEmail(),
        ];
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'identificacion' => array_merge(parent::toArray(), [
                'fTransmision' => $this->getIssueDate(),
                'hTransmision' => $this->getIssueTime(),
            ]),
            'emisor' => $this->getContingencyIssuer(),
            'detalleDTE' => array_map(function (ContingencyItem $item) {
                return $item->toArray();
            }, $this->getContingencyItems()),
            'motivo' => [
                'fInicio' => $this->getStartDate(),
                'fFin' => $this->getEndDate(),
                'hInicio' => $this->getStartTime(),
                'hFin' => $this->getEndTime(),
                'tipoContingencia' => $this->getContingencyTypeCode(),
                'motivoContingencia' => $this->getCustomContingencyReason(),
            ],
        ];
    }
}
