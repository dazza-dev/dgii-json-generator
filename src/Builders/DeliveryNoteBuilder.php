<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\DeliveryNote;

class DeliveryNoteBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): DeliveryNote
    {
        return new DeliveryNote($this->documentData);
    }

    /**
     * Get document type for delivery note
     */
    protected function getDocumentType(): string
    {
        return 'delivery-note';
    }

    /**
     * Get the delivery note instance
     */
    public function getDeliveryNote(): DeliveryNote
    {
        return $this->getDocument();
    }
}
