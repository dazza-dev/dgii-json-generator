<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Body;

use DazzaDev\DgiiJsonGenerator\Models\Body\Extension\PersonBase;

class Requester extends PersonBase
{
    /**
     * Array representation using DGII Spanish keys
     */
    public function toArray(): array
    {
        return [
            'nombreSolicita' => $this->getName(),
            'tipDocSolicita' => $this->getIdentificationType()->getCode(),
            'numDocSolicita' => $this->getIdentificationNumber(),
        ];
    }
}
